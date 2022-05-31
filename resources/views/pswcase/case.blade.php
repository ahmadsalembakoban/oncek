@extends('layouts.master');

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
                        <a href="/pswcase" class="btn btn-primary btn-sm"> Back</a>
						<div class="col-md-10">
							<!-- PANEL HEADLINE -->
							<div class="panel panel-headline" style="text-transform: capitalize;">
								<div class="panel-heading">
									<h3 class="panel-title" name="psw_problem"><strong>Case: </strong> {{$data_pswcase->psw_problem}}</h3>
								</div>
								<div class="panel-body">
									<strong><hr></strong>
									<p><strong>Action: </strong><br> {{$data_pswcase->psw_action}}</p>
                                    <br>
                                    <p><strong> info: </strong><br> {{$data_pswcase->info}}</p>
								</div>
							</div>
							<!-- END PANEL HEADLINE -->
						</div>
					</div>  
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
@stop  