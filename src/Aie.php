<?php
namespace Ixiaozi\Aie;
use Illuminate\Session\SessionManager;
use Illuminate\Config\Repository;
use Ixiaozi\Aie\Eub;
class Aie
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
    public function __construct(){ //SessionManager $session, Repository $config
//        $this->session = $session;
//        $this->config = $config;
    }
    /**
     * @param string $platform
     * @return string
     */
    public static function platform($platform = ''){
//        return app()[$platform];
        return call_user_func(['Ixiaozi\\Aie\\'.ucwords($platform), 'instance']);
    }
}