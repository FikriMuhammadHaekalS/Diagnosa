<?php
class Login extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login';

        if ($this->model('Login_model')->UseLogin() === false) { // Periksa explicit false
            // Login gagal, flash message sudah diatur di model
            
            $this->view('template/header-login', $data);
            $this->view('login', $data);
            $this->view('template/footer-login');
        }
        // Login berhasil akan di-redirect di dalam model, tidak perlu melakukan apapun disini.
    }
}
?>
