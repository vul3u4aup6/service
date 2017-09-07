<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>靜宜大學服務學習發展中心</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/produce.css" rel="stylesheet" type="text/css" />
<link href="css/service_style.css" rel="stylesheet" type="text/css" />
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
<!-- CuFon ends -->
</head>
<body>
<div class="main">
  <?php include_once("header.php");?>
  <div class="clr"></div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <p style="font-size:20px"><strong>相關辦法</strong></p><div class="clr"></div><p/>
		  <hr>
		  
		  <table class="customer_table" style="background-color:#FF9933;">
		  <thead>
			<th>編號</th>
			<th style="width:80%;text-align:center">章則辦法</th>
			</thead>
			<tbody>
			<?php 
			$i=1;
			$sql="Select * from method where sm_class='相關辦法'";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){?>
				<tr>
				<td><?php echo $i++;?></td>
				<td style="text-align:center"><a href="<?php echo $row['sm_pdfpath'];?>" download="<?php echo $row['sm_title'];?>"><?php echo $row['sm_title'];?></a></td>
				
				</tr>
				
				
				
			<?php }?>
			</tbody>
			</table>
			<p style="font-size:20px;margin-top:5%"><strong>教育部計畫/章則</strong></p><div class="clr"></div><p/>
			<table class="customer_table" style="background-color:#FF9933">
		  <thead>
			<th>編號</th>
			<th style="width:80%;text-align:center">計畫/章則</th>
			</thead>
			<tbody>
			<?php 
			$i=1;
			$sql="Select * from method where sm_class='教育部計畫/章則'";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){?>
				<tr>
				<td><?php echo $i++;?></td>
				<td style="text-align:center"><a href="<?php echo $row['sm_pdfpath'];?>" download="<?php echo $row['sm_title'];?>"><?php echo $row['sm_title'];?></a></td>
				
				</tr>
				
				
				
			<?php }?>
			</tbody>
			</table>
			<p style="font-size:20px;margin-top:5%"><strong>申請表格</strong></p><div class="clr"></div><p/>
			<table class="customer_table" style="background-color:#FF9933">
		  <thead>
			<th>編號</th>
			<th style="width:80%;text-align:center">申請表格</th>
			</thead>
			<tbody>
			<?php 
			$i=1;
			$sql="Select * from method where sm_class='申請表格'";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){?>
				<tr>
				<td><?php echo $i++;?></td>
				<td style="text-align:center"><a href="<?php echo $row['sm_pdfpath'];?>" download="<?php echo $row['sm_title'];?>"><?php echo $row['sm_title'];?></a></td>
				
				</tr>
				
				
				
			<?php }?>
			</tbody>
			</table>
				 <p style="text-align:right"><a href="VPM.php">(TOP)</a></p>
        </div>
      </div>
      <div class="sidebar">
     
         <div class="gadget">
          <p style="font-size:28px;color:#000000">志工靜宜</p>
          <div class="clr"></div>
          <ul class="sb_menu" style="list-style:circle">
            <li><a href="VPUS.php" style="font-size:16px">緣起</a></li>
            <li><a href="VPS.php" style="font-size:16px">特色</a></li>
            <li><a href="VPG.php" style="font-size:16px">願景</a></li>
            <li><a href="VPSB.php" style="font-size:16px">校園出版</a></li>
            <li><a href="VPM.php" style="font-size:16px">相關辦法</a></li>
            
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

