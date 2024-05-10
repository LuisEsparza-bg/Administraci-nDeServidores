<?php



include '../../Server/Models/Categories.php';
include '../../Server/DBConnection/ConnectDB.php';


$db = new DB();
$conn = $db->connect();
$categoriasClass = new Categories();
$categorias = $categoriasClass->VerCategorias($conn);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Aquí añade la referencia a tu archivo CSS -->
  <link rel="stylesheet" href="../CSS/AltaLibro.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


</head>

<body>
  <section class="h-100 bg-color">
    <div class="container py-5 h-100 bg-color2">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                  alt="Sample photo" class="img-fluid"
                  style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
              </div>
              <div class="col-xl-6">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase">Registro nuevo de libro</h3>

                  <div class="row">
                    <div class="col-md-12 mb-4">
                      <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="form3Example1m">Titulo</label>
                        <input type="text" id="Titulo" class="form-control form-control-lg" />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 mb-4">
                      <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="form3Example1m">Nombre Autor</label>
                        <input type="text" id="Nombre" class="form-control form-control-lg" />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 mb-4">
                      <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="form3Example1m">Año Publicación</label>
                        <input type="date" id="Year" class="form-control form-control-lg" />
                      </div>
                    </div>
                  </div>

                  <div class="row ">
                    <label class="form-label" for="form3Example1m">Categoría</label>
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

                  <div class="row">
                    <div data-mdb-input-init class="form-outline mb-4">
                      <label class="form-label" for="form3Example9">Sinopsis</label>
                      <textarea id="Sinopsis" class="form-control form-control-lg" rows="4"></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 mb-4">
                      <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="form3Example1m">Editorial</label>
                        <input type="text" id="Editorial" class="form-control form-control-lg" />
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div data-mdb-input-init class="form-outline mb-4">
                      <label class="form-label" for="form3Example99">Portada</label>
                      <div class="input-group">
                        <input type="file" class="form-control form-control-lg" id="Imagen"
                          aria-describedby="inputGroupFileAddon">
                        <label class="input-group-text" for="Imagen" id="inputGroupFileAddon">Seleccionar
                          archivo</label>
                      </div>
                    </div>
                  </div>

                  <div class="d-flex justify-content-end pt-3">
                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                      class="btn btn-secondary btn-lg">Regresar</button>
                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-lg ms-2"
                      id="Btn_AltaLibro">Agregar Libro</button>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script src="../JS/AltaLibro.js"></script>



</body>