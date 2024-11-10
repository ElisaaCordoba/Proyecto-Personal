<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyectoselisa";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Defino variables con sus nombres para poder añadirlo posteriormente a la tabla
    $nombreProyecto = $_POST['proyecto'];
    $nombreIMG = $_FILES['img']['name'];
    $descripcion = $_POST['short_desc'];
    //Subo archivo a la carpeta
    $target_path = "imgproyectos/";  
    $target_path = $target_path.basename( $_FILES['img']['name']);   
    move_uploaded_file($_FILES['img']['tmp_name'], $target_path);
    //Inserto datos en SQL
    $sql = "INSERT INTO proyectos (titulo, descripcion, imagen) VALUES ('$nombreProyecto', '$descripcion', '$nombreIMG')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('¡El proyecto ha sido agregado con exito!');</script>";
    } else {
        echo "<script>alert('Se ha producido un error, revise la conexion con el servidor de mysql');</script>";
    }
    
}
$conn->close();
?>

<html lang="es" data-bs-theme="light">

<head>
    <title>Añadir Proyecto
    </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <main>
        <div class="container" id="contacto">
            <br><br>
            <div class="row align-items-center">
                <div class="col ">
                    <form class="was-validated" id="proyectForm" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Titulo</label>
                            <input type="text" class="form-control" id="proyecto" name="proyecto" maxlength="20" required>
                        </div>
                        <div class="mb-3">
                            <label for="validationCustom02" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="short_desc" name="short_desc" maxlength="120" required>
                        </div>
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Imagen</label>
                            <input type="file" id="img" name="img" class="form-control" maxlength="100" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Añadir Proyecto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-light text-center py-3">
    <p>&copy; 2024 Elisa. Todos los derechos reservados.</p>
  </footer>
</body>

</html>