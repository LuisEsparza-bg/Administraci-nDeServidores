const miBusqueda = document.getElementById("busqLibro");

function setProductos() {
    miBusqueda.innerHTML = "";
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../Server/API/busquedaLibro.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200){
            try {
                const response = JSON.parse(xhr.responseText);
                
                if (response && response.length > 0) {


                    response.forEach((producto) => {

                        const subBox = document.createElement("div");
                        subBox.className = "sub-box";

                        const img = document.createElement("img");
                        img.src = "data:image/png;base64," + producto.files;
                        img.alt = "Imagen del producto";

                        const divInfo = document.createElement("div");
                        divInfo.className = "info";

                        const prodTitle = document.createElement("h3");
                        prodTitle.textContent = producto.prodName;

                        const descrip = document.createElement("p");
                        descrip.textContent = producto.descrip;

                        const divPQ = document.createElement("div");
                        divPQ.className = "price-and-quantity";

                        const precioInfo = document.createElement("span");
                        precioInfo.textContent = "Precio $" + producto.price;

                        const bttnVerProd = document.createElement("button");
                        bttnVerProd.textContent = "Ver Producto";
                        bttnVerProd.className = "add-button";
                        bttnVerProd.setAttribute("see-product-id", producto.id_Prod);
                        
                        bttnVerProd.addEventListener("click",function(){

                        const productId = this.getAttribute("see-product-id");
  
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "../Back/getDataProduct.php", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === 4 && xhr.status === 200){
                                try {
                                   const response = JSON.parse(xhr.responseText);
                                   if(response.resultado){
                                    window.location.href = "Publicacion.php"
                                   }else{
                                    window.location.href = "Busqueda_Avanzada.php"
                                   }
                                }catch(error){
                                    console.log(error);
                                }
                            }
                        }
                        xhr.send("idFullProd=" + encodeURIComponent(productId));
                      });


                        divInfo.appendChild(prodTitle);
                        divInfo.appendChild(descrip);
                        divPQ.appendChild(precioInfo);
                        divInfo.appendChild(divPQ);
                        subBox.appendChild(img);
                        subBox.appendChild(divInfo);
                        subBox.appendChild(bttnVerProd);

                        misProductos.appendChild(subBox);
   
                    });
                }
            } catch (error) {
                console.error("Error al procesar la respuesta:", error);
            }
        }
    };

    xhr.send();
}