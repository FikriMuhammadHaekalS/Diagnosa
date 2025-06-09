<?php
function tampilkanRole()
{
    if (!empty($_SESSION['username']) && $_SESSION['role'] == "admin") {
        echo "Welcome " . $_SESSION['username'] . "<br>";
    }
}
if (empty($_SESSION['username'] && $_SESSION['role'])) {
    header('location:' . BASEURL);
    exit;
}
if ($_SESSION['role'] == "user") {
    header('location:' . BASEURL . '/user');
    exit;
}
?>

<div class="main p-3">
    <div class="panel-admin">
        <h1 class="text-center ">
            <?= tampilkanRole(); ?>
        </h1>
        <p>Selamat datang user pada halaman panel admin, dimana admin bisa menentukan ketentuan mengenai diagnosa pada ikan</p>
    </div>
</div>
</div>