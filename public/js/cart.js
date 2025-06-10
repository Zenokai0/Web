var cart_array = [];
document.addEventListener('DOMContentLoaded', async () => {

    const response = await fetch(`/get-user-cart`);
    const data = await response.json();
    let html = '';

    if (data.success) {
        if (data.cart.length) {
            data.cart.forEach(d => {
                cart_array.push(d);
            })

            cart_array.forEach(c =>
                html += `
                    <div class="item">
                        <img src="./images/${c.product_image}.jpg" alt="">
                        <div class="detail">
                            <h1>${c.product_name}</h1>
                            <p>${c.price}</p>
                        </div>
                        <button class="delete" id="${c.user_cart_id} ${c.product_id}">delete</button>
                    </div>`
            )
            document.querySelector('.cart-body').innerHTML = html;
        } else {
            document.querySelector('.checkout').style.display = 'none';
        }
    } else if (data.error === 'Unauthorized') {
        document.querySelector('.checkout').style.display = 'none';
    }
})

document.querySelector('.cart-body').addEventListener('click', (e) => {
    const cart_id = e.target.id.slice(0, e.target.id.indexOf(' '));
    const product_id = e.target.id.slice(e.target.id.indexOf(' ') + 1)

    fetch(`/remove-from-cart`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        },
        body: JSON.stringify({ user_cart_id: cart_id, product_id: product_id })
    })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                let html = '';
                cart_array = cart_array.filter(c => !(c.user_cart_id == cart_id && c.product_id == product_id));

                cart_array.forEach(c =>
                    html += `
                <div class="item">
                    <img src="./images/${c.product_image}.jpg" alt="">
                    <div class="detail">
                        <h1>${c.product_name}</h1>
                        <p>${c.price}</p>
                    </div>
                    <button class="delete" id="${c.user_cart_id} ${c.product_id}">delete</button>
                </div>`
                )
                document.querySelector('.cart-body').innerHTML = html;
                //cart item count
                const cartButton = document.querySelector('.cart');
                let cartCount = cartButton.getAttribute('data-count') - 1;

                cartButton.setAttribute('data-count', cartCount);
            }
        });
})
//checkout function
document.querySelector('.checkout').addEventListener('click', () => {
    //a checkout would be posting it to the seller db, but we not gonna it so, just delete all from user_cart with user_id
    fetch(`/checkout`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        },
    }).then(res => res.json())
        .then(data => {
            if (data.success) {
                cart_array = [];

                document.querySelector('.cart-body').innerHTML = '';
                document.querySelector('.checkout').style.display = 'none';

                //cart item count
                const cartButton = document.querySelector('.cart');
                let cartCount = 0;

                cartButton.setAttribute('data-count', cartCount);
            }
        });
})

