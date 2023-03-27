<?php 
  include 'connection.php';
  session_start();
  if(isset($_GET['xoa'])){

    $stmt=$pdo->prepare('select *  from TAIKHOAN  where TaiKhoan=? ');
    $stmt->execute([$_GET['matk']]);
    $row=$stmt->fetch();
    $matk=$row['TaiKhoan'];

    $stmt_gv=$pdo->prepare('select magv  from giaovien where magv=? ');
    $stmt_gv->execute([$matk]);
    if($row_gv=$stmt_gv->fetch()){
      $stmt_xoagv=$pdo->prepare('delete from GIAOVIEN  where magv=? ');
      $stmt_xoagv->execute([$matk]);
      $stmt_xoatk=$pdo->prepare('delete from TAIKHOAN  where taikhoan=? ');
      $stmt_xoatk->execute([$matk]);

    }
    else  {
        
      $stmt_svc=$pdo->prepare('delete from Sinhvienchon  where mssv=? ');
      $stmt_svc->execute([$matk]);

      $stmt_xoadiemsv=$pdo->prepare('delete from Diem  where mssv=? ');
      $stmt_xoadiemsv->execute([$matk]);

      $stmt_xoasv=$pdo->prepare('delete from Sinhvien  where mssv=? ');
      $stmt_xoasv->execute([$matk]);

      $stmt_xoatk=$pdo->prepare('delete from TAIKHOAN  where taikhoan=? ');
      $stmt_xoatk->execute([$matk]);

    };

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
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
                  <li>
                    <button style="background-color: aquamarine;"><a href="admin.php">Tài Khoản</a></button>
                  </li>
                  <li  >
                    <li><button><a href="admin_monhoc.php">Môn Học</a></button></li>
                  </li>
              </ul>
          </div>
        </div>
        <div class="col-9 mt-3">
          <h2 class="text-center mt-3">Tài khoản</h2>
            <button type="submit" class="btn btn-warning" name="add" value="add">
                <a href="admin_themgv.php?themgv=gv" class="font-weight-bold" 
                style='text-decoration:none,; color:white'>Thêm Giáo Viên</a>
            </button>
            <button type="submit" class="btn btn-primary"  name="add" value="add">
                <a href="admin_them.php?themsv=sv" class="font-weight-bold" 
                style='text-decoration:none; color:white'>Thêm Sinh Viên</a>
            </button>
            <table class="table my-3 table-hover">
                <thead>
                  <tr>
                    <th>Mã Tài Khoản</th>
                    <th>Email</th>
                    <th>Quyền</th>
                    <th>Mật Khẩu</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                    $stmt =$pdo->prepare("select * from TAIKHOAN ");
                    $stmt->execute();
                    while ($row=$stmt->fetch()){
                      echo'  <tr>
                    <td >'.$row['TaiKhoan'].'</td>
                    <td>'.$row['Email'].'</td>
                    <td>'.$row['Quyen'].'</td>
                    <td>'.$row['MatKhau'].'</td>
                    <td>
                    <a href="admin.php?matk='.$row['TaiKhoan'].'&xoa=1" style="text-decoration: none;">
                      <i class="fa-solid fa-trash pr-3 text-dark"></i>
                    </a>
                    
                  </td>
                  </tr>';
                    };
                  
                  ?>
                  
                  
                </tbody>
            </table>
        </div>
      </div>
    </div>
</body>
</html>