<?php
  	include "connect.php";

   $email = $_POST['email'];
   $password = $_POST['password'];
   $username = $_POST['username'];
   $phone = $_POST['phone'];

   //check exists user
   $query = 'SELECT * FROM `user` WHERE `email` = "'.$email.'"' ;
   $data =mysqli_query($conn,$query);
   $numrow =mysqli_num_rows($data);
   if($numrow > 0 ){
    $arr= [
        'success' =>false,
        'message' => "User exists!!",
    
        ];
   }
   else {

        //insert user 
        $query = 'INSERT INTO `user`(`email`, `password`, `username`, `phone`) VALUES ("'.$email.'" , "'.$password.'","'.$username.'", "'.$phone.'")';
        $data= mysqli_query($conn,$query);

        if ($data == true){
            $arr = [
                'success' =>true,
                'message' => "add user success!!",

        ];
        }else{
            $arr= [
                'success' =>false,
                'message' => "add user failed!!",

        ];
        }
}

print_r(json_encode($arr));
?>