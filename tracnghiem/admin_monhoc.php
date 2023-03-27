<?php 
  include 'connection.php';
  session_start();

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
    <script src="https://kit.fontawesome.com/7ccdb29924.js" crossorigin="anonymous"></script>    
    <style>
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
                      <button ><a href="admin.php">Tài Khoản</a></button>
                    </li>
                    <li>
                      <button style="background-color: aquamarine;"><a href="admin_monhoc.php">Môn Học</a></button>
                    </li>
                  </ul>
              </div>
            </div>
            <div class="col-9 mt-3">
              <table class="table my-3 table-hover">
                  <h3 class="text-center mt-3">Môn Học</h3>
                  <thead>
                    <tr>
                    <th>Mã Môn Học</th>
                      <th>Tên Môn</th>
                      <th>Xem câu hỏi</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $stmt =$pdo->prepare("select * from MonHoc ");
                      $stmt->execute();
                      while ($row=$stmt->fetch()){
                        echo'  <tr>
                      <td >'.$row['MaMon'].'</td>
                      <td>'.$row['TenMon'].'</td>
                      <td>
                        <a href="admin_cauhoi.php?mamon='.$row['MaMon'].'">
                        <i class="fa-solid fa-circle-info text-dark"></i>
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