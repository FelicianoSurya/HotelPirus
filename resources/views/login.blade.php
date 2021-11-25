@extends('template.appLogin')

@section('custom-css')
<link rel="stylesheet" href="">
@endsection

@section('content-login')

<div class="modal" style="background-color:rgba(0,0,0,0.5);" id="myModal" role="dialog">
		<div class="modal-dialog" style="width:100%;margin-top:150px">	
			<div class="modal-content">
				<div class="modal-header">
				<h4 class="modal-title" style="display:flex;justify-content:center; width:100%">Hotel Pirus</h4>
				</div>
				<div class="modal-body">
					<form action="login" method="POST">
                        {!! csrf_field() !!}
						<div class="group-form">
							<label for="id">ID</label>
							<input type="text" name="id" id="id" placeholder="ID" class="form-control">
						</div>
						<div class="group-form" style="margin-top:20px">
							<label for="">Password</label>
							<input type="password" name="password" id="password" placeholder="Password" class="form-control">
						</div>
                        <div class="d-flex justify-content-center">
						    <button type="submit" name="submit" class="btn btn-info btn-lg" style="margin-top:20px;">Login</button>
                        </div>
						<p style="color:red;margin-top:20px;"></p>
					</form>
				</div>
			</div>
		</div>
  	</div>

@endsection