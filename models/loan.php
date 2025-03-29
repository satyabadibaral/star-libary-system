<?php

// function for get student details 

function getStudent($conn)
{
    $sql="select id,name from students";
    $result=$conn->query($sql);
    return $result;
}

// function for get student details 

function getBook($conn)
{
    $sql="select id,title from books";
    $result=$conn->query($sql);
    return $result;
}
// insert book in data base

function insertloan($conn,$param){
   
extract($param);


// validation start 

if(empty($books_id)){
    $result=array("error"=>"Book name is requred");
    return $result;
}
elseif(empty($student_id))
{
    $result=array("error"=>"Student name is requred");
    return $result;
}
elseif(empty($loan_date))
{
    $result=array("error"=>"Loan date is  requred");
    return $result;
}
elseif(empty($return_date))
{
    $result=array("error"=>" returan dateis requred");
    return $result;
}
// validation end 


$datatime=date("Y-m-d");




$sql="INSERT INTO `book_loans` (`id`, `books_id`, `student_id`, `loan_date`, `return_date`, `is_return`,`created_at`, `updated_at`) 
VALUES (NULL, $books_id, $student_id, '$loan_date', '$return_date', '1', current_timestamp(), NULL)";

$reslut['success']=$conn->query($sql);

return $reslut;
}
// Get loan data for edit by help of id
function getLoandatbyid($conn,$id){
$sql="select * from book_loans where id=$id ";

 $res=$conn->query($sql);
 return $res;
 
}

// update loan  by id 

 function updateloan($conn,$param){
    $datatime=date("Y-m-d H:i:s");
    extract($param);
   
    
// validation start 

if(empty($books_id)){
    $result=array("error"=>"Book name is requred");
    return $result;
}
elseif(empty($student_id))
{
    $result=array("error"=>"Student name is requred");
    return $result;
}
elseif(empty($loan_date))
{
    $result=array("error"=>"Loan date is  requred");
    return $result;
}
elseif(empty($return_date))
{
    $result=array("error"=>" returan dateis requred");
    return $result;
}
// validation end 



$sql="UPDATE book_loans SET 
 books_id =$books_id,
student_id=$student_id,
loan_date='$loan_date',
return_date='$return_date',

updated_at='$datatime' 

WHERE id = '$id'";

$reslut['success']=$conn->query($sql);

return $reslut;
 }
//  loan data fetch

function fetchloan($conn){

    

//  $sql="select b.*,c.name as cat_name from  books b left join categories c on c.id=b.catagory_id order by id desc";

    $sql="select l.*,b.title as book_name,s.name as student_name from book_loans l
          inner join books b on l.books_id=b.id 
          inner join students s on l.student_id=s.id order by l.id desc";

          $res=$conn->query($sql);

         
          

 return $conn->query($sql);
}

// delete book  data 

   function deleteloan($conn,$id){
        $sql="delete from book_loans where id='$id'";
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
$sql="update book_loans set is_return='$status)' where id='$id'";
return $conn->query($sql);
}





?>