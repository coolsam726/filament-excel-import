<?php

namespace Coolsam\FilamentExcel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Coolsam\FilamentExcel\FilamentExcel
 */
class FilamentExcel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Coolsam\FilamentExcel\FilamentExcel::class;
    }
}
