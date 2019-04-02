<?php

namespace Larangular\ModuleRecorder\ModuleService;

abstract class Service {

    abstract public static function name(): string;

    abstract public function action();

}
