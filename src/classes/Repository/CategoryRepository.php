<?php

namespace Najmul\Ecom\classes\Repository;

use Najmul\Ecom\config\DatabaseSingleton;

class CategoryRepository
{
    private $db;
    public function __construct()
    {
        $this->db = DatabaseSingleton::getInstance()->getDatabase();
    }

    public function getCategory()
    {
        try {
            $sql = "SELECT pp.Id,pp.Name, COUNT(icr.ItemNumber) AS item_count FROM 
(SELECT c.Id, c.Name, cr.ParentcategoryId 
FROM `category` c
LEFT JOIN `catetory_relations` cr ON `cr`.`ParentcategoryId` = `c`.`Id`
GROUP BY cr.`ParentcategoryId`
) pp 
LEFT JOIN `Item_category_relations` icr ON icr.`categoryId`= pp.`ParentcategoryId`
LEFT JOIN `Item` i ON i.Number = icr.`ItemNumber`
GROUP BY icr.categoryId
ORDER BY COUNT(icr.ItemNumber) DESC;";
            return  $this->db->fetchAll($sql);
        }catch (\Exception $exception){
            echo "Log:CategoryRepository::getCategroy() ". $exception;
        }

        return [];

    }
    public function getChildNodeByParent($node)
    {
        try {
            var_dump($node->id); die();
            $sql = "SELECT c.Id, c.Name FROM category c 
             JOIN catetory_relations cr ON c.Id=cr.categoryId
             WHERE cr.ParentcategoryId = " . $node->id;
            return  $this->db->fetchAll($sql);
        }catch (\Exception $exception){

            return [];
        }


    }


    public function getAllParentNode()
    {
        $sql = "SELECT cr.ParentcategoryId, c.Name FROM category c 
             JOIN catetory_relations cr ON c.Id=cr.ParentcategoryId
            GROUP BY cr.ParentcategoryId
                                    ";
        return $this->db->fetchAll($sql);
    }
    public function fetchItemForEachCategory($node)
    {
        $sql = "SELECT COUNT(*) AS count FROM Item_category_relations WHERE categoryId = " . $node->id;
        $result = $this->db->fetch($sql);
        return $result["count"];
    }
}

