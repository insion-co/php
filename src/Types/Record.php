<?php

namespace Insion\Types;

use Insion\Core\Json\JsonSerializableType;
use Insion\Core\Json\JsonProperty;
use Insion\Core\Types\ArrayType;
use DateTime;
use Insion\Core\Types\Date;

class Record extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $clientId
     */
    #[JsonProperty('clientId')]
    public string $clientId;

    /**
     * @var ?string $clientUrl
     */
    #[JsonProperty('clientUrl')]
    public ?string $clientUrl;

    /**
     * @var ?string $name Name or title of the record. Null when submitted using passthrough moderation.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var string $entity
     */
    #[JsonProperty('entity')]
    public string $entity;

    /**
     * @var bool $protected
     */
    #[JsonProperty('protected')]
    public bool $protected;

    /**
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var ?value-of<RecordModerationStatus> $moderationStatus
     */
    #[JsonProperty('moderationStatus')]
    public ?string $moderationStatus;

    /**
     * @var ?DateTime $moderationStatusCreatedAt
     */
    #[JsonProperty('moderationStatusCreatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $moderationStatusCreatedAt;

    /**
     * @var bool $moderationPending
     */
    #[JsonProperty('moderationPending')]
    public bool $moderationPending;

    /**
     * @var ?DateTime $moderationPendingCreatedAt
     */
    #[JsonProperty('moderationPendingCreatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $moderationPendingCreatedAt;

    /**
     * @var ?string $user Associated Insion user ID.
     */
    #[JsonProperty('user')]
    public ?string $user;

    /**
     * @param array{
     *   id: string,
     *   clientId: string,
     *   entity: string,
     *   protected: bool,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   moderationPending: bool,
     *   clientUrl?: ?string,
     *   name?: ?string,
     *   metadata?: ?array<string, mixed>,
     *   moderationStatus?: ?value-of<RecordModerationStatus>,
     *   moderationStatusCreatedAt?: ?DateTime,
     *   moderationPendingCreatedAt?: ?DateTime,
     *   user?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->clientId = $values['clientId'];
        $this->clientUrl = $values['clientUrl'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->entity = $values['entity'];
        $this->protected = $values['protected'];
        $this->metadata = $values['metadata'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->moderationStatus = $values['moderationStatus'] ?? null;
        $this->moderationStatusCreatedAt = $values['moderationStatusCreatedAt'] ?? null;
        $this->moderationPending = $values['moderationPending'];
        $this->moderationPendingCreatedAt = $values['moderationPendingCreatedAt'] ?? null;
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
