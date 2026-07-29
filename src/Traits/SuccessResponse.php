<?php

namespace Insion\Traits;

use Insion\Core\Json\JsonProperty;

/**
 * @property string $message
 */
trait SuccessResponse
{
    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;
}
