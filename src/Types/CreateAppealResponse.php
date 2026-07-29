<?php

namespace Insion\Types;

use Insion\Core\Json\JsonSerializableType;
use Insion\Core\Json\JsonProperty;

class CreateAppealResponse extends JsonSerializableType
{
    /**
     * @var CreateAppealResponseData $data
     */
    #[JsonProperty('data')]
    public CreateAppealResponseData $data;

    /**
     * @param array{
     *   data: CreateAppealResponseData,
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
