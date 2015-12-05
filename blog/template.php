<!DOCTYPE html>
<?php session_start();?>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title><?php echo $title; ?> </title>
        <link rel="stylesheet" type="text/css" href="css/SyleSheet.css" />
    </head>
    <body>
        <div id ="wrapper">
            <div id ="banner">
                
            </div>
            
            <nav id="navigation">
                <ul id="nav">
                    <li><a href="newPosts.php">New Post</a></li>
                    <li><a href="oldPosts.php">Past Posts</a><li> 
                    <li><a href="search.php">Search</a></li>  
                </ul>
            </nav>
            <div id="content_area">
                <?php echo $content; ?>
            </div>
          <div id= "footer" > </div>
          
    </body>
</html>