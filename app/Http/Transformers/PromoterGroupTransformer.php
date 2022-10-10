<?php

namespace App\Http\Transformers;

use App\Models\PromoteGroup;
use App\Models\Promoter;
use App\Models\PromoterGroupLog;
use League\Fractal\TransformerAbstract;

class PromoterGroupTransformer extends TransformerAbstract
{
    public function transform(PromoteGroup $group)
    {
        $log = PromoterGroupLog::where(['promote_group_id' => $group->id, 'promoter_id' => $group->promoter_id])->orderBy('updated_at')->first();
        $promoter = Promoter::find($group->promoter_id);
        return [
            'id' => $group->id,
            'name' => $group->name,
            'url' => $group->url,
            'members_count' => $group->members_count,
            'pictures' => $group->pictures,
            'active_members' => $group->active_members,
            'enable' => $group->status == PromoteGroup::STATUS_ENABLED?'启用':'禁用',
            'operater' => $promoter->username,
            'status' => $log->status ?? PromoterGroupLog::UNFINISHED
        ];
    }
}
