<?php

namespace Najmul\Ecom\classes\Repository;
class Category {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getCategoryTree() {
        $query = "SELECT c.Id, c.Name, c.Number, COUNT(icr.ItemNumber) AS item_count
                  FROM category c
                  LEFT JOIN Item_category_relations icr ON c.Id = icr.categoryId
                  GROUP BY c.Id
                  ORDER BY c.Priority ASC";

        $result = $this->conn->query($query);

        $categories = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $category = array(
                "id" => $row["Id"],
                "name" => $row["Name"],
                "number" => $row["Number"],
                "item_count" => $row["item_count"],
                "children" => array()
            );

            $this->getCategoryChildren($category);

            $categories[] = $category;
        }

        return $categories;
    }

    private function getCategoryChildren(&$category) {
        $query = "SELECT c.Id, c.Name, c.Number, COUNT(icr.ItemNumber) AS item_count
                  FROM category c
                  INNER JOIN catetory_relations cr ON c.Id = cr.categoryId
                  LEFT JOIN Item_category_relations icr ON c.Id = icr.categoryId
                  WHERE cr.ParentcategoryId = ?
                  GROUP BY c.Id
                  ORDER BY c.Priority ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $category["id"]);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $child = array(
                "id" => $row["Id"],
                "name" => $row["Name"],
                "number" => $row["Number"],
                "item_count" => $row["item_count"],
                "children" => array()
            );

            $this->getCategoryChildren($child);

            $category["children"][] = $child;
        }
    }
}