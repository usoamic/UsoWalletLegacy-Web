<input type='hidden' id='login_request' name='login_request' value='1'/>
<fieldset>
    <div class="form-group">
        <input id="email" name="email" class="form-control input-transparent" placeholder="E-Mail" value="<?=get_post_value('email')?>" required>
    </div>
    <div class="form-group">
        <input id="password" name="password" type="password" class="form-control input-transparent" placeholder="Password" required>
    </div>
    <div class="form-group">
        <input id="authenticator_code" name="authenticator_code" type="number" maxlength="6" min="0" class="form-control input-transparent" placeholder="Authenticator Code (optional)">
    </div>
</fieldset>

