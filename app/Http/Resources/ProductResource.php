<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Img' => $this->Img,
            'ProductCode' => $this->ProductCode,
            'ProductName' => $this->ProductName,
            'Qty' => $this->Qty,
            'UnitPrice' => $this->UnitPrice,
            'TotalPrice' => $this->TotalPrice,
            '_id' => $this->_id,
            'created_at' => $this->created_at,
        ];
    }
}
