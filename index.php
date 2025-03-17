<?php

include __DIR__ . '/views/includes/header.php';


require_once __DIR__ . '/controllers/sinhVienController.php';

$controller = new SinhVienController();
$action = $_GET["action"] ?? "index";
$id = $_GET["id"] ?? null;

if (method_exists($controller, $action)) {
    $controller->$action($id);
} else {
    echo "Trang không tồn tại!";
}