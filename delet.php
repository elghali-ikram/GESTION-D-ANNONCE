<?php
require('connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print_r($_POST);
    $id = $_POST['delete_id'];
    try {
        $sql = "DELETE FROM `Annonces` WHERE id=$id";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location: crud.php');
    } catch (Exception $e) {
        // code to handle the exception
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}  
?>