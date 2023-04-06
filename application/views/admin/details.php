<div class="details">
    <h1 class="text-center">Your Details</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
        </tr>
        <tr>
            <td><?= $admin['id'] ?></td>
            <td><?= $admin['username'] ?></td>
            <td><?= $admin['email'] ?></td>
            <td><?= $admin['type'] ?></td>
        </tr>
    </table>
    <div class="img">

    <img src="<?= base_url() . 'asset/img/' . $admin['image'] ?>" alt="">

    <form action="<?= base_url() . 'user/uploadpic' ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="image" id="image">
  <input type="submit" value="Upload Image" name="submit">
    </form>
    </div>

</div>