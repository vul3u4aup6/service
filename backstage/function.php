<?php
session_start();
function getDirFile($dir){
	if(is_dir($dir)){
		$items = glob($dir."*", GLOB_NOSORT);
		array_multisort(array_map('filemtime', $items), SORT_NUMERIC, SORT_DESC, $items);
	}
	return $items;
}
function getClass($conn){
	$class = array();
	$sql = 'SELECT * FROM `class`;';
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$key = 0;
		while($row = mysqli_fetch_assoc($result)) {
			$class[$key]["id"] = $row["id"];
			$class[$key]["name"] = $row["name"];
			$key++;
		}
	} else {
		echo "0 results";
	}

	return $class;
}

// 參數：預上傳位置、暫存檔案位置、該檔案名稱、該檔案副檔名
// 範例："../uploads/catalog/"、"C:\xampp\tmp\php2F91.tmp"、"abc.png"、".png"
// 流程：搬移(上傳)->改名(不規則檔名)
// 回傳：該檔案位置 或 FALSE
function upload_file($dir, $tmp_name, $name, $type){
	if(move_uploaded_file($tmp_name, iconv("UTF-8","Big5",$dir.$name))){
		$rename = md5(uniqid(rand()));
		$rename = $dir.$rename.'.'.$type;
		rename(iconv("UTF-8","Big5", $dir.$name), $rename);
		return $rename;
	}else{
		return FALSE;
	}
}
function upload_file_by_onelecture(){
	$dir = "../pdf/onelecturepdf/";
	$tmp = $_FILES["catalog"]["tmp_name"];
	$name = $_FILES["catalog"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_bill(){
	$dir = "../pdf/billboardpdf/";
	$tmp = $_FILES["catalog"]["tmp_name"];
	$name = $_FILES["catalog"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_bill1(){
	$dir = "../pdf/billboardpdf/";
	$tmp = $_FILES["catalog1"]["tmp_name"];
	$name = $_FILES["catalog1"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_bill2(){
	$dir = "../pdf/billboardpdf/";
	$tmp = $_FILES["catalog2"]["tmp_name"];
	$name = $_FILES["catalog2"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_interresultpdf(){
	$dir = "../pdf/interresultpdf/";
	$tmp = $_FILES["catalog"]["tmp_name"];
	$name = $_FILES["catalog"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_classassistant(){
	$dir = "../pdf/classassistantpdf/";
	$tmp = $_FILES["catalog"]["tmp_name"];
	$name = $_FILES["catalog"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_signup(){
	$dir = "../pdf/signuppdf/";
	$tmp = $_FILES["catalog"]["tmp_name"];
	$name = $_FILES["catalog"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_evaluation(){
	$dir = "../pdf/evaluationpdf/";
	$tmp = $_FILES["catalog"]["tmp_name"];
	$name = $_FILES["catalog"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_applytable(){
	$dir = "../pdf/applytablepdf/";
	$tmp = $_FILES["catalog"]["tmp_name"];
	$name = $_FILES["catalog"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
// 符合條件：input name要叫catalog，位置設定produce
function upload_file_by_supplemethod(){
	$dir = "../pdf/supplemethodpdf/";
	$tmp = $_FILES["catalog"]["tmp_name"];
	$name = $_FILES["catalog"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_publishtable(){
	$dir = "../pdf/publishtablepdf/";
	$tmp = $_FILES["catalog"]["tmp_name"];
	$name = $_FILES["catalog"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_catalog(){
	$dir = "../pdf/publishpdf/";
	$tmp = $_FILES["catalog"]["tmp_name"];
	$name = $_FILES["catalog"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
//符合條件 : input name 要叫 education，位置設定education
function upload_file_by_education(){
	$dir = "../pdf/sc_methodpdf/";
	$tmp = $_FILES["catalog"]["tmp_name"];
	$name = $_FILES["catalog"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
// 符合條件：input name要叫imgFile，位置設定produce
function upload_file_by_interresult(){
	$dir = "../interresultimage/";
	$tmp = $_FILES["imgFile"]["tmp_name"];
	$name = $_FILES["imgFile"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_result(){
	$dir = "../resultimage/";
	$tmp = $_FILES["imgFile"]["tmp_name"];
	$name = $_FILES["imgFile"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_img(){
	$dir = "../people/";
	$tmp = $_FILES["imgFile"]["tmp_name"];
	$name = $_FILES["imgFile"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_lecture(){
	$dir = "../lecture/";
	$tmp = $_FILES["imgFile"]["tmp_name"];
	$name = $_FILES["imgFile"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_publish(){
	$dir = "../publish/";
	$tmp = $_FILES["imgFile"]["tmp_name"];
	$name = $_FILES["imgFile"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
// 符合條件：input name要叫imgFile，位置設定produce
function upload_file_by_related(){
	$dir = "../uploads/";
	$tmp = $_FILES["imgFile"]["tmp_name"];
	$name = $_FILES["imgFile"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
// 符合條件：input name要叫imgFile，位置設定class
function upload_file_by_class(){
	$dir = "../letter/";
	$tmp = $_FILES["imgFile"]["tmp_name"];
	$name = $_FILES["imgFile"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_list(){
	$dir = "../uploads/";
	$tmp = $_FILES["imgFile"]["tmp_name"];
	$name = $_FILES["imgFile"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_relation(){
	$dir = "../relationimage/";
	$tmp = $_FILES["imgFile"]["tmp_name"];
	$name = $_FILES["imgFile"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_discussion(){
	$dir = "../discussion/";
	$tmp = $_FILES["imgFile"]["tmp_name"];
	$name = $_FILES["imgFile"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}
function upload_file_by_sr(){
	$dir = "../service_result_image/";
	$tmp = $_FILES["imgFile"]["tmp_name"];
	$name = $_FILES["imgFile"]["name"];
	$type = end(explode('.', $name));
	return upload_file($dir, $tmp, $name, $type);
}

// 紀錄上傳檔案錯誤清單
function upload_error_list($error){
	$str = '';
	switch ($error) {
		case 1:
		$str = '超過 php.ini 指定的檔案大小';
		break;
		case 2:
		$str = '超過 MAX_FILE_SIZE 指定的大小';
		break;
		case 3:
		$str = '只上傳了一部分';
		break;
		case 4:
		$str = '沒有東西被上傳';
		break;
		case 5:
		$str = '上傳大小為 0 bit';
		break;
		default:
		$str = '上傳檔案異常錯誤';
		break;
	}
	return $str.'，請洽管理員，謝謝。';
}

// 撈該產品的資料
function get_produce($id, $conn){
	$sql = 'SELECT * FROM produce WHERE `id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);

	$query = array();
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$query['name'] = $row["name"];
			$query['img'] = $row["img"];
			$query['catalog'] = $row["catalog"];
			$query['catalog_name'] = $row["catalog_name"];
			$query['class_id'] = $row["class_id"];
			$query['introduction'] = $row['introduction'];
			$query['characteristic'] = $row['characteristic'];
		}
	}
	return $query;
}

function get_related($id, $conn){
	$sql = 'SELECT * FROM related WHERE `id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);

	$query = array();
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$query['name'] = $row["name"];
			$query['img'] = $row["img"];
			$query['id'] = $row["id"];
			$query['website'] = $row["website"];
		}
	}
	return $query;
}

// 取得一次性session
function get_flash($tag){
	if (isset($_SESSION[$tag])) {
		$msg = $_SESSION[$tag];
		unset($_SESSION[$tag]);
		return $msg;
	}else{
		return FALSE;
	}
}
?>