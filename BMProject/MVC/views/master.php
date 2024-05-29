<!DOCTYPE html>
<html>
    <head>
        <?php require_once "layout/head.php"; ?>
    </head>
    <body>  
        <div id="wrapper">
            <?php require_once "layout/sidebar.php"; ?> 
            <div id="page-wrapper" class="gray-bg">
                <?php require_once "layout/nav.php"; ?>        
               
                <?php
                        require_once "./MVC/views/pages/".$data["Page"].".php";
                ?>
                <?php require_once "layout/footer.php"; ?>
            </div>
            <?php require_once "layout/rightside.php"; ?>
        </div>
        <?php require_once "layout/script.php"; ?>
    </body>
</html>
