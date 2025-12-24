
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('articles-container');
    const searchForm = document.getElementById('search-form');
    const searchInput = document.getElementById('search-input');

    // Dropdown Elements
    const filterDropdownBtn = document.getElementById('filterDropdownBtn');
    const filterDropdownMenu = document.getElementById('filterDropdownMenu');
    const filterChevron = document.getElementById('filterChevron');
    const currentFilterText = document.getElementById('currentFilterText');
    const filterItems = document.querySelectorAll('.filter-item');

    function debounce(func, wait) {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    }

    function fetchArticles(url) {
        container.style.opacity = '0.5';

        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.text();
            })
            .then(html => {
                container.innerHTML = html;
                container.style.opacity = '1';
                history.pushState(null, '', url);
                attachPaginationListeners();

                const currentUrl = new URL(url);
                const category = currentUrl.searchParams.get('category');

                // SYNC DROPDOWN UI
                if (currentFilterText && filterItems) {
                    let found = false;
                    filterItems.forEach(item => {
                        const dot = item.querySelector('span');
                        const colorClass = item.dataset.categoryColor;

                        if (item.dataset.categorySlug === (category || "")) {
                            item.classList.add('bg-blue-600', 'text-white');
                            item.classList.remove('text-gray-800', 'hover:bg-gray-100', 'dark:text-gray-400', 'dark:hover:bg-gray-700', 'dark:hover:text-white');
                            currentFilterText.textContent = item.dataset.categoryName;
                            if (dot) {
                                dot.classList.add('bg-white');
                                if (colorClass) dot.classList.remove(colorClass);
                            }
                            found = true;
                        } else {
                            item.classList.remove('bg-blue-600', 'text-white');
                            item.classList.add('text-gray-800', 'hover:bg-gray-100', 'dark:text-gray-400', 'dark:hover:bg-gray-700', 'dark:hover:text-white');
                            if (dot) {
                                dot.classList.remove('bg-white');
                                if (colorClass) dot.classList.add(colorClass);
                            }
                        }
                    });
                    if (!found) currentFilterText.textContent = "Toutes les catégories";
                }

                // Update hidden input in search form
                let hiddenInput = searchForm.querySelector('input[name="category"]');
                if (category) {
                    if (!hiddenInput) {
                        hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = 'category';
                        searchForm.appendChild(hiddenInput);
                    }
                    hiddenInput.value = category;
                } else if (hiddenInput) {
                    hiddenInput.remove();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                container.style.opacity = '1';
            });
    }

    function attachPaginationListeners() {
        const links = container.querySelectorAll('nav[role="navigation"] a');
        links.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                fetchArticles(this.href);
            });
        });
    }

    const performSearch = () => {
        if (!searchForm) return;
        const url = new URL(searchForm.action);
        const params = new URLSearchParams(new FormData(searchForm));
        url.search = params.toString();
        fetchArticles(url.toString());
    };

    if (searchInput) {
        searchInput.addEventListener('input', debounce(performSearch, 300));
    }

    if (searchForm) {
        searchForm.addEventListener('submit', function (e) {
            e.preventDefault();
            performSearch();
        });
    }

    // Dropdown Toggle
    if (filterDropdownBtn) {
        filterDropdownBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            filterDropdownMenu.classList.toggle('hidden');
            filterChevron.classList.toggle('rotate-180');
        });
    }

    // Close Dropdown on outside click
    document.addEventListener('click', function (e) {
        if (filterDropdownMenu && !filterDropdownMenu.contains(e.target) && !filterDropdownBtn.contains(e.target)) {
            if (!filterDropdownMenu.classList.contains('hidden')) {
                filterDropdownMenu.classList.add('hidden');
                filterChevron.classList.remove('rotate-180');
            }
        }
    });

    // Filter Item Clicks
    filterItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();

            // Close menu
            filterDropdownMenu.classList.add('hidden');
            filterChevron.classList.remove('rotate-180');

            // Update Button Text
            currentFilterText.textContent = this.dataset.categoryName;

            // Update Active Classes
            filterItems.forEach(i => {
                i.classList.remove('bg-blue-600', 'text-white');
                i.classList.add('text-gray-800', 'hover:bg-gray-100', 'dark:text-gray-400', 'dark:hover:bg-gray-700', 'dark:hover:text-white');

                const dot = i.querySelector('span');
                const colorClass = i.dataset.categoryColor;
                if (dot) {
                    dot.classList.remove('bg-white');
                    if (colorClass) dot.classList.add(colorClass);
                }
            });

            this.classList.add('bg-blue-600', 'text-white');
            this.classList.remove('text-gray-800', 'hover:bg-gray-100', 'dark:text-gray-400', 'dark:hover:bg-gray-700', 'dark:hover:text-white');

            const activeDot = this.querySelector('span');
            const activeColorClass = this.dataset.categoryColor;
            if (activeDot) {
                activeDot.classList.add('bg-white');
                if (activeColorClass) activeDot.classList.remove(activeColorClass);
            }

            fetchArticles(this.href);
        });
    });

    attachPaginationListeners();

    window.addEventListener('popstate', function () {
        fetchArticles(window.location.href);
    });
});
