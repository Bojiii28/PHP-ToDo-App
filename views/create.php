<?php
include __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/controllers/TodoController.php';

$controller = new TodoController($conn);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store($_POST);
}
?>

<link rel="stylesheet" href="../public/assets/style.css">

<h2>➕ Add New Task</h2>
<form method="POST" action="">
    <label>Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" rows="4" cols="40"></textarea><br><br>

    <label>Status:</label><br>
    <select name="is_done">
        <option value="0">⏳ Pending</option>
        <option value="1">✅ Done</option>
    </select><br><br>

    <button type="submit">Save Task</button>
</form>

<br>
<a href="index.php">⬅ Back to List</a>