<?php
session_start();

require_once("lib.php");

if (empty($_SESSION["supervisor"])) {
    header("LOCATION:loginstudent.php");
}

$ads = showads();

?>




<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>الرئيسية</title>
    <link rel="stylesheet" href="../assets/css/index.css" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div class="nav container">
            <div class="items mt-3">
                <a href="index.php">
                    <h3>الرئيسية</h3>
                </a>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?= $_SESSION["supervisor"]["name"] ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="logout.php">تسجيل الخروج</a></li>

                    </ul>
                </div>
            </div>
            <div class="logo py-2">
                <a href="index.php"><img src="../assets/imgs/logo.jpeg" style="height: 50px;" alt="" /></a>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <header class="p-3 p-lg-5">
        <div class="">
            <div class="row gap-lg-5 gap-3">
                <div class="main">
                    <div class="d-grid gap-3 gap-md-4">
                        <a href="chat.php" class="btn btn-block">محادثات الطلاب</a>
                        <a href="orders.php" class="btn btn-block">الطلبات</a>
                        <a href="addads.php" class="btn btn-block">اضافة اعلان</a>
                        <?php if ($_SESSION["supervisor"]["superadmin"] == 1): ?>
                        <a href="addsupervisor.php" class="btn btn-block">اضافة مشرف</a>
                        <?php endif; ?>



                    </div>
                </div>
                <div class="side scroll-h">

                    <?php foreach($ads as $ad): ?>
                    <div class="border border-warning p-1 mb-1">
                        <span class="text-bold"><?= $ad["name"]?></span>
                        <p class="font-weight-bold">
                            <?= $ad["content"]?>
                            <br>
                            <?= $ad["date"]?>
                        </p>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </header>
</body>

</html>