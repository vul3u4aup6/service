<!DOCTYPE html>
<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
$error = array();
$dir = "../people/";
$imgArray = getDirFile($dir);

if (isset($_POST['createBtn'])) {
	if(isset($_POST['optionsRadios'])) {
		if($_POST['className'] != '' && $_POST['optionsRadios'] != ''){
			$name = $_POST['className'];
			$position = $_POST['classposition'];
			$ext = $_POST['classext'];
			$mail = $_POST['classmail'];
			$content = $_POST['classcontent'];
			$optionsRadios = $_POST['optionsRadios'];
			$level=$_POST['classNumber'];
			$sql = 'INSERT INTO member(m_name,m_position,m_ext,m_email,m_content, m_photo) VALUES ("'.$name.'","'.$position.'","'.$ext.'","'.$mail.'","'.$content.'", "'.$optionsRadios.'")';
			$result = mysqli_query($conn, $sql);
			$show = FALSE;
			header('Location: memberList.php');
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
		$img = upload_file_by_img();
		if($img != FALSE){
			$_SESSION['success_msg'] = '上傳圖片成功';
			$_SESSION['tmp_class_name'] = $name;
			$show = FALSE;
			header('Location: memberCreate.php');
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
						<h1>新增成員</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="/service/backstage/classList.php">首頁</a></li>
						<li><a href="memberlist.php">成員管理</a></li>
						<li class="active">新增成員</li>
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
								<label>姓名</label>
								<input type="text" class="form-control" placeholder="姓名" name="className" id="class_name" value="<?=(isset($_SESSION['tmp_class_name']))?$_SESSION['tmp_class_name']:''?>" required>
							</div>
							<div class="form-group">
								<label>職稱</label>
								<input type="text" class="form-control" placeholder="職稱" name="classposition" id="class_name" value="<?=(isset($_SESSION['tmp_class_name']))?$_SESSION['tmp_class_name']:''?>" required>
							</div>
							<div class="form-group">
								<label>分機號碼</label>
								<input type="text" class="form-control" placeholder="分機號碼" name="classext" id="class_name" value="<?=(isset($_SESSION['tmp_class_name']))?$_SESSION['tmp_class_name']:''?>" required>
							</div>
							<div class="form-group">
								<label>信箱</label>
								<input type="text" class="form-control" placeholder="信箱" name="classmail" id="class_name" value="<?=(isset($_SESSION['tmp_class_name']))?$_SESSION['tmp_class_name']:''?>" required>
							</div>
							<div class="form-group">
								<label>職掌</label>
								<textarea rows="10" class="form-control" id ="charArea" name="classcontent"></textarea>
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
								<a onclick="javascript:window.location='memberlist.php'" class="btn btn-default">取消</a>
							</div>
						</form>
					</div>
				</div>
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
	</body>
	<script type="text/javascript" src="../js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../js/tinymce/jquery.tinymce.min.js"></script>

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
	tinymce.init({
	selector: "#charArea",
	mode : "textareas",
	theme: "modern",
	 valid_elements : '*[*]',
    extended_valid_elements : '*[*]',
    entity_encoding : "raw",
    force_br_newlines : false,
    force_p_newlines : false,
    forced_root_block : '',
    paste_word_valid_elements: "b,strong,i,em,h1,h2,u,p,ol,ul,li,a[href],span,color,font-size,font-color,font-family,mark",
    paste_retain_style_properties: "all",
    codemirror: {
        indentOnInit: true, // Whether or not to indent code on init.
        fullscreen: true,   // Default setting is false
        path: 'CodeMirror', // Path to CodeMirror distribution
        config: {           // CodeMirror config object
            mode: 'application/x-httpd-php',
            lineNumbers: true,
            indentUnit: 4,
            //匹配括号
            matchBrackets: true,
            //匹配标签
            matchTags: { bothTags: true },
            indentWithTabs: false,
            foldGutter: true,
            gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
            extraKeys: {"Ctrl-Q": function(cm){ cm.foldCode(cm.getCursor()); }}
        },
		 saveCursorPosition: true,
		 init_instance_callback : function(editor) {
        // jw: this code is heavily borrowed from tinymce.jquery.js:12231 but modified so that it will
        //     just remove the escaping and not add it back.
        editor.serializer.addNodeFilter('script,style', function(nodes, name) {
            var i = nodes.length, node, value, type;
 
            function trim(value) {
                /*jshint maxlen:255 */
                /*eslint max-len:0 */
                return value.replace(/(<!--\[CDATA\[|\]\]-->)/g, '\n')
                    .replace(/^[\r\n]*|[\r\n]*$/g, '')
                    .replace(/^\s*((<!--)?(\s*\/\/)?\s*<!\[CDATA\[|(<!--\s*)?\/\*\s*<!\[CDATA\[\s*\*\/|(\/\/)?\s*<!--|\/\*\s*<!--\s*\*\/)\s*[\r\n]*/gi, '\n')
                    .replace(/\s*(\/\*\s*\]\]>\s*\*\/(-->)?|\s*\/\/\s*\]\]>(-->)?|\/\/\s*(-->)?|\]\]>|\/\*\s*-->\s*\*\/|\s*-->\s*)\s*$/g, '\n');
            }
            while (i--) {
                node = nodes[i];
                value = node.firstChild ? node.firstChild.value : '';
 
                if (value.length > 0) {
                    node.firstChild.value = trim(value);
                }
            }
        });
		 }
    },
    setup: function (editor) {
        editor.on('change', function () {
            tinymce.triggerSave();
        });
    },
	plugins: [
	"advlist autolink lists link image charmap print preview hr anchor pagebreak",
	"searchreplace wordcount visualblocks visualchars code fullscreen",
	"insertdatetime media nonbreaking save table contextmenu directionality",
	"emoticons template paste textcolor colorpicker textpattern"
	],
	toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
	toolbar2: "print preview media | forecolor backcolor emoticons",
	image_advtab: true,
	 paste_data_images: true
});
	</script>
	</html>
	<?php
}
?>