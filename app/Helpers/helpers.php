<?php

use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;

if ( ! function_exists('success') ) {
    function success(array $data, int $code = 200, string $message = 'Ok')
    {
        return new JsonResponse([
            'meta' => [
                'code'    => $code,
                'message' => $message,
            ],
            'data' => $data,
        ]);
    }
}

if ( ! function_exists('error') ) {
    /**
     * @OA\Schema(
     *     schema="ErrorResponse",
     *     description="Retorna uma mensage de erro para o usuário",
     *     @OA\Property(
     *          property="meta", description="Defines response metadata",
     *          @OA\Property(property="code", type="integer", description="Código da resposta Http"),
     *          @OA\Property(property="message", type="string", description="Mensagem de erro a ser exbida ao usuário")
     *     )
     * )
     */
    function error(array $data, int $code = 500, string $message = 'Ok')
    {
        return new JsonResponse([
            'meta' => [
                'code'    => $code,
                'message' => $message,
            ],
            'data' => $data,
        ], $code);
    }
}