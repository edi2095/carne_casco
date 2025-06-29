
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
         button {
    padding: 10px 20px;
    margin: 10px;
    border: none;
    background-color: #007bff;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    align-self: center;
  }
  
  button:hover {
    background-color: #0056b3;
  }

         body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, black, red);
        }
        .conte {
            text-align: center;
            margin-top: 50px;
        }
      


        #image-preview {
            text-align: center; /* Centrar horizontalmente */
            margin-bottom: 20px; /* Espaciado inferior */
        }

        /* Estilo para la imagen */
        #image-preview img {
            max-width: 150px; /* Ajustar el tamaño máximo de la imagen */
            max-height: 150px;
            margin: auto; /* Centrar horizontalmente */
            display: block; /* Evitar espacio adicional debajo de la imagen */
        }

        /* Estilo para el botón de carga de archivos */
        #file-upload {
            display: block; /* Mostrar el input de tipo file como bloque para centrarlo */
            margin: 0 auto; /* Centrar horizontalmente */
            margin-bottom: 20px; /* Espaciado inferior */
        }

        #image-preview {
            width: 150px;
            height: 150px;
            overflow: hidden;
            border-radius: 50%;
            margin-bottom: 20px;
            position: relative;
        }

        #default-image {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        input[type="file"] {
            margin-bottom: 20px;
        }

        .titu {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .below {
            text-align: center;
            margin-top: 50px;
            font-size: 24px;
        }
        .boton{
            align-items: center;
        }

    </style>
</head>
<body background="img/unacarnitaasada.jpg">
    <header>

        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="Principal.html" class="logo"><img src="img/pixelcut-export.png" width="250px" height="60px"><span>.</span></a>

        <nav class="navbar">
            <a href="Principal.html">Inicio</a>
            <a href="resCerdo.html">Productos</a>
            <a href="duplica.html">Al Vacio</a>
            <a href="conatctanos.html">Contacto</a>
        </nav>
        <div class="icons">
            <a href="resCerdo.html" class="fas fa-shopping-cart"></a>
            <a href="ingreso.html" class="fas fa-user"></a>

        </div>
    </header>
    
    <?php
session_start();

if (!isset($_SESSION['xd_id'])) {
    // Si la sesión no existe, redirigir a la página de inicio de sesión
    header("Location: regis.php");
    exit;
}
$usuario_id = $_SESSION['xd_id'];
include("crear.php");
$link = Conectarse();


$sql = "SELECT usuario FROM registro WHERE id = '$usuario_id'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre = $row["usuario"];
}
?>

<!-- Resto de tu código HTML -->

<div class="cont">
    <div class="titu"><h1>   Bienvenido</h1></div>
    <!-- Contenedor para la imagen -->
    <div id="image-preview">
        <center> <img id="default-image" src="img/nugget.jpeg" alt="Imagen Predeterminada"></center>
    </div>

    <!-- Botón para subir la imagen -->
    <form action="verificar.php" method="post" enctype="multipart/form-data">
    <input type="file" id="file-upload" accept="image/*" onchange="previewImage(event)">
    </form>
    <div class="below"><?php echo htmlspecialchars($nombre); ?></div>
    <div class="boton">
        <form action="cerar.php" method="post">
            <center> <button type="submit">Cerrar sesión</button></center> 
        </form>      
    </div>
</div>





        <script>
        function previewImage(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = new Image();
                    img.src = e.target.result;
                    img.onload = function() {
                        var canvas = document.createElement('canvas');
                        var ctx = canvas.getContext('2d');
                        var size = Math.min(img.width, img.height);
                        canvas.width = size;
                        canvas.height = size;
                        ctx.beginPath();
                        ctx.arc(size / 2, size / 2, size / 2, 0, Math.PI * 2);
                        ctx.closePath();
                        ctx.clip();
                        ctx.drawImage(img, (size - img.width) / 2, (size - img.height) / 2);

                        var circularImg = new Image();
                        circularImg.src = canvas.toDataURL();
                        circularImg.onload = function() {
                            document.getElementById('default-image').style.display = 'none';
                            document.getElementById('image-preview').appendChild(circularImg);
                            // document.getElementById('clear-button').style.display = 'block';
                        };
                    };
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>
