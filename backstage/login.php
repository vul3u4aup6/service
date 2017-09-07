<?php
session_start();
include_once ('../database.php');
$error = '';
if(isset($_POST['account'])) {
	$account = addslashes($_POST['account']);
	$password = addslashes($_POST['password']);
	$sql = 'SELECT * FROM `user` where `u_account` = "'.$account.'" AND `u_password` = "'.md5($password).'"';
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$_SESSION['account'] = $account;
		header('Location: classList.php');
		exit;
	} else {
		$error = '帳號或密碼錯誤';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>靜宜大學服務學習發展中心</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>PUSLC後臺管理</title>
	<meta charset="UTF-8">
	<link href="images/favicon.ico" rel="Shortcut Icon" type="image/x-icon">
	<script type='text/javascript' src='../js/jquery.min.js'></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<style type="text/css">
	body {
		padding-top: 40px;
		padding-bottom: 40px;
		background-color: #eee;
	}
	.form-signin {
		max-width: 330px;
		padding: 15px;
		margin: 0 auto;
	}
	#logo{
		height: 50px;
	}
	#logo img, a{
		height: 50px;
	}
	</style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div id="navbar" class="navbar-collapse collapse">
			<div id="logo"><a href="/clc/index.php"><img src="/clc/images/logoindex.png"/></a></div>
		</div>
	</nav>
	
	<div class="container-fluid" style="margin-top:60px;">
		<div class="container">
			<form class="form-signin" action="#" method="post">
				<h2 class="form-signin-heading">PUSLC後臺登入</h2>
				<?php
				if ($error != '') {
					echo '<div class="alert-danger alert alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$error.'</div>';
					
				}
				?>
				<input type="text" class="form-control" name="account" placeholder="帳號" value="<?=(isset($account))?$account:''?>" required autofocus>
				<input type="password" class="form-control" name="password" placeholder="密碼" required>
				<button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:20px">登入</button>
			</form>
		</div>
	</div>
</body>
</html>