<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Emp;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->paginate(5);

        return view('projects.index',compact('projects'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

        // $data['project_name'] = Project::orderBy('id','desc')->paginate(5);
        // return view('projects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name'             => 'required|unique:projects',

            ]);

            $project       = new Project;
            $project->project_name = $request->project_name;
            $project->save();

            return redirect()->route('projects.index')
                             ->with('success','Project has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $emps = Emp::where('projectid',$project->id)->get();
        return view('projects.show',compact('project','emps'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit',compact('project'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            // 'project_name' => "required|unique:projects,project_name,{$id}"
            'project_name' => "required"
            ]);

            $project       = Project::find($id);
            $project->project_name = $request->project_name;
            $project->save();

            return redirect()->route('projects.index')
                             ->with('success','Project Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')
                         ->with('success','Project has been deleted successfully');

    }
}
