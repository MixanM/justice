<?php
namespace App\DTO\Contract;

use \Spatie\DataTransferObject\DataTransferObject;

class ContractDTO extends DataTransferObject
{
    public int $customer_id;
    public ?int $executor_id;
    public string $comment;
    public int $price;
    public int $city_id;
    public string $end_date;
}
