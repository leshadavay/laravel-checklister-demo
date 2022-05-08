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
        $tasks = $this->checklist->tasks()
            ->where('user_id', null)
            ->orderBy('position')->get();

        return view('livewire.tasks-table', compact('tasks'));
    }

    //bind in blade component => <a wire:click.prevent="task_down({{$task->id}})" href="#"/>
    public function task_up($task_id)
    {
        $task = Task::find($task_id);
        if($task){
            Task::whereNull('user_id')->where('position',$task->position-1)->update([
                'position'  =>  $task->position
            ]);
            $task->update(['position'=>$task->position-1]);
        }
    }

    public function task_down($task_id)
    {
        $task = Task::find($task_id);
        if($task){
            Task::whereNull('user_id')->where('position',$task->position+1)->update([
                'position'  =>  $task->position
            ]);
            $task->update(['position'=>$task->position + 1]);
        }
    }

}
