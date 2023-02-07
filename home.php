<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS: Home</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css"
        rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="include/css/bootstrap.min.css" />
    <link href="include/css/bootstrap-icons.min.css" rel="stylesheet" />
    <link href="include/css/all.min.css" rel="stylesheet" />
    <script src="include/js/jquery.min.js"></script>
    <!-- 
    <script src="include/js/bootstrap.bundle.min.js"></script>
-->

</head>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
            include("sidebar.php");
            ?>
            <div class="col py-3">
                <h3>Left Sidebar with Submenus</h3>
                <p class="lead">
                    An example 2-level sidebar with collasible menu items. The menu functions like an "accordion" where
                    only a single
                    menu is be open at a time. While the sidebar itself is not toggle-able, it does responsively shrink
                    in width on smaller screens.</p>
                <ul class="list-unstyled">
                    <li>
                        <h5>Responsive</h5> shrinks in width, hides text labels and collapses to icons only on mobile
                    </li>
                </ul>
            </div>
        </div>
    </div>


</body>

</html>