@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('New Checklist Group') }}</div>

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
                    <form class="row g-3" method="POST" action="{{route('admin.checklist_groups.store')}}">
                        @csrf
                        <div class="col-12">
                            <label class="form-label" for="inputAddress">{{__('Name')}}</label>
                            <input class="form-control" id="inputAddress" name="name" type="text"
                                   placeholder="{{__('Checklist group name')}}"
                                   value="{{old('name')}}"
                            >
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="inputAddress2">{{__('Description')}}</label>
                            <input class="form-control" id="inputAddress2" name="description" type="text"
                                   placeholder="{{__('Checklist group description')}}"
                                   value="{{old('description')}}"
                            >
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
