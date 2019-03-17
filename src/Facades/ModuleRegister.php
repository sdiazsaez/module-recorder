<?php

namespace Larangular\WebServiceManager\Facades;

use Illuminate\Support\Facades\Facade;

class ModuleRegister extends Facade {
    protected static function getFacadeAccessor() {
        return \Larangular\ModuleRecorder\Register\ModuleRegister::class;
    }
}
