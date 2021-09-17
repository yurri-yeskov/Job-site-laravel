# Payment Methods


## List payment methods




> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/paymentMethods?countryCode=US" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/paymentMethods"
);

let params = {
    "countryCode": "US",
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
    'https://jobclass.bedigit.local/api/paymentMethods',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'countryCode'=> 'US',
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
                "id": 5,
                "name": "offlinepayment",
                "display_name": "Offline Payment",
                "description": null,
                "has_ccbox": "0",
                "is_compatible_api": "1",
                "countries": "",
                "active": "1",
                "lft": "5",
                "rgt": "5",
                "depth": "1",
                "parent_id": "0"
            }
        ]
    }
}
```
<div id="execution-results-GETapi-paymentMethods" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-paymentMethods"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-paymentMethods"></code></pre>
</div>
<div id="execution-error-GETapi-paymentMethods" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-paymentMethods"></code></pre>
</div>
<form id="form-GETapi-paymentMethods" data-method="GET" data-path="api/paymentMethods" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-paymentMethods', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-paymentMethods" onclick="tryItOut('GETapi-paymentMethods');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-paymentMethods" onclick="cancelTryOut('GETapi-paymentMethods');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-paymentMethods" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/paymentMethods</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>countryCode</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="countryCode" data-endpoint="GETapi-paymentMethods" data-component="query"  hidden>
<br>
Country code. Select only the payment methods related to a country.
</p>
</form>


## Get payment method




> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/paymentMethods/7" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/paymentMethods/7"
);

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
    'https://jobclass.bedigit.local/api/paymentMethods/7',
    [
        'headers' => [
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
    "message": "Entry for Models\\PaymentMethod not found",
    "result": null,
    "error_code": 1
}
```
<div id="execution-results-GETapi-paymentMethods--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-paymentMethods--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-paymentMethods--id-"></code></pre>
</div>
<div id="execution-error-GETapi-paymentMethods--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-paymentMethods--id-"></code></pre>
</div>
<form id="form-GETapi-paymentMethods--id-" data-method="GET" data-path="api/paymentMethods/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-paymentMethods--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-paymentMethods--id-" onclick="tryItOut('GETapi-paymentMethods--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-paymentMethods--id-" onclick="cancelTryOut('GETapi-paymentMethods--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-paymentMethods--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/paymentMethods/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-paymentMethods--id-" data-component="url" required  hidden>
<br>
Can be the ID (int) or name (string) of the payment method.
</p>
</form>



