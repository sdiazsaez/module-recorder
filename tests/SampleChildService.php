<?php

namespace Larangular\ModuleRecorder\Tests;

class SampleChildService extends SampleParentService {

    public function customParentAction(string $parentMessage): array {
        return [
            'array',
            'requested',
            'by',
            'parent',
            'with',
            'argument',
            $parentMessage,
        ];
    }
}
