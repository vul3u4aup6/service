<!DOCTYPE html>
<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
$error = array();


if (isset($_POST['createBtn'])) {
		if ($_FILES["catalog"]["error"] > 0){
		$error[] = upload_error_list($_FILES["catalog"]["error"]);
	}else{
		if($_POST['className'] != '' ){
			$name1 = $_FILES["catalog"]["name"];
			$name = $_POST['className'];
			$pdf = upload_file_by_applytable();
			$catagory=$_POST['catagory'];
			if($pdf != FALSE){
				
			
			$level=$_POST['classNumber'];
			$sql = 'INSERT INTO applytable(at_title,at_pdfpath,at_catagory) VALUES ("'.$name.'","'.$pdf.'","'.$catagory.'")';
			$result = mysqli_query($conn, $sql);
			$show = FALSE;
			header('Location: applytable.php');
			exit;
			}
		}else{
			echo 'error';
		}
	}
	
}
// 插入圖片
if(isset($_POST['inserImgBtn'])){
	if ($_FILES["imgFile"]["error"] > 0){
		$error[] = upload_error_list($_FILES["imgFile"]["error"]);
	}else{
		$name = $_POST['name'];
		$img = upload_file_by_publish();
		if($img != FALSE){
			$_SESSION['success_msg'] = '上傳圖片成功';
			$_SESSION['tmp_class_name'] = $name;
			$show = FALSE;
			header('Location: publishtableCreate.php');
			exit();
		}
	}
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
						<h1>新增申請表格</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="/service/backstage/classList.php">首頁</a></li>
						<li><a href="applytable.php">課程申請表格</a></li>
						<li class="active">新增申請表格</li>
					</ol>
					<div>
						<?php
						if (!empty($error)) {
							foreach ($error as $key => $value) {
								echo '<div class="alert-danger alert alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$value.'</div>';
							}
						}
						$success_msg = get_flash('success_msg');
						if($success_msg != FALSE){
							echo '<div class="alert-success alert alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$success_msg.'</div>';
						}
						?>
						<form action="#" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>申請表格名稱</label>
								<input type="text" class="form-control" placeholder="申請表格名稱" name="className" id="class_name" value="<?=(isset($_SESSION['tmp_class_name']))?$_SESSION['tmp_class_name']:''?>" required>
							</div>
							<div class="form-group">
								<label>申請表格分類</label>
								
							<select class="form-control" name="catagory" id="class_name">
								<option value="">無</option>
								<option value="課程">課程</option>
								<option value="制度">制度</option>
								<option value="團隊">團隊</option>
							</select>
							</div>
							<div class="form-group">
							<label>檔案上傳</label>
							<input type="file" name="catalog" id="imgInp">
							<input type="hidden" name="caname" id="tmp_name">
							</div>
							<div>
								<button type="submit" class="btn btn-default" name="createBtn">新增</button>
								<a onclick="javascript:window.location='applytable.php'" class="btn btn-default">取消</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</body>

	<script type="text/javascript">
	// 即時預覽
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#blah').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imgInp").change(function(){
		readURL(this);
		$('#blah').show();
	});
	
	// 暫存名字，不然重整會不見
	function tmpName(){
		$('#tmp_name').val($('#class_name').val());
	}

	function delete_class_img(img){
		var r=confirm("確定刪除?")
		if (r==true){
			$.ajax({
				type:"POST", 
				data: {img : img},
				url: "classDeleteImg.php",
				dateType:"json",
				error:function(){
					alert("AJAX ERROR!!!");
				},
				success:function(val){
					tmpName();
					location.reload();
				}
			});
		}
	}
	</script>
	</html>
	<?php
}
?>