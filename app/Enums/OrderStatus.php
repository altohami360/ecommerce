<?php

namespace App\Enums;

enum OrderStatus: string 
{
    case Pending = 'Pending';
    case Completed = 'Completed';
    case Cancelled = 'Cancelled';
    case Failed = 'Failed';
}