function filterEvents() {
    const filterValue = document.getElementById('eventFilter').value;
    const auctionItems = document.querySelectorAll('.auction-item');

    auctionItems.forEach(item => {
        if (filterValue === 'all') {
            item.style.display = '';
        } else if (filterValue === 'available') {
            if (item.classList.contains('available')) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        } else if (filterValue === 'upcoming') {
            if (item.classList.contains('upcoming')) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        }
    });
}

function clearFilters() {
    document.getElementById('eventFilter').value = 'all';
    filterEvents();
}


