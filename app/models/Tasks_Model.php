<?php


class Tasks_Model
{

    private $table = 'tasks';
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }
    public function getTasks()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getTaskByID($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addTask($data)
    {
        $query = "INSERT INTO tasks
                    VALUES
                  ('', :username, :email, :description, '', '0')";

        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('description', $data['description']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function DeleteTask($id)
    {
        $query = "DELETE FROM tasks WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function updateTask($data)
    {
        $query = "UPDATE tasks SET
                    username    = :username,
                    email       = :email,
                    description = :description,
                    is_complete = :is_complete,
                    updated_by  = :updated_by
                  WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('is_complete', $data['is_complete']);
        $this->db->bind('updated_by', $data['updated_by']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
