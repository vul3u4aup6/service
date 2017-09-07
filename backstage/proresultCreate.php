<!DOCTYPE html>
<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
$error = array();

if (isset($_POST['createBtn'])) {
	
	if($_POST['year'] != ''||$_POST['class'] != ''||$_POST['name'] != '' ){
		$year = $_POST['year'];
		$college = $_POST['college'];
		$system = $_POST['system'];
		$class = $_POST['class'];
		$name = $_POST['name'];
		
		
		
		$sql = 'INSERT INTO proresult(pr_college, pr_system,pr_class,pr_name,pr_year) VALUES ("'.$college.'", "'.$system.'", "'.$class.'","'.$name.'", "'.$year.'")';
		$result = mysqli_query($conn, $sql);
		$show = FALSE;
		$_SESSION['success_msg'] = '新增成功';
		header('Location: proresult.php');
		exit;
		
	
	}else{
		$error[] = '請先新增代表圖片';
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
						<h1>新增專業服務成果</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="/service/backstage/classList.php">首頁</a></li>
						<li><a href="proresult.php">專業服務成果</a></li>
						<li class="active">新增專業服務成果</li>
					</ol>
					<div>
						<form action="#" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>學年</label>
								<input type="text" class="form-control" placeholder="學年" name="year" id="class_name" required>
							</div>
							
							<div class="form-group">
								<label>院別</label>
								
							<select class="form-control" name="college" id="college" >
								<option value="外語學院" >外語學院</option>
								<option value="管理學院">管理學院</option>
								<option value="理學院">理學院</option>
								<option value="人文暨社會科學院">人文暨社會科學院</option>
								<option value="資訊學院">資訊學院</option>
								<option value="國際學院">國際學院</option>
								
							</select>
							</div>
							<div class="form-group">
								<label>系所名稱</label>
								<select class="form-control" name="system" id="system" >
									<option value="外語學院" >外語學院</option>
									<option value="日本語文學系" >日本語文學系</option>
									<option value="西班牙語文學系">西班牙語文學系</option>
									<option value="英國語文學系">英國語文學系</option>
									
									
								</select>
							</div>
							<div class="form-group">
								<label>課程名稱</label>
								<input type="text" class="form-control" placeholder="課程名稱" name="class" value="" required >
							</div>
							<div class="form-group">
								<label>教師名稱</label>
								<input type="text" class="form-control" placeholder="教師名稱" name="name" value="" required >
							</div>
							
							
							
							
							<div>
								<button type="submit" class="btn btn-default" name="createBtn">新增</button>
								<a onclick="javascript:window.location='proresult.php'" class="btn btn-default">取消</a>
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
	$('select[name="college"]').change( function(){
		
		$.ajax({
			type:"POST",
			data:{token:'college',college:$(this).val()},
			url:'college.php',
			dateType:"json",
			async:true,
			error:function(){
			alert("AJAX ERROR!!!");
			},
			success:function(val){
																											
				if(val=='["error"]'){
						alert("無資料，資料無法顯示");																							
				}else{
				//alert(val);
				var dataString='';
				
				var parsedJson = jQuery.parseJSON(val);
				for(var i=0;i<parsedJson.length;i++){
					dataString+='<option value="'+parsedJson[i].system+'" >'+parsedJson[i].system+'</option>';
				}
				$('#system').html(dataString);
				}
			}
		});
	});
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