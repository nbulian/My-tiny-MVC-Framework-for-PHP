<?php require APP_ROOT . "/app/views/inc/header.php"; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Edit product</h2>
            <p>Please fill the form to edit the product</p>
            <form action="<?= URL_ROOT . "product/edit/" . $data["id"]; ?>" method="post">
                <div class="form-group">
                    <label for="name">Title <sup>*</sup></label>
                    <input type="text" name="title" class="form-control form-control-lg <?= (!empty($data["errors"]['title'])) ? 'is-invalid' : ''; ?>" value="<?= $data['title']; ?>">
                    <span class="invalid-feedback"><?= $data["errors"]['title']; ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Description <sup>*</sup></label>
                    <input type="text" name="description" class="form-control form-control-lg <?= (!empty($data["errors"]['description'])) ? 'is-invalid' : ''; ?>" value="<?= $data['description']; ?>">
                    <span class="invalid-feedback"><?= $data["errors"]['description']; ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Price <sup>*</sup></label>
                    <input type="text" name="price" class="form-control form-control-lg <?= (!empty($data["errors"]['price'])) ? 'is-invalid' : ''; ?>" value="<?= $data['price']; ?>">
                    <span class="invalid-feedback"><?= $data["errors"]['price']; ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Sku <sup>*</sup></label>
                    <input type="text" name="sku" class="form-control form-control-lg <?= (!empty($data["errors"]['sku'])) ? 'is-invalid' : ''; ?>" value="<?= $data['sku']; ?>">
                    <span class="invalid-feedback"><?= $data["errors"]['sku']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Submit" class="btn btn-success btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APP_ROOT . "/app/views/inc/footer.php"; ?>