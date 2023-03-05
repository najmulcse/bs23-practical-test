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

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav hidden-xs">
            <h2>Logo</h2>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="?page=category">Category List</a></li>
                <li><a href="?page=category-tree">Category Item Tree</a></li>
            </ul><br>
        </div>
        <br>

        <div class="col-sm-9">
           <h1 style="color: darkred;">Not found!!</h1>
        </div>
    </div>
</div>

</body>
</html>
