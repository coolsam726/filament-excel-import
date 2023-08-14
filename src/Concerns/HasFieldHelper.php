<?php

namespace Coolsam\FilamentExcel\Concerns;

trait HasFieldHelper
{
    protected ?string $helperText = null;

    /**
     * @return $this
     */
    public function helperText($text): static
    {
        $this->helperText = $text;

        return $this;
    }

    public function getHelperText(): ?string
    {
        return $this->helperText;
    }
}
