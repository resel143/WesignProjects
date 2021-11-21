<?php 
session_start();
include('includes/config.php');
$url = basename($_SERVER['REQUEST_URI']);
// get meta tag
$metares = mysqli_query($con,"select * from meta_tag where meta_url='$url'");
$metadata = mysqli_fetch_assoc($metares);
$metarow = mysqli_num_rows($metares);



if($metarow > 0){
  $metatitle=$metadata['meta_title'];
  $metakeywords=$metadata['meta_keywords'];
  $metadescription=$metadata['meta_description'];
}else{
  $metatitle="Home Page";
  $metakeywords="Dynamic Home keywords";
  $metadescription="Dynamic Home description";
}


    ?>

<!DOCTYPE html>
<html oncontextmenu="return false">
<head>
<title>NewsFeed</title>
<meta charset="utf-8">
<meta name="title" content="<?php echo $metatitle ?>">
<meta name="description" content="<?php echo $metakeywords ?>">
<meta name="keywords" content="<?php echo $metadescription ?>">
<meta name="author" content="Metatag">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!-- <script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script> -->

</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="latest_newsarea"> <span id="sp">Latest News</span>
                <ul id="ticker01" class="news_sticker">

                  <?php
                   
                    $query=mysqli_query($con,"select tblposts.id as pid,replace(tblposts.dLink,' ','-') as dLink,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId order by tblposts.id desc limit 8");
                    while ($row=mysqli_fetch_array($query)) {
                      
                    ?>
                    <li><a href="news/<?php echo htmlentities($row['dLink'])?>-<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a></li>
                  <?php } ?>

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php

$query=mysqli_query($con,"select tbladvertisements.id as addid,tbladvertisements.topimage as topimg from tbladvertisements order by tbladvertisements.id desc limit 1");
while($row=mysqli_fetch_array($query))
{
?>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="index.php" class="logo"><img src="images/logo.jpg" alt=""></a></div>
          <div class="add_banner"><a href="#"><img src="./admin/topaddimages/<?php echo htmlentities($row['topimg']);?>" width="300"/></a></div>
        </div>
      </div>
    </div>
<?php } ?>
  </header>
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
       <!-- yaha se sir copy kardena -->
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav" id="topics">
        <?php $query=mysqli_query($con,"select id,CategoryName from tblcategory limit 12");
                    while($row=mysqli_fetch_array($query))
                    {
                    ?>
                    <li><a href="category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a></li>
                    <!-- <li class="cat-item"><a href="category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a></li> -->
                <?php } ?>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">अन्य</a>
            <ul class="dropdown-menu" role="menu">
            <?php $query=mysqli_query($con,"select id,CategoryName from tblcategory where tblcategory.id>12");
                    while($row=mysqli_fetch_array($query))
                    {
                    ?>
                    <li><a href="category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a></li>
                    <!-- <li class="cat-item"><a href="category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a></li> -->
                <?php } ?>
             
            </ul>
          </li>
        </ul>
        </ul>
      </div>
       <!-- yaha tak -->
    </nav>
  </section>
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider" id="SS">
            <?php
              $query=mysqli_query($con,"select tblposts.PostImage,tblposts.dLink as dlink,tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.addSlider='yes' order by tblposts.id desc limit 8 ");
              while ($row=mysqli_fetch_array($query)) {
              ?>
                  <div class="single_iteam"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>"> <img src="admin/postimages/6d08a26c92cf30db69197a1fb7230626.jpg" alt=""></a>
                    <div class="slider_article">
                      <h2><a class="slider_tittle" href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a></h2>   
                    </div>
                  </div>
            <?php } ?>
          <!-- <% const newList15 = [...newList]; %>
                <% newList15.reverse().slice(0,5).map(i => { %>
            <div class="single_iteam"> <a href="../pages/single_page/<%=i._id%>"> <img src="uploads/<%=i.url%>" alt=""></a>
              <div class="slider_article">
                <h2><a class="slider_tittle" href="../pages/single_page/<%=i._id%>"><%=i.title%></a></h2>   
              </div>
            </div>
          <% })%> -->
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>ताज़ा खबर</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav" id="FreshNews">
            <?php
              $query=mysqli_query($con,"select tblposts.PostImage,tblposts.dLink as dlink,tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId order by tblposts.id desc limit 8");
              while ($row=mysqli_fetch_array($query)) {

              ?>
                  <li style="height: 7.2em;rem;line-height: 1.3em;overflow: hidden;text-overflow: ellipsis; ">
                    <div class="media"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>" class="media-left"> <img alt="" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"> </a>
                      <div class="media-body"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>" class="catg_title"><?php echo htmlentities($row['posttitle']);?></a> </div>
                    </div>
                  </li>
             <?php } ?>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>छत्तीसगढ़</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown" id="CGLeft">
                <?php
                  
                $currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                $query=mysqli_query($con,"select tblposts.id as pid,tblposts.dLink as dlink,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=21 order by tblposts.id desc limit 1");
                while ($row=mysqli_fetch_array($query)) {
                ?>
               <!-- changed and restricted the headings of the posts -->
                    <li>
                    <figure class="bsbig_fig"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>" class="featured_img"> <img alt="" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"> <span class="overlay"></span> </a>
                      <figcaption style="height: 3.8em;line-height: 1.3em;overflow: hidden;text-overflow: ellipsis;"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?> "><?php echo htmlentities($row['posttitle']);?></a> </figcaption>
                      <p style="overflow:hidden;white-space: nowrap;text-overflow: ellipsis;"><?php 
                           $pt=$row['postdetails'];
                              echo  (substr($pt,0));?>
                      </p>
                    </figure>
                  </li>

                          <!-- <div class="card mb-4">
                      
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

                <img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                  
                              <p class="card-text"><?php 
                // $pt=$row['postdetails'];
                //               echo  (substr($pt,0));?></p>
                            
                            </div>
                            <div class="card-footer text-muted">
                            
                          
                            </div>
                          </div> -->
                <?php } ?>
                
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav" id="CGRight">
              <?php
                $currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
                $query=mysqli_query($con,"select tblposts.id as pid,tblposts.dLink as dlink,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=5 order by tblposts.id desc limit 5 offset 1");
                while ($row=mysqli_fetch_array($query)) {
                ?>
               <li>
                    <div class="media wow fadeInDown"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>" class="media-left"> <img alt="" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"> </a>
                      <div class="media-body" > <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>" class="catg_title"><?php echo htmlentities($row['posttitle']);?></a> </div>
                      <!-- <a href="news-details.php?id=<?php echo htmlentities($row['pid'])?>">Read More</a> -->
                    </div>
                  </li>
                <?php } ?>
                <!-- <% const newList12 = [...finalCg]; %>
                <% newList12.reverse().slice(0,5).map(i => { %>
                  <li>
                    <div class="media wow fadeInDown"> <a href="../pages/single_page/<%=i._id%>" class="media-left"> <img alt="" src="uploads/<%=i.url%>"> </a>
                      <div class="media-body"> <a href="../pages/single_page/<%=i._id%>" class="catg_title"><%=i.title %></a> </div>
                    </div>
                  </li>
                <% }).join("")%> -->
              </ul>
            </div>
          </div>
          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><span>राजनीती</span></h2>
                <ul class="business_catgnav wow fadeInDown" id="UpPoly">
                <?php
                // $postid=intval($_GET['nid']);
                // $pid=end($query);
                
                  // $_SESSION['catid']=intval($_GET['']);
                  
                $currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
                $query=mysqli_query($con,"select tblposts.id as pid,tblposts.dLink as dlink,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=21 order by tblposts.id desc limit 1");
                while ($row=mysqli_fetch_array($query)) {
                ?>
               
                    <li>
                    <figure class="bsbig_fig"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>" class="featured_img"> <img alt="" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"> <span class="overlay"></span> </a>
                      <figcaption style="height: 3.8em;line-height: 1.3em;overflow: hidden;text-overflow: ellipsis;"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a> </figcaption>
                      <p><?php 
                           $pt=$row['postdetails'];
                              echo  (substr($pt,0));?>
                      </p>
                    </figure>
                  </li>

                          <!-- <div class="card mb-4">
                      
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

                <img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                  
                              <p class="card-text"><?php 
                // $pt=$row['postdetails'];
                //               echo  (substr($pt,0));?></p>
                            
                            </div>
                            <div class="card-footer text-muted">
                            
                          
                            </div>
                          </div> -->
                <?php } ?>
                <!-- <%  const finalCg = [];%>
                <% newList.map(i => {%>
                  <%   for(let j=0;j< i.category.length; j++){%>
                    <%      if(i.category[j]==="Chhattisgarh") finalCg.push(i);%>
                    <%    }%>
                  <% })%>
                <% const newList13 = [...finalCg]; %>
                <% newList13.reverse().slice(0,1).map(i => { %> -->
                  <!-- <li>
                    <figure class="bsbig_fig"> <a href="../pages/single_page/<%=i._id%>" class="featured_img"> <img alt="" src="uploads/<%=i.url%>"> <span class="overlay"></span> </a>
                      <figcaption> <a href="../pages/single_page/<%=i._id%>"><%=i.title %></a> </figcaption>
                      <p><%-i.description %></p>
                    </figure>
                  </li>
                <% })%> -->
                  <!-- <%  const finalP = [];%>
                <% newList.map(i => {%>
                  <%   for(let j=0;j< i.category.length; j++){%>
                    <%      if(i.category[j]==="Politics") finalP.push(i);%>
                    <%    }%>
                  <% })%>
                  <% const newList11 = [...finalP]; %>
                <% newList11.reverse().slice(0,1).map(i => { %>
                    <li>
                      <figure class="bsbig_fig"> <a href="../pages/single_page/<%=i._id%>" class="featured_img"> <img alt="" src="uploads/<%=i.url%>"> <span class="overlay"></span> </a>
                        <figcaption> <a href="../pages/single_page/<%=i._id%>"><%=i.title %></a> </figcaption>
                        <p><%-i.description%></p>
                      </figure>
                    </li>
                  <% }) %> -->
                </ul>
                <ul class="spost_nav" id="DownPoly">
                <?php
                // $postid=intval($_GET['nid']);
                // $pid=end($query);
                
                  // $_SESSION['catid']=intval($_GET['']);
                  
                $currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
                $query=mysqli_query($con,"select tblposts.id as pid,tblposts.dLink as dlink,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=21 order by tblposts.id desc limit 5 offset 1");
                while ($row=mysqli_fetch_array($query)) {
                ?>
               
               <li>
                    <div class="media wow fadeInDown"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>" class="media-left"> <img alt="" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"> </a>
                      <div class="media-body" > <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a> </div>
                      <!-- <a href="news-details.php?id=<?php echo htmlentities($row['pid'])?>">Read More</a> -->
                    </div>
                  </li>
                <?php } ?>
                  <!-- <% const newList10 = [...finalP]; %>
                <% newList10.reverse().slice(0,4).map(i => { %>
                    <li>
                      <div class="media wow fadeInDown"> <a href="../pages/single_page/<%=i._id%>" class="media-left"> <img alt="" src="uploads/<%=i.url%>"> </a>
                        <div class="media-body"> <a href="../pages/single_page/<%=i._id%>" class="catg_title"><%=i.title %></a> </div>
                      </div>
                    </li>
                  <% }) %> -->
                </ul>
              </div>
            </div>
            <div class="technology">
              <div class="single_post_content">
                <h2><span>देश</span></h2>
                <ul class="business_catgnav" id="UpCountry">
                <?php
                // $postid=intval($_GET['nid']);
                // $pid=end($query);
                
                  // $_SESSION['catid']=intval($_GET['']);
                  
                $currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
                $query=mysqli_query($con,"select tblposts.id as pid,tblposts.dLink as dlink,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=21 order by tblposts.id desc limit 1");
                while ($row=mysqli_fetch_array($query)) {
                ?>
               
                    <li>
                    <figure class="bsbig_fig"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>" class="featured_img"> <img alt="" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"> <span class="overlay"></span> </a>
                      <figcaption style="height: 3.8em;line-height: 1.3em;overflow: hidden;text-overflow: ellipsis;"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a> </figcaption>
                      <p style="overflow:hidden;white-space: nowrap;text-overflow: ellipsis;"><?php 
                           $pt=$row['postdetails'];
                              echo  (substr($pt,0));?>
                      </p>
                    </figure>
                  </li>

                          <!-- <div class="card mb-4">
                      
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

                <img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                  
                              <p class="card-text"><?php 
                // $pt=$row['postdetails'];
                //               echo  (substr($pt,0));?></p>
                            
                            </div>
                            <div class="card-footer text-muted">
                            
                          
                            </div>
                          </div> -->
                <?php } ?>
                <!-- <%  const finalCg = [];%>
                <% newList.map(i => {%>
                  <%   for(let j=0;j< i.category.length; j++){%>
                    <%      if(i.category[j]==="Chhattisgarh") finalCg.push(i);%>
                    <%    }%>
                  <% })%>
                <% const newList13 = [...finalCg]; %>
                <% newList13.reverse().slice(0,1).map(i => { %> -->
                  <!-- <li>
                    <figure class="bsbig_fig"> <a href="../pages/single_page/<%=i._id%>" class="featured_img"> <img alt="" src="uploads/<%=i.url%>"> <span class="overlay"></span> </a>
                      <figcaption> <a href="../pages/single_page/<%=i._id%>"><%=i.title %></a> </figcaption>
                      <p><%-i.description %></p>
                    </figure>
                  </li>
                <% })%> -->
                  <!-- <%  const finalC = [];%>
                  <% newList.map(i => {%>
                    <%   for(let j=0;j< i.category.length; j++){%>
                      <%      if(i.category[j]==="Country") finalC.push(i);%>
                      <%    }%>
                    <% })%>
                  <% const newList9 = [...finalC]; %>
                <% newList9.reverse().slice(0,1).map(i => { %>
                    <li>
                      <figure class="bsbig_fig wow fadeInDown"> <a href="../pages/single_page/<%=i._id%>" class="featured_img"> <img alt="" src="uploads/<%=i.url%>"> <span class="overlay"></span> </a>
                        <figcaption> <a href="../pages/single_page/<%=i._id%>"><%=i.title%></a> </figcaption>
                        <p><%-i.description%></p>
                      </figure>
                    </li>
                  <% }) %> -->
                </ul>
                <ul class="spost_nav" id="DownCountry">
                <?php
                // $postid=intval($_GET['nid']);
                // $pid=end($query);
                
                  // $_SESSION['catid']=intval($_GET['']);
                  
                $currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
                $query=mysqli_query($con,"select tblposts.id as pid,tblposts.dLink as dlink,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=21 order by tblposts.id desc limit 5 offset 1");
                while ($row=mysqli_fetch_array($query)) {
                ?>
               
               <li>
                    <div class="media wow fadeInDown"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>" class="media-left"> <img alt="" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"> </a>
                      <div class="media-body"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>" class="catg_title"><?php echo htmlentities($row['posttitle']);?></a> </div>
                      <!-- <a href="news-details.php?id=<?php echo htmlentities($row['pid'])?>">Read More</a> -->
                    </div>
                  </li>
                <?php } ?>
                </ul>
              </div>
            </div>
          </div>
          <?php

$query=mysqli_query($con,"select tbladvertisements.id as addid,tbladvertisements.middleimage as middledimg from tbladvertisements order by tbladvertisements.id desc limit 1");
while($row=mysqli_fetch_array($query))
{
?>
          <div class="single_post_content">
            <h2><span>विज्ञापन</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
              <li>
                <div class="photo_grid">
                   <img src="./admin/middleaddimages/<?php echo htmlentities($row['middledimg']);?>" height="230px" width="710px" alt=""/> 
                </div>
              </li>
              
             
              
            </ul>
          </div>
<?php } ?>
          <div class="single_post_content">
            <h2><span>खेल</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav" id="PlayLeft">
              <?php
                // $postid=intval($_GET['nid']);
                // $pid=end($query);
                
                  // $_SESSION['catid']=intval($_GET['']);
                  
                $currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
                $query=mysqli_query($con,"select tblposts.id as pid,tblposts.dLink as dlink,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=21 order by tblposts.id desc limit 1");
                while ($row=mysqli_fetch_array($query)) {
                  $title = $row["posttitle"];
                  
                ?>
               
                    <li>
                    <figure class="bsbig_fig"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>" class="featured_img"> <img alt="" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"> <span class="overlay"></span> </a>
                      <figcaption style="height: 3.8em;line-height: 1.3em;overflow: hidden;text-overflow: ellipsis;"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a> </figcaption>
                      <p><?php 
                           $pt=$row['postdetails'];
                              echo  (substr($pt,0));?>
                      </p>
                    </figure>
                  </li>

                          <!-- <div class="card mb-4">
                      
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

                <img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                  
                              <p class="card-text"><?php 
                // $pt=$row['postdetails'];
                //               echo  (substr($pt,0));?></p>
                            
                            </div>
                            <div class="card-footer text-muted">
                            
                          
                            </div>
                          </div> -->
                <?php } ?>
                
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav" id="PlayRight">
              <?php
                // $postid=intval($_GET['nid']);
                // $pid=end($query);
                
                  // $_SESSION['catid']=intval($_GET['']);
                  
                $currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
                $query=mysqli_query($con,"select tblposts.id as pid,tblposts.dLink as dlink,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=21 order by tblposts.id desc limit 5 offset 1");
                while ($row=mysqli_fetch_array($query)) {
                  $title = $row["posttitle"];
                ?>
               
               <li>
                    <div class="media wow fadeInDown"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>" class="media-left"> <img alt="" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"> </a>
                      <div class="media-body"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>" class="catg_title"><?php echo htmlentities($row['posttitle']);?></a> </div>
                      <!-- <a href="news-details.php?id=<?php echo htmlentities($row['pid'])?>">Read More</a> -->
                    </div>
                  </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
		   <div class="single_sidebar wow fadeInDown">
            <h2><span>विज्ञापन</span></h2>
            <a class="sideAdd" href="#"><img src="images/featured_img2.jpg" alt=""></a> </div>
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>दुर्ग-भिलाई</span></h2>
            <ul class="spost_nav" id="nearby">
            <?php
                // $postid=intval($_GET['nid']);
                // $pid=end($query);
                
                  // $_SESSION['catid']=intval($_GET['']);
                  
                $currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
                $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=21 order by tblposts.id desc limit 4");
                while ($row=mysqli_fetch_array($query)) {
                ?>
               
               <li>
                    <div class="media wow fadeInDown"> <a href="news/<?php echo htmlentities($row['posttitle'])?>-<?php echo htmlentities($row['pid'])?>" class="media-left"> <img alt="" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"> </a>
                      <div class="media-body"> <a href="news/<?php echo htmlentities($row['posttitle'])?>-<?php echo htmlentities($row['pid'])?>" class="catg_title"><?php echo htmlentities($row['posttitle']);?></a> </div>
                      <!-- <a href="news-details.php?id=<?php echo htmlentities($row['pid'])?>">Read More</a> -->
                    </div>
                  </li>
                <?php } ?>
                <!-- <%  const finalDB = [];%>
                <% newList.map(i => {%>
                  <%   for(let j=0;j< i.category.length; j++){%>
                    <%      if(i.category[j]==="Durg-Bhilai") finalDB.push(i);%>
                    <%    }%>
                  <% })%>
                <% const newList5 = [...finalDB]; %>
                <% newList5.reverse().slice(0,4).map(i => { %>
                  <li>
                                  <div class="media wow fadeInDown"> <a href="../pages/single_page/<%=i._id%>" class="media-left"> <img alt="" src="uploads/<%=i.url%>"> </a>
                                    <div class="media-body"> <a href="../pages/single_page/<%=i._id%>" class="catg_title"> <%=i.title%></a> </div>
                                  </div>
                                </li>
              <% }) %> -->
            </ul>
          </div>
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
                              </ul>
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="category">
                        <ul id="categ">
                        <?php $query=mysqli_query($con,"select id,CategoryName from tblcategory ");
                        while($row=mysqli_fetch_array($query))
                        {
                        ?>
                    <li class="cat-item"><a href="category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a></li>
                 <?php } ?>
              </ul>
              </div>
            </div>
          </div>
          <?php

$query=mysqli_query($con,"select tbladvertisements.id as addid,tbladvertisements.middleimage as middledimg,tbladvertisements.bottomimage as bottomimg from tbladvertisements order by tbladvertisements.id desc limit 1");
while($row=mysqli_fetch_array($query))
{
?>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>विज्ञापन</span></h2>
            <a class="sideAdd" href="#"><img src="./admin/middleaddimages/<?php echo htmlentities($row['middledimg']);?>" alt=""></a> 
          </div>
			<div class="single_sidebar wow fadeInDown">
            <h2><span>विज्ञापन</span></h2>
            <a class="sideAdd" href="#"><img src="./admin/bottomaddimages/<?php echo htmlentities($row['bottomimg']);?>" alt=""></a> 
          </div>
          <?php } ?>
			<div class="single_sidebar">
            <h2><span>विदेश</span></h2>
            <ul class="spost_nav" id="videsh">
            <?php
                // $postid=intval($_GET['nid']);
                // $pid=end($query);
                
                  // $_SESSION['catid']=intval($_GET['']);
                  
                $currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
                $query=mysqli_query($con,"select tblposts.id as pid,tblposts.dLink as dlink,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=21 order by tblposts.id desc limit 5");
                while ($row=mysqli_fetch_array($query)) {
                ?>
               
               <li>
                    <div class="media wow fadeInDown"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>" class="media-left"> <img alt="" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"> </a>
                      <div class="media-body"> <a href="news/<?php echo htmlentities($row['dlink'])?>-<?php echo htmlentities($row['pid'])?>" class="catg_title"><?php echo htmlentities($row['posttitle']);?></a> </div>
                      <!-- <a href="news-details.php?id=<?php echo htmlentities($row['pid'])?>">Read More</a> -->
                    </div>
                  </li>
                <?php } ?>
              <!-- <%  const finalV= [];%>
              <% newList.map(i => {%>
                <%   for(let j=0;j< i.category.length; j++){%>
                  <%      if(i.category[j]==="Overseas") finalV.push(i);%>
                  <%    }%>
                <% })%>
              <% const newList3 = [...finalV]; %>
              <% newList3.reverse().slice(0,4).map(i => { %>
                <li>
                  <div class="media wow fadeInDown"> <a href="../pages/single_page/<%=i._id%>" class="media-left"> <img alt="" src="uploads/<%=i.url%>"> </a>
                   <div class="media-body"> <a href="../pages/single_page/<%=i._id%>" class="catg_title"> <%=i.title %></a> </div>
                  </div>
                </li>
              <% }) %> -->
            </ul>
          </div>
			<div class="single_sidebar wow fadeInDown">
            <h2><span>विज्ञापन</span></h2>
            <a class="sideAdd" href="#"><img src="images/add_img.jpg" alt=""></a> </div>
          
          
        </aside>
      </div>
    </div>
  </section>
  <footer id="footer">
    <div class="footer_top">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
            <h2>Flickr Images</h2>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInDown">
            <h2>Tag</h2>
            <ul class="tag_nav" id="tags">
            <?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
                while($row=mysqli_fetch_array($query))
                {
                ?>
                <li><a href="category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a></li>
            <?php } ?>
              <!-- <% const newList2 = [...newList] %>
              <%newList2.reverse().slice(0,7).map(i => { %>
                <li><a href="#"><%= i.category %></a></li>
              <% }) %> -->
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Contact</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <address>
            Perfect News,1238 S . 123 St.Suite 25 Town City 3333,USA Phone: 123-326-789 Fax: 123-546-567
            </address>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_bottom">
      <p class="copyright">Copyright &copy; 2045 <a href="../home">NewsFeed</a> Powered by <a href="http://wesigntechnologies.in/"> Wesign Technologies Pvt. Ltd.</a></p>
    </div>
  </footer>
</div>
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="assets/js/jquery.newsTicker.min.js"></script> 
<script src="assets/js/jquery.fancybox.pack.js"></script> 
<script src="assets/js/custom.js"></script>
<script>
  // const tags = [{title:"देश",url:"../pages/desh"},{title:"विदेश",url:"../pages/videsh"},{title:"छत्तीसगढ़",url:"../pages/chhattisgarh"},{title:"फैशन",url:"../pages/fashion"},{title:"राजनीती",url:"../pages/rajniti"},{title:"खेल",url:"../pages/khel"},{title:"दुर्ग-भिलाई",url:"../pages/durg-bhilai"},{title:"ओपिनियन",url:"../pages/opinion"}];
  // document.getElementById("tags").innerHTML = tags.map(i => `<li><a href="../pages/${i.url}">${i.title}</a></li>`).join("");
  
  // document.getElementById("categ").innerHTML = tags.map(i => `<li class="cat-item"><a href="../pages/${i.url}">${i.title}</a></li>`).join("");
   const li1 = document.createElement("li");
    const li2 = document.createElement("li");
    li1.className="active";
    li1.innerHTML = `<a href="index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a>`;
    li2.innerHTML = `<a href="contact.php">संपर्क</a>`;
    const newChild = document.getElementById("topics");
    newChild.prepend(li1);
    newChild.appendChild(li2);
    // const Ele = [{title:"देश",url:"../pages/desh"},{title:"सेल",url:"../pages/sale"},{title:"दुर्ग-भिलाई",url:"../pages/durg-bhilai"},{title:"छत्तीसगढ़",url:"../pages/chhattisgarh"},{title:"जॉब-कार्रिएर",url:"../pages/job-career"},{title:"विदेश",url:"../pages/videsh"},{title:"राजनीति",url:"../pages/rajniti"},{title:"इतिहास",url:"../pages/itihas"},{title:"फैशन",url:"../pages/fashion"},{title:"धर्म-संस्कृती",url:"../pages/dharm-sanskriti"},{title:"पक्वान",url:"../pages/pakvan"},{title:"विचार",url:"../pages/opinion"},{title:"खेल",url:"../pages/khel"}]
    // newChild.innerHTML = Ele.map(i =>` <li><a href="${i.url}">${i.title}</a></li>`).join("")
</script>
</body>
</html>