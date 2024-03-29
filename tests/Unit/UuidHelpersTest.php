<?php

use Edd\MongoDbHelpers\Helpers\UuidHelpers;
use MongoDB\BSON\Binary;

$testUuid = '38a44c56-7b2f-4423-8e98-1a71f7b69ea6';

test('toUuid returns Binary.', function () use ($testUuid) {
    expect(UuidHelpers::asUuidBinary($testUuid))->toBeInstanceOf(Binary::class);
});

test('asJavaUuidBinary returns Binary.', function () use ($testUuid) {
    expect(UuidHelpers::asJavaUuidBinary($testUuid))->toBeInstanceOf(Binary::class);
});

test('asDotNetUuidBinary returns Binary.', function () use ($testUuid) {
    expect(UuidHelpers::asDotNetUuidBinary($testUuid))->toBeInstanceOf(Binary::class);
});

test('asPythonUuidBinary returns Binary.', function () use ($testUuid) {
    expect(UuidHelpers::asPythonUuidBinary($testUuid))->toBeInstanceOf(Binary::class);
});
