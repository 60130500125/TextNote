<?php

namespace App\Http\Controllers;

use App\Repositories\UserManagementRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserManagementController extends Controller
{
    private $user;

    public function __construct(UserManagementRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function storeUser(Request $request)
    {
        $data = $request->all();
        $this->user->createUser($data);
        return response()->json('สำเร็จ', 200);
    }

    public function indexAllUser()
    {
        $user = $this->user->getAllUser();
        return response()->json($user, 200);
    }

    public function storeUniversity(Request $request)
    {
        $data = $request->all();
        $this->user->createUniversity($data);
        return response()->json('สำเร็จ', 200);
    }

    public function indexUniversity()
    {
        $university = $this->user->getAllUniversity();
        return response()->json($university, 200);
    }

    public function login(Request $request)
    {
        $data = $request->all();
        $user = $this->user->getLogin($data);
        return response()->json($user, 200);
    }
}
