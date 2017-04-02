<?php include 'includes/header.php' ?>
<div id="page-wrapper">
    
     <?php if (isset($_GET['source'])) {
                        //put the _GET superglobal to a variable
                        $source = $_GET['source'];
                    }else{
                        $source = '';
                    }

                    switch ($source) {
                        case 'add_post':
                            include "includes/add_comments.php";
                            break;

                        case 'edit_posts':
                            include "includes/edit_comments.php";
                            break;
                        
                        default:
                            include "includes/view_comments.php";
                            break;
                    }
                    ?>
</div>
<?php include 'includes/footer.php' ?>
</body>
</html>
