<?php

// Crear una sentencia sql para comprobar que el usuario está registrado


require("conexion.php");

$usuario = $_POST['usuario'];

$pass = $_POST['pass'];

$consulta = mysqli_query($conexion, " SELECT * FROM usuario WHERE usuarioNombre = '$usuario' AND pass = '$pass'");

if (($consulta) and ($user = mysqli_fetch_assoc($consulta))) {

?>

  <!DOCTYPE html>
  <html lang="es">

  <head>
    <link rel="stylesheet" href="estilo.css">
    <script src="javascript.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"></script>
    <title>TrueChange</title>
  </head>

  <body>
    
    <div class="loader">
      <div class="spinner"></div>
      <p>Cargando...</p>
    </div>
    
    <?php
    include "conexion.php";
    ?>
    <header class="header">
      
      <div class="px-2 py-1 bg-opacity-30 bg-info bg-gradient text-white contenedor">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-between">
            <img src="imagenes/icono_proyecto.png" alt="icono de la aplicacion" width="100" height="100">
            <!-- Ejemplo en PHP -->
           

            
            
            
            <div class="dropdown"> <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="uploads/default.jpg" alt="" width="40" height="40" class="rounded-circle me-2">
              <strong> <?php print($_POST['usuario']) ?></strong> </a>
              <ul class="dropdown-menu text-small shadow" style="">
                <li><a class="dropdown-item" href="cambiar.html">Cambiar foto de perfil</a></li>
                <li><a  class="btn dropdown-item" data-bs-toggle="modal"
              data-bs-target="#exampleModal12">Subir producto</a></li>
                <li><a class="dropdown-item" href="#">Mi perfil</a></li>
                <li><a class="dropdown-item" href="#">Configuración</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="index.php">Cerrar sesión</a></li>
              </ul>
            </div>
            
            <!-- Modal subir producto-->
            
            <div class="modal" id="exampleModal12" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Rellena los datos de tu anuncio</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="insertar.php" method="post">
                      <div class="col-md-12">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                      </div>
                      <div class="col-md-12">
                        
                        
                        <select class="form-select ">
                          <option selected disabled>Categoria</option>
                          <option value="1">Coches</option>
                          <option value="2">Motos</option>
                          <option value="3">Motor y accesorios</option>
                          <option>Moda y accesorios</option>
                          <option value="1">Inmobiliaria</option>
                          <option value="2">Tecnología y electrónica</option>
                          <option value="3">Deporte y ocio</option>
                          <option>Bicicletas</option>
                          <option value="1">Hogar y jardin</option>
                          <option value="2">Electrodomésticos</option>
                          <option>Cine libros y música</option>
                          <option value="1">Niños y bebés</option>
                          <option value="2">Coleccionismo</option>
                          <option>Construccion y reformas</option>
                          <option value="1">Industria y agricultura</option>
                          <option value="2">Empleo</option>
                          <option>Servicios</option>
                          <option value="1">Otros...</option>

                        </select>



                      </div>
                      <div class="col-md-12">

                        <textarea name="descripcion" id="descripcion" class="form-control">Descripcion</textarea>
                      </div>
                      <div class="col-md-12">
                        <label for="cambio" class="form-label">Quiero cambiar por...</label>
                        <input type="text" class="form-control" id="cambio" name="cambio" required>
                      </div>
                      <div class="col-md-12">
                        <label for="imagenes" class="form-label">Fotos</label>
                        <input type="file" class="form-control" id="imagenes" name="imagenes" required>
                      </div>
                      <div class="col-md-12">


                    </form>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Borrar</button>
                      <button type="button" class="btn btn-primary">Publicar</button>
                    </div>
                  </div>
                </div>
              </div>
            
            
            <!-- Modal inicio de sesión-->
            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">¡¡Bienvenido/a a TrueChange!!</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="iniciar.php" class="row g-3">
                        <div class="col-md-12">
                          <label for="validationDefault10" class="form-label">Usuario</label>
                          <input type="text" name="usuario" class="form-control" id="validationDefault10" pattern="[a-zA-Z]+" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault11" class="form-label">Contraseña</label>
                          <input type="password" name="pass" class="form-control" id="validationDefault11" required>
                        </div>

                        <div class="col-12">
                          <button class="btn btn-primary" type="submit">Entrar</button>
                        </div>
                      </form>
                    </div>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



      </div>
      </div>
      </div>
      <div>
    </header>
    <!-- Barra de navegación-->
    <div class="barraNavegacion mx-auto ">

      <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-item nav-underline">
              <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"
                  href="#">Categorias</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Electrónica</a></li>
                  <li><a class="dropdown-item" href="#">Informática</a></li>
                  <li><a class="dropdown-item" href="#">Hogar</a></li>
                  <li><a class="dropdown-item" href="#">Jardineria</a></li>
                  <li><a class="dropdown-item" href="#">Coches</a></li>
                  <li><a class="dropdown-item" href="#">Motos</a></li>
                </ul>
              </li>


              <li class="nav-item ">
                <a class="nav-link" href="#">Electronica</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Informática</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Hogar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Coches</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Motos</a>
              </li>
            </ul>
          </div>
          <form class="d-flex col-lg-5 col-md-8 col-sm-9" role="search">
            <input class="form-control me-2 text-primary" type="search" placeholder="Ej.Iphone" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>

          </form>
        </div>
      </nav>

    </div>
    </div>
    <!-- Hasta aquí la barra de navegación-->

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none"> <svg class="bi pe-none me-2" width="40" height="32" aria-hidden="true">
          <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Sidebar</span> </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item"> <a href="#" class="nav-link active" aria-current="page">
            <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
              <use xlink:href="#home"></use>
            </svg>
            Inicio
          </a> </li>
        <li> <a href="#" class="nav-link link-body-emphasis"> <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
              <use xlink:href="#speedometer2"></use>
            </svg>
            Mis productos
          </a> </li>
        <li> <a href="#" class="nav-link link-body-emphasis"> <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
              <use xlink:href="#table"></use>
            </svg>
            Favoritos
          </a> </li>
        <li> <a href="#" class="nav-link link-body-emphasis"> <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
              <use xlink:href="#grid"></use>
            </svg>
            Products
          </a> </li>
        <li> <a href="#" class="nav-link link-body-emphasis"> <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
              <use xlink:href="#people-circle"></use>
            </svg>
            Vendedores
          </a> </li>
      </ul>
      <hr>
    </div>

    <script>
      window.onload = function() {
        const loader = document.querySelector('.loader');
        loader.style.transition = 'opacity 0.5s ease'; // Transición para el desvanecimiento
        loader.style.opacity = '0'; // Hace que el loader se desvanezca

        // Opcional: Eliminar el loader del DOM después de la transición
        setTimeout(() => {
          loader.remove();
        }, 500);
      };
    </script>


  </body>

  </html>


<?php


} else {


  header("Location:index.php");
}


?>