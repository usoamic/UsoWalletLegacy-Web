<div class="my-3 p-3 card">
    <h6 class="border-bottom border-gray pb-2 mb-0"><?= $pageTitle ?></h6>
    <div class="pt-3 pb-2">
        <form method="post">
            <input type='hidden' id='send_request' name='send_request' value='1'/>
            <fieldset>
                <div class="alert alert-warning" role="alert">
                    Exchange price: <?= EXCHANGE_PRICE ?> ETH
                </div>

                <div class="form-group">
                    <input id="address" name="address" class="form-control input-transparent" placeholder="Address"
                           value="<?= get_post_value('address') ?>" required>
                </div>
                <div class="form-group">
                    <input id="amount" name="amount" class="form-control input-transparent" placeholder="USO Amount (not ETH!)"
                           required>
                </div>
                <div class="form-group">
                    <input id="authenticator_code" name="authenticator_code" type="number" maxlength="6" min="0"
                           class="form-control input-transparent" placeholder="Authenticator Code (optional)">
                </div>

                <div class="form-group">
                    <input class="btn btn-block btn-primary" id="btn_send" name="btn_send" type="submit" value="Send"/>
                </div>

                <div class="form-group">
                    <input class="btn btn-block btn-primary" id="btn_exchange" name="btn_exchange" type="submit" value="Exchange to ETH and Send"/>
                </div>
            </fieldset>


        </form>
    </div>
</div>
