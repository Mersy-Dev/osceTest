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
/*  	color: #EF798A;*/
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

		<b><div class="header">Lifestyle Advice</div></b>

		<div class="content-details" style="font-size: 14px;color: rgb(0, 0, 0, 0.6);">
		By 
		<a href="#" style="color: #31afb4">Alesha Amponsah</a>
		&nbsp;
		.
		&nbsp;
		05/10/2023
		.
		&nbsp;
		<a href="#">all</a>			
		<br>
		<br>
		<br>
		<br>
		<br>


		</div>
		<div>

		<b>Summary</b>
		<br>
		<br>
		These scenarios are based on written OSCEs but can easily be adapted to a physical interaction roleplay station. To adapt to a roleplay, one student should act as the patient scenario and the other student should act as the pharmacist. The aim of the station will be to inform the patient of their BMI status, and provide lifestyle advice in a patient-centred manner. 

		</div>
	</div>


<div class="content content-resource" style="margin-top:0px"> 
	<div class="slideHead" onclick="$('#scenario1').slideToggle('fast')">
		Scenario 1
		<div class="icon-right">+</div>
	</div>

	<div class="instructions" id="scenario1"> <br>
		Mr M is a 56-year-old man who is 176cm tall and weighs 85kg, he is a non-smoker but loves to have a few pints when he is done with his 9-5 job in the office. 

		<br>
		<ul>
			<li>Calculate his BMI. (1)</li>
			<li>What BMI range does he fall into? (1)</li>
			<li>What lifestyle advice would you give to Mr M? (5)</li>
		</ul>

	</div>
</div>

<!--  -->

<div class="content content-resource" style="margin-top:0px"> 
	<div class="slideHead" onclick="$('#scenario2').slideToggle('fast')">
		Answers to scenario 1
		<div class="icon-right">+</div>
	</div>

	<div class="instructions" id="scenario2"> <br>
		 1) 27.4 (1)
		<br>
		<b>BMI = weight (kg) / height (cm)2</b>

		<br>
		<br>
		2)  Overweight (1)
		<br>
		<b>BMI Categories</b>
		<br>
		<br>
		<ul>
			<li>Underweight <18.5 </li>
			<li>Healthy range 18.5-24.9</li>
			<li>Overweight 25-29.9</li>
			<li>Obese 30-34.9</li>
			<li>Severely obese >35</li>
		</ul>

		<br>
		3) Students should be clear about the information that needs to be provided and state it in simple terms. Required to provide the patient with lifestyle advice based on the categorisation and taking into consideration the social history provided.

		<br>
		<br>
		Examples include:
		<br>
		<br>
		<b>Alcohol Consumption: (max 3 marks without including advice on alcohol consumption)</b>
		<br>
		<br>
		<ul>
			<li>Advise moderation when it comes to alcohol consumption. A few pints occasionally is fine, but excessive drinking can contribute to weight gain and other health issues.</li>
			<li>Recommend limiting alcohol intake to within recommended guidelines (e.g., no more than 14 units per week for men in some countries).</li>
			<li>Advise an alternative form of stress relief, such as sport</li>
		</ul>



		<br>
		<br>
		<b>Stress Management:</b>
		<br>
		<ul>
			<li>Highlight the importance of managing stress, as excessive stress can contribute to unhealthy lifestyle choices.</li>
			<li>Suggest stress-reduction techniques such as mindfulness, deep breathing exercises, or hobbies that help him relax.</li>
		</ul>

		<br>
		<br>
		<b>Weight Management:</b>
		<br>
		<ul>
			<li>Discuss setting achievable weight loss goals if necessary. Even a modest reduction in weight can have significant health benefits.</li>
			<li>Offer resources for tracking food intake and physical activity, such as apps or journals.</li>
		</ul>
	</div>

</div>


<!--  -->


<div class="content content-resource" style="margin-top:0px"> 
	<div class="slideHead" onclick="$('#scenario3').slideToggle('fast')">
		Scenario 2
		<div class="icon-right">+</div>
	</div>

	<div class="instructions" id="scenario3"> <br>
		Miss R is a single mother of 2, her kids are 3 and 5 years old, she plays with her kids regularly in the park and likes to run early morning, she weighs 79 kg and is 163cm tall. She buys fish and chips every Friday as a reward and smokes around a pack a day. 

		<br>
		<ul>
			<li>Calculate her BMI. (1)</li>
			<li>What BMI range does she fall into? (1)</li>
			<li>What lifestyle advice would you give to Miss R? (5)</li>
		</ul>

	</div>
</div>


<!--  -->




<div class="content content-resource" style="margin-top:0px"> 
	<div class="slideHead" onclick="$('#scenario4').slideToggle('fast')">
		Answers to Scenario 2
		<div class="icon-right">+</div>
	</div>

	<div class="instructions" id="scenario4"> <br>
		 1) 29.7 (1)
		<br>
		<b>BMI = weight (kg) / height (cm)2</b>

		<br>
		<br>
		2)  Overweight (1)
		<br>
		<b>BMI Categories</b>
		<br>
		<br>
		<ul>
			<li>Dietary Recommendations  (maximum of 3 marks without dietary recommendations):</li>
			<li>Healthy range 18.5-24.9</li>
			<li>Overweight 25-29.9</li>
			<li>Obese 30-34.9</li>
			<li>Severely obese >35</li>
		</ul>

		<br>
		3) Students should be clear about the information that needs to be provided and state it in simple terms. Required to provide the patient with lifestyle advice based on the categorisation and taking into consideration the social history provided.

		<br>
		<br>
		Examples include:
		<br>
		<br>
		<b>Dietary Recommendations  (maximum of 3 marks without dietary recommendations):</b>
		<br>
		<br>
		<ul>
			<li>Encourage Miss R to focus on a balanced diet that includes a variety of nutritious foods such as fruits, vegetables, lean proteins, whole grains, and healthy fats.</li>
			<li>Suggest gradually reducing the frequency of indulging in fish and chips as a reward to maybe once a month or finding healthier alternatives.</li>
			<li>Discuss the importance of portion control and mindful eating to help manage calorie intake.</li>
		</ul>



		<br>
		<br>
		<b>Smoking Cessation (maximum of 3 marks without smoking advice):</b>
		<br>
		<br>
		<ul>
			<li>Offer resources and support for quitting smoking, such as nicotine replacement therapy, counselling, or support groups.</li>
			<li>Highlight the benefits of quitting smoking, including improved lung health and reduced risk of various diseases.</li>
		</ul>

		<br>
		<br>
		<b>Physical Activity:</b>
		<br>
		<br>
		<ul>
			<li>Acknowledge her current physical activity habits and commend her for playing with her kids and running in the morning.</li>
			<li>Encourage her to maintain these activities and possibly explore other forms of exercise she enjoys.</li>
		</ul>

		<br>
		<br>
		<b>Weight Management:</b>
		<br>
		<br>
		<ul>
			<li>Discuss setting achievable weight loss goals if necessary, considering her BMI falls into the overweight range.</li>
			<li>Recommend tracking her progress, possibly with the help of a fitness app or journal.</li>
			<li>Stress the importance of gradual, sustainable changes rather than extreme diets.</li>
		</ul>
	</div>

</div>


<!--  -->





<div class="content content-resource" style="margin-top:0px"> 
	<div class="slideHead" onclick="$('#scenario5').slideToggle('fast')">
		Scenario 3
		<div class="icon-right">+</div>
	</div>

	<div class="instructions" id="scenario5"> <br>
		Mr G is a rugby player that has recently injured his arm, he is a non-smoker and is 167cm tall, weighing 99kg. As he cannot go back to rugby for a while, he has decided to pick up a different hobby that does not require a lot of action with his injured arm, but has not left his house in a while. 

		<br>
		<ul>
			<li>Calculate his BMI. (1)</li>
			<li>What BMI range does he fall into? (1)</li>
			<li>What lifestyle advice would you give to Mr G? (5)</li>
		</ul>

	</div>
</div>

<!--  -->





<div class="content content-resource" style="margin-top:0px"> 
	<div class="slideHead" onclick="$('#scenario6').slideToggle('fast')">
		Answers to Scenario 3
		<div class="icon-right">+</div>
	</div>

	<div class="instructions" id="scenario6"> <br>
		 1) 35.1 (1)
		<br>
		<b>BMI = weight (kg) / height (cm)2</b>

		<br>
		<br>
		2)  Severely Obese (1)
		<br>
		<b>BMI Categories</b>
		<br>
		<br>
		<ul>
			<li>Dietary Recommendations  (maximum of 3 marks without dietary recommendations):</li>
			<li>Healthy range 18.5-24.9</li>
			<li>Overweight 25-29.9</li>
			<li>Obese 30-34.9</li>
			<li>Severely obese >35</li>
		</ul>

		<br>
		3) Students should be clear about the information that needs to be provided and state it in simple terms. Required to provide the patient with lifestyle advice based on the categorisation and taking into consideration the social history provided.

		<br>
		<br>
		Examples include:
		<br>
		<br>
		<b>BMI Awareness:</b>
		<br>
		<br>
		<ul>
			<li>Acknowledge Mr. G's current BMI and its classification as severely obese.</li>
			<li>Recommend low-impact activities that he can engage in, such as swimming, walking, or stationary cycling, to maintain or improve his fitness while protecting his arm.</li>
		</ul>

		<br>
		<br>
		<b>Physical Activity:</b>
		<br>
		<br>
		<ul>
			<li>Recommend low-impact activities that he can engage in, such as swimming, walking, or stationary cycling, to maintain or improve his fitness while protecting his arm.</li>
			<li>Stress the importance of consulting a healthcare professional or physical therapist for guidance on safe exercises during his recovery.</li>
		</ul>

		<br>
		<br>
		<b>Social Interaction and Mental Health:</b>
		<br>
		<br>
		<ul>
			<li>Address the fact that Mr. G has not left his house in a while, which can lead to social isolation and potential mental health challenges.</li>
			<li>Encourage him to engage in social activities, even if they don't involve intense physical activity, to combat isolation and boost his mental well-being.</li>
		</ul>


		<br>
		<br>
		<b>Injury Rehabilitation:</b>
		<br>
		<br>
		<ul>
			<li>Stress the importance of following medical advice and adhering to the prescribed rehabilitation plan for his injured arm.</li>
			<li>Recommend consulting with a physical therapist or rehabilitation specialist for tailored guidance on arm recovery exercises.</li>
		</ul>
	</div>

</div>


<!--  -->



 <?php require "../footer.php"; ?>