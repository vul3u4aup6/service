<!DOCTYPE html>
<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
$error = array();
$dir = "../interresultimage/";
$imgArray = getDirFile($dir);
if (isset($_POST['createBtn'])) {
	if(isset($_POST['optionsRadios'])) {
	if($_POST['title'] != '' && $_POST['time'] != ''&& $_POST['member'] != ''){
		$title = $_POST['title'];
		$time = $_POST['time'];
		$member = $_POST['member'];
		$link = $_POST['link'];
		
		
		$optionsRadios = $_POST['optionsRadios'];
		if ($_FILES["catalog"]["error"] > 0){
		$sql = 'INSERT INTO interresult(ir_title, ir_time,ir_member,ir_image,ir_link) VALUES ("'.$title.'", "'.$time.'", "'.$member.'", "'.$optionsRadios.'", "'.$link.'")';
		$result = mysqli_query($conn, $sql);
		$show = FALSE;
		$_SESSION['success_msg'] = '新增成功';
		header('Location: interresult.php');
		exit;
	}else{
		$date = date("Y-m-d");
		$name1 = $_FILES["catalog"]["name"];
		$pdf = upload_file_by_interresultpdf();
		if($pdf != FALSE){
		$sql = 'INSERT INTO interresult(ir_title, ir_time,ir_member,ir_pdfpath,ir_image,ir_link) VALUES ("'.$title.'", "'.$time.'", "'.$member.'","'.$pdf.'", "'.$optionsRadios.'", "'.$link.'")';
		$result = mysqli_query($conn, $sql);
		$show = FALSE;
		$_SESSION['success_msg'] = '新增成功';
		header('Location: interresult.php');
		exit;
		}
	}
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
		$img = upload_file_by_interresult();
		if($img != FALSE){
			$_SESSION['success_msg'] = '上傳圖片成功';
			$_SESSION['tmp_class_name'] = $name;
			$show = FALSE;
			header('Location: interresultCreate.php');
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
						<h1>新增成果</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="/service/backstage/classList.php">首頁</a></li>
						<li><a href="interresult.php">國際志工成果</a></li>
						<li class="active">新增成果</li>
					</ol>
					<div>
						<form action="#" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>成果標題</label>
								<input type="text" class="form-control" placeholder="成果標題" name="title" id="class_name" required>
							</div>
							
							<div class="form-group">
								<label>服務期間</label>
								<input type="text" class="form-control" placeholder="服務期間" name="time" value="" required >
							</div>
							<div class="form-group">
								<label>參與成員</label>
								<input type="text" class="form-control" placeholder="參與成員" name="member" value="" required >
							</div>
							<div class="form-group">
								<label>影片網址</label>
								<input type="text" class="form-control" placeholder="影片網址" name="link" value="" required >
							</div>
							<div class="form-group">
							<label>檔案上傳</label>
							<input type="file" name="catalog" id="imgInp">
							<input type="hidden" name="caname" id="tmp_name">
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
									<div id="addBtn" data-toggle="modal" data-target="#myModal">
										<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
									</div>
								</div>
							</div>
							
							<div>
								<button type="submit" class="btn btn-default" name="createBtn">新增</button>
								<a onclick="javascript:window.location='interresult.php'" class="btn btn-default">取消</a>
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