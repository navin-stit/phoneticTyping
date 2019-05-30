<!DOCTYPE html>
<html>
    <head>
        <title>sample</title>
    </head>
 
    <body>
        <script src="https://code.createjs.com/1.0.0/soundjs.min.js"></script>
        <script>
		//var audioPath = "voice/lessons/";
		var audioPath = "voice/letters/";
		var sounds = [
			{id:"a", src:"ai.mp3"},
			//{id:"Lesson_1", src:"Lesson_1.mp3"}
		];

		createjs.Sound.alternateExtensions = ["mp3"];
		createjs.Sound.addEventListener("fileload", handleLoad);
		createjs.Sound.registerSounds(sounds, audioPath);

		function handleLoad(event) {
		//alert(event);
			createjs.Sound.play('a');
		}
        </script>
    </body>
</html>