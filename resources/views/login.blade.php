@extends('template.appLogin')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content-login')

<div class="container-fluid">
	<div class="row" style="background-color:#85260f">
		<div class="col-md-12 d-flex justify-content-center align-items-center p-2">
			<p class="topik">Sistem Informasi Hotel Pirus</p>
		</div>
	</div>
</div>
<div class="container">
		<div class="modal-dialog" style="width:100%;margin-top:150px">	
			<div class="modal-content p-5">
				<div class="modal-header">
				<h4 class="modal-title d-flex justify-content-center align-items-center w-100">LOGIN</h4>
				</div>
				<div class="modal-body">
					<form action="login" method="POST">
                        {!! csrf_field() !!}
						<div class="group-form d-flex align-items-center">
							<label class="col-3" for="id">Id</label>
							<input type="text" name="username" id="username" placeholder="ID" class="form-control col-8">
						</div>
						<div class="group-form d-flex align-items-center" style="margin-top:20px">
							<label class="col-3" for="">Password</label>
							<input type="password" name="password" id="password" placeholder="Password" class="form-control col-8">
						</div>
                        <div class="d-flex justify-content-center mt-3">
						    <button type="submit" name="submit" class="btn btn-info" style="margin-top:20px;">Login</button>
                        </div>
						@if($errors->any())
						<p style="color:red;margin-top:20px;" class="text-center">{{ $errors->first() }}</p>
						@endif
					</form>
				</div>
			</div>
		</div>
  	</div>

@endsection