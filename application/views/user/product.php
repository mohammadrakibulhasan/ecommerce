                        <!-- Row -->

                        <div id="fill" style="margin: 10px;" class="row">
                            <form method="post" id="category" class="m-auto" action="">
                                <select class="cat" id="cat" name="cat">
                                    <option value="">Select a category</option>
                                    <?php foreach ($category as $cat) : ?>
                                        <option class="val" value="<?= $cat['category'] ?>"><?= $cat['category'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <br>
                                <span id="from">0</span>
                                <input type="range" id="price" name="price" min="0" max="<?= $price['productPrice'] ?>" value="0">
                                <?= $price['productPrice'] ?>
                                <!-- <input type="submit"> -->
                            </form>
                        </div>
                        <div id="getcat">
                            <div id="product-table" class="row">

                                <!-- column -->
                                <?php foreach ($product as $pro) : ?>
                                    <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                                        <!-- Card -->
                                        <div class="card">
                                            <img style="height: 100px; width: 100%;" class="card-img-top img-responsive" src="<?= base_url() . '/assets/img/product/' . $pro['productImage'] ?>" alt="Card image cap">
                                            <div class="card-block">
                                                <h4 style="height: 30px; text-align: center;" class="card-title"><?= $pro['productName'] ?>
                                                    <br>
                                                    <?= $pro['productPrice'] ?> <s><?= $pro['oldPrice'] ?></s> Taka
                                                </h4>
                                                <br>
                                                <p style="height: 50px; overflow: hidden;" class="card-text"><?= $pro['details'] ?></p>
                                                <a style="width: 100%; margin: auto; " href="<?= base_url() . 'product/view?pid=' . $pro['id'] ?>" class="btn btn-primary">View</a>
                                            </div>
                                        </div>
                                        <!-- Card -->
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>

                        <!-- Row -->


                        <script>
                            $(document).ready(function() {

                                $("#category").on('change', '.cat', function() {

                                    var cate = $(this).val();
                                    // var id = $(el).find('.id').val();
                                    // var qty = $(el).find('.qty').val();


                                    $.ajax({
                                        url: "<?= base_url() . 'user/fill' ?>",
                                        type: 'POST',
                                        data: {
                                            // id: id,
                                            cate1: cate
                                        },
                                        error: function() {
                                            alert('Something is wrong');
                                        },
                                        success: function(data) {
                                            // $('body').load('http://localhost/ecom/user/product'+' body > *');
                                            // $('#getcat').append(cate)
                                            // $('#fill').remove()
                                            $('#getcat').html(data);
                                            // $('#getcat').load('#product-table');
                                            // console.log(data)
                                            // alert(cate);


                                        }
                                    });


                                });


                                $("#category").on('change', '#price', function() {


                                    var price = $(this).val();
                                    $("#from").html(price)
                                    // var id = $(el).find('.id').val();
                                    // var qty = $(el).find('.qty').val();


                                    $.ajax({
                                        url: "<?= base_url() . 'user/fill' ?>",
                                        type: 'POST',
                                        data: {
                                            // id: id,
                                            price: price
                                        },
                                        error: function() {
                                            alert('Something is wrong');
                                        },
                                        success: function(data) {
                                            // $('body').load('http://localhost/ecom/user/product'+' body > *');
                                            // $('#getcat').append(cate)
                                            // $('#fill').remove()
                                            $('#getcat').html(data);
                                            // $('#getcat').load('#product-table');
                                            // console.log(data)
                                            // alert(price);


                                        }
                                    });


                                });
                            });
                        </script>