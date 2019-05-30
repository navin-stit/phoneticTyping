<!DOCTYPE html> 
<html> 
  <head> 
    <title>ProGeeks Cup 2.0</title> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" 
     href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
  </head> 
  <body> 
  <?php 
      
    // Import the file where we defined the connection to Database.   
    require_once "koneksi.php"; ?>
<?php

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 30;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $total_pages_sql = "SELECT COUNT(*) FROM user_record";
    $result = mysqli_query($con,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $sql = "SELECT * FROM user_record  ORDER BY tanggal ASC LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($con,$sql);
    while ($row = mysqli_fetch_array($res_data, MYSQLI_BOTH)) { ?>
        <table class="table">
        <tr>   
          <td><?php echo $row["score"]; ?></td>   
          <td><?php echo $row["keterangan"]; ?></td> 
          <td><?php echo $row["tanggal"]; ?></td> 
                                             
        </tr>  </table>
    <?php }
    
    mysqli_close($con);
?>
<ul class="pagination">
    <li><a href="?pageno=1">First</a></li>
    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
    </li>
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
    </li>
    <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>




<!-- ///////////////////////////  -->
    
  <?php
    $limit = 30;  // Number of entries to show in a page. 
    // Look for a GET variable page if not found default is 1.      
    if (isset($_GET["page"])) {  
      $pn  = $_GET["page"];  
    }  
    else {  
      $pn=1;  
    };   
  
    $start_from = ($pn-1) * $limit;   
  
    $sql = "SELECT * FROM user_record LIMIT $start_from, $limit";   
    $rs_result = mysqli_query ($con,$sql);  
  //print_r($rs_result);exit;
  ?> 
  <div class="container"> 
    <br> 
    <div> 
    
      <table class="table table-striped table-condensed table-bordered"> 
        <thead> 
        <tr> 
          <th width="10%">Rank</th> 
          <th>Name</th> 
          <th>College</th> 
          <th>Score</th> 
        </tr> 
        </thead> 
        <tbody> 
        <?php   
          while ($row = mysqli_fetch_array($rs_result, MYSQLI_BOTH)) {  
                  // Display each field of the records.  
        ?>   
        <tr>   
          <td><?php echo $row["score"]; ?></td>   
          <td><?php echo $row["keterangan"]; ?></td> 
          <td><?php echo $row["tanggal"]; ?></td> 
                                             
        </tr>   
        <?php   
        }  
        ?>   
        </tbody> 
      </table> 
      
      <ul class="pagination"> 
      <?php   
        $sql = "SELECT COUNT(*) FROM user_record";   
        $rs_result = mysqli_query($con,$sql);   
        $row = mysqli_fetch_row($rs_result);   
        $total_records = $row[0];   
          
        // Number of pages required. 
        $total_pages = ceil($total_records / $limit);   
        $pagLink = "";                         
        for ($i=1; $i<=$total_pages; $i++) { 
          if ($i==$pn) { 
              $pagLink .= "<li class='active'><a href='?page="
                                                .$i."'>".$i."</a></li>"; 
          }             
          else  { 
              $pagLink .= "<li><a href='?page=".$i."'> 
                                                ".$i."</a></li>";   
          } 
        };   
        echo $pagLink;   
      ?> 
      </ul> 
    </div> 
  </div> 
  </body> 
</html> 