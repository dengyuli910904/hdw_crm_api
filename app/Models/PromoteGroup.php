<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoteGroup extends Model
{
    const STATUS_ENABLED = 1;
    const STATUS_ABLED = 0;
    protected $fillable = ['url','name','members_count','pictures','active_members','status'];
    protected $guarded = [];
}
