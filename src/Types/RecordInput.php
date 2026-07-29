<?php

namespace Insion\Types;

use Insion\Core\Json\JsonSerializableType;
use Insion\Core\Json\JsonProperty;
use Insion\Core\Types\Union;
use Insion\Core\Types\ArrayType;

class RecordInput extends JsonSerializableType
{
    /**
     * @var string $clientId Your unique identifier for the record.
     */
    #[JsonProperty('clientId')]
    public string $clientId;

    /**
     * @var ?string $clientUrl URL for the original content.
     */
    #[JsonProperty('clientUrl')]
    public ?string $clientUrl;

    /**
     * @var string $name Name or title of the record.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $entity Type of record, such as post, comment, or message.
     */
    #[JsonProperty('entity')]
    public string $entity;

    /**
     * @var (
     *    string
     *   |ContentExternalUrls
     * ) $content
     */
    #[JsonProperty('content'), Union('string', ContentExternalUrls::class)]
    public string|ContentExternalUrls $content;

    /**
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?UserInput $user
     */
    #[JsonProperty('user')]
    public ?UserInput $user;

    /**
     * @param array{
     *   clientId: string,
     *   name: string,
     *   entity: string,
     *   content: (
     *    string
     *   |ContentExternalUrls
     * ),
     *   clientUrl?: ?string,
     *   metadata?: ?array<string, mixed>,
     *   user?: ?UserInput,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->clientId = $values['clientId'];
        $this->clientUrl = $values['clientUrl'] ?? null;
        $this->name = $values['name'];
        $this->entity = $values['entity'];
        $this->content = $values['content'];
        $this->metadata = $values['metadata'] ?? null;
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
