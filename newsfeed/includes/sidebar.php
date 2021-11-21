<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
          <div class="latest_post">
          <h2><span>ताज़ा खबर</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav" id="FreshNews">
            <?php
              $query=mysqli_query($con,"select tblposts.PostImage,tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId order by tblposts.id desc limit 8");
              while ($row=mysqli_fetch_array($query)) {

              ?>
                  <li>
                    <div class="media"> <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="media-left"> <img alt="" src="../admin/postimages/<?php echo htmlentities($row['PostImage']);?>"> </a>
                      <div class="media-body"> <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="catg_title"><?php echo htmlentities($row['posttitle']);?></a> </div>
                    </div>
                  </li>
             <?php } ?>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
          </div>
          <div class="single_post_content">
            <h2><span>विज्ञापन</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
              <li>
                <div class="photo_grid">
                   <img src="../images/photograph_img2.jpg" height="230px" width="710px" alt=""/> 
                </div>
              </li>           
            </ul>
          </div>
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
                              </ul>
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="category">
                        <ul id="categ">
                        <?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
                        while($row=mysqli_fetch_array($query))
                        {
                        ?>
                    <li class="cat-item"><a href="category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a></li>
                 <?php } ?>
              </ul>
              </div>
            </div>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>विज्ञापन</span></h2>
            <a class="sideAdd" href="#"><img src="../images/add_img.jpg" alt=""></a> </div>
          <!-- Categories Widget
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
              <?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>

                    <li>
                      <a href="category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a>
                    </li>
              <?php } ?>
                  </ul>
                </div>
       
              </div>
            </div>
          </div>
          
          <!-- Side Widget -->
          <!-- <div class="card my-4">
            <h5 class="card-header">Recent News</h5>
            <div class="card-body">
                      <ul class="mb-0"> -->

          </ul>
            </div>
          </div>

        </div> -->
        <script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="assets/js/jquery.newsTicker.min.js"></script> 
<script src="assets/js/jquery.fancybox.pack.js"></script> 
<script src="assets/js/custom.js"></script>