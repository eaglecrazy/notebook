<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function registerValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:1'],
            'device_name' => ['required', 'string'],
        ]);
    }

    /**
     * Get a validator for an incoming authentification request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function authValidator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:1'],
            'device_name' => ['required', 'string'],
        ]);
    }

    /**
     * Register new user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $validator = $this->registerValidator($request->all());
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $token = $user->createToken($request['device_name'])->plainTextToken;
        return response()->json(['token' => $token], 200);
    }

    /**
     * Get token
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function token(Request $request)
    {
        $validator = $this->authValidator($request->all());
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $user = User::where('email', $request['email'])->first();
        if (!$user || !Hash::check($request['password'], $user->password)) {
            return response()->json(['error' => 'The provided credentials are incorrect.'], 401);
        }
        return response()->json(['token' => $user->createToken($request['device_name'])->plainTextToken]);
    }
}
