<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function painel() {
        return "Painel administrativo";
    }

    public function empresa() {
        return "Painel de gestão empresárial";
    }
}
