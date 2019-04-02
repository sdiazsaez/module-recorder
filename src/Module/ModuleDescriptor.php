<?php

namespace Larangular\ModuleRecorder\Module;

use Larangular\Support\Instance;
use Larangular\WebServiceManager\Adapters\RequestForm;

abstract class ModuleDescriptor {

    abstract public function provider(): string;

    abstract public function serviceName(): string;

    abstract public function serviceCallClassName(): string;

}
