<?php
if ($handle = opendir('.')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && $entry != "library_sound_letters.php" && $entry != "library_sound_letters_20140826.txt") {
            echo substr($entry,0,strpos($entry,".")) . "=" . $entry;
			echo "\n";
        }
    }
    closedir($handle);
}
?>
