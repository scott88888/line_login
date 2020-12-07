
注意事項

1.請在config.php修改頻道參數
<?php
//設定值
define("CLIENT_ID", '1655278629');
define("CLIENT_SECRET", '77fe4167d99983a57ed32a53d27bf24c');
define("REDIRECT_URI", 'http://localhost/line_login/callback.php');//登入後返回位置
define("SCOPE", 'openid%20profile%20email');//授權範圍以%20分隔 可以有3項openid，profile，email


2.資料庫名稱及欄位在_inc下LineProfiles.php的public function addUserInfo 修改

3.PHP版本要7.0以上

4.以上資料引用https://github.com/suffixbig/line_login
此為私人學習紀錄 請參考原作者
