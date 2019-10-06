<?php
$userEmail = $authorizationClass->getSessionEmail();
$accountClass = new AccountClass($userEmail);
if(isset_post('send_request')) {
    $accountClass->send();
}

$summaryData = $accountClass->getSummary();
$loginHistory = $accountClass->getLoginHistory();
$transactionHistory = $accountClass->getPreparedTransactions();

if(isset_post('tfa_request')) {
    $accountClass->tfaAction(get_post_value('authenticator_code'));
}

$tfa = $accountClass->getTfa();
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><?=SITE_TITLE?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?=compare($pageName, "home") ? 'active' : ''?>">
                    <a class="nav-link" href="?p=home">Home</a>
                </li>
                <li class="nav-item <?=compare($pageName, "send") ? 'active' : ''?>">
                    <?php if(!ENABLED_WITHDRAW) { ?>
                        <a class="nav-link disabled">Send (disabled)</a>
                    <?php } else { ?>
                        <a class="nav-link" href="?p=send">Send</a>
                    <?php } ?>
                </li>
                <li class="nav-item <?=compare($pageName, "transactions") ? 'active' : ''?>">
                    <a class="nav-link" href="?p=transactions">Transactions</a>
                </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="" id="account_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$userEmail?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="account_dropdown">
                        <a class="dropdown-item" href="?p=change_password">Change Password</a>
                        <a class="dropdown-item" href="?p=tfa">2FA</a>
                        <a class="dropdown-item" href="?p=login_history">Login History</a>
                        <a class="dropdown-item" href="?p=logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main role="main" class="container">
    <?php (require_once ("dashboard_pages/".$pageName.".php")); ?>
</main><!-- /.container -->