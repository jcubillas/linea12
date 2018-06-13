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
        $("#name_editbranch").value = null;
        $("#schedule_editbranch").value = null;
        data.newBranch = {}; 
    }

    function updateTable(){
        refresh();
        axios.get("api/branch")
        .then((resp=>data.branches = resp.data))
        .catch((err)=>console.log(err.response.data))
    }

    function deleteBranch(branch){
        axios.delete("api/branch/" + branch.id)
        .then((resp)=>updateTable()
        )
        .catch((err)=>console.log(err.response.data)    
        )
    }
    
    function createBranch(branch){
        axios.post("api/branch", branch)
            .then((resp)=> {
                console.log(resp.data);
                updateTable();
                $("#AddBranch").click();
                data.newBranch = {};
            })
            .catch((err)=>console.log(err.response.data))
    }

    function loadEditForm(branch_id){
        axios.get("api/branch/" + branch_id)
            .then((resp)=>{
                data.editBranch = resp.data;
            })                        
            .catch((err)=>
                console.error(err.response.data)
            )
    }

    function updateBranch(id, editBranch){      
        axios.put("api/branch/" + id, editBranch)
            .then((resp)=>{
                updateTable();
                $("#EditBranch").click();
                data.editBranch = {}  
            })                        
            .catch((err)=>{
                console.error(err.response.data.message); 
            })   
    }

    const app = new Vue({
        el: "#branchApp",
        data: data,
        methods: {
            deleteBranch: deleteBranch,
            createBranch: createBranch,
            refresh: refresh,
            loadEditForm: loadEditForm,
            updateBranch: updateBranch
        }
    })
})