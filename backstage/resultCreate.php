<!DOCTYPE html>
<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
$error = array();
$dir = "../resultimage/";
$imgArray = getDirFile($dir);

if (isset($_POST['createBtn'])) {
	if(isset($_POST['optionsRadios'])) {
		if($_POST['className'] != '' && $_POST['optionsRadios'] != ''){
			$name = $_POST['className'];
			$optionsRadios = $_POST['optionsRadios'];
			$class=$_POST['class'];
			$link=$_POST['link'];
			
			$sql = 'INSERT INTO results(r_title, r_videourl,r_class,r_image) VALUES ("'.$name.'","'.$link.'","'.$class.'", "'.$optionsRadios.'")';
			$result = mysqli_query($conn, $sql);
			$show = FALSE;
			header('Location: result.php');
			exit;
		}else{
			echo 'error';
		}
	}else{
		$error[] = '請先新增代表圖片';
	}
}
// 插入圖片
if(isset($_POST['inserImgBtn'])){
	if ($_FILES["imgFile"]["error"] > 0){
		$error[] = upload_error_list($_FILES["imgFile"]["error"]);
	}else{
		$name = $_POST['name'];
		$img = upload_file_by_result();
		if($img != FALSE){
			$_SESSION['success_msg'] = '上傳圖片成功';
			$_SESSION['tmp_class_name'] = $name;
			$show = FALSE;
			header('Location: resultCreate.php');
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
						<h1>新增成果影片</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="/service/backstage/classList.php">首頁</a></li>
						<li><a href="result.php">成果影片</a></li>
						<li class="active">新增成果影片</li>
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
						<form action="#" method="post">
							<div class="form-group">
								<label>成果影片名稱</label>
								<input type="text" class="form-control" placeholder="成果影片名稱" name="className" id="class_name" value="<?=(isset($_SESSION['tmp_class_name']))?$_SESSION['tmp_class_name']:''?>" required>
							</div>
							<div class="form-group">
								<label>成果影片連結</label>
								<input type="text" class="form-control" placeholder="成果影片連結" name="link" id="class_name" value="<?=(isset($_SESSION['tmp_class_name']))?$_SESSION['tmp_class_name']:''?>" required>
							</div>
							<div class="form-group">
								<label>成果影片分類</label>
								
							<select class="form-control" name="class" id="class_name">
								<option value="學生團隊">學生團隊</option>
								<option value="國際志工">國際志工</option>
								<option value="線上學堂">線上學堂</option>
								
								
							</select>
							</div>
							<label>代表圖片</label>
							<div class="form-group col-md-12">
								<?php
								foreach ($imgArray as $key => $value) {
									?>
									<div class="col-md-3 col-sm-4 col-xs-12 classImg">
										<div class="classArea">
											<div class="img" style="background-image:url('<?=$value?>')"></div>
											<input type="radio" name="optionsRadios" <?=($key == 0)?'checked':''?> value="<?=$value?>"  id="c<?=$key+1?>">
											<label for="c<?=$key+1?>" class="checkLabel"><span></span></label>
											<button type="button" class="close" onClick="delete_class_img('<?=$value?>')">
												<span aria-hidden="true">
													&times;
												</span>
											</button>
										</div>
									</div>
									<?php
								}
								?>
								<div class="col-md-3 col-sm-4 col-xs-12 classImg" onClick="tmpName()">
									<div id="addBtn" data-toggle="modal" data-target="#myModal1">
										<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
									</div>
								</div>
							</div>
							<div>
								<button type="submit" class="btn btn-default" name="createBtn">新增</button>
								<a onclick="javascript:window.location='result.php'" class="btn btn-default">取消</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- 彈跳視窗 -->
		<form action="#" method="post" enctype="multipart/form-data">
			<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">新增圖片</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<input type="file" name="imgFile" id="imgInp">
								<input type="hidden" name="name" id="tmp_name">
								<img id="blah" src="#" style="display:none;width:100%;">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
							<button type="submit" class="btn btn-primary" name="inserImgBtn">新增</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- 彈跳視窗 -->
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