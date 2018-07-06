<?php
namespace Ixiaozi\Multi;
use Illuminate\Session\SessionManager;
use Illuminate\Config\Repository;
class Multi
{
    /**
     * @var SessionManager
     */
    protected $session;
    /**
     * @var Repository
     */
    protected $config;
    /**
     * Packagetest constructor.
     * @param SessionManager $session
     * @param Repository $config
     */
    public function __construct(SessionManager $session, Repository $config){
        $this->session = $session;
        $this->config = $config;
    }
    /**
     * @param string $msg
     * @return string
     */
    public function msg($msg = ''){
        $config_arr = $this->config->get('test.options');
        return $msg.' <strong>from your custom develop package!</strong>';
    }
    public function loadRoutes(){
        require __DIR__ . '/Routes/web.php';
    }
}