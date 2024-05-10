

document.addEventListener("DOMContentLoaded", function () {



    var idCategoria = $('#categorias').val();



    $('#categorias').change(function() {
        // Obtener el valor seleccionado del ID de la categoría
        idCategoria = $(this).val();
        
        // Puedes hacer lo que necesites con el ID de la categoría aquí
        console.log("ID de la categoría seleccionada:", idCategoria);
    });


    $('#Btn_AltaLibro').click(function () {
        var titulo = $('#Titulo').val();
        var nombreAutor = $('#Nombre').val();
        var year = $('#Year').val();
        var categoria = idCategoria;
        var sinopsis = $('#Sinopsis').val();
        var editorial = $('#Editorial').val();

        if (titulo.trim() === "") {
            alert("El Título no debe estar vacío");
            return;
        }

        if (nombreAutor.trim() === "") {
            alert("El nombre del autor no debe estar vacío");
            return;
        }

        if (sinopsis.trim() === "") {
            alert("La sinopsis no debe estar vacía");
            return;
        }

        if (editorial.trim() === "") {
            alert("La editorial no debe estar vacía");
            return;
        }


        if ($('#Imagen')[0].files.length === 0) {
            alert('Debes llenar la portada con una imagen.');
            return;
        }


        var currentYear = new Date().getFullYear();
        var selectedYear = new Date(year).getFullYear();

        if (isNaN(selectedYear)) {
            alert("Por favor, seleccione un año válido.");
            return;
        }

        if (selectedYear > currentYear) {
            alert("El año seleccionado no puede ser mayor que el año actual.");
            return;
        }


        var formData = new FormData();
        formData.append('Titulo', titulo);
        formData.append('Nombre', nombreAutor);
        formData.append('Year', year);
        formData.append('Categoria', categoria);
        formData.append('Sinopsis', sinopsis);
        formData.append('Editorial', editorial);
        formData.append('Imagen', $('#Imagen')[0].files[0]);

        $.ajax({
            url: '../../Server/API/insertLibro.php',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                response = response.trim();
                if (response.includes("correctamente")) {
                    alert("El libro se ha creado correctamente.");
                    location.reload();
                } else {
                    alert("Hubo un error al intentar crear el libro. Por favor, inténtalo de nuevo.");
                }
            }
        });



    });

});