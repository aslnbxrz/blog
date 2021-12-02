@extends('layouts.admin')

@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Tag</h1>
                    </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('tag.index')}}">Tag list</a></li>
                    <li class="breadcrumb-item active">Edit Tag</li>
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
                                    <h3 class="card-title">Edit Tag - <b>{{$tag->name}}</b></h3> 
                                    <a href="{{route('tag.index')}}" class="btn btn-primary">Go Back to Tag List</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12 col-lg-6 offset-md-3 col-md-8 offset-md-2">
                                        <form action="{{route('tag.update',[$tag->id])}}" method="POST">
                                            @method("PUT")
                                            @csrf
                                            <div class="card-body">
                                                @include('includes.errors')
                                              <div class="form-group">
                                                <label for="name">Tag name</label>
                                                <input type="name" name="name" class="form-control" id="name" value="{{$tag->name}}" placeholder="Enter name">
                                              </div>
                                              <div class="form-group">
                                                <label for="description">Decription</label>
                                                <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter description">{{$tag->description}}</textarea>
                                              </div>
                                            </div>
                                            <!-- /.card-body -->
                            
                                            <div class="card-footer">
                                              <button type="submit" class="btn btn-primary">Update Tag</button>
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