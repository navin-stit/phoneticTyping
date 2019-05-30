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
<div class="nav">
    <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="prottotype.php">PROTOTYPE-DASHBOARD</a></li>
        <li><a href="phonetic_lessons.php" target="blank">LESSONS</a></li>
    </ul>
</div>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">


    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="prottotype.php">PROTOTYPE-DESHBOARD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="phonetic_lessons.php">LESSONS</a>
            </li>
        </ul>
    </div>
</nav>
<div class="header">
    <div class="container" style="text-align: center;">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <h1>Phonetic Typing</h1>
                <p>Read - Listen - Speak - Type</p>

            </div>
        </div>
    </div>

</div>
<!-------------- video-section------------>
<div class="video-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <h1>Getting Started</h1>
                <hr>
                <p>Level 1-Watch this video to learn everything you need to get started and track your progress
                    through the tutorial</p>
                <video width="100%" height="auto" controls>
                    <source src="images/Timelapse%20of%20a%20Cold%20Winter%20Day.mp4" type="video/mp4">
                </video>

                <h1>Unit 1 - Free!</h1>
                <hr>
                <div class="row">
                    <div class="col-6  d-row mt-4 ">
                       <!-- <label class=" font-weight-bold float-left mt-1">Enter Name : &nbsp;&nbsp;</label>
                        <input type="text" name="user_name" class="float-left" id="user_name"
                            value="<?php echo $user_name;?>">-->
                        <!-- Small input -->
                        <div class="md-form form-sm">
                            <input type="text" id="user_name" class="form-control form-control-sm" name="user_name"
                            value="<?php echo $user_name;?>">
                            <label for="inputSMEx" class="text-dark font-weight-bold">Enter Name</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- <button class="lesson btn-primary float-right font-weight-bold">Lesson 1-20 Test</button>-->
                        <button class="btn blue-gradient float-right mt-5" id="lesson_btn">Lesson 1-20 Test</button>


                    </div>

                </div>

            </div>


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

                </ol>
                <!--/.Indicators-->

                <!--Slides-->
                <div class="carousel-inner" role="listbox">

                    <!--First slide-->
                    <div class="carousel-item active offset-1">
                        <div class="col-12">
                            <div class="row">
                                <?php
$count =  min(count($arr), 5);	
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
                    <div class="carousel-item offset-1">
                        <div class="col-12">
                            <div class="row">
                                <?php
$count =  min(count($arr), 10);	
//$loopTo = min(count($Address), 10);
for ($a = 5; $a < $count; $a++) {
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
                    <div class="carousel-item offset-1">
                        <div class="col-12">
                            <div class="row">
                                <?php
$count =  min(count($arr), 15);	
//$loopTo = min(count($Address), 10);
for ($a = 10; $a < $count; $a++) {
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
                    <div class="carousel-item offset-1">
                        <div class="col-12">
                            <div class="row">
                                <?php
$count =  min(count($arr), 20);	
//$loopTo = min(count($Address), 10);
for ($a = 15; $a < $count; $a++) {
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

                </div>
                <!--/.Slides-->

            </div>
            <!--/.Carousel Wrapper-->

        </div>

    </div>

</div>
<!---------------section2------------>
<div class="section2">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-12">
                <div class="img">
                    <img src="images/2.webp" alt="2" width="100%">
                </div>
            </div>
            <div class="col-lg-5 col-sm-12">
                <div class="unit">
                    <h2>Unit 2</h2>
                    <p class="rate">$20.00</p>
                    <button><img src="images/4.png" alt="4" width="30px" height="30px">Buy Now</button>
                    <img src="images/3.png" alt="3" width="150px" height="19px" style="display: block">
                    <p style="margin-top: 30px;">Unit 2 covers lessons 21-45 and 3 test.</p>

                </div>
            </div>

        </div>

    </div>

</div>
<!---------------unit2------------>
<div class="unit2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <h2>Unit 2</h2>
                <hr>
                <p style="margin-left: 50px;padding-bottom: 21px;">Lesson 21-45 Test</p>

            </div>
        </div>
    </div>

</div>
<!----------lessons---------------->
<div class="lessons">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <h2>Lessons</h2>
                <hr>
                <p>These lessons will guide you through the Phonetic Typing program</p>

            </div>

        </div>
        <!-----------show-content------------->
        <div class="row show-content" style="margin-top: 30px; margin-bottom: 155px;">
            <div class="col-lg-3 col-sm-12">
                <img src="images/2.webp" alt="2" width="100%">
            </div>
            <div class="col-lg-7 col-sm-12 content">
                <span>March 12 2019</span>
                <span style="padding-left: 10px">|</span>
                <span style="padding-left: 10px">TYPING</span>
                <p style="text-align: left; margin-top: 10px;">Lesson 1- Home Row Finger Position</p>
                <p style="text-align: left;font-size: 17px">If you want to type as fast as your thoughts,developing
                    good technique is imporatnt.Start by placing your fingers correctly over the Home Row Keys
                    <br>and letting them hover there until you are to ready to press a keys. Correctly..</p>
                <p class="show" style="text-align:left; font-size: 15px;> <a href=" #hidden""
                    style="text-decoration: none;color: rgb(140, 117, 0);">CONTINUE READING </a></p>


            </div>
            <div class="col-lg-2 col-sm-12" style="border-left: 1px solid #dadada">
                <h3>Catagories</h3>
                <ul>
                    <li><a href="#">ALL POSTS</a></li>
                    <li><a href="#">TYPING</a></li>
                </ul>
            </div>
        </div>
        <!----------hidden-content----------->
        <div id="hidden" style=" display: none;">
            <div class="row">
                <div class="col-lg-7 col-sm-12 hidden-content">
                    <p>Lesson 1 - Home Row Finger Position</p>
                    <span>March 12, 2019 | TYPING</span>
                    <img src="images/2.webp" alt="2" width="100%">
                    <p style="font-size: 17px;text-align: justify;">If you want to type as fast as your thoughts,
                        developing good technique is important. Start by placing your fingers correctly over the
                        Home Row keys and letting them hover there until you are ready to press a key. Correct
                        posture while seated at the keyboard will help to keep your fingers in the correct position.
                        Through practice, your muscles in your fingers will develop memory and find the keys
                        automatically as you think of the sounds and letters you are spelling. You must perform the
                        lesson as many times as it takes to develop the muscle memory and mind connection</p>
                    <p style="font-size:15px;">Share this post:<span> <a><i class="fa fa-facebook" aria-hidden="true"
                                    style=" background: rgb(59,89,152);"></i></a></span><span>
                            <a><i class="fa fa-skype" aria-hidden="true"
                                    style="background : rgb(29, 161, 242)"></i></a></span></p>


                </div>
                <div class="col-lg-4 col-sm-12 hidden-content2">
                    <h3>Catagories</h3>
                    <ul>
                        <li><a href="#">ALL POSTS</a></li>
                        <li><a href="#">TYPING</a></li>
                    </ul>
                    <p>Sign up for blog updates!</p>
                    <p style="font-size: 16px;margin-top: -11px;">Join my email list to receive updates and
                        information</p>
                    <form>
                        <input type="text" name="Email address" placeholder="Email address">
                        <button>Sign up</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="footer">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <h5>Phonetic Typing</h5>
                    <p style="color: rgb(126, 105, 0); text-align: center;">408-460-6000</p>
                    <p>Copyright © 2018 Phonetic Typing - All Rights Reserved.</p>

                </div>
            </div>
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
                                url = "http://localhost/phonetictyping/typing";
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

        <script type="text/javascript">
        $(document).ready(function() {
            $(".show").click(function() {
                $("#hidden").show();
                $(".show-content").hide();
            });
        });
        </script>

        </body>

        </html>