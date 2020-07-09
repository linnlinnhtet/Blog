@extends('layouts.backend.app')

@section('title', 'Settings')

@push('css')
    {{-- expr --}}
@endpush

@section('content')
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SETTINGS
                            </h2>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home_only_icon_title" data-toggle="tab">
                                        <i class="material-icons">face</i>UPDATE PROFILE
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#profile_only_icon_title" data-toggle="tab">
                                        <i class="material-icons">change_history</i>PASSWORD CHANGE
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home_only_icon_title">
                                    @if (session('successMsg'))
                                        <div class="alert alert-success" role="alert">
                                            {{session('successMsg')}}
                                        </div>
                                    @endif
                                    @if (session('loginErrorMsg'))
                                        <div class="alert alert-danger" role="alert">
                                            {{session('loginErrorMsg')}}
                                        </div>
                                    @endif
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="card">
                                                <div class="body">
                                                <form class="form-horizontal" method="POST" action="{{ route('author.profile.update') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                        <div class="row clearfix">
                                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                <label for="name">NAME</label>
                                                            </div>
                                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                    <input type="text" id="name" class="form-control" placeholder="Enter your Name" name="name" value="{{ Auth::user()->name }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                <label for="email">EMAIL ADDRESS</label>
                                                            </div>
                                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                    <input type="text" id="email" class="form-control" placeholder="Enter your Email" name="email" value="{{ Auth::user()->email }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                <label for="image">PROFILE IMAGE</label>
                                                            </div>
                                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                    <input type="file" id="image" name="image">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                <label for="name">ABOUT PROFILE</label>
                                                            </div>
                                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                    <textarea name="about" id="about" rows="5" class="form-control">
                                                                        {{ Auth::user()->about }}
                                                                    </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile_only_icon_title">
                                     <form class="form-horizontal" method="POST" action="{{ route('author.password.update') }}">
                                        @csrf
                                        @method('PUT')
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="old_password">Old Password</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                        <input type="password" id="old_password" class="form-control" placeholder="Enter your Old Password" name="old_password">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="password">New Password</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                        <input type="password" id="password" class="form-control" placeholder="Enter your New Password" name="password">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="confirm_password">Confirm Password</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                        <input type="password" id="confirm_password" class="form-control" placeholder="Enter your Confirm Password" name="password_confirmation">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('js')
    
@endpush