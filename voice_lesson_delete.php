<?php
//print_r($_POST);
unlink("voice/lessons/".$_POST['filename']);
unlink("typing/voice/allsounds/".$_POST['filename']);
?>