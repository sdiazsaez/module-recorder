<?php

namespace Larangular\ModuleRecorder\Facades;

use Illuminate\Support\Facades\Facade;

class ModuleRequest extends Facade {
    protected static function getFacadeAccessor() {
        return \Larangular\ModuleRecorder\Request\ModuleRequest::class;
    }
}
