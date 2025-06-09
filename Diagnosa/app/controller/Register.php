<?php
class Register extends Controller
{
    public function index()
    {
        $data['judul'] = 'Register';
        $data['id'] = $this->model('Login_model')->UserLogin();
        $this->view('template/header-login', $data);
        $this->view('register', $data);
        $this->view('template/footer-login');
    }
}
