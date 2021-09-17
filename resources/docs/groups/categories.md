# Categories


## List categories




> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/categories?parentId=0&embed=facere" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/categories"
);

let params = {
    "parentId": "0",
    "embed": "facere",
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
    'https://jobclass.bedigit.local/api/categories',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'parentId'=> '0',
            'embed'=> 'facere',
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
                "id": 1,
                "parent_id": null,
                "name": "Engineering",
                "slug": "engineering",
                "description": "",
                "picture": "app\/default\/categories\/fa-folder-skin-default.png",
                "icon_class": null,
                "active": "1",
                "lft": "1",
                "rgt": "2",
                "depth": "0",
                "parentClosure": null
            },
            {
                "id": 2,
                "parent_id": null,
                "name": "Financial Services",
                "slug": "financial-services",
                "description": "",
                "picture": "app\/default\/categories\/fa-folder-skin-default.png",
                "icon_class": null,
                "active": "1",
                "lft": "3",
                "rgt": "4",
                "depth": "0",
                "parentClosure": null
            },
            {
                "id": 3,
                "parent_id": null,
                "name": "Banking",
                "slug": "banking",
                "description": "",
                "picture": "app\/default\/categories\/fa-folder-skin-default.png",
                "icon_class": null,
                "active": "1",
                "lft": "5",
                "rgt": "6",
                "depth": "0",
                "parentClosure": null
            },
            {
                "id": 4,
                "parent_id": null,
                "name": "Security & Safety",
                "slug": "security-safety",
                "description": "",
                "picture": "app\/default\/categories\/fa-folder-skin-default.png",
                "icon_class": null,
                "active": "1",
                "lft": "7",
                "rgt": "8",
                "depth": "0",
                "parentClosure": null
            },
            {
                "id": 5,
                "parent_id": null,
                "name": "Training",
                "slug": "training",
                "description": "",
                "picture": "app\/default\/categories\/fa-folder-skin-default.png",
                "icon_class": null,
                "active": "1",
                "lft": "9",
                "rgt": "10",
                "depth": "0",
                "parentClosure": null
            },
            {
                "id": 6,
                "parent_id": null,
                "name": "Public Service",
                "slug": "public-service",
                "description": "",
                "picture": "app\/default\/categories\/fa-folder-skin-default.png",
                "icon_class": null,
                "active": "1",
                "lft": "11",
                "rgt": "12",
                "depth": "0",
                "parentClosure": null
            },
            {
                "id": 7,
                "parent_id": null,
                "name": "Real Estate",
                "slug": "real-estate",
                "description": "",
                "picture": "app\/default\/categories\/fa-folder-skin-default.png",
                "icon_class": null,
                "active": "1",
                "lft": "13",
                "rgt": "14",
                "depth": "0",
                "parentClosure": null
            },
            {
                "id": 8,
                "parent_id": null,
                "name": "Independent & Freelance",
                "slug": "independent-freelance",
                "description": "",
                "picture": "app\/default\/categories\/fa-folder-skin-default.png",
                "icon_class": null,
                "active": "1",
                "lft": "15",
                "rgt": "16",
                "depth": "0",
                "parentClosure": null
            },
            {
                "id": 9,
                "parent_id": null,
                "name": "IT & Telecoms",
                "slug": "it-telecoms",
                "description": "",
                "picture": "app\/default\/categories\/fa-folder-skin-default.png",
                "icon_class": null,
                "active": "1",
                "lft": "17",
                "rgt": "18",
                "depth": "0",
                "parentClosure": null
            },
            {
                "id": 10,
                "parent_id": null,
                "name": "Marketing & Communication",
                "slug": "marketing-communication",
                "description": "",
                "picture": "app\/default\/categories\/fa-folder-skin-default.png",
                "icon_class": null,
                "active": "1",
                "lft": "19",
                "rgt": "20",
                "depth": "0",
                "parentClosure": null
            },
            {
                "id": 11,
                "parent_id": null,
                "name": "Babysitting & Nanny Work",
                "slug": "babysitting-nanny-work",
                "description": "",
                "picture": "app\/default\/categories\/fa-folder-skin-default.png",
                "icon_class": null,
                "active": "1",
                "lft": "21",
                "rgt": "22",
                "depth": "0",
                "parentClosure": null
            },
            {
                "id": 12,
                "parent_id": null,
                "name": "Human Resources",
                "slug": "human-resources",
                "description": "",
                "picture": "app\/default\/categories\/fa-folder-skin-default.png",
                "icon_class": null,
                "active": "1",
                "lft": "23",
                "rgt": "24",
                "depth": "0",
                "parentClosure": null
            },
            {
                "id": 13,
                "parent_id": null,
                "name": "Medical & Healthcare",
                "slug": "medical-healthcare",
                "description": "",
                "picture": "app\/default\/categories\/fa-folder-skin-default.png",
                "icon_class": null,
                "active": "1",
                "lft": "25",
                "rgt": "26",
                "depth": "0",
                "parentClosure": null
            },
            {
                "id": 14,
                "parent_id": null,
                "name": "Tourism & Restaurants",
                "slug": "tourism-restaurants",
                "description": "",
                "picture": "app\/default\/categories\/fa-folder-skin-default.png",
                "icon_class": null,
                "active": "1",
                "lft": "27",
                "rgt": "28",
                "depth": "0",
                "parentClosure": null
            },
            {
                "id": 15,
                "parent_id": null,
                "name": "Transportation & Logistics",
                "slug": "transportation-logistics",
                "description": "",
                "picture": "app\/default\/categories\/fa-folder-skin-default.png",
                "icon_class": null,
                "active": "1",
                "lft": "29",
                "rgt": "30",
                "depth": "0",
                "parentClosure": null
            }
        ]
    }
}
```
<div id="execution-results-GETapi-categories" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-categories"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories"></code></pre>
</div>
<div id="execution-error-GETapi-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories"></code></pre>
</div>
<form id="form-GETapi-categories" data-method="GET" data-path="api/categories" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-categories', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-categories" onclick="tryItOut('GETapi-categories');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-categories" onclick="cancelTryOut('GETapi-categories');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-categories" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/categories</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>parentId</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="parentId" data-endpoint="GETapi-categories" data-component="query"  hidden>
<br>
The ID of the parent category of the sub categories to retrieve.
</p>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-categories" data-component="query"  hidden>
<br>
The Comma-separated list of the category relationships for Eager Loading. Possible values: parent,children
</p>
</form>


## Get category


Get category by it's unique slug or ID.

> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/categories/vitae?parentCatSlug=car" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/categories/vitae"
);

let params = {
    "parentCatSlug": "car",
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
    'https://jobclass.bedigit.local/api/categories/vitae',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'parentCatSlug'=> 'car',
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
    "result": []
}
```
<div id="execution-results-GETapi-categories--slugOrId-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-categories--slugOrId-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories--slugOrId-"></code></pre>
</div>
<div id="execution-error-GETapi-categories--slugOrId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories--slugOrId-"></code></pre>
</div>
<form id="form-GETapi-categories--slugOrId-" data-method="GET" data-path="api/categories/{slugOrId}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-categories--slugOrId-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-categories--slugOrId-" onclick="tryItOut('GETapi-categories--slugOrId-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-categories--slugOrId-" onclick="cancelTryOut('GETapi-categories--slugOrId-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-categories--slugOrId-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/categories/{slugOrId}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>slugOrId</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="slugOrId" data-endpoint="GETapi-categories--slugOrId-" data-component="url"  hidden>
<br>
The slug or ID of the category.
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>parentCatSlug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="parentCatSlug" data-endpoint="GETapi-categories--slugOrId-" data-component="query"  hidden>
<br>
The slug of the parent category to retrieve used when category's slug provided instead of ID.
</p>
</form>



