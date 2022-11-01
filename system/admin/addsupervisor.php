<?php
session_start();
require_once("lib.php");

if (empty($_SESSION["admin"])) {
    header("LOCATION:index.php");
}


if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $course = $_POST["course"];
    $password = md5($_POST["password"]);

    $errors = [];
    if (empty($_POST["email"])){
        $errors[]="The email is required";
    }
    if (empty($_POST["password"])){
        $errors[]="The password is required";
    }
    if (empty($_POST["name"])){
        $errors[]="The name is required";
    }
    if (empty($_POST["course"])){
        $errors[]="The course is required";
    }

    if (empty($errors)){
    
        if (addsupervisor($name,$email,$password,$course)) {
            header("LOCATION:supervisors.php");
        }
    
    }

}




?>


<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>اضافةمشرف</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/index.css" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<nav>
        <div class="nav container">
            <div class="items mt-3">
                <a href="home.php">
                    <h3>الرئيسية</h3>
                </a>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION["admin"]["name"] ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="logout.php">logout</a></li>

                        </ul>
                    </div>
            </div>
            <div class="logo py-2">
                <a href="home.php"><img src="../assets/imgs/logo.jpeg" style="height: 50px;" alt="" /></a>
            </div>
        </div>
    </nav>
    <article class="auth">
        <div class="header">
            <h1>اضافة مشرف</h1>
        </div>
        <section class="login-card" id="regcard">
            <form action="addsupervisor.php" method="POST">
                <div class="form-group">

                <input type="text" class="form-control" placeholder="الاسم" name="name" />
                <input type="email" class="form-control" placeholder="الايميل" name="email" />
                <input type="password" class="form-control" placeholder="كلمة المرور" name="password" />
                <input type="text" class="form-control" placeholder="اسم المادة" name="course" />

                </div>
                <button type="submit" class="btn">اضافة</button>
            </form>
        </section>
    </article>
    <script src="js/index.js"></script>
</body>

</html>