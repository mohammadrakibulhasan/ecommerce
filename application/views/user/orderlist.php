<h1 class="text-center">Order List</h1>
<div class="orderlist">
    <table class="table table-striped table-bordered table-dark m-auto text-center" style="width: 80%;">
        <thead>
            <tr >
                <th class="text-center">Order Id</th>
                <th class="text-center">Status</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <?php foreach ($order as $order) : ?>
            <tbody>

                <tr>
                    <td ><?= $order['orderid'] ?></td>
                    <td ><?= $order['status'] ?></td>
                    <td class="btn btn-info" style="width: 80px;" ><a href="<?= base_url() . 'user/invoice?orderid=' . $order['orderid'] ?>">View</a></td>
                    <td class="btn btn-info" style="width: 80px;" ><a href="<?= base_url() . 'Pdf_generator/get?orderid=' . $order['orderid'] ?> " target="_blank">View Pdf</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
    </table>
</div>