<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>靜宜大學服務學習發展中心</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/produce.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/responsiveslides.css" />
<link href="css/zerogrid.css" rel="stylesheet" type="text/css" />
<link href="images/favicon.ico" rel="Shortcut Icon" type="image/x-icon">
<script type="text/javascript" src="js/cufon-yui.js"></script>
<!--<script type="text/javascript" src="js/arial.js"></script>-->
<script type="text/javascript" src="js/cuf_run.js"></script>
<script src="http://cdn.staticfile.org/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/scroll.js"></script>
	<script src="js/responsiveslides.js"></script>
	<script src="lib/slick/slick.js"></script>
	<link rel="stylesheet" href="lib/slick/slick.css">
	<link rel="stylesheet" href="lib/slick/slick-theme.css">
<script>
$(function(){
    $('.myscroll').myScroll({
        speed: 40, //数值越大，速度越慢
        rowHeight: 26 //li的高度
    });
});

</script>

<!-- CuFon ends -->
</head>
<body>
<div class="main" style="background: url(images/main_bg1.png) top repeat-x;">
  <?php include_once("header.php");
  include_once("database.php");?>
  <style>
h1{
	width:100%;
	font-size:24px;
}

h2{
	width:100;
	font-size:20px;
	border-left:none;
	margin:0px;
	padding:0px;
}

</style>
  <div class="clr"></div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar" >
        <div class="article" style="margin-left:1%;width:720px">
         <p style="font-size:20px"><strong>公告內容</strong></p><div class="clr"></div><p/>
		   <hr>
		   <br>
          <table style="width:100%;border:1px solid black;">
		  <thead style="background-color:	#BBFFBB;text-align:center;font-size:20px">
		  <th></th>
		  </thead>
		  <tbody style="font-size:16px">
		  <?php
		  $id=$_GET['id'];
			
		  $sql="Select * from billboard WHERE b_id='$id'";
			$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_array($result);
					?>
					<tr>
					<td ><p style="text-align:center;font-size:28px"><?php echo $row[1];?></p><p style="text-align:right">公告日期：<?php echo $row[7]?></p><br><hr></td>
					</tr>
					<tr>
					<td>活動起迄時間：<?php echo $row[9];?>至<?php echo $row[10];?></td>
					</tr>
					<tr>
					<td>活動地點：<?php echo $row[3];?></td>
					</tr>
					<tr>
					<td>公告類別：<?php echo $row[2];?></td>
					</tr>
					<tr>
					<td>公告單位：<?php echo $row[4];?></td>
					</tr>
					<tr>
					<td>公告者：<?php echo $row[5];?></td>
					</tr>
					<tr>
					<td>連絡電話：<?php echo $row[6];?><br>
					<hr></td>
					
					</tr>
					
					<tr>
					<td><br><?php echo $row[8];?></td>
					
					
					</tr>
					<?php if($row[11]!=''){?>
					<tr>
					
					<td><br>檔案：<a href="<?php echo $row[11];?>">下載</a>
					</td>
					</tr>
					<?php } ?>
					<?php if($row[12]!=''){?>
					<tr>
					
					<td><br>檔案：<a href="<?php echo $row[12];?>">下載</a>
					</td>
					</tr>
					<?php } ?>
					<?php if($row[13]!=''){?>
					<tr>
					
					<td><br>檔案：<a href="<?php echo $row[13];?>">下載</a>
					</td>
					</tr>
					<?php } ?>
					
		  </tbody>
		  </table>
          
        </div>
        
      </div>
      <div class="sidebar">
     
      <!--  <div class="gadget">
          <p style="font-size:28px;color:#6C6C6C">重要訊息</p>
          <div class="myscroll" style="width:250px">
          <ul>
		  <li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a  style="font-size:20px">承蒙各校對本校服務學習課程教材之肯定與支持，為尊重本校服務學習課程之著作權益，敬請欲援用部分文章之單位，遵守智慧財產權之規定，應徵詢著作財產人同意或授權，並註明出處來源，始得合法使用轉載。靜宜大學服務學習發展中心感謝您的配合！</a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>		
		</ul>
		  </div>
        </div>-->
        <div class="gadget">
          <p style="font-size:20px;color:#000000"><strong>熱門連結</strong></p>
          <div class="clr"></div>
          <ul class="ex_menu">
            <?php $sql="Select * from relation";
		  $result=mysqli_query($conn,$sql);
		  while($row=mysqli_fetch_assoc($result)){?>
            <li><a href="<?php echo $row['rel_link'];?>"><img src="<?php echo $row['rel_image'];?>" style="width:300px"></a></li>
          <?php }?>
          </ul>
        </div>
        
             </div> 
      <div class="clr"></div>
    </div>
  </div>
  <?php include_once("footer.php");?>
</div>
</body>
</html>


