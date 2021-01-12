<?php

/**
 * 
 */
class AppointmentController {

    public function __construct() {
        $this->view = new View();
    }

    //PROVIDER

    public function showLoginView() {
        $this->view->show("registerProduct.php", null);
    }

    
    public function showStartingMain() {
        require 'model/ProductoModel.php';
        $product = ProductoModel::singleton();

        $products['products'] = $product->show_all_products();

        $this->view->show("startingMain.php", $products);
    }

    public function showSearchProducts() {
        $this->view->show("searchProducts.php", null);
    }

    public function searchProducts() {
        require 'model/ProductoModel.php';
        $product = ProductoModel::singleton();
        $products['searchedProducts'] = $product->search_products($_POST['name']);
        $this->view->show("listSearchedProducts.php", $products);
    }

    public function showDeleteProduct() {
        $id = $_GET['id'];
        require 'model/ProductoModel.php';
        $products = ProductoModel::singleton();
        $product['productByCode'] = $products->search_product_by_id($id);
        $this->view->show("deleteProduct.php", $product);
    }

    public function deleteProduct() {
        $id = $_GET['id'];
        require 'model/ProductoModel.php';
        $products = ProductoModel::singleton();
        $products->delete_product($id);
        $product['productByCode'] = $products->search_product_by_id($id);
        $this->view->show("deleteProduct.php", $product);
    }

    public function showUpdateProduct() {
        $id = $_GET['id'];
        require 'model/ProductoModel.php';
        $product = ProductoModel::singleton();
        $productToUpdate['product'] = $product->search_product_by_id($id);
        $this->view->show("updateProduct.php", $productToUpdate);
    }

    public function update_product() {
        require 'model/ProductoModel.php';
        $product = ProductoModel::singleton();
        $product->updateProduct($_POST['id'], $_POST['name'], $_POST['price'], $_POST['description'], $_POST['quantity']);
        echo 'Producto actualizado';
    }

    public function showSynchronization() {
        $this->view->show("synchronization.php", null);
    }

    public function sendProductsAPI() {
        require 'model/ProductoModel.php';
        $product = ProductoModel::singleton();
        $products = $product->show_all_products();

        $data = array(
            'id' => $_POST['id'],
            'key' => $_POST['key']
        );
        $url = 'https://api-aplicada.herokuapp.com/api/provider/key_validation.php';
        $options = array(
            'http' => array(
                'method' => 'POST',
                'content' => http_build_query($data),
                'header' => "Content-type: application/x-www-form-urlencoded\r\n"
            )
        );
        $context = stream_context_create($options);
        $json = json_decode(file_get_contents($url, false, $context));


        if ($json == 'correct') {

            $data = array(
                'id' => $_POST['id'],
                'stock' => $products
            );
            $url = 'https://api-aplicada.herokuapp.com/api/provider/save_stock.php';
            $options = array(
                'http' => array(
                    'method' => 'POST',
                    'content' => http_build_query($data),
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n"
                )
            );
            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            echo "Los productos han sido enviados";
        } else {
            echo 'No se pudo hacer la sincronización';
        }
    }

    public function showGenerateKey() {
        $this->view->show("generateKey.php", null);
    }

    public function resquestKeyApi() {
        $base = 'https://api-aplicada.herokuapp.com/api/provider/key_generation.php?id=' . $_POST['id'];
        $json = file_get_contents($base);
        $json = json_decode($json);
        echo $json;
    }

}
