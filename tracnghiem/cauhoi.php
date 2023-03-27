<?php
 include_once "connection.php";
 session_start();
    if(isset($_POST['idcauhoi'])) {
        $idcauhoi = $_POST['idcauhoi'];
        $mamon = $_POST['mamon'];
        $cauhoi = $_POST['cauhoi'];
        $luachon1 = $_POST['luachon1'];
        $luachon2 = $_POST['luachon2'];
        $luachon3 = $_POST['luachon3'];
        $dapan = $_POST['dapan'];
        $query = "INSERT INTO tracnghiem.cauhoi (IDCauHoi, MaMon, CauHoi, LuaChon1, LuaChon2, LuaChon3, DapAn) 
        VALUES (?, ?, ?, ?, ?, ?, ?);
        ";
        try{
        $sth = $pdo->prepare($query);
        $sth->execute([
            $idcauhoi,
            $mamon,
            $cauhoi,
            "A. $luachon1",
            "B. $luachon2",
            "C. $luachon3",
            $dapan
        ]);
        }catch (PDOException $e){
        // $pdo_error = $e->getMessage();
        }
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giáo Viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f933a9a1ec.js" crossorigin="anonymous"></script>
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
        <br>
        <div><button type="submit" class="btn btn-light" style="text-align: left; margin-left:40px"><a href="dangxuat.php">Đăng xuất</a></button></div>
        <div class="row">
            <div class="col-3">
                <div style="padding-top: 90px;">
                    <ul>
                        <li><button><a href="usergv.php">Kết quả</a></button></li>
                        <li><button style="background-color: aquamarine;">
                        <a href="cauhoi.php">Câu hỏi</a></button></li>
                    </ul>
                </div>
            </div>
            <div class="col-9">
                <h1 style="text-align: center;">Câu Hỏi </h1>
                <div>
                    <?php 
                         $query = "select * from sinhvien natural join giaovien
                                                            natural join diem
                                                 where magv = '".$_SESSION['taikhoan']."'";
                            try {
                            $sth = $pdo->query($query);
                            if ($row = $sth->fetch()){
                            echo '  
                                <h3>Môn: '.$row['MaMon'].'</h3>
                            ';
                            }   
                            } catch (PDOException $e){

                            }
                     ?>
                    
                </div>
                <div><a href="themcauhoi.php?idmon=<?php echo ' '.$row['MaMon'].'' ?>" style="background-color: aqua; font-size: 30px;">
                <i class="fa-thin fa-plus"></i></a></div>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Câu Hỏi</th>
                        <th scope="col">Đáp Án</th>
                        <th scope="col">Câu Trả Lời</th>
                        <th scope="col">Thao Tác</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(isset($_GET['idcauhoi'])){
                            $query = "DELETE FROM `tracnghiem`.`cauhoi` WHERE (`IDCauHoi` = ?) and (`MaMon` = ?);                            ";
                            try{
                                $sth = $pdo->prepare($query);
                                $sth->execute([
                                $_GET['idcauhoi'],
                                $_GET['mamon']
                                ]);
                            }catch (PDOException $e){
                                $pdo_error = $e->getMessage();
                            }
                        }
                        $query = "select * from cauhoi natural join giaovien
                                                        where magv = '".$_SESSION['taikhoan']."'";
                        $stt = 1;
                        try {
                            $sth = $pdo->query($query);
                            while ($row = $sth->fetch()){
                                echo '  
                                <tr>
                                    <th>'.$row['IDCauHoi'].'</th>
                                    <td>'.$row['CauHoi'].'</td>
                                    <td>'.$row['DapAn'].'</td>
                                    <td> '.$row['LuaChon1'].' 
                                        <br>
                                         '.$row['LuaChon2'].'
                                        <br>
                                         '.$row['LuaChon3'].'
                                    </td>
                                    <td>
                                        <a href="chinhsuacauhoi.php?idch='.$row['IDCauHoi'].'&idmon='.$row['MaMon'] .'"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>                                
                                        <a href="?idcauhoi='.$row['IDCauHoi'].'&mamon='.$row['MaMon'] .'"><i class="fa-sharp fa-solid fa-trash"></i></a>
                                    </td>
                                    
                                </tr>
                                ';
                            }   
                        } catch (PDOException $e){
                           
                        }
                      ?>
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>