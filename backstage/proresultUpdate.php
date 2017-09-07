<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
if (isset($_POST['updateBtn'])) {
	$id = $_POST['id'];
	// 撈該筆資料
	$sql = 'SELECT * FROM proresult WHERE `pr_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$id=$row["pr_id"];
			$college = $row["pr_college"];
			$system = $row["pr_system"];
			$class = $row["pr_class"];
			$name=$row["pr_name"];
			$year=$row["pr_year"];
			
			
			
		}
	}
}

if(isset($_POST['saveBtn'])){
	$id=$_POST['id'];
	$year = $_POST['year'];
	$college = $_POST['college'];
	$system = $_POST['system'];
	$class = $_POST['class'];
	$name = $_POST['name'];
	
	
			$sql = 'UPDATE proresult SET `pr_college` = "'.$college.'", `pr_system` = "'.$system.'", `pr_class` = "'.$class.'",`pr_name` = "'.$name.'",`pr_year` = "'.$year.'" WHERE `pr_id` = "'.$id.'"';
			$result = mysqli_query($conn, $sql);
		
		
	
	$conn->close();
	$show = FALSE;
	header('Location: proresult.php');
	exit;
}
if($show){
	?>
	<html ng-app="pimsApp">
	<head>
	<title>PUSLC後臺管理</title>
	<meta charset="UTF-8">
	<link href="images/favicon.ico" rel="Shortcut Icon" type="image/x-icon">
	</head>
	<body ng-controller="MainCtrl as ctrl">
		<?php include("header.php");?>
		<div class="container-fluid" style="margin-top:70px;">
			<div class="row">
				<?php include("sideNav.php");?>
				<div class="col-md-9">
					<div class="option">
						<h1>修改專業服務成果</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="classList.php">首頁</a></li>
						<li><a href="proresult.php">專業服務成果</a></li>
						<li class="active">修改專業服務成果</li>
					</ol>
					<div>
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?=$id?>" name="id">
							<div class="form-group">
								<label>學年</label>
								<input type="text" class="form-control" placeholder="學年" name="year" value="<?=$year?>" required >
							</div>
							
							
							<div class="form-group">
								<label>院別</label>
								<select class="form-control" name="college" id="college">
								<option selectes hidden value="<?=$college?>"><?php echo $college; ?></option>
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
								<select class="form-control" name="system" id="system">
							</select>
							</div>
							
							<div class="form-group">
								<label>課程名稱</label>
								<input type="text" class="form-control" placeholder="課程名稱" name="class" value="<?=$class?>" id="class" required >
							</div>
							<div class="form-group">
								<label>教師名稱</label>
								<input type="text" class="form-control" placeholder="教師名稱" name="name" value="<?=$name?>" required >
							</div>
						
							<div>
								<button type="submit" class="btn btn-default" name="saveBtn">修改</button>
								<a onclick="javascript:window.location='proresult.php'" class="btn btn-default">取消</a>

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
	$( document ).ready(function() {
		
	$.ajax({
			type:"POST",
			data:{token:'system',college:$('#class').val()},
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
				dataString+='<option value="'+parsedJson[0].system1+'" >'+parsedJson[0].system1+'</option>';
				for(var i=0;i<parsedJson.length;i++){
					dataString+='<option value="'+parsedJson[i].system+'" >'+parsedJson[i].system+'</option>';
				}
				$('#system').html(dataString);
				}
			}
		});
	});
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