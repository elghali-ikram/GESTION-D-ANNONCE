<?php
require 'connect.php';
print_r ($_POST);
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $title = $_POST['title'];
    $price = $_POST['price'];
    $address = $_POST['address'];
    $superficie = $_POST['superficie'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $date = date('Y-m-d');
    $fileName = $_FILES["imageadd"]["name"];
        $tempName = $_FILES["imageadd"]["tmp_name"];
        $fileSize = $_FILES['imageadd']['size'];
        $folder = "images/$fileName";
    echo $folder;
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

            try {
                move_uploaded_file($tempName, $folder);
                    $sql = "INSERT INTO Annonces(titre,image,description,superficie,adresse,montant,dateAnnonce,typeAnnonce) VALUES('$title','$folder','$description','$superficie','$address','$price','$date','$type')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully !";
                    } else {
                        echo "Error: " . $sql . "" . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                    header("Location:crud.php");
         
            }catch (Exception $e) {
                // code to handle the exception
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }

        }



?>