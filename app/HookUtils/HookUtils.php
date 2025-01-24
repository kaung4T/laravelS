<?php

namespace App\HookUtils;

use App\HookUtils\Item\GetItem;

abstract class HookUtils {
    
    abstract public function run ($name, $age);

    public function handle ($data) {
        if (method_exists($this, 'run')) {
            $data = $this->run(...$data);
        }
        else {
            $data = [
                "no" => "no"
            ];
        }

        return response()->json($data);
    }
}
