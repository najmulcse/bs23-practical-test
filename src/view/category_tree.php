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
            <h2>Practical Test</h2>
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

                            <?php

                            // Display tree structure on the website
                            function displayNode($node) {
                                $has_children = count($node->children) > 0;
                                $item_count = $node->calculateItemCount();
                                $classes = ['category'];
                                if ($has_children) {
                                    $classes[] = 'parent';
                                    $classes[] = 'collapsed';
                                }
                                if ($has_children && $item_count > 0) {
                                    $classes[] = 'arrow-visible';
                                    echo '<li class="' . implode(' ', $classes) . '">';
                                    echo '<span class="arrow-icon"></span>';
                                }else{
                                    echo '<li class="' . implode(' ', $classes) . '"';
                                }


                                echo '<span class="category-name">' . $node->name . ' (' . $item_count . ')</span>';
                                if ($has_children) {
                                    echo '<ul class="hidden">';
                                    foreach ($node->children as $child) {
                                        displayNode($child);
                                    }
                                    echo '</ul>';
                                }
                                echo '</li>';
                            }
                            echo '<ul class="category-list">';
                            foreach ($top_nodes as $node) {
                                displayNode($node);
                            }
                            echo '</ul>';

                            ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>

    ul {
        list-style: none;
        padding-left: 1em;
    }

    ul ul {
        padding-left: 1em;
    }

    .category-name {
        cursor: pointer;
    }

    .category-name:hover {
        font-weight: bold;
    }

    .hidden {
        display: none;
    }

    .arrow-icon {
        display: inline-block;
        width: 0;
        height: 0;
        margin-right: 0.5em;
        border-top: 0.3em solid transparent;
        border-bottom: 0.3em solid transparent;
        border-left: 0.5em solid #ccc;
    }

    .arrow-visible .arrow-icon {
        display: inline-block;
    }

    .category {
        margin-bottom: 0.5em;
    }

    .category.parent.collapsed > .hidden {
        display: none;
    }

    .category.parent:not(.collapsed) > .hidden {
        display: block;
    }
</style>
<script>
    window.addEventListener("load", function() {
        let categoryNames = document.getElementsByClassName("category-name");

        for (let i = 0; i < categoryNames.length; i++) {
            categoryNames[i].addEventListener("click", function() {
                let categoryUl = categoryNames[i].nextElementSibling;
                if (categoryUl.classList.contains("hidden")) {
                    categoryUl.classList.remove("hidden");
                } else {
                    categoryUl.classList.add("hidden");
                }
            });
        }
    });
</script>