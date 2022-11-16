<?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($conexion, "tiendaderopa");

// 2) Almacenamos los datos del envío GET
// a) generar variables para el id a utilizar
$id = $_GET['id'];

// 3) Preparar la orden SQL
// => Selecciona todos los campos de la tabla alumno donde el campo dni sea igual a $dni
// a) generar la consulta a realizar
$consulta = "SELECT * FROM ropa WHERE id=$id";

// 4) Ejecutar la orden y almacenamos en una variable el resultado
// a) ejecutar la consulta
$respuesta = mysqli_query($conexion, $consulta);

// 5) Transformamos el registro obtenido a un array
$datos = mysqli_fetch_array($respuesta);
?>

<?php session_start();
$nombre= $_SESSION['usuario']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="shortcut icon" href="./imagenes/icono.png" type="image/x-icon">
    <title>Tienda</title>
</head>


<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">UwU Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link " aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./categorias/promocion.php">En promocion</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Comprar</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php">Todos los productos</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="categorias/buzos.php">Buzos</a></li>
                            <li><a class="dropdown-item" href="categorias/remeras.php">Remeras</a></li>
                            <li><a class="dropdown-item" href="categorias/zapatos.php">Zapatos</a></li>
                        </ul>
                    </li>
                </ul>

                <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle bg-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php  echo $nombre ?>
          </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="listar.php">Editar Productos</a>
                        <a class="dropdown-item" href="./abm/agregar.html">Agregar producto</a>

                    </div>
                </div>

            </div>
        </div>
    </nav>
    <!-- Header-->

    <?php
    // 6) asignamos a diferentes variables los respectivos valores del array $datos.
    $ropa = $datos["ropa"];
    $marca = $datos["marca"];
    $talle = $datos["talle"];
    $precio = $datos["precio"];
    $imagen = $datos['imagen'];
    $colores = $datos['colores'];
    $link = $datos['link'];
    ?>


    <br>
    <div class="mt-3 text-center">
        <h2>Datos de la prenda </h2>
        <br>

    </div>

    <div class="container text-center">
        <div class="row">
            <div class="col col-sm-12 col-md-6 col-xl-6 mx-auto">
                <div id="carouselExampleIndicators" class="carousel slide mx-auto w-100 " data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner w-75 mx-auto">
                        <div class="carousel-item active">
                            <img class="d-block w-75 mx-auto" src="data:image/jpg;base64,<?php echo base64_encode($datos['imagen']) ?>" alt="First slide" height="300px" widht="300px">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-75 mx-auto" src="data:image/jpg;base64,<?php echo base64_encode($datos['imagen2']) ?>" alt="Second slide" height="300px" widht="300px">
                        </div>

                    </div>

                    <a class="carousel-control-prev " href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">siguiente</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body text-center text-decoration-none">

        <h2 class=" card-title" style="width: 100%;  "><?php echo ucwords($ropa . ' ' . $marca) ?></h2>
        <br>
        <p class="card-subtitle " style=" font-size:22px;"><?php echo ucwords('Talle' . ' : ' . $talle) ?></p>
        <br>
        <span class="card-text "> <?php echo (' $' . $precio); ?></span>

        <br>
        <br>
        <div class=" btn-group  mb-3 " style="width:200px; height:50px; margin: 0 auto; gap:5px;">
            <button style="font-size:12px;" class="text-center btn btn-primary btn-sm" type="submit"><a class="text-light text-decoration-none " href="index.php">Inicio</a></button>

            <button style="font-size:12px;" class=" btn btn-primary btn-sm" type="submit"><a class="text-light text-decoration-none " href="<?php echo $link ?>"> Comprar</a></button>

        </div>
    </div>








    <div class="text-center mt-5">
        <span class=" text-decoration-underline">
            <p>Otras categorias que pueden interesarte</p>
        </span>
        <button class=" btn btn-primary btn-sm" type="submit"><a class="text-light text-decoration-none" href="./categorias/nike.php">Nike</a></button>
        <button class="btn btn-primary btn-sm" type="submit"><a class="text-light text-decoration-none" href="./categorias/buzos.php">Buzos</a></button>
        <button class="btn btn-primary btn-sm" type="submit"><a class="text-light text-decoration-none" href="./categorias/menora500.php">Menor a $500</a></button>
    </div>





    <footer class=" footer bg-dark text-center text-lg-start mt-4">
        <!-- Copyright -->
        <div class="text-center p-3 text-light">
            © 2020 Copyright:
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>