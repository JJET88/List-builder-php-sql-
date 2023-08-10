
<?php require_once ViewDir."/template/header.php"?>
<h1>
    Create New List
</h1>
<div class=" my-3 d-flex  justify-content-between">
    <a href="<?= route("list")?>" class=" btn btn-outline-primary">All List</a>
    
</div>
<div class="border rounded p-5">
    <form action="<?= route('list-store')?>" method="post">
        <div class="row align-items-end">
            <div class="col">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="col">
            <label for="" class="form-label">Money Amount</label>
                <input type="number" name="money" class="form-control" required>
            </div>
            <div class="col">
                <button class=" btn btn-lg btn-primary">Add list</button>
            </div>
        </div>
    </form>
</div>






<?php require_once ViewDir."/template/footer.php"?>