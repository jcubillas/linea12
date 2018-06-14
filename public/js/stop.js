"use strict"

window.addEventListener("load",function(){
    const data = {
        branch : {},
        stops: {},
        newStop: {},
        editStop: {}
    }

    const searchParams = new URLSearchParams(window.location.search.substring(1));
    const branchId = searchParams.get("branch_id");
    console.log(branchId);

    updatePage();

    /*let map;
    let directionsDisplay;
    let directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer({ 
        polylineOptions: {strokeColor:"#4a4a4a",strokeWeight:5}, 
        suppressMarkers:true });

    setTimeout(()=>{

        let bsas = {lat: -34.6037, lng: -58.3816};
        mapOptions = {
            zoom: 12,
            center: bsas
        }

        map = new google.maps.Map(document.getElementById('map'), mapOptions);

        
        map.addListener("click", (e) => {
            placeMarker(event.latLng);
        });

        directionsDisplay.setMap(map);

    } , 100)

    function placeMarker(location) {
        var marker = new google.maps.Marker({
            position: location, 
            map: map,
            suppressMarkers: true
        });
    }

    function updateMarkers (stops){

        const points = stops.map( s => ({lat:s.latitude,lng:s.longitude, number: s.number, name: s.name, branch_id: s.branch_id, id : s.id}))

        points.forEach( p => {
            const marker = new google.maps.Marker({
                position: p,
                map: map,
                draggable: true,
                label: "" + p.number
            })
            marker.addListener("dragend",()=> {
                axios.put("api/stop/" + p.id, {latitude:marker.position.lat() , longitude: marker.position.lng(), number: p.number, name: p.name, branch_id: p.branch_id, })
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
    }*/

    function updateTable(){
        refresh();
        axios.get("api/stop")
        .then((resp=>data.stops = resp.data))
        .catch((err)=>console.log(err.response.data))
    }

    function refresh(){
        $("#name_stop").value = null;
        $("#schedule_stop").value = null;
        $("#name_editstop").value = null;
        $("#schedule_editstop").value = null;
        data.newBranch = {}; 
    }

    function updatePage(){
        axios.get("api/branch/" + branchId)
        .then(resp => { 
            data.branch = resp.data
            //updateMarkers(data.branch.stops.sort(function(a,b) {return (a.number > b.number) ? 1 : ((b.number > a.number) ? -1 : 0);}))
        })
        .catch(error => console.error(error.response.data))
    }

    function createStop(newStop){
        newStop.branch_id = branchId;
        axios.post("api/stop", newStop)
            .then((resp)=>{
                updatePage();
                $("#AddStop").click();
                data.newStop = {};
            })
            .catch((err)=>{
                console.error(err.response.data); 
            })
    }

    function loadEditForm(stop_id){
        axios.get("api/stop/" + stop_id)
            .then((resp)=>{
                data.editStop = resp.data;
            })                        
            .catch((err)=>
                console.error(err.response.data)
            )
    }

    function updateStop(id, editStop){       
        axios.put("api/stop/" + id, editStop)
            .then((resp)=>{
                updatePage();
                $("#EditStop").click();
                data.editStop = {}
            })                        
            .catch((err)=>{
                console.error(err.response.data); 
            })       
    }
    
    function deleteStop(id){       
        axios.delete("api/stop/" + id)
            .then((resp)=>{
                updatePage();
            })                        
            .catch((err)=>{
                console.error(err.response.data); 
            })       
    }

    function saveStop (stop){
        stop.branchId = branchId
        axios.post("api/stop",stop)
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
        el: "#stopApp",
        data : data,
        methods : {
            saveStop: saveStop,
            updatePage: updatePage,
            saveStop: saveStop,
            createStop: createStop,
            updateStop: updateStop,
            deleteStop: deleteStop,
            refresh: refresh,
            updateTable: updateTable,
            loadEditForm: loadEditForm/*,
            updateMarkers: updateMarkers*/
        }
    })

    
}) 