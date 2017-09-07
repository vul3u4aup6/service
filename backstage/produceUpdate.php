<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
$classDate = getClass($conn);
// 進入修改頁面，先撈該筆資料
if (isset($_POST['updateBtn'])) {
	$id = $_POST['id'];
	$produce_data = get_produce($id, $conn);
	$name = $produce_data["name"];
	$class_id = $produce_data["class_id"];
	$introduction = $produce_data['introduction'];
	$characteristic = $produce_data['characteristic'];
}
// 確定修改後，進行資料庫更新
if(isset($_POST['saveBtn'])){
		// 表單驗證
	$formError = 0;
	if($_POST['class_id'] != ''){
		$class_id = $_POST['class_id'];
	}else{
		$error[] = '產品分類必須選擇';
		$formError++;
	}

	if($_POST['name'] != ''){
		$name = $_POST['name'];
	}else{
		$error[] = '產品名稱必須填值';
		$formError++;
	}

	if($_POST['introduction'] != ''){
		$introduction = $_POST['introduction'];
	}else{
		$error[] = '產品簡介必須填值';
		$formError++;
	}

	if($_POST['characteristic'] != ''){
		$characteristic = $_POST['characteristic'];
	}else{
		$error[] = '產品特徵必須填值';
		$formError++;
	}

	if($formError == 0){
		$id = $_POST['id'];

		$sql = 'UPDATE produce SET `class_id` = "'.$class_id.'", ';
		$sql .= '`name` = "'.$name.'", ';
		$sql .= '`characteristic` = "'.mysqli_real_escape_string($conn,$characteristic).'", ';
		$sql .= '`introduction` = "'.$introduction.'" WHERE `id` = "'.$id.'"';

		$result = mysqli_query($conn, $sql);
		$conn->close();
		$success = '修改內文成功';		
	}
}

if($show){
	?>
	<html ng-app="pimsApp">
	<head>
		<title>後臺管理</title>
		<meta charset="UTF-8">
	</head>
	<body ng-controller="MainCtrl as ctrl">
		<?php include("header.php");?>
		<div class="container-fluid" style="margin-top:70px;">
			<div class="row">
				<?php include("sideNav.php");?>
				<div class="col-md-9">
					<h1>修改產品</h1>
					<ol class="breadcrumb">
						<li><a href="../index.html">首頁</a></li>
						<li><a href="produceList.php">產品管理</a></li>
						<li class="active">修改產品</li>
					</ol>
					<div>
						<?php
						if (!empty($error)) {
							foreach ($error as $key => $value) {
								echo '<div class="alert-danger alert alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$value.'</div>';
							}
						}
						if(isset($success)){
							echo '<div class="alert-success alert alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$success.'</div>';
						}
						?>
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?=$id?>" name="id">
							<div class="form-group">
								<label>產品分類</label>
								<select class="form-control" name="class_id" id="class_id">
									<?php
									$key = 0;
									foreach ($classDate as $key => $value) {
										?>
										<option value="<?=$value['id']?>" 
											<?php
											if(isset($class_id) && $class_id == $value['id'])
												echo'selected';
											?>
											>
											<?=$value['name']?>
										</option>
										<?php
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>分類名稱</label>
								<input type="text" class="form-control" placeholder="分類名稱" name="name" value="<?=$name?>" required>

							</div>
							<div class="form-group">
								<label>產品簡介</label>
								<textarea class="form-control" id="introduction" name="introduction"><?=(isset($introduction))?$introduction:''?></textarea>
							</div>
							<div class="form-group">
								<label>產品特徵</label>
								<textarea rows="10" class="form-control" id ="charArea" name="characteristic"><?=(isset($characteristic))?$characteristic:''?></textarea>
							</div>
						</div>			
						<div>
							<button type="submit" class="btn btn-default" name="saveBtn">Submit</button>
							<a onclick="javascript:window.location='produceList.php'" class="btn btn-default">取消</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript" src="../js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../js/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript">
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