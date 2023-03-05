<?php

namespace Najmul\Ecom\classes;

use \Najmul\Ecom\classes\Repository\CategoryRepository;
use Najmul\Ecom\classes\Repository\CategoryNode;
use Najmul\Ecom\config\DatabaseSingleton;
class  CategoryTree{

    private $repo;
    public function __construct()
    {
        $this->repo = new CategoryRepository(DatabaseSingleton::getInstance());
    }

    public  function tree()
    {

        try {

            $result = $this->repo->getAllParentCategories();

            // Create top-level nodes
            $top_nodes = array();
            foreach ($result as $row)
            {
                $node = new CategoryNode($row["ParentcategoryId"], $row["Name"], 0);
                array_push($top_nodes, $node);
            }

            // Create child nodes for each top-level node
            foreach ($top_nodes as $node) {
                $this->createChildCategories($node);
            }

            include('src/view/category_tree.php');
        }catch (\Exception $exception){

            include('src/view/error/500.php');
        }

    }
    // Recursively fetch and create child nodes
    private function createChildCategories($node) {

        $childCategories = $this->repo->getChildCategoryByParent($node);

        foreach ($childCategories as $row){
            $child_node = new CategoryNode($row["Id"], $row["Name"], 0);
            $this->createChildCategories($child_node);
            $node->addChild($child_node);
        }

        $node->item_count = $this->repo->fetchItemForEachCategory($node);
    }

}

