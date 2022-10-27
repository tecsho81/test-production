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
        1 => "SUV",
        2 => "セダン",
        3 => "ワゴン",
        4 => "ミニバン",
        5 => "コンパクトカー",
        6 => "クーペ"
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
