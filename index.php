<?php include 'includes.php' ?>
<body>
<?php include 'base.php' ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="col-xs-4"></div>
			<div class="col-xs-4">
				<h1 align="center">Login</h1>
				<p id="errors"></p><br>
				<form class="form-horizontal" id="loginForm" role="form" action="javascript:login()">
				  <div class="form-group">
				    <label class="col-sm-2 control-label">Username</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="username" id="username" placeholder="Username">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-primary">Sign in</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function login(){
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;
			var done = false;
			if(!username && !password){
				error = "You must supply username and password";
				$("#errors").html(error).addClass("alert alert-danger");
			}
			else if(!username){
				error = "You must supply username";
				$("#errors").html(error).addClass("alert alert-danger");
			}else if(!password){
				error = "You must supply password";
				$("#errors").html(error).addClass("alert alert-danger");
			}else{
				done = true;
			}
			if(done){
        		var loginForm = $("#loginForm").serialize();
        		console.log(loginForm);
        		$.ajax({
        		  type:"POST",
        		  url:"login.php",
        		  data: loginForm,
        		  success:function(data){
        		    if(data == "error"){
        		     	error = "Username or Password is incorrect";
        		     	$("#errors").html(error).addClass("alert alert-danger");
        		     	done=false;
        		    }else{
        		    	window.location.href = "user.php";
        		    }
        		  }
        		});
			}
		}
	</script>
</body>
</html>