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
  <?php include_once("header.php");
  include_once("../database.php");?>
  <div class="clr"></div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article" style="width:700px">
          <p style="font-size:20px"><strong>課程。行事曆</strong></p><div class="clr"></div><p/>
		  <hr>
		  <?php $sql="Select * from calendar_introduction";
		  $result=mysqli_query($conn,$sql);
		  $row=mysqli_fetch_assoc($result);?>
		   <p style="font-size:16px"><strong><?php echo $row['ci_title'];?></strong></p><div class="clr"></div><p/>
		  <table class="customer_table" style="background-color:#97CBFF;">
		  <thead>
			<th>日期</th>
			<th>時間</th>
			<th style="width:390px">內容</th>
			
			</thead>
			<tbody>
			<?php 
			$i=1;
			$sql="Select * from calendar";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){?>
				<tr>
				<td><?php echo $row['cal_date'];?></td>
				<td><?php echo $row['cal_time'];?></td>
				<td><?php echo $row['cal_content'];?></td>
				
				</tr>
				
				
				
			<?php }?>
			</tbody>
			</table>
			 <p style="text-align:right"><a href="FSCU.php">(TOP)</a></p>
				
        </div>
      </div>
      <div class="sidebar">
     
         <div class="gadget">
          <p style="font-size:28px;color:#6C6C6C">大一服學</p>
          <div class="clr"></div>
          <ul class="sb_menu" style="list-style:circle">
            <li style="font-size:16px"><a href="FSLS.php">緣起</a></li>
            <li style="font-size:16px"><a href="FSR.php">服學辦法</a></li>
			
            <li style="font-size:16px"><a href="FSS.php">特色</a></li>
            <li style="font-size:16px"><a href="FSTC.php">師資陣容</a></li>
            <li ><a href="#" style="font-size:16px">課程</a>
				<ul >
					<li><a href="FCCI.php">簡介</a></li>
					<li><a href="FSCU.php">行事曆</a></li>
					<li><a href="FCCA.php">社區服務申請流程</a></li>
					<li><a href="FCCS.php">特殊申請流程</a></li>
					<li><a href="FCCT.php">時數不足處理方法</a></li>
					<li><a href="FCCSG.php">課程各階段說明</a></li>
				</ul>
			</li>
            <li ><a href="#" style="font-size:16px">基礎訓練講座</a>
			<ul>
					<li><a href="FCCR.php">相關規定</a></li>
					<li><a href="FCCP.php">補課流程</a></li>
					<li><a href="FCCL.php">講座場次</a></li>
					
				</ul>
			</li>
			<li style="font-size:16px"><a href="http://www.service-learning.pu.edu.tw:8080/Volunteer/">大一服務學習機構選填系統</a></li>
			<li style="font-size:16px"><a href="FST.php">課程相關表格</a></li>
			<li style="font-size:16px"><a href="FSIM.php">課程補充資料</a></li>
			
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

