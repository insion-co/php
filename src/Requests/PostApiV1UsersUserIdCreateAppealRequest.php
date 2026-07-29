<?php

namespace Insion\Requests;

use Insion\Core\Json\JsonSerializableType;
use Insion\Core\Json\JsonProperty;

class PostApiV1UsersUserIdCreateAppealRequest extends JsonSerializableType
{
    /**
     * @var string $text The appeal message.
     */
    #[JsonProperty('text')]
    public string $text;

    /**
     * @param array{
     *   text: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->text = $values['text'];
    }
}
