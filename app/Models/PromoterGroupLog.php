<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoterGroupLog extends Model
{
    protected $guarded = [];
    const FINISHED = 1;
    const UNFINISHED = 0;

    protected $fillable = ['promote_group_id','promoter_id','status'];
}
