@extends('layouts.app')

@section('content_javascript')
<script src="{{ asset('js/stop.js') }}" defer></script>
@endsection

@section('content')
<div id="stopApp" class="container-fluid">   
    <h1 class="text text-center">Stops of the Branch: @{{ branch.name }}</h1>
    <button type='button' class="btn btn-primary" id="newStopButton" data-toggle="modal" data-target="#AddStop" v-on:click="refresh();">                        
        <i class="fas fa-plus"></i>
    </button>
    <a class="btn btn-primary" href="/branch">                       
        <i class="fas fa-arrow-left"></i>
    </a>
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
                <button type='button' title="Edit" class="btn btn-primary" style="margin:2px" data-toggle="modal" data-target="#EditStop" v-on:click="loadEditForm(stop.id);">
                    <i class="fas fa-pen-square"></i>                                               
                </button>
                <button type='button' title="Delete" class="btn btn-danger" data-toggle="modal" v-on:click="deleteStop(stop.id);">
                    <i class="fas fa-trash"></i>                
                </button>
            </td>
            </tr>
        </tbody>
    </table>

    <!-- Modal ADD -->

    <div id="AddStop" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create new stop</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="AddStop_Modal">
                    <label for="numer_stop">#:</label>
                    <input type="text" class="form-control" id="number_stop" v-model="newStop.number">
                    <label for="name_branch">Name:</label>
                    <input type="text" class="form-control" id="name_stop" v-model="newStop.name">
                    <label for="latitude_stop">Latitude:</label>
                    <input type="text" class="form-control" id="latitude_stop" v-model="newStop.latitude">    
                    <label for="longitude_stop">Longitude:</label>
                    <input type="text" class="form-control" id="longitude_stop" v-model="newStop.longitude">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"  v-on:click="createStop(newStop);">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="close_modal" v-on:click="refresh();">Close</button>
                </div>
            </div>
        </div>          
    </div>

    <!-- Modal EDIT -->

    <div id="EditStop" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit current stop</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="editStop_modalBody">
                    <label for="numer_editStop">#:</label>
                    <input type="text" class="form-control" id="numer_editStop" v-model="editStop.number">
                    <label for="name_editStop">Name:</label>
                    <input type="text" class="form-control" id="name_editStop" v-model="editStop.name">
                    <label for="latitude_editStop">Latitude:</label>
                    <input type="text" class="form-control" id="latitude_editStop" v-model="editStop.latitude">    
                    <label for="longitude_editStop">Longitude:</label>
                    <input type="text" class="form-control" id="longitude_editStop" v-model="editStop.longitude"> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="saveButton_editModal" v-on:click="updateStop(editStop.id, editStop);">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="close_modal" v-on:click="refresh();">Close</button>
                </div>
            </div>
        </div>          
    </div> 
    <!-- Google Maps -->
    <div id="map"></div>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwpxOB_1gTbUHGwkyQ6XdCRXZG6hX3t94&callback=stopApp"></script>
</div>
@endsection