<h1 class="text-center">Order List</h1>
<div class="orderlist">
    <table id="table" class="table table-striped table-bordered table-dark m-auto text-center" style="width: 80%;">
        <thead>
            <tr>
                <th class="text-center">Order Id</th>
                <th class="text-center">Status</th>
                <th class="text-center" colspan="">Action</th>
            </tr>
        </thead>
        <?php foreach ($order as $order) : ?>
            <tbody>

                <tr id="<?php echo $order['orderid'] ?>">
                    <td><?= $order['orderid'] ?></td>
                    <td><?= $order['status'] ?></td>
                    <td>
                        <!-- <label for="status">Choose a car:</label> -->
                        <select class="status" id="status" name="status">
                            <option value="">Select a Status</option>
                            <option value="pending">Pending</option>
                            <option value="confirm">Confirm</option>
                            <option value="picked">Picked</option>
                            <option value="delivered">Delivered</option>
                            <option value="canceled">Canceled</option>
                        </select>
                    </td>
                    <td class="btn btn-info" style="width: 80px;"><a href="<?= base_url() . 'admin/invoice?orderid=' . $order['orderid'] ?>">View</a></td>
                    <td class="btn btn-info" style="width: 80px;"><a href="<?= base_url() . 'Pdf_generator/get?orderid=' . $order['orderid'] ?> " target="_blank">View Pdf</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $("#table").on('change', '.status', function() {

            var status = $(this).val();
            var id = $(this).parents("tr").attr("id");
            $.ajax({
                url: "<?= base_url() . 'admin/editstatus' ?>",
                type: 'POST',
                data: {
                    id: id,
                    status: status
                },
               
                success: function(data) {
                    console.log(data);
                    $(".orderlist").load(location.href + " .orderlist");
                  
                },
                error: function() {
                    // alert('Something is wrong');
                    alert(id+status);
                },
            });
        });
    });
</script>