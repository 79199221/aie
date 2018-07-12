<?php

namespace Ixiaozi\Aie;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;


class AieServiceProvider extends ServiceProvider
{
	/**
	 * 服务提供者是否延迟加载
	 *
	 */
	 // protected $defer = true;
	 
	 
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 视图
		$this->loadViewsFrom(__DIR__ . '/views', 'aie');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
		$this->publishes([
			__DIR__ . '/config/aie.php' => config_path('aie.php'),
		]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // 单例绑定服务
        $this->app->singleton('aie', function ($app) {
            return new Aie($app['session'], $app['config']);
        });
    }
	public function provides()
    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return ['aie'];
    }
}
