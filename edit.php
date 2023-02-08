<?php
require('connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "hahoma";
    if (isset($_POST['updat'])) {
        print_r($_POST);
        $id = $_POST["edit_id"];
        $titre = $_POST["titreedit"];
        $description = $_POST["descriptionedit"];
        $superficie = $_POST["Superficieedit"];
        $adresse = $_POST["Adresseedit"];
        $montant = $_POST["montantedit"];
        $type = $_POST["typeedit"];
        $dateannonce = date("Y-m-d");
        $fileName = $_FILES["image"]["name"];
        $tempName = $_FILES["image"]["tmp_name"];
        $fileSize = $_FILES['image']['size'];
        $folder = "images/" . $fileName;
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script>alert('Invalid image extension');</script>";
        } else {
            try {
                move_uploaded_file($tempName, $folder);
                $updatsql = "UPDATE `annonces` SET 
                `titre`='$titre',
                `image`='$folder',
                `description`='$description',
                `superficie`='$superficie',
                `adresse`='$adresse',
                `montant`='$montant',
                `dateAnnonce`='$dateannonce',
                `typeAnnonce`='$type'  WHERE `id`=$id";
                $res = mysqli_query($conn, $updatsql);
                if (!$res) {
                    echo 'Could not update data';
                }
                mysqli_close($conn);
                header("Location:crud.php");
            } catch (Exception $e) {
                // code to handle the exception
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
    }
}
