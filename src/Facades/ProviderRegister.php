<?php

namespace Larangular\ModuleRecorder\Facades;

use Illuminate\Support\Facades\Facade;

class ProviderRegister extends Facade {
    protected static function getFacadeAccessor() {
        return \Larangular\ModuleRecorder\ModuleProvider\ProviderRegister::class;
    }
}
