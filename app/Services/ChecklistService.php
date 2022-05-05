<?php


namespace App\Services;


use App\Models\Checklist;

class ChecklistService
{

    public function sync_checklist(Checklist $checklist,int $user_id){

        $checklist = Checklist::firstOrCreate(
            [
            'user_id'   =>  $user_id,
            'checklist_id'  =>  $checklist->id,

            ],
            [
            'name'      =>  $checklist->name,
            'description'   => $checklist->description,
            'checklist_group_id'    =>  $checklist->checklist_group_id,
            ]
        );

        //update 'updated_at' timestamp
        $checklist->touch();

        return $checklist;

    }

}
