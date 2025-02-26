<?php
session_start();
if($_SERVER ['HTTP_HOST'] =='localhost'){

    define("base_url","http://localhost/PHP PROJECT/Slm/");
    define("dir_url",$_SERVER['DOCUMENT_ROOT']."/PHP PROJECT/Slm/");


    
    define("SERVER_NAME","localhost");
    define("USERNAME","root");
    define("PASSWORD","");
    define("port","3307");
    define("DATABASE","lms");
}
else{
    define("base_url","http://Slm.com");
    define("dir_url",$_SERVER['DOCUMENT_ROOT']);

    define("SERVER_NAME","");
    define("USERNAME","");
    define("PASSWORD","");
    define("DATABASE","");
}


?>