<div class="row">
    <div class="col-lg-8 m-auto col-md-6">
        <div class="card">
        <h1 style="text-align: center;">Product Details</h1> <br>


<form class="text-center" action="<?= base_url().'user/cartadd'?>" method="post">

    <?php
    foreach ($product as $pro) :
    ?>
        <div class="pview">
            <div class="img">
                <img style="height: 200px; width: 200px;" src="<?= base_url() . '/assets/img/product/' . $pro['productImage'] ?>" alt="">
            </div>
        </div>
        <br>
        <p>Product Name : <?= $pro['productName'] ?></p>
        <p>Product Price : <?= $pro['productPrice'] ?> <s><?= $pro['oldPrice'] ?></s> Taka</p>
        <p>Product Category : <?= $pro['category'] ?></p>
        <p>Available Color : <?= $pro['color'] ?></p>
        <p>Product Size : <?= $pro['size'] ?></p> <br>
        <h1 style="text-align: center;">Other details</h1>
        <p><?= $pro['details'] ?></p>
        <br>
        <?= 'Quantity : ' ?>
        <input type="number" id="qty" name="qty" value="1" min="1" max="5" required>

        <?php
        $colors = $pro['color'];
        $colors_array = explode(',', $colors);
        ?>
        <?= '<br><br>Select Color : ' ?>

        <select id="color" name="color">
            <?php foreach ($colors_array as $color) : ?>
                <option value="<?php echo $color; ?>"><?php echo $color; ?></option>
            <?php endforeach; ?>
        </select>

        <?php
        $size = $pro['size'];
        if ($size != null) {

            $sizes_array = explode(',', $size);
        ?>
            <?= '<br><br>Select size : ' ?>

            <select id="size" name="size">
                <?php foreach ($sizes_array as $size) : ?>
                    <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
                <?php endforeach; ?>
            </select>
        <?php
        }
        ?>
        <input type="hidden" id="id" name="id" value="<?= $pro['id'] ?>">

        <input type="hidden" id="productName" name="productName" value="<?= $pro['productName'] ?>">

        <input type="hidden" id="productPrice" name="productPrice" value="<?= $pro['productPrice'] ?>">

        <input type="hidden" id="oldPrice" name="oldPrice" value="<?= $pro['oldPrice'] ?>">

        <input type="hidden" id="category" name="category" value="<?= $pro['category'] ?>">

        <input type="hidden" id="productImage" name="productImage" value="<?= $pro['productImage'] ?>">
        <br> <br>
        <input type="submit" name="cart" value="ADD Cart">
        <br><br>
    <?php
    endforeach;
    ?>
</form>
        </div>
    </div>
</div>