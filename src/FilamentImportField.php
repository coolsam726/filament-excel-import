<?php

namespace Coolsam\FilamentExcel;

use Coolsam\FilamentExcel\Actions\ImportField;

class FilamentImportField extends ImportField
{
    public static function make(string $name): self
    {
        return new self($name);
    }
}
