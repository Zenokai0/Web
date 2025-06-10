document.addEventListener('DOMContentLoaded', async () => {
    const searchbar = document.querySelector('.search-bar');
    const searchResult = document.querySelector('.search-result');

    // Run search immediately if query param exists (on /search page)
    const urlParams = new URLSearchParams(window.location.search);
    const initialQuery = urlParams.get('query');

    if (window.location.pathname === '/search' && initialQuery) {
        searchbar.value = initialQuery; // fill the input
        const query = encodeURIComponent(initialQuery);

        fetch(`/search-api?query=${query}`)
            .then(res => res.json())
            .then(data => {
                if (data.length > 0) {
                    let html = '';
                    data.forEach(d =>
                        html += `
                            <a href="/product/${d.product_id}">
                                <div class="product-card">
                                    <img src="images/${d.product_image}.jpg" alt="${d.product_image}">
                                    <h3>${d.product_name}</h3>
                                    <p>${d.price}</p>
                                </div>
                            </a>`
                    );
                    searchResult.innerHTML = html;
                } else {
                    searchResult.innerHTML = '0 result';
                }
            });
    }

    // Handle user typing + Enter key
    searchbar.addEventListener('keydown', e => {
        if (searchbar.value.trim() !== '' && e.key === 'Enter') {
            const query = encodeURIComponent(searchbar.value.trim());

            if (window.location.pathname === '/search') {
                fetch(`/search-api?query=${query}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.length > 0) {
                            let html = '';
                            data.forEach(d =>
                                html += `
                                    <a href="/product/${d.product_id}">
                                        <div class="product-card">
                                            <img src="images/${d.product_image}.jpg" alt="${d.product_image}">
                                            <h3>${d.product_name}</h3>
                                            <p>${d.price}</p>
                                        </div>
                                    </a>`
                            );
                            searchResult.innerHTML = html;
                        } else {
                            searchResult.innerHTML = '0 result';
                        }
                    });
            } else {
                window.location.href = `/search?query=${query}`;
            }
        }
    });
});