<?php

namespace Insion\Tests;

use DateTime;
use Insion\Core\Json\JsonProperty;
use Insion\Core\Json\JsonSerializableType;
use Insion\Core\Types\Date;
use JsonException;
use PHPUnit\Framework\TestCase;

class GeneratorRegressionType extends JsonSerializableType
{
    #[JsonProperty('nullableDateTime'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $nullableDateTime;

    #[JsonProperty('requiredDateTime'), Date(Date::TYPE_DATETIME)]
    public DateTime $requiredDateTime;

    /**
     * @param array{nullableDateTime?: ?DateTime, requiredDateTime: DateTime} $values
     */
    public function __construct(array $values)
    {
        $this->nullableDateTime = $values['nullableDateTime'] ?? null;
        $this->requiredDateTime = $values['requiredDateTime'];
    }
}

class GeneratorRegressionTest extends TestCase
{
    public function testNullableDateTimeAcceptsNull(): void
    {
        $result = GeneratorRegressionType::fromJson(
            '{"nullableDateTime":null,"requiredDateTime":"2026-08-07T00:00:00Z"}'
        );

        $this->assertNull($result->nullableDateTime);
        $this->assertInstanceOf(DateTime::class, $result->requiredDateTime);
    }

    public function testNullableDateTimeAcceptsAString(): void
    {
        $result = GeneratorRegressionType::fromJson(
            '{"nullableDateTime":"2026-08-07T01:02:03Z","requiredDateTime":"2026-08-07T00:00:00Z"}'
        );

        $this->assertInstanceOf(DateTime::class, $result->nullableDateTime);
    }

    public function testRequiredDateTimeRejectsNull(): void
    {
        $this->expectException(JsonException::class);
        $this->expectExceptionMessage('Unexpected null for non-nullable date.');

        GeneratorRegressionType::fromJson(
            '{"nullableDateTime":null,"requiredDateTime":null}'
        );
    }

    public function testDateTimeRejectsOtherTypes(): void
    {
        $this->expectException(JsonException::class);
        $this->expectExceptionMessage('Unexpected non-string type for date.');

        GeneratorRegressionType::fromJson(
            '{"nullableDateTime":42,"requiredDateTime":"2026-08-07T00:00:00Z"}'
        );
    }
}
