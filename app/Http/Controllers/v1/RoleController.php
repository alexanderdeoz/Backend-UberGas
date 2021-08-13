<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $roles = Role::get();

            return response()->json(
               ['data'=> $roles,
               'msg'=>['sumary'=> 'consulta correcta',
               'detail'=>'la consulta esta correcta', 
               'code'=>'201']], 201);
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $roles = new Role();
            $roles->name= $request->name;
            
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
            $roles = DB::select('select * from app.roles where id = ?',[$roles]);
            return response()->json(
               ['data'=> $roles,
               'msg'=>['sumary'=> 'consulta correcta',
               'detail'=>'la consulta esta correcta', 
               'code'=>'200']], 200
            );
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $roles)
        {
            $roles = Role::find($roles);
            $roles->name= $request->name;
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
        }}
