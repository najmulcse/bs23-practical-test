<!DOCTYPE html>
<html lang="en">
<head>
    <title>Category List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 550px}

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
            .row.content {height: auto;}
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Dashboard</a></li>
                <li><a href="#">Category List</a></li>
                <li><a href="#">Category Tree</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav hidden-xs">
            <h2>Logo</h2>
            <ul class="nav nav-pills nav-stacked">
                <li class=""><a href="?page=category">Category List</a></li>
                <li class="active"><a href="category-tree.php">Category Item Tree</a></li>
            </ul><br>
        </div>
        <br>

        <div class="col-sm-9">
            <div class="well">
                <h4>Category Tree</h4>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="well">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category</th>
                                <th scope="col">Total Item</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($data) && $data){
                                foreach ($data as $key => $category){
//
                                    ?>
                                    <tr>
                                        <th scope="row"> <?php echo ++$key ?></th>
                                        <td> <?php

                                            echo $category['Name'] ?? ''?> </td>
                                        <td><?= $category['item_count'] ?? '' ?></td>
                                    </tr>
                                <?php }
                            } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
