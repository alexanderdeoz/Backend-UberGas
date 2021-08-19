<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\V1\Roles\DestroyRolRequest;
use App\Http\Requests\V1\Roles\StoreRolRequest;
use App\Http\Requests\V1\Roles\UpdateRolRequest;
use App\Http\Resources\V1\Roles\RoleCollection;
use App\Http\Resources\V1\Roles\RoleResource;
use Illuminate\Support\Facades\DB;



class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
        $this->middleware('permission:view-roles')->only(['index','show']);
        $this->middleware('permission:store-roles')->only(['store']);
        $this->middleware('permission:update-roles')->only(['update']);
        $this->middleware('permission:delete-roles')->only(['destroy']);
    }
        public function index()
        {
            return new RoleCollection(Role::paginate());
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(StoreRolRequest $request)
        {
            $roles = new Role();
            $roles->name= $request->input('name');
            
            $roles->save();
            
            return response()->json(
                ['data'=> null,
                'msg' => [
                'summary' => 'Creado correctamente',
                'detail' => 'El empleado se creo correctamente',
                'code' => '201']], 201
             );
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($roles)
        {
            return new RoleResource($roles);
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(UpdateRolRequest $request, $roles)
        {
            $roles = Role::find($roles);
            $roles->name= $request->input('name');
            $roles->save();
            
            return response()->json(
               [  'data' => null,
               'msg' => [
               'summary' => 'Actualizado correctamente',
               'detail' => 'EL empleado se actualizó correctamente',
               'code' => '201']], 201
            );
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($roles)
        {
            $roles = Role::find($roles);
            $roles->delete();
            return response()->json(
                ['data'=> null,
                'msg' => [
                'summary' => 'Eliminado correctamente',
                'detail' => 'EL empleado se eliminó correctamente',
                'code' => '201']], 201
             );
        }
    
        public function updateState()
        {
            return response()->json(
                ['data'=> null,
                'msg' => [
                'summary' => 'actualizado Correctamente',
                'detail' => 'EL empleado se actualizo correctamente',
                'code' => '201']], 201
             );
        }

        public function destroys (DestroyRolRequest $request)
        {
            Role::destroy($request->input('ids'));
    
            return response()->json(
                [
                    'data' => null,
                    'msg' => [
                        'summary' => 'Eliminado correctamente',
                        'detail' => 'EL empleado se eliminó correctamente',
                        'code' => '201'
                    ]
                ],
                201
            );
        }
    }
