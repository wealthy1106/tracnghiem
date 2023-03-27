<?php
  include_once "connection.php";
  $idmon='';
  $idch='';
  $cauhoi='';
  $lc1='';
  $lc2='';
  $lc3='';
  $da='';
  if(isset($_GET['idch'])){
    
    $stmt=$pdo->prepare('select * from cauhoi where idcauhoi=? and MaMon=?');
        $stmt->execute([$_GET['idch'],$_GET['idmon']]);
        $row= $stmt->fetch();
        $idmon=$row['MaMon'];
        $idch=$row['IDCauHoi'];
        $cauhoi=$row['CauHoi'];
        $lc1=$row['LuaChon1'];
        $lc2=$row['LuaChon2'];
        $lc3=$row['LuaChon3'];
        $da=$row['DapAn'];

  }
  else if(isset($_POST['cauhoi'])){
    
    
        $stmt_cauhoi=$pdo->prepare('update CAUHOI 
        set cauhoi=?, Luachon1=?,luachon2=?,luachon3=?,dapan=?
        where idcauhoi=? and mamon=?;');
        $stmt_cauhoi->execute(
          [$_POST['cauhoi'],
          $_POST['LuaChon1'],
          $_POST['LuaChon2'],
          $_POST['LuaChon3'],
          $_POST['dapan'],
          
          $_POST['idcauhoi'],
         
          $_POST['idmon']
        ]);

        $cauhoi=$_POST['cauhoi'];
        $lc1=$_POST['LuaChon1'];
        $lc2=$_POST['LuaChon2'];
        $lc3=$_POST['LuaChon3'];
        $da= $_POST['dapan'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giáo viên</title>
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
        .form-group label {
          width:130px;
          
          
        }
        .form-group textarea {
          width:500px;
          
        }
        .form-group input {
          width:500px;
        }
    </style>
</head>
<body>
  <div class="container">
    <h1 style="text-align: center;">TRẮC NGHIỆM MÔN HỌC</h1>
    <hr>
    <br>
    <div class="row">
    <div class="col-3">
      <div style="padding-top: 90px;">
          <ul>
              <li><button><a href="usergv.php">Kết quả</a></button></li>
              <li><button style="background-color: aquamarine;"><a href="cauhoi.php">Câu hỏi</a></button></li>
          </ul>
      </div>
    </div>
      <div class="col-9 mt-3 text-center">
        <h3 class=" mt-3 text-center mb-5">Chỉnh sửa câu hỏi</h3>
        <form method="post" action="chinhsuacauhoi.php">
          <div class="form-group" style="display:none">
            <label for="idcauhoi" class="text-left"  >ID Câu Hỏi</label>
            <textarea rows="2" cols="50" name="idcauhoi" ><?php echo $idch ;?></textarea>
          </div> 
          <div class="form-group">
          <div class="form-group" style="display:none">
            <label for="idmon" class="text-left" >ID Môn</label>
            <textarea rows="2" cols="50" name="idmon" ><?php echo $idmon ;?></textarea>
          </div> 
          <div class="form-group">
            <label for="cauhoi" class="text-left" >Câu Hỏi</label>
            <textarea rows="2" cols="50" name="cauhoi" ><?php echo $cauhoi ;?></textarea>
          </div> 
          <div class="form-group">
            <label for="cauhoi" class="text-left" >Lựa chọn 1</label>
            <textarea rows="2" cols="50" name="LuaChon1" ><?php echo $lc1 ;?></textarea>
          </div> 
          <div class="form-group">
            <label for="cauhoi" class="text-left" >Lựa chọn 2</label>
            <textarea rows="2" cols="50" name="LuaChon2" ><?php echo $lc2 ;?></textarea>
          </div> 
          <div class="form-group">
            <label for="cauhoi" class="text-left" >Lựa chọn 3</label>
            <textarea rows="2" cols="50" name="LuaChon3" ><?php echo $lc3 ;?></textarea>
          </div> 
          <div class="form-group ">
            <label for="dapan" class="text-left" style="width:130px">Đáp Án</label>
            <select name="dapan" id="dapan"style="width:500px" >
                <option value="<?php $da ?>"><?php echo ''.$da.'' ?></option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary" >Sửa</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>