

</div>



<script>
function openNav() {
  document.getElementById("mySidebar").style.marginLeft = "0px";
  document.getElementById("main").style.marginLeft = "250px";
  document.getElementById("openHamburger").style.display = "none";
  document.getElementById("closeHamburger").style.display = "block";
}

function closeNav() {
  document.getElementById("mySidebar").style.marginLeft = "-250px";
  document.getElementById("main").style.marginLeft= "0px";
  document.getElementById("openHamburger").style.display = "block";
  document.getElementById("closeHamburger").style.display = "none";
}

$('#searchInput').blur(function() {
  $('#search-result-div').fadeOut('fast');

});

$('#searchInput').focus(function() {
  $('#search-result-div').fadeIn('fast');
});

$('#searchInput').on("input", function() {

  if($("#searchInput").val()!=''){
  $.post("page-loader/page-search-count.php", {q: $("#searchInput").val()}, function(result){
    $("#search-result-div").html(result);
  });
}else{
    $("#search-result-div").html("<i class='icofont-search'></i> &nbsp; Search Files ");
  }
  
});


</script>



</body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/640c8fcc4247f20fefe54ba1/1gr8h3e2b';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</html>