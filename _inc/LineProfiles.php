<?php



class LineProfiles
{

    /**
     * @var ConfigManager
     */
    private $configManager;

    public function __construct(ConfigManager $configManager)
    {
        $this->configManager = $configManager;
    }

    /**
     * 取得用戶端 Profile
     *
     * @see https://developers.line.biz/en/docs/social-api/getting-user-profiles/
     * @param $code
     * @return bool|mixed|string
     * @throws LineAccessTokenNotFoundException
     */
    public function get($code)
    {
        $accessToken = self::getAccessToken($code);
        $headerData = [
            "content-type: application/x-www-form-urlencoded",
            "charset=UTF-8",
            'Authorization: Bearer ' . $accessToken,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerData);
        curl_setopt($ch, CURLOPT_URL, "https://api.line.me/v2/profile");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result ,true);
        $result['accessToken2'] = $accessToken;
        return $result;
    }
    
    /**
     * 取得用戶端 Profile 已經有 $accessTokene
     *
     * @see https://developers.line.biz/en/docs/social-api/getting-user-profiles/
     * @param $code
     * @return bool|mixed|string
     * @throws LineAccessTokenNotFoundException
     */
    public function getLineProfile_access_token($accessToken)
    {
        $headerData = [
            "content-type: application/x-www-form-urlencoded",
            "charset=UTF-8",
            'Authorization: Bearer ' . $accessToken,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerData);
        curl_setopt($ch, CURLOPT_URL, "https://api.line.me/v2/profile");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result,true);     
        return $result;
        
    }
    //curl_init初始化一個新的cURL會話並獲取一個網頁
    //curl_setopt設置一個cURL傳輸選項
    //CURLOPT_HTTPHEADER 一個用來設置HTTP頭字段的數組。使用如下的形式的數組進行設置： array('Content-type: text/plain', 'Content-length: 100')	
    //CURLOPT_URL需要獲取的URL地址，也可以在curl_init()函數中設置。
    //CURLOPT_RETURNTRANSFER將curl_exec()獲取的信息以文件流的形式返回，而不是直接輸出。
    //curl_exec这个函数应该在初始化一个 cURL 会话并且全部的选项都被设置后被调用。
    //curl_close關閉cURL資源，並且釋放系統資源
    //json_decode — 對 JSON 格式的字符串進行編碼 轉換成PHP變數


    //寫入資料庫
    public function addUserInfo($user){
 
        global $pdo;
         //資料庫訊息
        $dsn="mysql:host=localhost;charset=utf8;dbname=test";
        $pdo=new PDO($dsn,"root" ,"8888");
       
        $addNowDate=time();
        $sql="INSERT INTO user(userId ,displayName ,pictureUrl ,createT) 
            VALUES ('{$user[userId]}', '{$user[displayName]}', '{$user[pictureUrl]}',$addNowDate )";
        //可以寫入mysql 但會有警告訊息
        // $sql = "UPDATE `user` 
        //         SET 
        //         `userId` = '$user[userId]' , 
        //         `statusMessage` = '$user[statusMessage]' , 
        //         `displayName` = '$user[displayName]' , 
        //         `pictureUrl` = '$user[pictureUrl]'
        //         WHERE `id` = 2";
        
        $return = $pdo->exec($sql);
        return $return;

        // $sql = "UPDATE `user` SET `userId` = \'999\' WHERE `user`.`id` = 1";
        // $return = $pdo->exec($sql);
        // return $return;
       

    }


    /**
     * 取得用戶端 Access Token
     *
     * @see https://developers.line.biz/en/docs/line-login/web/integrate-line-login/
     * @param $code
     * @return string
     * @throws LineAccessTokenNotFoundException
     */
    public function getAccessToken($code)
    {
        $config = $this->configManager->getConfigs();
        /*
        $post = [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $config[ $this->configManager::CLIENT_REDIRECT_URI  ],
            'client_id' => $config[ $this->configManager::CLIENT_ID],
            'client_secret' => $config[ $this->configManager::CLIENT_SECRET ],
        ];
        $ch = curl_init();
        curl_setopt($ch , CURLOPT_URL , "https://api.line.me/oauth2/v2.1/token");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/x-www-form-urlencoded']);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $post ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
        $info = curl_exec($ch);
        curl_close($ch);
        $info = json_decode($info);
        */
        //----------------------------------------
        // POST傳參數
        //----------------------------------------
        $url = "https://api.line.me/oauth2/v2.1/token";
        $query = "";
        $query .= "grant_type=" . urlencode("authorization_code") . "&";
        $query .= "code=" . urlencode($code) . "&";
        $query .= "redirect_uri=" . urlencode($config[$this->configManager::CLIENT_REDIRECT_URI]) . "&";
        $query .= "client_id=" . urlencode($config[$this->configManager::CLIENT_ID]) . "&";
        $query .= "client_secret=" . urlencode($config[$this->configManager::CLIENT_SECRET]) . "&";
        $header = array(
            "Content-Type: application/x-www-form-urlencoded",
            "Content-Length: " . strlen($query),
        );
        $context = array(
            "http" => array(
                "method"        => "POST",
                "header"        => implode("\r\n", $header),
                "content"       => $query,
                "ignore_errors" => true,
            ),
        );
        // var_dump($context);
        
        //-------------------------------------
        // 陣列array($context) { 
        //         ["http"]=> array(4) { 
        //         ["method"]=> string(4) "POST" 
        //         ["header"]=> string(68) "Content-Type: application/x-www-form-urlencoded Content-Length: 188" 
        //         ["content"]=> string(188) "grant_type=authorization_code&
        //                                    code=oawrEBgUDr7zsvg4VWAx&
        //                                    redirect_uri=http%3A%2F%2Flocalhost%2Fline_login%2Fcallback.php&
        //                                    client_id=1655278629&
        //                                    client_secret=77fe4167d99983a57ed32a53d27bf24c&" 
        //         ["ignore_errors"]=> bool(true) } }
        //-------------------------------------


        //---------------------
        // id token取得
        //---------------------
        $res_json = file_get_contents($url, false, stream_context_create($context));
        $info = json_decode($res_json);
        //print_r($info);
        if (empty($info->access_token)) {
            echo '找不到 Access Token';
        }
        return $info->access_token;

        // 陣列array($info) { 
        //      ["http"]=> array(4) { 
        //      ["method"]=> string(4) "POST"
        //      ["header"]=> string(68) "Content-Type: application/x-www-form-urlencoded Content-Length: 188" 
        //      ["content"]=> string(188) "grant_type=authorization_code
        //                                 code=CV826LaPldTJ11HEn87w
        //                                 redirect_uri=http%3A%2F%2Flocalhost%2Fline_login%2Fcallback.php
        //                                 client_id=1655278629
        //                                 client_secret=77fe4167d99983a57ed32a53d27bf24c     " 
        //      ["ignore_errors"]=> bool(true) } } { 
        //      ["access_token"]=> string(236) "eyJhbGciOiJIUzI1NiJ9.FcBLHyZyPD86zHfv8c-2_f86Rz36Rijo5T2LH84npaN06kCsDDN19ZT26oHK18EsyQcoYjF96vxAOa5ihLFOLQtSj6HCHlteLBY0BevjhM45yV_eaQm9eIYfWuUvsLWwP7pyq4PoQrfSjLaynoO5CmS8sIB3EMtKlMMc-kfYOo.N19RnCygmM28riSMFirzB34Ur12abH4THVxOWjjcrG4" 
        //      ["token_type"]=> string(6) "Bearer" 
        //      ["refresh_token"]=> string(20) "OJgE0nSO0yaiGUF0WIET" 
        //      ["expires_in"]=> int(2592000) 
        //      ["scope"]=> string(14) "openid profile" 
        //      ["id_token"]=> string(463) "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FjY2Vzcy5saW5lLm1lIiwic3ViIjoiVWZjM2IxZDUyMjIzZjY2YTMwYmZkZjMxZmRlYjYwYjZhIiwiYXVkIjoiMTY1NTI3ODYyOSIsImV4cCI6MTYwNjQ3MzM5OCwiaWF0IjoxNjA2NDY5Nzk4LCJhbXIiOlsibGluZXNzbyJdLCJuYW1lIjoiKue0uem9ilMuQyIsInBpY3R1cmUiOiJodHRwczovL3Byb2ZpbGUubGluZS1zY2RuLm5ldC8waGttNEJSV3ZuTkVJSk94eGN4V3RMRlRWLU9pOS1GVElLY1ZsNklDcHViWHR4RFhzY1BRNTlJM3R1T0NWMkNYSWNaMWw2Y1NScGFpWjIifQ.igWpUfVxILnu7ulVpmdo7mBTNhxiNwuWtEENcPwxcvs" }

    }
}

