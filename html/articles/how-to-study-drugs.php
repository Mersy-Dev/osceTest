<?php 

require_once "../inc/conn.php";
require_once "../header.php";

 ?>


<style>
  a{
    text-decoration:underline
  }

  h5{
    font-weight:bolder;
    color:#31afb4;
  }

  .title{
    color: #EF798A;
  }

  body{
/*    background: #f5f5f5;*/
  }

  b{
  	color: #EF798A;
  }

</style>

  <br>
  <br>
  <div class="title">How to study drugs!</div>
  <div style="text-align:center;font-weight: bolder;color: rgb(0, 0, 0, 0.4);">14 September 2023</div>



<br>
<br>
<br>

<div style="width:90%;max-width:1000px;margin:auto;" class="content-resource">

  Here is our recommended method for studying drugs: <br><br>

  <ol>
  	<li>Create a separate document with each <b>body system</b>.</li>
  	<li>Make sure you understand the <b>physiology</b> of the particular body system and then consider its different <b>disease</b> states.</li>
  	<li>Now apply the <b>drugs</b> to the diseases - in doing this the mechanism of action (MOA) of each drug should be easier to understand. </li>
  	<li>Create a <b>drug table</b> for all the drugs you need to know for each system.</li>
  	<img style="margin-top:40px;text-align:center;max-width: 80%;" src="../assets/img/how-to-study-drugs1.png">
  	<div style="height:40px"></div>
  	<li>Focus on common drug-drug interactions (<b>DDIs</b>) and common <b>contraindications</b>.</li>
  	<li>Create tables of all the drugs causing different problems, for example: electrolyte imbalances, urine colour changes, rashes etc. For example, for beta-blockers you could make a list of the cardio-selective drugs, the ones that cause nightmares etc. For calcium channel blockers, note that it is only amlodipine that causes gingival hypertrophy! Don’t forget to populate these tables throughout your four years in pharmacy school.</li>
  	<li>Also, when it comes to drugs of the same class create handy mnemonics to help you remember the drugs within that class, like BATMAN for beta-blockers:</li>
	  	<center>
				  	<b>B</b> - Bisoprolol <br>
					<b>A</b> - Atenolol <br>
					<b>T</b> - Timolol <br>
					<b>M</b> - Metoprolol <br>
					<b>A</b> - Acebutalol <br>
					<b>N</b> - Nebivolol <br>
	  	</center>

  </ol>

  <br>
  <br>

<div class="table-responsive">
  <table style="width:2000px" class="table table-bordered <?php echo $darkMode ? 'table-dark':''?>">
  	<thead>
  		
  		<tr>
  			<th><center>Cardio Selective Beta Blockers</center></th>
  			<th><center>Mechanism(s) of action</center></th>
  			<th><center>Indications</center></th>
  			<th><center>Contraindications</center></th>
  			<th><center>Monitoring (Include pregnancy and breastfeeding)</center></th>
  			<th><center>Adverse Effects</center></th>
  			<th><center>DDI</center></th>
  			<th><center>Counselling Points</center></th>
  		</tr>
	  	</center>
  	</thead>
  	<tbody>
  		<tr>
  			<td>Bisoprolol</td>
  			<td>
  				1- Binds to beta-1- adrenergic receptors. <br>
				2- Prevent CAMP binding to PKA. <br>
				3- Calcium channels not activated. <br>
				4- Less calcium = weakened heart muscle contraction. <br>
			</td>
			<td>
				<ul>
					<li>Hypertension</li>
					<li>Angina</li>
				</ul>
			</td>
			<td>
				<ul>
					<li>Asthma</li> 
					<li>Acute heart failure requiring IV inotropes.</li>
					<li>2nd and 3rd degree AV-Block.</li>
				</ul>
			</td>
			<td>
				<ul>
					<li>Hepatic impairment – max dose 10mg.</li>
					<li>Renal impairment - if CrCl <20ml/min max dose is 10mg daily.</li>
					<li>Monitor lung function. </li>
					<li>Not okay in pregnancy.</li>
					<li>Okay in breastfeeding.</li> 
				</ul>
			</td>
			<td>
				<ul>
					<li>Abdominal discomfort</li>
					<li>Bradycardia</li>
					<li>Confusion</li>
					<li>Depression</li>
					<li>Diarrhoea</li>
					<li>Dizziness</li>
				</ul>
			</td>
			<td>
				<ul>
					<li>Adrenaline – increased risk of hypertension.</li>
					<li>Amiodarone – increased risk of cardiovascular adverse effects.</li>
					<li>Diltiazem – increases risk of cardiac depression.</li>
				</ul>
			</td>
			<td>
				<ul>
					<li>Take in the MORNING with or without food.</li>
				</ul>
			</td>
  		</tr>
  	</tbody>
  </table>
</div>


</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>




 <?php require "../footer.php"; ?>