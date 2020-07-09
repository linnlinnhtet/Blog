@extends('layouts.backend.app')

@section('title', 'Show Post')

@push('css')
   
@endpush

@section('content')
    <!-- Vertical Layout -->
            <div class="container-fluid">
                <a class="btn btn-danger wave-effects" href="{{ route('author.post.index') }}">Back</a>
                @if ($post->is_approved == false)
                    <button type="button" class="btn btn-success pull-right">
                        <i class="material-icons">done</i>
                        <span>Approve</span>
                    </button>
                @else
                    <button type="button" class="btn btn-success pull-right" disabled>
                        <i class="material-icons">done</i>
                        <span>Approved</span>
                    </button>
                @endif
                <br><br>
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        
                        <div class="card">
                            <div class="header">
                                <h2>
                                    {{ $post->title }}
                                    <small>Post By <strong><a href="#">{{ $post->user->name }}</a></strong>
                                        on {{ $post->created_at->toFormattedDateString() }}</small>
                                 </h2>
                            </div>
                            <div class="body">
                                {!! $post->body !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        
                        <div class="card">
                            <div class="header bg-cyan">
                                <h2>
                                    Categories
                                </h2>
                            </div>
                            <div class="body">
                                @foreach ($post->categories as $category)
                                    <span class="label bg-cyan">{{ $category->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="card">
                            <div class="header bg-green">
                                <h2>
                                    Tags
                                </h2>
                            </div>
                            <div class="body">
                                @foreach ($post->tags as $tag)
                                    <span class="label bg-green">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="card">
                            <div class="header bg-amber">
                                <h2>
                                    Featured Image
                                </h2>
                            </div>
                            <div class="body">
                                <img class="img-responsive thumbnail" src="{{ Storage::disk('public')->url('post/'.$post->image) }}" alt="{{ $post->slug }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('js')

@endpush

