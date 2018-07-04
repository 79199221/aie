<?php
namespace Ixiaozi\Multi\Facades;
use Illuminate\Support\Facades\Facade;
class Multi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'multi';
    }
}