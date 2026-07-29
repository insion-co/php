<?php

namespace Insion\Types;

use Insion\Core\Json\JsonSerializableType;
use Insion\Traits\SuccessResponse;
use Insion\Core\Json\JsonProperty;

class IngestRecordResponse extends JsonSerializableType
{
    use SuccessResponse;

    /**
     * @var string $id Insion record ID.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $moderation Insion moderation ID when moderation was queued; otherwise null.
     */
    #[JsonProperty('moderation')]
    public ?string $moderation;

    /**
     * @var ?string $user Insion user ID when a user was provided.
     */
    #[JsonProperty('user')]
    public ?string $user;

    /**
     * @param array{
     *   message: string,
     *   id: string,
     *   moderation?: ?string,
     *   user?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->message = $values['message'];
        $this->id = $values['id'];
        $this->moderation = $values['moderation'] ?? null;
        $this->user = $values['user'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
