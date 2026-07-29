<?php

namespace Insion\Types;

use Insion\Core\Json\JsonSerializableType;
use Insion\Core\Json\JsonProperty;
use Insion\Core\Types\ArrayType;

class ContentExternalUrls extends JsonSerializableType
{
    /**
     * @var string $text Text content to moderate.
     */
    #[JsonProperty('text')]
    public string $text;

    /**
     * @var ?array<string> $imageUrls Image URLs to moderate.
     */
    #[JsonProperty('imageUrls'), ArrayType(['string'])]
    public ?array $imageUrls;

    /**
     * @var ?array<string> $externalUrls External page URLs to moderate.
     */
    #[JsonProperty('externalUrls'), ArrayType(['string'])]
    public ?array $externalUrls;

    /**
     * @param array{
     *   text: string,
     *   imageUrls?: ?array<string>,
     *   externalUrls?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->text = $values['text'];
        $this->imageUrls = $values['imageUrls'] ?? null;
        $this->externalUrls = $values['externalUrls'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
