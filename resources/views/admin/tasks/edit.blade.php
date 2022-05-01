@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header text-center"><h5> {{ __('Edit Task') }} </h5></div>
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
                    <form class="row g-3 d-inline" method="POST" action="{{route('admin.checklists.tasks.update',[$checklist,$task])}}">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label class="form-label" for="inputAddress">{{__('Name')}}</label>
                            <input class="form-control" id="inputAddress" name="name" type="text"
                                   placeholder="{{__('Task name')}}"
                                   value="{{old('name',$task->name)}}"
                            >
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="task-text-area">{{__('Description')}}</label>
                            <textarea class="form-control" id="task-text-area" name="description" type="text"
                                   placeholder="{{__('Task description')}}"
                            >
                                {{old('description',$task->description)}}
                            </textarea>
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
@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#task-text-area' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
