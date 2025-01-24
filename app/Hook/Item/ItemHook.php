<?php

namespace App\Hook\Item;

use App\HookUtils\HookUtils;
use App\HookUtils\Item\GetItem;

class ItemHook {
    public function getItemCall (GetItem $getItem, $data) {
        $item = $getItem->handle($data);

        return $item;
    }
}
