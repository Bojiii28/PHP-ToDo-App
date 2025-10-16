<?php
include __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/controllers/TodoController.php';

$controller = new TodoController($conn);

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'store') {
        $controller->store($_POST);
    } elseif ($action === 'update') {
        $controller->update((int)$_POST['id'], $_POST);
    }
}

// Show main view
include __DIR__ . '/views/index.php';
