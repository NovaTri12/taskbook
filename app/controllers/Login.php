<?php

class Login extends Controller
{
    public function index()
    {
        $data['title'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('home/login', $data);
        $this->view('templates/footer');
    }

    public function doLogin()
    {
        session_start();

        $msg = '';

        if (isset($_POST)) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($username == 'admin' and $password == '123') {

                $_SESSION['username'] = $username;
                $_SESSION['user'] = 'Administrator';
                Flasher::setFlash('success', 'login', 'success');
                header('Location: ' . BASEURL);
                exit;
            } else {

                // jika login salah maka variabel msg diisi value seperti dibawah
                // nilai variabel ini akan ditampilkan di halaman login jika salah

                Flasher::setFlash('failed', 'login', 'danger');
                header('Location: ' . BASEURL. '/Login/login');
                exit;
            }
        }
    }

    public function logout()
    {
        session_start();

        session_destroy();

        header('Location:' . BASEURL);
    }
}
