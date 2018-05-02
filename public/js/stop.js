function stopApp(){
    
    const searchParams = new URLSearchParams(window.location.search.substring(1));
    const branchId = searchParams.get("branch_id")

    const data = {
        branch : {},
        stops: {},
        newStop: {},
        editStop: {},
        stopToCreate : {
            name : "",
            latitude : 0,
            longitude : 0
        }
    }

    let map;
    let bsas = {lat: -34.6037, lng: -58.3816};

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: bsas
    })

    let directionsDisplay = new google.maps.DirectionsRenderer;
    let directionsService = new google.maps.DirectionsService;

    directionsDisplay.setMap(map);

    /*map.addListener("click", (e) => {
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
    }*/

    function updateTable(){
        refresh();
        axios.get("/stop")
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
        axios.get("/branch/" + branchId)
        .then(resp => { 
            console.log(resp.data)
            data.branch = resp.data
            //updateMarkers(data.branch.stops)
        })
        .catch(error => console.error(error.response.data))
    }

    function createStop(newStop){
        newStop.branch_id = branchId;
        axios.post("/stop", newStop)
            .then((resp)=>{
                console.log(resp.data);
                updateTable();
                $("#AddStop").click();
                data.newStop = {};
            })
            .catch((err)=>{
                console.error(err.response.data); 
            })
    }

    function updateStop(id, editStop){       
        axios.put("/stop/" + id, editStop)
            .then((resp)=>{
                console.log(resp.data);
                updatePage();
                $("#EditStop").click();
                data.editStop = {}
            })                        
            .catch((err)=>{
                console.error(err.response.data); 
            })       
    }
    
    function deleteStop(id){       
        axios.delete("/stop/" + id)
            .then((resp)=>{
                console.log(resp.data);
                updatePage();
            })                        
            .catch((err)=>{
                console.error(err.response.data); 
            })       
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
            updateTable: updateTable
            //updateMarkers: updateMarkers
        }
    })

    updatePage();
}  
