<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GG extends SS
{
    //
    // public string|null $name;

    public function __construct(string|null $name = null) {
        parent::__construct($name);
        // $this->name = $name;
    }

    public function fun () {
        return $this->name;
    }

    public function __invoke($data)
    {
        return $data . 'ij iji ji jij ij ij i';
    }
}
