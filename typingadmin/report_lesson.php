<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Report Student Lesson</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="../slider_layout/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap 
  <link href="../slider_layout/css/compiled-4.7.6.min.css" rel="stylesheet">-->
        <link href="../slider_layout/css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="../css/phonetic_style.css">
        <style>
        #bg_image {
            background-image: url('http://olingertravel.com/wp-content/themes/bestwp/assets/images/background.png');
            background-position: left top;
            background-size: auto;
            background-repeat: repeat;
            background-attachment: fixed;
        }

        th {
            text-align: center;
            padding: 1rem
        }

        form {
            padding: 1rem 0;
        }

        </style>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>
        $(document).ready(function() {
            $("#cbStudent").change(function() {
                $("#frmReportLesson").submit();
            });
        });
        </script>

    </head>

    <body background="typingadmin/image/bg.gif">
        <div class="nav">
            <ul>
                <li><a href="http://localhost/phonetictyping/index.php">HOME</a></li>
                <li><a href="http://localhost/phonetictyping/prottotype.php">PROTOTYPE-DASHBOARD</a></li>
                <li><a href="http://localhost/phonetictyping/phonetic_lessons.php" target="blank">LESSONS</a></li>
                <li><a href="typingadmin/report_lesson.php">REPORT</a></li>
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

        <!--  <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="img">
                        <img src="../images/1.webp" alt="1" class="img-responsive" width="100%">
                    </div>

                </div>

            </div>
        </div>-->

        

        <?php
	require_once("koneksi.php");
	//require_once("header.php");
	//require_once("typingadmin/tblBarisLogin.php");

	echo "<div id='bg_image'>" ;
	echo "<form id='frmReportLesson' action='report_lesson.php' method='POST' enctype='multipart/form-data' id='frmPhotoUpload' name='frmPhotoUpload'>";
	echo "<table border='1' align='center' rules=rows frame=box bgcolor='white' width='700px'>";
	
		echo "<tr bgcolor='white' style='background-color:#FFD703;color:#333;font-family: robot;' class='font-weight-bold'>";
			echo "<td align='center' colspan='4' style='font-size:18px'>";
				echo "Report Student Lesson";
			echo "</td>";
		echo "</tr>";
		
		echo "<tr >";
			echo "<td align='center' colspan='4' style='font-family: sans-serif;'>";
				echo "Choose Student : ";
				
				$caridata = mysqli_query($con,"SELECT username FROM user_allow ORDER BY username ASC");
				//print_r($caridata);exit;
				echo "<select name='cbStudent' id='cbStudent' style='width:110px'>";
					echo "<option value=''>== Student ==</option>";
					while ($row = mysqli_fetch_array($caridata, MYSQLI_BOTH)) {
						if (isset($_POST['cbStudent'])) {
							if ($row['username'] == $_POST['cbStudent']) {
								echo "<option value='".$row['username']."' selected>".$row['username']."</option>";
							} else {
								echo "<option value='".$row['username']."'>".$row['username']."</option>";
							}
						} else {
							echo "<option value='".$row['username']."'>".$row['username']."</option>";
						}
					}
				echo "</select>";
			echo "</td>";
        echo "</tr>";
		 
		if (isset($_POST['cbStudent'])) {
				echo "<tr bgcolor='white' style='background-color:#FFD703;'>";
					echo "<th>Date Record</th>";
					echo "<th>Score</th>";
					echo "<th>Lesson Complete</th>";
					echo "<th>Time Complete</th>";
                echo "</tr>";
                if (isset($_GET["page"])) {  
                    $pn  = $_GET["page"];  
                  }  
                  else {  
                    $pn=1;  
                  }; 
				$limit = 30;
                // Number of entries to show in a page. 
            // Look for a GET variable page if not found default is 1.      
                    $start_from = ($pn-1) * $limit;   
		            $carirecord = mysqli_query($con, "SELECT * FROM user_record WHERE nama='".$_POST['cbStudent']."'
				     ORDER BY tanggal ASC LIMIT $start_from, $limit");
				    $tanggalcatat = "";
				    while ($rows = mysqli_fetch_array($carirecord,MYSQLI_BOTH)) {
					echo "<tr align='center' >";
						echo "<td>";
						if($tanggalcatat!=$rows['recorddate']) {
							echo $rows['recorddate'];
							$tanggalcatat = $rows['recorddate'];
						}
						echo "</td>";
						echo "<td>".$rows['score']."</td>";
						echo "<td>".$rows['keterangan']."</td>";
						echo "<td>".substr($rows['tanggal'],11,8)."</td>";
					echo "</tr>";
				}
			

	echo "</table>";

	?>  

<ul class="pagination">
    <?php   
    
         $sql = "SELECT COUNT(*) FROM user_record";   
         $rs_result = mysqli_query($con,$sql);   
         $row = mysqli_fetch_row($rs_result);   
         $total_records = $row[0];             
         // Number of pages required. 
         $total_pages = ceil($total_records / $limit);   
         //print_r($total_pages);exit;
        $pagLink = "";                         
        for ($i=1; $i<=$total_pages; $i++) { 
          if ($i==$pn) { 
              $pagLink .= "<li class='active' ><a id='abc' href='http://localhost/phonetictyping/typingadmin/report_lesson.php?page="
                                                .$i."'>".$i."</a></li>"; 
          }             
          else  { 
              $pagLink .= "<li id='abc'><a  href='http://localhost/phonetictyping/typingadmin/report_lesson.php?page=".$i."'> 
                                                ".$i."</a></li>";   
          } 
        };   
		echo $pagLink;   
?>
        </ul>
    <?php } ?>
        </form> </div>

<script>

$(document).ready(function(){
    $('li').click(function(e){
        e.preventDefault();
    //var data = $('#abc').attr('href');
    //alert(data);
   // window.location.href = data ;

    });
});
</script>

    </body>

</html>
