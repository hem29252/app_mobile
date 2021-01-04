<?php
   //INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, 'ibrohem bula', 'ibrohem@gmail.com', 'ibrohem');
   class mysql {
       public function Connect(){
         $con = mysqli_connect("178.128.103.119", "user", "test","mobile_app");
         mysqli_query($con,"SET character_set_results=utf8");
         mysqli_query($con,"SET character_set_client='utf8'");
         mysqli_query($con,"SET character_set_connection='utf8'");
         mysqli_query($con,"collation_connection = utf8_unicode_ci");
         mysqli_query($con,"collation_database = utf8_unicode_ci");
         mysqli_query($con,"collation_server = utf8_unicode_ci");
         mysqli_set_charset($con,"utf-8");

         return $con;
       } 

// Account
       public function resgister($con,$name,$email,$password){
           $sql = "INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, '$name', '$email', '$password')";
           $query = mysqli_query($con,$sql);
           return $query;
       }

       public function login($con,$email,$password){
           $sql = "SELECT * FROM users WHERE email = '$email' AND `password` = $password";
           $query = mysqli_query($con,$sql);
           return $query;
       }
       
       public function accountById($con,$id){
           $sql = "SELECT * FROM users WHERE id = '$id'";
           $query = mysqli_query($con,$sql);
           return $query;
       }

// Blog
     // INSERT INTO `blog` (`id`, `title`, `content`, `user_id`) VALUES (NULL, 'php vs c#', 'ดีกันคนละแบบ', '1');
       public function insert_blog($con, $title, $content, $user_id ){
           $sql = "INSERT INTO `blog` (`id`, `title`, `content`, `user_id`) VALUES (NULL, '$title', '$content', '$user_id')";
           $query = mysqli_query($con,$sql);
           return $query;
       }

       public function titleAll($con){
           $sql = "SELECT * FROM `blog`";
           $query = mysqli_query($con,$sql);
           return $query;
       }

       public function titleByUserId($con,$id){
           $sql = "SELECT * FROM`blog`WHERE id = '$id' ";
           $query = mysqli_query($con,$query);
           return $query;
       }

       public function titleById($con,$user_id){
           $sql = "SELECT * FROM`blog`WHERE `user_id` = '$id' ";
           $query = mysqli_query($con,$query);
           return $query;
       }
   } 

?>