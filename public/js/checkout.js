document.getElementById('checkout-form').addEventListener('submit', async function (e) {
    e.preventDefault();

    // Recoger datos del formulario con validación de existencia
    const departamentoElement = document.querySelector('[name="departamento"]');
    const distritoElement = document.querySelector('[name="distrito"]');
    const addressElement = document.querySelector('[name="direccion"]');
    const nAddressElement = document.querySelector('[name="n_direccion"]');
    const phoneElement = document.querySelector('[name="telefono"]');
    const notesElement = document.querySelector('[name="notes"]');
    const metodoPagoElement = document.querySelector('[name="listGroupRadios"]:checked');

    const formData = {
        departamento: departamentoElement ? departamentoElement.value : '',
        distrito: distritoElement ? distritoElement.value : '',
        direccion: addressElement ? addressElement.value : '',
        n_direccion: nAddressElement ? nAddressElement.value : '',
        telefono: phoneElement ? phoneElement.value : '',
        notas: notesElement ? notesElement.value : '',
        id_metodo_pago: metodoPagoElement ? metodoPagoElement.value : '',
        monto_total: localStorage.getItem('cartTotal') || '0.00'
    };

    if (!formData.departamento.trim() || !formData.distrito.trim() || 
        !formData.direccion.trim() || !formData.n_direccion.trim() || 
        !formData.telefono.trim() || !formData.id_metodo_pago.trim()) {
        Swal.fire('Error', 'Por favor complete todos los campos obligatorios.', 'error');
        return;
    }

    try {
        // Guardar la dirección
        const responseDireccion = await fetch('../controller/checkout/save_direction.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(formData)
        });
        const resultDireccion = await responseDireccion.json();
        if (!resultDireccion.success) throw new Error(resultDireccion.message);

        // Guardar la venta
        const ventaData = {
            id_metodo_pago: formData.id_metodo_pago,
            id_direccion: resultDireccion.id_direccion,
            monto_total: formData.monto_total
        };
        const responseVenta = await fetch('../controller/checkout/save_venta.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(ventaData)
        });
        const resultVenta = await responseVenta.json();
        if (!resultVenta.success) throw new Error(resultVenta.message);

        // Guardar detalles de venta
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const detalleVentaData = {
            id_venta: resultVenta.id_venta,
            productos: cart.map(product => ({
                id: product.id,
                cantidad: product.cantidad,
                precio: product.precio
            }))
        };
        const responseDetalleVenta = await fetch('../controller/checkout/save_detalle_venta.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(detalleVentaData)
        });
        const resultDetalleVenta = await responseDetalleVenta.json();
        if (!resultDetalleVenta.success) throw new Error(resultDetalleVenta.message);

        // Generar boleta en PDF
        fetch(`/controller/checkout/generate_invoice.php?id_venta=${resultVenta.id_venta}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.open(data.pdf_path, '_blank'); // Abrir el PDF en una nueva pestaña
                } else {
                    console.error('Error al generar el PDF:', data.message);
                }
            });

            Swal.fire({
                icon: 'success',
                title: 'Compra exitosa',
                text: 'Tu orden ha sido generada con éxito',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/pages/index.php'; // Redirigir al inicio
                }
            });
        } catch (error) {
            Swal.fire('Error', error.message, 'error');
        }
});
