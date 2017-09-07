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
          <p style="font-size:20px"><strong>機構簡介</strong></p><div class="clr"></div><p/>
		  <hr>
		  <table class="customer_table" style="background-color:#C7C7E2;">
		  <thead>
		  <th></th>
		  <thead>
			<tbody>
			<?php 
			$id=$_GET['id'];
			$sql="Select * from cooperation where cp_id='$id'";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){?>
				<tr>
				
				<td>機構編號：<?php echo $row['cp_number'];?></a></td>
				
				</tr>
				<tr>
				
				<td>機構名稱：<?php echo $row['cp_title'];?></a></td>
				
				</tr>
				<tr>
				
				<td>機構地址：<?php echo $row['cp_address'];?></a></td>
				
				</tr>
				<tr>
				
				<td>承辦人電話：<?php echo $row['cp_phone'];?></a></td>
				
				</tr>
				<tr>
				
				<td>交通指引：<?php echo $row['cp_content'];?></a></td>
				
				</tr>
				
			<?php }?>
			</tbody>
			</table>
				
        </div>
      </div>
      <div class="sidebar">
     
          <div class="gadget">
          <p style="font-size:28px;color:#6C6C6C">合作機構</p>
          <div class="clr"></div>
          <ul class="sb_menu" style="list-style:circle">
            <li><a href="CLI.php">機構簡介</a></li>
            <li><a href="CLD.php">機構座談</a></li>
            <li><a href="http://www.service-learning.pu.edu.tw:8080/Volunteer/login.jsp">機構專區</a></li>
            
            
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

