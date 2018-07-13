<?php
namespace Ixiaozi\Aie\Facades;
use Illuminate\Support\Facades\Facade;
class Aie extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'eub';
    }
}