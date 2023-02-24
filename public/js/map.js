var map = L.map("map").setView([-7.78637, 110.368741], 11);
L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoicmlkaG9naWxhbmciLCJhIjoiY2w5OWp2NndmM2hoZTNucGN4djZ4NnQwcCJ9.z7oCuzMyT0CJY70K1q6CIQ',
    attribution:
        '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);