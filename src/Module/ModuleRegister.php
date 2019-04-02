<?php

namespace Larangular\ModuleRecorder\Module;

class ModuleRegister {

    private $modules        = [];
    private $registeredKeys = [];

    public function register(string $moduleName): Module {
        $module = new Module($moduleName);
        $this->modules[$moduleName] = $module;
        return $this->modules[$moduleName];
    }

    public function getModule(string $moduleName): Module {
        return $this->modules[$moduleName];
    }

    /*
    public function register(ModuleDescriptor $serviceDescriptor): void {
        $this->registerKeys($serviceDescriptor->provider(), $serviceDescriptor->serviceName());
        $this->modules[$this->makeModuleKey($serviceDescriptor->provider(),
            $serviceDescriptor->serviceName())] = $serviceDescriptor;
    }

    public function getModule(string $provider, string $service): ModuleDescriptor {
        return $this->modules[$this->makeModuleKey($provider, $service)];
    }*/

    public function getProviders(): array {
        return array_keys($this->registeredKeys);
    }

    public function getModuleNames(string $provider): array {
        if (!array_key_exists($provider, $this->registeredKeys)) {
            return [];
        }

        return $this->registeredKeys[$provider];
    }

    private function registerKeys(string $provider, string $service): void {
        if (!array_key_exists($provider, $this->registeredKeys)) {
            $this->registeredKeys[$provider] = [];
        }

        if (array_search($service, $this->registeredKeys[$provider]) === false) {
            array_push($this->registeredKeys[$provider], $service);
        }
    }

    private function makeModuleKey(string $provider, string $service): string {
        return $provider . '.' . $service;
    }
}
