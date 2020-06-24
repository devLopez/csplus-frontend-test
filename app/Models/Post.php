<?php

namespace Spa\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
