@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header text-center"><h5> {{ __('Edit Checklist in') }} '{{$checklist->name}}' </h5></div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="row g-3 d-inline" method="POST" action="{{route('admin.checklist_groups.checklists.update',[$checklistGroup, $checklist])}}">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label class="form-label" for="inputAddress">{{__('Name')}}</label>
                            <input class="form-control" id="inputAddress" name="name" type="text"
                                   placeholder="{{__('Checklist name')}}"
                                   value="{{old('name',$checklist->name)}}"
                            >
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="inputAddress2">{{__('Description')}}</label>
                            <input class="form-control" id="inputAddress2" name="description" type="text"
                                   placeholder="{{__('Checklist description')}}"
                                   value="{{old('description',$checklist->description)}}"
                            >
                        </div>
                        <div class="col-12 d-inline">
                            <button class="btn btn-primary mt-3" type="submit">{{__('Save Checklist')}}</button>
                        </div>
                    </form>
                    <form class="d-inline" method="POST" action="{{route('admin.checklist_groups.checklists.destroy',[$checklistGroup, $checklist])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger mt-3" type="submit"
                                onclick="return confirm('{{__('Are you sure?')}}')"
                        >{{__('Delete')}}</button>
                    </form>
                </div>
            </div>
            <hr>

            <div class="card mt-5">

                <div class="card-header text-center"><h5> {{ __('List of Tasks') }} </h5></div>
                <table class="table table-striped table-hover">
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
                    @foreach($checklist->tasks as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td>{{$task->name}}</td>
                            <td>{{$task->description}}</td>
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

            </div>

            <hr>

            <div class="card mt-5">
                <div class="card-header text-center"><h5> {{ __('New Task') }} </h5></div>
                <div class="card-body">
                    @if ($errors->storetask->any())
                        <div class="alert alert-danger">
                            <ul class="m-0">
                                @foreach ($errors->storetask->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="row g-3 d-inline" method="POST" action="{{route('admin.checklists.tasks.store',[$checklist])}}">
                        @csrf

                        <div class="col-12">
                            <label class="form-label" for="inputAddress">{{__('Name')}}</label>
                            <input class="form-control" id="inputAddress" name="name" type="text"
                                   placeholder="{{__('Task name')}}"
                                   value="{{old('name')}}"
                            >
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="inputAddress2">{{__('Description')}}</label>
                            <textarea class="form-control" id="inputAddress2" name="description" type="text"
                                   placeholder="{{__('Task description')}}" rows="4"
                            >{{old('description')}}</textarea>
                        </div>
                        <div class="col-12 d-inline">
                            <button class="btn btn-primary mt-3" type="submit">{{__('Save Task')}}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
