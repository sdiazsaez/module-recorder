<?php

namespace Larangular\ModuleRecorder\Tests;

use Larangular\ModuleRecorder\ModuleService\Service;

abstract class SampleParentService extends Service {

    abstract public function customParentAction(string $parentMessage): array;

    public static function name(): string {
        return 'sampleParentService';
    }

    public function action() {
        return 'action';
    }
}
