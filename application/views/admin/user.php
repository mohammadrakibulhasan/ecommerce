<div class="details text-center table-responsive">
    <h1>Users Details</h1>
    <table class="table">
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Type</th>
        </tr>
        <?php foreach($user as $user):?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['type'] ?></td>
        </tr>
        <?php endforeach?>
    </table>
</div>