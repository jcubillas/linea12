@extends('layouts.app')

@section('content_javascript')
<script src="{{ asset('js/branch.js') }}" defer></script>
@endsection

@section('content')
<div id="branchApp" class="container-fluid">               
        <h1 class="text text-center">Branches</h1>
        <button type='button' class="btn btn-primary" id="newBranchButton" data-toggle="modal" data-target="#AddBranch" v-on:click="refresh();">                        
            <i class="fas fa-plus"></i>
        </button>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                <th class="text text-center">Name</th>
                <th class="text text-center">Schedule</th>
                <th class="text text-center">Action</th>
                </tr>
            </thead>
            <tbody id="branchRows">
                <tr v-for="branch of branches">
                <td class="text text-center">@{{ branch.name }} </td>
                <td class="text text-center">@{{ branch.schedule }} </td>
                <td class="text text-center">
                    <button type='button' title="Edit" class="btn btn-primary" style="margin:2px" data-toggle="modal" data-target="#EditBranch" v-on:click="loadEditForm(branch.id);">
                        <i class="fas fa-pen-square"></i>                                               
                    </button>
                    <button type='button' title="Delete" class="btn btn-danger" data-toggle="modal" v-on:click="deleteBranch(branch);">
                        <i class="fas fa-trash"></i>                
                    </button>
                    <a class="btn btn-success"  title="Stops" style="margin:2px" v-bind:href="'/stop.html?branch_id=' + branch.id" >
                        <i class="fas fa-bus"></i>     
                    </a>
                </td>
                </tr>
            </tbody>
        </table>

        <!-- Modal ADD -->

        <div id="AddBranch" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create new branch</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="AddBranch_Modal">
                        <label for="name_branch">Name:</label>
                        <input type="text" class="form-control" id="name_branch" v-model="newBranch.name">
                        <label for="schedule_branch">Schedule:</label>
                        <input type="text" class="form-control" id="schedule_branch" v-model="newBranch.schedule">    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="AddBranch_Button" v-on:click="createBranch(newBranch);">Add</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="close_modal" v-on:click="refresh();">Close</button>
                    </div>
                </div>
            </div>          
        </div>

        <!-- Modal EDIT -->

        <div id="EditBranch" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit current branch</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="editBranch_modalBody">
                        <label for="name_editBranch">Name:</label>
                        <input type="text" class="form-control" id="name_editBranch" v-model="editBranch.name">
                        <label for="schedule_editBranch">Schedule:</label>
                        <input type="text" class="form-control" id="schedule_editBranch" v-model="editBranch.schedule">    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="saveButton_editModal" v-on:click="updateBranch(editBranch.id, editBranch);">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="close_modal" v-on:click="refresh();">Close</button>
                    </div>
                </div>
            </div>          
        </div> 
    </div>
@endsection