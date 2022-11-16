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
$datos=mysqli_fetch_array($respuesta);
?>
<?php session_start();
$nombre= $_SESSION['usuario']; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../estilos/estilos.css">
  <link rel="shortcut icon" href="./imagenes/icono.png" type="image/x-icon">
  <title>Tienda</title>
 
    
    </head>
    <body class="text-light text-center" style=" background-color: rgb(43, 46, 51);">

        <?php
        // 6) asignamos a diferentes variables los respectivos valores del array $datos.
        $ropa=$datos["ropa"];
        $marca=$datos["marca"];
        $talle=$datos["talle"];
        $precio=$datos["precio"];
        $imagen=$datos['imagen'];
        $imagen2=$datos['imagen2'];
        $promocion=$datos['promocion'];?>
 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container px-4 px-lg-5">
    <a class="navbar-brand" href="../index.php">UwU Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
        <li class="nav-item"><a class="nav-link " aria-current="page" href="../index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="../categorias/promocion.php">En promocion</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Comprar</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../index.php">Todos los productos</a></li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item" href="../categorias/buzos.php">Buzos</a></li>
            <li><a class="dropdown-item" href="../categorias/remeras.php">Remeras</a></li>
            <li><a class="dropdown-item" href="../categorias/zapatos.php">Zapatos</a></li>
          </ul>
        </li>
      </ul>

      <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle bg-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php  echo $nombre ?>
          </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="../listar.php">Editar Productos</a>
          <a class="dropdown-item" href="agregar1.php">Agregar producto</a>

        </div>
      </div>

    </div>
  </div>
</nav>

<br>
        <h2>Modificar</h2>
        <p>Ingrese los nuevos datos de la prenda.</p>


<br>
<form action="" method="post" enctype="multipart/form-data" class="container-md" style="width:500px; font-size:20px;">
    <div class="col"><div class="mb-3">

    <label class="form-label">Tipo de prenda</label>
    <input type="text" name="ropa"  class="form-control" placeholder="Tipo de Prenda" value="<?php echo "$ropa"; ?>"> 
      
    </div></div>


    <div class="col">
    <div class="mb-3">
      <label class="form-label">Marca</label>
      <input type="text" name="marca"  class="form-control" placeholder="Marca" value="<?php echo "$marca"; ?>" >
    </div></div>
     
      <div class="col">
      <div class="mb-3">
      <label class="form-label">Talle</label>
      <input type="text" class="form-control" placeholder="talle" name="talle" value="<?php echo "$talle"; ?>">
      
    </div></div>

    <div class="col"><div class="mb-3">
      <label  class="form-label">Precio</label>
      <input type="text" name="precio"  class="form-control" placeholder="$100" value="<?php echo "$precio"; ?>">
    </div></div>

    <div class="col"><div class="mb-3 ">
    <p>

En promocion?<br>

<input type="radio" name="promocion" value="1"> Si

<input type="radio" name="promocion" value="0"> No<br>


</p>
    </div></div>
    

    <div class="col ">
    <label for="">Elige imagen</label> 
    <br>
    <input type="file" name="imagen" placeholder="imagen" required>
    <br>
    <input type="file" name="imagen2" placeholder="imagen2" required>
    </div>

    <div class="col ">
    <button type="submit"  name="guardar_cambios" value="Guardar Cambios" class="btn btn-primary mt-4">Guardar Cambios</button>
    
   </div>

    </form>
  
    <button class="btn btn-danger mt-4" type="submit" ><a class="text-light text-decoration-none" href="../index.php">Cancelar</a></button>
    
    
    <?php
        //dentro del value ponemos el dato que que trajimos del egistro para que ya aparezca el el imput y no volver aq escribirlo
        // Si en la variable constante $_POST existe un indice llamado 'guardar_cambios' ocurre el bloque de instrucciones.
        if(array_key_exists('guardar_cambios',$_POST)){

            // 2') Almacenamos los datos actualizados del envío POST
            // a) generar variables para cada dato a almacenar en la bbdd
            // Si se desea almacenar una imagen en la base de datos usar lo siguiente:
            // addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))
                    $ropa=$_POST['ropa'];
                    $marca=$_POST['marca'];
                    $talle=$_POST['talle'];
                    $precio=$_POST['precio'];
                    $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
                    $imagen2=addslashes(file_get_contents($_FILES['imagen2']['tmp_name']));
                    $promocion=$_POST['promocion'];

            // 3') Preparar la orden SQL
            // "UPDATE tabla SET campo1='valor1', campo2='valor2', campo3='valor3', campo3='valor3', campo3='valor3' WHERE campo_clave=valor_clave"
            // a) generar la consulta a realizar
             $consulta = "UPDATE ropa SET ropa='$ropa', marca='$marca', talle='$talle', precio='$precio', imagen='$imagen', imagen2='$imagen2', promocion= '$promocion' WHERE id =$id";

             // 4') Ejecutar la orden y actualizamos los datos
             // a) ejecutar la consulta
             mysqli_query($conexion,$consulta);

            // a) rederigir a index
            header("Location: ../index.php");

        }?>
   
    <footer class=" footer bg-dark text-center text-lg-start mt-4">
  <!-- Copyright -->
  <div class="text-center p-3 text-light">
    © 2020 Copyright:
  </div>
</footer>

        
        
    </body>
</html>
