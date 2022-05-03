<?php

namespace App\View\Composers;


use App\Models\ChecklistGroup;
use Illuminate\View\View;

class MenuComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        //for use in sidebar
        $menu = ChecklistGroup::with([
            'checklists'=>function($query){
                $query->whereNull('user_id');
            }
        ])->get();

        $view->with('user_menu', $menu);
    }
}
