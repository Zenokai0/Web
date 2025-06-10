document.addEventListener('DOMContentLoaded', async () => {

    //check if its redirect from products page which will have a hash of #category-subcategory
    if (window.location.hash.includes('-')) {
        const hash = window.location.hash.slice(1).split('-');
        const category = hash[0]
        const subcategory = hash[1];

        let html = '';

        const response = await fetch(`/${category}/${subcategory}`)
        const data = await response.json();
        data.forEach((d, i) =>
            html += `
                <a href="/product/${d.product_id}">
                    <div class="product-card">
                        <img src="images/${d.product_image}.jpg" alt="${d.product_image}">
                        <h3>${d.product_name}</h3>
                        <p>${d.price}</p>
                    </div>
                </a>`);

        document.querySelector('.req-product').innerHTML = html;
    }
});

document.querySelector('.men').addEventListener('click', async (e) => {
    let html = '';

    const response = await fetch(`/men/${e.target.innerHTML}`)
    const data = await response.json();
    data.forEach(d =>
        html += `
                <a href="/product/${d.product_id}">
                    <div class="product-card">
                        <img src="images/${d.product_image}.jpg" alt="${d.product_image}">
                        <h3>${d.product_name}</h3>
                        <p>${d.price}</p>
                    </div>
                </a>`);

    document.querySelector('.req-product').innerHTML = html;
})
document.querySelector('.women').addEventListener('click', async (e) => {
    let html = '';

    const response = await fetch(`/women/${e.target.innerHTML}`)
    const data = await response.json();
    console.log(data);
    data.forEach(d =>
        html += `
                <a href="/product/${d.product_id}">
                    <div class="product-card">
                        <img src="images/${d.product_image}.jpg" alt="${d.product_image}">
                        <h3>${d.product_name}</h3>
                        <p>${d.price}</p>
                    </div>
                </a>`);

    document.querySelector('.req-product').innerHTML = html;
})
document.querySelector('.accessories').addEventListener('click', async (e) => {
    let html = '';

    const response = await fetch(`/accessories/${e.target.innerHTML}`)
    const data = await response.json();
    data.forEach(d =>
        html += `
                <a href="/product/${d.product_id}">
                    <div class="product-card">
                        <img src="images/${d.product_image}.jpg" alt="${d.product_image}">
                        <h3>${d.product_name}</h3>
                        <p>${d.price}</p>
                    </div>
                </a>`);
    document.querySelector('.req-product').innerHTML = html;
})