// Permite que el área del carrito acepte elementos soltados
function allowDrop(event) {
    event.preventDefault();
  }
  
  // Llama cuando un producto comienza a arrastrarse
  function drag(event) {
    event.dataTransfer.setData("text", event.target.id); // Almacena el ID del producto
  }
  
  // Llama cuando un producto se suelta en el carrito
  function drop(event) {
    event.preventDefault();
    const productId = event.dataTransfer.getData("text"); // Obtiene el ID del producto
    const productElement = document.getElementById(productId);
  
    // Copia el producto al carrito
    const carrito = document.getElementById("carrito");
    const productCopy = productElement.cloneNode(true);
    productCopy.removeAttribute("draggable"); // Deshabilita arrastrar en el carrito
    carrito.appendChild(productCopy);
  }
  