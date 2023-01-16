<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreTodolist;
use App\Http\Requests\Api\UpdateTodolist;
use App\Http\Resources\TodolistResource;
use App\Models\Todolist;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
   /**
     * @OA\Get(
     *      path="/api/todolists",
     *      operationId="todolists",
     *      tags={"Todolist"},
     *      summary="Get list of todolists",
     *      description="Returns list of todolists",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TodolistResource")
     *       ),
     * )
     */
    public function index()
    {
        return TodolistResource::collection(Todolist::with('getUser')->get());
    }

    /**
     * @OA\Post(
     *      path="/api/todolists/create",
     *      operationId="todolists/create",
     *      tags={"Todolist"},
     *      summary="Store new todolist",
     *      description="Returns todolist data",
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Todolist")
     *       ),
     * )
     */
    public function store(StoreTodolist $request)
    {
        $todo = Todolist::create($request->validated());

        return new TodolistResource($todo);
    }

    /**
     * @OA\Get(
     *      path="/api/todolists/{id}}",
     *      operationId="getTodolistById",
     *      tags={"Todolist"},
     *      summary="Get todolist information",
     *      description="Returns todolist data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Todolist id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     * )
     */
    public function show($id)
    {
        $todo = Todolist::find($id)->with('getUser')->first();
        return new TodolistResource($todo);
    }

    /**
     * @OA\Put(
     *      path="/api/todolists/{id}",
     *      operationId="updateTodolist",
     *      tags={"Todolist"},
     *      summary="Update existing todlist",
     *      description="Returns updated todolist data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Todolist id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Todolist")
     *       ),
     * )
     */
    public function update(UpdateTodolist $request, $id)
    {
        $todo = Todolist::find($id);
        $todo->update($request->validated());

        return new TodolistResource($todo);
    }

    
    /**
     * @OA\Delete(
     *      path="/api/todolists/{id}",
     *      operationId="deleteTodolist",
     *      tags={"Todolist"},
     *      summary="Delete existing todolist",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Todolist id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     
     * )
     */
    public function destroy($id)
    {
        try {

            $todo = Todolist::find($id);
            $todo->delete();

            return response()->json(['messages' => 'Items Successfuly Deleted!', 200]);

        }catch (ModelNotFoundException $exception){

            return response()->json(["msg"=>$exception->getMessage()],404);
        }
    }
}
