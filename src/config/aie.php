<?php

return [
	'allow_function' => [
	
		/**
		 * 
		 *
		**/
		'eub' => [
			'post' => [
				'order_receive' => 'order',                 // 运单信息接收服务
				'order_validate' => 'validate',             // 运单信息验证服务
				'labels_download' => 'print/downloadLabels',// 批量获取标签服务
				'pay_info' => 'rate/actual/?',              // 资费信息查询
				'selectcode' => 'selectcode',               // 分拣码查询
				'rate' => 'rate/epacket',                   // 费率计算
			],
			'get' => [
				'order_info' => 'order/?',                  // 运单信息查询 x
				'track_info' => 'track/query/?/?',          // 跟踪信息查询
				'province_list'=> 'area/cn/province/list',
				'city_list'=> 'area/cn/city/list/?',
				'county_list'=> 'area/cn/county/list/?',
				'label_download' => 'static/label/download/?/?.pdf'         // 获取标签服务 x
			],
			'delete' => [
				'order_cancel' => 'order/?',                // 订单取消服务
			]
		],
		
		// 出口易
		'chukou1' => [
		
		]
		
	]
];