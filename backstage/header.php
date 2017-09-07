<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/backstage.css">

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<div>
			
		</div>
	</div>
	<div id="navbar" class="navbar-collapse collapse">
		<?php
		if($_SERVER['PHP_SELF'] != '/pims/inventory/create.php'){
		}
		if(isset($_SESSION["account"])){
			?>
		
			<form class="navbar-form navbar-right" style="margin-right:5px;" action="logout.php" method="post">
				<div class="form-group" id="hello">
					<a>Hello, <?=$_SESSION["account"]?></a>
				</div>
				<input type="submit" class="btn btn-primary" name="logoutBtn" value="登出">
				
			</form>
			<form action="changpassword.php" method="post" class="navbar-form navbar-right" >
			<input type="submit" class="btn btn-danger" name="cpasswordBtn" value="改變密碼">
			</form>
			<?php
		}else{
			header('Location: index.php');
			exit;
		}
		?>
	</div><!--/.navbar-collapse -->
</nav>

