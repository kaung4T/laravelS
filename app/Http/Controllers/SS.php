<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SS extends Controller
{
    //
    public string|null $name;

    public function __construct(string|null $name = null) {
        $this->name = $name;
    }

    public function __invoke($name) {
        return $name . 'ij ij ij iij i ji j ij';
    }
}
