<?php
  session_start();
  include "header.php";
  include "../connection.php";
  
  if(!isset($_SESSION["admin"])){
    ?>
     <script type="text/javascript">
           window.location = "index.php";
     </script>
    <?php
}

  $id = $_GET["id"];
  $res = mysqli_query($conn , "select * from exam_category where id = '$id'");
  while($row = mysqli_fetch_array($res)){
      $exam_category = $row["category"];
      $exam_time = $row["exam_time_minute"];
  }
  ?>



        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Update Exam</h1>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                        <form name = "form1" action="" method="post">
                            <div class="card-body">

                                <!-- ADD EXAM  Card -->

                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header"><strong>Update Exam Categories</strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="company" class=" form-control-label">New Exam Category</label><input type="text" name="examname" placeholder="Enter your Exam Category" class="form-control" value = "<?php  echo $exam_category; ?>" ></div>
                                            <div class="form-group"><label for="vat" class=" form-control-label">Exam Time In Minute</label><input type="text" placeholder="Exam time in minute" class="form-control"  name ="examtime" value = "<?php echo $exam_time; ?>" ></div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Update Exam" name="submit1" class="btn btn-success">
                                                </div>
                                            </div>
                                        </div>


                    
                </div>
            </form>
        </div> <!-- .card -->

    </div>
</div>
</div>
</div>

<?php

if(isset($_POST["submit1"])){
    mysqli_query($conn ,"update exam_category set category ='$_POST[examname]' , exam_time_minute = '$_POST[examtime]' where id = $id") or die(mysql_error($conn));
    ?>
    <script type = "text/javascript">
        window.location.href= "exam_category.php";
    </script>
    <?php
}

?>

        <?php
        include "footer.php";
        ?>