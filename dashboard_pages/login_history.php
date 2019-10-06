<div class="my-3 p-3 card">
    <h6 class="border-bottom border-gray pb-2 mb-0"><?=$pageTitle?></h6>
    <div class="pt-3 pb-2">
        <table id="login_history_table" class="table table-bordered text-center" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>IP</th>
                <th class="d-none d-md-table-cell">Browser</th>
                <th class="d-none d-sm-table-cell">Platform</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($loginHistory as $i => $item) {?>
                <tr>
                    <td><?=($i+1)?></td>
                    <td><?=$item['ip_address']?></td>
                    <td class="d-none d-md-table-cell"><?=$item['browser']?></td>
                    <td class="d-none d-sm-table-cell"><?=$item['platform']?></td>
                    <td><?=gdate($item['timestamp'])?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
