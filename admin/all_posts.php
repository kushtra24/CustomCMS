<?php include 'includes/header.php' ?>
<div id="page-wrapper">
    
     <?php if (isset($_GET['burimi'])) {
                        
                        $burimi = $_GET['burimi'];
                    }else{
                        $burimi = '';
                    }

                    switch ($burimi) {
                        case 'add_post':
                            include "includes/add_post.php";
                            break;

                        case 'edit_posts':
                            include "includes/edit_posts.php";
                            break;
                        
                        default:
                            include "includes/view_all_posts.php";
                            break;
                    }
                    ?>
</div>
<?php include 'includes/footer.php' ?>
</body>
</html>
