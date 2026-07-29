<?php

namespace Insion\Types;

enum GetApiV1UsersRequestStatus: string
{
    case Compliant = "Compliant";
    case Suspended = "Suspended";
    case Banned = "Banned";
}
