<?php
if(isset_post('reset_password_request')) {
    $authorizationClass->resetPasswordRequest();
}
?>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><?=SITE_TITLE?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?=compare($pageName, "login") ? 'active' : ''?>">
                        <a class="nav-link" href="?p=login">Login</a>
                    </li>
                    <li class="nav-item <?=compare($pageName, "reset_password") ? 'active' : ''?>">
                        <a class="nav-link" href="?p=reset_password">Reset Password</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main role="main" class="flex-shrink-0 container">
    <div class="my-3 p-3 card">
        <h6 class="border-bottom border-gray pb-2 mb-0"><?=$pageTitle?></h6>
        <div class="pt-3 pb-2">
            <form method="post">
                <?php (require_once ("authorization_pages/".$pageName.".php")); ?>
                <div class="form-actions">
                    <button id="commonBtn" class="btn btn-block btn-primary<?=(ENABLE_CAPTCHA ? " recaptcha" : "")?>"><?=$pageTitle?></button>
                </div>
            </form>
        </div>
    </div>
</main><!-- /.container -->