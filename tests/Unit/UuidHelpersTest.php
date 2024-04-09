<?php

use Edd\MongoDbHelpers\Uuid\UuidHelpers;
use MongoDB\BSON\Binary;

$testUuid = '38a44c56-7b2f-4423-8e98-1a71f7b69ea6';

test('toUuidString returns Binary.', function () use ($testUuid) {
    $testBin = UuidHelpers::toUuidBinary($testUuid);

    expect(UuidHelpers::toUuidString($testBin))
        ->toBeString()
        ->toEqual($testUuid);
});

test('toUuidBinary returns Binary.', function () use ($testUuid) {
    expect(UuidHelpers::toUuidBinary($testUuid))->toBeInstanceOf(Binary::class);
});

test('toJavaUuid returns Binary.', function () use ($testUuid) {
    $testBin = UuidHelpers::toJavaUuidBinary($testUuid);

    expect(UuidHelpers::toJavaUuid($testBin))
        ->toBeString()
        ->toEqual($testUuid);
});

test('toJavaUuidBinary returns Binary.', function () use ($testUuid) {
    expect(UuidHelpers::toJavaUuidBinary($testUuid))->toBeInstanceOf(Binary::class);
});

test('toDotNetGuid returns Binary.', function () use ($testUuid) {
    $testBin = UuidHelpers::toDotNetGuidBinary($testUuid);

    expect(UuidHelpers::toDotNetGuid($testBin))
        ->toBeString()
        ->toEqual($testUuid);
});

test('toDotNetGuidBinary returns Binary.', function () use ($testUuid) {
    expect(UuidHelpers::toDotNetGuidBinary($testUuid))->toBeInstanceOf(Binary::class);
});

test('toPythonUuid returns Binary.', function () use ($testUuid) {
    $testBin = UuidHelpers::toPythonUuidBinary($testUuid);

    expect(UuidHelpers::toPythonUuid($testBin))
        ->toBeString()
        ->toEqual($testUuid);
});

test('toPythonUuidBinary returns Binary.', function () use ($testUuid) {
    expect(UuidHelpers::toPythonUuidBinary($testUuid))->toBeInstanceOf(Binary::class);
});
