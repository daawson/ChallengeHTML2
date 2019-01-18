<?php
    session_start();
    echo 'Je wordt uitgelogd!';
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    header("Refresh:2; url=index.php", true, 303);
