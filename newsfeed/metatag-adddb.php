<?php
include('includes/config.php');
    if(isset($_POST['submit'])){
        $meta_url=$_POST['meta_url'];
        $meta_title=$_POST['meta_title'];
        $meta_keywords=addslashes($_POST['meta_keywords']);
        $meta_description=addslashes($_POST['meta_description']);
        if($meta_url!=''){
            $insertqry = 'INSERT INTO `meta_tag`(`meta_url`, `meta_title`, `meta_keywords`, `meta_description`) VALUES ("$meta_url","$meta_title","$meta_keywords","$meta_description")';
            $insertres = mysqli_query($con,$insertqry);

            echo '<script>console.log("Inside metatag-adddb.php")</script>'; 
        }
    }

?>