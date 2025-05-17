<?php 

require_once "../inc/conn.php";
require_once "../header.php";

 ?>


<style>

  .title{
    color: #EF798A;
  }

  body{
    background: #f5f5f5;
  }

  b{
  	color: #EF798A;
  }
	.content{
		margin-bottom: 20px;
		width: 90%;
	}

	.slideHead{
		font-size: 20px !important;
		font-weight: bolder;
		cursor: pointer;
	}

	.slideHead:hover{
		color: #31afb4;
	}
	.icon-right{
		float: right;
		color: #EF798A;
	}

	.instructions{display: none;}
</style>


<div class="content content-resource">

	<div class="content-category">

	<a href="search?category=scenario" style="color: inherit !important;border:0">
	<i class="icofont-hill"></i> Scenarios
	</a>
	</div>
	<br>

	<b><div class="header">Controlled Drug Prescription 1</div></b>

	<div class="content-details" style="font-size: 14px;color: rgb(0, 0, 0, 0.6);">
	By 
	<a href="#" style="color: #31afb4">unknown</a>
	&nbsp;
	.
	&nbsp;
	20 October 2023
	.
	&nbsp;
	<a href="#">all</a>			
	<br>
	<br>
	<br>
	<br>
	<br>

	</div>


<center>

  This is a prescription for morphine. Identify any issues.  

  <br><br>

  	<img src="img/image2.png" style="margin:auto;width:90%;max-width: 500px;">

  	<br>
  	<br>
  	<br>
  	<br>
  	
  	Type in your results
  	<textarea style="margin-top:30px;width:90%;max-width:500px;height:200px;background:rgb(0, 0, 0, 0.02);" placeholder="Identify issues " class="form-control" name="comment" ></textarea>


  </center>

</div>



<div class="content content-resource" style="margin-top:0px"> 
	<div class="slideHead" onclick="$('#div1').slideToggle('fast')">
		See Answer
		<div class="icon-right">+</div>
	</div>

	<div class="instructions" id="div1"> <br>
		Controlled Drug prescriptions have certain requirements that cannot be missed out. 
		<br>
		<br>
Morphine is a schedule 2 CD so all requirements must be met. 
		<br>
		<br>
		<ul>
			<li>The drug name and dose must be written – as directed is not allowed (1)</li>
			<li>The strength and formulation must also be specified. It is not enough to say morphine 10mg as morphine can come as PR capsules, IR tablets, PR tablets and even ampoules.  (1)</li>
			<li>The total quantity that is to be supplied must also ALWAYS be written in words and figures. (1)</li>
			<li>All other prescription requirements are also required. (this includes, date, patient name and address, prescriber name and address, prescriber signature). On this prescription the prescriber signature is missing (1)</li>
			<li>The patient’s surname is missing.  (1)</li>
			<li>The patient’s surname is missing.  (1)</li>
		</ul>

		<br>
		CD prescriptions for S2 S3 and S4 CDs are only valid for 28 days. 


	</div>
</div>



<div class="content content-resource" style="margin-top:0px"> 
	<div class="slideHead" onclick="$('#div2').slideToggle('fast')">
		See Correct Prescription
		<div class="icon-right">+</div>
	</div>

	<div class="instructions" id="div2">
		<br>
		<br>
  	<img src="img/image1.png" style="margin:auto;width:90%;max-width: 500px;">
	</div>
</div>



<br>
<br>
<br>
<br>
<br>


 <?php require "../footer.php"; ?>