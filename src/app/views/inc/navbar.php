<nav class="navbar navbar-expand-lg navbar-dark bg-dark  mb-3">
    <div class="container">
        <a class="navbar-brand" href="<?= URL_ROOT ?>"><?php echo SITE_NAME; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= URL_ROOT ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL_ROOT ?>product">Product</a>
                </li>
            </ul>
        </div>
    </div>
</nav>