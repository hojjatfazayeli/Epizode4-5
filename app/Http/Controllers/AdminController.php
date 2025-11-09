<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminStoreRequest;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function store(AdminStoreRequest $adminStoreRequest)
    {
        $admin = Admin::create($adminStoreRequest->all());
        $token = $admin->createToken('َApi/AdminLogin');
        return response()->json([
            "message" => "Admin created",
            "token"=>$token->plainTextToken,
            "data" => new AdminResource($admin)
        ]);
    }

    public function show(Admin $admin)
    {
        return response()->json([
            "message" => "Admin Date Fetch Successfully",
            "data" => new AdminResource($admin)
        ]);
    }
}
