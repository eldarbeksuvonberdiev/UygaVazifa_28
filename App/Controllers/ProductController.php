<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController
{

    public function index()
    {
        $products = new Product;
        $allp = $products->all();
        return view("Product/index", "Products",$allp);
    }

    public function withApi()
    {
        $products = new Product;
        $allp = $products->all();
        header("Content-Type: application/json");
        echo json_encode(['models'=> $allp],JSON_PRETTY_PRINT);
        exit;
        // return view("WithApi/index", "Products",$allp);
    }

    public function delete()
    {
        if(isset($_POST['ok'])){
            $id =$_POST['id'];
            $products = new Product;
            $allp = $products->delete($id);
            header("location: /");
        }
    }

    public function newProduct()
    {
        if (isset($_POST['ok'])) {
            $name = htmlspecialchars(strip_tags($_POST['name']));
            $price = htmlspecialchars(strip_tags($_POST['price']));
            $quantity = htmlspecialchars(strip_tags($_POST['quantity']));
            $data = [
                "name" => $name,
                "quantity" => $quantity,
                "price" => $price
            ];

            $product = new Product();
            $product->create($data);
            header("location: /");
        }
    }

    public function ApinewProduct()
    {
        if (isset($_POST['ok'])) {
            $name = htmlspecialchars(strip_tags($_POST['name']));
            $price = htmlspecialchars(strip_tags($_POST['price']));
            $quantity = htmlspecialchars(strip_tags($_POST['quantity']));
            $data = [
                "name" => $name,
                "quantity" => $quantity,
                "price" => $price
            ];
            $product = new Product();
            $product->create($data);
            header("location: /");
        }
    }
}
