document.addEventListener('DOMContentLoaded', async () => {
    const item_count_res = await fetch('/item-count', {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        }
    })
    const data = await item_count_res.json();
    if (data.count) {
        const cartButton = document.querySelector('.cart');
        let cartCount = data.count;

        cartButton.setAttribute('data-count', cartCount);
    }
})