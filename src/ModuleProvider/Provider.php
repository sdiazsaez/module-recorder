<?php

namespace Larangular\ModuleRecorder\ModuleProvider;

use Larangular\ModuleRecorder\ModuleService\Service;
use Larangular\Support\Facades\Instance;

class Provider {

    private $name;
    private $services = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function addService(string $type): Provider {
        $service = new $type;
        if(!Instance::instanceOf($service, Service::class)) {
            throw new \Exception($type.' is not an instance of '.Service::class);
        }

        $this->services[$service->name()] = $type;
        return $this;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getService(string $name = null): Service {
        if(is_null($name)) {
            return $this->services;
        }

        return new $this->services[$name];
    }
}
