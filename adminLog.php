
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style_adminLog.css">

</head>
<body>
    
    <?php include 'headers/header_adminLog.php'; ?>

    <div class="container">
            <section>
            <div class="add-product-form">
                    <h3>Welcome - Admin</h3>
                    <p class="desc">Admin Name : <input type="text" id="adminName" class="box" requried></p><br>
                    <p class="desc">Admin Password : <input type="password" id="adminPassword" class="box" requried></p><br>
                    <input type="submit" value="Log In" onclick="validate()" class="btn" >
            </div>
            </section>
    </div>

    <div class="banner"><img src="pawel-czerwinski-aA4RhOIW93U-unsplash.jpg" id="img" alt=""></div>

    
    <script src="adminLog.js"></script>
    <script src="https://kit.fontawesome.com/8a132519b4.js" crossorigin="anonymous"></script>
</body>
</html>