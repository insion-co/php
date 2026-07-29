<?php

namespace Insion\Types;

enum CreateAppealResponseDataActionStatus: string
{
    case Compliant = "Compliant";
    case Suspended = "Suspended";
    case Banned = "Banned";
}
