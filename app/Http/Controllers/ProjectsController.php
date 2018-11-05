<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Project;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view("projects/index")->withProjects($projects);
        //return $projects;//Vraca json.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("projects/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //return $request->title;
        /*
        $project->title = request(title);
        $project->description = request(description);
        */
        /*return [
            "title"=> request("title"),
            "description"=> request("description")
        ];*/
        //dd(request()->all());
        /*Project::create([
            "title"=> request("title"),
            "description"=> request("description")
        ]);*/
        /*Ovo gore je isto kao i ovo dole.
        $project = new Project;
        $project->title = $request->title;
        $project->description = $request->description;
        $project->save();*/
        /*'Settings' za validaciju.*/
        $validated = request()->validate([
            /*Da je required i da je minimum tri slova uneseno.*/
            "title" => ["required", "min:3", "max: 255"],
            "description" => ["required", "min:3", "max: 255"]
        ]);
        
        Project::create(request($validated));
        return redirect("/projects");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {   //$project = Project::findOrFail($id);
        return view("projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //return view("projects.edit")->withProject($project);
        
        return view("projects/edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project)
    {
        $project->update(request(["title", "description"]));
        /*$project->title = request("title");
        $project->description = request("description");
        $project->save();*/

        return redirect("/projects");
        //dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        
        return redirect("/projects");
    }
}
