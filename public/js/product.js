
//product id and fetch from db
function getDetail() {

    document.querySelector('.colors :nth-child(2)').classList.add('active'); //add active class to the first div, which is 2nd child
    document.querySelector('.sizes :nth-child(2)').classList.add('active'); //add active class to the first button, which is 2nd child

    // Color Selection
    const colorSwatches = document.querySelectorAll('.colors .color');
    colorSwatches.forEach(swatch => {
        swatch.addEventListener('click', () => {
            colorSwatches.forEach(s => s.classList.remove('active'));
            swatch.classList.add('active');
        });
    });

    // Size Selection
    const sizeButtons = document.querySelectorAll('.sizes button');
    sizeButtons.forEach(button => {
        button.addEventListener('click', () => {
            sizeButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
        });
    });

    //add to cart button
    document.querySelector('.add-to-bag').addEventListener('click', () => {
        const productId = document.querySelector('.add-to-bag').getAttribute('data-product-id');
        fetch('/add-to-cart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            credentials: 'same-origin',
            body: JSON.stringify({ product_id: productId })
        }).then(res => res.json())
            .then(data => {
                if (data.success) {
                    const cartButton = document.querySelector('.cart');
                    let cartCount = Number(cartButton.getAttribute('data-count')) + 1;
                    cartButton.setAttribute('data-count', cartCount);
                } else if (data.error === 'Unauthorized') {
                    alert('Please log in first!');
                }
            });
    })
}

getDetail();

// Quantity Selector
const quantityMinus = document.querySelector('.quantity button:nth-child(2)');
const quantityPlus = document.querySelector('.quantity button:last-child');
const quantityDisplay = document.querySelector('.quantity span');
let quantity = 1;

quantityMinus.addEventListener('click', () => {
    if (quantity > 1) {
        quantity--;
        quantityDisplay.textContent = quantity;
    }
});

quantityPlus.addEventListener('click', () => {
    quantity++;
    quantityDisplay.textContent = quantity;
});