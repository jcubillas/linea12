function stopApp(){
    
    const searchParams = new URLSearchParams(window.location.search.substring(1));
    const branchId = searchParams.get("branch_id")

    const data = {
        branch : {},
        stopToCreate : {
            name :"",
            latitude : 0,
            longitude : 0
        }
    }

    var map;
    var bsas = {lat: -34.6037, lng: -58.3816};

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: bsas
    })

    var directionsDisplay = new google.maps.DirectionsRenderer;
    var directionsService = new google.maps.DirectionsService;

    directionsDisplay.setMap(map);

    map.addListener("click", (e) => {
        const latLng = e.latLng
        data.stopToCreate.latitude = latLng.lat()
        data.stopToCreate.longitude = latLng.lng()
    })

    function updateMarkers (stops){

        const points = stops.map( s => ({lat:s.latitude,lng:s.longitude, id : s.id}))

        points.forEach( p => {    
            const marker = new google.maps.Marker({
                position: p,
                map: map,
                draggable: true,
                label: "" + p.id
            })
            marker.addListener("dragend",()=> {
                axios.put(`/stop/${p.id}`,{latitude:marker.position.lat() , longitude: marker.position.lng()})
                    .then( r => updatePage() )
                    .catch(error => console.error(error.response ? error.response.data : error))
            })
        })

        const waypoints =  points.slice(1, -1).map( p => ({ location : p , stopover : false}))

        directionsService.route({
            origin: points[0],
            destination: points[points.length - 1],
            waypoints: waypoints,
            optimizeWaypoints: true,
            travelMode: 'DRIVING'
            },function(response, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
            } else {
                console.error(response);
            }
        })

        stopsPath.setMap(map);
    }

    function updatePage(){
        axios.get(`/branch/${branchId}`)
            .then(resp => { 
                data.branch = resp.data
                updateMar-kers(data.branch.stops)
            })
            .catch(error => console.error(error.response ? error.response.data : error))
    }

    function saveStop (stop){
        stop.branchId = branchId
        axios.post("/stop",stop)
            .then(resp => { 
                data.stopToCreate =  {
                    name :"",
                    latitude : 0,
                    longitude : 0
                }
                updatePage()
            })
            .catch(error => console.error(error.response.data))
    } 

    new Vue({
        el: "#appStops",
        data : data,
        methods : {
            saveStop: saveStop}
    })

    updatePage()
}  


window.addEventListener("load", function(){
    stopApp()
})