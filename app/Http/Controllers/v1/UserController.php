<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Users\DestroyUserRequest;
use App\Http\Requests\V1\Users\StoreUserRequest;
use App\Http\Requests\V1\Users\UpdateUserRequest;
use App\Http\Resources\V1\Users\UserCollection;
use App\Http\Resources\V1\Users\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return UserCollection
     */
    public function index()
    {
        return new UserCollection(User::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $request)
    {
        $users = new User();
        $users->name = $request->input('name');
        $users->lastname = $request->input('lastname');
        $users->avatar = $request->input('avatar');
        $users->username = $request->input('username');
        $users->birthdate = $request->input('birthdate');
        $users->email = $request->input('email');
        $users->email_verified_at = $request->input('email_verified_at');
        $users->password_changed = $request->input('password_changed');
        $users->save();

        return response()->json(
            [
                'data' => $users,
                'msg' => [
                    'summary' => 'Usuario creado',
                    'detail' => '',
                    'code' => '201'
                ]
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return UserResource
     */
    public function show(User $user)
    {
        //metodo find()
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRequest $request, User $users)
    {
        $users->username = $request->input('username');
        $users->name = $request->input('name');
        $users->lastname = $request->input('lastname');
        $users->avatar = $request->input('avatar');
        $users->username = $request->input('username');
        $users->birthdate = $request->input('birthdate');
        $users->email = $request->input('email');
        $users->email_verified_at = $request->input('email_verified_at');
        $users->password_changed = $request->input('password_changed');
        $users->save();
        return response()->json(
            [
                'data' => $users,
                'msg' => [
                    'summary' => 'Usuario Modificado',
                    'detail' => '',
                    'code' => '201'
                ]
            ],
            201
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(User $users)
    {
        $users->delete();

        return response()->json(
            [
                'data' => $users,
                'msg' => [
                    'summary' => 'Usuario Eliminado',
                    'detail' => '',
                    'code' => '201'
                ]
            ],
            201
        );
    }

    public function destroy(DestroyUserRequest $request)
    {
        User::destroy($request->input('ids'));

        return response()->json(
            [
                'data' => null,
                'msg' => [
                    'summary' => 'Usuario/s Eliminado/s',
                    'detail' => '',
                    'code' => '201'
                ]
            ],
            201
        );
    }
}
