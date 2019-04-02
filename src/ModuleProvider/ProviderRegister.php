<?php

namespace Larangular\ModuleRecorder\ModuleProvider;

use Larangular\ModuleRecorder\Facades\ModuleRegister;

class ProviderRegister {

    public function register(string $moduleName, string $providerName): Provider {
        $module = ModuleRegister::getModule($moduleName);
        $provider = new Provider($providerName);
        $module->addProvider($providerName, $provider);
        return $provider;
    }

}
