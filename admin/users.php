<?php include 'includes/header.php' ?>
<div id="page-wrapper">
    
     <?php if (isset($_GET['source'])) {
                        //put the _GET superglobal to a variable
                        $source = $_GET['source'];
                    }else{
                        $source = '';
                    }

                    switch ($source) {
                        case 'add_user':
                            include "includes/add_user.php";
                            break;

                        case 'edit_user':
                            include "includes/edit_user.php";
                            break;
                        
                        default:
                            include "includes/view_users.php";
                            break;
                    }
                    ?>
</div>
<?php include 'includes/footer.php' ?>
</body>
</html>
