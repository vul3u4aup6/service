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
          <p style="font-size:20px"><strong>師資陣容</strong></p><div class="clr"></div><p/>
		  <hr>
		  <form action="#" method="POST">
		  <label>學年度：</label>
		  <select  name="year" id="year">
		  </select>
		  <br/>
		  <label>學期別：</label>
		  <select name="semester" id="semester">
		  <option value="1">上學期</option>
		  <option value="2">下學期</option>
		  </select>
		  <button type="submit" class="btn btn-default" name="selectBtn" style="margin-left:10%">查詢</button>				
		  </form>
		  <?php if(isset($_POST['selectBtn'])){
			  $year=$_POST['year'];
			  $semester=$_POST['semester'];
			  if($semester==1){
				  $se='上學期';
			  }else{
				  $se='下學期';
			  }
			  $sql="Select * from teacher_detail where td_year='$year' and td_semester='$semester'";
			  $result=mysqli_query($conn,$sql);?>
			  	 <p style="font-size:16px"><strong><?php echo $year;?>學年度(<?php echo $se;?>)服務學習授課教師列表</strong></p><div class="clr"></div><p/>
		  <table class="customer_table" style="background-color:#46A3FF;">
		  <thead >
			<th style="text-align:center">授課班級</th>
			<th style="text-align:center">姓名</th>
			<th style="text-align:center">職稱</th>
			<th style="text-align:center">校內分機</th>
			<th style="text-align:center">E-mail</th>
			<th style="text-align:center">上課時間/上課地點</th>
			
			</thead>
			<tbody>
		  <?php
			  while($row=mysqli_fetch_assoc($result)){
				  ?>
			<tr>
				
				<td style="text-align:center"><?php echo $row['td_class'];?></td>
				<td style="text-align:center;white-space:nowrap"><?php echo $row['td_name'];?></td>
				<td style="text-align:center"><?php echo $row['td_position'];?></td>
				<td style="text-align:center"><?php echo $row['td_phone'];?></td>
				<td style="text-align:center"><?php echo $row['td_mail'];?></td>
				<td style="text-align:center"><?php echo $row['td_space'];?></td>
				
		
				</tr>
				  <?php
			  }?>
			  </tbody>
			  </table>
			  <?php
			  
		  }else{?>
		   <p style="font-size:16px"><strong>93-105(一)學年度服務學習授課教師名單</strong></p><div class="clr"></div><p/>
		  <table class="customer_table" style="background-color:#46A3FF;">
		  <thead >
			<th style="text-align:center">系所</th>
			<th style="width:83%;text-align:center">姓名</th>
			
			</thead>
			<tbody>
			<?php 
			$i=1;
			$sql="Select * from teacher ";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){?>
				<tr>
				
				<td style="text-align:center"><?php echo $row['te_class'];?></td>
				
				<td><?php echo $row['te_member'];?></td>
				
				</tr>
				
				
				
			<?php }?>
			</tbody>
			</table>
		  <?php }?>
				 <p style="text-align:right"><a href="FSTC.php">(TOP)</a></p>
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
<script>
	$( document ).ready(function() {
		
	$.ajax({
			type:"POST",
			data:{token:'year'},
			url:'../backstage/college.php',
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
					dataString+='<option value="'+parsedJson[i].year+'" >'+parsedJson[i].year+'</option>';
				}
				$('#year').html(dataString);
				}
			}
		});
	});
</script>

