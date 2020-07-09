@extends('layouts.backend.app')

@section('title', 'Create Tag')

@push('css')

@endpush

@section('content')
    <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD NEW TAG
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
                            <form action="{{route('admin.tag.store')}}" method="POST">
                                @csrf
                                <label for="name">Tag Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your tag name">
                                    </div>
                                </div>
                                <a class="btn btn-danger m-t-15 wave-effect" href=" {{route('admin.tag.index')}} ">BACK</a>
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

