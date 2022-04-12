<?php

namespace App\Http\Resources;

use App\Models\Cat;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
          return[
              'id'=>$this->id,
              'name_book'=>$this->name,
              'descriprion'=>$this->desc,
              'img'=>"http://127.0.0.1:8000/uploads/$this->img",
              'cat_id'=>$this->cat_id,
              "category_name"=>Cat::findOrFail($this->cat_id)
          ] ;
    }
}
