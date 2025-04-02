<?php

namespace App\Enums;

enum ProjectStatusEnum: string
{
    case ACTIVE = 'active';
    case CLOSED = 'closed';
    case END_SOON = 'end_soon';
}
