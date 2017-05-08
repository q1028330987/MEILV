<?php
return array(
	//'配置项'=>'配置值'

	'HTML_CACHE_ON'     =>    false, // 开启静态缓存
	'HTML_CACHE_TIME'   =>    60,   // 全局静态缓存有效期（秒）
	'HTML_FILE_SUFFIX'  =>    '.html', // 设置静态缓存文件后缀
	'HTML_CACHE_RULES'  =>     array(  // 定义静态缓存规则

		//:action匹配到所有的方法
		//第二种是定义全局的控制器静态规则，例如定义所有的User控制器的静态规则为：
		// 'user:'=>array('User/{:action}_{id}','600')
		'Index:'=>array('Index/{:action}_{id}', '60'),
		'Store:'=>array('Store/{:action}_{id}', '6'),

		// 第三种是定义某个控制器的操作的静态规则，例如，我们需要定义Blog控制器的read操作进行静态缓存
		// 'Index:index'=>array('{id}',10)


	)

);