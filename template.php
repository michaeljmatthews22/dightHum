<!DOCTYPE html>

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
                    <li><a href="delivery/index.php">Delivery</a></li>
                    <li><a href="allYourData/index.php">Data</a><li> 
                    <li><a href="level2/index.php">Level 2</a></li>  
                </ul>
            </nav>
            
            <div id="content_area">
                <?php echo $content; ?>
            </div>
          <div id= "footer" > </div>
          
    </body>
</html>