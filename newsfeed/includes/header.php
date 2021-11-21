<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font.css">
<link rel="stylesheet" type="text/css" href="../assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="../assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="../assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="../assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="latest_newsarea"> <span id="sp">Latest News</span>
                <ul id="ticker01" class="news_sticker">
                  <!-- <% const newList16 = [...newList]; %>
                <% newList16.reverse().slice(0,5).map(i => { %>
                    <li><a href="../pages/single_page/<%=i._id%>"><%=i.title %></a></li>
                  <% })%> -->

                  <?php
                    $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId order by tblposts.id desc limit 8");
                    while ($row=mysqli_fetch_array($query)) {

                    ?>
                    <li><a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a></li>
                  <?php } ?>

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="index.php" class="logo"><img src="../images/logo.jpg" alt=""></a></div>
          <div class="add_banner"><a href="#"><img src="../images/728x90.png" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
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
        </ul>
      </div>
    </nav>
  </section>
  </nav>
  <script src="../assets/js/jquery.min.js"></script> 
<script src="../assets/js/wow.min.js"></script> 
<script src="../assets/js/bootstrap.min.js"></script> 
<script src="../assets/js/slick.min.js"></script> 
<script src="../assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="../assets/js/jquery.newsTicker.min.js"></script> 
<script src="../assets/js/jquery.fancybox.pack.js"></script> 
<script src="../assets/js/custom.js"></script>
<script>
  const li1 = document.createElement("li");
    const li2 = document.createElement("li");
    li1.className="active";
    li1.innerHTML = `<a href="index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a>`;
    li2.innerHTML = `<a href="contact.php">संपर्क</a>`;
    const newChild = document.getElementById("topics");
    newChild.prepend(li1);
    newChild.appendChild(li2);
</script>