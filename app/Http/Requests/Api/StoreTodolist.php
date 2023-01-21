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

class StoreTodolist extends FormRequest
{
     /**
     * @OA\Property(
     *      title="title",
     *      description="Name of the new project",
     *      example="A nice project"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description of the new project",
     *      example="This is new project's description"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="user_id",
     *      description="Author's id of the new project",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $user_id;
    
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
