<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cocktail;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'result' => Cocktail::orderByDesc('id')->paginate(6)
        ]);
    }

    public function show($slug)
    {
        $cocktail = Cocktail::where('slug', $slug)->first();

        if ($cocktail) {
            return response()->json([
                'success' => true,
                'result' => $cocktail
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Page not found'
            ]);
        }
    }

    public function alcholic($alcholic)
    {
        $cocktail = Cocktail::where('alcholic', $alcholic)->paginate(6);

        if ($cocktail) {
            return response()->json([
                'success' => true,
                'result' => $cocktail
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Page not found'
            ]);
        }
    }
}
