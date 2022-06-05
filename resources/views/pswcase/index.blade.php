@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <!-- alert -->  
                        @if(session('sukses'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{session('sukses')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    <!--  -->
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                 <form class="form-inline my-2 my-lg-0" method="GET" action="/pswcase">
                                    <input class="form-control mr-sm-2" name="cari" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin: 10px; background: #7c69ef; color: #fff;padding: 6.5px; ">Search</button>
                                </form>
                                <div class="right">
                                    <button type="button" class="right" data-toggle="modal" data-target="#exampleModal"><span class="lnr lnr-plus-circle"></span></button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>  
                                        <div class="modal-body">
                                        <form action="/pswcase/create" method="POST">
                                            {{csrf_field()}}
                                            <div class="form-group {{$errors->has('psw_problem') ? 'has-error' : ''}}">
                                                <label for="">Problem</label>
                                                <input type="text" name="psw_problem" class="form-control" value="{{old('psw_problem')}}" >
                                            </div>
                                            @if($errors->has('psw_problem'))
                                              <span class="help-block small" style="color: red;">{{$errors->first('psw_problem')}}</span>
                                            @endif 
                                            <div class="form-group {{$errors->has('psw_action') ? 'has-error' : ''}}">
                                                <label for="">Action</label>
                                                <!-- <input type="text" name="psw_action" class="form-control" > -->
                                                <textarea class="form-control" name="psw_action" rows="8">{{old('psw_problem')}}</textarea>
                                            </div>
                                            @if($errors->has('psw_action'))
                                              <span class="help-block small" style="color: red;">{{$errors->first('psw_action')}}</span>
                                            @endif
                                            <div class="form-group {{$errors->has('info') ? 'has-error' : ''}}">
                                                <label for="">Info</label>
                                                <textarea class="form-control" name="info" rows="4">{{old('info')}}</textarea>
                                            </div>
                                            @if($errors->has('info'))
                                              <span class="help-block small" style="color: red;">{{$errors->first('info')}}</span>
                                            @endif
                                                <button type="submit" class="" style="background:#7c69ef; color: #fff;padding: 6.5px;">Save</button>
                                        </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal -->
                                
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Case</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_pswcase as $pswc)
                                        <tr class="align-right"> 
                                            <td><a href="/pswcase/{{$pswc->id}}/case">{{$pswc->psw_problem}}</a></td>
                                            <td>
                                                <a href="/pswcase/{{$pswc->id}}/edit" class="btn btn-sm btn-dark">Edit</a>
                                                <a href="/pswcase/{{$pswc->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('data delete?') ">Delete</a>
                                            </td>
                                        </tr>    
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content1')
        <!-- alert -->  
        @if(session('sukses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('sukses')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!--  -->
        <div class="row m-4">
            <div class="col-md-8 ">
                <form class="form-inline my-2 my-lg-0" method="GET" action="/pswcase">
                    <input class="form-control mr-sm-2" name="cari" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="col-md-4">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                Add
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="text-transform: capitalize;">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Case</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>  
                    <div class="modal-body">
                    <form action="/pswcase/create" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="">Problem</label>
                            <input type="text" name="psw_problem" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label for="">Action</label>
                            <textarea class="form-control" name="psw_action" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Info</label>
                            <textarea class="form-control" name="info" rows="5"></textarea>
                        </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->
        </div>
        <div class="row mt-4">
            <div class="col">
                <table class="table" style="text-transform: capitalize;">
                    <tr>
                        <th>Problem</th>
                        <th></th>
                    </tr>
                    <tr> 
                    @foreach ($data_pswcase as $pswc) 
                        <td>{{$pswc->psw_problem}}</td>
                        <td>
                            <a href="/pswcase/{{$pswc->id}}/edit" class="btn btn-sm btn-dark">Edit</a>
                            <a href="/pswcase/{{$pswc->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('data delete?') ">Delete</a>
                        </td>
                    </tr>   
                    @endforeach 
                </table>
            </div>
        </div>

 @endsection       
   
