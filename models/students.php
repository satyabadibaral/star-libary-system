<?php
// student data insert 

 function insertStudent($conn,$param){
    
    $data=date("d-m-y H:i:sA");
    extract($param);

    // validation start 
        if(empty($name))
        {
            $result=array("error"=>"name  is requred");
          return $result;
        }
        elseif(empty($email))
        {
            $result=array("error"=>"email  is requred");
          return $result;
        }
        elseif(emailuniq($conn,$email))
        {
            $result=array("error"=>"email  is alredy exit");
          return $result;
        }
        elseif(empty($phone_no))
        {
            $result=array("error"=>"Phone requed  is requred");
          return $result;
        }
        elseif(phone_no_uniq($conn,$phone_no))
        {
            $result=array("error"=>"phone_no  is alredy exit");
          return $result;
        }
    // validation end

    $sql="INSERT INTO `students` (`id`, `name`, `phone_no`, `email`, `address`, `status`, `dob`, `created_at`, `updated_at`) 
    VALUES (NULL, '$name', '$phone_no', '$email', '$address', '1', '$dob', current_timestamp(), NULL)";
   

    
           $reslut['success']=$conn->query($sql);
           
       return $reslut;
 }

//  fetch student data 
function getSudents($conn){
    $sql="select * from students";
    $result=$conn->query($sql);

    return $result;
}

// student status update 
function updateStatus($conn,$id,$status){
    $sql="update students set status='$status' where id='$id'";
    return $conn->query($sql);
    }
// delect students 

function deleteStudent($conn,$id){
    $sql="delete from students where id='$id'";
    return $conn->query($sql);
}

// get students details by id

function getStudentbyid($conn,$id){

    $sql="select * from students WHERE id='$id'";
    $result=$conn->query($sql);

    return $result;
}
// student dat updates 
function updateStudents($conn,$param){
    
    $datatime=date("Y-m-d H:i:s");
    extract($param);


    // validation start 
        if(empty($name))
        {
            $result=array("error"=>"name  is requred");
          return $result;
        }
        elseif(empty($email))
        {
            $result=array("error"=>"email  is requred");
          return $result;
        }
        elseif(emailuniq($conn,$email,$id))
        {
            $result=array("error"=>"email  is alredy exit");
          return $result;
        }
        elseif(empty($phone_no))
        {
            $result=array("error"=>"Phone requed  is requred");
          return $result;
        }
        elseif(phone_no_uniq($conn,$phone_no,$id))
        {
            $result=array("error"=>"phone_no  is alredy exit");
          return $result;
        }
    // validation end

    $sql="UPDATE students SET
     name = '$name', 
    phone_no = '$phone_no', 
    email = '$email',
    address = '$address', 
    dob = '$dob', 
    updated_at = '$datatime'
     WHERE 
     id = '$id'";
           $reslut['success']=$conn->query($sql);
          


           
       return $reslut;
}


// email quniq checkd

function emailuniq($conn,$email,$id=null){

    $sql="select id from students where email='$email'";
    if($id){
        $sql.="and id!='$id'";
    }

    $result=$conn->query($sql);
    if($result->num_rows>0){
        return true;
    }
    else{
        return false;
    }
}

// phone_no uniq

function phone_no_uniq($conn,$phone_no,$id=null){

    $sql="select id from students where phone_no='$phone_no'";
    if($id){
        $sql.="and id!='$id'";
    }
    $result=$conn->query($sql);
    if($result->num_rows>0){
        return true;
    }
    else{
        return false;
    }
}
?>