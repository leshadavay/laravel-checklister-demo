<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class TasksTable extends Component
{

    // usage in view => @livewire('tasks-table',['checklist'=>$checklist])
    public $checklist;

    public function render()
    {
        //can also re-run after updateTaskOrder()
        $tasks = $this->checklist->tasks()->orderBy('position')->get();

        return view('livewire.tasks-table',compact('tasks'));
    }

    //bind in html component => wire:sortable="updateTaskOrder"
    public function updateTaskOrder($tasks){

        foreach ($tasks as $task){
            Task::find($task['value'])->update(['position'=>$task['order']]);
        }

    }

}
