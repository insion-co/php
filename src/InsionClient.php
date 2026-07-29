<?php

namespace Insion;

use Psr\Http\Client\ClientInterface;
use Insion\Core\Client\RawClient;
use Insion\Requests\ModerateRequest;
use Insion\Types\ModerateResponse;
use Insion\Exceptions\InsionException;
use Insion\Exceptions\InsionApiException;
use Insion\Core\Json\JsonApiRequest;
use Insion\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Insion\Types\RecordInput;
use Insion\Types\IngestRecordResponse;
use Insion\Requests\DeleteApiV1IngestRequest;
use Insion\Types\SuccessResponse;
use Insion\Types\UserInput;
use Insion\Types\IngestUserResponse;
use Insion\Requests\GetApiV1RecordsRequest;
use Insion\Types\ListRecordsResponse;
use Insion\Types\RecordResponse;
use Insion\Requests\GetApiV1UsersRequest;
use Insion\Types\ListUsersResponse;
use Insion\Types\UserResponse;
use Insion\Requests\PostApiV1UsersUserIdCreateAppealRequest;
use Insion\Types\CreateAppealResponse;

class InsionClient
{
    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param string $token The token to use for authentication.
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        string $token,
        ?array $options = null,
    ) {
        $defaultHeaders = [
            'Authorization' => "Bearer $token",
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Insion',
        ];

        $this->options = $options ?? [];

        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );
    }

    /**
     * Create or update a record and return its moderation result immediately.
     *
     * @param ModerateRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ModerateResponse
     * @throws InsionException
     * @throws InsionApiException
     */
    public function moderateARecord(ModerateRequest $request, ?array $options = null): ?ModerateResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/v1/moderate",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ModerateResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new InsionException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new InsionException(message: $e->getMessage(), previous: $e);
        }
        throw new InsionApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Create or update a content record for asynchronous moderation. Results are delivered through webhook events when moderation is performed.
     *
     * @param RecordInput $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?IngestRecordResponse
     * @throws InsionException
     * @throws InsionApiException
     */
    public function ingestARecord(RecordInput $request, ?array $options = null): ?IngestRecordResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/v1/ingest",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return IngestRecordResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new InsionException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new InsionException(message: $e->getMessage(), previous: $e);
        }
        throw new InsionApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Remove a record from the moderation system by its client ID.
     *
     * @param DeleteApiV1IngestRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SuccessResponse
     * @throws InsionException
     * @throws InsionApiException
     */
    public function deleteARecord(DeleteApiV1IngestRequest $request, ?array $options = null): ?SuccessResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/v1/ingest",
                    method: HttpMethod::DELETE,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return SuccessResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new InsionException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new InsionException(message: $e->getMessage(), previous: $e);
        }
        throw new InsionApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Create or update a user without ingesting a record.
     *
     * @param UserInput $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?IngestUserResponse
     * @throws InsionException
     * @throws InsionApiException
     */
    public function ingestAUser(UserInput $request, ?array $options = null): ?IngestUserResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/v1/ingest/user",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return IngestUserResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new InsionException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new InsionException(message: $e->getMessage(), previous: $e);
        }
        throw new InsionApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * List the records belonging to the authenticated organization.
     *
     * @param GetApiV1RecordsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListRecordsResponse
     * @throws InsionException
     * @throws InsionApiException
     */
    public function listRecords(GetApiV1RecordsRequest $request = new GetApiV1RecordsRequest(), ?array $options = null): ?ListRecordsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->startingAfter != null) {
            $query['starting_after'] = $request->startingAfter;
        }
        if ($request->endingBefore != null) {
            $query['ending_before'] = $request->endingBefore;
        }
        if ($request->clientId != null) {
            $query['clientId'] = $request->clientId;
        }
        if ($request->user != null) {
            $query['user'] = $request->user;
        }
        if ($request->entity != null) {
            $query['entity'] = $request->entity;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/v1/records",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListRecordsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new InsionException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new InsionException(message: $e->getMessage(), previous: $e);
        }
        throw new InsionApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Retrieve one record by its Insion record ID.
     *
     * @param string $recordId Insion record ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RecordResponse
     * @throws InsionException
     * @throws InsionApiException
     */
    public function retrieveARecord(string $recordId, ?array $options = null): ?RecordResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/v1/records/{$recordId}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return RecordResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new InsionException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new InsionException(message: $e->getMessage(), previous: $e);
        }
        throw new InsionApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * List the users belonging to the authenticated organization.
     *
     * @param GetApiV1UsersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListUsersResponse
     * @throws InsionException
     * @throws InsionApiException
     */
    public function listUsers(GetApiV1UsersRequest $request = new GetApiV1UsersRequest(), ?array $options = null): ?ListUsersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->startingAfter != null) {
            $query['starting_after'] = $request->startingAfter;
        }
        if ($request->endingBefore != null) {
            $query['ending_before'] = $request->endingBefore;
        }
        if ($request->clientId != null) {
            $query['clientId'] = $request->clientId;
        }
        if ($request->email != null) {
            $query['email'] = $request->email;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->user != null) {
            $query['user'] = $request->user;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/v1/users",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListUsersResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new InsionException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new InsionException(message: $e->getMessage(), previous: $e);
        }
        throw new InsionApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Retrieve one user by its Insion user ID.
     *
     * @param string $userId Insion user ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UserResponse
     * @throws InsionException
     * @throws InsionApiException
     */
    public function retrieveAUser(string $userId, ?array $options = null): ?UserResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/v1/users/{$userId}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return UserResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new InsionException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new InsionException(message: $e->getMessage(), previous: $e);
        }
        throw new InsionApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Create an appeal for a suspended user. Appeals must be enabled for the organization.
     *
     * @param string $userId Insion user ID.
     * @param PostApiV1UsersUserIdCreateAppealRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateAppealResponse
     * @throws InsionException
     * @throws InsionApiException
     */
    public function createAnAppeal(string $userId, PostApiV1UsersUserIdCreateAppealRequest $request, ?array $options = null): ?CreateAppealResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api/v1/users/{$userId}/create_appeal",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return CreateAppealResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new InsionException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new InsionException(message: $e->getMessage(), previous: $e);
        }
        throw new InsionApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
