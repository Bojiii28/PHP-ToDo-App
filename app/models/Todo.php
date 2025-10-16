<?php

class Todo
{
    private $conn;
    private $table = 'todos';

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Fetch all todos
    public function all()
    {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Fetch a single todo by ID
    public function find($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Create a new todo
    public function create($todo)
    {
        $query = "INSERT INTO {$this->table} (title, description, is_done) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $is_done = isset($todo->is_done) ? (int)$todo->is_done : 0;
        $stmt->bind_param('ssi', $todo->title, $todo->description, $is_done);
        return $stmt->execute();
    }

    // Update an existing todo
    public function update($id, $todo)
    {
        $query = "UPDATE {$this->table}
                  SET title = ?, description = ?, is_done = ?, updated_at = CURRENT_TIMESTAMP
                  WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssii', $todo->title, $todo->description, $todo->is_done, $id);
        return $stmt->execute();
    }

    // Delete a todo
    public function delete($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
