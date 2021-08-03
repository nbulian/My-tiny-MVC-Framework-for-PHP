<?php require APP_ROOT . "/app/views/inc/header.php"; ?>

<h1><?php echo $data["title"] ?></h1>

<a href="<?= URL_ROOT; ?>product/create/" class="btn btn-dark">Create</a>

<div class="container mt-3">
    <div class="row">
        <div class="col-sm">
            ID
        </div>
        <div class="col-sm">
            Title
        </div>
        <div class="col-sm">
            Description
        </div>
        <div class="col-sm">
            Price
        </div>
        <div class="col-sm">
            Sku
        </div>
        <div class="col-sm">
            
        </div>
    </div>
    <? foreach ($data["products"] as $product) {
    ?>
        <div class="row">
            <div class="col-sm">
                <?= $product->id ?>
            </div>
            <div class="col-sm">
                <?= $product->title ?>
            </div>
            <div class="col-sm">
                <?= $product->description ?>
            </div>
            <div class="col-sm">
                <?= $product->price ?>
            </div>
            <div class="col-sm">
                <?= $product->sku ?>
            </div>
            <div class="col-sm">
                <a href="<?= URL_ROOT . "product/show/" . $product->id ?> class="">Show</a>
            </div>
        </div>
    <?
    } ?>
</div>

<?php require APP_ROOT . "/app/views/inc/footer.php"; ?>