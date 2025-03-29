<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Created = 'Создан';
    case Confirmed = 'Подтвержден';
    case Sent = 'Отправлен';
    case Completed = 'Выполнен';
    case Canceled = 'Отменен';


    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
