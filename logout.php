<?php
    session_start();

    if(session_id() != '')
            $_SESSION = [];
            setcookie("PHPSESSID","",time()-1);
            session_unset();
            session_destroy();
            echo session_status();

            header("Location: index.php");
            
?>