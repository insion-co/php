<?php

namespace Insion\Types;

enum GetApiV1RecordsRequestStatus: string
{
    case Compliant = "Compliant";
    case Flagged = "Flagged";
}
