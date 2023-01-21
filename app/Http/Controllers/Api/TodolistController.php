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
     *      path="/api/todolists",
     *      operationId="storeProject",
     *      tags={"Todolist"},
     *      summary="Store new project",
     *      description="Returns project data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreTodolist")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Todolist")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
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
     *        @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Todolist")
     *       ),
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
     *      operationId="updateProject",
     *      tags={"Todolist"},
     *      summary="Update existing project",
     *      description="Returns updated project data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Todolist id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     * 
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateTodolist")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Todolist")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
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
     *        @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Todolist")
     *       ),
     
     * )
     */
    public function destroy($id)
    {
        try {

            $todo = Todolist::find($id);
            $todo->delete();

            // return response()->json(['messages' => 'Items Successfuly Deleted!', 200]); // no need to return responsee as json, resource convert in json automatically

            return new TodolistResource($todo);

        }catch (ModelNotFoundException $exception){

            return response()->json(["msg"=>$exception->getMessage()],404);
        }
    }
}
