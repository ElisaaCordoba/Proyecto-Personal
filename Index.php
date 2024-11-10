<?php
            // Conectar a la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "proyectoselisa";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta para obtener los proyectos
            $sql = "SELECT titulo, descripcion, imagen FROM proyectos";
            $result = $conn->query($sql);
            ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Proyecto personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
  <style>
    body {
      scroll-behavior: smooth;
      background-color: #add8e6;
    }
      h5 {
            font-family: 'Lora', serif;
            font-weight: bold;
        }
      h1 {
        font-family: 'Times New Roman', serif;
      }
       p {
    font-family: 'Open Sans', sans-serif; 
    font-size: 16px; 
}
    
  </style>
</head>
<body >
  <button id="backToTop" class="btn btn-primary" title="Subir" style="display: none; position: fixed; bottom: 20px; right: 20px;">
    ↑ Subir al Menú
  </button>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Menú</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#about">Sobre mi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#projects">Mis Proyectos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contacto</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="buscar" placeholder="Buscar..." id="menuBuscador">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
        </div>
  </nav>

  <div id="about" class="container my-5">
    <h1>Sobre mi</h1>
    <p>Soy Elisa Córdoba, tengo 20 años y estudio actualmente en Cuatrovientos una FP de Administración de Sistemas Informáticos en Redes. Estoy en 2º año y en enero empiezo las prácticas en una empresa. Aqui me estoy formando para convertirme en una profesional en el ámbito de la administración de redes y sistemas informáticos. Mi pasión por la tecnología y la informática ha crecido desde muy joven, y ahora estoy adquiriendo los conocimientos necesarios para gestionar entornos de TI, configurar servidores y asegurar la seguridad de los datos en diferentes sistemas.</p>
    <P>Anteriormente estudie hasta 4º de la ESO en el colegio Carmelitas Vedruna y luego me cambié a Jesuitas para estudiar bachillerato. Al terminar bachiller me saque el B1 y pretendo sacarme el B2.</P>
    <br>
    <h5>Intereses personales</h5>
    <p>Fuera de los ordenadores, tengo muchas aficiones que me mantienen creativa y activa. Una de ellas es la fotografía, donde disfruto capturando paisajes, detalles de la naturaleza y momentos cotidianos a través de mi cámara. La fotografía me permite ver el mundo desde una perspectiva diferente, siempre buscando la luz adecuada y el ángulo perfecto. Estoy constantemente explorando nuevas técnicas y ajustando mis fotos para crear imágenes que transmitan emociones y recuerdos.</p>

     <p>Otra de mis grandes aficiones es salir en bici. Me encanta explorar nuevas rutas, ya sea en entornos rurales o urbanos, y disfrutar del aire libre mientras descubro lugares que, muchas veces, resultan ser perfectos para fotografiar. Esta combinación de actividad física y creatividad me fascina. Además, montar en bici me permite desconectar del día a día, al mismo tiempo que me mantengo activa y en forma.</p>
     
     <p>Las manualidades siempre han sido parte de mi vida. Me encanta estar en busca de nuevos proyectos en los que pueda trabajar con las manos, ya sea haciendo decoraciones, regalos personalizados o hasta cosas útiles para la casa. Disfruto mucho imaginar algo, darle forma y ver cómo cobra vida. Para mí, las manualidades son una forma de desconectar del día a día y activar mi creatividad. Me encanta esa sensación de haber hecho algo con mis propias manos, y además creo que estos proyectos me ayudan a mejorar mi concentración y paciencia.</p>
     
     <p>En resumen, la combinación de estas aficiones fotografía, la bici y manualidades me permite mantener un equilibrio entre lo digital y lo físico, lo que me ayuda a recargar energías y mantener mi mente siempre activa y creativa.</p>
  </div>

  <div id="projects" class="container my-5">
    <h1>Mis proyectos</h1>
    <div class="row" id="projectCards">
      <?php 
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-md-4">';
                        echo '    <div class="card">';
                        echo '        <img src="./imgproyectos/' . $row["imagen"] . '" class="card-img-top" alt="Imagen del proyecto">';
                        echo '        <div class="card-body">';
                        echo '            <h5 class="card-title">' . htmlspecialchars($row["titulo"]) . '</h5>';
                        echo '            <p class="card-text">' . htmlspecialchars($row["descripcion"]) . '</p>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
                    }
                }
      ?>
    </div>
  </div>
  <?php 
    // Cerrar la conexión
    $conn->close();
  ?>

 
  <div id="contact" class="container my-5">
    <h1>Contacto</h1>
    <form id="formContacto"  method="post" enctype="text/plain">
      <div class="form-group">
        <label for="email">Correo Electrónico</label>
        <input type="email" class="form-control" id="email" placeholder="Introduce tu correo" required>
      </div>
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" placeholder="Introduce tu nombre" required>
    </div>
    <div class="form-group">
        <label for="phone">Teléfono</label>
        <input type="tel" class="form-control" id="phone" placeholder="Introduce tu teléfono" required>
    </div>
      <div class="form-group">
        <label for="message">Mensaje</label>
        <textarea class="form-control" id="message" rows="3" placeholder="Escribe tu mensaje" required></textarea>
      </div>
      <button type="button" class="btn btn-primary">Enviar</button>
      </form>
  </div>
  

  <footer class="bg-light text-center py-3">
    <p>&copy; 2024 Elisa. Todos los derechos reservados.</p>
  </footer>

  <script>
  $(document).ready(function() {
    $('#formContacto').on('submit', function(event) {
        event.preventDefault();
        if ($('#email').val() && $('#mensaje').val()) {
            alert('Formulario enviado correctamente. ¡Gracias!');
        } else {
            alert('Por favor, completa todos los campos.');
        }
    });
  });
  $(document).ready(function() {
        $(window).scroll(function() {
      if ($(this).scrollTop() > 100) {
        $('#backToTop').fadeIn();
      } else {
        $('#backToTop').fadeOut();
      }
    });
   
    $('#backToTop').click(function() {
      $('html, body').animate({ scrollTop: 0 }, 600); 
      return false;
    });
  });
  $(document).ready(function () {
    
    $('#menuBuscador').on('input', function () {
        var valorBusqueda = $(this).val().toLowerCase();

      $('#projectCards .col-md-4').filter(function () {
       
        $(this).toggle(
          $(this).find('.card-title').text().toLowerCase().indexOf(valorBusqueda) > -1 ||
          $(this).find('.card-text').text().toLowerCase().indexOf(valorBusqueda) > -1
        );
      });
    });
  }); 
  </script>
  
  
     
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
 
   
