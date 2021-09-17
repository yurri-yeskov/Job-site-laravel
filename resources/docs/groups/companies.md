# Companies


## List companies

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/companies?sort=ipsum" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/companies"
);

let params = {
    "sort": "ipsum",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'https://jobclass.bedigit.local/api/companies',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'sort'=> 'ipsum',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "success": true,
    "message": null,
    "result": {
        "data": [
            {
                "id": 683,
                "user_id": "1",
                "name": "MISSION IMPOSSIBLE",
                "logo": "files\/us\/683\/3c69eac8aacff148e52e025c675100e2.jpg",
                "description": "Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.",
                "country_code": "US",
                "city_id": null,
                "address": null,
                "phone": "",
                "fax": null,
                "email": null,
                "website": null,
                "facebook": null,
                "twitter": null,
                "linkedin": null,
                "pinterest": null
            },
            {
                "id": 682,
                "user_id": "1",
                "name": "LOLA LAND",
                "logo": "files\/us\/682\/a9df8b8e75140f5ec9aade4702333313.png",
                "description": "Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.",
                "country_code": "US",
                "city_id": null,
                "address": null,
                "phone": "",
                "fax": null,
                "email": null,
                "website": null,
                "facebook": null,
                "twitter": null,
                "linkedin": null,
                "pinterest": null
            },
            {
                "id": 681,
                "user_id": "1",
                "name": "Amissa Gan",
                "logo": "files\/us\/681\/af3502595a45b4d87c93d6e3cf06d9f8.jpg",
                "description": "Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.",
                "country_code": "US",
                "city_id": null,
                "address": null,
                "phone": "",
                "fax": null,
                "email": null,
                "website": null,
                "facebook": null,
                "twitter": null,
                "linkedin": null,
                "pinterest": null
            },
            {
                "id": 680,
                "user_id": "1",
                "name": "Foo Inc.",
                "logo": "files\/us\/680\/2eced1747c0a378f80e0460e2b293f2c.jpg",
                "description": "Use a brief title and description of the ad\r\nMake sure you post in the correct category\r\nAdd a logo to your ad\r\nPut a min and max salary\r\nCheck the ad before publish",
                "country_code": "US",
                "city_id": null,
                "address": null,
                "phone": "",
                "fax": null,
                "email": null,
                "website": null,
                "facebook": null,
                "twitter": null,
                "linkedin": null,
                "pinterest": null
            },
            {
                "id": 679,
                "user_id": "1",
                "name": "CAPMARKETER",
                "logo": "files\/us\/679\/d76714ac649b431f757b7011c02c7269.png",
                "description": "Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.",
                "country_code": "US",
                "city_id": null,
                "address": null,
                "phone": "",
                "fax": null,
                "email": null,
                "website": null,
                "facebook": null,
                "twitter": null,
                "linkedin": null,
                "pinterest": null
            },
            {
                "id": 659,
                "user_id": "1",
                "name": "Africa Fun",
                "logo": "files\/us\/659\/eceb29817fcd13ef564fd47ab4acfd4f.png",
                "description": "Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.",
                "country_code": "US",
                "city_id": null,
                "address": null,
                "phone": "",
                "fax": null,
                "email": null,
                "website": null,
                "facebook": null,
                "twitter": null,
                "linkedin": null,
                "pinterest": null
            },
            {
                "id": 155,
                "user_id": "1455",
                "name": "Gibson LLC",
                "logo": "files\/eg\/1455\/20f53cda5ec88bb3677e24dd28b29e4e.png",
                "description": "Mollitia consequatur iure nemo et modi excepturi iste. Ea commodi placeat et ipsum. Aut qui nemo esse modi voluptas. Itaque repellat veritatis modi suscipit saepe.",
                "country_code": "EG",
                "city_id": "12686",
                "address": null,
                "phone": "+2038730612",
                "fax": "+1-549-759-6938",
                "email": "jana12@donnelly.biz",
                "website": "http:\/\/dolores.com",
                "facebook": null,
                "twitter": null,
                "linkedin": null,
                "pinterest": null
            },
            {
                "id": 437,
                "user_id": "302",
                "name": "Block, Bergstrom And Hessel",
                "logo": "files\/it\/302\/774a909e5bb743f173540ff4e8e3703b.png",
                "description": "Quod iste qui ipsum error tempore modi fuga. Dolores qui dolor autem dignissimos est et accusantium a.",
                "country_code": "IT",
                "city_id": "23633",
                "address": null,
                "phone": "9407762823",
                "fax": "+14174134207",
                "email": "toy97@lehner.biz",
                "website": "http:\/\/ea.com",
                "facebook": null,
                "twitter": null,
                "linkedin": null,
                "pinterest": null
            },
            {
                "id": 415,
                "user_id": "2196",
                "name": "Beer-Brekke",
                "logo": "files\/ir\/2196\/f702359940760a9710a9c06b483541fe.png",
                "description": "Voluptatibus sed quasi id. Ab ipsam ipsa eaque molestias commodi voluptas rem. Distinctio dolor sed doloremque natus. Expedita cum magnam nisi doloremque fugit.",
                "country_code": "IR",
                "city_id": "21917",
                "address": null,
                "phone": "+18423873459",
                "fax": "+16722248641",
                "email": "rico65@trantow.com",
                "website": "http:\/\/libero.com",
                "facebook": null,
                "twitter": null,
                "linkedin": null,
                "pinterest": null
            },
            {
                "id": 650,
                "user_id": "993",
                "name": "Waters, Heaney And Friesen",
                "logo": "files\/qa\/993\/4178a1f36cfd0fb3841fa0a637c12948.png",
                "description": "Quis pariatur aliquid consequatur aperiam. Nisi iure occaecati rerum sit aut tenetur. Soluta in voluptatem sit consequatur ut.",
                "country_code": "QA",
                "city_id": "33502",
                "address": null,
                "phone": "+12429446990",
                "fax": "723-463-1369",
                "email": "susana46@towne.info",
                "website": "http:\/\/autem.com",
                "facebook": null,
                "twitter": null,
                "linkedin": null,
                "pinterest": null
            },
            {
                "id": 471,
                "user_id": "1981",
                "name": "Koepp-Douglas",
                "logo": "files\/ar\/1981\/2fa6ff987d952ca0adb1c7afce0c7784.png",
                "description": "Laborum eos porro quibusdam at facere. Et iure inventore et ut consequuntur culpa.",
                "country_code": "AR",
                "city_id": "682",
                "address": null,
                "phone": "6274685869",
                "fax": "717.285.6860",
                "email": "emie60@reynolds.com",
                "website": "http:\/\/aut.com",
                "facebook": null,
                "twitter": null,
                "linkedin": null,
                "pinterest": null
            },
            {
                "id": 123,
                "user_id": "533",
                "name": "Bechtelar Group",
                "logo": "files\/id\/533\/801025689856cf095d4c1020420ca1e6.png",
                "description": "Earum deserunt esse consequatur ex ratione rem omnis. Adipisci facere ipsa voluptatem voluptas. Laborum qui quos saepe fuga architecto asperiores pariatur cupiditate. Ut vero quibusdam rerum sit in sint dolor.",
                "country_code": "ID",
                "city_id": "18020",
                "address": null,
                "phone": "+627467884102",
                "fax": "436.972.0846",
                "email": "kenya.parker@lesch.com",
                "website": "http:\/\/accusamus.com",
                "facebook": null,
                "twitter": null,
                "linkedin": null,
                "pinterest": null
            },
            {
                "id": 56,
                "user_id": "3",
                "name": "Cruickshank, Gusikowski And Kub",
                "logo": "files\/us\/3\/feb3122a6a3aca78d4b594e082b89099.png",
                "description": "Dolores qui neque repellendus occaecati doloremque. Aut officia optio non eaque vel fuga exercitationem. Ipsa sint quo optio qui aliquid. Debitis voluptatem amet in unde reiciendis repudiandae.",
                "country_code": "US",
                "city_id": "47246",
                "address": null,
                "phone": "+14787721324",
                "fax": "1-684-792-2626",
                "email": "maya.berge@example.net",
                "website": "http:\/\/aliquam.com",
                "facebook": null,
                "twitter": null,
                "linkedin": null,
                "pinterest": null
            },
            {
                "id": 452,
                "user_id": "283",
                "name": "Von, McGlynn And Walter",
                "logo": "files\/eg\/283\/7dc20a62dd568ae334332c51fb5555cc.png",
                "description": "Molestias nihil autem doloremque ut. Maiores ducimus blanditiis sed velit sunt assumenda enim. Voluptates illo aut sit repellendus libero culpa. Itaque perferendis et laborum non explicabo iusto.",
                "country_code": "EG",
                "city_id": "12741",
                "address": null,
                "phone": "9279610216",
                "fax": "768.303.8388",
                "email": "easter.lakin@white.biz",
                "website": "http:\/\/fuga.com",
                "facebook": null,
                "twitter": null,
                "linkedin": null,
                "pinterest": null
            },
            {
                "id": 172,
                "user_id": "1576",
                "name": "Huel-Lowe",
                "logo": "files\/br\/1576\/b0dc6fa92a7248689768e255c5a2c512.png",
                "description": "Eum molestiae incidunt non tempora reiciendis eos repellat voluptatem. Blanditiis nostrum architecto est impedit quam et pariatur. Rerum est ullam excepturi et voluptate. Laudantium necessitatibus corrupti non repudiandae rem.",
                "country_code": "BR",
                "city_id": "4566",
                "address": null,
                "phone": "5608477603",
                "fax": "681-494-0898",
                "email": "saul17@schmidt.com",
                "website": "http:\/\/debitis.com",
                "facebook": null,
                "twitter": null,
                "linkedin": null,
                "pinterest": null
            },
            {
                "id": 64,
                "user_id": "2062",
                "name": "Kiehn, Crooks And Marquardt",
                "logo": "files\/ua\/2062\/192fa529a7504404658ed36e67b9825c.png",
                "description": "Repellat natus quia omnis molestias. Eveniet culpa doloremque vero repudiandae est expedita. Excepturi maxime voluptatibus doloremque vel est autem iusto.",
                "country_code": "UA",
                "city_id": "39903",
                "address": null,
                "phone": "+13659033263",
                "fax": "+16736909861",
                "email": "smorissette@mitchell.com",
                "website": "http:\/\/delectus.com",
                "facebook": null,
                "twitter": null,
                "linkedin": null,
                "pinterest": null
            }
        ],
        "links": {
            "first": "http:\/\/localhost\/api\/companies?page=1",
            "last": "http:\/\/localhost\/api\/companies?page=42",
            "prev": null,
            "next": "http:\/\/localhost\/api\/companies?page=2"
        },
        "meta": {
            "current_page": 1,
            "from": 1,
            "last_page": 42,
            "links": [
                {
                    "url": null,
                    "label": "&laquo; Previous",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/companies?page=1",
                    "label": "1",
                    "active": true
                },
                {
                    "url": "http:\/\/localhost\/api\/companies?page=2",
                    "label": "2",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/companies?page=3",
                    "label": "3",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/companies?page=4",
                    "label": "4",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/companies?page=5",
                    "label": "5",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/companies?page=6",
                    "label": "6",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/companies?page=7",
                    "label": "7",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/companies?page=8",
                    "label": "8",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/companies?page=9",
                    "label": "9",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/companies?page=10",
                    "label": "10",
                    "active": false
                },
                {
                    "url": null,
                    "label": "...",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/companies?page=41",
                    "label": "41",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/companies?page=42",
                    "label": "42",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/companies?page=2",
                    "label": "Next &raquo;",
                    "active": false
                }
            ],
            "path": "http:\/\/localhost\/api\/companies",
            "per_page": "16",
            "to": 16,
            "total": 663
        }
    }
}
```
<div id="execution-results-GETapi-companies" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-companies"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-companies"></code></pre>
</div>
<div id="execution-error-GETapi-companies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-companies"></code></pre>
</div>
<form id="form-GETapi-companies" data-method="GET" data-path="api/companies" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-companies', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-companies" onclick="tryItOut('GETapi-companies');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-companies" onclick="cancelTryOut('GETapi-companies');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-companies" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/companies</code></b>
</p>
<p>
<label id="auth-GETapi-companies" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-companies" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>sort</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="sort" data-endpoint="GETapi-companies" data-component="query"  hidden>
<br>
The companies order (Order by DESC with the given column. Use "-" as prefix to order by ASC). Possible values: created_at, name or ...
</p>
</form>


## Get company




> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/companies/voluptatem?embed=quibusdam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/companies/voluptatem"
);

let params = {
    "embed": "quibusdam",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'https://jobclass.bedigit.local/api/companies/voluptatem',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'quibusdam',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "success": false,
    "message": "Page Not Found."
}
```
<div id="execution-results-GETapi-companies--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-companies--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-companies--id-"></code></pre>
</div>
<div id="execution-error-GETapi-companies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-companies--id-"></code></pre>
</div>
<form id="form-GETapi-companies--id-" data-method="GET" data-path="api/companies/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-companies--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-companies--id-" onclick="tryItOut('GETapi-companies--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-companies--id-" onclick="cancelTryOut('GETapi-companies--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-companies--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/companies/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-companies--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-companies--id-" data-component="query"  hidden>
<br>
The Comma-separated list of the company relationships for Eager Loading. Possible values: user
</p>
</form>


## Store company

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://jobclass.bedigit.local/api/companies" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
    -d ''

```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/companies"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
};

let body = 

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'https://jobclass.bedigit.local/api/companies',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'json' => [
            'company' => [
                'name' => 'aut',
                'description' => 'commodi',
                [
                    'country_code' => 'US',
                    'name' => 'Foo Inc',
                    'logo' => null,
                    'description' => 'Nostrum quia est aut quas. Consequuntur ut quis odit voluptatem laborum quia.',
                    'city_id' => 20,
                    'address' => '5 rue de l\'Echelle',
                    'phone' => '+17656766467',
                    'fax' => '+80159266712',
                    'email' => 'contact@domain.tld',
                    'website' => 'https://domain.tld',
                    'facebook' => 'non',
                    'twitter' => 'accusantium',
                    'linkedin' => 'necessitatibus',
                    'pinterest' => 'est',
                ],
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "success": false,
    "message": "Unauthenticated or Token Expired, Please Login",
    "result": null,
    "error_code": 1
}
```
<div id="execution-results-POSTapi-companies" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-companies"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-companies"></code></pre>
</div>
<div id="execution-error-POSTapi-companies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-companies"></code></pre>
</div>
<form id="form-POSTapi-companies" data-method="POST" data-path="api/companies" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-companies', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-companies" onclick="tryItOut('POSTapi-companies');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-companies" onclick="cancelTryOut('POSTapi-companies');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-companies" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/companies</code></b>
</p>
<p>
<label id="auth-POSTapi-companies" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-companies" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<details>
<summary>
<b><code>company</code></b>&nbsp;&nbsp;<small>object</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>company[].name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company.0.name" data-endpoint="POSTapi-companies" data-component="body" required  hidden>
<br>
The company's name.
</p>
<p>
<b><code>company[].description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company.0.description" data-endpoint="POSTapi-companies" data-component="body" required  hidden>
<br>
The company's description.
</p>
<p>
<b><code>company[].country_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company.0.country_code" data-endpoint="POSTapi-companies" data-component="body" required  hidden>
<br>
The code of the company's country.
</p>
<p>
<b><code>company[].logo</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="company.0.logo" data-endpoint="POSTapi-companies" data-component="body"  hidden>
<br>
The company's logo.
</p>
<p>
<b><code>company[].city_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="company.0.city_id" data-endpoint="POSTapi-companies" data-component="body"  hidden>
<br>
The company city's ID.
</p>
<p>
<b><code>company[].address</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.address" data-endpoint="POSTapi-companies" data-component="body"  hidden>
<br>
The company's address.
</p>
<p>
<b><code>company[].phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.phone" data-endpoint="POSTapi-companies" data-component="body"  hidden>
<br>
The company's phone number.
</p>
<p>
<b><code>company[].fax</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.fax" data-endpoint="POSTapi-companies" data-component="body"  hidden>
<br>
The company's fax number.
</p>
<p>
<b><code>company[].email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.email" data-endpoint="POSTapi-companies" data-component="body"  hidden>
<br>
The company's email address.
</p>
<p>
<b><code>company[].website</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.website" data-endpoint="POSTapi-companies" data-component="body"  hidden>
<br>
The company's website URL.
</p>
<p>
<b><code>company[].facebook</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.facebook" data-endpoint="POSTapi-companies" data-component="body"  hidden>
<br>
The company's Facebook URL.
</p>
<p>
<b><code>company[].twitter</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.twitter" data-endpoint="POSTapi-companies" data-component="body"  hidden>
<br>
The company's Twitter URL.
</p>
<p>
<b><code>company[].linkedin</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.linkedin" data-endpoint="POSTapi-companies" data-component="body"  hidden>
<br>
The company's LinkedIn URL.
</p>
<p>
<b><code>company[].pinterest</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.pinterest" data-endpoint="POSTapi-companies" data-component="body"  hidden>
<br>
The company's Pinterest URL.
</p>
</details>
</p>

</form>


## Update company

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "https://jobclass.bedigit.local/api/companies/quibusdam" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
    -d ''

```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/companies/quibusdam"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
};

let body = 

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'https://jobclass.bedigit.local/api/companies/quibusdam',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'json' => [
            'company' => [
                'name' => 'quibusdam',
                'description' => 'enim',
                [
                    'country_code' => 'US',
                    'name' => 'Foo Inc',
                    'logo' => null,
                    'description' => 'Nostrum quia est aut quas. Consequuntur ut quis odit voluptatem laborum quia.',
                    'city_id' => 18,
                    'address' => '5 rue de l\'Echelle',
                    'phone' => '+17656766467',
                    'fax' => '+80159266712',
                    'email' => 'contact@domain.tld',
                    'website' => 'https://domain.tld',
                    'facebook' => 'in',
                    'twitter' => 'suscipit',
                    'linkedin' => 'eum',
                    'pinterest' => 'praesentium',
                ],
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "success": false,
    "message": "Page Not Found."
}
```
<div id="execution-results-PUTapi-companies--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-companies--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-companies--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-companies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-companies--id-"></code></pre>
</div>
<form id="form-PUTapi-companies--id-" data-method="PUT" data-path="api/companies/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-companies--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-companies--id-" onclick="tryItOut('PUTapi-companies--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-companies--id-" onclick="cancelTryOut('PUTapi-companies--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-companies--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/companies/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-companies--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-companies--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-companies--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<details>
<summary>
<b><code>company</code></b>&nbsp;&nbsp;<small>object</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>company[].name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company.0.name" data-endpoint="PUTapi-companies--id-" data-component="body" required  hidden>
<br>
The company's name.
</p>
<p>
<b><code>company[].description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company.0.description" data-endpoint="PUTapi-companies--id-" data-component="body" required  hidden>
<br>
The company's description.
</p>
<p>
<b><code>company[].country_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company.0.country_code" data-endpoint="PUTapi-companies--id-" data-component="body" required  hidden>
<br>
The code of the company's country.
</p>
<p>
<b><code>company[].logo</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="company.0.logo" data-endpoint="PUTapi-companies--id-" data-component="body"  hidden>
<br>
The company's logo.
</p>
<p>
<b><code>company[].city_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="company.0.city_id" data-endpoint="PUTapi-companies--id-" data-component="body"  hidden>
<br>
The company city's ID.
</p>
<p>
<b><code>company[].address</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.address" data-endpoint="PUTapi-companies--id-" data-component="body"  hidden>
<br>
The company's address.
</p>
<p>
<b><code>company[].phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.phone" data-endpoint="PUTapi-companies--id-" data-component="body"  hidden>
<br>
The company's phone number.
</p>
<p>
<b><code>company[].fax</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.fax" data-endpoint="PUTapi-companies--id-" data-component="body"  hidden>
<br>
The company's fax number.
</p>
<p>
<b><code>company[].email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.email" data-endpoint="PUTapi-companies--id-" data-component="body"  hidden>
<br>
The company's email address.
</p>
<p>
<b><code>company[].website</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.website" data-endpoint="PUTapi-companies--id-" data-component="body"  hidden>
<br>
The company's website URL.
</p>
<p>
<b><code>company[].facebook</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.facebook" data-endpoint="PUTapi-companies--id-" data-component="body"  hidden>
<br>
The company's Facebook URL.
</p>
<p>
<b><code>company[].twitter</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.twitter" data-endpoint="PUTapi-companies--id-" data-component="body"  hidden>
<br>
The company's Twitter URL.
</p>
<p>
<b><code>company[].linkedin</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.linkedin" data-endpoint="PUTapi-companies--id-" data-component="body"  hidden>
<br>
The company's LinkedIn URL.
</p>
<p>
<b><code>company[].pinterest</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company.0.pinterest" data-endpoint="PUTapi-companies--id-" data-component="body"  hidden>
<br>
The company's Pinterest URL.
</p>
</details>
</p>

</form>


## Delete company(ies)

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://jobclass.bedigit.local/api/companies/assumenda" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/companies/assumenda"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'https://jobclass.bedigit.local/api/companies/assumenda',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "success": false,
    "message": "Page Not Found."
}
```
<div id="execution-results-DELETEapi-companies--ids-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-companies--ids-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-companies--ids-"></code></pre>
</div>
<div id="execution-error-DELETEapi-companies--ids-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-companies--ids-"></code></pre>
</div>
<form id="form-DELETEapi-companies--ids-" data-method="DELETE" data-path="api/companies/{ids}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-companies--ids-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-companies--ids-" onclick="tryItOut('DELETEapi-companies--ids-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-companies--ids-" onclick="cancelTryOut('DELETEapi-companies--ids-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-companies--ids-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/companies/{ids}</code></b>
</p>
<p>
<label id="auth-DELETEapi-companies--ids-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-companies--ids-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>ids</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ids" data-endpoint="DELETEapi-companies--ids-" data-component="url" required  hidden>
<br>
The ID or comma-separated IDs list of company(ies).
</p>
</form>



