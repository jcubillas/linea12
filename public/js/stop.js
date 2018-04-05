window.addEventListener("load",()=> {
    const data = {
        branch : {},
        stopCreate: {
            name : "",
            latitude: 0,
            longitude: 0
        }
    }

    const searchParams = new URLSearchParams(window.location.search.substring(1));
    const branch_id = searchParams.get("branch_id");
    function updatePage(){
        axios.get('/brach/' + branch_id)
        .then((resp=>data.branch = resp.data))
        .catch((err)=>console.log(err.response.data))
    }

    //method to save

    new Vue({
        el: "#stopApp",
        data: data,
        methods: {
        }
    })

    updatePage()

})