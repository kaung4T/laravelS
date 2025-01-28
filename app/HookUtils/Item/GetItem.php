<?php

namespace App\HookUtils\Item;

use App\HookUtils\HookUtils;
use App\Models\Item;

class GetItem extends HookUtils {
    
    public $gg = 'eeeeeeeeeeeeeeeeeeee';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function run ($name, $age) {
        $data = [
            "hello" => $this->ss,
            "data" => Item::all()
        ];
        
        return $data;
    }
}


