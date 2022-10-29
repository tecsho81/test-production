<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable; //追記

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    use Sortable;   // 追記
    
    protected $table = 'items';

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'detail',
    ];

    protected $sortable = [
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
        6 => "クーペ",
        7 => "軽自動車"
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
