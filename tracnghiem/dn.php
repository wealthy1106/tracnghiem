<?php
  include_once "./connection.php";
  session_start();
  if(isset($_POST['taikhoan'])) {
    $query = "select * from taikhoan k
                 where k.TaiKhoan = '".$_POST['taikhoan']."'
                 and k.MatKhau = '".$_POST['matkhau']."'";
		try {
      $sth = $pdo->query($query);
      if ($row = $sth->fetch()){
        $_SESSION['taikhoan'] = $row['TaiKhoan'];
        $_SESSION['quyen'] = $row['Quyen'];
        if($row['Quyen'] == '1') {
          header('Location: chonmon.php');
        } else {
          header('Location: usergv.php');
        }
      } else{
          session_destroy();

        }  
    } catch (PDOException $e){
        
    }
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
</head>
<body>
    <header>
        <div class="text-center mt-3">
            <h2>TRẮC NGHIỆM MÔN HỌC</h2>
        </div>
    </header>
    <br>
    <main>
        <h2 style="text-align: center;">MỜI ĐĂNG NHẬP</h2>
        <div class="container" style="width: 500px;" >
            <form action="dn.php" method="post">
                <div class="form-group">
                  <label for="taikhoan">Tài Khoản</label>
                  <input type="text" class="form-control" id="taikhoan" name="taikhoan" >
                </div>
                <div class="form-group">
                  <label for="matkhau">Mật Khẩu</label>
                  <input type="password" class="form-control" id="matkhau" name="matkhau">
                </div>
                <div style="text-align: center;"> 
                  <button type="submit" class="btn btn-primary">Đăng Nhập</button> 
                </div>
              </form>
        </div>
    </main>
</body>
</html>