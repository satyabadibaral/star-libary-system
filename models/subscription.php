<?php

// plan add

 function addplan($conn,$param){
    
    extract($param);

//     echo "<pre> ";
//     print_r($param);
//  exit;

// validation start 

if(empty($title)){
    $result=array("error"=>"title is requred");
    return $result;
}
elseif(empty($amount))
{
    $result=array("error"=>"amount  number is requred");
    return $result;
}

elseif(empty($duration))
{
    $result=array("error"=>"duration  number is requred");
    return $result;
}
// validation end 


$datatime=date("Y-m-d H:i:s");

// $sql="insert into subscription_plans(title,amount,duration,status,created_at)
// // values('$title','$author','$publication_year','$isbn',$catagory_id,'$datatime')";


$sql="INSERT INTO `subscription_plans` (`id`, `title`,`amount`, `duration`, `status`, `created_at`, `updated_at`) 
VALUES (NULL, '$title', $amount, $duration ,  '1', current_timestamp(), NULL)";

$reslut['success']=$conn->query($sql);

return $reslut;
}
// fetch subcriptionplans 

function getsubcription($conn){
    $sql="select * from subscription_plans ORDER BY id ASC";

    $result=$conn->query($sql);

    return $result;
}
 
// status updates
function statusUpdate($conn,$id,$status){
$sql="update subscription_plans set status='$status' where id='$id'";
    return $conn->query($sql);
}

// delete subscripton

function subDelete($conn,$id){
    $sql="delete from subscription_plans  where id='$id' ";
    return $conn->query($sql);
}

// plan fetch by id 
function fetchplanbyId($conn,$id){
    $sql="select * from subscription_plans where id='$id' ";

    $result=$conn->query($sql);

    return $result;
}
// update plan data

function planUpdate($conn,$param){

    extract($param);

//     echo "<pre> ";
//     print_r($param);
//  exit;

// validation start 

if(empty($title)){
    $result=array("error"=>"title is requred");
    return $result;
}
elseif(empty($amount))
{
    $result=array("error"=>"amount  number is requred");
    return $result;
}

elseif(empty($duration))
{
    $result=array("error"=>"duration  number is requred");
    return $result;
}
// validation end 


$datatime=date("Y-m-d H:i:s");



$sql="update subscription_plans set
title ='$title' ,
amount=$amount ,
duration=$duration,
updated_at='$datatime' where `id`=$id
";

$reslut['success']=$conn->query($sql);

return $reslut;
}

// function for get student details 

function getStudent($conn)
{
    $sql="select id,name from students";
    $result=$conn->query($sql);
    return $result;
}
// funtion for get active plan name 

 function getPlan($conn){
    $sql="select * from subscription_plans where status='1'";
    $res=$conn->query($sql);
    return $res;
 }

//  function for amount form plan

function getamount($conn,$plan_id) {
    $sql="select * from subscription_plans where id='$plan_id'";
    $res=$conn->query($sql);
    // $value=$res->fetch_assoc();

    
    return $res;
}

//  function for create purchase

function create_purchase($conn,$param){
extract($param);

if(empty($student_id)){
    $result=array("error"=>"student name is requred");
    return $result;
}
elseif(empty($plan_id))
{
    $result=array("error"=>"plan name is requred");
    return $result;
}
$datatime=date("d-m-y h:i:s");

// date calculation 
$plandata=getamount($conn,$plan_id);
if($plandata->num_rows >0)
{
    $plan=$plandata->fetch_assoc();
    $amount=$plan['amount'];
    $duration=$plan['duration'];
    

    $start_date=date("y-m-d");
    $start_time=strtotime($start_date);
    $end_date=date("y-m-d",strtotime("+ $duration month",$start_time));
    
   
    $sql="INSERT INTO `subscriptions` (`id`, `student_id`,`plan_id`,`amount`, `start_date`, `end_date`, `created_at`, `updated_at`) 
VALUES (NULL, $student_id, $plan_id, $amount,'$start_date','$end_date',current_timestamp(), NULL)";
$res['success']=$conn->query($sql);
return $res;
}


}
// data fetch form purchase 

function getPurchasehistory($conn,$form,$to){
    $sql="select s.*,st.name as student_name,p.title as plan from subscriptions s 
    inner join students st on st.id=s.student_id 
    inner join subscription_plans p on  p.id=s.plan_id  where s.id > 0";

    if(!empty($form)){
        $sql.=" AND s.start_date >='$form'";
    }
    if(!empty($to)){
        $sql.=" AND s.end_date <='$to'";
    }
    $sql.=" order by s.id desc";
    $res=$conn->query($sql);
    return $res;
}
?>