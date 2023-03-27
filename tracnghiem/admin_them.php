<?php 
  include 'connection.php';
  session_start();

  if(isset($_POST['matk'])){
    $stmt=$pdo->prepare('insert into TAIKHOAN                                            
        (TaiKhoan,MatKhau, Quyen,Email)
        values (?,?,?,?)'); 
    $stmt->execute([
      $_POST['matk'],
      $_POST['matkhau'],
      '1',
      $_POST['email']
      ]);

      $stmt=$pdo->prepare('insert into SINHVIEN                                            
      (MSSV,Ten)
      values (?,?)'); 
    $stmt->execute([
      $_POST['matk'],
      $_POST['hoten']
      
    ]);

  }

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/7ccdb29924.js" crossorigin="anonymous"></script>    <style>
        header li{
            padding: 15px;
            border: 2px solid rgb(131, 224, 123);
        }
        header li a{
            color: rgb(3, 1, 15);
        }
        ul{
            list-style-type: none;
            padding: auto;
        }
        ul li button{
            width: 100%;
            background-color: rgb(242, 247, 243);
            border: 1px solid rgb(17, 240, 9);
            padding-bottom: 10px;
        }
        .form-group label {
          width:150px;
        }
        .form-group input {
          width:250px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">TRẮC NGHIỆM MÔN HỌC</h1>
        <hr>
        <div><button type="submit" class="btn btn-light"><a href="dangxuat.php">Đăng xuất</a></button></div>

        <br>
        <div class="row">
        <div class="col-3">
          <div style="padding-top: 90px;">
              <ul>
                  <li><button style="background-color: aquamarine;"><a href="admin.php">Tài Khoản</a></button></li>
          <li>
          <li><button><a href="admin_monhoc.php">Môn Học</a></button></li>
          </li>            
            <!-- <li><button><a href="admin_cauhoi.php">Câu Hỏi</a></button></li> -->
            </ul>
          </div>
    </div>
       
        <div class="col-9 mt-3 text-center">
            <h3 class=" mt-3 text-center mb-5">Thêm Tài khoản Sinh Viên</h3>
            <form method="post" action="admin_them.php"   >
               <div class="form-group">
                  <label for="matk" class="text-left" >Mã tài khoản</label>
                  <input type="text" id="matk" placeholder="Nhập mã tài khoản" name="matk">
                </div> 
                
                <div class="form-group ">
                  <label for="hoten" class="text-left">Họ Tên</label>
                  <input type="text"  id="hoten"   placeholder="Nhập họ tên" name="hoten">
                </div>

                <div class="form-group ">
                  <label for="email" class="text-left">Email</label>
                  <input type="text"  id="email"   placeholder="Nhập email" name="email">
                </div>

                <div class="form-group">
                  <label for="matkhau" class="text-left" >Mật khẩu</label>
                  <input type="password" id="matkhau" placeholder="Nhập mật khẩu" name="matkhau">
                </div> 
                <button type="submit" class="btn btn-primary" >Thêm</button>
              </form>
        
        </div>
        </div>
    </div>
    </div>
</body>
</html>