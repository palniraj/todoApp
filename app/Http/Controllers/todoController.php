<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class todoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $alltodoTasks = Task::all();
      return view('todoTasks.index', compact('alltodoTasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todoTasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//validation
        request()->validate(
            [
                'title' => 'required',
                'Description' => 'nullable'
            ]
            );

        $todoTask = new Task();
        $todoTask -> title=request('title');
        $todoTask -> Description=request('Description');
        $todoTask->save();

        return redirect('/todoTasks')->withMessage('Task Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todoTask = Task::find($id);
        return view('todoTasks.edit', compact('todoTask'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $todoTask = Task::find($id);
        $todoTask->title = request('title');
        $todoTask->Description = request('Description');
        $todoTask->save();

        return redirect('/todoTasks')->withMessage("Tasks Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::destroy($id);

        return redirect('/todoTasks')->withMessage("You Have delete a task!");
    }
}
