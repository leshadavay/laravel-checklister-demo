<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Checklist;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(StoreTaskRequest $request,Checklist $checklist): RedirectResponse
    {

        $position = $checklist->tasks()->max('position') + 1;

        $data = $request->validated() + ['position'=>$position];

        $checklist->tasks()->create($data);


        return redirect()->route('admin.checklist_groups.checklists.edit',[
            $checklist->checklist_group_id, $checklist
        ]);
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


    public function edit(Checklist $checklist,Task $task): View
    {
        return view('admin.tasks.edit',compact('checklist','task'));
    }


    public function update(StoreTaskRequest $request, Checklist $checklist,Task $task): RedirectResponse
    {
        $task->update($request->validated());

        return redirect()->route('admin.checklist_groups.checklists.edit',[
            $checklist->checklist_group_id,$checklist
        ]);

    }



    public function destroy(Checklist $checklist,Task $task): RedirectResponse
    {

        //reorder position before delete
        $checklist->tasks()->where('position','>',$task->position)->update(
          ['position'=>DB::raw('position-1')]
        );

        $task->delete();

        return redirect()->route('admin.checklist_groups.checklists.edit',[
           $checklist->checklist_group_id,$checklist
        ]);
    }
}
