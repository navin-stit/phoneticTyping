<?php
if ($handle = opendir('.')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && $entry != "library_sound_lesson.php" && $entry != "library_sound_lesson_20140825.txt") {
            echo str_replace("_","",substr($entry,0,strpos($entry,"."))) . "=" . $entry;
			echo "\n";
        }
    }
    closedir($handle);
}
?>
