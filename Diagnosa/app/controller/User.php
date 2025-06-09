<?php
class User extends Controller
{
    public function index()
    {
        $data['judul'] = 'User';
        $this->view('template/header-user', $data);
        $this->view('user/index', $data);
        $this->view('template/footer-user');
    }
    public function gejala()
    {
        $data['judul'] = 'gejala';
        $data['gejala'] = $this->model('Gejala_model')->getAllGejala();
        $this->view('template/header-user', $data);
        $this->view('user/gejala', $data);
        $this->view('template/footer-user');
    }
    public function diagnosa()
    {
        $data['judul'] = 'diagnosa';
        $this->view('template/header-user', $data);
        $this->view('user/diagnosa', $data);
        $this->view('template/footer-user');
    }
    public function penyakit()
    {
        $data['judul'] = 'penyakit';
        $data['penyakit'] = $this->model('Penyakit_model')->getAllPenyakit();
        $this->view('template/header-user', $data);
        $this->view('user/penyakit', $data);
    }
    public function basisaturan()
    {
        $data['judul'] = 'basis aturan';
        $data['aturan'] = $this->model('Aturan_model')->Inner();
        $this->view('template/header-user', $data);
        $this->view('user/basisaturan', $data);
    }
    public function logout()
    {
        $this->model('Login_model')->logout();
    }

    // Jenis Ikan
    public function nila()
    {
        $data['judul'] = 'Diagnosa Ikan Nila';
        $data['aturan'] = $this->model('Aturan_model')->getAllAturan();
        $data['penyakit'] = $this->model('Penyakit_model')->getNamaPenyakitNila();
        $data['gejala'] = $this->model('Gejala_model')->getNamaGejalaNila();
        $this->view('template/header-user', $data);
        $this->view('user/nila', $data);
    }
    public function gurame()
    {
        $data['judul'] = 'Diagnosa Ikan Gurame';
        $data['aturan'] = $this->model('Aturan_model')->getAllAturan();
        $data['penyakit'] = $this->model('Penyakit_model')->getNamaPenyakitGurame();
        $data['gejala'] = $this->model('Gejala_model')->getNamaGejalaGurame();
        $this->view('template/header-user', $data);
        $this->view('user/gurame', $data);
    }
    public function lele()
    {
        $data['judul'] = 'Diagnosa Ikan Lele';
        $data['aturan'] = $this->model('Aturan_model')->getAllAturan();
        $data['penyakit'] = $this->model('Penyakit_model')->getNamaPenyakitLele();
        $data['gejala'] = $this->model('Gejala_model')->getNamaGejalaLele();
        $this->view('template/header-user', $data);
        $this->view('user/lele', $data);
    }

    public function hasil()
    {
        if (isset($_POST['diagnosa_user'])) {
            if ($this->model('Konsultasi_model')->tambahDataKonsultasi($_POST) > 0) {
                Flasher::setFlash('berhasil', 'diubah', 'success');
                header('Location:' . BASEURL . '/user/hasilUser');
                exit();
            }
        }
    }
    public function hasilUser()
    {
        $data['judul'] = 'Hasil Konsultasi';
        $data['konsultasi'] = $this->model('Konsultasi_model')->namaKonsul();
        // $data['Gejala'] = $this->model('Konsultasi_model')->hasilGejala();
        $data['penyakit'] = $this->model('Konsultasi_model')->penyakitKonsul();
        // $data['Penyakit'] = $this->model('Konsultasi_model')->hasilGejala();
        // var_dump($data['konsultasi']['0']);

        // var_dump($data['Gejala']);
        $this->view('template/header-user', $data);
        $this->view('user/hasil', $data);
        $this->view('template/footer-user');
    }
}
