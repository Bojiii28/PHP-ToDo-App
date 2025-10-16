<?php

require_once __DIR__ . '/../models/Todo.php';
require_once __DIR__ . '/../dtos/TodoDTO.php';
require_once __DIR__ . '/../helpers/TodoHelper.php';

class TodoController
{
    private $todoModel;
    private $helper;

    public function __construct($conn)
    {
        $this->todoModel = new Todo($conn);
        $this->helper = new TodoHelper();
    }

    public function getTodoById($id)
    {
        return $this->todoModel->find($id);
    }

    // Show all todos
    public function index()
    {
        $todos = $this->todoModel->all();
        return $this->helper->formatTodos($todos);
    }

    // Create form
    public function create()
    {
        include __DIR__ . '/../../views/create.php';
    }

    // Store todo
    public function store($data)
    {
        $todoDTO = new TodoDTO($data);
        $this->todoModel->create($todoDTO);
        header('Location: index.php');
        exit;
    }

    // Edit form
    public function edit($id)
    {
        $todo = $this->todoModel->find($id);
        include __DIR__ . '/../../views/edit.php';
    }

    // Update todo
    public function update($id, $data)
    {
        $todoDTO = new TodoDTO($data);
        $this->todoModel->update($id, $todoDTO);
        header('Location: index.php');
        exit;
    }

    // Delete todo
    public function delete($id)
    {
        $this->todoModel->delete($id);
        header('Location: index.php');
        exit;
    }
}
