<?php
ob_start();
session_start();
ob_end_clean();
session_destroy();

echo "<script>window.location='index.php'</script>";
?>