<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tabla.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>FITME</title>
</head>

<body>

    <!--Inicio Navbar-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="login.html">FITME</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!--Fin Navbar-->

    <!--Inicio Body-->

    <div class="titulo">
        <h1>TABLA DE ALIMENTOS</h1>
    </div>

    <div class="logo">
        <img src="img/diet.png">
    </div>

    <div class="table-container">
        <table class="table  " cellspacing="-50">
            <thead>
                <div class="cabezera">
                <tr>
                    <th scope="col">CODIGO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">TIPO</th>
                    <th scope="col">PORCION</th>
                    <th scope="col">PROTEINAS</th>
                    <th scope="col">CARBOS</th>
                    <th scope="col">GRASAS</th>
                    <th scope="col">AZUCARES</th>
                    <th scope="col">CALORIAS</th>
                </tr>
                </div>
            </thead>

            <?php
            include("conexion.php");
            $sql = "SELECT * FROM alimentos";
            $resultado = mysqli_query($conexion, $sql);
            while ($mostrar = mysqli_fetch_array($resultado)) {

            ?>

                <tbody>
                    <div class="datos ">
                    <tr>
                        <th scope="row"></th>
                        <td><?php echo $mostrar['cod_ali']  ?></td>
                        <td><?php echo $mostrar['nom_ali']  ?></td>
                        <td><?php echo $mostrar['tip_ali']  ?></td>
                        <td><?php echo $mostrar['por_ali']  ?></td>
                        <td><?php echo $mostrar['pro_ali']  ?></td>
                        <td><?php echo $mostrar['car_ali']  ?></td>
                        <td><?php echo $mostrar['gra_ali']  ?></td>
                        <td><?php echo $mostrar['azu_ali']  ?></td>
                        <td><?php echo $mostrar['cal_ali']  ?></td>
                    </tr>
                    </div>
                <?php
            }
                ?>
                </tbody>
        </table>
    </div>
</body>

<div class="fot">
    <footer class="bg-light text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn text-white btn-floating m-1" style="background-color: #dd4b39;" href="#!" role="button"><i class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                <!-- Github -->
                <a class="btn text-white btn-floating m-1" style="background-color: #333333;" href="#!" role="button"><i class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">FITME.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!--Fin Footer-->
</div>


</html>