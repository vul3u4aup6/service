<?php 
include("../database.php");
if(isset($_POST['token']) && $_POST['token'] == 'college'){
	college($conn,$_POST['college']);
  }
  if(isset($_POST['token']) && $_POST['token'] == 'year'){
	year($conn);
  }
  if(isset($_POST['token']) && $_POST['token'] == 'system'){
	system1($conn,$_POST['college']);
  }
  function year($conn){
	   $data=array();
	  $tmp=array();
	  $sql="Select DISTINCT(td_year) from teacher_detail ";
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_assoc($result)){
		  $tmp['year']=$row['td_year'];
		  $data[]=$tmp;
	  }
	  echo json_encode($data);
	  
  }
  function college($conn,$college){
	  $data=array();
	  $tmp=array();
	  $sql="Select * from school_system where ss_college='$college'";
	  $result=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_assoc($result)){
		  $tmp['system']=$row['ss_system'];
		  $data[]=$tmp;
	  }
	  echo json_encode($data);
  }
    function system1($conn,$college){
	  $data=array();
	  $tmp=array();
	  $sql="Select * from proresult where pr_class='$college'";
	  $result=mysqli_query($conn,$sql);
	  $row=mysqli_fetch_assoc($result);
	  $tmp['system1']=$row['pr_system'];
	  $sql1="Select * from school_system where ss_college='$row[pr_college]'";
	  $result1=mysqli_query($conn,$sql1);
	  while($row1=mysqli_fetch_assoc($result1)){
		  $tmp['system']=$row1['ss_system'];
		  $data[]=$tmp;
	  }
	  echo json_encode($data);
  }
?>