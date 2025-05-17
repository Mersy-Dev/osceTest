// A javascript-enhanced crossword puzzle [c] Jesse Weisbeck, MIT/GPL 
(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		var puzzleData = [
			 	{
					clue: "NT-pro-BP is a tool for diagonising the heart ______",
					answer: "failure",
					position: 1,
					orientation: "across",
					startx: 5,
					starty: 1
				},
				{
				   clue: "Largest artery in the body",
				   answer: "aorta",
				   position: 2,
				   orientation: "down",
				   startx: 6,
				   starty: 1
			   },
			 	{
					clue: "A proton pump inhibitor is commonly prescribed in most ACS treatment regimens for protection during ___",
					answer: "dapt",
					position: 4,
					orientation: "across",
					startx: 5,
					starty: 5
				},
			 	{
					clue: "Medication given to patients in acute management of STEMI and NSTEMI at an initial dose of 300mg",
					answer: "aspirin",
					position: 5,
					orientation: "across",
					startx: 11,
					starty: 5
				},
			 	{
					clue: "This medication class is prescribed at 80mg for the secondary prevention of cardiovascular events.",
					answer: "statin",
					position: 3,
					orientation: "down",
					startx: 8,
					starty: 4
				},
			 	{
					clue: "Anti-hypertensive medication that causes side effects of gingival hyperplasia",
					answer: "amlodipine",
					position: 5,
					orientation: "down",
					startx: 11,
					starty: 5
				},
			 	{
					clue: "First line treatment for rate-control in atrial fibrillation.",
					answer: "betablocker",
					position: 7,
					orientation: "across",
					startx: 6,
					starty: 7
				},
			 	{
					clue: "Beta blocker that is contraindicated in atrial fibrillation due to risk of torsades de pointes.",
					answer: "sotalol",
					position: 6,
					orientation: "down",
					startx: 1,
					starty: 7
				},
			 	{
					clue: "Cardiac biomarker used to differentiate between unstable angina and NSTEMI.",
					answer: "troponin",
					position: 10,
					orientation: "across",
					startx: 1,
					starty: 9
				},
			 	{
					clue: "120/80mmHg is classified as ____ blood pressure.",
					answer: "normal",
					position: 10,
					orientation: "down",
					startx: 3,
					starty: 8
				},
			 	{
					clue: "Anti-hypertensive medication with a common side effect of a cough.",
					answer: "aceinhibitor",
					position: 12,
					orientation: "across",
					startx: 3,
					starty: 12
				},
			 	{
					clue: "Type of shock causing pump dysfunction, where the heart cannot pump enough blood to the rest of the body.",
					answer: "cardiogenic",
					position: 8,
					orientation: "down",
					startx: 13,
					starty: 7
				},
			 	{
					clue: "Clopidogrel and Aspirin, or Ticagrelor and Aspirin, is an example of ___ antiplatelet therapy",
					answer: "dual",
					position: 11,
					orientation: "across",
					startx: 13,
					starty: 10
				},
			 	{
					clue: "The antibiotic treatment for endocarditis depends on if the patient has a native or ___ valve.",
					answer: "prosthetic",
					position: 13,
					orientation: "across",
					startx: 5,
					starty: 16
				},
			 	// {
				// 	clue: "Not a one ___ motor, but a three ___ motor",
				// 	answer: "phase",
				// 	position: 3,
				// 	orientation: "across",
				// 	startx: 7,
				// 	starty: 1
				// },
				// {
				// 	clue: "Created from a separation of charge",
				// 	answer: "capacitance",
				// 	position: 5,
				// 	orientation: "across",
				// 	startx: 1,
				// 	starty: 3
				// },
				// {
				// 	clue: "The speeds of engines without and accelaration",
				// 	answer: "idlespeeds",
				// 	position: 8,
				// 	orientation: "across",
				// 	startx: 1,
				// 	starty: 5
				// },
				// {
				// 	clue: "Complex resistances",
				// 	answer: "impedances",
				// 	position: 10,
				// 	orientation: "across",	
				// 	startx: 2,
				// 	starty: 7
				// },
				// {
				// 	clue: "This device is used to step-up, step-down, and/or isolate",
				// 	answer: "transformer",
				// 	position: 13,
				// 	orientation: "across",
				// 	startx: 1,
				// 	starty: 9
				// },
				// {
				// 	clue: "Type of ray emitted frm the sun",
				// 	answer: "gamma",
				// 	position: 16,
				// 	orientation: "across",
				// 	startx: 1,
				// 	starty: 11
				// },
				// {
				// 	clue: "C programming language operator",
				// 	answer: "cysan",
				// 	position: 17,
				// 	orientation: "across",
				// 	startx: 7,
				// 	starty: 11
				// },
				// {
				// 	clue: "Defines the alpha-numeric characters that are typically associated with text used in programming",
				// 	answer: "ascii",
				// 	position: 1,
				// 	orientation: "down",
				// 	startx: 1,
				// 	starty: 1
				// },
				// {
				// 	clue: "Generally, if you go over 1kV per cm this happens",
				// 	answer: "arc",
				// 	position: 2,
				// 	orientation: "down",
				// 	startx: 5,
				// 	starty: 1
				// },
				// {
				// 	clue: "Control system strategy that tries to replicate the human through process (abbr.)",
				// 	answer: "ann",
				// 	position: 4,
				// 	orientation: "down",
				// 	startx: 9,
				// 	starty: 1
				// },
				// {
				// 	clue: "Greek variable that usually describes rotor positon",
				// 	answer: "theta",
				// 	position: 6,
				// 	orientation: "down",
				// 	startx: 7,
				// 	starty: 3
				// },
				// {
				// 	clue: "Electromagnetic (abbr.)",
				// 	answer: "em",
				// 	position: 7,
				// 	orientation: "down",
				// 	startx: 11,
				// 	starty: 3
				// },
				// {
				// 	clue: "No. 13 across does this to a voltage",
				// 	answer: "steps",
				// 	position: 9,
				// 	orientation: "down",
				// 	startx: 5,
				// 	starty: 5
				// },
				// {
				// 	clue: "Emits a lout wailing sound",
				// 	answer: "siren",
				// 	position: 11,
				// 	orientation: "down",
				// 	startx: 11,
				// 	starty: 7
				// },
				// {
				// 	clue: "Information technology (abbr.)",
				// 	answer: "it",
				// 	position: 12,
				// 	orientation: "down",
				// 	startx: 1,
				// 	starty: 8
				// },
				// {
				// 	clue: "Asynchronous transfer mode (abbr.)",
				// 	answer: "atm",
				// 	position: 14,
				// 	orientation: "down",
				// 	startx: 3,
				// 	starty: 9
				// },
				// {
				// 	clue: "Offset current control (abbr.)",
				// 	answer: "occ",
				// 	position: 15,
				// 	orientation: "down",
				// 	startx: 7,
				// 	starty: 9
				// }
			] 
	
		$('#puzzle-wrapper').crossword(puzzleData);
		
	})
	
})(jQuery)
