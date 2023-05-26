<?php

namespace App\Http\Controllers;

use App\Models\people;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        $people = people::all();

        if ($people->count() > 0) {
            return response()->json([
                'status' => 200,
                'people' => $people
            ], 200);

        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No data'
            ], 404);
        }
    }
}
