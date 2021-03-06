@extends('admin.common.common')

@section('content')
<section class="content-header">
    <h1 class="pull-left">赛程管理</h1>   
</section>
<div class="content">
    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">            
            <table class="table table-responsive table-striped" id="videos-table">
                <thead style="background-color:#F5F5F5;">
                    <th width="5%">ID</th>
                    <th width="10%">赛事名称</th>
                    <th width="10%">A名称</th>
                    <th width="10%">B名称</th>
                    <th width="10%">比分</th>
                    <th width="10%">层级</th>
                    <th width="10%">状态</th>
                    <th width="20%">操作</th>
                </thead>
                <tbody>
                    @if(!empty($listArr))
                        @foreach($listArr as $v)
                            <tr>
                                <td>{{$v->id}}</td>
                                <td>{{empty($v->match)?'--':$v->match->name}}</td>
                                <td>{{empty($v->ateam)?'--':$v->ateam->name}}</td>
                                <td>{{empty($v->bteam)?'--':$v->bteam->name}}</td>
                                <td>{{$v->ateamscore.':'.$v->bteamscore}}</td>
                                <td>{{$matchArr['teamstsArr'][$v->matchlevel]}}</td>
                                <td>{{$matchlogArr['statusArr'][$v->status]}}</td>
                                <td>  
                                    @if(Gate::forUser(auth('adminusers')->user())->check('admin.matchlog.view'))
                                        <a href="{{route('admin.matchlog.view')}}?id={{$v->id}}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                    @endif              
                                </td>
                            </tr>                            
                        @endforeach
                    @endif       
                </tbody>        
            </table>

            @if($listArr->lastPage() >1)
                <div class="form-group form-inline col-sm-12">
                    <span class="pull-left">{{$listArr->links()}}</span>
                    <span  class="pull-left pagination" style="height: 30px; line-height: 34px;">&nbsp;&nbsp;&nbsp;&nbsp;共计：{{$listArr->total()}}条</span>
                </div>
            @endif            
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection