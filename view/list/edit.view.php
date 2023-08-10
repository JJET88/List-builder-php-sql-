
<?php require_once ViewDir."/template/header.php"?>
<h1>
    Edit List
</h1>
<div class=" my-3 d-flex  justify-content-between">
    <a href="<?= route("list")?>" class=" btn btn-outline-primary">All List</a>
    
</div>
<div class="border rounded p-5">
    <form action="<?= route('list-update')?>" method="post">
    <!-- **** create put method-->
     <input type="hidden" name="_method" value="put" >

    <input type="hidden"  value="<?= $list["id"]?>" name="id" >
        <div class="row align-items-end">
            <div class="col">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" value="<?= $list["name"]?>" class="form-control">
            </div>
            <div class="col">
            <label for="" class="form-label">Money Amount</label>
                <input type="number" name="money"  value="<?= $list["money"]?>" class="form-control">
            </div>
            <div class="col">
                <button class=" btn btn-lg btn-primary">Update list</button>
            </div>
        </div>
    </form>
</div>






<?php require_once ViewDir."/template/footer.php"?>