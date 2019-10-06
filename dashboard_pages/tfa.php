<div class="my-3 p-3 card">
    <h6 class="border-bottom border-gray pb-2 mb-0"><?=$pageTitle?></h6>
    <div class="pt-3 pb-2">
        <?php
        $tfaEnabled = $tfa->isEnabled();
        if(!$tfaEnabled) {
            echo $tfa->getQrCodeAndText();
        } ?>
        <form method="post">
            <input type='hidden' name='tfa_request' id='tfa_request' value='1'/>
            <fieldset>
                <div class="form-group">
                    <input id="authenticator_code" name="authenticator_code" type="number" maxlength="6" min="0" class="form-control input-transparent" placeholder="Authenticator code">
                </div>
                <div class="form-actions">
                    <button class="btn btn-block btn-<?= (($tfaEnabled) ? 'danger' : 'primary') ?>"><?= (($tfaEnabled) ? 'Disable' : 'Enable') ?></button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
