const colors = [
	'30,144,255',
	'255,0,0',
	'138,43,226',
	'0,180,0',
	'255,140,0',
	'199,21,133',
	'85,70,0',
	'0,74,145',
	'139,0,0',
	'255,0,255',
	'0,250,154',
	'0,255,255',
	'255,255,0',
	'222,184,135',
	'112,128,144',
	'173,255,47',
	'72,61,139'
];

let myMaps = {};

let delayGetDirections = 1000;

const MAX_WAYPOINTS = 20;

const infowindow = new google.maps.InfoWindow({
	size: new google.maps.Size(150, 50)
});

const icons = [];
icons["red"] = new google.maps.MarkerImage("mapIcons/marker_red.png",
	// This marker is 20 pixels wide by 34 pixels tall.
	new google.maps.Size(20, 34),
	// The origin for this image is 0,0.
	new google.maps.Point(0, 0),
	// The anchor for this image is at 9,34.
    new google.maps.Point(9, 34),
);

const iconImage = new google.maps.MarkerImage('mapIcons/marker_red.png',
	// This marker is 20 pixels wide by 34 pixels tall.
	new google.maps.Size(20, 34),
	// The origin for this image is 0,0.
	new google.maps.Point(0, 0),
	// The anchor for this image is at 9,34.
    new google.maps.Point(9, 34),
);
    
const iconShadow = new google.maps.MarkerImage('http://www.google.com/mapfiles/shadow50.png',
	// The shadow image is larger in the horizontal dimension
	// while the position and offset are the same as for the main image.
	new google.maps.Size(37, 34),
	new google.maps.Point(0, 0),
    new google.maps.Point(9, 34),
);

// Shapes define the clickable region of the icon.
// The type defines an HTML &lt;area&gt; element 'poly' which
// traces out a polygon as a series of X,Y points. The final
// coordinate closes the poly by connecting to the first
// coordinate.
const iconShape = {
	coord: [9, 0, 6, 1, 4, 2, 2, 4, 0, 8, 0, 12, 1, 14, 2, 16, 5, 19, 7, 23, 8, 26, 9, 30, 9, 34, 11, 34, 11, 30, 12, 26, 13, 24, 14, 21, 16, 18, 18, 16, 20, 12, 20, 8, 18, 4, 16, 2, 15, 1, 13, 0],
	type: 'poly'
};

const createMarker = function(route, latlng, label, address, markerletter, color) {
	const map = route.directionsRenderer.getMap();
	const iconUrl = encodeURI(`http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=${markerletter}|${color}|000000`).replace('%00', '');
	const contentString = `${label} <br> ${address}`;
	const marker = new google.maps.Marker({
		position: latlng,
		map: map,
		icon: iconUrl,
		title: label,
		zIndex: Math.round(latlng.lat() * -100000) << 5
	});
	marker.myname = label;

	google.maps.event.addListener(marker, 'click', () => {
		infowindow.setContent(contentString);
		infowindow.open(map, marker);
	});

	route.markers.push(marker);

	return marker;
}

const getMarkerImage = function(iconStr) {
	if ((typeof (iconStr) == "undefined") || (iconStr == null)) {
		iconStr = "red";
	}
	if (!icons[iconStr]) {
		icons[iconStr] = new google.maps.MarkerImage(`http://www.google.com/mapfiles/marker${iconStr}.png`,
			// This marker is 20 pixels wide by 34 pixels tall.
			new google.maps.Size(20, 34),
			// The origin for this image is 0,0.
			new google.maps.Point(0, 0),
			// The anchor for this image is at 6,20.
            new google.maps.Point(9, 34),
        );
	}
	return icons[iconStr];
}

const showLastMarker = function(route) {
	const legs = route.result.routes[0].legs;
	let delivery = {};
	let color = colors[route.routeIndex].split(',');
	color[0] = parseInt(color[0]);
	color[1] = parseInt(color[1]);
	color[2] = parseInt(color[2]);
	color = Utils.rgbToHex(color[0], color[1], color[2]).split('#')[1];

    let i, j;
	for (i = 0, j = 0, letter = '', letterIndex = 0; i < legs.length; i++, j++) {
		let markerletter = 'A'.charCodeAt(0);
		if (j > 0 && j % 26 == 0) {
			letter = 'A'.charCodeAt(0);
			letter += letterIndex;
			letterIndex++;
			j = 0;
		}
		markerletter += j;
		markerletter = String.fromCharCode(markerletter);
		markerletter = String.fromCharCode(letter) + markerletter;
		delivery = myMaps.deliveries.shift();
		createMarker(route, legs[i].start_location, delivery.infoWindowContent, legs[i].start_address, markerletter, color);
		route.distanceTot += legs[i].distance.value;
		route.durationTot += legs[i].duration.value;
	}
	const iAux = legs.length - 1;
	let markerletter = 'A'.charCodeAt(0);
	markerletter += j;
	markerletter = String.fromCharCode(markerletter);
	markerletter = String.fromCharCode(letter) + markerletter;
	delivery = myMaps.deliveries.shift();
	createMarker(route, legs[iAux].end_location, delivery.infoWindowContent, legs[iAux].end_address, markerletter, color);

	const date = new Date(null);
	date.setSeconds(route.durationTot);
	route.durationTot = date.toISOString().substr(11, 8);
    route.distanceTot = `${Math.round(route.distanceTot / 1000)} km`;
    document.querySelector(route.elementDuration).innerHTML = `<strong>Duration:</strong> ${route.durationTot} hs`;
	document.querySelector(route.elementDistance).innerHTML = `<strong>Distance:</strong> ${route.distanceTot}`;
}

const connectMarkersRoute = function(route, marks, indice, maxParts, routeIndex) {
	const waypoints = [];
	const len = marks.length;
    
    for (let j = 1; j < len - 1; j++) {
		waypoints.push(marks[j]);
	}
    
    const optionsRoute = {
        waypoints,
        origin: marks[0].location,
		destination: marks[len - 1].location,
		travelMode: google.maps.DirectionsTravelMode.DRIVING
    };
    
	myMaps.directionsSVC.route(optionsRoute, (res, sts) => {
		if (sts == google.maps.DirectionsStatus.OK) {
			if (!route.result) {
				route.result = res;
			} else {
				route.result.routes[0].legs = route.result.routes[0].legs.concat(res.routes[0].legs);
				route.result.routes[0].overview_path = route.result.routes[0].overview_path.concat(res.routes[0].overview_path);
				route.result.routes[0].bounds = route.result.routes[0].bounds.extend(res.routes[0].bounds.getNorthEast());
				route.result.routes[0].bounds = route.result.routes[0].bounds.extend(res.routes[0].bounds.getSouthWest());
			}
			if (indice + 1 < maxParts) {
				setTimeout(connectMarkersRoute(route, route.parts[indice + 1], indice + 1, maxParts, routeIndex), delayGetDirections);
			} else {
				route.directionsRenderer.setDirections(route.result);
				showLastMarker(route);
			}
		} else if (sts == google.maps.DirectionsStatus.OVER_QUERY_LIMIT) {
			setTimeout(connectMarkersRoute(route, route.parts[indice], indice, maxParts, routeIndex), delayGetDirections);
		}
	});
}

/**
 * @param points optional array array of lat+lng-values defining a route
 * @return object Route
 **/
function Route(points) {
	this.origin = null;
	this.destination = null;
	this.waypoints = [];
	this.parts = [];
	this.result = null;
	this.routeIndex = null;
	this.elementDuration = null;
	this.elementDistance = null;
	if (points && points.length > 1) {
		this.setPoints(points);
	}
	return this;
}

/**
 *  draws route on a map
 *
 * @param map object google.maps.Map
 * @return object Route
 **/
Route.prototype.drawRoute = function(map, elementDuration, elementDistance, routeIndex) {
	const _this = this;

	_this.show = true;
	_this.result = false;
	_this.markers = [];
	_this.parts = [];
	_this.distanceTot = 0;
	_this.durationTot = 0;
	_this.elementDuration = elementDuration;
	_this.elementDistance = elementDistance;
	_this.routeIndex = routeIndex;
    
    if (!_this.directionsRenderer) {
        const tabs = document.getElementById('route-tabs');
        const liElements = [...tabs.children];
        const routeLi = [...liElements][routeIndex];
        
        routeLi.setAttribute('data-color', colors[routeIndex]);
        
        const polylineOptions = {
            strokeColor: `rgb(${colors[routeIndex]})`,
            strokeWeight: 4,
            strokeOpacity: 0.7,
            geodesic: true
        };
        
        const rendererOptions = {
            panel: document.getElementById(`map-directions-${routeIndex}`),
            draggable: false,
            polylineOptions: polylineOptions,
            suppressMarkers: true,
            preserveViewport: true
        };
        
        _this.directionsRenderer = new google.maps.DirectionsRenderer(rendererOptions);
        _this.directionsRenderer.setMap(map);
    }

	for (let z = 0, max = MAX_WAYPOINTS; z < _this.waypoints.length; z = z + max) {
		_this.parts.push(_this.waypoints.slice(z, z + max + 1));
	}

	if (!_this.parts.length) {
		return;
    }
    
	return connectMarkersRoute(_this, _this.parts[0], 0, _this.parts.length, _this.routeIndex);
}

Route.prototype.showRoute = function(map) {
	this.directionsRenderer.setMap(map);
	this.markers.forEach((marker) => {
		marker.setMap(map);
	});
	this.show = true;
}

Route.prototype.hideRoute = function() {
	this.directionsRenderer.setMap(null);
	this.markers.forEach((marker) => {
		marker.setMap(null);
	});
	this.show = false;
}

Route.prototype.toggleRoute = function(map) {
	if (this.show) {
		this.hideRoute();
	} else {
		this.showRoute(map);
	}
}

/**
 * sets origin, destination and waypoints for a route
 * from a directionsResult or the points-param when passed
 *
 * @param points optional array array of address-values defining a route
 * @return object Route
 **/
Route.prototype.setPoints = function(points) {
	this.waypoints = [];
	if (points) {
		points.forEach((point) => {
			myMaps.deliveries.push(point);
			this.waypoints.push({
				location: point.latlng,
				stopover: true
			});
		});
	}
	return this;
};