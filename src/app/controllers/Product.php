<?php

/**
 * Every page loads from view folder
 * in order to load a view inside a folder of the view folder
 * the folder/filename must be parsed
 */
class Product extends Controller
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = $this->model("ProductModel");
    }

    public function index()
    {
        $data = [
            "title" => "Products",
            "products" => $this->productModel->getAll()
        ];

        $this->view("product/index", $data);
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                "title" => trim($_POST["title"]),
                "description" => trim($_POST["description"]),
                "price" => $_POST["price"],
                "sku" => trim($_POST["sku"]),
                "errors" => []
            ];

            $data = $this->validate($data);

            if (count($data["errors"]) > 0) {
                return $this->view("product/create", $data);
            }

            if ($lastInsertId = $this->productModel->create($data)) {
                return header("location:" . URL_ROOT . "product/show/" . $lastInsertId);
            } else {
                die("Something went wrong");
            }
        } else {
            $data = [
                "title" => "",
                "description" => "",
                "price" => "",
                "sku" => "",
            ];

            $this->view("product/create", $data);
        }
    }

    public function edit($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                "id" => $id,
                "title" => trim($_POST["title"]),
                "description" => trim($_POST["description"]),
                "price" => $_POST["price"],
                "sku" => trim($_POST["sku"]),
                "errors" => []
            ];

            $data = $this->validate($data);

            if (count($data["errors"]) > 0) {
                return $this->view("product/edit", $data);
            }

            if ($this->productModel->update($data)) {
                return header("location:" . URL_ROOT . "product/show/" . $id);
            } else {
                die("Something went wrong");
            }
        } else {

            if ($product = $this->productModel->getById($id)) {

                $data = [
                    "id" => $id,
                    "title" => $product->title,
                    "description" => $product->description,
                    "price" => $product->price,
                    "sku" => $product->sku,
                ];

                return $this->view("product/edit", $data);
            }

            http_response_code(404);
            die;
        }
    }

    public function delete($id = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($this->productModel->delete($id)) {
                return header("location:" . URL_ROOT . "product");
            } else {
                die("Something went wrong");
            }
        }

        http_response_code(404);
        die;
    }

    public function show($id = null)
    {
        if ($product = $this->productModel->getById($id)) {
            return $this->view("product/show", [
                "title" => "Show product", "product" => $product
            ]);
        }

        http_response_code(404);
        die;
    }

    private function validate($data)
    {
        //Validate title
        if (empty($data["title"])) {
            $data["errors"]["title"] = "Please enter title";
        }

        //Validate description
        if (empty($data["description"])) {
            $data["errors"]["description"] = "Please enter description";
        }

        //Validate price
        if (empty($data["price"])) {
            $data["errors"]["price"] = "Please enter price";
        } else {
            if (!is_numeric($data["price"])) {
                $data["errors"]["price"] = "Price must be numeric";
            }
        }

        //Validate sku
        if (empty($data["sku"])) {
            $data["errors"]["sku"] = "Please enter sku";
        }

        return $data;
    }
}
