<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Branch;

class BranchController extends Controller
{
    function getAll(){
        return Branch::all();
    }

    function byId($id){
        $branch = Branch::findOrFail($id);
        $branch ->stops;
        return $branch;
    }

    function save(Request $req){
        /*
        Validacion desde el controller
        $req->validate([
            'name' -> 'required|unique:branches|max:191'
        ])*/
        $branch = new Branch();
        $branch->name = $req->name;
        $branch->schedule = $req->schedule;
        $branch->save();
        return "Success (Save)";
    }

    function update($id, Request $req){
        /*
        Validacion desde el controller
        $req->validate([
            'name' -> 'required|unique:branches|max:191'
        ])*/
        $branch = Branch::findOrFail($id);
        $branch->name = $req->name;
        $branch->schedule = $req->schedule;
        $branch->save();
        return "Success (Update)";
    }

    function delete($id){
        Branch::findOrFail($id)->delete();
        return "Success (Delete)";
    }
}
