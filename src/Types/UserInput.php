<?php

namespace Insion\Types;

use Insion\Core\Json\JsonSerializableType;
use Insion\Core\Json\JsonProperty;
use Insion\Core\Types\ArrayType;

class UserInput extends JsonSerializableType
{
    /**
     * @var string $clientId Your unique identifier for the user.
     */
    #[JsonProperty('clientId')]
    public string $clientId;

    /**
     * @var ?string $clientUrl URL for the user's profile.
     */
    #[JsonProperty('clientUrl')]
    public ?string $clientUrl;

    /**
     * @var ?string $stripeAccountId The user's Stripe account ID.
     */
    #[JsonProperty('stripeAccountId')]
    public ?string $stripeAccountId;

    /**
     * @var ?string $email The user's email address.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $name The user's name.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $username The user's username.
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @var ?bool $protected Whether the user is protected from automated moderation actions.
     */
    #[JsonProperty('protected')]
    public ?bool $protected;

    /**
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   clientId: string,
     *   clientUrl?: ?string,
     *   stripeAccountId?: ?string,
     *   email?: ?string,
     *   name?: ?string,
     *   username?: ?string,
     *   protected?: ?bool,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->clientId = $values['clientId'];
        $this->clientUrl = $values['clientUrl'] ?? null;
        $this->stripeAccountId = $values['stripeAccountId'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->username = $values['username'] ?? null;
        $this->protected = $values['protected'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
