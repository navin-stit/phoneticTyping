<div class="clearfix"></div>

<script src="<?php echo _DIR_PATH_;?>keyboard/js/jquery-3.3.1.min.js"></script>
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