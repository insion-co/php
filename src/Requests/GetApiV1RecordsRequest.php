<?php

namespace Insion\Requests;

use Insion\Core\Json\JsonSerializableType;
use Insion\Types\GetApiV1RecordsRequestStatus;

class GetApiV1RecordsRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Maximum number of items to return.
     */
    public ?int $limit;

    /**
     * @var ?string $startingAfter Return items after this Insion ID. Cannot be used with ending_before.
     */
    public ?string $startingAfter;

    /**
     * @var ?string $endingBefore Return items before this Insion ID. Cannot be used with starting_after.
     */
    public ?string $endingBefore;

    /**
     * @var ?string $clientId Filter by your record identifier.
     */
    public ?string $clientId;

    /**
     * @var ?string $user Filter by Insion user ID.
     */
    public ?string $user;

    /**
     * @var ?string $entity Filter by record entity.
     */
    public ?string $entity;

    /**
     * @var ?value-of<GetApiV1RecordsRequestStatus> $status Filter by moderation status.
     */
    public ?string $status;

    /**
     * @param array{
     *   limit?: ?int,
     *   startingAfter?: ?string,
     *   endingBefore?: ?string,
     *   clientId?: ?string,
     *   user?: ?string,
     *   entity?: ?string,
     *   status?: ?value-of<GetApiV1RecordsRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->endingBefore = $values['endingBefore'] ?? null;
        $this->clientId = $values['clientId'] ?? null;
        $this->user = $values['user'] ?? null;
        $this->entity = $values['entity'] ?? null;
        $this->status = $values['status'] ?? null;
    }
}
