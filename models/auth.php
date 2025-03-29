<?php
// login funtion 

function login($conn,$param)
{
    extract($param);

//    echo $password;
//    echo $email;
//    exit;
    $sql="SELECT * FROM user WHERE email='$email'";

    $res=$conn->query($sql);
    
        $user=$res->fetch_assoc();
        $hash=$user['password'];
        if($password==$hash){
            $result=array('status'=>true,'user'=>$user);

            
        }
        else
        {
            // echo "ok";
            // exit;
            $result=array('status'=>false,'user'=>[]);
           
        }
    
    return $result;
}
?>