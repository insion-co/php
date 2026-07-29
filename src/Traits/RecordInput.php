<?php

namespace Insion\Traits;

use Insion\Types\ContentExternalUrls;
use Insion\Types\UserInput;
use Insion\Core\Json\JsonProperty;
use Insion\Core\Types\Union;
use Insion\Core\Types\ArrayType;

/**
 * @property string $clientId
 * @property ?string $clientUrl
 * @property string $name
 * @property string $entity
 * @property (
 *    string
 *   |ContentExternalUrls
 * ) $content
 * @property ?array<string, mixed> $metadata
 * @property ?UserInput $user
 */
trait RecordInput
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
}
