<?php

namespace Coolsam\FilamentExcel\Actions;

use Coolsam\FilamentExcel\Concerns\HasColumnMatching;
use Coolsam\FilamentExcel\Concerns\HasFieldHelper;
use Coolsam\FilamentExcel\Concerns\HasFieldLabel;
use Coolsam\FilamentExcel\Concerns\HasFieldMutation;
use Coolsam\FilamentExcel\Concerns\HasFieldPlaceholder;
use Coolsam\FilamentExcel\Concerns\HasFieldRequire;
use Coolsam\FilamentExcel\Concerns\HasFieldValidation;

class ImportField
{
    use HasFieldMutation;
    use HasFieldHelper;
    use HasFieldPlaceholder;
    use HasFieldLabel;
    use HasFieldRequire;
    use HasFieldValidation;
    use HasColumnMatching;

    public function __construct(private string $name)
    {
    }

    public static function make(string $name): self
    {
        return new self($name);
    }

    public function getName(): string
    {
        return $this->name;
    }
}
