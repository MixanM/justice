<?php

namespace App\Services\Contract;

use App\DTO\Contract\ContractDTO;
use App\Models\Api\Contract;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ContractService
{

    /**
     * @param ContractDTO $data
     *
     * @return Contract
     */
    public function createContract(ContractDTO $data): Contract
    {
        return Contract::create($data);
    }

    /**
     * @return Collection
     */
    public function getAllContracts(): Collection
    {
        return Contract::all();
    }

    /**
     * @param int $id
     *
     * @return null|Contract
     */
    public function getContractById(int $id): ?Contract
    {
        return Contract::find($id);
    }

    /**
     * @param int $id
     * @param ContractDTO $data
     *
     * @return null|Contract
     */
    public function updateContract(int $id, ContractDTO $data): ?Contract
    {
        $contract = Contract::find($id);
        if ($contract) {
            $contract->update($data);
        }
        return $contract;
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function deleteContract(int $id): bool
    {
        $contract = Contract::find($id);
        return $contract ? $contract->delete() : false;
    }

    /**
     * @param array $cityIds
     *
     * @return Collection
     */
    public function getContractsByCity(array  $cityIds): Collection
    {
        return Contract::where('city_id',  $cityIds)->get();
    }

    /**
     * @param int $userId
     *
     * @return Collection
     */
    public function getContractsByCityToUser(int $userId): Collection
    {
        $user = User::with('settings.cities')->findOrFail($userId);
        $cityIds = $user->settings->cities->pluck('id')->toArray();

        return $this->getContractsByCity($cityIds);
    }

    /**
     * @param int $contractId
     * @param int $executorId
     *
     * @return null|Contract
     */
    public function assignExecutor(int $contractId, int $executorId): ?Contract
    {
        $contract = Contract::find($contractId);
        if ($contract) {
            $contract->update(['executor_id' => $executorId]);
        }
        return $contract;
    }

    /**
     * @param User $customer
     *
     * @return Collection
     */
    public function getCustomerContracts(User $customer): Collection
    {
        return $customer->contracts;
    }

    /**
     * @param User $executor
     *
     * @return Collection
     */
    public function getExecutorContracts(User $executor): Collection
    {
        return Contract::where('executor_id', $executor->id)->get();
    }
}
