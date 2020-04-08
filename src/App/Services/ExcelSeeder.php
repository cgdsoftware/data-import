<?php

namespace LaravelEnso\DataImport\App\Services;

use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use LaravelEnso\DataImport\App\Enums\Statuses;
use LaravelEnso\DataImport\App\Models\DataImport;

class ExcelSeeder extends Seeder
{
    protected string $type;
    protected string $filename;

    public function run()
    {
        factory(DataImport::class)->create([
            'type' => $this->type,
            'status' => Statuses::Waiting,
        ])->handle($this->importFile());
    }

    private function importFile()
    {
        //TODO refactor
        return new UploadedFile(
            Storage::path('seeds'.DIRECTORY_SEPARATOR.$this->filename),
            $this->filename,
            null,
            null,
            true
        );
    }
}