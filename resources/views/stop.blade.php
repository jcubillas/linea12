@extends('layouts.app')

@section('content_javascript')
<script src="{{ asset('js/stop.js') }}" defer></script>
@endsection

@section('content')

<div id="stopApp" class="container-fluid">   
    <a class="btn btn-primary" href="/branch" style="margin-left:10px;">                       
        <i class="fas fa-arrow-left"></i>
    </a>
    <button type='button' class="btn btn-primary" id="newStopButton" v-on:click="refresh();">                        
        <i class="fas fa-plus"></i>
    </button>
    <h1 class="text text-center">Stops of the Branch: @{{ branch.name }}</h1>
    <div style="float:left; width:33%">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                <th class="text text-center">Numbers</th>
                <th class="text text-center">Name</th>
                <th class="text text-center">Latitude</th>
                <th class="text text-center">Longitude</th>
                <th class="text text-center">Action</th>
                </tr>
            </thead>
            <tbody id="stopRows">
                <tr v-for="stop of branch.stops">
                <td class="text text-center">@{{ stop.number }}</td>
                <td class="text text-center">@{{ stop.name }}</td>
                <td class="text text-center">@{{ stop.latitude }}</td>
                <td class="text text-center">@{{ stop.longitude }}</td>
                <td class="text text-center">
                    <button type='button' title="Edit" class="btn btn-primary" style="margin:2px" data-toggle="modal" v-on:click="loadEditForm(stop.id);">
                        <i class="fas fa-pen-square"></i>                                               
                    </button>
                    <button type='button' title="Delete" class="btn btn-danger" data-toggle="modal" v-on:click="deleteStop(stop.id);">
                        <i class="fas fa-trash"></i>                
                    </button>
                </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div  id="newStop_form" style="float:left; width:33%;">
        <span style="padding-left:40%">Add a new stop</span>
        <div class="modal-body">
            <label for="number_stop" >#:</label>
            <input type="text" class="form-control" id="new_number_stop" v-model="newStop.number" >
            <label for="name_branch">Name:</label>
            <input type="text" class="form-control" id="new_name_stop" v-model="newStop.name" >
            <label for="address_stop">Address:</label>
            <input type="text" class="form-control" id="new_address_stop" v-model="newStop.address">    
        
            <div style="text-align:center; margin-top:10px;">        
                <button type='button' class="btn btn-primary" id="newStopButton" v-on:click="createStop(newStop);">                        
                    Save
                </button>
            </div>
        </div>
    </div>
    <div  id="editStop_form" style="float:left; width:33%;" >
        <span style="padding-left:40%">Modify the stop </span>
        <div class="modal-body">
            <label for="number_stop" >#:</label>
            <input type="text" class="form-control" id="edit_number_stop" v-model="editStop.number" >
            <label for="name_branch">Name:</label>
            <input type="text" class="form-control" id="edit_name_stop" v-model="editStop.name" >
            <label for="address_stop">Address:</label>
            <input type="text" class="form-control" id="edit_address_stop" v-model="editStop.address">    

            <div style="text-align:center; margin-top:10px;">        
                <button type='button' class="btn btn-primary" id="editStopButton" v-on:click="updateStop(editStop.id, editStop);">                        
                    Save
                </button>
            </div>
        </div>
    </div>
    <div style="float:left; width:33%">
        <!-- Google Maps -->
        <div id="map"></div>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwpxOB_1gTbUHGwkyQ6XdCRXZG6hX3t94&callback=stopApp"></script>
    </div>
</div>
@endsection