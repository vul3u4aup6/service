<!DOCTYPE html>
<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
$error = array();

if (isset($_POST['cpasswordBtn'])) {
	if($_POST['password'] != ''&& $_POST['password2']!='' && $_POST['password']== $_POST['password2']){
		$password = $_POST['password'];
		$sql = 'UPDATE user SET `u_password` = "'.md5($password).'"';
		$result = mysqli_query($conn, $sql);
		$show = FALSE;
		$_SESSION['success_msg'] = '修改成功';
		header('Location: classList.php');
		exit;
	}
	/*else{
		echo '<script type="text/javascript">alert("修改失敗！");</script>';
		
	}*/
}

if($show){
	?>
	<html>
	<head>
	<title>PUSLC後臺管理</title>
	<meta charset="UTF-8">
	<link href="images/favicon.ico" rel="Shortcut Icon" type="image/x-icon">
	</head>
	<body>
		<?php include("header.php");?>
		<div class="container-fluid" style="margin-top:70px;">
			<div class="row">
				<?php include("sideNav.php");?>
				<div class="col-md-9">
					<div class="option">
						<h1>修改密碼</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="classList.php">首頁</a></li>
						<li><a href="changpassword.php">密碼修改</a></li>
						
					</ol>
					<div>
						<form action="#" method="post">
							<div class="form-group">
								<label>修改密碼</label>
								<input type="password" class="form-control" placeholder="修改密碼" name="password" id="password" required>
							</div>
							<div class="form-group">
								<label>再次輸入密碼</label>
								<input type="password" class="form-control" placeholder="再次確認密碼" name="password2" id="password2" required>
							</div>
							<div>
								<button type="submit" class="btn btn-default" name="cpasswordBtn">確定</button>
								<a onclick="javascript:window.location='newsList.php'" class="btn btn-default">取消</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<?php
}
?>