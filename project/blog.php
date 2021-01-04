<?php
header("content-type:text/javascript;charset=utf-8"); 
include("config/mysql.php");
$mysql = new mysql();
$con = $mysql->Connect();

if(isset($_POST['check_add_post'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_POST['user_id'];
    $query = $mysql->insert_blog($con, $title, $content, $user_id );
    //$query = $mysql->insert_blog($con, 'slsp', 'hekkkkk', '0' );
    if($query){
        $array = array();
        $array['message'] = "1";
        $respone['status'] = array();
        array_push($respone,$array);
        echo json_encode($respone);

    }else{
        $array = array();
        $array['message'] = "0";
        $respone['status'] = array();
        array_push($respone,$array);
        echo json_encode($respone);
    }
}

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
?>