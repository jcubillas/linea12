@extends('layouts.app')

@section('content_javascript')
<script src="{{ asset('js/home.js') }}" defer></script>
@endsection

@section('content')
<div id="homeApp" class="container">

    <div class="row justify-content-md-center" style="margin-top: 20px">            
        <div class="col-md-12">
            <h1 class="text text-center">Bienvenido a la Línea 12</h1>
            <h2 class="text text-center">Seleccione a continuación los ramales de los que desea conocer el recorrido: </h2>
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
            <!--<Google Maps>--> 
            <div id="map"></div>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwpxOB_1gTbUHGwkyQ6XdCRXZG6hX3t94&callback=homeApp"></script>
        </div>
    </div>  
</div>
@endsection

