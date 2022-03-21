<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'student_id' =>$this->student_id,
            'student_name' =>$this->student->name,
            'book_id' => $this->book_id,
            'book_title' => $this->book->title,
            'date_start' => $this->date_start->format('Y-m-d'),
            'date_end' => $this->date_end->format('Y-m-d'),
            'status' => $this->status,
        ];
    }
}
