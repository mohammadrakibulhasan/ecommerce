<h1 style="color: green;" class="text-center" id="msg"></h1>

<div class="row" id="wrap">

    <div class="col-lg-9 col-md-9 col-sm-12">

        <div class="details text-center table-responsive">
            <h1>Product List</h1>
            <a class="btn btn-info" href="<?= base_url() . 'admin/addproduct' ?>">Add New</a>
            <form action="<?= base_url() . 'admin/multi' ?>" method="post">

                <table id="table" class="table">
                    <tr>
                        <th class="text-center"><input type="checkbox" id="topcheck" onclick='selects()' value="Select All">
                        </th>
                        <th class="text-center">Image</th>
                        <?php
                        if ($order == 'ASC') {
                        ?>

                            <th class="text-center"><a href="<?= base_url() . 'admin/product?sort=' . 'desc' ?>">Name</a><i class="fa-solid fa-chevron-up"></i></th>
                        <?php
                        } else {
                        ?>
                            <th class="text-center"><a href="<?= base_url() . 'admin/product?sort=' . 'asc' ?>">Name</a><i class="fa-solid fa-chevron-down"></i></th>
                        <?php
                        }
                        ?>
                        <th class="text-center">Model</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php foreach ($product as $pro) : ?>
                        <tr id="<?php echo $pro['id'] ?>">
                            <td><input type="checkbox" id="id" name="id[]" value="<?= $pro['id'] ?>">
                            </td>

                            <td><img src="<?= base_url() . '/assets/img/product/' . $pro['image'] ?>" height="30px" width="50px" alt=""></td>
                            <td>
                                <?= $pro['productName'] ?>
                                <?php 
                                    if($pro['status'] == 1){
                                        echo '<p style="color: green;">Enabled</p>';
                                    }
                                    else
                                    {
                                        echo '<p style="color: red;">Disabled</p>';
                                    }
                                  ?>
                            </td>
                            <td><?= $pro['productModel'] ?></td>
                            <td>

                                <?php
                                $d = date("Y-m-d");
                                $c = 0;
                                $dd = 0;
                                foreach ($special as $sp) :
                                    if ($sp['productid'] == $pro['id']) {
                                        $c++;
                                        if ($d >= $sp['date_start'] && $d <= $sp['date_end']) {

                                            $dd++;
                                            if ($sp['price'] != null) {
                                ?>
                                                <s><?= $pro['price'] ?></s>
                                                <br>
                                                <p style="color: red;"><?= $sp['price'] ?></p>

                                            <?php
                                                // break;
                                            }
                                        }
                                        if ($dd == 0) {
                                            ?>
                                            <p><?= $pro['price'] ?></p>
                                    <?php
                                        }
                                    }
                                endforeach;
                                if ($c == 0) {
                                    ?>
                                    <p><?= $pro['price'] ?></p>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $pro['quantity'] ?></td>
                            <td><a class="edit btn btn-info btn-sm" href="<?= base_url() . 'admin/upprod?id=' . $pro['id'] ?>">
                                    <i class="fa-solid fa-pen"></i></a> <a class="delete btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                    <br>
                    <input class="btn btn-danger" type="submit" value="delete">

                </table>
            </form>
        </div>
        <!-- <form action="<?= base_url() . 'admin/multi' ?>" method="post">
        <input type="checkbox" id="vehicle1" name="id[]" value="1">
        <label for="vehicle1"> I have a bike</label><br>
        <input type="checkbox" id="vehicle2" name="id[]" value="2">
        <label for="vehicle2"> I have a car</label><br>
        <input type="checkbox" id="vehicle3" name="id[]" value="3">
        <label for="vehicle3"> I have a boat</label><br><br>
        <input type="submit" value="Submit">
    </form> -->
    </div>
    <div id="filter-product" class="col-lg-3 col-md-3 col-sm-12">
        <div class="card">
            <div class="card-header"><i class="fas fa-filter"></i> Filter</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="input-name" class="form-label">Product Name</label>
                    <input type="text" name="filter_name" value="" placeholder="Product Name" id="input-name" list="list-name" class="form-control">
                    <datalist id="list-name">
                        <?php
                        foreach ($product as $pro) :
                        ?>
                            <option><?= $pro['productName'] ?></option>
                        <?php
                        endforeach;
                        ?>
                    </datalist>
                </div>
                <div class="mb-3">
                    <label for="input-model" class="form-label">Model</label> <input type="text" name="filter_model" value="" placeholder="Model" id="input-model" list="list-model" class="form-control">
                    <datalist id="list-model">
                        <?php
                        foreach ($product as $pro) :
                        ?>
                            <option><?= $pro['productModel'] ?></option>
                        <?php
                        endforeach;
                        ?>
                    </datalist>
                </div>
                <div class="mb-3">
                    <label for="input-price" class="form-label">Price</label> <input type="text" name="filter_price" value="" placeholder="Price" id="input-price" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="input-quantity" class="form-label">Quantity</label> <input type="text" name="filter_quantity" value="" placeholder="Quantity" id="input-quantity" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="input-status" class="form-label">Status</label> <select name="filter_status" id="input-status" class="form-select">
                        <option value=""></option>
                        <option value="1">Enabled</option>
                        <option value="0">Disabled</option>
                    </select>
                </div>
                <div class="text-end">
                    <button type="button" id="button-filter" class="btn btn-light"><i class="fas fa-filter"></i> Filter</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function selects() {
        var ele = document.getElementsByName('id[]');
        var topCheckbox = document.getElementById('topcheck');
        if (topCheckbox.checked) {

            for (var i = 0; i < ele.length; i++) {
                if (ele[i].type == 'checkbox') {
                    ele[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < ele.length; i++) {
                if (ele[i].type == 'checkbox') {
                    ele[i].checked = false;
                }
            }
        }

    }
</script>
<script>
    $(document).ready(function() {

        $("#table").on('click', '.delete', function() {

            var id = $(this).parents("tr").attr("id");

            if (confirm('Are you sure to remove this record ?')) {
                $.ajax({
                    url: "<?= base_url() . 'admin/deleteproduct' ?>",
                    type: 'POST',
                    data: {
                        id: id
                    },
                    error: function() {
                        alert('Something is wrong');
                        // alert(id);
                    },
                    success: function(data) {
                        $("#" + id).remove();
                        alert("Record removed successfully");
                    }
                });
            }
        });
        // $("#table").on('click', '.edit', function() {

        //     var id = $(this).parents("tr").attr("id");
        //     $.ajax({
        //         url: "<?= base_url() . 'admin/editcategory' ?>",
        //         type: 'POST',
        //         data: {
        //             id: id
        //         },
        //         error: function() {
        //             alert('Something is wrong');
        //         },
        //         success: function(data) {
        //             var userData = JSON.parse(data);
        //             $("input[name='id']").val(userData.id);
        //             $("input[name='catname']").val(userData.category);
        //             // alert(id);
        //         }
        //     });
        // });

        // $(document).on('submit', '#updateForm', function(e) {
        //     e.preventDefault();
        //     var id = $(this).find("input[name='id']").val();
        //     var category = $(this).find("input[name='catname']").val();

        //     // console.log(id+category);
        //     $.ajax({
        //         method: "POST",
        //         url: "<?= base_url() . 'admin/updatecategory' ?>",
        //         data: {
        //             id: id,
        //             category: category
        //         },
        //         success: function(data) {
        //             // $('#wrap').load('#wrap');
        //             $('#msg').html(data);
        //             $("#close").click();
        //             $("#wrap").load(location.href + " #wrap");
        //             // alert(id+category)

        //         }
        //     });
        // });


    });
</script>