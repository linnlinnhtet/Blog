@extends('layouts.backend.app')

@section('title', 'Create Post')

@push('css')
    {{-- Bootstrap.Select.CSS --}}
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <!-- Vertical Layout -->
            <div class="container-fluid">
                <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        ADD NEW POST
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
                                    <label for="title">Post Title</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="title" name="title" class="form-control">
                                        </div>
                                    </div>
                                    <label for="image">Featured Image</label>
                                    <div class="form-group">
                                        <input type="file" id="image" name="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="publish" class="filled-in" name="status">
                                        <label for="publish">Publish</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        Categories and Tags
                                    </h2>
                                </div>
                                <div class="body">
                                    <div class="form-group form-float">
                                        <div class="form-inline {{ $errors->has('categories')?'focused error':'' }}">
                                            <label class="category">Select Category</label>
                                            <select name="categories[]" id="category" class="form-control show-tick" data-live-search="true" multiple>
                                                @foreach ($categories as $category)
                                                    <option style="margin-left: 50px" value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-inline {{ $errors->has('tags')?'focused error':'' }}">
                                            <label class="tag">Select Tag</label>
                                            <select name="tags[]" id="tag" class="form-control show-tick" data-live-search="true" multiple>
                                                @foreach ($tags as $tag)
                                                    <option style="margin-left: 50px" value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <a class="btn btn-danger m-t-15 wave-effect" href=" {{route('admin.post.index')}} ">BACK</a>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        POST BODY
                                     </h2>
                                </div>
                                <div class="body">
                                    <textarea id="tinymce" name="body">
                                        
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
@endsection

@push('js')
        {{-- Bootstrap.Select.Js --}}
        <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
        <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
        <script type="text/javascript">
            $(function() {
                //TinyMCE
                tinymce.init({
                    selector: "textarea#tinymce",
                    theme: "modern",
                    height: 300,
                    plugins: [
                        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                        'searchreplace wordcount visualblocks visualchars code fullscreen',
                        'insertdatetime media nonbreaking save table contextmenu directionality',
                        'emoticons template paste textcolor colorpicker textpattern imagetools'
                    ],
                    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                    toolbar2: 'print preview media | forecolor backcolor emoticons',
                    image_advtab: true
                });
                tinymce.suffix = ".min";
                tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
            });
        </script>
@endpush

