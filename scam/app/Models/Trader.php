<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    use HasFactory;
    protected $fillable = [
        "img","zalo","describe","bank","active","cate","fullname", 'number_bank'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

}
