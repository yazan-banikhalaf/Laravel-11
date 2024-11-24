<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Interfaces\UserInterface;

class UserController extends Controller
{
    private $userInterface;
    function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }
    public function index()
    {
        $users = $this->userInterface->all();

        return response()->json([
            "data" => $users,
        ], 200);
    }
    public function store(Request $request)
    {
        $data = $this->userInterface->store();

        return response()->json([
            "user" => $data,
        ], 200);
    }
    public function show($id)
    {
        $user = User::find($id);

        if(!$user)
        {
            return response()->json(['message' => 'User not found'], 200);
        }
        return response()->json([
            'name' => $user->name,
            'mail' => $user->email,
            'password' => $user->password,
        ]);
    }
    public function update($id, Request $request)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $data = [];

        if ($request->has('name') && !is_null($request->name)) {
            $data['name'] = $request->name;
        }

        if (empty($data)) {
            return response()->json(['message' => 'No valid fields to update'], 400);
        }

        $oldName = $user->name;

        $user->update($data);

        $newName = $user->name;

        return response()->json([
            'message' => 'User updated successfully from '. $oldName . ' to ' . $newName,
            'user' => $user,
        ], 200);
    }
    public function destroy($id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json(['message'=> 'User not found'], 404);
        }

        $user->delete();

        return response()->json([
            'message' => $user->name . ' deleted successfully',
        ], 200);
    }
}
