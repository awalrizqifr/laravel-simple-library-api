<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'student_nik' =>$this->student->nik,
            'student_name' =>$this->student->name,
            'book_title' => $this->book->title,
            'date_start' => $this->date_start->format('d/m/Y'),
            'date_end' => $this->date_end->format('d/m/Y'),
            'duration' => date_diff($this->date_end, $this->date_start)->format('%d days'),
            'transaction_status' => ($this->status) ? 'Returned' : 'Borrowed'
        ];
    }
}
