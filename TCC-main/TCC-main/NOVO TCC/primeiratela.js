// Inicialização do mapa
var map = L.map('map').setView([-23.550520, -46.633308], 12);

// Camadas de mapa
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
}).addTo(map);

// Criação do controle de roteamento
var control = L.Routing.control({
  waypoints: [
    L.latLng(-23.550520, -46.633308), // Ponto de partida
    L.latLng(-23.567858, -46.648633) // Ponto de destino
  ],
  routeWhileDragging: true
}).addTo(map);

// Atualizar tamanho do mapa ao redimensionar a janela
window.addEventListener('resize', function() {
    map.invalidateSize();
  });
  

// Evento de rota calculada
control.on('routesfound', function(e) {
  var routes = e.routes;
  var summary = routes[0].summary;
  console.log('Distância total: ' + summary.totalDistance + ' metros');
  console.log('Tempo total: ' + summary.totalTime + ' segundos');
});
