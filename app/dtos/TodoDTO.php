<?php
class TodoDTO
{
    public string $title;
    public string $description;
    public bool $is_done;

    public function __construct(array $data)
    {
        $this->title = trim($data['title'] ?? '');
        $this->description = trim($data['description'] ?? '');
        $this->is_done = isset($data['is_done']) ? (bool)$data['is_done'] : false;
    }
}
