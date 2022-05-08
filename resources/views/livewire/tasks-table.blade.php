<table class="table table-striped table-hover" >
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('Task name')}}</th>
        {{--<th scope="col">{{__('Task description')}}</th>--}}
        <th scope="col">{{__('Created date')}}</th>
        <th scope="col">{{__('Actions')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            <td>
                @if($task->position > 1)
                <a class="text-decoration-none" wire:click.prevent="task_up({{$task->id}})" href="#">
                    &uarr;
                </a>
                @endif
                @if($task->position < $tasks->max('position'))
                <a class="text-decoration-none" wire:click.prevent="task_down({{$task->id}})" href="#">
                    &darr;
                </a>
                @endif
            </td>
            {{--<td>{{$task->id}}</td>--}}
            <td>{{$task->name}}</td>
            {{--<td>{!! $task->description !!}</td>--}}
            <td>{{$task->created_at}}</td>
            <td>
                <a class="btn btn-sm btn-info" href="{{route('admin.checklists.tasks.edit',[$checklist,$task])}}">
                    {{__('Edit')}}
                </a>
                <form class="d-inline" method="POST" action="{{route('admin.checklists.tasks.destroy',[$checklist,$task])}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit"
                            onclick="return confirm('{{__('Are you sure?')}}')"
                    >{{__('Delete')}}</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
