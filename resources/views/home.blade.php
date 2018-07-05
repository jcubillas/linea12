@extends('layouts.app')

@section('content_javascript')
<script src="{{ asset('js/home.js') }}" defer></script>
@endsection

@section('content')
<div id="homeApp" class="container">
    <div style="margin-top: 30px">
        <div class="form-group">
            <label for="branchsList">
                <h3 class="text text-center">Listado de Ramales</h3>
            </label>
            <div>
                <span v-for="branch of branches">
                    <label>
                        @{{ branch.name }}
                        <div v-bind:id="branch.id" class="color-box"></div>
                    </label>
                </span>
            </div>
        </div>

        <div>
            <!--<Google Maps>--> 
            <div id="map"></div>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwpxOB_1gTbUHGwkyQ6XdCRXZG6hX3t94&callback=homeApp"></script>
        </div>
    </div>  
</div>
@endsection

