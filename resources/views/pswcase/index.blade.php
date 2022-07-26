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
                                <div class="navbar-right">
                                    <button type="button" class="" data-toggle="modal" data-target="#exampleModal"> Add <span class="lnr lnr-plus-circle"></span></button>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <form class="form-inline my-2 my-lg-0" method="GET" action="/pswcase">
                                            <input class="form-control mr-sm-2" name="cari" type="search" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin: 10px; background: #7c69ef; color: #fff;padding: 6.5px;">Search Case</button>
                                        </form>
                                    </div>
                                </div>
                                <!--  -->

                                <!-- modal -->
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
                                <table class="table table-hover" id="search_list">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Case</th>
                                            <th>Dates</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($data_pswcase) > 0)
                                            @foreach ($data_pswcase ?? ''    as $num => $pswc) 
                                            <tr class="align-right"> 
                                                <td>{{++$num}}</td>     
                                                <td><a href="/pswcase/{{$pswc->id}}/case">{{$pswc->psw_problem}}</a></td>
                                                <td>{{$pswc->created_at }}</td>
                                                <td>
                                                    <a href="/pswcase/{{$pswc->id}}/edit" class="btn btn-sm btn-dark" style="margin-bottom: 5px;">Edit</a>
                                                    <a href="/pswcase/{{$pswc->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('data delete?') " style="margin-bottom: 5px;">Delete</a>
                                                </td>
                                            </tr>    
                                            @endforeach
                                        @else 
                                        <tr><td></td><td style="color: red; text-align: center;">Not Found</td></tr>    
                                        @endif
                                    </tbody>
                                </table>

                                {!! $data_pswcase->links() !!}

                            <!--  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop

