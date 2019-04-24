<?php

namespace Larangular\ModuleRecorder\Tests;

use Larangular\ModuleRecorder\Facades\ModuleRegister;
use Larangular\ModuleRecorder\Facades\ModuleRequest;
use Larangular\ModuleRecorder\Facades\ProviderRegister;
use Larangular\Support\SupportServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase {

    protected function getPackageProviders($app) {
        return [
            SupportServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app) {
        return [
            'ModuleRegister'   => ModuleRegister::class,
            'ProviderRegister' => ProviderRegister::class,
            'ModuleRequest'    => ModuleRequest::class,
        ];
    }

}
