<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome(): View
    {

        //get welcome page
        $page = Page::findOrFail(1);
        return view('page',compact('page'));

    }

    public function consultation(): View
    {

        //get consultation page
        $page = Page::findOrFail(2);
        return view('page',compact('page'));

    }


}
