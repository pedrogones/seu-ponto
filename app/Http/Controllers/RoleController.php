<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::query()->paginate(10);
      return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        $data = $request->validated();
         try {
            $data = request()->all();
            Role::query()->create($data);
            return redirect()->route('roles.index')->with('success', 'Permissão salva com sucesso!');

         } catch (Exception $e) {
           dd($e);
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = Role::find($id);
        return view('roles.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        try {
            $data = $request->all();
          $role->update($data);
            return redirect()->route('roles.index')->with('success', 'Permissão atualizada com sucesso!');

        } catch (Exception $e) {
            return back()->with('success', 'Não foi possivel atualizar a permissão!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return back()->with('success', 'Permissão removida com sucesso!');
          } catch (Exception $e) {
           return back()->with('error', 'Não foi possivel remover!');
          }
    }
}
