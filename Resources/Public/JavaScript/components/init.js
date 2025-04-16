function initGmapSimplest() {
    const mapConfigJson = document.querySelectorAll(".hh-gmaps-simplest-config");
    let map, geocoder, directionsService, directionsRenderer, markers = [];

    if (mapConfigJson) {
        mapConfigJson.forEach(function(cnf) {
            const mapConfig = JSON.parse(cnf.innerHTML);

            // Geocoder und andere Dienste initialisieren
            geocoder = new google.maps.Geocoder();
            directionsService = new google.maps.DirectionsService();
            directionsRenderer = new google.maps.DirectionsRenderer();

            // Karte initialisieren
            const mapOptions = {
                zoom: mapConfig.zoom,
                scrollwheel: mapConfig.scrollwheel,
                mapId: mapConfig.mapId
            };

            geocoder.geocode({ address: mapConfig.mapCenterAddress }, (results, status) => {
                if (status === 'OK') {
                    mapOptions.center = results[0].geometry.location;
                    console.log(mapOptions);
                    map = new google.maps.Map(document.getElementById(mapConfig.elementMapId), mapOptions);
                    directionsRenderer.setMap(map);

                    addMarkers(geocoder, map, mapConfig, markers);
                } else {
                    alert("Geocoding failed: " + status);
                }
            });
        });
    }

    function addMarkers(geocoder, map, mapConfig, markers) {
        let completed = 0;
        const total = mapConfig.markers.length;

        mapConfig.markers.forEach((markerData, index) => {
            geocoder.geocode({ address: markerData.address }, (results, status) => {
                if (status === 'OK') {
                    const position = results[0].geometry.location;

                    const advancedMarker = new google.maps.marker.AdvancedMarkerElement({
                        position: position,
                        map: map,
                        title: `Marker ${index + 1}`
                    });

                    advancedMarker.addListener('click', () => {
                        const infoWindow = new google.maps.InfoWindow({
                            content: `
                                ${markerData.markerText || ''}
                                <input type="text" class="marker-input" id="address-input-${index}" placeholder="Gib eine Adresse ein">
                                <button onclick="submitAddress(${index})">Routenplaner</button>
                            `
                        });
                        infoWindow.open(map, advancedMarker);
                    });

                    markers[index] = advancedMarker;
                } else {
                    console.warn("Marker failed: " + status);
                }

                // Marker fertig (auch wenn fehlgeschlagen), zähle mit
                completed++;

                // Wenn alle Marker "durch" sind
                if (total > 1 && completed === total && mapConfig.centerOverAllMarkers) {
                    centerMapOnMarkers(map, markers);
                }
            });
        });
    }

    function submitAddress(markerIndex) {
        const address = document.getElementById(`address-input-${markerIndex}`).value;

        if (address) {
            geocoder.geocode({ address: address }, (results, status) => {
                if (status === 'OK') {
                    const destination = results[0].geometry.location;

                    const request = {
                        origin: markers[markerIndex].position,
                        destination: destination,
                        travelMode: google.maps.TravelMode.DRIVING,
                    };
                    console.log(request);
                    console.log(markerIndex);
                    console.log(markers);
                    console.log(address);
                    directionsService.route(request, (result, status) => {
                        if (status === 'OK') {
                            directionsRenderer.setDirections(result);
                            displayRoute(result);
                        } else {
                            alert("Route konnte nicht berechnet werden: " + status);
                        }
                    });
                } else {
                    alert("Adresse konnte nicht gefunden werden: " + status);
                }
            });
        } else {
            alert("Bitte eine Adresse eingeben.");
        }
    }

    function displayRoute(result) {
        const routeDiv = document.getElementById('route');
        const routeDetails = result.routes[0].legs[0];
        routeDiv.innerHTML = `
            <h3>Routenbeschreibung:</h3>
            <p>Start: ${routeDetails.start_address}</p>
            <p>Ziel: ${routeDetails.end_address}</p>
            <p>Entfernung: ${routeDetails.distance.text}</p>
            <p>Geschätzte Zeit: ${routeDetails.duration.text}</p>
        `;
    }

    // Funktion zum Zentrieren der Karte auf die Marker
    function centerMapOnMarkers(map, markers) {
        let bounds = new google.maps.LatLngBounds();

        markers.forEach(marker => {
            bounds.extend(marker.position);
        });

        map.fitBounds(bounds);
    }
}

window.initGmapSimplest = initGmapSimplest;
