<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromoterGroupRequest;
use App\Http\Transformers\PromoterGroupTransformer;
use App\Models\PromoteGroup;
use App\Models\PromoterGroupLog;
use Illuminate\Http\Request;

class PromoterGroupController extends ApiController
{
    public function getlist(PromoterGroupRequest $request){
        $group = app(PromoteGroup::class);
        $list = $group->where(function($query){

        })->orderBy('id')
            ->paginate($request->input('per_page', 10));
        return $this->response->paginator($list , PromoterGroupTransformer::class);
    }

    public function add(PromoterGroupRequest $request){
        $group = new PromoteGroup();
        $group->url = $request->input('url');
        $group->name = $request->input('name');
        $group->members_count = $request->input('members_count');
        $group->pictures = $request->input('pictures');
        $group->active_members = $request->input('active_members');
        $group->status = $request->input('enable' , PromoteGroup::STATUS_ENABLED);
        $group->promoter_id = auth()->id();
        $group->opterator = $request->input('opterator');

        $log = new PromoterGroupLog();
        $log->promote_group_id = $group->id;
        $log->status = $request->input('status');
        $log->promoter_id = auth()->id();
        $group->save();
        return $this->successResponse(200, '操作成功');
    }

    public function edit(PromoterGroupRequest $request)
    {
        $group = PromoteGroup::find($request->id);
        $group->url = $request->input('url');
        $group->name = $request->input('name');
        $group->members_count = $request->input('members_count');
        $group->pictures = $request->input('pictures');
        $group->active_members = $request->input('active_members');
        $group->status = $request->input('enable', PromoteGroup::STATUS_ENABLED);
        $group->promoter_id = auth()->id();
        $group->opterator = $request->input('opterator');
        $group->save();

        PromoterGroupLog::UpdateOrCreate([
            'promote_group_id' => $group->id,
            'promoter_id' => $group->promoter_id,
            'status' => $request->input('status')
        ],
            [
                'promote_group_id' => $group->id,
                'promoter_id' => $group->promoter_id,
                'status' => $request->input('status')
            ]);

        return $this->successResponse(200, '操作成功');
    }

    public function del(PromoterGroupRequest $request){
        $group = PromoteGroup::find($request->input('id'));
        $group->deleted_at = time();
        $group->save();
        return $this->successResponse(200, '操作成功');
    }
}
