<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{
    use HasFactory;

    public function getFormatedCreatedAtAttribute() {
        return Carbon::parse($this->attributes['created_at'])->format('d F Y');

    }
}
