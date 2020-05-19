<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepository;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    protected $category;

    public function __construct()
    {
        $this->category = new CategoryRepository();
        $this->middleware(function ($request, $next) {
            $categoy = $this->category->getAll();
            View::share('category', $categoy);
            return $next($request);
        });
    }
}
