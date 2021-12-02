@extends('layouts.admin')

@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Post</h1>
                    </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post list</a></li>
                    <li class="breadcrumb-item active">Edit Post</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="card-title">Edit Post</h3> 
                                    <a href="{{route('post.index')}}" class="btn btn-primary">Go Back to Post List</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12 col-lg-8 offset-md-2 col-md-8 offset-md-2">
                                        <form action="{{route('post.update',[$post->id])}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method("PUT")
                                            <div class="card-body">
                                                @include('includes.errors')
                                              <div class="form-group">
                                                <label for="title">Post title</label>
                                                <input type="title" value="{{$post->title}}" name="title" class="form-control" id="title" placeholder="Enter title">
                                              </div>
                                              <div class="form-group">
                                                <label for="name">Select Category</label>
                                                <select name="category" value="{{$post->category_id}}" class="form-control" id="category">
                                                    @foreach ($categories as $c)
                                                        <option value="{{$c->id}}" @if($post->category_id == $c->id) selected @endif >{{$c->name}}</option>
                                                    @endforeach
                                                </select>
                                              </div>
                                              <div class="form-group">
                                              <label for="tags">Choose Post Tags</label>
                                              <div class=" d-flex flex-wrap">
                                                      @foreach ($tags as $tag)
                                                      <div class="custom-control custom-checkbox " style="margin-right: 20px">
                                                        <input class="custom-control-input" name="tags[]" type="checkbox" id="tag-{{$tag->id}}" value="{{$tag->id}}" 
                                                        @foreach ($post->tags as $t)
                                                        @if ($tag->id == $t->id) checked @endif
                                                        @endforeach>
                                                        <label for="tag-{{$tag->id}}" class="custom-control-label">{{$tag->name}}</label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                              <div class="form-group">
                                                  <div class="row">
                                                      <div class="col-9">
                                                        <label for="customFile">Image</label>
                                                        <div class="custom-file">
                                                          <input type="file" name="image" class="custom-file-input" id="customFile">
                                                          <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                      </div>
                                                      <div class="col-3">
                                                        <div style="max-width: 100px; max-height:100px; overflow:hidden; border-radius:10px;margin-left:auto;">
                                                            <img src="{{asset($post->image)}}" class="img-fluid" alt="">
                                                        </div>
                                                      </div>
                                                  </div>
                                               
                                              </div>
                                              <div class="form-group">
                                                <label for="description">Decription</label>
                                                <textarea name="description"  id="description" rows="4" class="form-control" placeholder="Enter description">{{$post->description}}</textarea>
                                              </div>
                                            </div>
                                            <!-- /.card-body -->
                            
                                            <div class="card-footer">
                                              <button type="submit" class="btn btn-primary">Edit Post</button>
                                            </div>
                                          </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                          </div>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>

@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('admin/css/summernote-bs4.min.css')}}">
@endsection

@section('script')

<script src="{{asset('admin/js/summernote-bs4.min.js')}}"></script>
<script>
    $('#description').summernote({
      placeholder: 'Enter description',
      tabsize: 2,
      height: 300
    });
  </script>
@endsection