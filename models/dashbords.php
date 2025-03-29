<?php

// <!-- function for get count all  -->

 function getCount($conn){

    $count=array(
        'books'=>'',
        'student'=>'',
        'revenue'=>'',
        'loan'=>'',

    );
// Get total books 

    $sql="select count(id) as total_book from books";
    $res=$conn->query($sql);
    if($res->num_rows>0){
        $book=$res->fetch_assoc();
        $count['books']=$book['total_book'];

    }

    // Get total student 

    $sql="select count(id) as total_student from students";
    $res=$conn->query($sql);
    if($res->num_rows>0){
        $student=$res->fetch_assoc();
        $count['student']=$student['total_student'];

    }
// Get total revenue 

    $sql="select sum(amount) as total_revenue from subscriptions";
    $res=$conn->query($sql);
    if($res->num_rows>0){
        $sub=$res->fetch_assoc();
        $count['revenue']=$sub['total_revenue'];

    }
// Get total  Number of loan 
    $sql="select count(id) as total_loan from book_loans";
    $res=$conn->query($sql);
    if($res->num_rows>0){
        $loan=$res->fetch_assoc();
        $count['loan']=$loan['total_loan'];

    }

    return $count;
 }

 //  fetch student data 
function getSudents($conn){
    $sql="select * from students order by id desc limit 6";
    $result=$conn->query($sql);

    return $result;
}

//  loan data fetch

function fetchloan($conn){

    

    //  $sql="select b.*,c.name as cat_name from  books b left join categories c on c.id=b.catagory_id order by id desc";
    
        $sql="select l.*,b.title as book_name,s.name as student_name from book_loans l
              inner join books b on l.books_id=b.id 
              inner join students s on l.student_id=s.id order by l.id desc limit 5";
    
              $res=$conn->query($sql);
    
             
              
    
     return $conn->query($sql);
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
    $sql.=" order by s.id desc limit 5";
    $res=$conn->query($sql);
    return $res;
}
 ?>

