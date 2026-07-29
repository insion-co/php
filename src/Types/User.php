<?php

namespace Insion\Types;

use Insion\Core\Json\JsonSerializableType;
use Insion\Core\Json\JsonProperty;
use Insion\Core\Types\ArrayType;
use DateTime;
use Insion\Core\Types\Date;

class User extends JsonSerializableType
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
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $username
     */
    #[JsonProperty('username')]
    public ?string $username;

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
     * @var ?value-of<UserActionStatus> $actionStatus
     */
    #[JsonProperty('actionStatus')]
    public ?string $actionStatus;

    /**
     * @var ?DateTime $actionStatusCreatedAt
     */
    #[JsonProperty('actionStatusCreatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $actionStatusCreatedAt;

    /**
     * @var ?string $appealUrl
     */
    #[JsonProperty('appealUrl')]
    public ?string $appealUrl;

    /**
     * @param array{
     *   id: string,
     *   clientId: string,
     *   protected: bool,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   clientUrl?: ?string,
     *   email?: ?string,
     *   name?: ?string,
     *   username?: ?string,
     *   metadata?: ?array<string, mixed>,
     *   actionStatus?: ?value-of<UserActionStatus>,
     *   actionStatusCreatedAt?: ?DateTime,
     *   appealUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->clientId = $values['clientId'];
        $this->clientUrl = $values['clientUrl'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->username = $values['username'] ?? null;
        $this->protected = $values['protected'];
        $this->metadata = $values['metadata'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->actionStatus = $values['actionStatus'] ?? null;
        $this->actionStatusCreatedAt = $values['actionStatusCreatedAt'] ?? null;
        $this->appealUrl = $values['appealUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
