<?php
session_start();
$request_scheme = (isset($_SERVER['REQUEST_SCHEME']) && !empty($_SERVER['REQUEST_SCHEME']))?$_SERVER['REQUEST_SCHEME']:"";
$server_name = (isset($_SERVER['SERVER_NAME']) && !empty($_SERVER['SERVER_NAME']))?$_SERVER['SERVER_NAME']:"";
$request_url = (isset($_SERVER['REQUEST_URI']) && !empty($_SERVER['REQUEST_URI']))?$_SERVER['REQUEST_URI']:"";
$http_reffer = (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))?$_SERVER['HTTP_REFERER']:"";
$return_url = $request_scheme.'://'.$server_name.$request_url.'typing/';

if($http_reffer==$return_url){
	$user_name = (isset($_SESSION['username']) && !empty($_SESSION['username']))?$_SESSION['username']:"";
}else{
	session_destroy();
	$user_name = '';$return_url = 'javascript:void(0);';
}
require_once(dirname(__FILE__).'/header-top.php');

$file = file_get_contents('imageLoad.txt', true);
$arr = explode("\n", $file);
//$count = count($arr);
$gambar = "";
$detailGambar = "";
$folderPhoto = "images/";
?>
<style type="text/css">
.frst {
    width: 50%;

    height: 112px;

    float: left;
}

.sec {
    width: 50%;

    height: 112px;

    float: left;
    text-align: right;
}

.sec img {
    width: 150px;
}

.linkss {
    right: 0;
    position: absolute;
    padding: 0;
    height: 600px;
    overflow: scroll;
}

.linkss li {
    list-style: none;
}

.linkss li a {
    border: 1px solid #cecece;
    height: 26px;
    margin: 0;
    margin-bottom: 0px;
    display: block;
    padding: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: center;
    padding-top: 4px;
    padding-bottom: 0;
    text-decoration: none;
    background: #CFD4CE;
    margin-bottom: 4px;
    color: #444132;
    font-weight: bold;
    border-radius: 18px 0px 0px 13px;
    width: 113px;
}

.linkss li a:hover {
    color: #002768;
}
</style>

<!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

<!--Controls-->
<div class="controls-top">
    <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i
            class="fas fa-chevron-left"></i></a>
    <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
            class="fas fa-chevron-right"></i></a>
</div>
<!--/.Controls-->

<!--Indicators-->
<ol class="carousel-indicators">
    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
    <li data-target="#multi-item-example" data-slide-to="1"></li>
    <li data-target="#multi-item-example" data-slide-to="2"></li>
    <li data-target="#multi-item-example" data-slide-to="3"></li>
    <li data-target="#multi-item-example" data-slide-to="4"></li>
    <li data-target="#multi-item-example" data-slide-to="5"></li>
</ol>
<!--/.Indicators-->

<!--Slides-->
<div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">
        <div class="col-12">
            <div class="row">
<?php
$count =  min(count($arr), 6);	
//$loopTo = min(count($Address), 10);
for ($a = 0; $a < $count; $a++) {
$gambar = explode("," , $arr[$a]);

//print_r($gambar);exit;
$detailGambar = explode("=" , $gambar[0]);
//echo $detailGambar[0] . " --> " . $detailGambar[1] . "<br/>";

$lid = 1;
if(isset($detailGambar[1]) && !empty($detailGambar[1])){
    $getlesson = explode(' ' , $detailGambar[1]);
    //echo '<pre>';print_r($getlesson);die;
    if(isset($getlesson[0]) && (strtolower($getlesson[0]) == "lesson")){
        $lid = $getlesson[1];
    }else if(isset($getlesson[0]) && (strtolower($getlesson[0]) == "assessment")){
        $lid = $getlesson[1];
    }
} 
?>
                <div class="col-md-2">
                    <div class="card mb-2">
                        <img class="card-img-top"
                            src="https://cdn.pixabay.com/photo/2017/11/27/21/31/computer-2982270_960_720.jpg"
                            alt="Card image cap">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a class="lession_id" lessid="<?php echo $lid ;?>"
                                    lesson_key="<?php echo $a ;?>" val="<?php echo $detailGambar[1] ;?>"
                                    href="javascript:void(0);"><?php echo $detailGambar[1];?></a>

                            </h6>

                            <!-- <a class="btn btn-primary">Button</a>-->
                        </div>
                    </div>
                </div>
                <?php } ?>


            </div>

        </div>



    </div>
    <!--/.First slide-->

   <!--First slide-->
   <div class="carousel-item ">
        <div class="col-12">
            <div class="row">
<?php
$count =  min(count($arr), 12);	
//$loopTo = min(count($Address), 10);
for ($a = 6; $a < $count; $a++) {
$gambar = explode("," , $arr[$a]);

//print_r($gambar);exit;
$detailGambar = explode("=" , $gambar[0]);
//echo $detailGambar[0] . " --> " . $detailGambar[1] . "<br/>";

$lid = 1;
if(isset($detailGambar[1]) && !empty($detailGambar[1])){
    $getlesson = explode(' ' , $detailGambar[1]);
    //echo '<pre>';print_r($getlesson);die;
    if(isset($getlesson[0]) && (strtolower($getlesson[0]) == "lesson")){
        $lid = $getlesson[1];
    }else if(isset($getlesson[0]) && (strtolower($getlesson[0]) == "assessment")){
        $lid = $getlesson[1];
    }
} 
?>
                <div class="col-md-2">
                    <div class="card mb-2">
                        <img class="card-img-top"
                            src="https://cdn.pixabay.com/photo/2016/10/11/09/26/office-1730939__340.jpg"
                            alt="Card image cap">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a class="lession_id" lessid="<?php echo $lid ;?>"
                                    lesson_key="<?php echo $a ;?>" val="<?php echo $detailGambar[1] ;?>"
                                    href="javascript:void(0);"><?php echo $detailGambar[1];?></a>

                            </h6>

                            <!-- <a class="btn btn-primary">Button</a>-->
                        </div>
                    </div>
                </div>
                <?php } ?>


            </div>

        </div>



    </div>
    <!--/.First slide-->


   <!--First slide-->
   <div class="carousel-item ">
        <div class="col-12">
            <div class="row">
<?php
$count =  min(count($arr), 18);	
//$loopTo = min(count($Address), 10);
for ($a = 12; $a < $count; $a++) {
$gambar = explode("," , $arr[$a]);

//print_r($gambar);exit;
$detailGambar = explode("=" , $gambar[0]);
//echo $detailGambar[0] . " --> " . $detailGambar[1] . "<br/>";

$lid = 1;
if(isset($detailGambar[1]) && !empty($detailGambar[1])){
    $getlesson = explode(' ' , $detailGambar[1]);
    //echo '<pre>';print_r($getlesson);die;
    if(isset($getlesson[0]) && (strtolower($getlesson[0]) == "lesson")){
        $lid = $getlesson[1];
    }else if(isset($getlesson[0]) && (strtolower($getlesson[0]) == "assessment")){
        $lid = $getlesson[1];
    }
} 
?>
                <div class="col-md-2">
                    <div class="card mb-2">
                        <img class="card-img-top"
                            src="https://cdn.pixabay.com/photo/2017/05/11/11/15/workplace-2303851_960_720.jpg"
                            alt="Card image cap">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a class="lession_id" lessid="<?php echo $lid ;?>"
                                    lesson_key="<?php echo $a ;?>" val="<?php echo $detailGambar[1] ;?>"
                                    href="javascript:void(0);"><?php echo $detailGambar[1];?></a>

                            </h6>

                            <!-- <a class="btn btn-primary">Button</a>-->
                        </div>
                    </div>
                </div>
                <?php } ?>


            </div>

        </div>



    </div>
    <!--/.First slide-->
       <!--First slide-->
   <div class="carousel-item ">
        <div class="col-12">
            <div class="row">
<?php
$count =  min(count($arr), 24);	
//$loopTo = min(count($Address), 10);
for ($a = 18; $a < $count; $a++) {
$gambar = explode("," , $arr[$a]);

//print_r($gambar);exit;
$detailGambar = explode("=" , $gambar[0]);
//echo $detailGambar[0] . " --> " . $detailGambar[1] . "<br/>";

$lid = 1;
if(isset($detailGambar[1]) && !empty($detailGambar[1])){
    $getlesson = explode(' ' , $detailGambar[1]);
    //echo '<pre>';print_r($getlesson);die;
    if(isset($getlesson[0]) && (strtolower($getlesson[0]) == "lesson")){
        $lid = $getlesson[1];
    }else if(isset($getlesson[0]) && (strtolower($getlesson[0]) == "assessment")){
        $lid = $getlesson[1];
    }
} 
?>
                <div class="col-md-2">
                    <div class="card mb-2">
                        <img class="card-img-top"
                            src="https://cdn.pixabay.com/photo/2015/04/20/13/36/objects-731426_960_720.jpg"
                            alt="Card image cap">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a class="lession_id" lessid="<?php echo $lid ;?>"
                                    lesson_key="<?php echo $a ;?>" val="<?php echo $detailGambar[1] ;?>"
                                    href="javascript:void(0);"><?php echo $detailGambar[1];?></a>

                            </h6>

                            <!-- <a class="btn btn-primary">Button</a>-->
                        </div>
                    </div>
                </div>
                <?php } ?>


            </div>

        </div>



    </div>
    <!--/.First slide-->
           <!--First slide-->
   <div class="carousel-item ">
        <div class="col-12">
            <div class="row">
<?php
$count =  min(count($arr), 30);	
//$loopTo = min(count($Address), 10);
for ($a = 24; $a < $count; $a++) {
$gambar = explode("," , $arr[$a]);

//print_r($gambar);exit;
$detailGambar = explode("=" , $gambar[0]);
//echo $detailGambar[0] . " --> " . $detailGambar[1] . "<br/>";

$lid = 1;
if(isset($detailGambar[1]) && !empty($detailGambar[1])){
    $getlesson = explode(' ' , $detailGambar[1]);
    //echo '<pre>';print_r($getlesson);die;
    if(isset($getlesson[0]) && (strtolower($getlesson[0]) == "lesson")){
        $lid = $getlesson[1];
    }else if(isset($getlesson[0]) && (strtolower($getlesson[0]) == "assessment")){
        $lid = $getlesson[1];
    }
} 
?>
                <div class="col-md-2">
                    <div class="card mb-2">
                        <img class="card-img-top"
                            src="https://cdn.pixabay.com/photo/2014/07/30/22/56/workstation-405768__340.jpg"
                            alt="Card image cap">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a class="lession_id" lessid="<?php echo $lid ;?>"
                                    lesson_key="<?php echo $a ;?>" val="<?php echo $detailGambar[1] ;?>"
                                    href="javascript:void(0);"><?php echo $detailGambar[1];?></a>
                            </h6>
                            <!-- <a class="btn btn-primary">Button</a>-->
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!--/.First slide-->
</div>
<!--/.Slides-->

</div>
<!--/.Carousel Wrapper-->









<div class="homebg">
    <div class="inputname">
        <div class="frst">
            <h1>Phonetic Typing</h1> <br />
            <label>Enter Name: </label>
            <input type="text" name="user_name" id="user_name" value="<?php echo $user_name;?>">
        </div>
        <div class="sec">
            <img src="https://images.pexels.com/photos/920381/pexels-photo-920381.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" />
        </div>
    </div>
    <div class="description">
        <p>Tiger paws Typing will teach you to type and improve your phonics. Select a lesson icon to begin. <a
                id="more" href="<?php echo $return_url;?>">more.</a></p>
    </div>
<!--<ul class="linkss">
        <?php		
			for ($a = 0; $a < count($arr); $a++) {
			$gambar = explode("\n" , $arr[$a]);			
			$detailGambar = explode("=" , $gambar[0]);
			//echo $detailGambar[0] . " --> " . $detailGambar[1] . "<br/>";			
			$lid = 1;
			if(isset($detailGambar[1]) && !empty($detailGambar[1])){
				$getlesson = explode(' ' , $detailGambar[1]);
				//echo '<pre>';print_r($getlesson);die;
				if(isset($getlesson[0]) && (strtolower($getlesson[0]) == "lesson")){
					$lid = $getlesson[1];
				}else if(isset($getlesson[0]) && (strtolower($getlesson[0]) == "assessment")){
					$lid = $getlesson[1];
				}
			}			
			echo '<li><a class="lession_id" lessid="'.$lid.'" lesson_key="'.$a.'" val="'.$detailGambar[1].'" href="javascript:void(0);">'.$detailGambar[1].'</a></li>';
			
			}
		
		?>

    </ul>-->
    <section class="gallery-sec">

        <div class="">

        </div>

    </section>


    <footer class="footerdiv">
        <p class="text-center">Copyright 2018</p>

    </footer>

</div>

<?php 
require(dirname(__FILE__).'/layout-bottom.php');
?>


<script>
$(document).ready(function() {
    $('.carousel.carousel-multi-item.v-2 .carousel-item').each(function() {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i = 0; i < 3; i++) {
            next = next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
        }
    });
});
</script>




<script>
$(document).ready(function() {

    if (sessionStorage.getItem("is_reloaded") == "false") {
        $("#user_name").val('');
        $("a#more").attr("href", 'javascript:void(0);');
    } else {
        sessionStorage.setItem("is_reloaded", false);
    }

    $(".lession_id").click(function() {
        var lesson_name = $(this).attr('val');
        var lesson_id = $(this).attr('lessid');
        var lesson_key = $(this).attr('lesson_key');
        var user_name = $("#user_name").val();
        //alert(lesson_name);return false;
        if (user_name == '') {
            $('#user_name').css('border-color', 'red');
            return false;
        } else {
            //print_r(user_name);exit;
            $('#user_name').css('border-color', '');
            $("div.inputname span.err").remove();
            //alert(lesson_name+'---'+lesson_id+'---'+user_name);return false;
            $.ajax({
                url: 'checkUserLogin.php',
                type: 'post',
                dataType: "json",
                data: {
                    'lesson_name': lesson_name,
                    'lesson_id': lesson_id,
                    'user_name': user_name,
                    'lesson_key': lesson_key
                },
                success: function(data) { //alert(JSON.stringify(data));
                    if (data['error'] == 1 && data['error_name'] != '') {
                        $("div.inputname").append("<span class='err'>" + data[
                            'error_name'] + "</span>");
                        //alert(data['error']+'--'+data['error_name']);
                    } else if (data['error'] == 0 && data['idUserLogin'] > 0) {
                        $("div.inputname span.err").remove();
                        //alert(data['error']+'--'+data['error_name']+'--'+data['idUserLogin']);
                        url = "http://localhost/typingadult/keyboard/typing";
                        //print_r(url);
                        window.location.href = url;
                    }
                },
                error: function(e) {}
            });

        }
    });


});
</script>