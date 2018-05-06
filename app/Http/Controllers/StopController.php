<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stop;
use App\Branch;

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
        /*Validacion desde el controller*/
        $req->validate([
            'name' => 'required|max:191',
            'number' => 'required|max:191',
            'latitude' => 'required|max:191',
            'longitude' => 'required|max:191',
            'branch_id' => 'required|max:191'
        ]);

        $branch = Branch::findOrFail($req->branch_id);
        $branch->stops;
        foreach ($branch["stops"] as $stop){
            if ($stop["number"] == $req->number){
                return "Already exist.";
            } 
        }

        $stop = new Stop();
        $stop->number = $req->number;
        $stop->name = $req->name;
        $stop->latitude = $req->latitude;
        $stop->longitude = $req->longitude;
        $stop->branch_id = $req->branch_id;
        $stop->save();
        return "Success (Save)";
    }

    function update($id, Request $req){ 
        /*Validacion desde el controller*/
        $req->validate([
            'name' => 'required|max:191',
            'number' => 'required|max:191',
            'latitude' => 'required|max:191',
            'longitude' => 'required|max:191',
            'branch_id' => 'required|max:191'
        ]);

        $branch = Branch::findOrFail($req->branch_id);
        $branch->stops;
        foreach ($branch["stops"] as $stop){
            if ($stop["number"] == $req->number){
                return "Already exist.";
            }
        }

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
