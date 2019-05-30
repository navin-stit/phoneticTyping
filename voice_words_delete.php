<?php
//print_r($_POST);
unlink("voice/words/".$_POST['filename']);
unlink("typing/voice/allsounds/".$_POST['filename']);
?>