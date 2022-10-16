<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'items';

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'detail',
    ];

    const TYPE = [
        1 => "エアコン",
        2 => "洗濯機",
        3 => "冷蔵庫",
        4 => "掃除機",
        5 => "テレビ"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}
