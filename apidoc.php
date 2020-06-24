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
 */