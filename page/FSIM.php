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
        <div class="article" style="width:700px">
          <p style="font-size:20px"><strong>課程補充資料</strong></p><div class="clr"></div><p/>
		  <hr>
		 
		   <p style="font-size:16px"><strong>1.服務學習手冊</strong></p><div class="clr"></div><p/>
		  <table class="customer_table" style="background-color:#FF9933;">
		  <thead>
			<th>編號</th>
			<th style="width:40%">名稱</th>
			<th style="width:40%">下載</th>
			
			</thead>
			<tbody>
			<?php 
			$i=1;
			$sql="Select * from supplemethod where su_class='服務學習手冊' order by su_id DESC";
			$result=mysqli_query($conn,$sql);
			$data_nums = mysqli_num_rows($result);
			$per = 6;
			$pages = ceil($data_nums/$per);
			if (!isset($_GET["page"])){ 
				$page=1;
			} else {  
				$page = intval($_GET["page"]);
			}
			$start = ($page-1)*$per;
			$result = mysqli_query($conn, $sql.' LIMIT '.$start.', '.$per) or die("Error");  
			while($row=mysqli_fetch_assoc($result)){?>
				<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $row['su_title'];?></td>
				
				<td><a href="<?php echo $row['su_pdfpath'];?>" download="<?php echo $row['su_title'];?>">Download</a></td>
				
				</tr>
				
				
				
			<?php }?>
			<tr>
			<td>更多檔案</td>
			<td style="text-align:center">-----------------＞</td>
			<td><a href="FSIM_detail.php?class=服務學習手冊">More</a></td>
			</tr>
			</tbody>
			</table>
			<p style="font-size:16px;margin-top:5%"><strong>2.教學資源檔案</strong></p><div class="clr"></div><p/>
			<table class="customer_table" style="background-color:#FF9933">
		  <thead>
			<th>編號</th>
			<th style="width:40%">名稱</th>
			<th style="width:40%">下載</th>
			
			</thead>
			<tbody>
			<?php 
			$i=1;
			$sql="Select * from supplemethod where su_class='教學資源檔案' order by su_id DESC";
			$result=mysqli_query($conn,$sql);
			$data_nums = mysqli_num_rows($result);
			$per = 6;
			$pages = ceil($data_nums/$per);
			if (!isset($_GET["page"])){ 
				$page=1;
			} else {  
				$page = intval($_GET["page"]);
			}			
			$start = ($page-1)*$per;
			$result = mysqli_query($conn, $sql.' LIMIT '.$start.', '.$per) or die("Error");  
			
			while($row=mysqli_fetch_assoc($result)){?>
				<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $row['su_title'];?></td>
				
				<td><a href="<?php echo $row['su_pdfpath'];?>" download="<?php echo $row['su_title'];?>">Download</a></td>
				
				</tr>
				
				
				
			<?php }?>
			<tr>
			<td>更多檔案</td>
			<td style="text-align:center">-----------------＞</td>
			<td><a href="FSIM_detail.php?class=教學資源檔案">More</a></td>
			</tr>
			</tbody>
			</table>
			<p style="font-size:16px;margin-top:5%"><strong>3.心靈小品</strong></p><div class="clr"></div><p/>
			<table class="customer_table" style="background-color:#FF9933">
		  <thead>
			<th>編號</th>
			<th style="width:40%">名稱</th>
			<th style="width:40%">下載</th>
			
			</thead>
			<tbody>
			<?php 
			$i=1;
			$sql="Select * from supplemethod where su_class='心靈小品' order by su_id DESC";
			$result=mysqli_query($conn,$sql);
			$data_nums = mysqli_num_rows($result);
			$per = 6;
			$pages = ceil($data_nums/$per);
			if (!isset($_GET["page"])){ 
				$page=1;
			} else {  
				$page = intval($_GET["page"]);
			}
			$start = ($page-1)*$per;
			$result = mysqli_query($conn, $sql.' LIMIT '.$start.', '.$per) or die("Error");  
			
			while($row=mysqli_fetch_assoc($result)){?>
				<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $row['su_title'];?></td>
				
				<td><a href="<?php echo $row['su_pdfpath'];?>" download="<?php echo $row['su_title'];?>">Download</a></td>
				
				</tr>
				
				
				
			<?php }?>
			<tr>
			<td>更多檔案</td>
			<td style="text-align:center">-----------------＞</td>
			<td><a href="FSIM_detail.php?class=心靈小品">More</a></td>
			</tr>
			</tbody>
			</table>
			<p style="font-size:16px;margin-top:5%"><strong>4.課程影片</strong></p><div class="clr"></div><p/>
			<table class="customer_table" style="background-color:#FF9933">
		  <thead>
			<th>編號</th>
			<th style="width:80%;text-align:center">名稱</th>
			
			
			</thead>
			<tbody>
			<?php 
			$i=1;
			$sql="Select * from supplemethod where su_class='課程影片' order by su_id DESC";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){?>
				<tr>
				<td><?php echo $i++;?></td>

				<td style="text-align:center"><a href="<?php echo $row['su_link'];?>" target="_blank" ><?php echo $row['su_title'];?></a></td>
				
				</tr>
				
				
				
			<?php }?>
			<tr>
			<td>更多檔案</td>
			
			<td style="text-align:center"><a href="FSIM_detail.php?class=課程影片" >More</a></td>
			</tr>
			</tbody>
			</table>
				 <p style="text-align:right"><a href="FSIM.php">(TOP)</a></p>
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

