<?php

require_once __DIR__ . '/vendor/autoload.php';

use Najmul\Ecom\classes\CategoryList;
use Najmul\Ecom\classes\CategoryTree;
use Najmul\Ecom\classes\HomeController;

$page = isset($_GET['page']) ? $_GET['page'] : 'category';

try{
    switch ($page) {

        case 'category':
           (new CategoryList())->category();
            break;
        case 'category-tree':
            (new CategoryTree())->tree();
            break;
        default:
            (new HomeController())->page();
            break;
    }

    $page->render();
}catch (\Exception $exception){
    die('Failed');
}





