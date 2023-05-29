<?php
require_once 'app/backend/core/Init.php';
$product = new Product();
$product->getAll();
$data = $product->data();
