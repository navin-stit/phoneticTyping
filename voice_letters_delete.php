<?php
//print_r($_POST);
unlink("voice/letters/".$_POST['filename']);
unlink("typing/voice/allsounds/".$_POST['filename']);
?>