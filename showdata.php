<?php
header("content-type:text/javascript;charset=utf-8");
include("config.php");

//$sql = $conn->qurey("SELECT * FROM tb_test");
$sql = "SELECT * FROM tb_mem";
$result = mysqli_query($conn,$sql);

if(isset($_POST['id'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $id = $_POST['id'];
    $sql1 = "INSERT INTO `tb_mem` (`mem_id`, `mem_name`, `mem_lastname`, `age`) VALUES (NULL, '$fname', '$lname', '$age');";
    $query1 = mysqli_query($conn,$sql1);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    //$reponse = "tb_test";
    while($row = mysqli_fetch_array($result)) {
        $tb_mem = array();
        $tb_mem["mem_id"] = $row["mem_id"];
        $tb_mem["mem_name"] = $row["mem_name"];
        $tb_mem["mem_lastname"] = $row["mem_lastname"];
        $tb_mem["age"] = $row["age"];
        $reponse["tb_mem"]=array();
        array_push($reponse,$tb_mem);
        // echo $member["mem_id"];
        // echo $row["mem_name"];
        // echo $row["mem_company"];
    }
    mysqli_close($conn);
} else {
     echo "0 results";
}


echo json_encode($reponse);

?>