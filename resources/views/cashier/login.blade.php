<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/css/login.css">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<script src="/js/jquery.js"></script>
	<script src="/js/bootstrap.min.js"></script>
</head>
	<body id="LoginForm">
		<div class="container">
			<div class="login-form">
				<div class="main-div">
				    <div class="panel">
				   <h2>Login</h2>
				   </div>
				    {!! Form::open(array('url' => 'login', 'id'=>'Login'))!!}
				        <div class="form-group">
				           <input type="text" class="form-control" name="user_name" id="inputEmail" placeholder="Username">
				        </div>

				        <div class="form-group">
				           <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
				        </div>
				        <button type="submit" class="btn btn-primary">Login</button>

				    {!! Form::close() !!}
			    </div>
			</div>
				</div>
		</div>


</body>
</html>