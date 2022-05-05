<div class="row justify-content-center">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header text-center"><h5> {{$checklist->name}} </h5></div>
            <div class="card-body">
                <table class="table-hover">
                    @foreach($checklist->tasks->where('user_id',null) as $task)
                        <tr>
                            <td>
                                <input type="radio" wire:click="complete_task({{$task->id}})"
                                @if(in_array($task->id,$completed_tasks)) checked="checked" @endif />
                            </td>
                            <td  wire:click="toggle_task({{$task->id}})" >{{$task->name}}</td>
                            <td wire:click="toggle_task({{$task->id}})">
                                @if(in_array($task->id,$opened_tasks))
                                    <svg  width="20px">
                                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-caret-top')}}"></use>
                                    </svg>
                                @else
                                    <svg   width="20px">
                                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-caret-bottom')}}"></use>
                                    </svg>
                                @endif
                            </td>
                        </tr>
                        @if(in_array($task->id,$opened_tasks))
                        <tr  id="task-description-{{$task->id}}">
                            <td></td>
                            <td colspan="2">{!!$task->description!!}</td>
                        </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
