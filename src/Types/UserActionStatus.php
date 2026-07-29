<?php

namespace Insion\Types;

enum UserActionStatus: string
{
    case Compliant = "Compliant";
    case Suspended = "Suspended";
    case Banned = "Banned";
}
