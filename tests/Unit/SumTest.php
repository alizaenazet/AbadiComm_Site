
<?php
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

it('Read-Write local Storage',function () {

    // $fileValue = "hello-world";
    $fileName = "1699008775_/private/var/tmp/phpHwfroM.jpg";
    // expect(Storage::put($fileName, $fileValue))->toBeTrue();
    $contents = Storage::url($fileName);
    // expect($contents)->toBeFile();
    expect($contents)->toBeTrue();
    expect(strlen($contents))->toBeGreaterThan(1);

});