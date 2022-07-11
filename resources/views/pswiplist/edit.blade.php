@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
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
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <form action="/pswiplist/{{$data_pswip->id}}/update" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="">Server Name</label>
                                        <input type="text" name="psw_servername" class="form-control" value="{{ $data_pswip->psw_servername }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ip Address</label>
                                        <input type="text" name="psw_ip" class="form-control" value="{{ $data_pswip->psw_ip }}" >
                                    </div>
                                        <button type="submit" class="" style="background:#7c69ef; color: #fff;padding: 6.5px; margin: 8px;"> Save</button>
                                        <a href="/pswiplist/" class="btn btn-dark"> Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>     
@stop   