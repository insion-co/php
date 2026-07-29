<?php

namespace Insion\Types;

use Insion\Core\Json\JsonSerializableType;
use Insion\Core\Json\JsonProperty;
use Insion\Core\Types\ArrayType;

class ModerateResponse extends JsonSerializableType
{
    /**
     * @var string $id Insion record ID.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<ModerateResponseStatus> $status Moderation status.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var string $moderation Insion moderation ID.
     */
    #[JsonProperty('moderation')]
    public string $moderation;

    /**
     * @var ?string $user Insion user ID when a user was provided.
     */
    #[JsonProperty('user')]
    public ?string $user;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var bool $flagged Deprecated. True when status is Flagged.
     */
    #[JsonProperty('flagged')]
    public bool $flagged;

    /**
     * @var array<string> $categoryIds IDs of rules that matched the record.
     */
    #[JsonProperty('categoryIds'), ArrayType(['string'])]
    public array $categoryIds;

    /**
     * @param array{
     *   id: string,
     *   status: value-of<ModerateResponseStatus>,
     *   moderation: string,
     *   message: string,
     *   flagged: bool,
     *   categoryIds: array<string>,
     *   user?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->status = $values['status'];
        $this->moderation = $values['moderation'];
        $this->user = $values['user'] ?? null;
        $this->message = $values['message'];
        $this->flagged = $values['flagged'];
        $this->categoryIds = $values['categoryIds'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
