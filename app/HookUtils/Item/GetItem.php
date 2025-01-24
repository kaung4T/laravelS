<?php

namespace App\HookUtils\Item;

use App\HookUtils\HookUtils;
use App\Models\Item;

class GetItem extends HookUtils {
    
    public $gg = "ggggggggggggg";
    
    public function run ($name, $age) {
        $data = [
            "data" => Item::all()
        ];
        
        return $data;
    }
}


