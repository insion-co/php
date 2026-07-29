<?php

namespace Insion\Types;

use Insion\Core\Json\JsonSerializableType;
use Insion\Core\Json\JsonProperty;

class RecordResponse extends JsonSerializableType
{
    /**
     * @var Record $data
     */
    #[JsonProperty('data')]
    public Record $data;

    /**
     * @param array{
     *   data: Record,
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
