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
