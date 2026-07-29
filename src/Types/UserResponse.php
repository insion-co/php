<?php

namespace Insion\Types;

use Insion\Core\Json\JsonSerializableType;
use Insion\Core\Json\JsonProperty;

class UserResponse extends JsonSerializableType
{
    /**
     * @var User $data
     */
    #[JsonProperty('data')]
    public User $data;

    /**
     * @param array{
     *   data: User,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
