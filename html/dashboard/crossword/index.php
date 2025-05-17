<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Qurossword - A javascript crossword puzzle plugin</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="jquery.crossword.js"></script>
	<script src="script.js"></script>

	<style type="text/css" media="screen">
	/*
		Default puzzle styling
	*/
	body {
		font: 62.5%/1.3em Helvetica, sans-serif;
		/* width: 90.3%; */
		margin: 0;
	}
		table { 
			border-collapse: collapse; 
			border-spacing: 0; 
			max-width: 100%;
		}
		table tr{
			width: 100%;
		}
		table td {
			width: 5em;
			height: 4em;
			/* border: 1px solid #cdcdcd; */
			padding: 0;
			margin: 0;
			/* background-color: rgb(0, 0, 0, 0.8); */
			position: relative;
		}
		
		td input {
			width: 100%;
			height: 100%;
			padding: 0em;
			border: none;
			border: 1px solid rgb(0, 0, 0, 0.5);
			text-align: center;
			font-size: 3em;
			color: #444;
		}
		
		td input:focus {
			background-color: rgb(45,175,180,0.3);
		}
		
		td span {
			color: #444;
			font-size: 0.8em;
			position: absolute;
			top: -1px;
			left: 1px;
			display:none;
		}
		
		input.done {
			font-weight: bold;
			color: green;
		}
		
		.active,
		.clues-active {
			background-color: #31afb4;
			color:black;
		}
		.clue-done {
			color: #999;
			text-decoration: line-through;
		}
		
		#puzzle-wrapper {
			float: left;
			width: 64%;
			margin-right: 3%;
		}
		#puzzle-clues {
			float: left;
			width: 30%;
		}
		
		#puzzle-clues li{
			font-size: 1.2em;
			margin: .3em;
			line-height: 1.6em;
		}
		

		


		<?php    
		if (isset($_COOKIE['darkmode']) && $_COOKIE['darkmode'] == 'true') {?>

		body{
			background: #141414 !important;
			color: #BDBCC0 !important;
		}

		
		td input {
			background: rgb(0,0,0,0.9);
			border: 1px solid rgb(255, 255, 255, 0.5);
			border: 1px solid #31afb4;
			color:#BDBCC0 !important;
		}

		
		.active,
		.clues-active {
			background-color: rgb(45,175,180,0.1);
			color:#fff;
		}
		<?php } ?>


		
		@media only screen and (max-width: 1000px) {

			#puzzle-wrapper {
				float: none;
				width: 90%;
				margin: auto;
			}

			#puzzle-clues {
				float: none;
				width:80%;
				margin: auto;
			}
		}
		
	</style>

</head>

<body>

<br>

<div id="puzzle-wrapper"><!-- crossword puzzle appended here --></div>
<script>
window.onload = function() {
    var height = document.body.scrollHeight;
    window.parent.postMessage({ height: height });
};
</script>

</body>
</html>	