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
                                <form action="/pswcase/{{$data_pswcase->id}}/update" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="">Problem</label>
                                        <input type="text" name="psw_problem" class="form-control" value="{{ $data_pswcase->psw_problem }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="">Action</label>
                                        <textarea class="form-control" name="psw_action" rows="8">{{ $data_pswcase->psw_action }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Info</label>
                                        <textarea class="form-control" name="info" rows="5">{{ $data_pswcase->info }}</textarea>
                                    </div>
                                        <button type="submit" class="" style="background:#7c69ef; color: #fff;padding: 6.5px; margin: 8px;"> Save</button>
                                        <a href="/pswcase/" class="btn btn-dark"> Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>     
@stop   