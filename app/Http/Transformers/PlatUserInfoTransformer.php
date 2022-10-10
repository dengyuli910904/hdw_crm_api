<?php

namespace App\Http\Transformers;

use App\Models\PlatUserInfo;
use App\Models\PromoteGroup;
use App\Models\Promoter;
use App\Models\PromoterGroupLog;
use League\Fractal\TransformerAbstract;

class PlatUserInfoTransformer extends TransformerAbstract
{
    public function transform(PlatUserInfo $user)
    {
        return [
            'username' => $user->username,
            'phone' => $user->phone,
            'created_at' => $user->created_at
        ];
    }
}
