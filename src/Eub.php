<?php
namespace Ixiaozi\Aie\Facades;
/**
 * 中国邮政速递物流
 */
use App\MyLib\Express\ERequest;
use App\MyLib\Xml\XML2Array;

class Eub {
    use ERequest;
    /**
     *
     * @var     $url            接口URL
     * @var     $version        接口版本信息
     * @var     $authenticate   接口用户验证码
     * @array   $allow_function 允许访问的函数列表（函数名 => url）（问号为参数占位符）
     */
    protected $url;
    protected $version;
    protected $authenticate;
    protected $allow_function;
    protected $md5auth;

    static public $instance;

    /**
     * 
     */
    public function __construct() {
        $config = config('aie.eub');
        self::$url = $config.eub;
        self::$version = $config.version;
        self::$authenticate = $config.authenticate;
        self::$allow_function = $config.allow_function;
    }
    public function instance(){
        return new static();
    }

    public function md5auth($tracking_number) {
        self::$md5auth = md5(self::$authenticate + $tracking_number);
        return new static();
    }
    
    public function __call($function_name, $arguments){
        foreach(self::$allow_function as $key => $items) {
            if(key_exists($function_name, $items)) {
                if(substr_count($items[$function_name], '?') > 0 ) {
                    $uri = str_replace("?","%s",$items[$function_name]);
                    $uri = vsprintf($uri, $arguments);
                    $data = key_exists(substr_count($items[$function_name], '?'), $arguments) ? $arguments[substr_count($items[$function_name], '?')] : '';
                } else {
                    $uri = $items[$function_name];
                    $data = $arguments[0];
                }
                $return = self::ajax($uri, $data, $key);
                dd($return);
                if($return['status'] == 200) {
                    // 此处数据有可能为空！！！
                    if($return['data']) {
                        return self::xmlParse($return['data']);
                    } else {
                        return $return['data'];
                    }
                } else {
                    throw new \Exception($return['data']);
                }
            }
        }
        throw new \Exception('functon name:' . $function_name . ' NOT ALLOW');
    }
    
    protected function ajax($uri, $data = '', $method = 'POST') {
        $url = self::url . $uri;
        $headers = [
            'Content-type' => 'text/xml',
            'version' => self::$version,
            'authenticate' => self::$authenticate
        ];
        return self::query($url, $data, $headers, $method);
    }
    
    protected function xmlParse($xml){
        return XML2Array::createArray($xml);
    }

}
