<?php
require_once("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="../slider_layout/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="../slider_layout/css/compiled-4.7.6.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="../slider_layout/css/addons/datatables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/phonetic_style.css">
        <link rel="stylesheet" href="../css/style.css">
        <style>
        #bg_image {
            background-image: url('http://olingertravel.com/wp-content/themes/bestwp/assets/images/background.png');
            background-position: left top;
            background-size: auto;
            background-repeat: repeat;
            background-attachment: fixed;
        }

        th,td{
            text-align: center;
            padding: 1rem
        }

        form {
            padding: 1rem 0;
        }

        select {
            font-size: 18px;
            color: #212529;
            font-family: ronot;
        }

        option {
            font-size: 18px;
            color: #212529;
            font-family: ronot;
        }

        </style>
    </head>

    <body>
        <div class="nav">
            <ul class="nav navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="http://localhost/phonetictyping/index.php">HOME</a></li>
                <li class="nav-item"><a class="nav-link"
                        href="http://localhost/phonetictyping/prottotype.php">PROTOTYPE-DASHBOARD</a></li>
                <li class="nav-item"><a class="nav-link" href="http://localhost/phonetictyping/phonetic_lessons.php"
                        target="blank">LESSONS</a></li>
                <li class="nav-item"><a class="nav-link" href="#">REPORT</a></li>
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
                    <li class="nav-item">
                        <a class="nav-link" href="#">LESSONS</a>
                    </li>

                </ul>
            </div>
        </nav>


        <?php
    require_once("koneksi.php");
    ?>
        <div class="wrapper mt-3 pt-4" id='bg_image'>
            <div class="container">
                <div class="row">
                    <form id='frmReportLesson' action='' method='POST' enctype='multipart/form-data' id='frmPhotoUpload'
                        name='frmPhotoUpload' style="width:900px !important" class="mx-auto bg-white">

                        <!-- <button type="button" value="submit" class="clickme">Submit</button>-->
                        <table id="dtBasicExample" class="table bg-white" cellspacing="0" width="100%">
                            <thead>
                                <tr style="background-color: #FFD703;color: #333;font-family: robot;">
                                    <td colspan="4" style="text-align:center;font-size: 22px;">Report Student Lesson
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="center"
                                        style="font-size: 18px;color: #212529;font-family: ronot;"> Choose Student :
                                        <?php
                            $caridata = mysqli_query($con,"SELECT username FROM user_allow ORDER BY username ASC");
                            ?>
                                        <select name="cbStudent" id="cbStudent" class="mx-auto"
                                            style="display:block!important" onchange="this.form.submit()">
                                            <option value=''>== Student ==</option>
                                            <?php 
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
                                    ?>

                                        </select>
                                    </td>
                                </tr>
                                <tr
                                    style="width:100% !important;background-color: #FFD703;color: #333;font-family: robot;">
                                    <th class="th-sm" style="font-size: 18px;">Date Record
                                    </th>
                                    <th class="th-sm" style="font-size: 18px;">Score
                                    </th>
                                    <th class="th-sm" style="font-size: 18px;">Lesson Complete
                                    </th>
                                    <th class="th-sm" style="font-size: 18px;">Time Complete
                                    </th>

                                </tr>

                            </thead>
                            <tbody>
                                <?php 
                        if(isset($_POST['cbStudent'])) { 
                           // echo "hello";exit;
                     $carirecord = mysqli_query($con, "SELECT * FROM user_record WHERE nama='".$_POST['cbStudent']."'
				     ORDER BY tanggal DESC");
				    $tanggalcatat = "";
				    while ($rows = mysqli_fetch_array($carirecord,MYSQLI_BOTH)) {
                        //print_r($rows);exit;
                    ?>
                                <tr>
                                    <td>
                                        <?php 
                            if($tanggalcatat!=$rows['recorddate']) {
                                echo $rows['recorddate'];
                                $tanggalcatat = $rows['recorddate'];
                            }
                            ?>
                                    </td>
                                    <td><?php echo $rows['nama'];?></td>
                                    <td><?php echo $rows['score'];?></td>
                                    <td><?php echo substr($rows['tanggal'],11,8);?></td>

                                </tr>
                                <?php }
                        }
                        ?>
                            </tbody>

                        </table>
                    </form>
                </div>
            </div>
        </div>

        <!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="../slider_layout/js/jquery-3.3.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="../slider_layout/js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="../slider_layout/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="../slider_layout/js/mdb.min.js"></script>
        <script type="text/javascript" src="../slider_layout/js/addons/datatables.min.js"></script>

        <script>
        $(document).ready(function() {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
            // $('table#tableID').DataTable({
            //  paging: true
            // });
        });
        </script>

    </body>

</html>
