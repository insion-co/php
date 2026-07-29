<?php

namespace Insion\Types;

use Insion\Core\Json\JsonSerializableType;
use Insion\Core\Json\JsonProperty;

class ErrorResponse extends JsonSerializableType
{
    /**
     * @var ErrorResponseError $error
     */
    #[JsonProperty('error')]
    public ErrorResponseError $error;

    /**
     * @param array{
     *   error: ErrorResponseError,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
