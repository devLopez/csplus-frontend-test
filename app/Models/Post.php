<?php

namespace Spa\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OpenApi\Annotations as OA;

/**
 * Post
 *
 * @author Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @package Spa\Models
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $text
 * @property string|null $publish_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spa\Models\User $author
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\Post wherePublishAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\Post whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\Post whereUserId($value)
 * @mixin \Eloquent
 *
 * @OA\Schema(
 *     schema="Post",
 *     description="Define um post salvo no banco de dados",
 *     required={"title", "text", "user_id"},
 *     @OA\Property(property="id", type="integer", description="Post ID"),
 *     @OA\Property(property="title", type="string", description="Título do post"),
 *     @OA\Property(property="text", type="string", description="Conteúdo do post"),
 *     @OA\Property(property="user_id", type="integer", description="ID do usuário dono do post"),
 *     @OA\Property(property="publish_at", type="string", format="dateTime", description="A data de publicação do post"),
 *     @OA\Property(property="created_at", type="string", format="dateTime", description="A data de criação do post"),
 *     @OA\Property(property="updated_at", type="string", format="dateTime", description="A data de atualização do post"),
 * )
 */
class Post extends Model
{
    protected $fillable = [
        'title', 'text', 'publish_at', 'user_id'
    ];

    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
