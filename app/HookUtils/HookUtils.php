<?php

namespace App\HookUtils;

use App\HookUtils\Item\GetItem;

abstract class HookUtils {

    public int|string|null $ss;

    public function __construct(int|string|null $ss = null) {
        $this->ss = $ss;
    }
    
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
