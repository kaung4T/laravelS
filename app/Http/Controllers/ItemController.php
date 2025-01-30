<?php

namespace App\Http\Controllers;

use App\Events\MailEvent;
use App\Hook\Item\ItemHook;
use App\HookUtils\Item\GetItem;
use App\Http\Controllers\Controller;
use App\Jobs\TestMail;
use App\Listeners\MailListen;
use App\Models\Product;
use App\Models\User;
use App\Notifications\NotiTest;
use App\Notifications\TestNoti;
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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
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

    public function all_item (Request $request, Product $product, GG $gg_class) : JsonResponse {
        try {
            $gg = new GG('ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss');

            print_r($gg->name);

            $userNoti = User::findOrFail(1);

            Notification::send($userNoti, new TestNoti('eeeeeeeeeeeeeeeeeeee'));

            $name = 'gusto';

            $ff = function () use ($name) {
                return $name;
            };

            $ss = $ff();

            print_r($ss);

            // TestMail::dispatch();

            // $user = User::findOrFail(1);
            // MailEvent::dispatch($user);

            $uu = User::findOrFail(1);

            $p = Product::findOrFail(1);
            
            // $p->user_many()->detach(1);
            // $p->user_many()->syncWithoutDetaching([1, 2, 3]);

            $u = User::findOrFail(1);

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
