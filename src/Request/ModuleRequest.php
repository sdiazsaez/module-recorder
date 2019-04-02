<?php

namespace Larangular\ModuleRecorder\Request;

use Larangular\ModuleRecorder\Facades\ModuleRegister;
use Larangular\ModuleRecorder\ModuleService\Service;

class ModuleRequest {

    public function getService(string $moduleName, string $providerName, string $serviceName): Service {
        $module = ModuleRegister::getModule($moduleName);
        return $module->getProvider($providerName)->getService($serviceName);
    }

    public function request(string $moduleName, string $providerName, string $serviceName, array $data) {

    }

}
