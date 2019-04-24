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
        if (!array_key_exists($moduleName, $this->modules)) {
            throw new \Exception($moduleName.' module does not exist.');
        }
        return $this->modules[$moduleName];
    }

    public function getProviders(): array {
        return array_keys($this->registeredKeys);
    }

    public function getModuleNames(string $provider): array {
        if (!array_key_exists($provider, $this->registeredKeys)) {
            return [];
        }

        return $this->registeredKeys[$provider];
    }

}
