<?php 
session_start();
require_once("../typingadmin/koneksi.php");

//echo '<pre>';print_r($_SESSION);die;

if(empty($_SESSION['username'])){
	$url = "http://localhost/phonetictyping/";
	header("Location: ".$url);exit();
}

//$file = file_get_contents('../lessons.txt', true);
//$arr = explode("\n", $file);
//echo count($arr);
//echo '<pre>';print_r($arr);die;
$files = array();
$dir = "../voice/letters/";
// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
     
	while (($file = readdir($dh)) !== false){
		$ex = explode('.',$file);	
		$files[$ex[0]] = $file;
	}
	closedir($dh);
  }
}//echo '<pre>';print_r($files);exit;
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">

        <title>Virtual Keyboard</title>

        <!-- jQuery (required) & jQuery UI + theme (optional) -->
        <link href="docs/css/jquery-ui.min.css" rel="stylesheet">
        <!-- still using jQuery v2.2.4 because Bootstrap doesn't support v3+ -->
        <script type="text/javascript" src="../js/jquery-latest.min.js"></script>
        <script type="text/javascript" src="docs/js/jquery-ui.min.js"></script>
        <!-- <script src="docs/js/jquery-migrate-3.0.0.min.js"></script> -->

        <!-- keyboard widget css & script (required) -->
        <link href="css/keyboard.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery.keyboard.js"></script>

        <!-- keyboard extensions (optional) -->
        <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="js/jquery.keyboard.extension-typing.js"></script>
        <script type="text/javascript" src="js/jquery.keyboard.extension-autocomplete.js"></script>
        <script type="text/javascript" src="js/jquery.keyboard.extension-caret.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/virtual-keyboard/1.28.9/js/jquery.keyboard.extension-mobile.min.js
"></script>

        <!-- demo only -->
        <link rel="stylesheet" href="docs/css/bootstrap.min.css">
        <link rel="stylesheet" href="docs/css/font-awesome.min.css">
        <link href="docs/css/demo.css" rel="stylesheet">
        <link href="docs/css/tipsy.css" rel="stylesheet">
        <link href="docs/css/prettify.css" rel="stylesheet">
        <script type="text/javascript" src="docs/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="docs/js/demo.js"></script>

        <script type="text/javascript" src="docs/js/jquery.tipsy.min.js"></script>
        <script type="text/javascript" src="docs/js/prettify.js"></script>
        <!-- syntax highlighting -->
        <style>
        .ui-keyboard-preview {
            font-size: 22px !important;
            font-weight: 600;
            text-align: center;
            color: #000;
        }

        .ui-state-hover {
            border: 1px solid #666;
            background: #555 url(images/ui-bg_glass_20_555555_1x400.png) 50% 50% repeat-x;
            font-weight: bold;
            color: #eee;
        }

        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999991;
            background: url('../images/pageLoader.gif') 50% 50% no-repeat rgb(249, 249, 249);
            opacity: .8;
        }
        .dnone {
            display: block;
        }
        </style>
    </head>

    <body class="custombackground">
        <div class="loader"></div>

        <div id="page-wrap">
            <input type="hidden" id="keyboardUrl" value="http://localhost/phonetictyping/">
            <input type="hidden" id="textTypingCount" value="0">
            <input type="hidden" id="lesson_type_text"
                value="<?php echo (isset($_SESSION['lesson_type_text']) && !empty($_SESSION['lesson_type_text']))?$_SESSION['lesson_type_text']:""?>">
            <input type="hidden" id="lesson_id"
                value="<?php echo (isset($_SESSION['lesson_id']) && !empty($_SESSION['lesson_id']))?$_SESSION['lesson_id']:""?>">

            <audio class="yes-audio">
                <source
                    src="http://localhost/phonetictyping/voice/lessons/Lesson_<?php echo $_SESSION['lesson_id'];?>.mp3"
                    type="audio/mpeg"></audio>

            <div class="datacontainer">
                <div class="col-xs-12 col-sm-7 col-md-7 pdleft">
                    <div class="headingarea">
                        <h1><?php echo (isset($_SESSION['lesson_name']) && !empty($_SESSION['lesson_name']))?$_SESSION['lesson_name']:""?>
                        </h1>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 pdright">
                    <div class="headingarea">
                        <h2>Logged in as :
                            <span><?php echo (isset($_SESSION['username']) && !empty($_SESSION['username']))?$_SESSION['username']:""?></span>
                        </h2>
                        <h3><?php echo date('l')?>&nbsp;&nbsp;&nbsp;<?php echo date('F j Y')?></h3>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 nopadding text-center">
                    <div class="datacontent"
                        <?php echo (isset($_SESSION['lesson_type_text']) && $_SESSION['lesson_type_text']=="assessment")?"style='font-size:14px;'":"";?>>
                    </div>
                    <div class="assessment_datacontent" style="display:none;">
                        <?php echo (isset($_SESSION['assessment_lesson_text']) && !empty($_SESSION['assessment_lesson_text']))?$_SESSION['assessment_lesson_text']:""?>
                    </div>
                </div>


                <div class="block">
                    <!--<h2>
			<span class="tooltip-tipsy" title="Click, then scroll down to see this code">Custom: Lockable</span>
		</h2>-->
                    <input id="lockable" type="text">
                    <br>
                </div>

                <div class="hand dnone">
                    <div class="lefthand"><img src="hand-left.png"></div>
                    <div class="righthand"><img src="hand-right.png"></div>
                    <div class="review-wraper">
                        <div class="col-xs-12 col-sm-12 col-md-12  text-center">
                            <div class="headingarea" id="progresView">
                                <a href="lesson-result.php">Review Current Progress</a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12  text-center">
                            <div class="headingarea">
                                <a href="../prottotype.php">Return to Lesson Menu</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="showcode"></div>
            </div>
        </div>
    </body>

    <script type="text/javascript" src="https://code.createjs.com/1.0.0/soundjs.min.js"></script>
    <script type="text/javascript">
    var soundobjects = [];
    </script>
    <?php if(isset($_SESSION['lesson_type_text']) && ($_SESSION['lesson_type_text']=="sentence")){
	
		$text = ((isset($_SESSION['lesson_show_text']) && !empty($_SESSION['lesson_show_text']))?$_SESSION['lesson_show_text']:"");
?>
    <script type="text/javascript">
    $('input.ui-keyboard-preview').css('display', 'none');
    $(".datacontent").html('&nbsp;');
    $(".ui-keyboard-preview-wrapper").append('<?php echo $text;?>');
    </script>
    <?php }else{
	
		$text = ((isset($_SESSION['lesson_show_text']) && !empty($_SESSION['lesson_show_text']))?$_SESSION['lesson_show_text']:"");
		?>
    <script type="text/javascript">
    $('input.ui-keyboard-preview').css('display', 'block');
    $(".datacontent").html('<?php echo $text;?>');
    </script>

    <?php } ?>
    <?php $c = count($files);
	if(isset($files) && !empty($files)){
		$i=1;
		//print_r($files);
		foreach($files as $k=>$v){
			if(!empty($k) && !empty($v)){
				?>
    <script type="text/javascript">
    var obj = {};
    obj['id'] = '<?php echo $k;?>';
    obj['src'] = '<?php echo $v;?>';
    soundobjects.push(obj);
    </script>
    <?php $i++;
			}
		}
	} ?>
    <script>
    $(document).ready(function() {
        var sounds = soundobjects;
        createjs.Sound.alternateExtensions = ["mp3"];
        createjs.Sound.addEventListener("keypress", handleLoad);
        createjs.Sound.registerSounds(sounds, "<?php echo $dir;?>");

        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
        $.browser.device = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator
            .userAgent.toLowerCase()));
        if (isMobile) {
            $('#lessiontext').attr("disabled", true);
            $('#lessiontext').on('focus', function() {
                $(this).trigger('fadeIn');
            });
        }
    });
    </script>

    <script>
  
    </script>


    <script type="text/javascript" src="http://localhost/phonetictyping/typing/js/script.js"></script>
    <script>
    function func1() {
        $(".loader").fadeOut("slow");
    }
    window.onload = func1;
    </script>

</html>
