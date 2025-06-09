<?php
class Login_model
{
    private $table = 'user';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function UserLogin()
    {
        // Ketika user menekan submit regis dan login
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle ketika login form
            if (isset($_POST['login'])) {
                // inputan password dan user
                $username = trim($_POST['username']);
                $password = $_POST['password'];

                $this->db->query("SELECT * FROM user WHERE username=:username");
                $this->db->bind('username', $username);
                $this->db->execute();

                if ($this->db->rowCount() > 0) {
                    $users = $this->db->singleResult();
                    $hashed_password = $users['password'];
                    if (password_verify($password, $hashed_password)) {
                        if ($users['role'] == "admin") {
                            session_start();
                            $_SESSION['username'] = $users['username'];
                            $_SESSION['role'] = $users['role'];
                            header('location:' . BASEURL . "/admin");
                            exit;
                        }
                        if ($users['role'] == "user") {
                            session_start();
                            $_SESSION['username'] = $users['username'];
                            $_SESSION['role'] = $users['role'];
                            header('location:' . BASEURL . "/user");
                            exit;
                        }
                    } else {
                        echo "Invalid password";
                    }
                } else if (empty($username) || empty($password)) {
                    Flasher::setFlash('Tidak boleh kosong di', '', 'danger');
                    return false;
                } else {
                    echo "Username tidak ada";
                }
                // }
                // ... (login logic)
            } else if (isset($_POST['register'])) {
                // Handle registration form submission
                // ... (registration logic)
                $username = $_POST['username'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];
                $role = $_POST['role'];

                $this->db->query("SELECT * FROM user WHERE username = :username");
                $this->db->bind('username', $username);
                $this->db->execute();

                if ($this->db->rowCount() > 0) {
                    echo "Username sudah digunakan!";
                    return false;
                }

                if ($password !== $confirm_password) {
                    echo "Password dan konfirmasi password tidak cocok!";
                    return false;
                }
                if (empty($username)) {
                    Flasher::setFlash('Tidak boleh kosong di', '', 'danger');
                    return false;
                }
                if (empty($password)) {
                    echo "Password tidak boleh kosong!";
                    return false;
                }
                if (empty($confirm_password)) {
                    echo "Konfirmasi password tidak boleh kosong!";
                    return false;
                }

                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                try {
                    $query = ("INSERT INTO user (username,password,role) values (:username,:password,:role)");
                    $this->db->query($query);
                    // $users = $this->db->singleResult();
                    // $auth = $this->db->rowCount();
                    $this->db->bind('username', $username);
                    $this->db->bind('password', $hashed_password);
                    $this->db->bind('role', $role);
                    $result = $this->db->execute();

                    if ($result > 0) {
                        // echo "Pendaftaran berhasil!";
                        $this->db->query("SELECT * FROM user WHERE username=:username");
                        $this->db->bind('username', $username);
                        $this->db->execute();
                        $auth = $this->db->rowCount();
                        if ($auth > 0) {
                            session_start();
                            $users = $this->db->singleResult();
                            // var_dump($users);
                            $_SESSION['username'] = $users['username'];
                            $_SESSION['role'] = $users['role'];
                            header('location:' . BASEURL . "/user");
                            exit;
                        }
                    } else {
                        echo "Pendaftaran gagal!";
                        return false;
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            }
        }
        return false;
    }
    public function Logout()
    {
        session_start();
        session_destroy();
        header('location:' . BASEURL);
    }
    
    // ... (kode lainnya)

    public function UseLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['login'])) {
                // ... (validasi username dan password)
                $username = trim($_POST['username']);
                $password = $_POST['password'];

                $this->db->query("SELECT * FROM user WHERE username=:username");
                $this->db->bind('username', $username);
                $this->db->execute();
                if (empty($username) || empty($password)) {
                    Flasher::setFlash('Tidak boleh kosong', 'gagal', 'danger');
                } 

                if ($this->db->rowCount() > 0) {
                    $users = $this->db->singleResult();
                    $hashed_password = $users['password'];

                    if (password_verify($password, $hashed_password)) {
                        session_start();
                        $_SESSION['username'] = $users['username'];
                        $_SESSION['role'] = $users['role'];

                        if ($users['role'] == "admin") {
                            header('location:' . BASEURL . "/admin");
                            exit;
                        } else if ($users['role'] == "user") {
                            header('location:' . BASEURL . "/user");
                            exit;
                        }
                    }
                }
            } // ... (logika register)
        }
        return false; // Kembalikan false secara default (tidak ada percobaan login)
    }

    // ... (kode lainnya)
}
