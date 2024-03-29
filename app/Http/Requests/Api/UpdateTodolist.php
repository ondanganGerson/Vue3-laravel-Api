<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Store Todolist request",
 *      description="Store Todolist request body data",
 *      type="Todolist",
 *      required={"name"}
 * )
 */
class UpdateTodolist extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            'title' => ['required'],
            'description' => ['required'],
        ];
    }
}
