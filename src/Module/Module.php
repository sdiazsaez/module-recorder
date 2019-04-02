<?php

namespace Larangular\ModuleRecorder\Module;

use Larangular\ModuleRecorder\ModuleProvider\Provider;
use Larangular\ModuleRecorder\ModuleService\Service;
use Larangular\Support\Facades\Instance;

class Module {

    private $name;
    private $services = [];
    private $providers = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function registerService(string $type): Module {
        /*
        $service = new $type;
        if(!Instance::instanceOf($service, Service::class)) {
            throw new \Exception($type.' is not an instance of '.Service::class);
        }*/
        $this->services[$type::name()] = $type;
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

    public function addProvider(string $name, Provider $provider) {
        $this->providers[$name] = $provider;
    }

    public function getProvider(string $name): Provider {
        return $this->providers[$name];
    }
}
