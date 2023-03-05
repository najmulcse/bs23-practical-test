<?php

namespace Najmul\Ecom\classes\Repository;

class CategoryNode {
    public $id;
    public $name;
    public $item_count;
    public $children;

    public function __construct($id, $name, $item_count) {
        $this->id = $id;
        $this->name = $name;
        $this->item_count = $item_count;
        $this->children = array();
    }

    public function addChild($child) {
        array_push($this->children, $child);
    }

    public function calculateItemCount() {
        $count = $this->item_count;
        foreach ($this->children as $child) {
            $count += $child->calculateItemCount();
        }
        return $count;
    }
}

