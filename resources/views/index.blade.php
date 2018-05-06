@extends('layouts.app')

<script src="{{ asset('js/index.js') }}" defer></script>

@section('content')

<div id="indexApp" class="container">

    <div class="row justify-content-md-center" style="margin-top: 20px">            
        <div class="col-md-12">
            <h1 class="text text-center">Bienvenido a la Línea 12</h1>
            <h2 class="text text-center">Selecciona un ramal para conocer su recorrido</h2>
        </div>
    </div>

    <div class="row" style="margin-top: 30px">
        <div class="col-md-4">
            <div class="form-group">
                <label for="branchsList">
                    <h3 class="text text-center">Listado de Ramales</h3>
                </label>
                
                <div  v-for="branch of branches" class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input checkedBranches" v-bind:value="branch.id" v-on:change="updateMap();" checked>@{{ branch.name }}
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            Google Maps 
            <div id="map_inRoutes"></div>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwpxOB_1gTbUHGwkyQ6XdCRXZG6hX3t94&callback=indexApp"></script>
        </div>
    </div>  
</div>
@endsection

