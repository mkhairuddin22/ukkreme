<?php

$title = 'Login | Petugas';

require '../../public/app.php';

require '../layouts/header.php';


// logic backend


if (isset($_POST['submit'])) {


  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'");

  if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);
    if ($_SESSION['level'] = $row['level'] == 'admin') {
      header("location:../admin/dashboard.php");
    } else if ($_SESSION['level'] = $row['level'] == 'petugas') {
      header("location:dashboard.php");
    }
  } else {
    $error = true;
  }
}

?>


<div class="d-flex justify-content-center py-5 mt-5">
  <div class="card shadow mt-3 border-bottom-primary bg-gray-100 w-100" data-aos="fade-down" style="border-radius: 80px">
    <div class="card-body">

      <?php if (isset($error)) : ?>

        <div class="alert alert-dismissible fade show" style="background-color: #b52d2d;" role="alert">
          <h6 class="text-gray-100 mt-2">Maaf username atau password anda salah</h6>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-light">&times;</span>
          </button>
        </div>

      <?php endif; ?>
      <body style="background-color: darkcyan">
      <h3 class="text-center text-warning text-uppercase text-bold">Login</h3>
      <hr class="bg-gradient-warning">
      <div class="row">
        <div class="col-6">
          <form action="" method="post">
            <div class="form-group text-center">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control shadow" style="border: none; border-radius:20px;" id="exampleInputEmail1" placeholder="Nama pengguna" name="username">
            </div>
            <div class="form-group text-center">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control shadow" style="border: none; border-radius:20px;" id="exampleInputPassword1" placeholder="Kata sandi" name="password">
            </div>
            <div class="mt-4">
              <button type="submit" name="submit" class="btn btn-warning shadow-lg col-12" style="border-radius:20px;">Masuk</button>
            </div>
            <div class="text-center mt-2">
              <a href="../user/index.php" class="text-gray-600" style="text-decoration: none;">Masuk sebagai user</a>
            </div>
          </form>
        </div>
        <div class="col-6">
          <div class="image">
            <img src="../../assets/img/haha.png" width="580" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>



<?php require '../layouts/footer.php'; ?>