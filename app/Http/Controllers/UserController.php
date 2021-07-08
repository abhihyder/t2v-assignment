<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //

    public function update_name(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json(['error' => $validate->errors()], 422);
        }
        $auth = Auth::user();
        $auth->name = $request->name;
        $auth->save();
        return response()->json(['message' => $auth]);
    }
}
