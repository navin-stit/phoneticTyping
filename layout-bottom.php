<div class="clearfix"></div>

<!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="slider_layout/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="slider_layout/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="slider_layout/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="slider_layout/js/mdb.min.js"></script>

  <script src="<?php echo _DIR_PATH_;?>keyboard/js/jquery.bxslider.min.js"></script>


  <script>
$(document).ready(function(){
  $('.slider1').bxSlider({
    pager: false,
    slideWidth: 63,
    minSlides: 1,
    maxSlides: 5,
    slideMargin: 10,
	moveSlides: 1,
	speed:1000,
	randomStart: false,	
  });
});
</script>
</body>
</html>