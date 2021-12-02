@extends('layouts.admin')

@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit User</h1>
                    </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('user.index')}}">User list</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
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
                                    <h3 class="card-title">Edit User - <b>{{$user->name}}</b></h3> 
                                    <a href="{{route('user.index')}}" class="btn btn-primary">Go Back to User List</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12 col-lg-6 offset-md-3 col-md-8 offset-md-2">
                                        <form action="{{route('user.update',$user->id)}}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            <div class="card-body">
                                                @include('includes.errors')
                                              <div class="form-group">
                                                <label for="name">User name</label>
                                                <input type="name" value="{{$user->name}}" name="name" class="form-control" id="name" placeholder="Enter name">
                                              </div>
                                              <div class="form-group">
                                                <label for="email">User email</label>
                                                <input type="email" value="{{$user->email}}" name="email" class="form-control" id="email" placeholder="Enter email">
                                              </div>
                                              <div class="form-group">
                                                <label for="password">User password <small>(Enter password if you want change.)</small> </label>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                                              </div>
                                              {{-- <div class="form-group">
                                                <label for="description">Decription</label>
                                                <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter description"></textarea>
                                              </div> --}}
                                            </div>
                                            <!-- /.card-body -->
                            
                                            <div class="card-footer">
                                              <button type="submit" class="btn btn-primary">Update User</button>
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