# Reference
<details><summary><code>$client-&gt;moderateARecord($request) -> ?ModerateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create or update a record and return its moderation result immediately.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->moderateARecord(
    new ModerateRequest([
        'clientId' => 'clientId',
        'name' => 'name',
        'entity' => 'entity',
        'content' => 'content',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$passthrough:** `?bool` — Moderate without persisting the record's name or content, or the user's email, name, or username.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ingestARecord($request) -> ?IngestRecordResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create or update a content record for asynchronous moderation. Results are delivered through webhook events when moderation is performed.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ingestARecord(
    new RecordInput([
        'clientId' => 'clientId',
        'name' => 'name',
        'entity' => 'entity',
        'content' => 'content',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `RecordInput` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;deleteARecord($request) -> ?SuccessResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Remove a record from the moderation system by its client ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->deleteARecord(
    new DeleteApiV1IngestRequest([
        'clientId' => 'clientId',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$clientId:** `string` — Your unique identifier for the record.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ingestAUser($request) -> ?IngestUserResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create or update a user without ingesting a record.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ingestAUser(
    new UserInput([
        'clientId' => 'clientId',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `UserInput` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;listRecords($request) -> ?ListRecordsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List the records belonging to the authenticated organization.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->listRecords(
    new GetApiV1RecordsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Maximum number of items to return.
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Return items after this Insion ID. Cannot be used with ending_before.
    
</dd>
</dl>

<dl>
<dd>

**$endingBefore:** `?string` — Return items before this Insion ID. Cannot be used with starting_after.
    
</dd>
</dl>

<dl>
<dd>

**$clientId:** `?string` — Filter by your record identifier.
    
</dd>
</dl>

<dl>
<dd>

**$user:** `?string` — Filter by Insion user ID.
    
</dd>
</dl>

<dl>
<dd>

**$entity:** `?string` — Filter by record entity.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by moderation status.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;retrieveARecord($recordId) -> ?RecordResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve one record by its Insion record ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->retrieveARecord(
    'recordId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$recordId:** `string` — Insion record ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;listUsers($request) -> ?ListUsersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List the users belonging to the authenticated organization.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->listUsers(
    new GetApiV1UsersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?int` — Maximum number of items to return.
    
</dd>
</dl>

<dl>
<dd>

**$startingAfter:** `?string` — Return items after this Insion ID. Cannot be used with ending_before.
    
</dd>
</dl>

<dl>
<dd>

**$endingBefore:** `?string` — Return items before this Insion ID. Cannot be used with starting_after.
    
</dd>
</dl>

<dl>
<dd>

**$clientId:** `?string` — Filter by your user identifier.
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — Filter by user email.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filter by user action status.
    
</dd>
</dl>

<dl>
<dd>

**$user:** `?string` — Filter by Insion user ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;retrieveAUser($userId) -> ?UserResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve one user by its Insion user ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->retrieveAUser(
    'userId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$userId:** `string` — Insion user ID.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;createAnAppeal($userId, $request) -> ?CreateAppealResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create an appeal for a suspended user. Appeals must be enabled for the organization.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->createAnAppeal(
    'userId',
    new PostApiV1UsersUserIdCreateAppealRequest([
        'text' => 'text',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$userId:** `string` — Insion user ID.
    
</dd>
</dl>

<dl>
<dd>

**$text:** `string` — The appeal message.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

