<?php
function require_login() {
    require_role ('beheerder'); 
    if (empty($_SESSION['gebruikers'])) {
        header('Location: index.php');
        exit;
    }
}

require_login();
 
function require_role($role) {
    //require_login();
    if ($_GET['rol'] !== $role) {
        http_response_code(403);
        echo "Verboden: onvoldoende rechten.";
        exit;
    }
    if($_GET['rol'] == $role)
    {
       header('Location: adminhomepagina.php');
       exit;
    }
}

