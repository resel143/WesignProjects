<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
   
if(isset($_POST['submit']))
{

$imgfile01=$_FILES["topaddimage"]["name"];
$imgfile02=$_FILES["middleaddimage"]["name"];
$imgfile03=$_FILES["bottomaddimage"]["name"];

// get the image extension

$extension01 = substr($imgfile01,strlen($imgfile01)-4,strlen($imgfile01));
$extension02 = substr($imgfile02,strlen($imgfile02)-4,strlen($imgfile02));
$extension03 = substr($imgfile03,strlen($imgfile03)-4,strlen($imgfile03));

// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");

// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension01,$allowed_extensions) || !in_array($extension02,$allowed_extensions) || !in_array($extension03,$allowed_extensions))
{
    echo "<script>alert('$imgfile01,$imgfile02,$imgfile03');</script>";
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

//rename the image file
$imgnewfile01=md5($imgfile01).$extension01;
$imgnewfile02=md5($imgfile02).$extension02;
$imgnewfile03=md5($imgfile03).$extension03;

// Code for move image into directory
move_uploaded_file($_FILES["topaddimage"]["tmp_name"],"topaddimages/".$imgnewfile01);
move_uploaded_file($_FILES["middleaddimage"]["tmp_name"],"middleaddimages/".$imgnewfile02);
move_uploaded_file($_FILES["bottomaddimage"]["tmp_name"],"bottomaddimages/".$imgnewfile03);


$query=mysqli_query($con,"update tbladvertisements set topimage='$imgnewfile01',middleimage='$imgnewfile02',bottomimage='$imgnewfile03' where tbladvertisements.id=1");
if($query)
{
$msg="Commercials Updated";
}
else{
$error="Something went wrong . Please try again.";    
} 

}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Newsportal | Edit Commercial</title>

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php include('includes/topheader.php');?>
            <!-- ========== Left Sidebar Start ========== -->
             <?php include('includes/leftsidebar.php');?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Edit Commercial </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#"> Add </a>
                                        </li>
                                        <li class="active">
                                            Edit Commercials
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">
                        <div class="col-sm-6">  
                        <!---Success Message--->  
                        <?php if($msg){ ?>
                        <div class="alert alert-success" role="alert">
                        <strong>Well done!</strong> <?php echo htmlentities($msg);?>
                        </div>
                        <?php } ?>
                        <!---Error Message--->
                        <?php if($error){ ?>
                        <div class="alert alert-danger" role="alert">
                        <strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
                        <?php } ?>
                    </div>
</div>

<?php

$query=mysqli_query($con,"select tbladvertisements.id as addid,tbladvertisements.topimage as topimg,tbladvertisements.middleimage as middledimg,tbladvertisements.bottomimage as bottomimg from tbladvertisements order by tbladvertisements.id desc limit 1");
while($row=mysqli_fetch_array($query))
{
?>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
                                        <form name="addadd" method="post" enctype="multipart/form-data">    
 <!-- Top commercial image -->
 <div class="row">
   <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-b-30 m-t-0 header-title"><b>Current Top Commercial Image</b></h4>
            <img src="topaddimages/<?php echo htmlentities($row['topimg']);?>" width="300"/>
            <br />
        </div>
    </div>
 </div>
 <?php } ?>
 <div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-b-30 m-t-0 header-title"><b>New Top Commercial Image</b></h4>
            
            <input type="file" class="form-control" id="taimage" name="topaddimage" >
        </div>
    </div>
 </div>

 <!-- middle commercial image -->
 <?php

$query=mysqli_query($con,"select tbladvertisements.id as addid,tbladvertisements.topimage as topimg,tbladvertisements.middleimage as middledimg,tbladvertisements.bottomimage as bottomimg from tbladvertisements order by tbladvertisements.id desc limit 1");
while($row=mysqli_fetch_array($query))
{
?>
 <div class="row">
   <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-b-30 m-t-0 header-title"><b>Current Middle Commercial Image</b></h4>
            <img src="middleaddimages/<?php echo htmlentities($row['middledimg']);?>" width="300"/>
            <br />
        </div>
    </div>
 </div>
 <?php } ?>
 <div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-b-30 m-t-0 header-title"><b>New Middle Commercial Image</b></h4>
            
            <input type="file" class="form-control" id="maimage" name="middleaddimage"  required>
        </div>
    </div>
 </div>

 <!-- bottom commercial image -->
 <?php

$query=mysqli_query($con,"select tbladvertisements.id as addid,tbladvertisements.topimage as topimg,tbladvertisements.middleimage as middledimg,tbladvertisements.bottomimage as bottomimg from tbladvertisements order by tbladvertisements.id desc limit 1");
while($row=mysqli_fetch_array($query))
{
?>
 <div class="row">
   <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-b-30 m-t-0 header-title"><b>Current Bottom Commercial Image</b></h4>
            <img src="bottomaddimages/<?php echo htmlentities($row['bottomimg']);?>" width="300"/>
            <br />
        </div>
    </div>
 </div>
 <?php } ?>
 <div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-b-30 m-t-0 header-title"><b>New Bottom Commercial Image</b></h4>
            
            <input type="file" class="form-control" id="baimage" name="bottomaddimage" >
        </div>
    </div>
 </div>


<button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Update</button>

                                    </div>
                                </div> <!-- end p-20 -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



                    </div> <!-- container -->

                </div> <!-- content -->

           <?php include('includes/footer.php');?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>
        <!-- Select 2 -->
        <script src="../plugins/select2/js/select2.min.js"></script>
        <!-- Jquery filer js -->
        <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- page specific js -->
        <script src="assets/pages/jquery.blog-add.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>

            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 240,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });
                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });
            });
        </script>
  <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>
    </body>
</html>

<?php } ?>
