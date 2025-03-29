<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case Cash = 'Наличными';
    case CardOnline = 'Картой онлайн';
    case CardOnDelivery = 'Картой при получении';


    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
