<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomModelNotFoundException;
use App\Exceptions\NotFoundModal;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth:api']);
    }
    public function getDepartment($id)
    {
        try {
            $model = Department::find($id);
            if ($model) {
                return response()->json([
                    'data' => $model
                ]);
            } else {
                return CustomModelNotFoundException ::render();
            }
        } catch (CustomModelNotFoundException $e) {
            return $e::render();
        }
    }

    public function addDepartment(Request $request)
    {
        $field = $request->validate([
            'name' => 'string|required'
        ]);

        $model = Department::create(
            [
                'name' => $field['name']
            ]
        );
        return response()->json([
            'success' => 'ok',
            'data' => $model
        ], 201);
    }

    public function deleteDepartment($id)
    {
        $model =  Department::findOrFail($id);
        $model->delete();
        response()->json([
            'success' => 'ok',
            'message' => $id . ' numarali deparmant silindi'
        ]);
    }

    public function updateDepartment(Request $request, $id)
    {
        $field = $request->validate([
            'name' => 'string|required'
        ]);

        $model =  Department::findOrFail($id);
        $model->update([
            'name' => $field['name']
        ]);
        return response()->json([
            'success' => 'ok',
            'data' => $model
        ]);
    }

    public function getDepartments()
    {
        return response()->json(["data" => Department::all()]);
    }
}
