<?php
// insert book in data base

function insertBook($conn,$param){
   
extract($param);

// validation start 

if(empty($title)){
    $result=array("error"=>"title is requred");
    return $result;
}
elseif(empty($isbn))
{
    $result=array("error"=>"isbn  number is requred");
    return $result;
}
elseif(isisbnuniq($conn,$isbn))
{
    $result=array("error"=>"alredy that isbn number exit");
    return $result;
}
// validation end 


$datatime=date("Y-m-d H:i:s");

// $sql="insert into books(title,author,publication_year,isbn,catagory_id,status,created_at)
// values('$title','$author','$publication_year','$isbn',$catagory_id,'$datatime')";


$sql="INSERT INTO `books` (`id`, `title`, `author`, `publication_year`, `isbn`, `catagory_id`, `status`, `created_at`, `updated_at`) 
VALUES (NULL, '$title', '$author', '$publication_year', '$isbn', $catagory_id, '1', current_timestamp(), NULL)";

$reslut['success']=$conn->query($sql);

return $reslut;
}
// edit book and send data
function editBook($conn,$id){
$sql="select * from books where id=$id ";

 $res=$conn->query($sql);
 return $res;
 
}

// update books by id 

 function updateBook($conn,$param){
    $datatime=date("Y-m-d H:i:s");
    extract($param);
    
// validation start 

if(empty($title)){
    $result=array("error"=>"title is requred");
    return $result;
}
elseif(empty($isbn))
{
    $result=array("error"=>"isbn  number is requred");
    return $result;
}
elseif(isisbnuniq($conn,$isbn,$id))
{
    $result=array("error"=>"alredy that isbn number exit");
    return $result;
   
}
// validation end 




$sql = "UPDATE books SET 
title = '$title',
author = '$author',
publication_year = '$publication_year',
isbn = '$isbn',
catagory_id = '$catagory_id',
updated_at = '$datatime'
WHERE id = '$id'";
$reslut['success']=$conn->query($sql);

return $reslut;
 }
//  book data fetch

function fetchBook($conn){
 $sql="select b.*,c.name as cat_name from  books b left join categories c on c.id=b.catagory_id order by id desc";

 return $conn->query($sql);
}

// delete book  data 

   function deletebook($conn,$id){
        $sql="delete from books where id='$id'";
        $res=$conn->query($sql);
        return $res;
   }

// function to get catagories

function getCategories($conn)
{
    $sql="select id,name from categories";
    $result=$conn->query($sql);
    return $result;
}

// function for get isbn number is uniq or nut
function isisbnuniq($conn,$isbn,$id=null){
    $sql="select id from books where isbn='$isbn'";
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

    
// book status update 
function updateStatus($conn,$id,$status){
$sql="update books set status='$status)' where id='$id'";
return $conn->query($sql);
}





?>