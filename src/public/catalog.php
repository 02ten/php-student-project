<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Catalog</title>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <ul>
        <li><a href="/catalog.php">Каталог</a></li>
        <li><a href="../protected/users.php">Администрирование</a></li>
        <li><a href="../protected/auth.php">Список администраторов</a></li>
        <li><a href="/about.html">О нас</a></li>
    </ul>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php
                        $mysqli = new mysqli("db", "user", "password", "appDB");
                        $result = $mysqli->query("SELECT * FROM product");
                        foreach ($result as $row){
                            echo "<div class='col mb-5' >";
                            echo "<div class = 'card h-100'>";
                            echo "<img class ='card-img-top' src='${row['url_to_photo']}'/>";
                            echo "<div class = 'card-body p-4'>";
                            echo "<div class = 'text-center'>";
                            echo "<h5 class='fw-bolder'>${row['name']}</h5>";
                            echo "</div></div>";
                            echo "<div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>";
                            echo "<p class='text-center' >${row['price']}</p>";
                            echo "</div></div></div>";
                        }
                    ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
    <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->

    </body>
</html>
