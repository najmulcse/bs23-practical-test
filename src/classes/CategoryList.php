<?php

namespace Najmul\Ecom\classes;

use Najmul\Ecom\classes\Repository\CategoryRepository;
use Najmul\Ecom\config\DatabaseSingleton;


class CategoryList {

    private $categoryRepo;
    public function __construct()
    {
        $this->categoryRepo = new CategoryRepository(DatabaseSingleton::getInstance());

    }
    public  function category()
    {

        try {
            $data = $this->categoryRepo->getCategory();
            include('src/view/category.php');
        }catch (\Exception $exception){
            include('src/view/error/500.php');
        }

    }
    
}