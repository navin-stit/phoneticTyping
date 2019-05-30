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
            background-image: url('../images/1.webp');
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            min-height: 90vh;
            max-height: auto;
        }

        form {
            padding: 2rem 0;
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

        <!--  <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="img">
                        <img src="../images/1.webp" alt="1" class="img-responsive" width="100%">
                    </div>

                </div>

            </div>
        </div>-->

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php
	require_once("koneksi.php");
	//require_once("header.php");
	//require_once("typingadmin/tblBarisLogin.php");
?>
        <div class="container">
            <div class="row">
                <!-- Table with panel -->
                <div class="card card-cascade narrower">


                    <!--Card image-->
                    <div
                        class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                        <a href="" class="white-text mx-auto">Report Student Lesson</a>

                    </div>
                    <!--/Card image-->

                    <div class="px-4">

                        <div class="table-wrapper">
                            <form id='frmReportLesson' action='report_lesson.php' method='POST'
                                enctype='multipart/form-data' id='frmPhotoUpload' name='frmPhotoUpload'>
                                <!--Table-->
                                <table class="table table-hover mb-0">
                                    <div class="row">
                                        <h6 class="mx-auto">Choose Student :
                                       <?php $caridata = mysqli_query($con,"SELECT username FROM user_allow ORDER BY username
                                        ASC");
                                        //print_r($caridata);exit;
                                        ?>
                                        <select name='cbStudent' id='cbStudent' style='width:110px'>
                                        <option value=''>== Student ==</option>
                                            <?php while ($row = mysqli_fetch_array($caridata, MYSQLI_BOTH)) {
                                            if (isset($_POST['cbStudent'])) {
                                            if ($row['username'] == $_POST['cbStudent']) {
                                            echo "<option value='".$row[' username']."' selected>".$row['username']."
                                            </option>";
                                            } else {
                                            echo "<option value='".$row[' username']."'>".$row['username']."</option>";
                                            }
                                            } else {
                                            echo "<option value='".$row[' username']."'>".$row['username']."</option>";
                                            }
                                            }
                                            echo "</select>";
                                        echo "</td>";
                                        ?></h6>
                                    </div>
                                    <?php
                                    if (isset($_POST['cbStudent'])) {
				echo "<tr bgcolor='white' CLASS='darkrow'>";
					echo "<th>Date Record</th>";
					echo "<th>Score</th>";
					echo "<th>Lesson Complete</th>";
					echo "<th>Time Complete</th>";
				echo "</tr>";
		
				$carirecord = mysqli_query($con, "SELECT * FROM user_record WHERE nama='".$_POST['cbStudent']."' ORDER BY tanggal ASC");
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
		}
		
	echo "</table>";
	echo "</form> </div>";?>

                                    <!--Table head-->
                                    <thead>
                                        <tr>

                                            <th class="th-lg">
                                                <a>First Name
                                                    <i class="fas fa-sort ml-1"></i>
                                                </a>
                                            </th>
                                            <th class="th-lg">
                                                <a href="">Last Name
                                                    <i class="fas fa-sort ml-1"></i>
                                                </a>
                                            </th>
                                            <th class="th-lg">
                                                <a href="">Username
                                                    <i class="fas fa-sort ml-1"></i>
                                                </a>
                                            </th>
                                            <th class="th-lg">
                                                <a href="">Username
                                                    <i class="fas fa-sort ml-1"></i>
                                                </a>
                                            </th>
                                            <th class="th-lg">
                                                <a href="">Username
                                                    <i class="fas fa-sort ml-1"></i>
                                                </a>
                                            </th>
                                            <th class="th-lg">
                                                <a href="">Username
                                                    <i class="fas fa-sort ml-1"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <!--Table head-->

                                    <!--Table body-->
                                    <tbody>
                                        <tr>

                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                    </tbody>
                                    <!--Table body-->
                                </table>
                                <!--Table-->
                            </form>
                        </div>

                    </div>

                </div>
                <!-- Table with panel -->
            </div>
        </div>




        <?php	echo "<div id='bg_image'>" ;
	echo "<form id='frmReportLesson' action='report_lesson.php' method='POST' enctype='multipart/form-data' id='frmPhotoUpload' name='frmPhotoUpload'>";
	echo "<table border='1' align='center' rules=rows frame=box bgcolor='white' width='700px'>";
	
		echo "<tr bgcolor='white' CLASS='darkrow'>";
			echo "<td align='center' colspan='4'>";
				echo "Report Student Lesson";
			echo "</td>";
		echo "</tr>";
		
		echo "<tr >";
			echo "<td align='center' colspan='4'>";
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
				echo "<tr bgcolor='white' CLASS='darkrow'>";
					echo "<th>Date Record</th>";
					echo "<th>Score</th>";
					echo "<th>Lesson Complete</th>";
					echo "<th>Time Complete</th>";
				echo "</tr>";
		
				$carirecord = mysqli_query($con, "SELECT * FROM user_record WHERE nama='".$_POST['cbStudent']."' ORDER BY tanggal ASC");
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
		}
		
	echo "</table>";
	echo "</form> </div>";
	
?>
    </body>

</html>
