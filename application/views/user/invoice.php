<div class="invoice carttable">
    <h1 class="text-center">Your Product Invoice</h1>
    <br>
    <table class="table table-responsive">
        <tr>
            <th>Order ID</th>
            <td><?=$dcharge['orderid']?></td>
        </tr>
        <tr>
            <th>Customer Name</th>
            <td><?=$dcharge['customername']?></td>
        </tr>
        <tr>
            <th>Customer Division</th>
            <td><?=$dcharge['location']?></td>
        </tr>
        <tr>
            <th>Customer Address</th>
            <td><?=$dcharge['address']?></td>
        </tr>
        <tr>
            <th>Customer Mobile Number</th>
            <td><?=$dcharge['mobilenumber']?></td>
        </tr>
        <tr>
            <th>Payment Mathod</th>
            <td><?=$dcharge['paymentmethod']?></td>
        </tr>
        <tr>
            <th>Paid Via</th>
            <td><?=$dcharge['paymentvia']?></td>
        </tr>
        <tr>
            <th>Total Amount</th>
            <td><?=$dcharge['total']?></td>
        </tr>
        <tr>
            <th>Total Paid</th>
            <td><?=$dcharge['amount']?></td>
        </tr>
        <tr>
            <th>Total Due</th>
            <td><?=$dcharge['total']-$dcharge['amount']?></td>
        </tr>
    </table>
    <table class="table table-responsive" id="table">
        <tr>
            <!-- <th></th> -->
            <th>Product Image</th>
            <th>Product name</th>
            <th>Product Category</th>
            <th>Product Color</th>
            <th>Product Size</th>
            <th>Product price</th>
            <th>Quantity</th>
            <th>Sub total</th>
        </tr>
        <?php
        $actual = 0;
        $total = 0;
        $charge = 0;

        foreach ($order as $items) :


        ?>
            <tr>
                <td><img style="height: 50px; width: 50px;" src="<?= base_url() . 'assets/img/product/' . $items['image'] ?>" alt=""></td>
                <td><?= $items['productName'] ?></td>
                <td><?= $items['category'] ?></td>
                <td><?= $items['color'] ?></td>
                <td><?= $items['size'] ?></td>
                <td>
                    <?= $items['price'] ?>
                    <?php
                    if (isset($items['oldPrice'])) {
                    ?>
                        <s><?= $items['oldPrice'] ?></s>
                    <?php
                    }
                    ?>
                </td>
                <td><?= $items['quantity'] ?></td>

                <td><?= $items['price'] * $items['quantity'] . ' Taka' ?></td>

            </tr>



        <?php
            if ($items['oldPrice'] == null) {
                $items['oldPrice'] = $items['price'];
            }
            $subtotal = $items['oldPrice'] * $items['quantity'];

            $price = $items['price'] * $items['quantity'];


            $actual = $actual + $subtotal;
            $total = $total + $price;

        endforeach;

        $discount = $actual - $total;

        $charge = $dcharge['delivarycharge'];

        $gtotal = $total + $charge;


        ?>

        <tr>
            <td class="text-right" colspan="7">Actual Price :</td>
            <td><?= $actual . ' Taka' ?></td>
        </tr>
        <tr>
            <td class="text-right" colspan="7">Discount :</td>
            <td><?= $discount . ' Taka' ?></td>
        </tr>
        <tr>
            <td class="text-right" colspan="7">Delivery Charge :</td>
            <td><?= $charge . ' Taka' ?></td>
        </tr>
        <tr>
            <td class="text-right" colspan="7">Total Price :</td>
            <td><?= $gtotal . ' Taka' ?></td>
        </tr>

        <!-- <h1>Thank you for your Shoping</h1> -->
    </table>
</div>