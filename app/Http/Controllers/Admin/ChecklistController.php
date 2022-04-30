<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistGroupRequest;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Http\Request;

class ChecklistController extends Controller
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
     * @param ChecklistGroup $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function create(ChecklistGroup $checklistGroup)
    {
        return view('admin.checklists.create',compact('checklistGroup'));
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreChecklistGroupRequest $request
     * @param  ChecklistGroup  $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChecklistGroupRequest $request, ChecklistGroup $checklistGroup)
    {
        $checklistGroup->checklists()->create($request->validated());

        return redirect()->route('home');
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
     * @param  ChecklistGroup  $checklistGroup
     * @param  Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function edit(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        return view('admin.checklists.edit',compact('checklist','checklistGroup'));
    }

    /**
     * Update the specified resource in storage.
     * @param StoreChecklistGroupRequest $request
     * @param  ChecklistGroup  $checklistGroup
     * @param  Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function update(StoreChecklistGroupRequest $request, ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->update($request->validated());
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ChecklistGroup  $checklistGroup
     * @param  Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->delete();
        return redirect()->route('home');
    }
}
