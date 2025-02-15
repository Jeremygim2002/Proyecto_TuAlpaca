// public/js/cart.js
document.addEventListener('DOMContentLoaded', function() {
    loadCartFromServer();
  
    // Cargar carrito desde la base de datos al iniciar sesión
    function loadCartFromServer() {
        fetch('../controller/comprar/fetch_cart.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    localStorage.setItem('cart', JSON.stringify(data.cart));
                    updateCartDisplay();
                } else {
                    console.error('Error al cargar el carrito:', data.error);
                }
            })
            .catch(error => console.error('Error de red:', error));
    }

    // Actualizar la visualización del carrito
    function updateCartDisplay() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartItemsList = document.getElementById('cart-items-list');
        const cartCount = document.querySelector('.cart-count');
        const cartTotalElement = document.getElementById('cart-total');
        const cartTotalHeader = document.getElementById('cart-total-header');

        cartItemsList.innerHTML = '';  // Limpiar la lista

        let cartTotal = 0;
        if (cart.length === 0) {
            cartItemsList.innerHTML = '<li class="list-group-item">El carrito está vacío.</li>';
        } else {
            cart.forEach(product => {
                const li = document.createElement('li');
                li.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'lh-sm');
                li.innerHTML = `
                    <div>
                        <h6 class="my-0">${product.marca}</h6>
                        <small class="text-body-secondary">${product.descripcion}</small>
                    </div>
                    <span class="text-body-secondary">S/. ${(product.precio * product.cantidad).toFixed(2)}</span>
                `;
                cartItemsList.appendChild(li);
                cartTotal += product.precio * product.cantidad;
            });
        }



        // Actualizar contadores y totales
        cartCount.textContent = cart.reduce((total, item) => total + item.cantidad, 0);
        cartTotalElement.textContent = `S/. ${cartTotal.toFixed(2)}`;
        cartTotalHeader.textContent = `S/. ${cartTotal.toFixed(2)}`;


    }
    window.updateCartDisplay = updateCartDisplay;
});
