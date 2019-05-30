<?php require_once(dirname(__FILE__).'/header-top.php');?>
<div class="nav">
    <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="prottotype.php">PROTOTYPE-DASHBOARD</a></li>
        <li><a href="phonetic_lessons.php" target="blank">LESSONS</a></li>
       <!-- <li><a href="typingadmin/report_lesson.php">REPORT</a></li>-->
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

<!---------------SECTION------------->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-12" style="background: #FFD703; margin-right: -45px;">
                <div class="text">
                    <p class="p">Learn English Phonics</p>
                    <h1>Phonetic Typing</h1>
                    <p>Read - Listen - Speak - Type</p>
                    <button>GET STARTED FOR FREE!</button>

                </div>

            </div>
            <div class="col-lg-7 col-sm-12">
                <div class="img">
                    <img src="images/1.webp" alt="1" class="img-responsive" width="100%">
                </div>

            </div>

        </div>
    </div>

</div>
<!---------------ABOUT US---------------->
<div class="about-us">
    <div class="container-fluid">
        <h1>About Phonetic Typing</h1>
        <hr>
    </div>

</div>
<div class="about-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="img">
                    <img src="images/2.webp" alt="2" width="100%" class="img-responsive">
                </div>

            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="text-content">
                    <h4>Learn English Phonics</h4>
                    <p><span>Today adults and children all over the world are communicating in English. The ability to
                            quickly speak, type, understand and spell English words is almost a basic skill in
                            today’s<br> global economy. Phonetic Typing allows children and adults to hone their English
                            phonics<br> skills in order to master and advance English word recognition, listening, and
                            reading skills.</span></p>
                    <h4>Improve Your English</h4>
                    <p><span> Phonetic typing uses a multisensory approach to teaching keyboarding and phonics. Level
                            One teaches consonant vowel consonant (CVC) spelling patterns, consonant blends and
                            diagraphs, and how to type all the alpha keys on the qwerty keyboard. In addition shifting,
                            spacing, and simple sentence typing are covered at this level. You are also introduced to
                            English grammar parts of speech and additional sentence typing. </span></p>
                    <h4>Get Started For Free</h4>
                    <p>Level One is divided into two Units. You can access the first 20 lessons and the first listening
                        test FREE. When you sign-up to our private mailing list, you'll receive a link to the phonetic
                        Typing dashboard. We will email you when more advance levels become available.</p>


                </div>
            </div>

        </div>

    </div>

</div>
<!---------------SUBSCRIBE------------------>
<div class="subscribe">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12" style="    text-align: center;padding-top: 30px;padding-bottom: 30px;">
                <h1>Subscribe</h1>
                <p>Sign up to get new lesson notifications.</p>
                <form>
                    <input type="text" placeholder="Email Address">
                    <button>SIGN UP</button>
                </form>

            </div>

        </div>

    </div>

</div>
<!-------------------FOOTER------------------>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="icon">
                    <a><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <hr style="border-top: 1px solid black;margin-top: 83px;">
                    <h5>Phonetic Typing</h5>
                    <p style="color: rgb(126, 105, 0); text-align: center;">408-460-6000</p>
                    <p>Copyright © 2018 Phonetic Typing - All Rights Reserved.</p>


                </div>

            </div>
        </div>

    </div>

</div>
<?php 
require(dirname(__FILE__).'/layout-bottom.php');
?>

</body>

</html>