<?php

uses(Tests\TestCase::class)->group('ODM');

test('', function () {
    $this->setupMongodbClient();
});
