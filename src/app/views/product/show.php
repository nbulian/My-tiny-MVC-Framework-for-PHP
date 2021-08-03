<?php require APP_ROOT . "/app/views/inc/header.php"; ?>

<h2><?php echo $data["title"] ?></h2>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2><?php echo $data["title"] ?></h2>
            <h6 class="card-subtitle mb-2 text-muted">SKU: <?= $data['product']->sku; ?></h6>
            <h6 class="card-subtitle mb-2 text-muted">Price: <?= $data['product']->price; ?></h6>
            <div class="form-group">
                <label for="name">Title</label>
                <p class="card-text"><?= $data['product']->title; ?> </p>
            </div>
            <div class="form-group">
                <label for="name">Description</label>
                <p class="card-text"><?= $data['product']->description; ?> </p>
            </div>
            <div class="d-flex  mb-3">
                <a href="<?= URL_ROOT; ?>product/edit/<?php echo $data['product']->id; ?>" class="btn btn-primary">Edit</a>
                &nbsp
                <form class="text-right float-right" action="<?= URL_ROOT; ?>product/delete/<?= $data['product']->id; ?> " method="post">
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </div>
            <div class="row">
                <div class="col">
                    <a href="<?= URL_ROOT; ?>product/" class="btn btn-dark btn-block">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APP_ROOT . "/app/views/inc/footer.php"; ?>