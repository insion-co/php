<?php

namespace Insion\Types;

use Insion\Core\Json\JsonSerializableType;
use Insion\Traits\SuccessResponse;
use Insion\Core\Json\JsonProperty;

class IngestUserResponse extends JsonSerializableType
{
    use SuccessResponse;

    /**
     * @var string $id Insion user ID.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @param array{
     *   message: string,
     *   id: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->message = $values['message'];
        $this->id = $values['id'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
