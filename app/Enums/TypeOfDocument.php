<?php

namespace App\Enums;



class TypeOfDocument
{
    const CEDULA = 'CEDULA';
    const PASSPORT = 'PASAPORTE';
    const RUC = 'RUC';

    public static function getAll(): array
    {
        return [
            self::CEDULA,
            self::PASSPORT,
            self::RUC,
        ];
    }
}

