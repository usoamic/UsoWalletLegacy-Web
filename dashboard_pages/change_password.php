<?php
if(isset_post('change_password_request')) {
    $accountClass->changePassword();
}
?>
<div class="my-3 p-3 card">
    <h6 class="border-bottom border-gray pb-2 mb-0"><?=$pageTitle?></h6>
    <div class="pt-3 pb-2">
        <form method="post">
            <input type='hidden' id='change_password_request' name='change_password_request' value='1'/>
            <fieldset>
                <div class="form-group">
                    <input id="current_password" name="current_password" type="password" class="form-control input-transparent" placeholder="Current Password">
                </div>
                <div class="form-group">
                    <input id="new_password" name="new_password" type="password" class="form-control input-transparent" placeholder="New Password">
                </div>
                <div class="form-group">
                    <input id="confirm_new_password" name="confirm_new_password" type="password" class="form-control input-transparent" placeholder="Confirm New Password">
                </div>
                <div class="form-group">
                    <input id="authenticator_code" name="authenticator_code" type="number" maxlength="6" min="0" class="form-control input-transparent" placeholder="Authenticator Code (optional)">
                </div>
            </fieldset>
            <div class="form-actions">
                <button class="btn btn-block btn-primary" type="submit">Change Password</button>
            </div>
        </form>
    </div>
</div>
