@extends('multi::layouts.core')
@section('title', '语言设置')
@section('head')
@endsection
@section('style')
@endsection
@section('content')
@include('multi::_nav', ['cate_title' => '首页', 'cate_title1' => '系统管理', 'cate_title2' => '多国语言'])
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		</span>
		<span class="r">
			<button onclick="layer_show('添加语言','{{route('multi::language.create')}}','','510')" class="btn btn-primary radius" id="" name=""><i class="Hui-iconfont">&#xe600;</i> 添加语言</button>
		</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th>语言</th>
					<th width="105">表名</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				<tr class="text-c">
					<td><input type="checkbox" value="" name=""></td>
					<td>0001</td>
					<td>中文</td>
					<td>city</td>
					<td class="f-14">
						<a style="text-decoration:none" onclick="layer_show('角色编辑','{{url('/admin/language/1/edit')}}','0001','400','310')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a title="删除" href="javascript:;" onclick="system_data_del(this,'10001')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('foot')
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
@endsection
@section('script')
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,5]}// 制定列不参与排序
	]
});
@endsection