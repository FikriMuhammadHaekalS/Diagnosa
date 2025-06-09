<?php
class Admin extends Controller
{

    // Halaman utama index admin
    public function index()
    {
        $data['judul'] = 'Admin';
        $this->view('template/header-admin', $data);
        $this->view('admin/index', $data);
        $this->view('template/footer-admin');
    }
    // Fitur Logout
    public function logout()
    {
        $this->model('Login_model')->logout();
    }

    // Halaman Profile
    public function Profile()
    {
        $data['judul'] = 'Profile';
        $data['gejala'] = $this->model('Gejala_model')->getAllGejala();
        $this->view('template/header-admin', $data);
        $this->view('admin/profile', $data);
        $this->view('template/footer-admin');
    }
    // Halaman utama gejala admin
    public function gejala()
    {
        $data['judul'] = 'Gejala';
        $data['gejala'] = $this->model('Gejala_model')->getAllGejala();
        $data['ikan'] = $this->model('Ikan_model')->getAllIkan();
        $this->view('template/header-admin', $data);
        $this->view('admin/gejala', $data);
        $this->view('template/footer-admin');
    }
    public function tambahGejala()
    {
        if ($this->model('Gejala_model')->tambahDataGejala($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambah', 'success');
            header('location:' . BASEURL . '/admin/gejala');
            exit;
        }
    }
    // Memanggil database menjadi json
    public function getUbahGejala()
    {
        echo json_encode($this->model('Gejala_model')->getGejalaById($_POST['id_gejala']));
    }
    // Ketika ingin di ubah
    public function ubahGejala()
    {
        if ($this->model('Gejala_model')->ubahDataGejala($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('location:' . BASEURL . '/admin/gejala');
            exit;
        }
    }
    // Hapus gejala
    public function hapusGejala($id_gejala)
    {
        if ($this->model('Gejala_model')->hapusDataGejala($id_gejala)) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('location:' . BASEURL . '/admin/gejala');
            exit;
        }
    }



    // Halaman utama penyakit admin
    public function penyakit()
    {
        $data['judul'] = 'Penyakit';
        $data['penyakit'] = $this->model('Penyakit_model')->getAllPenyakit();
        $data['ikan'] = $this->model('Ikan_model')->getAllIkan();        
        $this->view('template/header-admin', $data);
        $this->view('admin/penyakit', $data);
        $this->view('template/footer-admin');
    }
    // Tambah penyakit admin
    public function tambahPenyakit()
    {
        if ($this->model('Penyakit_model')->tambahDataPenyakit($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambah', 'success');
            header('location:' . BASEURL . '/admin/penyakit');
            exit;
        }
    }
    // Memanggil database menjadi json
    public function getUbahPenyakit()
    {
        echo json_encode($this->model('Penyakit_model')->getPenyakitById($_POST['id_penyakit']));
        // echo json_encode($this->model('Penyakit_model')->getPenyakitById($_POST['id_penyakit']));
        // echo $_POST['id_penyakit'];
    }
    // Ketika ingin di ubah
    public function ubah()
    {
        if ($this->model('Penyakit_model')->ubahDataPenyakit($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('location:' . BASEURL . '/admin/penyakit');
            exit;
        }
    }
    // Hapus penyakit
    public function hapusPenyakit($id_penyakit)
    {
        if ($this->model('Penyakit_model')->hapusDataPenyakit($id_penyakit)) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('location:' . BASEURL . '/admin/penyakit');
            exit;
        }
    }





    // Halaman basis aturan
    public function tambahBasisAturan()
    {
        $data['judul'] = 'Tambah Basis Aturan';
        $data['aturan'] = $this->model('Aturan_model')->getAllAturan();
        $data['penyakit'] = $this->model('Penyakit_model')->getNamaPenyakit();
        $data['gejala'] = $this->model('Gejala_model')->getNamaGejala();
        $this->view('template/header-admin', $data);
        $this->view('admin/tambahBasisAturan', $data);
        $this->view('template/footer-admin');
    }

    public function tambahBasisAturanNila()
    {
        $data['judul'] = 'Tambah Basis Aturan';
        $data['aturan'] = $this->model('Aturan_model')->getAllAturan();
        $data['penyakit'] = $this->model('Penyakit_model')->getNamaPenyakitNila();
        $data['gejala'] = $this->model('Gejala_model')->getNamaGejalaNila();
        $this->view('template/header-admin', $data);
        $this->view('admin/tambahBasisAturan', $data);
        $this->view('template/footer-admin');
    }
    public function tambahBasisAturanGurame()
    {
        $data['judul'] = 'Tambah Basis Aturan';
        $data['aturan'] = $this->model('Aturan_model')->getAllAturan();
        $data['penyakit'] = $this->model('Penyakit_model')->getNamaPenyakitGurame();
        $data['gejala'] = $this->model('Gejala_model')->getNamaGejalaGurame();
        $this->view('template/header-admin', $data);
        $this->view('admin/tambahBasisAturan', $data);
        $this->view('template/footer-admin');
    }

    public function tambahBasisAturanLele()
    {
        $data['judul'] = 'Tambah Basis Aturan';
        $data['aturan'] = $this->model('Aturan_model')->getAllAturan();
        $data['penyakit'] = $this->model('Penyakit_model')->getNamaPenyakitLele();
        $data['gejala'] = $this->model('Gejala_model')->getNamaGejalaLele();
        $this->view('template/header-admin', $data);
        $this->view('admin/tambahBasisAturan', $data);
        $this->view('template/footer-admin');
    }


    public function basis()
    {
        $data['judul'] = 'Basis Aturan';
        // $data['aturan'] = $this->model('Aturan_model')->Inner();
        $data['aturan'] = $this->model('Aturan_model')->getAllAturan();
        $data['penyakit'] = $this->model('Penyakit_model')->getNamaPenyakit();
        $data['gejala'] = $this->model('Gejala_model')->getNamaGejala();
        $this->view('template/header-admin', $data);
        $this->view('admin/basis', $data);
        $this->view('template/footer-admin');
    }
    public function TambahAturan()
    {
        if ($this->model('Aturan_model')->tambahDataAturan($_POST['simpan_aturan']) > 0) {
        }
    }
    public function hapusBasisAturan($id_aturan)
    {
        $this->model('Aturan_model')->hapusBasis($id_aturan);
        Flasher::setFlash('berhasil', 'diubah', 'success');
        header('location:' . BASEURL . '/admin/basis');
        exit;
    }
    public function getDetailAturan($id_aturan)
    {
        $data['judul'] = 'Detail Gejala';
        $data['detail_gejala'] = $this->model('Aturan_model')->getAturanById($id_aturan);
        $data['list_gejala'] = $this->model('Aturan_model')->detailAturan($id_aturan);
        $this->view('template/header-admin', $data);
        $this->view('admin/getDetail', $data);
        $this->view('template/footer-admin');
    }
    public function getUbahAturan($id_aturan)
    {
        $data['judul'] = 'Ubah Basis Aturan';
        $data['aturan'] = $this->model('Aturan_model')->getAturanById($id_aturan);
        $data['penyakit'] = $this->model('Penyakit_model')->getNamaPenyakit();
        $data['gejala'] = $this->model('Gejala_model')->getNamaGejala();
        $data['check_box'] = $this->model('Aturan_model')->getCheckGejala($id_aturan);
        $this->view('template/header-admin', $data);
        $this->view('admin/ubahBasisAturan', $data);
        $this->view('template/footer-admin');
    }
    public function updateAturan($id_aturan)
    {

        if (isset($_POST['update_aturan'])) { // Periksa apakah tombol submit di-klik
            if ($this->model('Aturan_model')->updateAturanGejala($_POST) > 0) { // Panggil fungsi model yang benar
                Flasher::setFlash('berhasil', 'diubah', 'success');
                header('location:' . BASEURL . '/admin/basis');
            } else {
                echo "gagal";
            }
        }
    }
    public function hapusBasisAturanGejala($id_aturan, $id_gejala)
    {
        $this->model('Aturan_model')->hapusAturanGejala($id_aturan, $id_gejala);
        header('Location:' . BASEURL . '/admin/getUbahAturan/' . $id_aturan);
    }



    // Halaman Konsultasi
    public function konsultasi()
    {
        $data['judul'] = 'Konsultasi';
        // $data['aturan'] = $this->model('Aturan_model')->Inner();
        $data['aturan'] = $this->model('Aturan_model')->getAllAturan();
        $data['penyakit'] = $this->model('Penyakit_model')->getNamaPenyakit();
        $data['gejala'] = $this->model('Gejala_model')->getNamaGejala();
        $this->view('template/header-admin', $data);
        $this->view('admin/konsultasi', $data);
        $this->view('template/footer-admin');
    }
    public function hasil()
    {
        if (isset($_POST['diagnosa'])) {
            if ($this->model('Konsultasi_model')->tambahDataKonsultasi($_POST) > 0) {
                Flasher::setFlash('berhasil', 'diubah', 'success');
                header('Location:' . BASEURL . '/admin/hasilAdmin');
                exit();
            }
        }
    }
    public function hasilAdmin()
    {
        $data['judul'] = 'Hasil Konsultasi';
        $data['konsultasi'] = $this->model('Konsultasi_model')->namaKonsul();
        // $data['Gejala'] = $this->model('Konsultasi_model')->hasilGejala();
        $data['penyakit'] = $this->model('Konsultasi_model')->penyakitKonsul();
        // $data['Penyakit'] = $this->model('Konsultasi_model')->hasilGejala();
        // var_dump($data['konsultasi']['0']);

        // var_dump($data['Gejala']);
        $this->view('template/header-admin', $data);
        $this->view('admin/hasil', $data);
        $this->view('template/footer-admin');
    }

    public function histori()
    {
        $data['judul'] = 'Riwayat Konsultasi';
        $data['konsultasi'] = $this->model('Ikan_model')->getAllHistori();
        // $data['Gejala'] = $this->model('Konsultasi_model')->hasilGejala();
        $data['penyakit'] = $this->model('Konsultasi_model')->penyakitKonsul();
        // $data['Penyakit'] = $this->model('Konsultasi_model')->hasilGejala();
        // var_dump($data['konsultasi']['0']);

        // var_dump($data['Gejala']);
        $this->view('template/header-admin', $data);
        $this->view('admin/histori', $data);
        $this->view('template/footer-admin');
    }
    public function ikan()
    {
        $data['judul'] = 'Riwayat Konsultasi';
        $data['konsultasi'] = $this->model('Ikan_model')->getAllHistori();
        // $data['Gejala'] = $this->model('Konsultasi_model')->hasilGejala();
        $data['penyakit'] = $this->model('Konsultasi_model')->penyakitKonsul();
        // $data['Penyakit'] = $this->model('Konsultasi_model')->hasilGejala();
        // var_dump($data['konsultasi']['0']);

        // var_dump($data['Gejala']);
        $this->view('template/header-admin', $data);
        $this->view('admin/ikan', $data);
        $this->view('template/footer-admin');
    }

}
