<?php

namespace Spa\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Spa\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('login');
    }

    /**
     * @OA\Post(
     *     tags={"auth"},
     *     path="/api/v1/auth",
     *     description="Realiza a autenticação do usuário",
     *     @OA\RequestBody(
     *          @OA\JsonContent(
     *              @OA\Property(property="email", type="string", format="email", description="E-mail do usuário"),
     *              @OA\Property(property="password", type="string", format="password", description="Senha do usuário"),
     *          )
     *     ),
     *     @OA\Response(response="401", description="Erro de autenticação", @OA\JsonContent(ref="#/components/schemas/ErrorResponse")),
     *     @OA\Response(response="200", description="Response Ok", @OA\JsonContent(
     *          @OA\Property(property="data", description="Response data",
     *              @OA\Property(property="access_token", description="O token de login do usuário", type="string"),
     *              @OA\Property(property="expires_in", description="Define o tempo de expiração do token", type="integer")
     *          )
     *     ))
     * )
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ( ! $token = auth()->attempt($credentials) ) {
            return error([], 401, 'Usuário ou senha inválidos');
        }

        return success([
            'access_token' => $token,
            'expires_in'   => auth()->factory()->getTTL() * 60,
        ]);
    }

    /**
     * @OA\Post(
     *     tags={"auth"},
     *     path="/api/v1/auth/logout",
     *     description="Realiza o logout do usuário",
     *     security={"bearer"},
     *     @OA\Response(response="200", description="Response Ok",
     *          @OA\Property(property="meta", description="Response meta",
     *              @OA\Property(property="code", description="Http status code", type="integer"),
     *              @OA\Property(property="message", description="A mensagem de sucesso em caso de logout", type="string")
     *          )
     *     )
     * )
     */
    public function logout()
    {
        auth()->logout();

        return success([], 200, 'Você acaba de fazer logout do sistema');
    }
}
