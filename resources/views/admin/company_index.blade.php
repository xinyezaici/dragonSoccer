@extends('admin.common.common')

@section('content')
<section class="content-header">
    <h1 class="pull-left">推广列表</h1>
    @if(Gate::forUser(auth('adminusers')->user())->check('admin.company.add'))
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{route('admin.company.add')}}">添加</a>  
        </h1>
    @endif
</section>
<div class="content">
    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">            
            <table class="table table-responsive table-striped" id="videos-table">
                <thead style="background-color:#F5F5F5;">
                    <th width="10%">ID</th>
                    <th width="10%">名称</th>
                    <th width="10%">key</th>
                    <th width="10%">url</th>
                    <th width="10%">开始时间</th>
                    <th width="20%">操作</th>
                </thead>
                <tbody>
                    @if(!empty($listArr))
                        @foreach($listArr as $v)
                            <tr>
                                <td>{{$v->id}}</td>
                                <td>{{$v->name}}</td>
                                <td>{{$v->key}}</td>
                                <td>{{$v->url}}</td>
                                <td>{{$v->created_at}}</td>
                                <td>                                                                 
                                    @if(Gate::forUser(auth('adminusers')->user())->check('admin.company.edit'))
                                        <a href="{{route('admin.company.edit')}}?id={{$v->id}}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                    @endif

                                    @if(Gate::forUser(auth('adminusers')->user())->check('admin.company.view'))
                                        <a href="{{route('admin.company.view')}}?key={{$v->key}}&type=reg" class='btn btn-default btn-xs'>注册列表</a>
                                        <a href="{{route('admin.company.view')}}?key={{$v->key}}&type=apply" class='btn btn-default btn-xs'>匹配列表</a>
                                        <a href="{{route('admin.company.view')}}?key={{$v->key}}&type=team" class='btn btn-default btn-xs'>参赛列表</a>
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