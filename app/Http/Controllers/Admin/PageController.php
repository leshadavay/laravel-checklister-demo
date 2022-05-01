<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index(): View
    {
        return view('');
    }


    public function create(): View
    {
        //
    }


    public function store(Request $request): RedirectResponse
    {
        //
    }


    public function show($id): View
    {
        //
    }


    public function edit(Page $page): View
    {
        return view('admin.pages.edit',compact('page'));
    }


    public function update(PageRequest $request, Page $page): RedirectResponse
    {
        $page->update($request->validated());
        return redirect()->route('admin.pages.edit',$page)->with('success',__('Success'));
    }


    public function destroy($id): RedirectResponse
    {
        //
    }
}
