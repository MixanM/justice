<?php

namespace App\Http\Responses\Contract;

use App\Http\Responses\Response;
use App\Models\Api\Contract;
use Illuminate\Http\Request;

class ContractResponse extends Response
{
    /**
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Contract $this */
        return [
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'executor_id' => $this->executor_id,
            'comment' => $this->comment,
            'price' => $this->price,
            'city_id' => $this->city_id,
            'end_date' => $this->end_date,
        ];
    }
}
