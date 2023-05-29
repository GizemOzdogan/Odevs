<?php
require_once 'app/backend/core/Init.php';

$query_id = $_GET['id'];

$product = new Product();
$product->find($query_id);
$product = $product->data();

$product_detail = new ProductDetail();
$product_detail->find($query_id);
$product_detail = $product_detail->data();

$product_images = new ProductImage();
$product_images->getAll($query_id);
$product_images = $product_images->data();
