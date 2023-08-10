<?php require_once ViewDir . "/template/header.php" ?>
<h1>
    My Lists
</h1>
<div class=" my-3 d-flex  justify-content-between">
    <a href="<?= route("list-create") ?>" class=" btn btn-outline-primary">Create New</a>
    <form action="">

        <div class="input-group">

            <input type="text" name="q" value="<?php if (isset($_GET['q'])) : ?><?= $_GET['q'] ?><?php endif; ?>" class="form-control" placeholder="search">
            <?php if ($_GET['q']) : ?>
                <a href="<?= route("list")?>" class=" btn border">
                <i class="bi bi-x text-danger fs-5 "></i>
                </a>
            <?php endif; ?>
            <button type="submit" class=" btn btn-outline-primary ">Search</button>

        </div>
    </form>

</div>
<table class=" table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Money</th>
            <th>Control</th>
            <th>Created_at</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lists as $list) : ?>
            <tr>
                <td>
                    <?= $list['id'] ?>
                </td>
                <td>
                    <?= $list['name'] ?>
                </td>
                <td>
                    <?= $list['money'] ?>
                </td>
                <td>
                    <a href="<?= route('list-edit', ['id' => $list['id']]) ?>" class=" btn btn-sm btn-outline-primary">Edit</a>
                    <form class=" d-inline-block" action="<?= route("list-delete") ?>" method="post">
                        <input type="hidden" name="id" value="<?= $list['id'] ?>">
                        <input type="hidden" name="_method" value="delete">
                        <button class=" btn btn-sm btn-outline-danger">Delete</button>
                    </form>


                </td>
                <td>
                    <?= $list['created_at'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



<?php require_once ViewDir . "/template/footer.php" ?>