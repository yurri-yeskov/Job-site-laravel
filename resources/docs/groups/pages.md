# Pages


## List pages




> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/pages?excludedFromFooter=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/pages"
);

let params = {
    "excludedFromFooter": "",
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
    'https://jobclass.bedigit.local/api/pages',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'excludedFromFooter'=> '',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (429):

```json
{
    "success": false,
    "message": "Too Many Requests,Please Slow Down",
    "result": null,
    "error_code": 1
}
```
<div id="execution-results-GETapi-pages" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-pages"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pages"></code></pre>
</div>
<div id="execution-error-GETapi-pages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pages"></code></pre>
</div>
<form id="form-GETapi-pages" data-method="GET" data-path="api/pages" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-pages', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-pages" onclick="tryItOut('GETapi-pages');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-pages" onclick="cancelTryOut('GETapi-pages');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-pages" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/pages</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>excludedFromFooter</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="GETapi-pages" hidden><input type="radio" name="excludedFromFooter" value="1" data-endpoint="GETapi-pages" data-component="query" ><code>true</code></label>
<label data-endpoint="GETapi-pages" hidden><input type="radio" name="excludedFromFooter" value="0" data-endpoint="GETapi-pages" data-component="query" ><code>false</code></label>
<br>
Select or unselect pages that can list in footer.
</p>
</form>


## Get page




> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/pages/error" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/pages/error"
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
    'https://jobclass.bedigit.local/api/pages/error',
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


> Example response (429):

```json
{
    "success": false,
    "message": "Too Many Requests,Please Slow Down",
    "result": null,
    "error_code": 1
}
```
<div id="execution-results-GETapi-pages--slugOrId-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-pages--slugOrId-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pages--slugOrId-"></code></pre>
</div>
<div id="execution-error-GETapi-pages--slugOrId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pages--slugOrId-"></code></pre>
</div>
<form id="form-GETapi-pages--slugOrId-" data-method="GET" data-path="api/pages/{slugOrId}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-pages--slugOrId-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-pages--slugOrId-" onclick="tryItOut('GETapi-pages--slugOrId-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-pages--slugOrId-" onclick="cancelTryOut('GETapi-pages--slugOrId-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-pages--slugOrId-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/pages/{slugOrId}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>slugOrId</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="slugOrId" data-endpoint="GETapi-pages--slugOrId-" data-component="url" required  hidden>
<br>
The slug or ID of the page.
</p>
</form>



