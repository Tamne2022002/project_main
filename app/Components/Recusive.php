<?php
namespace App\Components;

class Recusive
{
    private $data;
    private $categoryselect = '';
 
     
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function categoryRecusive($parentId, $id = 0, $text = '-')
    {

        foreach ($this->data as $value) {
            if ($value['id_parent'] == $id) {
                if (!empty($parentId) && $parentId == $value['id']) {
                    $this->categoryselect .= "<option selected value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                } else {
                    $this->categoryselect .= "<option value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";

                }
                $this->categoryRecusive($parentId, $value['id'], $text . '-');

            }
        }
        return $this->categoryselect;
    } 
    
     
}