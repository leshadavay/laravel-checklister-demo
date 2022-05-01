<table class="table table-striped table-hover" wire:sortable="updateTaskOrder">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('Task name')}}</th>
        <th scope="col">{{__('Task description')}}</th>
        <th scope="col">{{__('Created date')}}</th>
        <th scope="col">{{__('Actions')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr wire:sortable.item="{{$task->id}}" wire:key="task-{{$task->id}}" >
            <td>{{$task->id}}</td>
            <td>{{$task->name}}</td>
            <td>{!! $task->description !!}</td>
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
