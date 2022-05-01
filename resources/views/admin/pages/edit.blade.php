@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header text-center"><h5> {{ __('Edit Page') }} </h5></div>
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
                    @if(session('success'))
                        <div class="alert alert-success"> {{session('success')}} </div>
                    @endif

                    <form class="row g-3 d-inline" method="POST" action="{{route('admin.pages.update',[$page])}}">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label class="form-label" for="inputAddress">{{__('Title')}}</label>
                            <input class="form-control" id="inputAddress" name="title" type="text"
                                   placeholder="{{__('Page title')}}"
                                   value="{{old('title',$page->title)}}"
                            >
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="page-text-area">{{__('Content')}}</label>
                            <textarea class="form-control" id="page-text-area" name="content" type="text"
                                   placeholder="{{__('Page content')}}"
                            >
                                {{old('content',$page->content)}}
                            </textarea>
                        </div>
                        <div class="col-12 d-inline">
                            <button class="btn btn-primary mt-3" type="submit">{{__('Save Page')}}</button>
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
            .create( document.querySelector( '#page-text-area' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
