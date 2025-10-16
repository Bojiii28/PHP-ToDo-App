<?php
include __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/controllers/TodoController.php';

$controller = new TodoController($conn);

if (!isset($_GET['id'])) {
    die("Missing task ID");
}

$id = $_GET['id'];
$todo = $controller->getTodoById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($id, $_POST);
}
?>

<link rel="stylesheet" href="../public/assets/style.css">

<h2>✏️ Edit Task</h2>
<form method="POST" action="">
    <label>Title:</label><br>
    <input type="text" name="title" value="<?= htmlspecialchars($todo['title']) ?>" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" rows="4" cols="40"><?= htmlspecialchars($todo['description']) ?></textarea><br><br>

    <label>Status:</label><br>
    <select name="is_done">
        <option value="0" <?= $todo['is_done'] ? '' : 'selected' ?>>⏳ Pending</option>
        <option value="1" <?= $todo['is_done'] ? 'selected' : '' ?>>✅ Done</option>
    </select><br><br>

    <button type="submit">Update Task</button>
</form>

<br>
<a href="index.php">⬅ Back to List</a>