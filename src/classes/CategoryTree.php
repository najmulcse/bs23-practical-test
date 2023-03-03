<?php

namespace Najmul\Ecom\classes;

use \Najmul\Ecom\classes\Repository\CategoryRepository;

class  CategoryTree{

    private $repo;
    public function __construct()
    {
        $this->repo = new CategoryRepository();
    }

    public  function tree()
    {

        try {
            $data = $this->repo->getCategoryTree();
            include('src/view/category_tree.php');
        }catch (\Exception $exception){
            include('src/view/error/500.php');
        }

    }
}