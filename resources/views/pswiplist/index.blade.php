@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <!-- alert -->  
                    @if(session('sukses'))
                        <div class="alert alert-success alert-dissmisable" role="alert">
                            {{session('sukses')}}
                            <button type="button" class="close" data-dismiss="alert" aria-lable="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>                    
                    @endif
                    <!--  -->
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="navbar-right">
                                    <button type="button" class="" data-toggle="modal" data-target="#addbtnmodal"> Add <span class="lnr lnr-plus-circle"></span></button>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <form class="form-inline my-2 my-lg-0" method="GET" action="/pswiplist">
                                            <input class="form-control mr-sm-1" name="cari" type="search" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin: 10px; background: #7c69ef; color: #fff;padding: 6.5px;">Search IP</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- modal -->
                                    <div class="modal fade" id="addbtnmodal" tabindex="-1" aria-labeledby="addbtnmodal-label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addbtnmodal-title"></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-lable="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/pswiplist/create" method="POST">
                                                        {{csrf_field()}}
                                                        <div class="form-group {{$errors->has('psw_servername') ? 'has-error' : '' }}">
                                                            <label for="">Server Name</label>
                                                            <input type="text" name="psw_servername" class="form-control" value="{{ old('psw_servername') }}">
                                                        </div>
                                                            @if($errors->has('psw_servername'))
                                                            <span class="help-block small" style="color: red;">{{$errors->first('psw_servername')}}</span>
                                                            @endif
                                                        <div class="form-group {{$errors->has('psw_ip')}} ? 'has-error' : '' ">
                                                            <label for="">Ip Address</label>
                                                            <input type="text" name="psw_ip" class="form-control" value="{{old('psw_ip')}}">
                                                        </div>
                                                            @if($errors->has('psw_ip'))
                                                            <span class="help-block small" style="color: red;">{{$errors->first('psw_ip')}}</span>
                                                            @endif
                                                            <button type="submit" style="background:#7c69ef; color: #fff;padding: 6.5px;"> Save</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!--  -->
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Server Name</th>
                                            <th>Ip Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($data_pswip) > 1)
                                            @foreach($data_pswip ?? '' as $num=> $pswip)
                                            <tr class="align-right">
                                                <td>{{++$num}}</td>
                                                <td>{{$pswip->psw_servername}}</td>
                                                <td>{{$pswip->psw_ip}}</td>
                                                <td>
                                                    <a href="/pswiplist/{{$pswip->id}}/edit" class="btn btn-dark btn-sm" style="margin-bottom: 5px;"> Edit</a>
                                                    <a href="/pswiplist/{{$pswip->id}/delete}" class="btn btn-danger btn-sm" onclick="return confirm('data delete?')" style="margin-bottom: 5px;"> Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else 
                                            <tr><td style="color: red; text-align: center;">Data not found</td></tr>    
                                        @endif        
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