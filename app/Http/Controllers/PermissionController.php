<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Permission::latest();
            return DataTables::of($data)
                ->addColumn('created_at', function ($row) {
                    return timeAgo(Carbon::parse($row->created_at));
                })
                ->make(true);
        }
        return view('panel.permissions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function syncPermissions()
    {
        $routes = Route::getRoutes()->getRoutes();
        $syncedPermissions = [];

        foreach ($routes as $route) {
            // Check if the route has a name and belongs to the 'web' middleware
            if ($route->getName() != '' && isset($route->getAction()['middleware']) && in_array('web', (array) $route->getAction()['middleware'])) {

                $data = [
                    'name' => $route->getName(),
                    'display_name' => $route->getAction()['as'] ?? null, // Use route alias if available
                    'description' => $route->getAction()['description'] ?? null, // Example: if you have a description in the route action
                ];

                // Use updateOrCreate to sync the permission
                $permission = Permission::updateOrCreate(
                    ['name' => $data['name']], // Conditions to find the existing record
                    $data // Data to create or update
                );

                // Track the synced permission
                $syncedPermissions[] = $permission->name;
            }
        }
        return $this->successResponse(count($syncedPermissions) . ' permissions synced successfully.', $syncedPermissions);
    }
}
