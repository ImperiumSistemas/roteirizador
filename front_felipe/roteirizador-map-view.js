const RoteirizadorMapView = {
	type: '',
	
	routeTabsActive: () => {
        const tabs = document.getElementById('route-tabs');
        const liElements = [...tabs.children];

        liElements.forEach((li, liIndex) => {
            li.addEventListener('click', () => {
                liElements.forEach((elem) => {
                    elem.classList.remove('active');
                });                
                
                li.classList.add('active');
                
                const routeContentsInfo = [...document.querySelectorAll('.routes-content')];
                routeContentsInfo.forEach((content) => {
                    content.style.display = 'none';                    
                });
                routeContentsInfo[liIndex].style.display ='block';

                const routeContentDirections = [...document.getElementById('routes-content').children];
                routeContentDirections.forEach((content) => {
                    content.style.display = 'none';
                })
                routeContentDirections[liIndex].style.display ='block';
            });

            li.style.cssText += `border-bottom: 4px solid rgba(${li.getAttribute('data-color')}, 0.7)`
        });
        
        liElements[0].click();
    },
    
	setRoutes: (routeData, routeIndex) => {
		const charge = routeData.routes[routeIndex];

        const routeTab = document.createElement('li');
        routeTab.setAttribute('id', `route-${charge.id}`);

        const checkbox = document.createElement('input');
        checkbox.setAttribute('type', 'checkbox');
        checkbox.setAttribute('checked', 'checked');
        checkbox.setAttribute('title', `Show/hide the route ${charge.id}`);
        checkbox.setAttribute('onclick', `RoteirizadorMapView.toggleRouteShow(this, ${routeIndex})`);
        
        routeTab.appendChild(checkbox);
        
        const span = document.createElement('span');
        span.innerText = `Route ${charge.id}`;

        routeTab.appendChild(span);

		document.getElementById('route-tabs').appendChild(routeTab);

        const deliveryRoute = document.createElement('p')
        deliveryRoute.setAttribute('id', `delivery-charge-info-${routeIndex}`);
        
        const deliveryRouteValue = document.createElement('p');
        deliveryRouteValue.setAttribute('id', `delivery-charge-info-value-${routeIndex}`);

        const durationRoute = document.createElement('p');
        durationRoute.setAttribute('id', `charge-info-duration-${routeIndex}`);

        const distanceRoute = document.createElement('p');
        distanceRoute.setAttribute('id', `charge-info-distance-${routeIndex}`);

        const cargaRoute = document.createElement('div');
        cargaRoute.setAttribute('id', `charge-${routeIndex}`)
        cargaRoute.setAttribute('class', 'routes-content');

		cargaRoute.appendChild(deliveryRoute);
		cargaRoute.appendChild(deliveryRouteValue);
		cargaRoute.appendChild(distanceRoute);
		cargaRoute.appendChild(durationRoute);

		document.getElementById('routes-data').appendChild(cargaRoute);

        const routeDiv = document.createElement('div');
        routeDiv.setAttribute('id', `map-directions-${routeIndex}`);
        document.getElementById('routes-content').appendChild(routeDiv);

		const deliveries = [];
		let deliveriesValue = 0;
		const routeAux = [];
		charge.deliveries.forEach((delivery, deliveryIndex) => {
			if (delivery) {
				delivery.latlng = new google.maps.LatLng(delivery.lat, delivery.lng);
				delivery.infoWindowContent = '<b>CD</b>';
				if (delivery.id > 0) {
					const infoWindowContent = document.createElement('div');
					infoWindowContent.innerHTML = `<b>Delivery:</b> ${delivery.id} - <b>Route:</b> ${charge.id}`;

					delivery.infoWindowContent = infoWindowContent.innerHTML;
					deliveries.push(delivery);
					deliveriesValue += delivery.valorVenda || 0;
				}
				routeAux.push(delivery);
			}
        });
        
		const route = [];
		routeAux.forEach((item) => {
			const unique = true;
			route.forEach((elem) => {
				if (elem.latlng === item.latlng) {
					unique = false;
				}
			});
			if (unique) {
				route.push(item);
			}
		});
        const deliveryIds = deliveries.map((item) => item.id);
        
		const letters =["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","U","V","W","X","Y","Z"];
		deliveryIds.forEach((_deliveryId, deliveryIndex) => {
			if (deliveryIds.length < 24) {
			    deliveryIds[deliveryIndex] = `${deliveryIds[deliveryIndex]} (${letters[deliveryIndex + 1]})`;
			} else {
	 	 	    deliveryIds[deliveryIndex] = `${deliveryIds[deliveryIndex]} (A${letters[deliveryIndex]})`;
			}
        });
        
		if (deliveryIds.length) {
			deliveriesValue = deliveriesValue.toLocaleString(undefined, {
				minimumFractionDigits: 2,
				maximumFractionDigits: 2
			});
			deliveryRoute.innerHTML = `<strong>Deliveries (${deliveries.length}):</strong> ${deliveryIds.join(",")})`;
			deliveryRouteValue.innerHTML = `<strong>Value:</strong> R$ ${deliveriesValue}`;
		} else {
			deliveryRoute.innerText = 'Click in "Apply" to show route data!';
		}

		const routeObj = new Route(route);
		myMaps.routes[routeIndex] = {
			routeObj,
			routeDraw: routeObj.drawRoute(myMaps.maps.mapView, `#charge-info-duration-${routeIndex}`, `#charge-info-distance-${routeIndex}`, routeIndex)
		}
		routeIndex++;

		delayGetDirections += 500;

		if (routeData.routes[routeIndex]) {
			setTimeout(() => {
				RoteirizadorMapView.setRoutes(routeData, routeIndex);
			}, 1000);
		} else {
            RoteirizadorMapView.routeTabsActive();
			Utils.hideLoading();
		}
    },
    
	viewRoutes: () => {
		try {
			const routesSessionData = JSON.parse(sessionStorage.getItem('routesData'));
			if (!routesSessionData) {
				throw new Error("Empty routes data!");
            }
            
			google.maps.event.addDomListener(window, 'load', () => {
				RoteirizadorMapView.initRoutes(routesSessionData);
			});
		} catch (err) {
			alert(err.message);
		}
    },
    
	initRoutes: (routesData) => {
		Utils.showLoading();
		document.getElementById('routes-count').innerText = ` - ${routesData.routes.length} routes generated!`;
		document.getElementById('route-tabs').innerText = '';

		myMaps = {
			directionsSVC: new google.maps.DirectionsService(),
			maps: {},
			routes: [],
			deliveries: []
		};

		const routeIndex = 0;
		const centerLat = routesData.routes[0].deliveries[0].lat;
		const centerLng = routesData.routes[0].deliveries[0].lng;
		const myMapsOptions = {
			zoom: 12,
			center: new google.maps.LatLng(centerLat, centerLng),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			gestureHandling: 'greedy'
		};
		myMaps.maps.mapView = new google.maps.Map(document.getElementById('map-canvas'), myMapsOptions);

		RoteirizadorMapView.setRoutes(routesData, routeIndex);
    },
    
	toggleRouteShow: (element, index) => {
        if (index >= 0) {
			if (element.checked) {
				RoteirizadorMapView.showRoute(index);
			} else {
				RoteirizadorMapView.hideRoute(index);
			}
		} else {
            const tabs = document.getElementById('route-tabs');

			if (element.checked) {
                [...tabs.children].forEach((elem) => {
                    [...elem.children].forEach((check) => {
                        check.checked = true;
                    });
                });
                                
				myMaps.routes.forEach((_route, routeIndex) => {
					RoteirizadorMapView.showRoute(routeIndex);
				});
			} else {
                [...tabs.children].forEach((elem) => {
                    [...elem.children].forEach((check) => {
                        check.checked = false;
                    });
                });

				myMaps.routes.forEach((_route, routeIndex) => {
					RoteirizadorMapView.hideRoute(routeIndex);
				});
			}
        }
    },
    
	showRoute: (index) => {
		myMaps.routes[index].routeObj.showRoute(myMaps.maps.mapView);
    },
    
	hideRoute: (index) => {
		myMaps.routes[index].routeObj.hideRoute();
	},
};
