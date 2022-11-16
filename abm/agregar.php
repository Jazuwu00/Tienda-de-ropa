
    <?php
    // 1) Conexion
    // a) realizar la conexion a la ddbb
    // b) seleccionar la base de datos a usar
    $conexion = mysqli_connect("127.0.0.1", "root", "");
    mysqli_select_db($conexion, "tiendaderopa");

    // 2) Almacenamos lod datos del envio POST
    // a) generar variables para cada dato a almacenar en la ddbb
    $ropa= $_POST['ropa'];
    $marca= $_POST['marca'];
    $talle= $_POST['talle'];
    $precio= $_POST['precio'];
    $promocion= $_POST['promocion'];
    // si se desea almacenar una imagen en la base de datos usar lo siguiente
    $imagen= addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $imagen2= addslashes(file_get_contents($_FILES['imagen2']['tmp_name']));

    //3) preparar la orden SQL
    //INSERT INTO nombre_tabla (campos_tabla) values(valores_a_ingresar)
    //=> ingresa dentro de la siguiente tabla los siguientes valores
    //a) generar la consulta a realizar


    $consulta= "INSERT INTO ropa (id,imagen,imagen2,ropa,marca,talle,precio,promocion) values ('','$imagen', '$imagen2', '$ropa','$marca','$talle','$precio','$promocion')";
    
   


    // 4) Ejecutar la orden y ingresamos datos 
    // a) ejecutar la consulta 
    mysqli_query($conexion, $consulta);
    // b) redirigir al index
    header("Location: ..\index.php");

    
     ?>
   
