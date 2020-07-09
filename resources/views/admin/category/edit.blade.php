@extends('layouts.backend.app')

@section('title', 'Create Category')

@push('css')

@endpush

@section('content')
    <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT CATEGORY
                            </h2>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error}}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="body">
                            <form action="{{route('admin.category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <label for="name">Category Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="image" class="form-control" value="{{ $category->name }}">
                                </div>
                                <a class="btn btn-danger m-t-15 wave-effect" href=" {{route('admin.category.index')}} ">BACK</a>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
@endsection

@push('js')
        
@endpush

