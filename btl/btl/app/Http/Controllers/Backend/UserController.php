<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
    }
    public function index(){
        // $template = 'backend.user.hello';
        $config = $this->config();
        return view('backend.user.hello',compact(
            'config'
        ));
    }
    private function config(){
        return [
            'js' => [
                'backend/js/plugins/switchery/switchery.js'
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.js'
            ]
            ];
    }
}
