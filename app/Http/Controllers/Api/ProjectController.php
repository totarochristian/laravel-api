<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Return a json response with all the project saved in the local db (paginated 5 by 5)
     */
    public function index()
    {
        //Eager loading: return also the category data
        $projects = Project::with("category")->paginate(5);

        if($projects){
            return response()->json([
                "success" => true,
                "results" => $projects
            ]);
        }else{
            return response()->json([
                "success" => false,
                "results" => "Projects not found!"
            ]);
        }
    }
}
