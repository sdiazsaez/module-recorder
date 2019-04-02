<?php

namespace Larangular\ModuleRecorder\Tests;

use Larangular\ModuleRecorder\ModuleService\Service;

class SampleServiceGood extends Service {

    public static function name(): string {
        return 'sampleService';
    }

    public function action() {
        return 'hello';
    }
}
