<?php

namespace App\Http\Controllers;

use App\Hook\Item\ItemHook;
use App\HookUtils\Item\GetItem;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Mockery\Undefined;
use Tymon\JWTAuth\Facades\JWTAuth;

use function PHPSTORM_META\map;
use function PHPSTORM_META\type;

class ItemController extends Controller
{
    protected $item;

    public function __construct(ItemHook $item) {
        $this->item = $item;
    }

    public function all_item (Request $request, Product $product) : JsonResponse {
        try {
            $p = Product::find(1);
            // $p = $p->user_many()->syncWithoutDetaching([1, 2, 3]);

            $u = User::find(1);

            print_r($u->name);

            print_r($p->user_many[0]->name);


            $gItemClass = new GetItem();
    
            $data = $this->item->getItemCall($gItemClass, ["age" => 4324, "name" => "wefewf"]);
            
            return $data;
        }
        catch (Exception $e) {
            return response()->json(
                [
                    'error' => $e
                ]
            );
        }
    }
}
