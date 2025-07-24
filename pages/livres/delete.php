<?php
require_once('./../../config/database.php'); 
require_once('./../../classes/Livre.php');    

$livreModel = new Livre($pdo);                

if (isset($_GET['id'])) {                       
    $id = (int) $_GET['id'];                    
    $livreModel->delete($id);                   
}

header('Location: ./../../index.php?message=deleted');
exit;
?>