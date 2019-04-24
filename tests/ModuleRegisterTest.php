<?php

namespace Larangular\ModuleRecorder\Tests;

use Larangular\ModuleRecorder\Facades\ModuleRegister;
use Larangular\ModuleRecorder\Module\Module;
use Larangular\ModuleRecorder\ModuleProvider\Provider;
use Larangular\ModuleRecorder\Facades\ProviderRegister;
use Larangular\ModuleRecorder\Facades\ModuleRequest;
use Larangular\Support\Facades\Instance;

class ModuleRegisterTest extends TestCase {

    private function getModuleName(): string {
        return 'testModule';
    }

    private function getModule(): Module {
        return ModuleRegister::register($this->getModuleName());
    }

    private function getProviderName(): string {
        return 'childProvider';
    }

    private function getProvider(): Provider {
        return ProviderRegister::register($this->getModuleName(), $this->getProviderName());
    }

    public function testRegister() {
        $module = $this->getModule();
        $this->assertTrue($module->getName() == $this->getModuleName());
    }

    /*
    public function testModuleAddServiceBad() {
        $module = $this->getModule();
        try {
            $module->registerService(SampleServiceBad::class);
        } catch (\Exception $exception) {
            $expectedMessage = 'Larangular\ModuleRecorder\Tests\SampleServiceBad is not an instance of Larangular\ModuleRecorder\ModuleService\Service';
            $this->assertTrue($exception->getMessage() === $expectedMessage);
        }
    }*/

    public function testModuleAddServiceGood() {
        $service = $this->getModule()
                        ->registerService(SampleServiceGood::class)
                        ->getService('sampleService');
        $this->assertTrue(Instance::instanceOf($service, SampleServiceGood::class));
    }


    public function testRequestGetService() {
        $module = $this->getModule()
                       ->registerService(SampleParentService::class);

        $provider = $this->getProvider()->addService(SampleChildService::class);

        $service = ModuleRequest::getService($this->getModuleName(), $this->getProviderName(), 'sampleParentService');
        $this->assertTrue($service->action() === ['hello']);
    }

}
