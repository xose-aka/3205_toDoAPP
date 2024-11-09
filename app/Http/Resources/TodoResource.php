<?php

namespace App\Http\Resources;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    public static $wrap = null;

    /**
     * Transform the resource into an array.
     *
     * @return Todo
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'title' => is_null($this->getTranslation) ?  '' : $this->getTranslation->title ,
            'description' => is_null($this->getTranslation) ?  '' : $this->getTranslation->description ,
            'isCompleted' => $this->is_compleed,
            'createdAt' => $this->created_at->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
