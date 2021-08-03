# What does mean MVC?
MVC is a design pattern used to decouple data (Models), the user-interfaces (Views), and application logic (Controllers).

# Folders structure:

├── src
│   ├── app
│   │   ├── bootstrap.php
│   │   ├── views
│   │   │   ├── inc
│   │   │   │   ├── footer.php
│   │   │   │   ├── header.php
│   │   │   │   └── navbar.php
│   │   │   ├── home.php
│   │   │   └── product
│   │   │       ├── show.php
│   │   │       ├── create.php
│   │   │       ├── edit.php
│   │   │       └── index.php
│   │   ├── controllers
│   │   │   ├── Site.php
│   │   │   └── Product.php
│   │   └── models
│   │       └── ProductModel.php
│   ├── config
│   │   └── config.php
│   ├── libraries
│   │   ├── Controller.php
│   │   ├── Database.php
│   │   └── Core.php
│   ├── public
│   │   ├── css
│   │   ├── js
│   │   └── index.php
│   └── log
├── Dockerfile
├── docker-compose.yml
└── README.md

# Model
A model is an object that represents your data. The model will be modeled on your database table structure and it will interact with the database operations (create, read, update and delete or CRUD).

Products table example:

```
CREATE TABLE IF NOT EXISTS products (
  id int(10) NOT NULL auto_increment,
  title varchar(255) collate utf8_unicode_ci NOT NULL,
  description text collate utf8_unicode_ci,
  price decimal(12,5) NOT NULL,
  sku varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
```

# View
The view is responsible to take in the data from the controller and display those values. There are a lot of template engines for PHP, from Twig to Blade. For this simple MVC PHP framework, we’ll use only plain HTML for simplicity.

We could create a new folder called product under the views folder and then create the files for each CRUD action like create.php, edit.php, index.php (list) and show.php.

For instance src/app/views/product/index.php

```
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
```
If take a look at src/app/views/inc/ folder, you'll find the footer.php, header.php and navbar.php that complete the full view.

# Controller
The controller is the heart of the application logic. Is responsible for accepting the input and convert it to commands for the model or view.
Here is the content for a simple controller that handle the home page, for a more complex example please take a look at src/app/controllers/Product.php

```
class Site extends Controller
{
    public function index()
    {
        $data = [
            "title" => "My PHP tiny MVC Framework",
        ];

        $this->view("home", $data);
    }
}
```

# Routes
Inside src/app/libraries/Core.php is where our routing system comes in. Our constructor runs the getUrl() function which gets the url parsed , filters it (for security reasons) and returns the value as an array. Also, this Core class has some properties with some default values which are $currentController which loads the Pages controller as default, $currentMethod which by default loads the index method of any class parsed and the params which are not compulsory and by default set to empty .

# Getting started
This repo include the docker files needed to run the project. 

### Run docker
docker-compose up --build

### Access containers
docker exec -it app bash
docker exec -it db bash

### Stop all containers
docker stop $(docker ps -aq)

### delete all images
docker rmi -f $(docker images -a -q)
