<?php
namespace App\Components;

use App\Models\Menu;

class MenuRecusive{
    private $html;
    public function __construct()
    {
        $this->html='';
    }
    public function menuRecusiveAdd($perentId = 0, $subMark = ''){
        $data = Menu::where('parent_id', $perentId)->get();
        foreach($data as $dataItem){
            $this->html .='<option value="'. $dataItem->id .'">'. $subMark . $dataItem->name .'</option>';
            $this->menuRecusiveAdd($dataItem->id, subMark:$subMark.'--');
        }
        return $this->html;
    }

    public function menuRecusiveEdit($perentIdMenuEdit, $perentId = 0, $subMark = ''){
        $data = Menu::where('parent_id', $perentId)->get();
        foreach($data as $dataItem){
            if($perentIdMenuEdit == $dataItem->id){
                $this->html .='<option selected value="'. $dataItem->id .'">'. $subMark . $dataItem->name .'</option>';
            }else{
                $this->html .='<option value="'. $dataItem->id .'">'. $subMark . $dataItem->name .'</option>';
            }
            $this->menuRecusiveEdit($perentIdMenuEdit, $dataItem->id, $subMark.'--');
        }
        return $this->html;
    }
}