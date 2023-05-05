<div class="row car">
    <div class="col-md-12 col-lg-7">
        <hr>
        <!-- <h1>ok</h1> -->
        <img class="main-img" src="<?= base_url() . 'assets/img/product/' . $product['image'] ?>" title="MSI PRO MP241X 23.8&quot; FHD Monitor" alt="" width="500" height="500">
    </div>
    <div class="col-lg-5 right" id="product">
        <hr>
        <div class="pd-summary">
            <div class="product-short-info">
                <h1 itemprop="name" class="product-name"><?= $product['productName'] ?></h1>
                <table class="product-info-table">
                    <tbody>
                        <tr class="product-info-group">
                            <?php
                            $d = date("Y-m-d");
                            foreach ($special as $sp) :
                                if ($d >= $sp['date_start'] && $d <= $sp['date_end']) {

                            ?>
                                    <td class="product-info-label">Price: &nbsp;&nbsp;</td>
                                    <td class="product-info-data product-price"><?= $sp['price'] ?>৳</td>
                                <?php
                                }
                            endforeach;
                            if ($special == null) {
                                ?>
                                <td class="product-info-label">Price: &nbsp;&nbsp;</td>
                                <td class="product-info-data product-price"><?= $product['price'] ?>৳</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr class="product-info-group">
                            <td class="product-info-label">Regular Price: &nbsp;&nbsp;</td>
                            <td class="product-info-data product-regular-price"><?= $product['price'] ?>৳</td>
                        </tr>
                        <tr class="product-info-group">
                            <td class="product-info-label">Status: &nbsp;&nbsp;</td>
                            <?php
                            if ($product['stock'] == 7) {

                            ?>
                                <td class="product-info-data product-status">In Stock</td>
                            <?php
                            } else {

                            ?>
                                <td class="product-info-data product-status">Out Of Stock</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr class="product-info-group">
                            <td class="product-info-label">Product Code: &nbsp;&nbsp;</td>
                            <td class="product-info-data product-code"><?= $product['UPC'] ?></td>
                        </tr>
                        <tr class="product-info-group">
                            <td class="product-info-label">Brand: &nbsp;&nbsp;</td>
                            <td class="product-info-data product-brand"><?= $product['manufacturer'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="short-description">
                <h2>Key Features</h2>
                <ul style="list-style-type: none;">
                    <?php
                    foreach ($attribute as $att) :
                    ?>
                        <li><?= $att['attributename'] ?>: <?= $att['attributevalue'] ?></li>
                    <?php
                    endforeach;
                    ?>
                    <!-- <li class="view-more" data-area="specification">View More Info</li> -->
                </ul>
            </div>
            <div class="short-option">
                <!-- <br> -->
                <h2>Select Option</h2>
                <?php
                foreach ($option as $op) :
                    if ($op['optionname'] == 'color') {
                        $colors[] = $op['optionvalue'];
                    } else if ($op['optionname'] == 'size') {
                        $sizes[] = $op['optionvalue'];
                    }
                endforeach;
                ?>
                <!-- Create select dropdown menu for colors -->
                <label for="color">Color:</label>
                <select id="color" name="color">
                    <option value="">-- Select a color --</option>
                    <?php foreach ($colors as $color) { ?>
                        <option value="<?php echo $color; ?>"><?php echo $color; ?></option>
                    <?php } ?>
                </select>

                <!-- Create select dropdown menu for sizes -->
                <label for="size">Size:</label>
                <select id="size" name="size">
                    <option value="">-- Select a size --</option>
                    <?php foreach ($sizes as $size) { ?>
                        <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
                    <?php } ?>
                </select>
                <br>
                <br>
            </div>
            <!-- <div class="stickers">
                <div class="sticker reward">
                    <span class="material-icons">stars</span>
                    <span class="points">250</span>
                    <span class="text">Star Points</span>
                </div>
            </div> -->
            <!-- <h2>Payment Options</h2>
            <div class="product-price-options">
                <label class="p-wrap cash-payment active">
                    <input type="radio" name="enable_emi" checked="" value="0">
                    <span class="price">14,990৳</span>
                    <div class="p-tag">Cash Discount Price</div>
                    <div class="p-tag fade">Online / Cash Payment</div>
                </label>
                <label class="p-wrap">
                    <input type="radio" name="enable_emi" value="1">
                    <span class="price">1,314৳/month</span>
                    <div class="p-tag">Regular Price: 15,769৳</div>
                    <div class="p-tag fade">0% EMI for up to 12 Months***</div>
                </label>
            </div> -->
            <div class="cart-option">
                <label class="quantity">
                    <span class="less"><i class="fa-solid fa-minus"></i></span>
                    <span class="qty"><input type="text" name="quantity" id="input-quantity" value="1" size="2"></span>
                    <span class="add"><i class="fa-solid fa-plus"></i></span>
                    <input type="hidden" name="product_id" value="">
                </label>
                <br>
                <button id="button-cart" class="btn btn-primary">Buy Now</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $(".cart-option").on('click', '.less', function() {

            var amm = $('#input-quantity').val();
            if (amm == 1) {
                var newamm = amm;
            } else {
                var newamm = amm - 1;
            }
            $('#input-quantity').val(newamm)
            // alert(amm + newamm);

            //     if (confirm('Are you sure to remove this record ?')) {
            //         $.ajax({
            //             url: "<?= base_url() . 'admin/deleteproduct' ?>",
            //             type: 'POST',
            //             data: {
            //                 id: id
            //             },
            //             error: function() {
            //                 alert('Something is wrong');
            //                 // alert(id);
            //             },
            //             success: function(data) {
            //                 $("#" + id).remove();
            //                 alert("Record removed successfully");
            //             }
            //         });
            //     }
        });

        $(".cart-option").on('click', '.add', function() {

            var amm = parseInt($('#input-quantity').val());
            var newamm = amm + 1;
            $('#input-quantity').val(newamm)
            // alert(amm + newamm);
        });
        $(".cart-option").on('click', '#button-cart', function() {

            var amm = parseInt($('#input-quantity').val());
        });
    });
</script>