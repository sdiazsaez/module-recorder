<?php

namespace Larangular\ModuleRecorder\Facades;

use Illuminate\Support\Facades\Facade;

class ModuleRegister extends Facade {
    protected static function getFacadeAccessor() {
        return \Larangular\ModuleRecorder\Module\ModuleRegister::class;
    }
}
