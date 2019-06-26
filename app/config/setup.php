<?php
include_once '../framework/libraries/Database.php';
include_once '../app/config/database.php';
try{
    $content = file_get_contents('../app/config/camagru_db.sql');   
    $db = new Database;
    $db->insert_prepare($content);
    $db->execute_my_requete();
}catch (PDOException $e){
    $error = $e->getMessage();
    echo $error;
}
?>