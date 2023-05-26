<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeopleController extends Controller
{
    public function index()
    {
        $peoples = People::all();

        if ($peoples->count() > 0) {
            return response()->json([
                'status' => 200,
                'peoples' => $peoples
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No records found'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|max:20',
            'Last_name' => 'required|string|max:25',
            'Phone_number' => 'required|digits:9',
            'Street' => 'required|string|max:35',
            'City' => 'required|string|max:35',
            'Country' => 'required|string|max:35',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422);
        } else {
            $people = People::create([
                'Name' => $request->Name,
                'Last_name' => $request->Last_name,
                'Phone_number' => $request->Phone_number,
                'Street' => $request->Street,
                'City' => $request->City,
                'Country' => $request->Country
            ]);

            if ($people) {
                return response()->json([
                    'status' => 200,
                    'message' => "Person added successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Error"
                ], 500);
            }
        }
    }

    public function show($id)
    {
        $people = People::find($id);

        if ($people) {
            return response()->json([
                'status' => 200,
                'person' => $people
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No person found'
            ], 404);
        }
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|max:35',
            'Last_name' => 'required|string|max:35',
            'Phone_number' => 'required|digits:9',
            'Street' => 'required|string|max:35',
            'City' => 'required|string|max:35',
            'Country' => 'required|string|max:35',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422);
        } else {
            $people = People::find($id);

            if ($people) {
                $people->update([
                    'Name' => $request->Name,
                    'Last_name' => $request->Last_name,
                    'Phone_number' => $request->Phone_number,
                    'Street' => $request->Street,
                    'City' => $request->City,
                    'Country' => $request->Country
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Person updated successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "Error"
                ], 404);
            }
        }
    }

    public function delete($id)
    {
        $people = People::find($id);

        if ($people) {
            $people->delete();

            return response()->json([
                'status' => 200,
                'message' => "Person deleted successfully"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "Error "
            ], 404);
        }
    }
}
