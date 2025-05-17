<?php ?>

<style>
	.mark-scheme {
    padding: 10px;
}

.mark-scheme-group {
    margin-bottom: 20px;
    border: 1px solid #ddd;
    padding: 10px;
}

.group-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: bold;
}

.group-score {
    display: flex;
    align-items: center;
}

.group-score-progress progress {
    width: 100px;
    margin-left: 10px;
}

.group-items {
    margin-top: 10px;
}

.group-item {
    display: flex;
    align-items: center;
    margin-bottom: 5px;
}

.group-item-flag {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    margin-right: 10px;
}

.group-item-checkbox {
    margin-right: 10px;
}

.group-item-text {
    flex-grow: 1;
}

.group-item-score {
    margin-left: 10px;
    font-weight: bold;
}

.group-item.strikethrough .group-item-text {
    text-decoration: line-through;
}

</style>

<div class="chat-black" id="chat-black" onclick="$('#chat-black, #chat-box').fadeOut()"></div>
<div class="chat-box" id="chat-box">
	<iframe id="chat-iframe" src="../api/chatbot/?id=<?php echo $id;?>" style="width:100%;height:100%;border:40px"></iframe>
</div>


<?php
	$a = json_decode($file['content']);
	$c['summary'] = $a->summary;
	$c['student_instructions'] = $a->student_instructions;
	$c['actor_instructions'] = $a->actor_instructions;
	$c['mark_scheme'] = $a->mark_scheme;

	echo '<pre>';
	print_r($c['mark_scheme']);
	
	$c['summary'] = str_replace("<img src=\"files/images/", "<img src=\"../files/images/", $c['summary']);
	$c['student_instructions'] = str_replace("<img src=\"files/images/", "<img src=\"../files/images/", $c['student_instructions']);
	$c['actor_instructions'] = str_replace("<img src=\"files/images/", "<img src=\"../files/images/", $c['actor_instructions']);

	echo "<b>Summary</b> <br> ";
	echo $c['summary'];
	echo '</div> 
			<div class="content content-resource" style="margin-top:0px"> 
			<div class="slideHead" onclick="$(\'#student_instructions\').slideToggle(\'fast\')">
			<i class="icofont-read-book-alt"></i>
			Student Instructions
			<div class="icon-right">+</div>
			</div>
			<div class="instructions" id="student_instructions"> <br>'.$c['student_instructions'].'
			</div>';
	echo '</div> ';

	if(!empty($c['actor_instructions'])){

		if($file['ai']=="yes"){
	echo '
	<center><div class="nav-btn"  onclick="$(\'#chat-black, #chat-box\').fadeIn()" style="display:inline-block;margin:40px 0;padding:10px;float:none;font-size:16px !important;cursor:pointer">Actor AI 🤖 (Beta)</div></center>';
		}

	echo ' <div class="content content-resource" style="margin-top:0px">
			<div class="slideHead" onclick="$(\'#actor_instructions\').slideToggle(\'fast\')">
			<i class="icofont-crutch"></i>
			Actor Instructions
			<div class="icon-right">+</div>
			</div>
			<div class="instructions" id="actor_instructions"> <br>'.$c['actor_instructions'].'
			</div>';
	echo '</div>';
	}


	echo ' <div class="content content-resource" style="margin-top:0px">
			<div class="slideHead" onclick="$(\'#mark_scheme\').slideToggle(\'fast\')">
			<i class="icofont-doctor"></i>
			Mark Scheme
			<div class="icon-right">+</div>
			</div>
			<div class="instructions" id="mark_scheme"> <br>';
			?>


			<div class="mark-scheme">
				<?php foreach ($c['mark_scheme'] as $group) { ?>
				<div class="mark-scheme-group" data-group="<?= $group->header ?>" data-group-score="0">
					<div class="group-header">
						<div class="group-header-text"><?= $group->header ?></div>
						<div class="group-score">
							<div class="group-score-text">Score: <span class="group-score-value">0</span></div>
							<div class="group-score-progress"><progress max="10" value="0"></progress></div>
						</div>
					</div>
					<div class="group-items">
						<?php foreach ($group->items as $item) { ?>
						<div class="group-item" data-score="<?= $item->score ?>" data-flag="<?= $item->flag ?>" data-labels="<?= implode(',', $item->labels) ?>">
							<div class="group-item-flag" style="background-color: <?= $item->flag ?>;"></div>
							<input type="checkbox" class="group-item-checkbox">
							<div class="group-item-text"><?= $item->name ?></div>
							<div class="group-item-score">+<?= $item->score ?></div>
						</div>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
			</div>

			<br>
			<div style="padding: 20px;">
				<small>Total Score</small>
				<br>
				<span style="font-size: 40px;font-weight: bolder;"><span id="myCounter">0</span>/<span id="totalScore"></span></span>
				<div class="progress">
					<div class="progress-bar" id="progressbar" role="progressbar" style="width: 0%" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>

			<div>
				<small>Individual Scores</small>
				<div id="labelScores">
					<!-- Labels and scores will be populated here dynamically -->
				</div>
			</div>

			<!-- Flags -->
			<div id="flags">
				Flags<br>
				Yellow Flags missed: <span id="yellowFlags">None</span><br>
				Red Flags missed: <span id="redFlags">None</span>
			</div>

			<button id="submitButton">Submit</button>


		  
		  <?php 
		  if (logged_in()) {
		  	?>
		  	<div style="display: flex;justify-content:space-between;background:rgb(0,0,0,0.05);padding:20px">
				<div>
					<?php
					// check if user has saved score
					$score_sql = mysqli_query($conn, "SELECT * FROM saved_scores WHERE email='".$_SESSION['email']."' AND resource_id='$id'");
					$score = mysqli_num_rows($score_sql);
					if ($score>0) {
						$score = mysqli_fetch_assoc($score_sql);
						echo "<div style='margin-bottom: 5px;'><span id='text1'>Your previous score was ".$score['score'].".</span> <a href='../dashboard/score-history'>View Score History</a></b></div>";
						echo "<b id='text2'>Update this score</b>";
					}else{
						echo "<b id='text2'>Would you like to save this score?</b>";
						echo "<div style='margin-top: 5px;'><a href='../dashboard/score-history'>View Score History</a></b></div>";
					}
					?>

				</div>

			<div>
				<div class="banner-text3" onclick="submitScore('like2')" id="like2" style="cursor:pointer;margin-top: 0px;">
					<?php if ($score>0) {
						echo "Update Score";
					}else{
						echo "Save Score";
					} ?>
					<i class='bx bxs-bar-chart-alt-2'></i>
				</div>

			</div>
			</div>

			<script type="text/javascript">
				function submitScore(e){
					$.post("", {save_score: <?php echo $id; ?>, score: count, total_score: totalScore}, function(res){
						console.log(res);
						if (res=='saved') {
							$("#"+e).css("background", "none");
							$("#"+e).css("box-shadow", "none");
							$("#"+e).html("Saved! <i class='bx bxs-like' ></i>");


							$("#text1").html("");
						}
						$("#text1").html("");
						$("#text2").html("Your score has been updated.");
					})
				}
			</script>
			<?php }else{
				echo "<div class='disclaimer'>Please <a href='../login'>login</a> to save your score.</div>";
			} ?>




		  </div>
				  

<script>

document.addEventListener('DOMContentLoaded', () => {
    const totalScoreElement = document.getElementById('myCounter');
    const totalProgressBar = document.getElementById('progressbar');
    const labelScores = {};
    const missedFlags = { yellow: [], red: [] };
    let totalScore = 0;
    const totalMaxScore = <?php 
	$totalscore = 0;
	foreach ($c['mark_scheme'] as $group) {
		foreach ($group->items as $item) {
			$totalscore += $item->score;
		}
	}
	echo $totalscore;
	?>;
	document.getElementById('totalScore').textContent = totalMaxScore;


    document.querySelectorAll('.group-item-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const item = this.closest('.group-item');
            const group = item.closest('.mark-scheme-group');
            const score = parseInt(item.getAttribute('data-score'));
            const flag = item.getAttribute('data-flag');
            const labels = item.getAttribute('data-labels').split(',');

            // Update score
            if (this.checked) {
                totalScore += score;
                group.dataset.groupScore = parseInt(group.dataset.groupScore) + score;
                item.classList.add('strikethrough');

                // Update labels
                labels.forEach(label => {
                    if (!labelScores[label]) labelScores[label] = 0;
                    labelScores[label] += score;
                });
            } else {
                totalScore -= score;
                group.dataset.groupScore = parseInt(group.dataset.groupScore) - score;
                item.classList.remove('strikethrough');

                // Update labels
                labels.forEach(label => {
                    labelScores[label] -= score;
                    if (labelScores[label] < 0) labelScores[label] = 0;
                });
            }

            // Update group and total scores
            totalScoreElement.textContent = totalScore;
            totalProgressBar.style.width = `${(totalScore / totalMaxScore) * 100}%`;

            // Update group score
            const groupScoreElement = group.querySelector('.group-score-value');
            const groupProgressElement = group.querySelector('progress');
            groupScoreElement.textContent = group.dataset.groupScore;
            groupProgressElement.value = group.dataset.groupScore;

            // Update individual label scores
            updateLabelScores();

            // Check for missed flags
            checkMissedFlags(flag, item, this.checked);
        });
    });

    function updateLabelScores() {
        const labelScoresContainer = document.getElementById('labelScores');
        labelScoresContainer.innerHTML = '';  // Clear previous scores

        for (const [label, score] of Object.entries(labelScores)) {
            const progress = document.createElement('div');
            progress.className = 'progress';

            const progressBar = document.createElement('div');
            progressBar.className = 'progress-bar';
            progressBar.style.width = `${(score / totalMaxScore) * 100}%`;

            progress.appendChild(progressBar);

            const labelHeader = document.createElement('div');
            labelHeader.className = 'label-header';
            labelHeader.innerHTML = `<div class="label-text">${label}</div><div class="label-score">${score}</div>`;

            labelScoresContainer.appendChild(labelHeader);
            labelScoresContainer.appendChild(progress);
        }
    }

    function checkMissedFlags(flag, item, checked) {
        const description = item.querySelector('.group-item-text').textContent;

        if (flag === 'yellow' && !checked) {
            missedFlags.yellow.push(description);
        } else if (flag === 'red' && !checked) {
            missedFlags.red.push(description);
        } else {
            const indexYellow = missedFlags.yellow.indexOf(description);
            if (indexYellow > -1) missedFlags.yellow.splice(indexYellow, 1);

            const indexRed = missedFlags.red.indexOf(description);
            if (indexRed > -1) missedFlags.red.splice(indexRed, 1);
        }

        document.getElementById('yellowFlags').textContent = missedFlags.yellow.join(', ') || 'None';
        document.getElementById('redFlags').textContent = missedFlags.red.join(', ') || 'None';
    }

    document.getElementById('submitButton').addEventListener('click', () => {
        const data = {
            totalScore: totalScore,
            groupScores: {},
            labelScores: labelScores,
            missedFlags: missedFlags
        };

        document.querySelectorAll('.mark-scheme-group').forEach(group => {
            data.groupScores[group.dataset.group] = group.dataset.groupScore;
        });

        // You can send the data object to the server using fetch or AJAX
        console.log(data);
    });
});


</script>