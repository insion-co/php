<?php

namespace Insion\Types;

use Insion\Core\Json\JsonSerializableType;
use Insion\Core\Json\JsonProperty;
use Insion\Core\Types\ArrayType;

class ListUsersResponse extends JsonSerializableType
{
    /**
     * @var array<User> $data
     */
    #[JsonProperty('data'), ArrayType([User::class])]
    public array $data;

    /**
     * @var bool $hasMore
     */
    #[JsonProperty('has_more')]
    public bool $hasMore;

    /**
     * @param array{
     *   data: array<User>,
     *   hasMore: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->hasMore = $values['hasMore'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
