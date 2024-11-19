async function drop(event) {
    event.preventDefault();

    // Obtiene los datos del producto
    const producto = JSON.parse(event.dataTransfer.getData("producto"));

    // Validar datos
    if (!producto.id || !producto.cantidad || producto.cantidad < 1) {
        alert('Cantidad no válida.');
        return;
    }

    // Enviar datos al servidor vía fetch
    const formData = new FormData();
    formData.append('id_producto', producto.id);
    formData.append('cantidad', producto.cantidad);

    try {
        const response = await fetch('agregar_al_carrito.php', {
            method: 'POST',
            body: formData,
        });

        // Verificar si la respuesta es exitosa
        if (!response.ok) {
            throw new Error('Error al agregar el producto al carrito');
        }

        const data = await response.text();
        alert('Producto añadido al carrito');
        location.reload(); // Refrescar el carrito
    } catch (error) {
        console.error('Error:', error);
        alert('Hubo un problema al añadir el producto al carrito.');
    }
}