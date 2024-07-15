function handleSearch(event) {
    event.preventDefault();
    var query = document.getElementById('searchInput').value.toLowerCase();

    if (query.includes('home')) {
        window.location.href = 'assignmentP.php';
    } else if (query.includes('auction')) {
        window.location.href = 'Auction.html';
    } else if (query.includes('rolex')) {
        window.location.href = 'RolexAuction.html';
    } else if (query.includes('tag')) {
        window.location.href = 'TagHeuerAuction.html';
    } else if (query.includes('Tissot')) {
        window.location.href = 'TissotAuction.html';
    } else if (query.includes('women')) {
        window.location.href = 'WomensAuction.html';
    } else if (query.includes('services')) {
        window.location.href = 'Services.html';

    } else if (query.includes('prx powermatic') || query.includes('prx')) {
        window.location.href = 'Tissot1.html';
    } else if (query.includes('gentleman powermatic') || query.includes('gentleman')) {
        window.location.href = 'Tissot2.html';
    } else if (query.includes('tour de france') || query.includes('pr 100 tour de france')) {
        window.location.href = 'Tissot3.html';
    } else if (query.includes('seastar 1000') || query.includes('seastar')) {
        window.location.href = 'Tissot4.html';
    } else if (query.includes('supersport chrono') || query.includes('supersport')) {
        window.location.href = 'Tissot5.html';
    } else if (query.includes('classic dreams') || query.includes('classic')) {
        window.location.href = 'Tissot6.html';
    
    } else if (query.includes('Deepsea') || query.includes('deep')) {
        window.location.href = 'Rolex1.html';
    } else if (query.includes('Day-Date 36') || query.includes('day-date')) {
        window.location.href = 'Rolex2.html';
    } else if (query.includes('1908') || query.includes('19')) {
        window.location.href = 'Rolex3.html';
    } else if (query.includes('cosmograph daytona') || query.includes('cosmograph')) {
        window.location.href = 'Rolex4.html';
    } else if (query.includes('Lady-datejust') || query.includes('datejust')) {
        window.location.href = 'Rolex5.html';
    } else if (query.includes('Sea-dweller') || query.includes('dweller')) {
        window.location.href = 'Rolex6.html';

    } else if (query.includes('AQUARACER PROFESSIONAL 200') || query.includes('aquaracer 200')) {
        window.location.href = 'TagHeuer_Auction1.html';
    } else if (query.includes('AQUARACER PROFESSIONAL 300') || query.includes('aquaracer 300')) {
        window.location.href = 'TagHeuer_Auction2.html';
    } else if (query.includes('Link Date') || query.includes('Link')) {
        window.location.href = 'TagHeuer_Auction3.html';
    } else if (query.includes('monza flyblack chronometer') || query.includes('monza')) {
        window.location.href = 'TagHeuer_Auction4.html';
    } else if (query.includes('carrera chronograph') || query.includes('carrera')) {
        window.location.href = 'TagHeuer_Auction5.html';
    } else if (query.includes('monaco chronograph') || query.includes('monaco')) {
        window.location.href = 'TagHeuer_Auction6.html';
    
    } else if (query.includes('bonia cristallo women') || query.includes('cristallo')) {
        window.location.href = 'Women1.html';
    } else if (query.includes('versace medusa alchemy women') || query.includes('medusa alchemy')) {
        window.location.href = 'Women2.html';
    } else if (query.includes('Cerruti 1881 Norcia Women') || query.includes('norcia')) {
        window.location.href = 'Women3.html';
    } else if (query.includes('Versace Greca Goddess Women') || query.includes('greca goddess')) {
        window.location.href = 'Women4.html';
    } else if (query.includes('Bonia Women Elegance') || query.includes('elegance')) {
        window.location.href = 'Women5.html';
    } else if (query.includes('Cerruti 1881 Filiano Women Elegance') || query.includes('Filiano')) {
        window.location.href = 'Women6.html';
    } else {
        alert('Page not found');
    }
}
// Attach the event listener to the form
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('searchForm').addEventListener('submit', handleSearch);
});
