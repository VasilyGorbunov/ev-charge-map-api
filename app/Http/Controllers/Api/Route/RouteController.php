<?php

namespace App\Http\Controllers\Api\Route;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Exception;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function store(Request $request)
    {
        try {
            $route = new Route();
            $route->name = $request->get('name');
            $route->from = $request->get('from');
            $route->to = $request->get('to');
            $route->range = $request->get('range');
            $route->save();

            return response()->json([
                'message' => 'The route was added successfully',
                'route' => $route
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong saving the route'], 400);
        }
    }

    public function destroy(int $id)
    {
        try {
            $route = Route::findOrFail($id);
            $route->delete();
            return response()->json([
                'success' => 'The route was deleted successfully'
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong delete the route'], 400);
        }
    }
}
