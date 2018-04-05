<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;

class BranchController extends Controller
{
    function getAll(){
        return Branch::all();
    }

    function byId(){
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
        $branch->save();
        return "ok";
    }

    function update($id, Request $req){
        /*
        Validacion desde el controller
        $req->validate([
            'name' -> 'required|unique:branches|max:191'
        ])*/
        $branch = Branch::findOrFail($id);
        $branch->name = $req->name;
        $branch->save();
        return "ok";
    }

    function delete($id){
        Branch::findOrFail($id)->delete();
        return "ok";
    }
}
