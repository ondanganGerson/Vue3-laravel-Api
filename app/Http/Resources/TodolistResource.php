<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="TodolistResource",
 *     description="Todolist resource",
 *     @OA\Xml(
 *         name="TodolistResource"
 *     )
 * )
 */
class TodolistResource extends JsonResource
{
    
    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request); //return your transformed data here
    }
}
