<!DOCTYPE html>
<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
$error = array();
$dir = "../letter/";
$imgArray = getDirFile($dir);
if (isset($_POST['createBtn'])) {
	if(isset($_POST['optionsRadios'])) {
	if($_POST['newsTitle'] != '' && $_POST['newsAddress'] != ''){
		$newsTitle = $_POST['newsTitle'];
		$newsAddress = $_POST['newsAddress'];
		$newsperson = $_POST['newsperson'];
		$newsunit = $_POST['newsunit'];
		$newsabs = $_POST['newsabs'];
		$newscontent = $_POST['newscontent'];
		$newsvol = $_POST['newsvol'];
		
		$optionsRadios = $_POST['optionsRadios'];
		$date = date("Y-m-d");

		$sql = 'INSERT INTO newsletter(n_title, n_class,n_unit,n_author,n_content,n_vol,n_abstract,n_absimage) VALUES ("'.$newsTitle.'", "'.$newsAddress.'", "'.$newsunit.'", "'.$newsperson.'", "'.$newscontent.'", "'.$newsvol.'", "'.$newsabs.'", "'.$optionsRadios.'")';
		$result = mysqli_query($conn, $sql);
		$show = FALSE;
		$_SESSION['success_msg'] = '新增成功';
		header('Location: letterList.php');
		exit;
	}else{
		$error[] = '請先新增代表圖片';
	}
	}else{
		echo 'error';
	}
}
if(isset($_POST['inserImgBtn'])){
	if ($_FILES["imgFile"]["error"] > 0){
		$error[] = upload_error_list($_FILES["imgFile"]["error"]);
	}else{
		$name = $_POST['name'];
		$img = upload_file_by_class();
		if($img != FALSE){
			$_SESSION['success_msg'] = '上傳圖片成功';
			$_SESSION['tmp_class_name'] = $name;
			$show = FALSE;
			header('Location: letterCreate.php');
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
						<h1>新增消息</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="/service/backstage/classList.php">首頁</a></li>
						<li><a href="letterlist.php">電子報管理</a></li>
						<li class="active">新增電子報</li>
					</ol>
					<div>
						<form action="#" method="post">
							<div class="form-group">
								<label>電子報名稱</label>
								<input type="text" class="form-control" placeholder="電子報名稱" name="newsTitle" id="class_name" required>
							</div>
							<div class="form-group">
								<label>電子報分類</label>
								
							<select class="form-control" name="newsAddress" id="class_name">
								<option value="教師心得">教師心得</option>
								<option value="學生心得">學生心得</option>
								<option value="助理心得">助理心得</option>
								<option value="國際志工">國際志工</option>
								<option value="其他報導">其他報導</option>
								
							</select>
							</div>
							<div class="form-group">
								<label>作者</label>
								<input type="text" class="form-control" placeholder="作者" name="newsperson" value="" required >
							</div>
							<div class="form-group">
								<label>發布單位</label>
								<input type="text" class="form-control" placeholder="發布單位" name="newsunit" value="" required >
							</div>
							<div class="form-group">
								<label>期數</label>
								<input type="text" class="form-control" placeholder="期數" name="newsvol" value="" required >
							</div>
							<div class="form-group">
								<label>摘要</label>
								<input type="text" class="form-control" placeholder="摘要" name="newsabs" value="" required >
							</div>
							<div class="form-group">
								<label>消息內容</label>
								<textarea rows="10" class="form-control" id ="charArea" name="newscontent"></textarea>
							</div>
							<label>摘要圖片</label>
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
									<div id="addBtn" data-toggle="modal" data-target="#myModal">
										<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
									</div>
								</div>
							</div>
							
							<div>
								<button type="submit" class="btn btn-default" name="createBtn">新增</button>
								<a onclick="javascript:window.location='letterlist.php'" class="btn btn-default">取消</a>
							</div>
						</form>
					</div>
				</div>
				<!-- 彈跳視窗 -->
		<form action="#" method="post" enctype="multipart/form-data">
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
			</div>
		</div>
	</body>
	</html>
		<script type="text/javascript" src="../js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../js/tinymce/jquery.tinymce.min.js"></script>
	<script>
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
	function rechange(){
		$('#rechangeArea').toggle();
	}
	tinymce.init({
	selector: "#charArea",
	mode : "textareas",
	theme: "modern",
	plugins: [
	"advlist autolink lists link image charmap print preview hr anchor pagebreak",
	"searchreplace wordcount visualblocks visualchars code fullscreen",
	"insertdatetime media nonbreaking save table contextmenu directionality",
	"emoticons template paste textcolor colorpicker textpattern"
	],
	toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
	toolbar2: "print preview media | forecolor backcolor emoticons",
	image_advtab: true,
});
	</script>
	<?php
}
?>