<?php

namespace Larangular\ModuleRecorder;

use Larangular\WebServiceManager\Register\{ServiceRecords, ModuleDescriptor};
use Larangular\WebServiceManager\Request\{RequestComposer, ServiceCaller};

class ServiceRequest {

    private $serviceRecord;

    public function __construct(ServiceRecords $serviceRecord) {
        $this->serviceRecord = $serviceRecord;
    }

    public function makeRequest(string $provider, string $service, array $data, bool $dataTransform = true) {
        $descriptor = $this->serviceRecord->getService($provider, $service);
        $request = $this->getServiceRequest($descriptor, $data, $dataTransform);
        $serviceInstance = $this->getServiceInstance($descriptor, $request);
        $response = $serviceInstance->getResponse();

        return $response;
    }

    private function getServiceInstance(ModuleDescriptor $service, RequestComposer $request): ServiceCaller {
        $class = $service->serviceCallClassName();
        return new $class($request);
    }

    private function getServiceRequest(ModuleDescriptor $service, array $data, bool $transform = true): RequestComposer {
        $class = $service->requestClassName();
        if($transform) {
            $transformClass = $service->transformableClassName();
            $data = (new $transformClass())->transform($data);
        }

        return new $class($data);
    }

}
