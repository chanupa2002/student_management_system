<?php
    require_once('connection.php');
?>


<?php

    if (isset($_POST['submit'])) {
                
        $name = $_POST['name'];
        $contactNo = $_POST['contactNo'];
        $parentName = $_POST['parentName'];
        $address = $_POST['address'];
        $totalFiles = count($_FILES['fileImg']['name']);
        $filesArray = array();

        for($i=0; $i<$totalFiles; $i++){
            $imageName = $_FILES['fileImg']['name'][$i];
            $tmpName = $_FILES["fileImg"]["tmp_name"][$i];
    
            $imageExtension = explode('.', $imageName);
            $imageExtension = strtolower(end($imageExtension));
    
            $newImageName = uniqid() . '.' . $imageExtension;
    
            move_uploaded_file($tmpName, 'uploads/'. $newImageName);
            $filesArray[] = $newImageName;
        }

        $filesArray = json_encode($filesArray);

            $query = "INSERT INTO classfee ( ";
            $query .= "name, image, contactNo, parentName, address";
            $query .= ") VALUES (";
            $query .= "'$name', '$filesArray', '$contactNo', '$parentName', '$address'";
            $query .= ")";

            $result = mysqli_query($connection, $query);


            if ($result) {
                // query successful... redirecting to students page
                header('Location: home.php?student_added=true');
                $message[] = 'Student added Successfully !';
            } else {
                echo "Failed to add the new student ! ";
                $message[] = 'Failed to add the new student ! ';
            }

        }

        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="css/style_addStudent.css">
</head>
<body>
    
<?php include 'headers/header_addStudent.php'; ?>


    <div class="container">
            <section>
            <form enctype="multipart/form-data" action="" method="post" class="add-product-form">
                    <h3>Add a New Student</h3>
                    <p class="desc">Student Name : </p><input type="text" name="name" class="box" required><br>
                    <p class="desc">Contact No : </p><input type="text" name="contactNo" class="box" required><br>
                    <p class="desc">Parent Name : </p><input type="text" name="parentName" class="box" required><br>
                    <p class="desc">Address : </p><input type="text" name="address" class="box" required><br>
                    <p class="desc">Student Photo : <input type="file" name="fileImg[]" accept=".jpg, .jpeg, .png" required multiple></p><br>

                    <input type="submit" value="Add" name="submit" class="btn">
                </form>
            </section>
    </div>

    <div class="banner"><img src="pawel-czerwinski-aA4RhOIW93U-unsplash.jpg" id="img" alt=""></div>


    <script src="https://kit.fontawesome.com/8a132519b4.js" crossorigin="anonymous"></script>
</body>
</html>