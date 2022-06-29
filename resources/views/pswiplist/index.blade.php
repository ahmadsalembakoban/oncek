@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <!-- alert -->      
                    <!--  -->
                    <div class="panel">
                        <div class="panel-heading">
                           <div class="col-md-3" style="border: solid 1px red;">
                                <form class="form-inline my-2 my-lg-0" method="GET" action="/pswcase">
                                    <input class="form-control mr-sm-1" name="cari" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin: 10px; background: #7c69ef; color: #fff;padding: 6.5px;">Search IP</button>
                                </form>
                           </div>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
@stop