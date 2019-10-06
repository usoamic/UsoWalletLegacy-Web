<div class="my-3 p-3 card">
    <h6 class="border-bottom border-gray pb-2 mb-0">Transactions</h6>
    <div class="pt-3 pb-2">
        <table id="transactions_table" class="table table-bordered text-center">
            <thead>
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Date</th>
                <th class="d-none d-sm-table-cell">Amount</th>
                <th class="d-none d-md-table-cell">Address</th>
                <th class="d-none d-md-table-cell">Status</th>
            </tr>
            </thead>
            <tbody>
            <?php for ($i = 0; $i < count($transactionHistory); $i++) {
                $item = $transactionHistory[$i];
                ?>
                <tr>
                    <td><?= ($i + 1) ?></td>
                    <td><?= $item["type"] ?></td>
                    <td><?= $item["date"] ?></td>
                    <td class="d-none d-sm-table-cell"><?= $item["amount"] ?></td>
                    <td class="d-none d-md-table-cell"><?= $item["address"] ?></td>
                    <td class="d-none d-md-table-cell"><?= $item["status"] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
