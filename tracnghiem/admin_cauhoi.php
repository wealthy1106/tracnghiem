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
      <div class='row'>
        <div class="col-3">
          <div style="padding-top: 90px;">
              <ul>
                  <li>
                    <button ><a href="admin.php">Tài Khoản</a></button>
                  </li>
                  <li>
                    <li>
                      <button style="background-color: aquamarine;"><a href="admin_monhoc.php">Môn Học</a></button>
                    </li>
                  </li>
              </ul>
          </div>
        </div>
        <div class='col-9'>
        <h3 class="text-center mt-3">CHI TIẾT CÂU HỎI</h3>
        <div>
          <?php 
            if(isset($_GET['mamon'])){
              $stmt_mon =$pdo->prepare('select * from MonHoc where mamon=?');
              $stmt_mon->execute([$_GET['mamon']]);
              $row= $stmt_mon->fetch();
              echo '<p>Mã Môn: '.$row['MaMon'] .'</p>
                  <p>Tên Môn: '.$row['TenMon'] .'</p>';
            }
          ?>
        </div>
        <div>
          <table class="table my-3 table-hover">
            <thead>
              <tr>
                <th>ID câu hỏi</th>
                <th>Nội Dung</th>
                <th>Lựa chọn 1</th>
                <th>Lựa chọn 2</th>
                <th>Lựa chọn 3</th>
                <th>Đáp Án</th>
                
              </tr>
            </thead>
            <tbody>
              <?php 
                  $stmt = $pdo->prepare('select * from CAUHOI where MaMon=?');
                  // viết sql chuẩn bị
                    $stmt->execute([$_GET['mamon']]); 
                    // thuc thi sql
                    while ($row = $stmt->fetch()) {
                      echo '<tr>
                      <td>'.$row['IDCauHoi'].'</td>
                      <td>'.$row['CauHoi'].'</td>
                      <td>'.$row['LuaChon1'].'</td>
                      <td>'.$row['LuaChon2'].'</td>
                      <td>'.$row['LuaChon3'].'</td>
                      
                      <td>'.$row['DapAn'].'</td>
                      
                    </tr>
                    ';
                    }
              ?>
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>
</body>
</html>