@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Checklist Group') }}</div>

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
                    <form class="row g-3 d-inline " method="POST" action="{{route('admin.checklist_groups.update',$checklistGroup)}}">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label class="form-label" for="inputAddress">{{__('Name')}}</label>
                            <input class="form-control" id="inputAddress" name="name"
                                   type="text" placeholder="{{__('Checklist group name')}}"
                                   value="{{old('name', $checklistGroup->name)}}"
                            >
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="inputAddress2">{{__('Description')}}</label>
                            <input class="form-control" id="inputAddress2" name="description"
                                   type="text" placeholder="{{__('Checklist group description')}}"
                                   value="{{old('description',$checklistGroup->description)}}"
                            >
                        </div>
                        <div class="col-12 d-inline">
                            <button class="btn btn-primary mt-3" type="submit">{{__('Save')}}</button>
                        </div>
                    </form>
                    <form class="d-inline" method="POST" action="{{route('admin.checklist_groups.destroy',$checklistGroup)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger mt-3" type="submit"
                            onclick="return confirm('{{__('Are you sure?')}}')"
                        >{{__('Delete')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
