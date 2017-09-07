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
<!-- CuFon ends -->
</head>
<style>
table {
    border-collapse: collapse;
	width:700px;
}

table, td, th,tr,tbody {
    border: 1px solid black;
	vertical-align:middle;

}
</style>
<body>
<div class="main">
  <?php include_once("header.php");?>
  <?php include_once("database.php");?>
  
  <div class="clr"></div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article" style="width:700px">
          <p style="font-size:20px"><strong>服務成果。歷年課程</strong></p><div class="clr"></div><p/>
           <hr>
		   <table >
		   <thead style="background-color:red;text-align:center">
		   <th style="padding:20px;text-align:center">學年</th>
			<th style="text-align:center">院別</th>
			<th style="text-align:center">系所名稱</th>
			<th style="text-align:center">系教師人數</th>
			<th style="text-align:center">課程名稱</th>
			<th style="text-align:center">教師名稱</th>
			
		   </thead>
			<tbody >
			
			<?php
			
			$sql7="Select DISTINCT(pr_year) from proresult order by pr_year DESC";
		   $result7=mysqli_query($conn,$sql7);
		   while($row7=mysqli_fetch_assoc($result7)){?>
		   <tr >
		   <?php
			   
			 $sql8="Select COUNT(*) from proresult where pr_year='$row7[pr_year]'";
			$result8=mysqli_query($conn,$sql8);
			$row8=mysqli_fetch_assoc($result8);?>
			
			<td rowspan="<?php echo $row8['COUNT(*)'];?>" style="border: 1px solid black;"><?php echo $row7['pr_year'];?></td>
			<?php 
			$sql5="Select DISTINCT(pr_college) from proresult where pr_year='$row7[pr_year]'";
			$result5=mysqli_query($conn,$sql5);
			while($row5=mysqli_fetch_assoc($result5)){
			$sql="Select COUNT(pr_college) from proresult where pr_college='$row5[pr_college]' and pr_year='$row7[pr_year]'";
		   $result=mysqli_query($conn,$sql);
		   $row=mysqli_fetch_assoc($result);?>
		   
			<td rowspan="<?php echo $row['COUNT(pr_college)'];?>" style="border: 1px solid black;"><?php echo $row5['pr_college'];?></td>
			
		   <?php 
		   $sql1="Select DISTINCT(pr_system) from proresult where pr_college='$row5[pr_college]' and pr_year='$row7[pr_year]'";
		   $result1=mysqli_query($conn,$sql1);
		   while($row1=mysqli_fetch_assoc($result1)){?>
		  <?php
		$sql2="Select COUNT(pr_system) from proresult where pr_system='$row1[pr_system]' and pr_year='$row7[pr_year]'";
		  $result2=mysqli_query($conn,$sql2);
		  $row3=mysqli_fetch_assoc($result2);
		  $sql6="Select COUNT(DISTINCT(pr_name)) from proresult where pr_system='$row1[pr_system]' and pr_year='$row7[pr_year]'";
		  $result6=mysqli_query($conn,$sql6);
		  $row6=mysqli_fetch_assoc($result6);
		  ?>
		  <td rowspan="<?php echo $row3['COUNT(pr_system)'];?>" style="border: 1px solid black;"><?php echo $row1['pr_system']?></td>
		  <td rowspan="<?php echo $row3['COUNT(pr_system)'];?>" style="border: 1px solid black;padding:2%"><?php echo $row6['COUNT(DISTINCT(pr_name))']?></td>
		
		<?php
		  $sql2="Select * from proresult where pr_system='$row1[pr_system]' and pr_year='$row7[pr_year]'";
		  $result2=mysqli_query($conn,$sql2);
		  while($row2=mysqli_fetch_row($result2)){
			  ?>
			<td style="border: 1px solid black;"><?php echo $row2[3];?></td>
			<td><?php echo $row2[4];?></td>
			
			</tr>
			<?php 
				}
		   }
		   }
		   }?>
			
			</tbody>
			</table>
			 <p style="text-align:right"><a href="proresult.php">(TOP)</a></p>
        </div>
      </div>
      <div class="sidebar">
     
        <div class="gadget">
          <p style="font-size:28px;color:#6C6C6C">服務成果</p>
          <div class="clr"></div>
          <ul class="sb_menu" style="list-style:circle">
            <li><a href="RS.php">大一服務成果</a>
			<ul>
				<li><a href="RS.php">學生服務人力與時數</a>
				<li><a href="RC.php">參與服務學習教師人力</a>
				<li><a href="RU.php">校內外機構服務比例</a>
				<li><a href="RLC.php">服務學習課程合作單位</a>
				<li><a href="RA.php">課程前後測成效分析</a>
				
				</ul>
			</li>
            <li><a href="proresult.php">專業服務成果</a></li>
            <li><a href="RI.php">國際志工成果</a></li>
            <li><a href="RV.php">成果影片</a>
			<ul>
				<li><a href="RV.php">學生團隊</a>
				<li><a href="RVI.php">國際志工</a>
				<li><a href="RVC.php">線上學堂</a>
				</ul>
			</li>
            
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

