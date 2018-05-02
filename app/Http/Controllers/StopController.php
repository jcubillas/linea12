<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StopController extends Controller
{
    function getAll(){
        return Stop::all();
    }

    function byId($id){
        $stop = Stop::findOrFail($id);
        return $stop;
    }

    function save(Request $req){
        /*
        Validacion desde el controller
        $req->validate([
            'name' -> 'required|unique:branches|max:191'
        ])*/
        $stop = new Stop();
        $stop->number = $req->number;
        $stop->name = $req->name;
        $stop->latitude = $req->latitude;
        $stop->longitude = $req->longitude;
        $stop->save();
        return "Success (Save)";
    }

    function update($id, Request $req){
        /*
        Validacion desde el controller
        $req->validate([
            'name' -> 'required|unique:branches|max:191'
        ])*/
        $stop = Stop::findOrFail($id);
        $stop->number = $req->number;
        $stop->name = $req->name;
        $stop->latitude = $req->latitude;
        $stop->longitude = $req->longitude;
        $stop->save();
        return "Success (Update)";
    }

    function delete($id){
        Stop::findOrFail($id)->delete();
        return "Success (Delete)";
    }
}
