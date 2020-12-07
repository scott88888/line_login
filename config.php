<?php
//設定值
define("CLIENT_ID", '1655278629');
define("CLIENT_SECRET", '77fe4167d99983a57ed32a53d27bf24c');
define("REDIRECT_URI", 'http://localhost/line_login/callback.php');//登入後返回位置
define("SCOPE", 'openid%20profile%20email');//授權範圍以%20分隔 可以有3項openid，profile，email