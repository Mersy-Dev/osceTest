<?php $url = "http://localhost/mercy/osce/html"; ?>


<link rel="stylesheet" href="<?php echo $url; ?>/dashboard/assets/dashboard.css?v=5">
<link rel="stylesheet" href="<?php echo $url; ?>/dashboard/assets/account.css?v=5">
<?php

$page_title = "Dashboard";
$nav = "Dashboard";



require_once "header.php";

?>



<div class="content content-dark">

  <br>

  <?php if (!$darkMode) { ?>
    <div class="disclaimer" style="padding-bottom: 2px;"><i class='bx bxs-hot'></i> Have you tried the new Dark Mode?

      <label style="cursor:pointer">
        <label class="switch footer-switch">
          <input type="checkbox" id="toggleMode2" <?php echo $darkMode ? 'checked' : ''; ?>>
          <span class="slider round"></span>
        </label> <i class='bx bx-moon' style="transform:translateY(3px)"></i>
      </label>
    </div>
    <script>
      $('#toggleMode2').change(function () {
        let darkMode = this.checked ? 'true' : 'false';
        document.cookie = "darkmode=" + darkMode + "; path=/; max-age=31536000";
        $.post("../index", { darkmode: darkMode }, function (result) {
          location.reload();
        });
      });
    </script>
  <?php } ?>

  <div class="row" style="width:99%">



    <div class="col-md-8">

      <div class="index-pill">
        <div style="font-size:25px">Good
          <?php
          $hour = date('H');
          echo $dayTerm = ($hour > 17) ? "evening" : (($hour > 12) ? "afternoon" : "morning");
          ?> <?php echo isset($_SESSION['first_name']) ? $_SESSION['first_name'] . '!' : ''; ?>
          👋
        </div>
        <!-- <div>Stay organised and motivated with this dashboard. See your liked resources plus a daily dose of inspiration.</div> -->

        <div>We are super stoked to recommend this amazing Pharmacy Crossword book by our friends, Kainat & Aliya.
          Explore further and show your support by visiting <a href="http://amzn.eu/d/7pmXhXN"
            style="text-decoration: underline;" target="_blank">here</a>.

          <br>
          <br>
          Also, feel free to test your knowledge on the free crossword sample provided below!
        </div>

      </div>

      <br>


    </div>

    <div class="col-md-4">

      <?php
      $quotes = file("../../quotes.txt");
      $rand = array_rand($quotes);
      ?>
      <div class="quote">
        <?php echo str_replace('"', '', trim(explode(' - ', $quotes[$rand])[0])); ?>
        <br>
        <i>- <?php echo trim(explode('-', $quotes[$rand])[1]); ?></i>
      </div>


    </div>


    <!-- crossword -->
    <div class="col-12">
      <br>

      <iframe src="<?php echo $url; ?>dashboard/crossword" frameborder="0"
        style="width: 100%;height:700px;background:rgb(0,0,0,0.0);margin-bottom:40px" id="crosswordIframe">
      </iframe>
    </div>

    <style>
      @media only screen and (max-width: 900px) {

        #crosswordIframe {
          display: none;
        }
      }
    </style>

    <script>
      window.addEventListener('message', function (event) {
        var iframe = document.getElementById('crosswordIframe');

        // Check if the user is on a MacBook
        var isMacBook = /Macintosh|MacIntel|MacPPC|Mac68K/.test(navigator.platform) &&
          /Safari/.test(navigator.userAgent) &&
          !/Chrome/.test(navigator.userAgent);

        // Apply different height adjustment for MacBook users
        if (isMacBook) {
          // iframe.style.height = event.data.height + 20 + 'px'; // Example adjustment for MacBook
        } else {
          iframe.style.height = event.data.height + 10 + 'px';
        }
      }, false);
    </script>

    <!-- end crossword -->


    <div class="col-md-8">


      <!-- <h5 style="padding-left: 20px;">Question of the day:</h5> -->
      <?php
      $streak_query = mysqli_query($conn, "SELECT last_date, streak_count FROM daily_streak WHERE email='$email'");

      $streak = 0;
      $today = date("Y-m-d");
      $yesterday = date("Y-m-d", strtotime("yesterday"));
      if ($streak_query->num_rows == 1) {
        $streak_assoc = mysqli_fetch_assoc($streak_query);
        $streak = $streak_assoc['streak_count'];
        if ($streak_assoc['last_date'] !== $yesterday and $streak_assoc['last_date'] !== $today) {
          mysqli_query($conn, "UPDATE daily_streak SET streak_count=0 WHERE email='$email'");
          $streak = 0;
        }
      }

      ?>
      <div style="padding:20px">

        <div class="your-streak-row"
          style="display: flex; justify-content: space-between; gap: 20px; align-items: flex-start; flex-wrap: wrap;">

          <!-- Your Streak Box -->
          <div class="your-streak-box"
            style="border: 2px solid #ddd; border-radius: 10px; padding: 20px; width: 120px; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
            <div class="your-streak-box-top" style="font-size: 16px; font-weight: 600; margin-bottom: 10px;">Your Streak
            </div>
            <div class="your-streak-box-number" id="streakCount" style="font-size: 10px; font-weight: 300;">
              <?php echo $streak; ?>
            </div>
          </div>

          <!-- Top Streak Members -->
          <div class="streak-right" style="flex-grow: 1;">
            <div class="streak-top"
              style="font-weight: bold; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center;">
              TOP STREAK MEMBERS
              <label style="font-weight: normal; font-size: 14px;">
                <input type="checkbox" />
                Show my streak publicly
              </label>
            </div>

            <div class="streak-avatar-row" style="display: flex; gap: 20px;">
              <?php
              $day_before = date("Y-m-d", strtotime("-2 days"));
              $streak_board = mysqli_query($conn, "SELECT * FROM daily_streak WHERE last_date>'$day_before' ORDER BY streak_count DESC LIMIT 0,4");

              $rank = 1;
              $trophies = ['🥇', '🥈', '🥉', '🎖️'];
              while ($x = mysqli_fetch_assoc($streak_board)) {
                ?>
                <div class="streak-profile" style="text-align: center;">
                  <div class="streak-avatar" style="font-size: 30px;"><?php echo $trophies[$rank - 1]; ?></div>
                  <div style="font-weight: bold;"><?php echo $x['streak_count']; ?></div>
                  <div style="font-size: 14px;"><?php echo $x['first_name']; ?></div>
                </div>
                <?php $rank++;
              } ?>
            </div>
          </div>

          <!-- Countdown Timer -->
          <div id="countdown"
            style="margin-top: 10px; font-weight: bold; font-size: 14px; border: 2px solid #ddd; border-radius: 10px; padding: 20px; width: 100%; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
            <div style="display: flex; gap: 15px; align-items: center; justify-content:  space-between;">

              <p style="margin: 0;">The question expires in:</p>

              <div style="display: flex; gap: 5px;">
                <div
                  style="background-color: #f88a9d; color: white; padding: 10px 15px; border-radius: 5px; font-weight: bold; text-align: center;">
                  <span id="hours">00</span>
                  <div style="font-size: 12px;">Hours</div>
                </div>
                <div
                  style="background-color: #f88a9d; color: white; padding: 10px 15px; border-radius: 5px; font-weight: bold; text-align: center;">
                  <span id="minutes">00</span>
                  <div style="font-size: 12px;">Minutes</div>
                </div>
                <div
                  style="background-color: #f88a9d; color: white; padding: 10px 15px; border-radius: 5px; font-weight: bold; text-align: center;">
                  <span id="seconds">00</span>
                  <div style="font-size: 12px;">Seconds</div>
                </div>
              </div>

            </div>
          </div>

        </div>


        <br>
        <div style="font-size: 12px;font-weight: bolder;">Answer questions daily to maintain your streak!</div>

        <br>

        <div id="question" style=""></div>
        <br>

        <label style="width:100%" for="option-a-input">
          <div class="option">
            <input id="option-a-input" type="radio" name="answer" value="A">
            <span id="option-a"></span>
          </div>
        </label>

        <label style="width:100%" for="option-b-input">
          <div class="option">
            <input id="option-b-input" type="radio" name="answer" value="B">
            <span id="option-b"></span>
          </div>
        </label>

        <label style="width:100%" for="option-c-input">
          <div class="option">
            <input id="option-c-input" type="radio" name="answer" value="C">
            <span id="option-c"></span>
          </div>
        </label>

        <label style="width:100%" for="option-d-input">
          <div class="option">
            <input id="option-d-input" type="radio" name="answer" value="D">
            <span id="option-d"></span>
          </div>
        </label>

        <label style="width:100%" for="option-e-input">
          <div class="option">
            <input id="option-e-input" type="radio" name="answer" value="E">
            <span id="option-e"></span>
          </div>
        </label>

        <div class="clear"></div>
        <br>
        <button id="submit-answer" class="main-search-btn">Check Answer</button>

        <div class="alert alert-light" id="answer" style="margin-top:20px;display: none;">
          <div id="answer-feedback" style="">Select an option</div>
          <br>
          <p id="explanation"></p>
        </div>

      </div>


      <script type="text/javascript">
        // Fetch the question data from the PHP server
        fetch('page-loader/mcq')
          .then(response => response.json())
          .then(questionData => {
            // If question is already locked (e.g., already answered)
            if (questionData.status === "locked") {
              document.getElementById("question").textContent = "You’ve already answered today’s question. Come back tomorrow!";
              document.querySelectorAll("label").forEach(el => el.style.display = "none");
              document.getElementById("submit-answer").style.display = "none";
              return;
            }

            // Populate question and options
            document.getElementById("question").textContent = questionData.question;
            document.getElementById("option-a").textContent = "A. " + questionData.options.A;
            document.getElementById("option-b").textContent = "B. " + questionData.options.B;
            document.getElementById("option-c").textContent = "C. " + questionData.options.C;
            document.getElementById("option-d").textContent = "D. " + questionData.options.D;
            document.getElementById("option-e").textContent = "E. " + questionData.options.E;

            // Submit button logic
            document.getElementById("submit-answer").addEventListener("click", function () {
              var selectedInput = document.querySelector("input[name='answer']:checked");
              if (!selectedInput) {
                alert("Please select an answer.");
                return;
              }

              var selectedAnswer = selectedInput.value;

              // Prevent multiple submissions
              document.getElementById("submit-answer").disabled = true;

              // Post selected answer
              $.post("page-loader/mcq", { streak: selectedAnswer }, function (response) {
                // Show updated streak
                document.getElementById('streakCount').innerHTML = "<span style='font-size: 0.85rem; color: #555; font-style: italic;'>Current Streak: " + response + "</span>";
                $("#answer").slideDown();

                // Check if the answer is correct
                var isCorrect = (selectedAnswer === questionData.correctAnswer);

                // Show feedback
                document.getElementById("answer-feedback").textContent = isCorrect
                  ? "Correct!"
                  : "Incorrect! The correct answer is: " + questionData.correctAnswer;

                document.getElementById("explanation").textContent = questionData.explanation;

                // Highlight answers
                var correctOption = document.querySelector("label[for='option-" + questionData.correctAnswer.toLowerCase() + "-input']");
                correctOption.style.color = "green";
                correctOption.style.fontWeight = "bold";

                if (!isCorrect) {
                  var selectedLabel = document.querySelector("label[for='option-" + selectedAnswer.toLowerCase() + "-input']");
                  selectedLabel.style.color = "red";
                }

                // Lock the question
                document.querySelectorAll("input[name='answer']").forEach(el => el.disabled = true);
              });
            });
          })
          .catch(error => {
            console.error('Error fetching question:', error);
            document.getElementById("question").textContent = "Failed to load question. Please try again later.";
          });
      </script>


      <script>
        function updateCountdown() {
          const now = new Date();
          const deadline = new Date();
          deadline.setHours(24, 0, 0, 0); // Midnight

          const diff = deadline - now;

          const hours = String(Math.floor(diff / (1000 * 60 * 60))).padStart(2, '0');
          const minutes = String(Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
          const seconds = String(Math.floor((diff % (1000 * 60)) / 1000)).padStart(2, '0');

          document.getElementById("hours").textContent = hours;
          document.getElementById("minutes").textContent = minutes;
          document.getElementById("seconds").textContent = seconds;
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
      </script>






    </div>




    <div class="col-md-4">

      <div id="update_exam_date" class="dashboard-card" style="padding: 20px;">
        <div style="border-bottom: 10px;margin-bottom: 10px;">When is your exam?</div>
        <form method="post">
          <input type="date" class="form-control" name="exam_date">
          <br>
          <button class="btn btn-primary" type="submit">UPDATE</button>
        </form>
      </div>

      <?php
      if (post('exam_date')) {
        $exam_date = strtotime(filter_input(INPUT_POST, 'exam_date', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        if ($exam_date) {
          $squery = mysqli_query($conn, "UPDATE user_info SET exam_date='$exam_date' WHERE email='$email'");
          if ($squery) {
            $exam_date = $exam_date;
          }
        }
      }

      $time = time();
      if (!empty($exam_date) and $time < $exam_date) {
        $days_left = number_format(($exam_date - $time) / (60 * 60 * 24));

        ?>
        <script type="text/javascript">
          document.getElementById('update_exam_date').style.display = "none";
          function showDatePicker() {
            document.getElementById('update_exam_date').style.display = "block";
            document.getElementById('exam_date').style.display = "none";
          }
        </script>

        <div style="background: #fff;padding: 20px;" id="exam_date">
          <small>Days to exam</small>
          <div style="float:right;cursor: pointer;" onclick="showDatePicker()"><i class='bx bx-edit-alt'></i></div>
          <br>
          <span style="font-size: 40px;font-weight: bolder;"><?php echo $days_left; ?></span>
          <div class="progress">
            <div class="progress-bar" role="progressbar"
              style="width: <?php echo number_format(((150 - $days_left) / 150) * 100, 5); ?>%;background:#31afb4"
              aria-valuenow="<?php echo number_format((150 - $days_left) / 100); ?>" aria-valuemin="0"
              aria-valuemax="100">
            </div>
          </div>

        </div>
      <?php } ?>

      <br>


      <a
        href="https://oscetoolbox.us21.list-manage.com/subscribe/post?u=e35f3ec3cf5ff662229e194c3&id=cf2ce7769e&f_id=00fdede6f0">
        <div class="home-card">

          <div class="home-card-hover"></div>
          <div style="position:absolute;bottom: 20px;width: 100%;;">
            <center>
              <!-- <a href="https://discord.gg/PA4nS4yPSr">  -->
              <!-- <div style="display:inline-block;background: rgb(0, 0, 0, 0.7);color: #fff;padding: 10px 20px;border-radius: 10px;"><i class='bx bxl-discord-alt'></i> Join the Discord</div> -->
            </center>
          </div>
      </a>

    </div>

    <br><br>


    <div class="quote dashboard-card" style="word-wrap:break-word">
      <div style="font-size: 14px;font-weight: bolder;margin-bottom:10px">
        <a style="color:#EF798A;text-decoration:underline"
          href="https://docs.google.com/forms/d/e/1FAIpQLSc9Abxf01DkovB_SpxffwirhdJc2RFHWbRFrO7Ho-0uklD3zg/viewform?usp=sf_link"
          target="_blank">Sign Up to be an Ambassador here.</a>
      </div>
      <div style="font-size: 12px;">Your referral number</div>
      <div class="dashboard-card-bignum"><?php echo $user_info['id']; ?></div>

      <a href="<?php echo $url; ?>referral?r=<?php echo $user_info['id']; ?>" id="refurl">
        <div class="dashboard-card-small-link" target="_blank">
          <?php echo $url; ?>referral?r=<?php echo $user_info['id']; ?>
        </div>
      </a>

      <div id="copy" style="font-size: 12px;cursor:pointer;" onclick="copyToClipboard()"><i class="bx bx-copy"></i> Copy
      </div>

      <script>
        function copyToClipboard() {
          var copyText = document.getElementById("refurl").href;  // Get the href attribute of the link
          console.log(copyText);
          navigator.clipboard.writeText(copyText).then(function () {
            console.log('Copying to clipboard was successful!');
            document.getElementById('copy').innerHTML = '<i class="bx bx-check"></i> Copied';
          }, function (err) {
            console.error('Could not copy text: ', err);
          });
        }
      </script>

    </div>

    <br><br><br><br>
  </div>




</div>





</div>



<?php require "footer.php"; ?>