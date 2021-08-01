<?php
/**
 * DBを扱うクラス
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // テーブル名
    protected $table = 'blogs';

    // 可変項目 (保存したい値(カラム名))
    // モデルに保存するには、モデルのfillableプロパティに代入する
    protected $fillable = [
        'title',
        'content'
    ];
}
