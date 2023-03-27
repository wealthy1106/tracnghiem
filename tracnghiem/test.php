<?php
  include_once "./connection.php";
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sinh Viên</title>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <style>
        .button button{
            margin-bottom: 10px;
            width: 40px;
            text-align: center;
        }
        .trloi{
            padding-left: 200px;
        }
        .form-check{
            padding-left: 200px;
        }
        input{
            width: 20px; height: 20px;
        }
        h5{
            padding-left: 50px ;
        }
    </style>
</head>
<body class="container-md" >
    <header>
        <div class="text-center mt-3">
            <h2>TRẮC NGHIỆM MÔN HỌC</h2>            
        </div>
    </header>
    <main >
        <div class="text-center mt-5" style="margin-bottom: 80px;"><h3>Sinh viên nhớ nhấn hoàn thành</h3></div>        
        <div><button class="btn btn-light"><?php echo $_SESSION['taikhoan'] ?></button></div>
        <form action="kq.php" method="post"  enctype="multipart/form-data" onsubmit="return checkValidForm(this);">
            <div>
                <?php
                $query = "select * from cauhoi where mamon = '".$_GET['mamon']."'";
                $stt = 1;
                try {
                    $sth = $pdo->query($query);
                    while ($row = $sth->fetch()){
                        echo '  
                            <div style="border: 1px solid rgb(1, 238, 255);background-color: blanchedalmond;padding-left: 10px;"><h3>Câu hỏi '.$row['IDCauHoi'].': </h3></div>
                            <div style="padding:20px ;"><h5>'.$row['CauHoi'].'</h5></div>
                            <div class="form-check"  >
                                <input  class="form-check-input" type="radio" name="exampleRadios'.$row['IDCauHoi'].'" id="'.$row['IDCauHoi'].'A" value="A">
                                <label  class="form-check-label " for="exampleRadios1">
                                 <h5>'.$row['LuaChon1'].'</h5>
                                </label>
                            </div>
                            <div class="form-check"  >
                                <input  class="form-check-input" type="radio" name="exampleRadios'.$row['IDCauHoi'].'" id="'.$row['IDCauHoi'].'B" value="B">
                                <label  class="form-check-label " for="exampleRadios2">
                                    <h5>'.$row['LuaChon2'].'</h5>
                                </label>
                            </div>
                            <div class="form-check"  >
                                <input  class="form-check-input" type="radio" name="exampleRadios'.$row['IDCauHoi'].'" id="'.$row['IDCauHoi'].'C" value="C">
                                <label  class="form-check-label " for="exampleRadios3">
                                    <h5>'.$row['LuaChon3'].'</h5>
                                </label>
                            </div>
                            <div class = "form-check d-none">
                                <input  class="form-check-input" type="radio" name="exampleRadios'.$row['IDCauHoi'].'" value="khong chon" checked>
                            </div>
                        ';
                    }   
                } catch (PDOException $e){
                    
                }
                
                ?>
            <button type="submit" class="btn btn-primary">Hoàn Thành</button> 
            <input type="hidden" name="mamon"  value ="<?php echo $_GET['mamon']; ?>">
        </form>
    </main>
</body>
</html>