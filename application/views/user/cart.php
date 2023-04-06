<div id="div123">
    <?php if ($this->cart->total_items() > 0) { ?>

        <table class="table table-responsive table-dark" id="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Product Category</th>
                    <th scope="col">Product Color</th>
                    <th scope="col">Product Size</th>
                    <th scope="col">Product price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Sub total</th>
                    <th scope="row">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $actual = 0;

                $i = 1;
                foreach ($this->cart->contents() as $items) :

                ?>
                    <tr>
                        <th scope="row"><?= $i++ ?></th>
                        <td><img style="height: 30px; width: 30px;" src="<?= base_url() . 'assets/img/product/' . $items['img'] ?>" alt=""></td>
                        <td><?= $items['name'] ?></td>
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
                        <td><input type="number" class="qty" name="qty" min="1" max="5" value="<?= $items['qty'] ?>" required></td>

                        <td><?= $items['price'] * $items['qty'] ?></td>

                        <td><a href="<?= base_url() . 'user/cartremove/' . $items['rowid'] ?>">X</a></td>
                        <td><input type="text" class="id" name="id" value="<?= $items['rowid'] ?>" hidden></td>
                    </tr>
                <?php
                    if ($items['oldPrice'] == null) {
                        $items['oldPrice'] = $items['price'];
                    }
                    $subtotal = $items['oldPrice'] * $items['qty'];
                    $actual = $actual + $subtotal;

                endforeach;
                $discount = $actual - $this->cart->total();


                ?>

                <tr>
                    <td class="text-right" colspan="8">Actual Price :</td>
                    <td><?= $actual  ?></td>
                </tr>
                <tr>
                    <td class="text-right" colspan="8">Discount :</td>
                    <td><?= $discount  ?></td>
                </tr>

                <tr>
                    <?php

                    ?>
                    <td class="text-right" colspan="8">Delivary Charge :</td>
                    <td id="charge"><?= ' Select Your Location' ?> </td>
                </tr>
                <tr>
                    <td class="text-right" colspan="8">Total Price :</td>
                    <td id="total"><?= $this->cart->total() ?></td>
                    <td style="display: none;" id="fixtotal"><?= $this->cart->total() ?></td>
                </tr>
            </tbody>
        </table>



        <form action="<?= base_url() . 'user/order' ?>" method="post">
            <?php $id = $this->session->userdata('userid'); ?>
            <div class="location">
                <label for="location">Choose a Location:</label>
                <select id="location" name="location" required>
                    <option value="">Select Your Location</option>
                    <option value="dhaka">Dhaka</option>
                    <option value="rangpur">Rangpur</option>
                    <option value="shylet">Shylet</option>
                    <option value="chittagong">Chittagong</option>
                    <option value="barisal">Barisal</option>
                    <option value="khulna">Khulna</option>
                    <option value="rajshahi">Rajshahi</option>
                    <option value="mymensingh">Mymensingh</option>
                </select>
            </div>
            <div class="payment">
                <h1 style="margin: auto; text-align: center;">Choose Your Payment Method</h1>
                <input type="radio" id="bkash" name="val" value="bkash"> Bkash
                <input type="radio" id="nagad" name="val" value="nagad"> Nagad
                <input type="radio" id="rocket" name="val" value="rocket"> Rocket
                <input type="radio" id="cash" name="val" value="cash"> Cash On Delivery
            </div>
            <div style="display: none;" id="pbody">
                <input type="hidden" id="btotal" name="btotal" value="">
                <input type="hidden" id="delivarycharge" name="delivarycharge" value="">

                <div style="background-color: aqua; text-align: center; display: none;" id="forbkash">



                    <h1>Please Enter Your Order Information</h1>
                    Enter your Name <br><input type="text" name="bname"> <br>
                    Full Address <br><input type="text" name="baddress"> <br>
                    Mobile Number <br><input type="number" name="bmobilenumber"> <br>
                    Enter your Bkash number <br><input type="number" name="bnumber"> <br>
                    Amount <br><input type="number" name="bamount"> <br> <br>
                </div>

                <div style="background-color: aqua; text-align: center; display: none;" id="forrocket">
                    <h1>Please Enter Your Order Information</h1>
                    Enter your Name <br><input type="text" name="rname"> <br>
                    Full Address <br><input type="text" name="raddress"> <br>
                    Mobile Number <br><input type="number" name="rmobilenumber"> <br>
                    Enter your Rocket number <br><input type="number" name="rnumber"> <br>
                    Amount <br><input type="number" name="ramount"> <br> <br>
                    <input type="hidden" id="rtotal" name="rtotal" value="">

                </div>

                <div style="background-color: aqua; text-align: center; display: none;" id="fornagad">
                    <h1>Please Enter Your Order Information</h1>
                    Enter your Name <br><input type="text" name="nname"> <br>
                    Full Address <br><input type="text" name="naddress"> <br>
                    Mobile Number <br><input type="number" name="nmobilenumber"> <br>
                    Enter your Nagad number <br><input type="number" name="nnumber"> <br>
                    Amount <br><input type="number" name="namount"> <br> <br>
                    <input type="hidden" id="ntotal" name="ntotal" value="">

                </div>

                <div style="background-color: aqua; text-align: center; display: none;" id="forcash">
                    <h3>For Cash on Delivery, You need to paid the delivery charge first for confirm the order</h3>
                    <h1>Please Enter Your Order Information</h1>
                    Enter your Name <br><input type="text" name="cname"> <br>
                    Full Address <br><input type="text" name="caddress"> <br>
                    Mobile Number <br><input type="number" name="cmobilenumber"> <br>
                    Enter Number used for paid <br><input type="number" name="cnumber"> <br>
                    Amount <br><input type="number" name="camount"> <br> <br>
                    <input type="hidden" id="ctotal" name="ctotal" value="">
                </div>

                <input class="btn btn-success" type="submit" id="order" name="order" value="Order Now">
            </div>
            <div class="text-right">
                <a style="margin: -58px 0 0 0;" class="btn btn-danger" href="<?= base_url() . 'user/cartdistroy' ?>">Clear Cart</a>
            </div>

        </form>
    <?php
    } else {
    ?>
        <h1 class="text-center">Your Cart List is Empty</h1>
    <?php
    }
    ?>
</div>
<script>
    $(document).ready(function() {

// var loc = $("#location").val()

// if (loc === "") {
// document.getElementById("order").style.display = "none";
// }

// else
// {
// document.getElementById("order").style.display = "";

// }

        $("#table").on('change', '.qty', function() {

            var el = $(this).closest('tr');
            var id = $(el).find('.id').val();
            var qty = $(el).find('.qty').val();


            $.ajax({
                url: "<?= base_url() . 'user/cartup' ?>",
                type: 'POST',
                data: {
                    id: id,
                    qty: qty
                },
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    // $('body').load('#table');
                    // $('body').load('#table');
                    $('#div123').html(data);
                    // $('.page-wrapper').load('#div123');

                }
            });


        });

        $(".location").on('change', '#location', function() {

            var location = $(this).val();
            const sub = document.getElementById("fixtotal").innerHTML

            if (location == 'dhaka') {
                var charge = document.getElementById("charge").innerHTML = 60

                var total = parseInt(sub) + parseInt(charge)

                document.getElementById("total").innerHTML = total
                $('#btotal').val(total);
                $('#delivarycharge').val(charge);



            } else if (location == 'rangpur') {
                var charge = document.getElementById("charge").innerHTML = 80

                var total = parseInt(sub) + parseInt(charge)

                document.getElementById("total").innerHTML = total
                $('#btotal').val(total);
                $('#delivarycharge').val(charge);

            } else if (location == 'shylet') {
                var charge = document.getElementById("charge").innerHTML = 90

                var total = parseInt(sub) + parseInt(charge)

                document.getElementById("total").innerHTML = total
                $('#btotal').val(total);
                $('#delivarycharge').val(charge);
            } else if (location == 'chittagong') {
                var charge = document.getElementById("charge").innerHTML = 100

                var total = parseInt(sub) + parseInt(charge)

                document.getElementById("total").innerHTML = total
                $('#btotal').val(total);
                $('#delivarycharge').val(charge);

            } else if (location == 'barisal') {
                var charge = document.getElementById("charge").innerHTML = 110

                var total = parseInt(sub) + parseInt(charge)

                document.getElementById("total").innerHTML = total
                $('#btotal').val(total);
                $('#delivarycharge').val(charge);

            } else if (location == 'khulna') {
                var charge = document.getElementById("charge").innerHTML = 120

                var total = parseInt(sub) + parseInt(charge)

                document.getElementById("total").innerHTML = total
                $('#btotal').val(total);
                $('#delivarycharge').val(charge);

            } else if (location == 'mymensingh') {
                var charge = document.getElementById("charge").innerHTML = 70

                var total = parseInt(sub) + parseInt(charge)

                document.getElementById("total").innerHTML = total
                $('#btotal').val(total);
                $('#delivarycharge').val(charge);

            } else if (location == 'rajshahi') {
                var charge = document.getElementById("charge").innerHTML = 100

                var total = parseInt(sub) + parseInt(charge)

                document.getElementById("total").innerHTML = total
                $('#btotal').val(total);
                $('#delivarycharge').val(charge);

            } else {
                var charge = document.getElementById("charge").innerHTML = "Select Your Location"
                document.getElementById("total").innerHTML = sub


            }



        });



        $(".payment").on('click', '#bkash', function() {

            var me = document.getElementById("forbkash");
            me.style.display = "";

            document.getElementById("fornagad").style.display = "none";
            document.getElementById("forrocket").style.display = "none";
            document.getElementById("forcash").style.display = "none";

            document.getElementById("pbody").style.display = "";

            var total = document.getElementById("total").innerHTML

            $('#btotal').val(total);
            var charge = document.getElementById("charge").innerHTML
            $('#delivarycharge').val(charge);

        });

        $(".payment").on('click', '#nagad', function() {

            var me = document.getElementById("fornagad");
            me.style.display = "";

            document.getElementById("forbkash").style.display = "none";
            document.getElementById("forrocket").style.display = "none";
            document.getElementById("forcash").style.display = "none";

            document.getElementById("pbody").style.display = "";

            var total = document.getElementById("total").innerHTML

            $('#btotal').val(total);
            var charge = document.getElementById("charge").innerHTML
            $('#delivarycharge').val(charge);


        });

        $(".payment").on('click', '#rocket', function() {



            var me = document.getElementById("forrocket");
            me.style.display = "";
            document.getElementById("fornagad").style.display = "none";
            document.getElementById("forbkash").style.display = "none";
            document.getElementById("forcash").style.display = "none";
            document.getElementById("pbody").style.display = "";

            var total = document.getElementById("total").innerHTML


            $('#btotal').val(total);
            var charge = document.getElementById("charge").innerHTML
            $('#delivarycharge').val(charge);


        });

        $(".payment").on('click', '#cash', function() {

            var me = document.getElementById("forcash");
            me.style.display = "";
            document.getElementById("fornagad").style.display = "none";
            document.getElementById("forrocket").style.display = "none";
            document.getElementById("forbkash").style.display = "none";

            document.getElementById("pbody").style.display = "";

            var total = document.getElementById("total").innerHTML

            $('#btotal').val(total);
            var charge = document.getElementById("charge").innerHTML
            $('#delivarycharge').val(charge);

        });
    });
</script>