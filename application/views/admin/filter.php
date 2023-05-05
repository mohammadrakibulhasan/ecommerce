<div class="modal fade" id="add" role="dialog">
    <div class="modal-dialog modal-sm">

        <!-- মোডাল কন্টেন্ট -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">ADD Filter</h4>
            </div>
            <div class="modal-body">
                <!-- <p>ADD</p> -->
                <form class="text-center" action="<?= base_url() . 'admin/addfilter' ?>" method="post">
                    <input type="text" name="filname" placeholder="Enter your Filter Name"> <br>
                    <input type="text" name="filorder" placeholder="Enter your Sort Order"> <br> <br>
                    <input class="btn btn-success" type="submit" value="ADD" name="submit">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="modalId" role="dialog">
    <div class="modal-dialog modal-sm">

        <!-- মোডাল কন্টেন্ট -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <!-- <h4 class="modal-title">মোডাল হেডার</h4> -->
                <h4 class="modal-title">Update Filter</h4>
            </div>
            <div class="modal-body text-center">
                <!-- <p>মোডাল বডি। এখানে মোডালের কন্টেন্ট রাখা হয়।</p> -->
                <form id="updateForm" method="post">
                    <!-- <input type="text" name="catname"> <br> <br> -->
                    <input type="text" name="filname" placeholder="Enter your Filter Name"> <br>
                    <input type="text" name="filorder" placeholder="Enter your Sort Order"> <br> <br>
                    <input type="hidden" name="id" id="id">
                    <input class="btn btn-success" type="submit" id="submit" value="Update" name="submit">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<h1 style="color: green;" class="text-center" id="msg"></h1>
<div id="wrap">
    <div class="details text-center table-responsive">
        <h1>Filter Details</h1>
        <a class="btn btn-info" href="" data-toggle="modal" data-target="#add">Add New</a>
        <form action="<?= base_url() . 'admin/multi' ?>" method="post">

            <table id="table" class="table">
                <tr>
                    <th class="text-center"><input type="checkbox" id="topcheck" onclick='selects()' value="Select All">
                    </th>
                    <th class="text-center">ID</th>
                    <?php
                    if ($order == 'ASC') {
                    ?>

                        <th class="text-center"><a href="<?= base_url() . 'admin/filter?sort=' . 'desc' ?>">Name</a><i class="fa-solid fa-chevron-up"></i></th>
                    <?php
                    } else {
                    ?>
                        <th class="text-center"><a href="<?= base_url() . 'admin/filter?sort=' . 'asc' ?>">Name</a><i class="fa-solid fa-chevron-down"></i></th>
                    <?php
                    }
                    ?>
                       <?php
                    if ($count == 'ASC') {
                    ?>

                        <th class="text-center"><a href="<?= base_url() . 'admin/filter?count=' . 'desc' ?>">Order</a><i class="fa-solid fa-chevron-up"></i></th>
                    <?php
                    } else {
                    ?>
                        <th class="text-center"><a href="<?= base_url() . 'admin/filter?count=' . 'asc' ?>">Order</a><i class="fa-solid fa-chevron-down"></i></th>
                    <?php
                    }
                    ?>
                    <th class="text-center">Action</th>
                </tr>
                <?php foreach ($filter as $f) : ?>
                    <tr id="<?php echo $f['id'] ?>">
                        <td><input type="checkbox" id="id" name="id[]" value="<?= $f['id'] ?>">
                        </td>

                        <td><?= $f['id'] ?></td>
                        <td><?= $f['filtername'] ?></td>
                        <td><?= $f['sortorder'] ?></td>
                        <td><a class="edit btn btn-info btn-sm" data-toggle="modal" data-target="#modalId">
                                <i class="fa-solid fa-pen"></i></a> <a class="delete btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php endforeach ?>
                <br>
                <input class="btn btn-danger" type="submit" value="delete">

            </table>
        </form>
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
                    url: "<?= base_url() . 'admin/deletefilter' ?>",
                    type: 'POST',
                    data: {
                        id: id
                    },
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                        $("#" + id).remove();
                        alert("Record removed successfully");
                    }
                });
            }
        });
        $("#table").on('click', '.edit', function() {

            var id = $(this).parents("tr").attr("id");
            $.ajax({
                url: "<?= base_url() . 'admin/editfilter' ?>",
                type: 'POST',
                data: {
                    id: id
                },
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    var userData = JSON.parse(data);
                    $("input[name='id']").val(userData.id);
                    $("input[name='filname']").val(userData.filtername);
                    $("input[name='filorder']").val(userData.sortorder);
                    // alert(id);
                }
            });
        });

        $(document).on('submit', '#updateForm', function(e) {
            e.preventDefault();
            var id = $(this).find("input[name='id']").val();
            var filname = $(this).find("input[name='filname']").val();
            var filorder = $(this).find("input[name='filorder']").val();

            // console.log(id+category);
            $.ajax({
                method: "POST",
                url: "<?= base_url() . 'admin/updatefilter' ?>",
                data: {
                    id: id,
                    filname: filname,
                    filorder: filorder
                },
                success: function(data) {
                    // $('#wrap').load('#wrap');
                    $('#msg').html(data);
                    $("#close").click();
                    $("#wrap").load(location.href + " #wrap");
                    // alert(id+category)

                }
            });
        });


    });
</script>