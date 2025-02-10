<?php
namespace App\DTO\Contract;

use \Spatie\DataTransferObject\DataTransferObject;

class ContractDTO extends DataTransferObject
{
    /*** @var int */
    public int $customer_id;
    /*** @var null|int */
    public ?int $executor_id;

    /*** @var null|string */
    public ?string $comment;

    /*** @var int */
    public int $price;

    /*** @var int */
    public int $city_id;

    /*** @var string */
    public string $end_date;

    /*** @return array */
    public function toArray(): array
    {
        return [
            'customer_id' => $this->customer_id,
            'executor_id' => $this->executor_id,
            'comment' => $this->comment,
            'price' => $this->price,
            'city_id' => $this->city_id,
            'end_date' => $this->end_date,
        ];
    }
}
