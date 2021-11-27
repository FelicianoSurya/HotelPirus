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
						<div class="group-form d-flex align-items-center">
							<label class="col-3" for="id">ID</label>
							<input type="text" name="username" id="username" placeholder="ID" class="form-control col-8">
						</div>
						<div class="group-form d-flex align-items-center" style="margin-top:20px">
							<label class="col-3" for="">Password</label>
							<input type="password" name="password" id="password" placeholder="Password" class="form-control col-8">
						</div>
                        <div class="d-flex justify-content-center">
						    <button type="submit" name="submit" class="btn btn-info btn-lg" style="margin-top:20px;">Login</button>
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