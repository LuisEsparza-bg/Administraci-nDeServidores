<?php


session_start();
include '../../Server/Models/Categories.php';
include '../../Server/DBConnection/ConnectDB.php';
include '../../Server/DAO/DAOLibros.php';


$db = new DB();
$conn = $db->connect();
$categoriasClass = new Categories();
$categorias = $categoriasClass->VerCategorias($conn);
$librosNuevo = new librosDAO();

 
if(isset($_GET) && !empty($_GET)) {
  // Verificar si existe el parámetro 'categorias'
  if(isset($_GET['categoria'])) {
      $categoria = $_GET['categoria'];
      
  } else {
      
  }
  
  // Verificar si existe el parámetro 'autorTexto'
  if(isset($_GET['autorTitulo'])) {
      $autorTexto = $_GET['autorTitulo'];
      
      $libros = new LibrosDAO();
      $librosNuevo = $libros->busquedaLibros($autorTexto,$categoria);
  } else {
      
  }
} else {
  
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicio</title>
    <link rel="stylesheet" href="../CSS/PaginaInicio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<script>
    // Función para enviar los parámetros de búsqueda a la página de inicio
    function enviarParametros() {
        // Obtener los valores de los campos de búsqueda
        var categoria = document.getElementById('categorias').value;
        var autorTitulo = document.getElementById('search').value;

        // Construir la URL con los parámetros de búsqueda
        var url = 'http://localhost:8080/dashboard/AdserBiblioteca/AdministracionDeServidores/Client/HTML/PaginaInicio.php?categoria=' + categoria + '&autorTitulo=' + autorTitulo;

        // Redirigir a la nueva página
        window.location.href = url;
    }
</script>
<body>
<nav class="navbar navbar-expand-lg fixed-top navbar-scroll shadow-0" style="background-color: #fccb90;">
  <div class="container">
  <img src="../Imagenes/UANL.png"
                    style="width: 185px; height: 100px;" alt="logo">
                    <?php if($_SESSION['rol'] == 0):?>
                      <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 btn-cafe" type="button" onclick="window.location.href='AltaLibro.php';"> Dar de Alta Libro</button>
                     <?php endif?>
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 btn-cafe" type="button" onclick="window.location.href='Login.php';"> Cerrar Sesión </button>
    <img src="../Imagenes/LogoSinRelleno.png" style="width: 200px; height: 150px;" alt="logo">                    
  </div>
</nav>
<div class="Columna">
<div class="container" style="margin-top: 70px;">
<div class="row">
    <div class="col-lg-12 card-margin">
        <div class="card search-form">
            <div class="card-body p-0">
                
                    <div class="row">
                        <div class="col-12">
                            <div class="row no-gutters">
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <?php
                                      if ($categorias) {
                                        echo '<select data-mdb-select-init class="form-select" id="categorias">';
                                        foreach ($categorias as $categoria) {
                                          echo '<option value="' . $categoria['ID_Categoria'] . '"data-idCategoria="' . $categoria['ID_Categoria'] . '" title="' . $categoria['Descripcion_Categoria'] . '">' .
                                            $categoria['Nombre_Categoria'] . '</option>';
                                        }
                                        echo '</select>';
                                      } else {
                                        echo "No se encontraron categorías.";
                                      }
                                      ?>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-12 p-0">
                                    <input type="text" placeholder="Search..." class="form-control" id="search" name="search">
                                </div>
                                <div class="col-lg-1 col-md-3 col-sm-12 p-0">
                                <button type="button" onclick="enviarParametros()" class="btn btn-base">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>

<div style="background-color: white; width: 1300px; height: 1000px; padding: 20px 40px;" id= "busqLibro">
<?php
if($librosNuevo) {
    foreach($librosNuevo as $libro) {
      $imagenCodificada = $libro['Portada'];

    // Decodificar la imagen
    $imagenDecodificada = base64_encode($imagenCodificada);

  
?>
<div class="well search-result">
    <div class="row">
        <a href="#">
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                <!-- Aquí puedes agregar la imagen del libro -->
                <?php echo '<img class="img-responsive" style="max-width: 400px; max-height: 300px;" src="data:image/jpeg;base64,' . $imagenDecodificada . '" alt="' . $libro['Titulo'] . '">'; ?>
            </div>
            <div class="col-xs-6 col-sm-9 col-md-9 col-lg-10 title">
                
                <h3><?php echo $libro['Titulo']; ?></h3>
                
                <p><?php echo "Nombre de Autor: " . $libro['Nombre_Autor']; ?></p>
                <p><?php echo "Sinopsis: " . $libro['Sinopsis']; ?></p>
                <p><?php echo "Año de publicación: " . $libro['Year_Publicacion']; ?></p>
                <p><?php echo "Editorial: " . $libro['Editorial']; ?></p>
            </div>
        </a>
    </div>
</div>
<?php
    }
} else {
    echo "No se encontraron resultados.";
}
?>
</div>



</div>
            <footer
          class="text-center text-lg-start text-white"
          style="background-color: #3e4551"
          >
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">FOOTER CONTENT</h5>

            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Molestiae modi cum ipsam ad, illo possimus laborum ut
              reiciendis obcaecati. Ducimus, quas. Corrupti, pariatur eaque?
              Reiciendis assumenda iusto sapiente inventore animi?
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Link 1</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 2</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 3</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 4</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Link 1</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 2</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 3</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 4</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Link 1</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 2</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 3</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 4</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Link 1</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 2</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 3</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 4</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->

      <hr class="mb-4" />

      <!-- Section: CTA -->
      <section class="">
        <p class="d-flex justify-content-center align-items-center">
          <span class="me-3">Register for free</span>
          <button type="button" class="btn btn-outline-light btn-rounded">
            Sign up!
          </button>
        </p>
      </section>
      <!-- Section: CTA -->

      <hr class="mb-4" />

      <!-- Section: Social media -->
      <section class="mb-4 text-center">
        <!-- Facebook -->
        <a
           class="btn btn-outline-light btn-floating m-1"
           href="#!"
           role="button"
           ><i class="fab fa-facebook-f"></i
          ></a>

        <!-- Twitter -->
        <a
           class="btn btn-outline-light btn-floating m-1"
           href="#!"
           role="button"
           ><i class="fab fa-twitter"></i
          ></a>

        <!-- Google -->
        <a
           class="btn btn-outline-light btn-floating m-1"
           href="#!"
           role="button"
           ><i class="fab fa-google"></i
          ></a>

        <!-- Instagram -->
        <a
           class="btn btn-outline-light btn-floating m-1"
           href="#!"
           role="button"
           ><i class="fab fa-instagram"></i
          ></a>

        <!-- Linkedin -->
        <a
           class="btn btn-outline-light btn-floating m-1"
           href="#!"
           role="button"
           ><i class="fab fa-linkedin-in"></i
          ></a>

        <!-- Github -->
        <a
           class="btn btn-outline-light btn-floating m-1"
           href="#!"
           role="button"
           ><i class="fab fa-github"></i
          ></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 0, 0.2)"
         >
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/"
         >MDBootstrap.com</a
        >
    </div>
    <!-- Copyright -->
  </footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>