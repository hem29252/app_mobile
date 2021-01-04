<?php
header("content-type:text/javascript;charset=utf-8"); 
  include("config/mysql.php");
  $mysql = new mysql();
  $con = $mysql->Connect();


  if(isset($_POST['check_all_blog'])){
    $query = $mysql->titleAll($con);

    $blog = array();
    while($fetchs = mysqli_fetch_array($query)){
      $blog['id'] = $fetchs['id'];
      $blog['title'] = $fetchs['title'];
      $blog['content'] = $fetchs['content'];
      $blog['user_id'] = $fetchs['user_id'];
      $respone['blog'] = array();
      array_push($respone,$blog);
    }

    echo json_encode($respone, JSON_UNESCAPED_UNICODE);


  }
//----------------------------------------------------------------
  if(isset($_GET['check_login'])){
    //$email = $_POST['email'];
    //$password = $_POST['password'];
    //$query = $mysql->login($con,$email,$password);
    $query = $mysql->login($con,'pop@gmail.com','pass');
    $fetch = mysqli_fetch_array($query);
    echo $fetch['password'];

  }

  //------------------------------------------------------------

  if(isset($_POST['check_register'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $query = $mysql->resgister($con,$name,$email,$password);
     

      $msg = array();
      if($query){
        $msg['message'] = "1";
        $respone["response"] = array();
        array_push($respone, $msg);
        mysqli_close($con);

        echo json_encode($respone);
        
      }else{
        $msg['message'] = "0";
        $respone["response"] = array();
        array_push($respone, $msg);
        mysqli_close($con);

        echo json_encode($respone);

      }
      
  }
//---------------------------------------------
?>