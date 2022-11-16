<?php session_start();
$nombre= $_SESSION['usuario']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS del bootstrap  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../estilos/estilos.css">
  <link rel="shortcut icon" href="../imagenes/icono.png" type="image/x-icon">
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
          <li class="nav-item"><a class="nav-link " aria-current="page" href="../index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="promocion.php">En promocion</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Comprar</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="../index.php">Todos los productos</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li><a class="dropdown-item" href="buzos.php">Buzos</a></li>
              <li><a class="dropdown-item" href="remeras.php">Remeras</a></li>
              <li><a class="dropdown-item" href="zapatos.php">Zapatos</a></li>
            </ul>
          </li>
        </ul>

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle bg-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php  echo $nombre ?>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="../listar.php">Editar Productos</a>
            <a class="dropdown-item" href="../abm/agregar1.php">Agregar producto</a>

          </div>
        </div>

      </div>
    </div>
  </nav>


  <div class="mt-3 text-center">
    <h2>Lista de ropa</h2>
    <p>Todos los zapatos en stock</p>
  </div>
  <section>
    <div class="container-fluid">
      <div class="row align-items-center px-3 ">


        <?php
        // 1) Conexion
        $conexion = mysqli_connect("127.0.0.1", "root", "");
        mysqli_select_db($conexion, "tiendaderopa");

        // 2) Preparar la orden SQL
        // Sintaxis SQL SELECT
        // SELECT * FROM nombre_tabla
        // => Selecciona todos los campos de la siguiente tabla
        // SELECT campos_tabla FROM nombre_tabla
        // => Selecciona los siguientes campos de la siguiente tabla
        $consulta = "SELECT * FROM ropa where ropa='zapatilla'";
        // 3) Ejecutar la orden y obtenemos los registros
        $datos = mysqli_query($conexion, $consulta);

        // 4) el while recorre todos los registros y genera una CARD PARA CADA UNA
        while ($reg = mysqli_fetch_array($datos)) { ?>
            <div class="col" >
              <div class="card mx-auto mt-3  text-center bg-dark" style="width: 220px; height:350px;  font-size:20px;">
                <img style="width: 200px;  height:150px;" class="card-img-top mt-2 mx-auto" src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen']) ?>" alt="" width="100px" height="200px" )>
                <a href="ver.php?id=<?php echo $reg['ropa']; ?>" class="card-body text-decoration-none mt-2">
                  <h3 class="card-title text-light" style="width: 100%; font-size:25px;"><?php echo ucwords($reg['ropa'] . ' ' . $reg['marca']) ?></h3>
  
                  <span class="card-text mt-3 text-light "><?php echo (' $' . $reg['precio']); ?></span>
  
                </a>
                <div class="btn-group" style="width:200px; height:50px; margin: 0 auto; gap:5px;">
                  <button style="font-size:20px;" class=" btn btn-primary btn-sm" type="submit"><a class="text-light text-decoration-none" href="producto.php?id=<?php echo $reg['ID']; ?>">Ver</a></button>
                  <button style="font-size:20px;" class=" btn btn-primary btn-sm" type="submit">Comprar</button>
                </div>
              </div>
            </div>

        <?php } ?>

      </div>
    </div>
  </section>
  <div class="text-center mt-5">
    <span class=" text-decoration-underline">
      <p>Otras categorias que pueden interesarte</p>
    </span>
    <button class="  btn btn-primary btn-sm" type="submit"><a class="text-light text-decoration-none" href="nike.php">Nike</a></button>
    <button class="btn btn-primary btn-sm" type="submit"><a class="text-light text-decoration-none" href="buzos.php">Buzos</a></button>
    <button class="btn btn-primary btn-sm" type="submit"><a class="text-light text-decoration-none" href="menora500.php">Menor a $500</a></button>
  </div>

  <footer class="footer bg-dark text-center text-lg-start mt-4">
    <!-- Copyright -->
    <div class="text-center p-3 text-light">
      © 2020 Copyright:
    </div>
  </footer>
  <!-- JavaScript del bootstrap -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>