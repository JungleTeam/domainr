<?php

namespace JungleTeam\Domainr;

use Illuminate\Support\Facades\Facade;

class DomainrFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'Domainr';
    }

}