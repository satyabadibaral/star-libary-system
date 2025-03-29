<?php
if(isset($_SESSION['is_user_login'])){
    return true;
}
else
{
    $_SESSION['error']="plase Login first";
    header("LOCATION:".base_url);
    exit;
}
?>