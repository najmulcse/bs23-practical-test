<?php

namespace Najmul\Ecom\classes;

use \Najmul\Ecom\classes\Repository\CategoryRepository;
use Najmul\Ecom\classes\Repository\CategoryNode;
use Najmul\Ecom\config\DatabaseSingleton;
class  CategoryTree{

    private $repo;
    public function __construct()
    {
        $this->repo = new CategoryRepository();
    }

    public  function tree()
    {

        try {
            $sql = "SELECT cr.ParentcategoryId, c.Name FROM category c 
             JOIN catetory_relations cr ON c.Id=cr.ParentcategoryId
            GROUP BY cr.ParentcategoryId
                                    ";
            $conn  = DatabaseSingleton::getInstance()->getDatabase();
            $result = $conn->fetchAll($sql);


            // Create top-level nodes
            $top_nodes = array();
            foreach ($result as $row)
            {
                //var_dump( $row); die();
                $node = new CategoryNode($row["ParentcategoryId"], $row["Name"], 0);
                array_push($top_nodes, $node);
            }

            // Recursively fetch and create child nodes
            function createChildNodes($node, $conn) {
                $sql = "SELECT c.Id, c.Name FROM category c 
             JOIN catetory_relations cr ON c.Id=cr.categoryId
             WHERE cr.ParentcategoryId = " . $node->id;
                $result = $conn->fetchAll($sql);


                foreach ($result as $row){
                    $child_node = new CategoryNode($row["Id"], $row["Name"], 0);
                    createChildNodes($child_node, $conn);
                    $node->addChild($child_node);
                }


                // Fetch item count for this node
                $sql = "SELECT COUNT(*) AS count FROM Item_category_relations WHERE categoryId = " . $node->id;
                $result = $conn->fetch($sql);;
                $node->item_count = $result["count"];
            }

            // Create child nodes for each top-level node
            foreach ($top_nodes as $node) {
                createChildNodes($node, $conn);
            }

            include('src/view/category_tree.php');
        }catch (\Exception $exception){
            include('src/view/error/500.php');
        }

    }
}

