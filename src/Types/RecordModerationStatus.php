<?php

namespace Insion\Types;

enum RecordModerationStatus: string
{
    case Compliant = "Compliant";
    case Flagged = "Flagged";
}
