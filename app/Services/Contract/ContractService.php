<?php

namespace App\Services\Contract;

use App\DTO\Contract\ContractDTO;
use App\Models\Api\Contract;
use App\Models\User;
use App\Services\Service;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ContractService extends Service
{

    /**
     * @param ContractDTO $data
     *
     * @return Contract
     */
    public function createContract(ContractDTO $data): Contract
    {
        return Contract::create($data->toArray());
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
     * @return Collection|JsonResponse
     */
    public function getContractsByCityToUser(int $userId): Collection|JsonResponse
    {
        try {
            $user = User::with('settings.cities')->findOrFail($userId);

            if (!$user->settings || !$user->settings->cities || $user->settings->cities->isEmpty()) {
                $this ->handleException('У пользователя нет привязанных городов, список задач не получить');
            }

            $cityIds = $user->settings->cities->pluck('id')->toArray();
            return $this->getContractsByCity($cityIds);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Пользователь не найден',
                'data' => [],
            ], 404);
        }
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
