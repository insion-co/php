<?php

namespace Insion\Requests;

use Insion\Core\Json\JsonSerializableType;
use Insion\Core\Json\JsonProperty;

class DeleteApiV1IngestRequest extends JsonSerializableType
{
    /**
     * @var string $clientId Your unique identifier for the record.
     */
    #[JsonProperty('clientId')]
    public string $clientId;

    /**
     * @param array{
     *   clientId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->clientId = $values['clientId'];
    }
}
