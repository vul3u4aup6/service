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
          <p style="font-size:20px"><strong>大一服學課程助理。表格</strong></p><div class="clr"></div><p/>
		   <hr>
		  
		  <table class="customer_table" style="background-color:#FFD1A4;">
		  <thead>
			<th>編號</th>
			<th style="width:50%;text-align:center">名稱</th>
			<th style="width:40%;text-align:center">下載</th>
			
			</thead>
			<tbody>
			<?php 
			$i=1;
			$sql="Select * from classass ";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){?>
				<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $row['cla_title'];?></td>
				
				<td style="text-align:center"><a href="<?php echo $row['cla_pdfpath'];?>" download="<?php echo $row['cla_title'];?>_課程">Download</a></td>
				
				</tr>
				
				
				
			<?php }?>
			</tbody>
			</table>
			 <p style="text-align:right"><a href="FCTA.php">(TOP)</a></p>
				
        </div>
      </div>
      <div class="sidebar">
     
        <div class="gadget">
          <p style="font-size:28px;color:#6C6C6C">大一課程助理</p>
          <div class="clr"></div>
          <ul class="sb_menu" style="list-style:circle">
            <li><a href="FreshmanCAIntroduction.php">課程助理簡介</a></li>
            <li><a href="FCR.php">課程助理辦法</a></li>
            <li><a href="FCT.php">課程助理培訓</a></li>
            <li><a href="FCTA.php">課程助理表格</a></li>
            
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

