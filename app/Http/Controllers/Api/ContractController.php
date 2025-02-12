<?php

namespace App\Http\Controllers\Api;

use App\DTO\Contract\ContractDTO as CreateContractDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contract\CreateContractRequest;
use App\Http\Requests\Contract\CreateContractRequest as UpdateContractRequest;
use App\Http\Responses\Contract\ContractResponse;
use App\Services\Contract\ContractService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ContractController extends Controller
{
    /*** @var ContractService */
    protected ContractService $contractService;

    /*** @param ContractService $contractService */
    public function __construct(ContractService $contractService)
    {
        $this->contractService = $contractService;
    }


    /**
     * Получить заявки для текущего юзера  по списку указанных им городов
     *
     * @return JsonResponse|Response
     */
    public function index(): JsonResponse|Response
    {
        // $userId = auth()->id();
        $userId = 1;
        try {

            $contracts = $this->contractService->getContractsByCityToUser($userId);
            return response()->json($contracts);

        } catch (\Exception $exception) {

            return $this->jsonException($exception);

        }

    }

    /**
     * создать задачу
     *
     * @param CreateContractRequest $request
     *
     * @return ContractResponse|JsonResponse|Response
     */
    public function store(CreateContractRequest $request): ContractResponse|JsonResponse|Response
    {
        try {
            $contractDto = CreateContractDTO::createFromRequest($request);
            $contract = $this->contractService->createContract($contractDto);

            return ContractResponse::make($contract);

        } catch (\Exception $exception) {
            return $this->jsonException($exception);

        }
    }

    /**
     * обновить задачу
     *
     * @param UpdateContractRequest $request
     * @param int $contractId
     *
     * @return ContractResponse|Response
     */
    public function update(UpdateContractRequest $request, int $contractId): ContractResponse|Response
    {
        try {
            $contractDto = CreateContractDTO::createFromRequest($request);
            $updateContract = $this->contractService->updateContract($contractId, $contractDto);

            return ContractResponse::make($updateContract);
        } catch (\Exception $exception){
            return $this->jsonException($exception);
        }

    }
}
