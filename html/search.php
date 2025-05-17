<?php

  require_once "inc/conn.php";
  require_once "inc/variables.php";


  $uni_file = file_get_contents("inc/universities.json");
  $unis = json_decode($uni_file);

  require "header.php";

?>

<script src="https://cdn.lordicon.com/lordicon.js"></script>


<script type="text/javascript">
  document.getElementById("topMsg").style.display = "none";
  $('.custom-nav').css("top","10px");
</script>


<div style="">



    <div class="flex">
      <div class="left-side">

        <div class="box">
        <div onclick="$('#slide').slideToggle()">
          <div class="box-icon">
            <i class='bx bxs-chevron-down' ></i>
          </div>

    
        <div class="box-label">What do you want to see?</div>
        </div>

        <div id="slide">
        <br>
        <select id="category" class="form-control">
          <option value="all">All Categories</option>
          <option value="scenario" <?php echo get('category')=='scenario' ? 'selected':'';?>>Scenarios</option>
          <option value="cheatsheet"<?php echo get('category')=='cheatsheet' ? 'selected':'';?>>Info Capsules</option>
          <option value="video" <?php echo get('category')=='video' ? 'selected':'';?>>Videos</option>
        </select>

        <div style="display: none;">
        <div class="difficulty">
          <label for="difficulty" class="form-label">Difficulty</label>
          <select id="difficulty" class="form-control">
            <option value="">All</option>
            <option value="1">Easy</option>
            <option value="2">Intermediate</option>
            <option value="3">Expert</option>
          </select>
        </div>
        </div>


        <div class="bodySystem">
          <label for="bodySystem" class="form-label">Body System</label>
          <select id="bodySystem" class="form-control">
            <option value="">All</option>
            <option value="Cardiovascular">Cardiovascular</option>
            <option value="Dermatology">Dermatology</option>
            <option value="ENT">Ear, nose and throat</option>
            <option value="Endocrine">Endocrine</option>
            <option value="Gastrointestinal">Gastrointestinal</option>
            <option value="Haematology">Haematology</option>
            <option value="Immunology">Immunology</option>
            <option value="Infectious diseases">Infectious diseases</option>
            <option value="Mental health">Mental Health</option>
            <option value="Nervous system">Nervous system</option>
            <option value="Oncology">Oncology</option>
            <option value="Respiratory">Respiratory</option>
            <option value="Rheumatology">Rheumatology</option>
            <option value="Sexual Health">Sexual Health</option>
            <option value="Urology">Urology</option>
          </select>
        </div>

        <div class="stationType">
          <label for="stationType" class="form-label">Station Type</label>
          <select id="stationType" class="form-control">
            <option value="">All</option>
            <option value="Communication">Communication</option>
            <option value="Counselling on interactions">Counselling on interactions</option>
            <option value="Data Interpretation">Data Interpretation</option>
            <option value="Device counselling">Device counselling</option>
            <option value="Drug Chart">Drug Chart</option>
            <option value="Ethics">Ethics</option>
            <option value="Information giving">Information giving</option>
            <option value="Interaction with a healthcare professional">Interaction with a healthcare professional</option>
            <option value="Medical Emergency">Medical Emergency</option>
            <option value="Medication Counselling">Medication Counselling</option>
            <option value="Medicine Optimisation">Medicine Optimisation</option>
            <option value="New medicine service">New medicine service</option>
            <option value="Non-interactive">Non-interactive</option>
            <option value="OTC">OTC</option>
            <option value="Prescription checking">Prescription checking</option>
            <option value="Responding to symptoms">Responding to symptoms</option>
          </select>
        </div>

        <div class="resourceType">
          <label for="resourceType" class="form-label">Resource Type</label>
          <select id="resourceType" class="form-control">
            <option value="">All</option>
            <option value="Checklists">Checklists</option>
            <option value="Medication summary">Medication summary</option>
            <option value="Infographics">Infographics</option>
          </select>
        </div>


        <script type="text/javascript">

          // $($(".bodySystem")).hide();
          $($(".stationType")).hide();
          $($(".resourceType")).hide();

          <?php if(get('category')=='scenario' OR get('category')=='video'){ ?>
          $($(".stationType")).show();
          $($(".difficulty")).show();
          $($("#diagnosisLabel")).show();
          <?php }else{ ?>
            $($(".resourceType")).show();
            $($("#diagnosisLabel")).hide();
          <?php } ?>

          $("#category").on('change', function(){

            if ($("#category").val()=='scenario') {
              $($(".stationType, .difficulty, #diagnosisLabel")).show();
              $($(".resourceType")).hide();
              $($("#resourceType, #stationType, #bodySystem")).val("");
            }else{
              
            }
            
            if ($("#category").val()=='cheatsheet') {
              $($(".stationType, .difficulty, #diagnosisLabel")).hide();
              $($("#resourceType, #stationType, #bodySystem")).val("");
              $($(".resourceType")).show();
            }
            if ($("#category").val()=='video') {
              $($(".stationType")).show();
              $($(".difficulty, .resourceType, #diagnosisLabel")).hide();
            }

          })
        </script>


          <br>
          <a style="color:inherit;text-decoration:none"><button onclick="getResults()" style="width: 100%;font-size: 14px;background: rgb(0,0,0,0.5);color: #fff;border:0;margin-bottom: 20px;" class="btn btn-primary btn-rev">APPLY FILTER</button></a>

          </div>

        </div>



      </div>


      <div class="right-side">

      <div id="tags_div" style="display:none">

      <?php 
      $tag_id=1;
      foreach ($variables_tags as $u) {
        ?>
        <label class="tag-pill" for="tag<?php echo $tag_id;?>">
          <input type="checkbox" class="tag-pill-check" id="tag<?php echo $tag_id;?>" name="tag" value="<?php echo $u; ?>">
          <div class="tag-pill-text"><?php echo $u; ?></div>
        </label>
          <?php
          $tag_id++;
        }
       ?>
       <div class="clear"></div>

       </div>
       <div style="font-size:12px;color: #EF798A;cursor: pointer;display: none;" onclick="toggleTags()" id="tags_text"><i class='bx bxs-chevrons-up'></i> Hide tags</div>
       <script type="text/javascript">
         function toggleTags(){
          $('#tags_div').slideToggle();
          if ($('#tags_div').height() > 1) {
            $('#tags_text').html("<i class='bx bxs-chevrons-down' ></i> Show Tags");
          }else{
            $('#tags_text').html("<i class='bx bxs-chevrons-up' ></i> Hide Tags");
          }
         }

         // toggleTags();
       </script>
       <br>


      <form id="searchForm">
      <input type="text" name="q" id="searchQuery" style="" placeholder="Enter keyword..." value="<?php echo get('q');?>" class="main-search">

      <select style="display:none" id="search_type" class="main-search">
        <option value="search_titles">Search Titles</option>
        <option value="search_content">Search Content</option>
      </select>


      <button class="main-search-btn" id="searchFormBtn" type="submit"><i class='bx bx-search-alt'></i> </button> 
      </form>

      <div id="diagnosisLabel" style="float: right;margin-top:-30px;margin-right:30px">
        <!-- <label style="cursor:pointer;">
          <label class="switch footer-switch">
            <input type="checkbox" id="toggleDiagnosis">
            <span class="slider round"></span>
          </label> 
          <i class="bx bx-heart-square" style="transform:translateY(2px)"></i> Diagnosis
        </label> -->
      </div>


        <!-- <br>
        <br> -->
        <div id="right">
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

      </div>


    </div>







</div>
<br>
<br>
<br>



<script type="text/javascript">

  // hide diagnosis and only show when toggle is clicked
  $(".diagnosis").hide();

  $("#toggleDiagnosis").on('change', function(){
    if ($("#toggleDiagnosis").is(':checked')) {
      $(".diagnosis").show();
    }else{
      $(".diagnosis").hide();
    }
  })



  // TO-DO: Convert to serialize()

  $("#searchFormBtn").on('click', function(event){
    event.preventDefault();
    getResults();
  })

  $(".tag-pill-check").on('change', function(event){
    getResults();
  })

  var page = 1;

  function getResults(){


    if ($(window).width()<701) {
      $("#slide").slideToggle();
    }

    var tagValues = [];
    $('.tag-pill-check:checked').each(function() {
      tagValues.push($(this).val());
    });

    tagValues.push($("#bodySystem").val());
    tagValues.push($("#stationType").val());
    tagValues.push($("#resourceType").val());

    console.log(tagValues);


    $("#right").fadeOut(function(){

    $("#right").html("<br><br><br><br><br><center><lord-icon src='https://cdn.lordicon.com/anqzffqz.json' trigger='loop' style='width:100px;height:100px'></lord-icon><br>Hang on..</center><br><br><br><br><br><br><br><br><br><br><br><br>");
    });

    $("#right").fadeIn(function(){

      if($("#category").val()=='scenario'){ difficulty = $("#difficulty").val();}
      else{difficulty = "1";}

      $.post("dashboard/page-loader/page-search?page="+page, {search: 1, query: $("#searchQuery").val(), category: $("#category").val(), university: $("#university").val(), author: $("#author").val(), search_type: $("#search_type").val(), tags: tagValues, difficulty: difficulty}, function(result){
        $("#right").fadeOut(function(){
          $("#right").html(result);
          $("#right").fadeIn();

          if ($("#toggleDiagnosis").is(':checked')) {
            $(".diagnosis").show();
          }else{
            $(".diagnosis").hide();
          }

        });
      })
    });
  }

  getResults();

  $('#category, #bodySystem, #university, #resourceType, #stationType, #author, #difficulty').on('change', function(){
    getResults();
  })

</script>




</body>


<?php require "footer.php"; ?>