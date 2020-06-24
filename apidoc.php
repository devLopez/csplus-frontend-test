<?php

require __DIR__ . '/vendor/autoload.php';

use OpenApi\Annotations as OA;

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *          version="1.0.0",
 *          title="CSMobile API",
 *          description="API do sistema CSMobile",
 *          @OA\Contact(email="fale_com_lopez@hotmail.com")
 *     ),
 *     @OA\Server(description="CSMobile Host", url="https://csmobile.com.br/api")
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearer",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 *
 * @OA\Response(
 *     response="Forbidden",
 *     description="Forbidden access",
 *     @OA\JsonContent(
 *          @OA\Property(property="meta", description="Response Metadata",
 *              @OA\Property(property="code", description="Http response code", example="401"),
 *              @OA\Property(property="message", description="Mensagem de erro", example="Você não tem permissão. Tente novamente")
 *          )
 *     )
 * )
 *
 * @OA\Response(
 *     response="NotFound",
 *     description="Os dados solicitados não foram encontrads",
 *     @OA\JsonContent(
 *          @OA\Property(property="meta", description="Response Metadata",
 *              @OA\Property(property="code", description="Http response code", example="404"),
 *              @OA\Property(property="message", description="Mensagem de erro", example="Recurso não encontrado")
 *          )
 *     )
 * )
 *
 * @OA\Response(
 *     response="Error",
 *     description="Unexpected Error",
 *     @OA\JsonContent(
 *          @OA\Property(property="meta", description="Response Metadata",
 *              @OA\Property(property="code", description="Http response code", example="500"),
 *              @OA\Property(property="message", description="Mensagem de erro", example="Aconteceu um erro, tente novamente")
 *          )
 *     )
 * )
 */