<?php

/**
 * 
 */
class UserController {

    public function __construct() {
        $this->view = new View();
    }

    //PROVIDER

    public function showLoginView() {
        $this->view->show("loginView.php", null);
    }

    public function showIndexView() {
        $this->view->show("indexView.php", null);
    }

    public function showAdministratorMainView() {
        $this->view->show("AdministratorMainView.php", null);
    }

    public function showStartingMain() {
        require 'model/UserModel.php';
        $product = UserModel::singleton();

        $products['products'] = $product->show_all_products();
        print_r($products);
//        $this->view->show("startingMain.php", null);
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

}
