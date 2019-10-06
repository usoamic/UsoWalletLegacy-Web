<?php
require_once("assets/php/other/defines.php");
require_once("assets/php/other/consts.php");
require_once("assets/php/libs/cfunctions.php");
require_once("assets/php/libs/Coin.php");
require_once("assets/php/libs/EncryptionClass.php");
require_once("assets/php/libs/DBClass.php");
require_once("assets/php/libs/NotifierClass.php");
require_once("assets/php/libs/Telegram.php");
require_once("assets/php/libs/TelegramNotifier.php");
require_once("assets/php/TFAClass.php");
require_once("assets/php/AuthorizationClass.php");
require_once("assets/php/AccountTFA.php");
require_once("assets/php/AccountClass.php");
require_once("assets/php/AccountClass.php");

$notifyText = '';
$errorText = '';

$authorizationPageTitles = array(
    "login" => "Login",
    "create_account" => "Create Account",
    "reset_password" => "Reset Password",
);

$dashboardPageTitles = array(
    "home" => "Home",
    "send" => "Send",
    "transactions" => "Transactions",
    "change_password" => "Change Password",
    "tfa" => "2FA",
    "login_history" => "Login History",
);

$pageTitles = array_merge(
        array("error" => "Error"),
        array_merge($authorizationPageTitles, $dashboardPageTitles)
);

$pageName = get_get_value('p');

$authorizationClass = new AuthorizationClass();
if(isset_get('reset_code')) {
    $authorizationClass->resetPassword();
}
if(compare($pageName, 'logout')) {
    $authorizationClass->logout();
}
if(isset_post('login_request')) {
    if($authorizationClass->loginToAccount()) {
        redirect_to_url('?p=home');
    }
}

$basePage = (compare($pageName, "error") ? "error" : ($authorizationClass->checkLogin() ? "dashboard" : "authorization"));

if(is_empty($pageName) || (!ENABLED_WITHDRAW && compare($pageName, "send")) || (compare($basePage, "dashboard") && !array_key_exists($pageName, $dashboardPageTitles)) || (compare($basePage, "authorization") && !array_key_exists($pageName, $authorizationPageTitles))) {
    $pageName = compare($basePage, "dashboard") ? "home" : "login";
}

$pageTitle = $pageTitles[$pageName];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Cryptocurrency wallet">
    <meta name="author" content="isladev">
    <link rel="icon" href="/assets/pics/favicon.ico">

    <title><?=SITE_TITLE?> - <?=$pageTitle?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
    <!-- Custom styles for this template -->
    <link href="assets/css/theme.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php (require_once ($basePage.".php")); ?>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<?php if(compare($basePage, 'dashboard')) { ?>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            const tables = ['transactions_table', 'login_history_table'];
            for(let i = 0; i < tables.length; i++) {
                $('#' + tables[i]).dataTable();
            }
        });
    </script>
<?php } else if(true) {  ?>
    <script type="text/javascript">
        $(window).on('load', function(){
            $(".recaptcha").each(function() {
                var el = $(this);
                grecaptcha.render($(el).attr("id"), {
                    'sitekey': '<?=RECAPTCHA_SITE_KEY?>',
                    'size': 'invisible',
                    'theme': 'light',
                    "callback" : function(token) {
                        $(el).parent().parent().find(".captcha").val(token);
                        $(el).parent().parent().submit();
                    }
                });
            });
        });
    </script>
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=explicit"></script>
<?php } ?>
<div id="notifyModal"></div>
<script>
    function showModal(text) {
        const html = "<div id=\"modalWindow\" class=\"modal fade\" role=\"dialog\">\n" +
            "            <div class=\"modal-dialog\">\n" +
            "                <div class=\"modal-content\">\n" +
            "                    <div class=\"modal-header\">\n" +
            "                       Message<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\n" +
            "                    </div>\n" +
            "                    <div class=\"modal-body text-center\">\n" +
            "                        <p>" + text + "</p>\n" +
            "                    </div>\n" +
            "                </div>\n" +
            "            </div>\n" +
            "        </div>";
        $('#notifyModal').html(html);
        $('#modalWindow').modal();
    }
</script>

<?php
if(is_empty($errorText) && isset($authorizationClass)) $errorText = $authorizationClass->getError();
if(is_empty($errorText) && isset($accountClass)) $errorText = $accountClass->getError();

if(is_empty($notifyText) && isset($authorizationClass)) $notifyText = $authorizationClass->getResponse();
if(is_empty($notifyText) && isset($accountClass)) $notifyText = $accountClass->getResponse();

$notifyType = 'success';

if(!is_empty($errorText)) {
    $notifyText = $errorText;
    $notifyType = 'error';
}

if(!is_empty($notifyText)) {
    echo "<script>showModal('".$notifyText."')</script>";
}
?>
</body>
</html>
