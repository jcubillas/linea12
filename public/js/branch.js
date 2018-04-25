"use strict"

window.addEventListener("load",function(){
    const data = {
        branches : [],
        newBranch : {},
        editBranch: {}
    }

    updateTable();

    function refresh(){
        $("#name_branch").value = null;
        $("#schedule_branch").value = null;
        data.newBranch = {}; 
    }

    function updateTable(){
        refresh();
        axios.get("/branch")
        .then((resp=>data.branches = resp.data))
        .catch((err)=>console.log(err.response.data))
    }

    function deleteBranch(branch){
        axios.delete("/branch/" + branch.id)
        .then((resp)=>updateTable()
        )
        .catch((err)=>console.log(err.response.data)    
        )
    }
    
    function createBranch(branch){
        axios.post("/branch", branch)
            .then((resp)=> {
                console.log(resp.data);
                updateTable();
                $("#close_modal").click();
                data.newBranch = {};
            })
            .catch((err)=>console.log(err.response.data))
    }

    function loadEditForm(branch_id){
        axios.get("/branch/" + branch_id)
            .then((resp)=>{
                data.editBranch = resp.data;
            })                        
            .catch((err)=>
                console.error(err.response.data)
            )
    }

    const app = new Vue({
        el: "#branchApp",
        data: data,
        methods: {
            deleteBranch: deleteBranch,
            createBranch: createBranch,
            refresh: refresh,
            loadEditForm: loadEditForm
        }
    })
})