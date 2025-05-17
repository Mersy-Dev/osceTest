<?php ?>


</div>



<?php if (!empty(unserialize($file['content'])['flashcards'])){ ?>
<div class="content" style="margin-top:0;padding: 0;background: none;">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<style type="text/css">
	.owl-nav{
		text-align: center;
	}

    .owl-carousel .nav-button {
      height: 50px;
      width: 50px;
      cursor: pointer;
/*      position: absolute;*/
/*      top: 110px !important;*/
      background: #fff;
      border:2px solid black;
      color: black;
      font-size: 30px;
      margin: 10px;
      box-shadow: 5px 5px 0 0 #EF798A;
      font-weight: bolder;
    }

    .owl-carousel .owl-prev.disabled,
    .owl-carousel .owl-next.disabled {
      pointer-events: none;
      opacity: 0.25;
    }

    .owl-carousel .prev-carousel:hover {
      background-position: 0px -53px;
    }
    .owl-carousel .next-carousel:hover {
      background-position: -24px -53px;
    }

</style>


<?php 

$flashcards = array();
preg_match_all('/<table.*?>(.*?)<\/table>/s', unserialize($file['content'])['flashcards'], $matches);
 ?>

<div class="owl-carousel">

<?php 

$flash_n=1;
foreach ($matches[1] as $match) {
    preg_match_all('/<tr.*?>(.*?)<\/tr>/s', $match, $rows);
    $front = strip_tags($rows[1][0]);
    $back = strip_tags($rows[1][1]);
    // array_push($flashcards, array($front, $back));

 ?>
	<div onclick="flipCard(<?php echo $flash_n; ?>)" id="card<?php echo $flash_n; ?>" class="item content-flashcard">
		<input type="hidden" id="cardFlip<?php echo $flash_n; ?>" value="no">
		<div class="card-owl" id="cardFront<?php echo $flash_n; ?>"><?php echo $front;?></div>
		<div class="card-owl card-owl2" id="cardBack<?php echo $flash_n ?>"><?php echo $back; ?></div>
	</div>
<?php 
	$flash_n++;
	} ?>

</div>




<script>

    $('.owl-carousel').owlCarousel({
      loop:false,
      margin:10,
      nav:true,
      navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
      responsive:{
          0:{
              items:1
          }
      }
    });

  function flipCard(e){
    if ($("#cardFlip"+e).val()=='no') {
      $("#cardFront"+e).css("transform","perspective(700px) rotateX(90deg)");

    	setTimeout(function(){
	      $("#cardFront"+e).css("display","none");
	      $("#cardBack"+e).css("display","flex");

	    	setTimeout(function(){
	      $("#cardBack"+e).css("transform","perspective(700px) rotateX(0deg)");
	    	}, 100);

    	}, 500);

      $("#cardFlip"+e).val('yes');
    } else {    	
      $("#cardBack"+e).css("transform","perspective(700px) rotateX(-90deg)");

    	setTimeout(function(){
	      $("#cardFront"+e).css("display","flex");
	      $("#cardBack"+e).css("display","none");

	    	setTimeout(function(){
	      $("#cardFront"+e).css("transform","perspective(700px) rotateX(0deg)");
	    	}, 100);

    	}, 500);

      $("#cardFlip"+e).val('no');
    }
  }


</script>

<br>
</div>

<?php } ?>


<div class="content" style="margin-top:0">

<style>
  .table-header {
    cursor: pointer;
    font-weight: bold;
  }

  .table-header i{
  	color: #EF798A;
    margin-bottom: 30px;
  }


  .table-content {
    display: none;
    margin-bottom: 30px;
    padding: 30px;
    padding-left: 30px;
    background: rgb(0, 0, 0, 0.01);
  }
</style>

<div id="cheatsheetContent">
	
<?php 
echo unserialize($file['content'])['content']; 
?>
</div>


<script>
  $(document).ready(function() {
    $('div #cheatsheetContent table').each(function() {
      var $table = $(this);
      var $rows = $table.find('tbody tr');
      var $headerRow = $rows.eq(0);
      var $contentRow = $rows.eq(1);
      var $headerText = $headerRow.find('td').text();
      var $contentText = $contentRow.find('td').html();
      var $header = $('<div>').addClass('table-header').text($headerText);
      $header.html(" <i class='bx bxs-right-arrow'></i> &nbsp; " + $headerText);
      var $content = $('<div>').addClass('table-content').html($contentText);
      
      $table.replaceWith([$header, $content]);
      
      $header.on('click', function() {
        $content.slideToggle('medium');
      });
    });
  });
</script>