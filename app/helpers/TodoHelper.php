<?php

class TodoHelper
{
    // Example helper to make sure todos always have consistent data
    public function formatTodos($todos)
    {
        foreach ($todos as &$todo) {
            $todo['status_text'] = $todo['is_done'] ? '✅ Done' : '⏳ Pending';
            $todo['title'] = ucfirst(trim($todo['title']));
        }
        return $todos;
    }
}
