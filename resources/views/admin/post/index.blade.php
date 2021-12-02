@extends('layouts.admin')

@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Post list</h1>
                    </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                    <li class="breadcrumb-item active">Post list</li>
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
                                    <h3 class="card-title">Post list</h3> 
                                    <a href="{{route('post.create')}}" class="btn btn-primary">Create post</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Author</th>
                                    <th style="width: 40px">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @if ($posts->count())
                                    @foreach ($posts as $post)
                                    <tr >
                                        <td style="vertical-align: middle;">{{$post->id}}</td>
                                        <td style="vertical-align: middle;">
                                            <div style="max-width: 70px; max-height:70px; overflow:hidden; border-radius:10px;">
                                                <img src="{{asset($post->image)}}" class="img-fluid" alt="">
                                            </div>
                                        </td>
                                        <td style="vertical-align: middle;">{{$post->title}}</td>
                                        <td style="vertical-align: middle;">{{$post->category->name}}</td>
                                        <td style="vertical-align: middle;">
                                            @foreach ($post->tags as $tag)
                                                <span class="badge badge-info">{{$tag->name}}</span>
                                            @endforeach    
                                        </td>
                                        <td style="vertical-align: middle;">{{$post->user->name}}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="{{route('post.show', [$post->id])}}" class="btn btn-info mr-1"> <i class="fas fa-eye"></i></a>
                                            <a href="{{route('post.edit', [$post->id])}}" class="btn btn-primary mr-1"> <i class="fas fa-edit"></i></a>
                                            <form action="{{route('post.destroy', [$post->id])}}" class="mr-1" method="POST">
                                                @method("DELETE")
                                                @csrf
                                                <button type="submit" class="btn btn-danger mr-1"> <i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                      </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">
                                                <h5 class="text-center">No posts found.</h5>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                              </table>
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