<?php
session_start();
require_once("lib.php");

if (empty($_SESSION["admin"])) {
    header("LOCATION:index.php");
}



if (isset($_POST["question"])) {
    $question = $_POST["question"];
    $answer = $_POST["answer"];
    $id = $_POST["id"];

    $errors = [];
    if (empty($_POST["question"])){
        $errors[]="The failed is required";
    }


    

    if (empty($errors)){
        editquestion($id,$question,$answer);
        header("LOCATION:questions.php");
    }

}
else{
    $question = getquestion($_GET["id"]);

}




?>


<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
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
            <h1>اضافة سؤال</h1>
        </div>
        <section class="login-card" id="regcard">
            <form action="updateqestion.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
                    <input type="text" class="form-control" placeholder="السؤال" name="question" value="<?= $question["name"] ?>" />
                </div>
                <button type="submit" class="btn">اضافة</button>
            </form>
        </section>
    </article>
    <script src="js/index.js"></script>
</body>

</html>