<?php
if (!empty($_SESSION['username']) and $_SESSION['role'] == "admin") {
    header('location:' . $_SESSION['role']);
    exit;
}
if (!empty($_SESSION['username']) and $_SESSION['role'] == "user") {
    header('location:' . $_SESSION['role']);
    exit;
}
?>
<div class="container mg-auto">
    <h3 class="text-center">Login</h3>
    <h1>
        <?php Flasher::flash(); ?> 
    </h1>
    <form action="" method="post">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="username" placeholder="username">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="d-grid gap-2 ">
            <button type="submit" class="btn btn-primary btn-lg custom mx-auto" name="login">Login</button>
        </div>
        <div class="text-center mg-auto custom-daftar">
            <p>Belum Punya akun?<a href="http://localhost/Diagnosa/register">Daftar</a></p>
        </div>
    </form>
</div>