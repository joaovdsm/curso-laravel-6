<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function painel() {
        return "Painel administrativo";
    }

    public function produtos() {
        return "Painel de gestão de produtos";
    }

    public function empresa() {
        return "Painel de gestão empresárial";
    }
}
