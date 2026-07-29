<?php

namespace Insion\Types;

use Insion\Core\Json\JsonSerializableType;
use Insion\Core\Json\JsonProperty;
use DateTime;
use Insion\Core\Types\Date;

class CreateAppealResponseData extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?value-of<CreateAppealResponseDataActionStatus> $actionStatus
     */
    #[JsonProperty('actionStatus')]
    public ?string $actionStatus;

    /**
     * @var ?DateTime $actionStatusCreatedAt
     */
    #[JsonProperty('actionStatusCreatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $actionStatusCreatedAt;

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
     * @var ?string $appealUrl
     */
    #[JsonProperty('appealUrl')]
    public ?string $appealUrl;

    /**
     * @param array{
     *   id: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   actionStatus?: ?value-of<CreateAppealResponseDataActionStatus>,
     *   actionStatusCreatedAt?: ?DateTime,
     *   appealUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->actionStatus = $values['actionStatus'] ?? null;
        $this->actionStatusCreatedAt = $values['actionStatusCreatedAt'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
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
