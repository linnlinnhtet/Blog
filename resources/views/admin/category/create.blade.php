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
                                ADD NEW CATEGORY
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
                            <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="name">Category Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="file" id="image" name="image" class="form-control">
                                </div>
                                <a class="btn btn-danger m-t-15 wave-effect" href=" {{route('admin.category.index')}} ">BACK</a>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
@endsection

@push('js')
        
@endpush

