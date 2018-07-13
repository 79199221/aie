<?php
namespace Ixiaozi\Aie\Facades;
/**
 * �й������ٵ�����
 */
use App\MyLib\Express\ERequest;
use App\MyLib\Xml\XML2Array;

class Eub {
    use ERequest;
    /**
     *
     * @var     $url            �ӿ�URL
     * @var     $version        �ӿڰ汾��Ϣ
     * @var     $authenticate   �ӿ��û���֤��
     * @array   $allow_function ������ʵĺ����б������� => url�����ʺ�Ϊ����ռλ����
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
                    // �˴������п���Ϊ�գ�����
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
