<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Aquí añade la referencia a tu archivo CSS -->
  <link rel="stylesheet" href="../CSS/AltaLibro.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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
                        <input type="text" id="form3Example1m" class="form-control form-control-lg" />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 mb-4">
                      <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="form3Example1m">Nombre Autor</label>
                        <input type="text" id="form3Example1m" class="form-control form-control-lg" />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 mb-4">
                      <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="form3Example1m">Año Publicación</label>
                        <input type="date" id="form3Example1m" class="form-control form-control-lg" />
                      </div>
                    </div>
                  </div>

                  <div class="row ">
                    <label class="form-label" for="form3Example1m">Categoría</label>
                    <div class="col-md-12 mb-4 text-center">
                      <select data-mdb-select-init class="form-select">
                        <option value="1">Moda</option>
                        <option value="2">Amor</option>
                        <option value="3">Terror</option>
                        <option value="4">Ciencia Ficción</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div data-mdb-input-init class="form-outline mb-4">
                      <label class="form-label" for="form3Example9">Sinopsis</label>
                      <textarea id="form3Example9" class="form-control form-control-lg" rows="4"></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 mb-4">
                      <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="form3Example1m">Editorial</label>
                        <input type="text" id="form3Example1m" class="form-control form-control-lg" />
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div data-mdb-input-init class="form-outline mb-4">
                      <label class="form-label" for="form3Example99">Portada</label>
                      <div class="input-group">
                        <input type="file" class="form-control form-control-lg" id="form3Example99"
                          aria-describedby="inputGroupFileAddon">
                        <label class="input-group-text" for="form3Example99" id="inputGroupFileAddon">Seleccionar
                          archivo</label>
                      </div>
                    </div>
                  </div>

                  <div class="d-flex justify-content-end pt-3">
                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-secondary btn-lg">Regresar</button>
                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                      class="btn btn-success btn-lg ms-2">Agregar Libro</button>
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


</body>