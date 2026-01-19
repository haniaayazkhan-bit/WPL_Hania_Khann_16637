<?php
include 'backend/db.php';
requireAuth();  // Authorization: Require login
$action = $_GET['action'] ?? 'list';
$table = $_GET['table'] ?? 'orders';  // Switch between orders and cakes

// CRUD Operations: Handle Create, Update, Delete (soft)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($action == 'create' || $action == 'update') {
        $data = $_POST;
        if ($table == 'orders') {
            $name = $data['name'];
            $phone = $data['phone'];
            $address = $data['address'];
            $cart = json_encode($data['cart'] ?? []);
            $total = $data['total'] ?? 0;
            if ($action == 'create') {
                $conn->query("INSERT INTO orders (name, phone, address, cart, total) VALUES ('$name', '$phone',