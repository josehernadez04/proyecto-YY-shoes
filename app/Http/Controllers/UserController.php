<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserAssignRoleAndPermissionsQueryRequest;
use App\Http\Requests\User\UserAssignRoleAndPermissionsRequest;
use App\Http\Requests\User\UserAssignWarehousesRequest;
use App\Http\Requests\User\UserRemoveRoleAndPermissionsQueryRequest;
use App\Http\Requests\User\UserRemoveRolesAndPermissionsRequest;
use App\Http\Requests\User\UserIndexQueryRequest;
use App\Http\Resources\User\UserIndexQueryCollection;
use App\Http\Requests\User\UserDeleteRequest;
use App\Http\Requests\User\UserPasswordRequest;
use App\Http\Requests\User\UserRemoveWarehousesRequest;
use App\Http\Requests\User\UserRestoreRequest;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\ModelWarehouse;
use App\Models\TypeDocument;
use App\Models\Warehouse;
use App\Services\UserService;
use App\Traits\ApiMessage;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use ApiResponser;
    use ApiMessage;

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = User::with('type_document')->get();
        return view('Dashboard.Users.Index', compact('users'));
    }

    public function create()
    {
        $typeDocuments = TypeDocument::all();
        return view('Dashboard.Users.Create', compact('typeDocuments'));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->type_document_id = $request->type_document_id;
        $user->document = $request->document;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $typeDocuments = TypeDocument::all();
        $user = User::findOrFail($id);
        return view('Dashboard.Users.Edit', compact('typeDocuments', 'user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->type_document_id = $request->type_document_id;
        $user->document = $request->document;
        $user->email = $request->email;
        if($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        try {
            $user = $this->userService->getUserById($id);

            return $this->successResponse(
                [
                    'user' => $user
                ],
                'El usuario fue encontrado exitosamente.',
                204
            );
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('ModelNotFoundException'),
                    'error' => $e->getMessage()
                ],
                404
            );
        } catch (Exception $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('Exception'),
                    'error' => $e->getMessage()
                ],
                500
            );
        }
    }

    public function password(UserPasswordRequest $request, $id)
    {
        try {
            $user = $this->userService->passwordUser($request, $id);

            return $this->successResponse(
                $user,
                'La contraseña del usuario fue actualizada exitosamente.',
                200
            );
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('ModelNotFoundException'),
                    'error' => $e->getMessage()
                ],
                404
            );
        } catch (QueryException $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('QueryException'),
                    'error' => $e->getMessage()
                ],
                500
            );
        } catch (Exception $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('Exception'),
                    'error' => $e->getMessage()
                ],
                500
            );
        }
    }

    public function delete(UserDeleteRequest $request)
    {
        try {
            $user = $this->userService->deleteUser($request);

            return $this->successResponse(
                $user,
                'El usuario fue eliminado exitosamente.',
                204
            );
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('ModelNotFoundException'),
                    'error' => $e->getMessage()
                ],
                404
            );
        } catch (Exception $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('Exception'),
                    'error' => $e->getMessage()
                ],
                500
            );
        }
    }

    public function restore(UserRestoreRequest $request)
    {
        try {
            $user = $this->userService->restoreUser($request);

            return $this->successResponse(
                $user,
                'El usuario fue restaurado exitosamente.',
                204
            );
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('ModelNotFoundException'),
                    'error' => $e->getMessage()
                ],
                404
            );
        } catch (Exception $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('Exception'),
                    'error' => $e->getMessage()
                ],
                500
            );
        }
    }

    public function assignRoleAndPermissionsQuery(UserAssignRoleAndPermissionsQueryRequest $request)
    {
        try {
            $user = User::findOrFail($request->input('id'));
            $roles = Role::with('permissions')->get();

            $rolesWithMissingPermissions = [];

            foreach ($roles as $role) {
                $missingPermissions = [];
                foreach (collect($role->permissions)->pluck('name') as $permission) {
                    if (!$user->hasRole($role->name) || !$user->hasDirectPermission($permission)) {
                        $missingPermissions[] = $permission;
                    }
                }
                if (!empty($missingPermissions)) {
                    $rolesWithMissingPermissions[] = (object) [
                        'role' => $role->name,
                        'permissions' => $missingPermissions
                    ];
                }
            }

            return $this->successResponse(
                $rolesWithMissingPermissions,
                'La consulta para asignar rol y permisos realizada exitosamente.',
                204
            );
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('ModelNotFoundException'),
                    'error' => $e->getMessage()
                ],
                404
            );
        } catch (Exception $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('Exception'),
                    'error' => $e->getMessage()
                ],
                500
            );
        }
    }

    public function assignRoleAndPermissions(UserAssignRoleAndPermissionsRequest $request)
    {
        try {
            $role = Role::where('name', $request->input('role'))->firstOrFail();
            $user = User::findOrFail($request->input('id'));

            if (!$user->hasRole($request->input('role'))) {
                $user->assignRole([$role]);
            }

            $user->givePermissionTo($request->input('permissions'));
            return $this->successResponse(
                $user,
                'El rol y los permisos fueron asignados al usuario exitosamente.',
                200
            );
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('ModelNotFoundException'),
                    'error' => $e->getMessage()
                ],
                404
            );
        } catch (QueryException $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('QueryException'),
                    'error' => $e->getMessage()
                ],
                404
            );
        } catch (Exception $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('Exception'),
                    'error' => $e->getMessage()
                ],
                500
            );
        }
    }

    public function removeRoleAndPermissionsQuery(UserRemoveRoleAndPermissionsQueryRequest $request)
    {
        try {
            $user = User::with('roles.permissions','permissions')->findOrFail($request->input('id'));

            $rolesWithMissingPermissions = [];

            foreach($user->roles as $role){
                $missingPermissions = [];
                foreach (collect($role->permissions)->pluck('name') as $permission) {
                    if ($user->hasDirectPermission($permission)) {
                        $missingPermissions[] = $permission;
                    }
                }
                if (!empty($missingPermissions)) {
                    $rolesWithMissingPermissions[] = (object) [
                        'role' => $role->name,
                        'permissions' => $missingPermissions
                    ];
                }
            }

            return $this->successResponse(
                $rolesWithMissingPermissions,
                'La consulta para remover rol y permisos realizada exitosamente.',
                204
            );
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('ModelNotFoundException'),
                    'error' => $e->getMessage()
                ],
                404
            );
        } catch (Exception $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('Exception'),
                    'error' => $e->getMessage()
                ],
                500
            );
        }
    }

    public function removeRoleAndPermissions(UserRemoveRolesAndPermissionsRequest $request)
    {
        try {
            $role = Role::with('permissions')->where('name', $request->input('role'))->firstOrFail();
            $user = User::findOrFail($request->input('id'));

            $user->revokePermissionTo($request->input('permissions'));

            $missingPermissions = [];

            foreach (collect($role->permissions)->pluck('name') as $permission) {
                if ($user->hasDirectPermission($permission)) {
                    $missingPermissions[] = $permission;
                }
            }

            if(empty($missingPermissions)) {
                $user->removeRole($request->input('role'));
            }

            return $this->successResponse(
                $user,
                'El rol y los permisos fueron removidos al usuario exitosamente.',
                200
            );
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('ModelNotFoundException'),
                    'error' => $e->getMessage()
                ],
                404
            );
        } catch (QueryException $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('QueryException'),
                    'error' => $e->getMessage()
                ],
                404
            );
        } catch (Exception $e) {
            return $this->errorResponse(
                [
                    'message' => $this->getMessage('Exception'),
                    'error' => $e->getMessage()
                ],
                500
            );
        }
    }
}
