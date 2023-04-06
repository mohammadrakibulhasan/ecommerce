<p style="text-align: right;"><?= $time['time']; ?></p>
<div class="invoice carttable">
<table class="table table-responsive">
        <tr>
            <th>Order ID :</th>
            <td><?=$dcharge['orderid']?></td>
        </tr>
        <tr>
            <th>Customer Name :</th>
            <td><?=$dcharge['customername']?></td>
        </tr>
        <tr>
            <th>Customer Division :</th>
            <td><?=$dcharge['location']?></td>
        </tr>
        <tr>
            <th>Customer Address :</th>
            <td><?=$dcharge['address']?></td>
        </tr>
        <tr>
            <th>Customer Mobile Number :</th>
            <td><?=$dcharge['mobilenumber']?></td>
        </tr>
        <tr>
            <th>Payment Mathod :</th>
            <td><?=$dcharge['paymentmethod']?></td>
        </tr>
        <tr>
            <th>Paid Via :</th>
            <td><?=$dcharge['paymentvia']?></td>
        </tr>
        <tr>
            <th>Total Amount :</th>
            <td><?=$dcharge['total']?></td>
        </tr>
        <tr>
            <th>Total Paid :</th>
            <td><?=$dcharge['amount']?></td>
        </tr>
        <tr>
            <th>Total Due :</th>
            <td><?=$dcharge['total']-$dcharge['amount']?></td>
        </tr>
    </table>
	<h1 style="text-align: center;">Your Product Invoice</h1>

	<table class="table" id="table" style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;">
		<tr>
			<!-- <th></th> -->
			<th style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;">Product Image</th>
			<th style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;">Product name</th>
			<th style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center; width: 100px;">Product Category</th>
			<th style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;">Product Color</th>
			<th style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;">Product Size</th>
			<th style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;">Product price</th>
			<th style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;">Quantity</th>
			<th style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;">Sub total</th>
		</tr>
		<?php
		$actual = 0;
		$total = 0;

		foreach ($order as $items) :


		?>
			<tr>
				<td ><img style="height: 30px; width:30px;" src="<?= base_url() . 'assets/img/product/' . $items['image'] ?>" alt=""></td>
				<td style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;"><?= $items['productName'] ?></td>
				<td style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;"><?= $items['category'] ?></td>
				<td style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;"><?= $items['color'] ?></td>
				<td style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;"><?= $items['size'] ?></td>
				<td style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;">
					<?= $items['price'] ?>
					<?php
					if (isset($items['oldPrice'])) {
					?>
						<s><?= $items['oldPrice'] ?></s>
					<?php
					}
					?>
				</td>
				<td style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;"><?= $items['quantity'] ?></td>

				<td style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;"><?= $items['price'] * $items['quantity'] . ' Taka' ?></td>

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
			<td colspan="7" style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: right;">Actual Price :</td>
			<td style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;"><?= $actual . ' Taka' ?></td>
		</tr>
		<tr>
			<td colspan="7" style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: right;">Discount :</td>
			<td style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;"><?= $discount . ' Taka' ?></td>
		</tr>
		<tr>
			<td colspan="7" style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: right;">Delivery Charge :</td>
			<td style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;"><?= $charge . ' Taka' ?></td>
		</tr>
		<tr>
			<td colspan="7" style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: right;">Total Price :</td>
			<td style="    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;"><?= $gtotal . ' Taka' ?></td>
		</tr>

		<!-- <h1>Thank you for your Shoping</h1> -->
	</table>
</div>