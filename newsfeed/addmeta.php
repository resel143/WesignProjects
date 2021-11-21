<?php 
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Add Meta Tags</title>
</head>
<body>
    <div id="title"><h1>Add Meta Tag</h1></div>
    <div id="meta-form">
        <form method="POST" action="metatag-adddb.php" >
            <div id="form-group">
                <label for="exPage">Page</label>
                <!-- <input type="text" placeholder="Select Page" id="exPage" name="meta_url"> -->
                <select name="meta_url" class="form-control" required>
                    <option value="Select Page">Select Page</option>
                    <?php 
                        $menulist = "select * from site_pages where page_status='Enable'";
                         $menures = mysqli_query($con,$menulist);
                         while($menudata = mysqli_fetch_assoc($menures)) 
                         {
                    ?>
                            <option value="<?php echo $menudata['page_id'];?>"><?php echo $menudata['page_name'];?></option>
                        <?php } ?>
                </select>
            </div>
            <div id="form-group">
                <label for="exTitle">Title</label>
                <input type="text" id="exTitle" placeholder="Title" name="meta_title">
            </div>
            <div id="form-group">
                <label for="exKeyword">Keywords</label>
                <input type="text" id="exKeyword" name="meta_keywords" placeholder="Keywords">
            </div>
            <div id="form-group">
                <label for="exDesc">Description</label>
                <input type="text" name="meta_description" id="exDesc" placeholder="Description">
            </div>
            <button type="submit" class="btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>