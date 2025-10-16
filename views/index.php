<?php
include __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/controllers/TodoController.php';

$controller = new TodoController($conn);

// Handle delete if action is triggered
if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $controller->delete($_GET['id']);
}

$todos = $controller->index();
?>

<link rel="stylesheet" href="../public/assets/style.css">

<div class="container">

    <h2>📝 To-Do List</h2>
    <a href="create.php">➕ Add New Task</a>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php if (!empty($todos)): ?>
            <?php foreach ($todos as $todo): ?>
                <tr>
                    <td><?= htmlspecialchars($todo['title']) ?></td>
                    <td><?= htmlspecialchars($todo['description']) ?></td>
                    <td><?= $todo['status_text'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $todo['id'] ?>">✏️ Edit</a> |
                        <a href="index.php?action=delete&id=<?= $todo['id'] ?>" onclick="return confirm('Delete this task?')">🗑️ Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No tasks found.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>