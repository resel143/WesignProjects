<?php 
session_start();
include('includes/config.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
 $_SESSION['token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['submit']))
{
  //Verifying CSRF Token
if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$postid=intval($_GET['nid']);
$st1='0';
$query=mysqli_query($con,"insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
if($query):
  echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
  unset($_SESSION['token']);
else :
 echo "<script>alert('Something went wrong. Please try again.');</script>";  

endif;

}
}
}
// meta tag elmenities
$pid=intval($_GET['nid']);
$metares =mysqli_query($con,"select * from tblposts where tblposts.id=$pid");
$metadata = mysqli_fetch_assoc($metares);
$metarow = mysqli_num_rows($metares);
$mtitle=$metadata['meta_title'];
$mkeywords=$metadata['meta_keywords'];
$mdescription=$metadata['meta_description'];
$mimage = $metadata['PostImage']
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:title" name="Post Title" content="<?php echo $mtitle?>">
    <meta property="og:description" name="Post Description" content="<?php echo $mdescription?>">
    <meta property="og:image" content="admin/postimages/<?php echo htmlentities ($mimage) ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="author" content="MetaTag">
    <meta name="keywords" content="<?php echo $mkeywords?>">

    <title>NewsFeed</title>
    
    <!-- Bootstrap core CSS -->
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="../css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
   <?php include('includes/header.php');?>
   
  

    <!-- Page Content -->
    <div class="container">


     
      <div class="row" style="margin-top: 4%">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->
<?php
$pid=intval($_GET['nid']);
$currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
 $query=mysqli_query($con,"select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
while ($row=mysqli_fetch_array($query)) {
?>
  <!--  sir iski id change krna -->
          <div class="card mb-4" id="printdivcontent">
      
            <div class="card-body">
              <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
              <p><b>Category : </b> <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> |
                <b>Sub Category : </b><?php echo htmlentities($row['subcategory']);?> <b> Posted on </b><?php echo htmlentities($row['postingdate']);?></p>
                <p><strong>Share:</strong> <a href="http://www.facebook.com/share.php?u=<?php echo $currenturl;?>" target="_blank">Facebook</a> | 
<a href="https://twitter.com/share?url=<?php echo $currenturl;?>" target="_blank">Twitter</a> |
<a href="https://web.whatsapp.com/send?text=<?php echo $currenturl;?>" target="_blank">Whatsapp</a> | 
<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $currenturl;?>" target="_blank">Linkedin</a>
                </p>
                <hr />

 <img class="img-fluid w-70" style="height: 150px;" src="../admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
  
              <p class="card-text"><?php 
$pt=$row['postdetails'];
              echo  (substr($pt,0));?></p>
             
            </div>
            
          </div>
          <!--  Sir iss div ko bahar nikalna -->
          <div class="card-footer text-muted">
             
            <div class="prtDiv">
              <button onclick="prt()">Print</button>
            </div>
            </div>
<?php } ?>
       

      

     

        </div>

        <!-- Sidebar Widgets Column -->
      <?php include('includes/sidebar.php');?>
      </div>
      <!-- /.row -->
<!---Comment Section --->

 <div class="row" style="margin-top: -8%">
   <div class="col-md-8">
<div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form name="Comment" method="post">
      <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
 <div class="form-group">
<input type="text" name="name" class="form-control" placeholder="Enter your fullname" required>
</div>

 <div class="form-group">
 <input type="email" name="email" class="form-control" placeholder="Enter your Valid email" required>
 </div>


                <div class="form-group">
                  <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </form>
            </div>
          </div>

  <!---Comment Display Section --->

 <?php 
 $sts=1;
 $query=mysqli_query($con,"select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
while ($row=mysqli_fetch_array($query)) {
?>
<div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="../images/usericon.png" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?php echo htmlentities($row['name']);?> <br />
                  <span style="font-size:11px;"><b>at</b> <?php echo htmlentities($row['postingDate']);?></span>
            </h5>
           
             <?php echo htmlentities($row['comment']);?>            </div>
          </div>
<?php } ?>

        </div>
      </div>
    </div>

  
      <?php include('includes/footer.php');?>


    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery.min.js"></script> 
    <script src="../assets/js/wow.min.js"></script> 
    <script src="../assets/js/bootstrap.min.js"></script> 
    <script src="../assets/js/slick.min.js"></script> 
    <script src="../assets/js/jquery.li-scroller.1.0.js"></script> 
    <script src="../assets/js/jquery.newsTicker.min.js"></script> 
    <script src="../assets/js/jquery.fancybox.pack.js"></script> 
    <script src="../assets/js/custom.js"></script>
    <!-- // sir ye wala script copy paste krna -->
    <script>
      function prt(){
        var divContents = document.getElementById("printdivcontent").innerHTML;  
            var printWindow = window.open('', '', 'height=200,width=400');  
            printWindow.document.write('<html><head><title>Print DIV Content</title>');  
            printWindow.document.write('</head><body >');  
            printWindow.document.write(divContents);  
            printWindow.document.write('</body></html>');  
            printWindow.document.close();  
            printWindow.print();
      }
    </script>
  </body>

</html>
