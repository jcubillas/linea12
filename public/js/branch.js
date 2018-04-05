"use strict"

window.addEventListener("load",function(){
    const data = {
        branches : [],
        branchName : ""
    }

    function updateTable(){
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
    
    function createBranch(branchName){
        axios.post("branch/", {name:branchName})
        .then((resp)=>updateTable())
        .catch((err)=>console.log(err.response.data))
        console.log("branchname: " + data.branchName);
    }

    const app = new Vue({
        el: "#branchApp",
        data: data,
        methods: {
            deleteBranch: deleteBranch,
            createBranch: createBranch
        }
    })
})