<?php

namespace Insion\Requests;

use Insion\Core\Json\JsonSerializableType;
use Insion\Traits\RecordInput;
use Insion\Core\Json\JsonProperty;
use Insion\Types\ContentExternalUrls;
use Insion\Types\UserInput;

class ModerateRequest extends JsonSerializableType
{
    use RecordInput;

    /**
     * @var ?bool $passthrough Moderate without persisting the record's name or content, or the user's email, name, or username.
     */
    #[JsonProperty('passthrough')]
    public ?bool $passthrough;

    /**
     * @param array{
     *   clientId: string,
     *   name: string,
     *   entity: string,
     *   content: (
     *    string
     *   |ContentExternalUrls
     * ),
     *   passthrough?: ?bool,
     *   clientUrl?: ?string,
     *   metadata?: ?array<string, mixed>,
     *   user?: ?UserInput,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->passthrough = $values['passthrough'] ?? null;
        $this->clientId = $values['clientId'];
        $this->clientUrl = $values['clientUrl'] ?? null;
        $this->name = $values['name'];
        $this->entity = $values['entity'];
        $this->content = $values['content'];
        $this->metadata = $values['metadata'] ?? null;
        $this->user = $values['user'] ?? null;
    }
}
