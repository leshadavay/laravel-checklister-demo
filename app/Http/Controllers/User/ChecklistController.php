<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use App\Services\ChecklistService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{

    public function index(): View
    {
        //
    }


    public function create(): View
    {
        //
    }


    public function store(Request $request): RedirectResponse
    {
        //
    }


    public function show(Checklist $checklist): View
    {

        //sync checklist from admin

        (new ChecklistService())->sync_checklist($checklist,auth()->user()->id);

        return view('user.checklists.show',compact('checklist'));
    }


    public function edit($id): View
    {
        //
    }


    public function update(Request $request, $id): RedirectResponse
    {
        //
    }


    public function destroy($id): RedirectResponse
    {
        //
    }
}
