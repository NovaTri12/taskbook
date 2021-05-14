<?php

class Home extends Controller
{

    public function index()
    {
        $data['title'] = 'Task Book';
        $data['tasks'] = $this->model('Tasks_Model')->getTasks();
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Task Book';
        $data['tasks'] = $this->model('Tasks_Model')->getTaskByID($id);
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('home/detail', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        if ($this->model('Tasks_model')->addTask($_POST) > 0) {
            Flasher::setFlash('success', 'added', 'success');
            header('Location: ' . BASEURL);
            exit;
        } else {
            Flasher::setFlash('failed', 'added', 'danger');
            header('Location: ' . BASEURL);
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Tasks_model')->deleteTask($id) > 0) {
            Flasher::setFlash('success', 'delete', 'success');
            header('Location: ' . BASEURL);
            exit;
        } else {
            Flasher::setFlash('failed', 'delete', 'danger');
            header('Location: ' . BASEURL);
            exit;
        }
    }

    public function getUpdate()
    {
        echo json_encode($this->model('Tasks_model')->getTaskByID($_POST['id']));
    }

    public function update()
    {
        if ($this->model('Tasks_model')->updateTask($_POST) > 0) {
            Flasher::setFlash('success', 'update', 'success');
            header('Location: ' . BASEURL);
            exit;
        } else {
            Flasher::setFlash('failed', 'update', 'danger');
            header('Location: ' . BASEURL);
            exit;
        }
    }
}
