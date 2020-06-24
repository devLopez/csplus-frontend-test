<?php

namespace Spa\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;
use Spa\Repositories\Posts;

/**
 * @OA\Response(
 *     response="ErrorValidationResponse",
 *     description="Define a response contendo os dados de validação de formulários",
 *     @OA\JsonContent(
 *          @OA\Property(property="message", description="Mensagem que informa que há erros de validação"),
 *          @OA\Property(
 *              property="errors",
 *              description="Define os erros em cada campo",
 *              @OA\Property(
 *                  property="field_name",
 *                  description="Nome do campo que foi validado",
 *                  example="['Nome de usuário inválido']"
 *              )
 *          )
 *     )
 * )
 */
class PostRequest extends FormRequest
{
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'title'      => 'required|max:50',
            'text'       => 'required|max:250',
            'user_id'    => 'required',
            'publish_at' => 'nullable|date',
        ];
    }
}
