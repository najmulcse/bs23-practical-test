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
    public function getCategoryTree()
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

}