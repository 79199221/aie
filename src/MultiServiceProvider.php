<?php

namespace Ixiaozi\Multi;

use Illuminate\Support\ServiceProvider;

class MultiServiceProvider extends ServiceProvider
{
	/**
	 * 服务提供者是否延迟加载
	 *
	 */
	 protected $defer = true;
	 
	 
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 视图
		$this->loadViewsFrom(__DIR__ . '/views', 'Multi');
		$this->publishes([
			__DIR__ . '/views' => base_path('resources/views/vendor/multi'),
			__DIR__ . '/config/multi.php' => config_path('multi.php'),
		]);
		$this->app['router']->get('multi', '\Ixiaozi\Multi\Controller\IndexController@index');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // 单例绑定服务
        $this->app->singleton('multi', function ($app) {
            return new Multi($app['session'], $app['config']);
        });
    }
	public function provides()
    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return ['multi'];
    }
}