# Countries


## List countries




> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/countries?embed=nemo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/countries"
);

let params = {
    "embed": "nemo",
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
    'https://jobclass.bedigit.local/api/countries',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'nemo',
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
                "code": "AD",
                "name": "Andorra",
                "capital": "Andorra la Vella",
                "continent_code": "EU",
                "tld": ".ad",
                "currency_code": "EUR",
                "phone": "376",
                "languages": "ca",
                "time_zone": null,
                "date_format": null,
                "datetime_format": null,
                "background_image": "app\/logo\/header-604fb9f86f6d3.jpg",
                "admin_type": "0",
                "admin_field_active": "0",
                "active": "1"
            },
            {
                "code": "AE",
                "name": "United Arab Emirates",
                "capital": "Abu Dhabi",
                "continent_code": "AS",
                "tld": ".ae",
                "currency_code": "AED",
                "phone": "971",
                "languages": "ar-AE,fa,en,hi,ur",
                "time_zone": null,
                "date_format": null,
                "datetime_format": null,
                "background_image": "app\/logo\/header-604fb9f8704de.jpg",
                "admin_type": "0",
                "admin_field_active": "0",
                "active": "1"
            },
            {
                "code": "AF",
                "name": "Afghanistan",
                "capital": "Kabul",
                "continent_code": "AS",
                "tld": ".af",
                "currency_code": "AFN",
                "phone": "93",
                "languages": "fa-AF,ps,uz-AF,tk",
                "time_zone": null,
                "date_format": null,
                "datetime_format": null,
                "background_image": "app\/logo\/header-604fb9f87113d.jpg",
                "admin_type": "0",
                "admin_field_active": "0",
                "active": "1"
            },
            {
                "code": "AG",
                "name": "Antigua and Barbuda",
                "capital": "St. John's",
                "continent_code": "NA",
                "tld": ".ag",
                "currency_code": "XCD",
                "phone": "+1-268",
                "languages": "en-AG",
                "time_zone": null,
                "date_format": null,
                "datetime_format": null,
                "background_image": "app\/logo\/header-604fb9f871ccb.jpg",
                "admin_type": "0",
                "admin_field_active": "0",
                "active": "1"
            },
            {
                "code": "AI",
                "name": "Anguilla",
                "capital": "The Valley",
                "continent_code": "NA",
                "tld": ".ai",
                "currency_code": "XCD",
                "phone": "+1-264",
                "languages": "en-AI",
                "time_zone": null,
                "date_format": null,
                "datetime_format": null,
                "background_image": "app\/logo\/header-604fb9f872617.jpg",
                "admin_type": "0",
                "admin_field_active": "0",
                "active": "1"
            },
            {
                "code": "AL",
                "name": "Albania",
                "capital": "Tirana",
                "continent_code": "EU",
                "tld": ".al",
                "currency_code": "ALL",
                "phone": "355",
                "languages": "sq,el",
                "time_zone": null,
                "date_format": null,
                "datetime_format": null,
                "background_image": "app\/logo\/header-604fb9f8732b0.jpg",
                "admin_type": "0",
                "admin_field_active": "0",
                "active": "1"
            },
            {
                "code": "AM",
                "name": "Armenia",
                "capital": "Yerevan",
                "continent_code": "AS",
                "tld": ".am",
                "currency_code": "AMD",
                "phone": "374",
                "languages": "hy",
                "time_zone": null,
                "date_format": null,
                "datetime_format": null,
                "background_image": "app\/logo\/header-604fb9f873984.jpg",
                "admin_type": "0",
                "admin_field_active": "0",
                "active": "1"
            },
            {
                "code": "AN",
                "name": "Netherlands Antilles",
                "capital": "Willemstad",
                "continent_code": "NA",
                "tld": ".an",
                "currency_code": "ANG",
                "phone": "599",
                "languages": "nl-AN,en,es",
                "time_zone": null,
                "date_format": null,
                "datetime_format": null,
                "background_image": "app\/logo\/header-604fb9f8743e7.jpg",
                "admin_type": "0",
                "admin_field_active": "0",
                "active": "1"
            },
            {
                "code": "AO",
                "name": "Angola",
                "capital": "Luanda",
                "continent_code": "AF",
                "tld": ".ao",
                "currency_code": "AOA",
                "phone": "244",
                "languages": "pt-AO",
                "time_zone": null,
                "date_format": null,
                "datetime_format": null,
                "background_image": "app\/logo\/header-604fb9f874da1.jpg",
                "admin_type": "0",
                "admin_field_active": "0",
                "active": "1"
            },
            {
                "code": "AR",
                "name": "Argentina",
                "capital": "Buenos Aires",
                "continent_code": "SA",
                "tld": ".ar",
                "currency_code": "ARS",
                "phone": "54",
                "languages": "es-AR,en,it,de,fr,gn",
                "time_zone": "America\/Argentina\/Buenos_Aires",
                "date_format": null,
                "datetime_format": null,
                "background_image": "app\/logo\/header-604fb9f876081.jpg",
                "admin_type": "0",
                "admin_field_active": "0",
                "active": "1"
            },
            {
                "code": "AS",
                "name": "American Samoa",
                "capital": "Pago Pago",
                "continent_code": "OC",
                "tld": ".as",
                "currency_code": "USD",
                "phone": "+1-684",
                "languages": "en-AS,sm,to",
                "time_zone": null,
                "date_format": null,
                "datetime_format": null,
                "background_image": "app\/logo\/header-604fb9f8767e0.jpg",
                "admin_type": "0",
                "admin_field_active": "0",
                "active": "1"
            },
            {
                "code": "AT",
                "name": "Austria",
                "capital": "Vienna",
                "continent_code": "EU",
                "tld": ".at",
                "currency_code": "EUR",
                "phone": "43",
                "languages": "de-AT,hr,hu,sl",
                "time_zone": null,
                "date_format": null,
                "datetime_format": null,
                "background_image": "app\/logo\/header-604fb9f877151.jpg",
                "admin_type": "0",
                "admin_field_active": "0",
                "active": "1"
            },
            {
                "code": "AU",
                "name": "Australia",
                "capital": "Canberra",
                "continent_code": "OC",
                "tld": ".au",
                "currency_code": "AUD",
                "phone": "61",
                "languages": "en-AU",
                "time_zone": null,
                "date_format": null,
                "datetime_format": null,
                "background_image": "app\/logo\/header-604fb9f877d0b.jpg",
                "admin_type": "0",
                "admin_field_active": "0",
                "active": "1"
            },
            {
                "code": "AW",
                "name": "Aruba",
                "capital": "Oranjestad",
                "continent_code": "NA",
                "tld": ".aw",
                "currency_code": "AWG",
                "phone": "297",
                "languages": "nl-AW,es,en",
                "time_zone": null,
                "date_format": null,
                "datetime_format": null,
                "background_image": "app\/logo\/header-604fb9f878436.jpg",
                "admin_type": "0",
                "admin_field_active": "0",
                "active": "1"
            },
            {
                "code": "AX",
                "name": "Åland Islands",
                "capital": "Mariehamn",
                "continent_code": "EU",
                "tld": ".ax",
                "currency_code": "EUR",
                "phone": "+358-18",
                "languages": "sv-AX",
                "time_zone": null,
                "date_format": null,
                "datetime_format": null,
                "background_image": "app\/logo\/header-604fb9f879271.jpg",
                "admin_type": "0",
                "admin_field_active": "0",
                "active": "1"
            },
            {
                "code": "AZ",
                "name": "Azerbaijan",
                "capital": "Baku",
                "continent_code": "AS",
                "tld": ".az",
                "currency_code": "AZN",
                "phone": "994",
                "languages": "az,ru,hy",
                "time_zone": null,
                "date_format": null,
                "datetime_format": null,
                "background_image": "app\/logo\/header-604fb9f879f2e.jpg",
                "admin_type": "0",
                "admin_field_active": "0",
                "active": "1"
            }
        ],
        "links": {
            "first": "http:\/\/localhost\/api\/countries?page=1",
            "last": "http:\/\/localhost\/api\/countries?page=16",
            "prev": null,
            "next": "http:\/\/localhost\/api\/countries?page=2"
        },
        "meta": {
            "current_page": 1,
            "from": 1,
            "last_page": 16,
            "links": [
                {
                    "url": null,
                    "label": "&laquo; Previous",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries?page=1",
                    "label": "1",
                    "active": true
                },
                {
                    "url": "http:\/\/localhost\/api\/countries?page=2",
                    "label": "2",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries?page=3",
                    "label": "3",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries?page=4",
                    "label": "4",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries?page=5",
                    "label": "5",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries?page=6",
                    "label": "6",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries?page=7",
                    "label": "7",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries?page=8",
                    "label": "8",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries?page=9",
                    "label": "9",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries?page=10",
                    "label": "10",
                    "active": false
                },
                {
                    "url": null,
                    "label": "...",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries?page=15",
                    "label": "15",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries?page=16",
                    "label": "16",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries?page=2",
                    "label": "Next &raquo;",
                    "active": false
                }
            ],
            "path": "http:\/\/localhost\/api\/countries",
            "per_page": "16",
            "to": 16,
            "total": 251
        }
    }
}
```
<div id="execution-results-GETapi-countries" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-countries"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-countries"></code></pre>
</div>
<div id="execution-error-GETapi-countries" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-countries"></code></pre>
</div>
<form id="form-GETapi-countries" data-method="GET" data-path="api/countries" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-countries', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-countries" onclick="tryItOut('GETapi-countries');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-countries" onclick="cancelTryOut('GETapi-countries');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-countries" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/countries</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-countries" data-component="query"  hidden>
<br>
Comma-separated list of the country relationships for Eager Loading. Possible values: currency
</p>
</form>


## Get country




> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/countries/DE?embed=quisquam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/countries/DE"
);

let params = {
    "embed": "quisquam",
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
    'https://jobclass.bedigit.local/api/countries/DE',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'quisquam',
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
        "code": "DE",
        "name": "Germany",
        "capital": "Berlin",
        "continent_code": "EU",
        "tld": ".de",
        "currency_code": "EUR",
        "phone": "49",
        "languages": "de",
        "time_zone": "Europe\/Berlin",
        "date_format": null,
        "datetime_format": null,
        "background_image": "app\/logo\/header-604fb9f892de3.jpg",
        "admin_type": "0",
        "admin_field_active": "0",
        "active": "1"
    }
}
```
<div id="execution-results-GETapi-countries--code-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-countries--code-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-countries--code-"></code></pre>
</div>
<div id="execution-error-GETapi-countries--code-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-countries--code-"></code></pre>
</div>
<form id="form-GETapi-countries--code-" data-method="GET" data-path="api/countries/{code}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-countries--code-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-countries--code-" onclick="tryItOut('GETapi-countries--code-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-countries--code-" onclick="cancelTryOut('GETapi-countries--code-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-countries--code-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/countries/{code}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>code</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="code" data-endpoint="GETapi-countries--code-" data-component="url"  hidden>
<br>
The country's ISO 3166-1 code.
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-countries--code-" data-component="query"  hidden>
<br>
Comma-separated list of the country relationships for Eager Loading. Possible values: currency
</p>
</form>


## List admin. divisions (1)




> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/countries/US/subAdmins1?embed=ducimus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/countries/US/subAdmins1"
);

let params = {
    "embed": "ducimus",
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
    'https://jobclass.bedigit.local/api/countries/US/subAdmins1',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'ducimus',
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
                "code": "US.AR",
                "country_code": "US",
                "name": "Arkansas",
                "active": "1"
            },
            {
                "code": "US.DC",
                "country_code": "US",
                "name": "Washington, D.C.",
                "active": "1"
            },
            {
                "code": "US.DE",
                "country_code": "US",
                "name": "Delaware",
                "active": "1"
            },
            {
                "code": "US.FL",
                "country_code": "US",
                "name": "Florida",
                "active": "1"
            },
            {
                "code": "US.GA",
                "country_code": "US",
                "name": "Georgia",
                "active": "1"
            },
            {
                "code": "US.KS",
                "country_code": "US",
                "name": "Kansas",
                "active": "1"
            },
            {
                "code": "US.LA",
                "country_code": "US",
                "name": "Louisiana",
                "active": "1"
            },
            {
                "code": "US.MD",
                "country_code": "US",
                "name": "Maryland",
                "active": "1"
            },
            {
                "code": "US.MO",
                "country_code": "US",
                "name": "Missouri",
                "active": "1"
            },
            {
                "code": "US.MS",
                "country_code": "US",
                "name": "Mississippi",
                "active": "1"
            },
            {
                "code": "US.NC",
                "country_code": "US",
                "name": "North Carolina",
                "active": "1"
            },
            {
                "code": "US.OK",
                "country_code": "US",
                "name": "Oklahoma",
                "active": "1"
            },
            {
                "code": "US.SC",
                "country_code": "US",
                "name": "South Carolina",
                "active": "1"
            },
            {
                "code": "US.TN",
                "country_code": "US",
                "name": "Tennessee",
                "active": "1"
            },
            {
                "code": "US.TX",
                "country_code": "US",
                "name": "Texas",
                "active": "1"
            },
            {
                "code": "US.WV",
                "country_code": "US",
                "name": "West Virginia",
                "active": "1"
            }
        ],
        "links": {
            "first": "http:\/\/localhost\/api\/countries\/US\/subAdmins1?page=1",
            "last": "http:\/\/localhost\/api\/countries\/US\/subAdmins1?page=4",
            "prev": null,
            "next": "http:\/\/localhost\/api\/countries\/US\/subAdmins1?page=2"
        },
        "meta": {
            "current_page": 1,
            "from": 1,
            "last_page": 4,
            "links": [
                {
                    "url": null,
                    "label": "&laquo; Previous",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins1?page=1",
                    "label": "1",
                    "active": true
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins1?page=2",
                    "label": "2",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins1?page=3",
                    "label": "3",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins1?page=4",
                    "label": "4",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins1?page=2",
                    "label": "Next &raquo;",
                    "active": false
                }
            ],
            "path": "http:\/\/localhost\/api\/countries\/US\/subAdmins1",
            "per_page": "16",
            "to": 16,
            "total": 51
        }
    }
}
```
<div id="execution-results-GETapi-countries--countryCode--subAdmins1" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-countries--countryCode--subAdmins1"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-countries--countryCode--subAdmins1"></code></pre>
</div>
<div id="execution-error-GETapi-countries--countryCode--subAdmins1" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-countries--countryCode--subAdmins1"></code></pre>
</div>
<form id="form-GETapi-countries--countryCode--subAdmins1" data-method="GET" data-path="api/countries/{countryCode}/subAdmins1" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-countries--countryCode--subAdmins1', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-countries--countryCode--subAdmins1" onclick="tryItOut('GETapi-countries--countryCode--subAdmins1');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-countries--countryCode--subAdmins1" onclick="cancelTryOut('GETapi-countries--countryCode--subAdmins1');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-countries--countryCode--subAdmins1" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/countries/{countryCode}/subAdmins1</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>countryCode</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="countryCode" data-endpoint="GETapi-countries--countryCode--subAdmins1" data-component="url"  hidden>
<br>
The country code of the country of the cities to retrieve.
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-countries--countryCode--subAdmins1" data-component="query"  hidden>
<br>
Comma-separated list of the administrative division (1) relationships for Eager Loading. Possible values: country
</p>
</form>


## List admin. divisions (2)




> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/countries/US/subAdmins2?embed=perspiciatis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/countries/US/subAdmins2"
);

let params = {
    "embed": "perspiciatis",
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
    'https://jobclass.bedigit.local/api/countries/US/subAdmins2',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'perspiciatis',
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
                "code": "US.AL.113",
                "country_code": "US",
                "subadmin1_code": "US.AL",
                "name": "Russell County",
                "active": "1"
            },
            {
                "code": "US.GA.183",
                "country_code": "US",
                "subadmin1_code": "US.GA",
                "name": "Long County",
                "active": "1"
            },
            {
                "code": "US.KY.015",
                "country_code": "US",
                "subadmin1_code": "US.KY",
                "name": "Boone County",
                "active": "1"
            },
            {
                "code": "US.KY.205",
                "country_code": "US",
                "subadmin1_code": "US.KY",
                "name": "Rowan County",
                "active": "1"
            },
            {
                "code": "US.AL.007",
                "country_code": "US",
                "subadmin1_code": "US.AL",
                "name": "Bibb County",
                "active": "1"
            },
            {
                "code": "US.TN.013",
                "country_code": "US",
                "subadmin1_code": "US.TN",
                "name": "Campbell County",
                "active": "1"
            },
            {
                "code": "US.AL.009",
                "country_code": "US",
                "subadmin1_code": "US.AL",
                "name": "Blount County",
                "active": "1"
            },
            {
                "code": "US.AL.011",
                "country_code": "US",
                "subadmin1_code": "US.AL",
                "name": "Bullock County",
                "active": "1"
            },
            {
                "code": "US.AL.013",
                "country_code": "US",
                "subadmin1_code": "US.AL",
                "name": "Butler County",
                "active": "1"
            },
            {
                "code": "US.AL.015",
                "country_code": "US",
                "subadmin1_code": "US.AL",
                "name": "Calhoun County",
                "active": "1"
            },
            {
                "code": "US.AL.017",
                "country_code": "US",
                "subadmin1_code": "US.AL",
                "name": "Chambers County",
                "active": "1"
            },
            {
                "code": "US.AL.019",
                "country_code": "US",
                "subadmin1_code": "US.AL",
                "name": "Cherokee County",
                "active": "1"
            },
            {
                "code": "US.AL.021",
                "country_code": "US",
                "subadmin1_code": "US.AL",
                "name": "Chilton County",
                "active": "1"
            },
            {
                "code": "US.AL.023",
                "country_code": "US",
                "subadmin1_code": "US.AL",
                "name": "Choctaw County",
                "active": "1"
            },
            {
                "code": "US.AL.025",
                "country_code": "US",
                "subadmin1_code": "US.AL",
                "name": "Clarke County",
                "active": "1"
            },
            {
                "code": "US.AL.027",
                "country_code": "US",
                "subadmin1_code": "US.AL",
                "name": "Clay County",
                "active": "1"
            }
        ],
        "links": {
            "first": "http:\/\/localhost\/api\/countries\/US\/subAdmins2?page=1",
            "last": "http:\/\/localhost\/api\/countries\/US\/subAdmins2?page=197",
            "prev": null,
            "next": "http:\/\/localhost\/api\/countries\/US\/subAdmins2?page=2"
        },
        "meta": {
            "current_page": 1,
            "from": 1,
            "last_page": 197,
            "links": [
                {
                    "url": null,
                    "label": "&laquo; Previous",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins2?page=1",
                    "label": "1",
                    "active": true
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins2?page=2",
                    "label": "2",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins2?page=3",
                    "label": "3",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins2?page=4",
                    "label": "4",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins2?page=5",
                    "label": "5",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins2?page=6",
                    "label": "6",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins2?page=7",
                    "label": "7",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins2?page=8",
                    "label": "8",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins2?page=9",
                    "label": "9",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins2?page=10",
                    "label": "10",
                    "active": false
                },
                {
                    "url": null,
                    "label": "...",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins2?page=196",
                    "label": "196",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins2?page=197",
                    "label": "197",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/subAdmins2?page=2",
                    "label": "Next &raquo;",
                    "active": false
                }
            ],
            "path": "http:\/\/localhost\/api\/countries\/US\/subAdmins2",
            "per_page": "16",
            "to": 16,
            "total": 3142
        }
    }
}
```
<div id="execution-results-GETapi-countries--countryCode--subAdmins2" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-countries--countryCode--subAdmins2"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-countries--countryCode--subAdmins2"></code></pre>
</div>
<div id="execution-error-GETapi-countries--countryCode--subAdmins2" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-countries--countryCode--subAdmins2"></code></pre>
</div>
<form id="form-GETapi-countries--countryCode--subAdmins2" data-method="GET" data-path="api/countries/{countryCode}/subAdmins2" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-countries--countryCode--subAdmins2', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-countries--countryCode--subAdmins2" onclick="tryItOut('GETapi-countries--countryCode--subAdmins2');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-countries--countryCode--subAdmins2" onclick="cancelTryOut('GETapi-countries--countryCode--subAdmins2');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-countries--countryCode--subAdmins2" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/countries/{countryCode}/subAdmins2</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>countryCode</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="countryCode" data-endpoint="GETapi-countries--countryCode--subAdmins2" data-component="url"  hidden>
<br>
The country code of the country of the cities to retrieve.
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-countries--countryCode--subAdmins2" data-component="query"  hidden>
<br>
Comma-separated list of the administrative division (2) relationships for Eager Loading. Possible values: country,subAdmin1
</p>
</form>


## List cities




> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/countries/US/cities?embed=autem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/countries/US/cities"
);

let params = {
    "embed": "autem",
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
    'https://jobclass.bedigit.local/api/countries/US/cities',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'autem',
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
                "id": 42321,
                "country_code": "US",
                "name": "Bay Minette",
                "latitude": "30.88",
                "longitude": "-87.77",
                "subadmin1_code": "US.AL",
                "subadmin2_code": "US.AL.003",
                "population": "9118",
                "time_zone": "America\/Chicago",
                "active": "1"
            },
            {
                "id": 42322,
                "country_code": "US",
                "name": "Edna",
                "latitude": "28.98",
                "longitude": "-96.65",
                "subadmin1_code": "US.TX",
                "subadmin2_code": "US.TX.239",
                "population": "5792",
                "time_zone": "America\/Chicago",
                "active": "1"
            },
            {
                "id": 42323,
                "country_code": "US",
                "name": "Henderson",
                "latitude": "32.15",
                "longitude": "-94.8",
                "subadmin1_code": "US.TX",
                "subadmin2_code": "US.TX.401",
                "population": "13529",
                "time_zone": "America\/Chicago",
                "active": "1"
            },
            {
                "id": 42324,
                "country_code": "US",
                "name": "Fort Hunt",
                "latitude": "38.73",
                "longitude": "-77.06",
                "subadmin1_code": "US.VA",
                "subadmin2_code": "US.VA.059",
                "population": "16045",
                "time_zone": "America\/New_York",
                "active": "1"
            },
            {
                "id": 42325,
                "country_code": "US",
                "name": "Trinity",
                "latitude": "28.18",
                "longitude": "-82.68",
                "subadmin1_code": "US.FL",
                "subadmin2_code": "US.FL.101",
                "population": "10907",
                "time_zone": "America\/New_York",
                "active": "1"
            },
            {
                "id": 42326,
                "country_code": "US",
                "name": "Villas",
                "latitude": "26.55",
                "longitude": "-81.87",
                "subadmin1_code": "US.FL",
                "subadmin2_code": "US.FL.071",
                "population": "11569",
                "time_zone": "America\/New_York",
                "active": "1"
            },
            {
                "id": 42327,
                "country_code": "US",
                "name": "Bessemer",
                "latitude": "33.4",
                "longitude": "-86.95",
                "subadmin1_code": "US.AL",
                "subadmin2_code": "US.AL.073",
                "population": "26730",
                "time_zone": "America\/Chicago",
                "active": "1"
            },
            {
                "id": 42328,
                "country_code": "US",
                "name": "Paducah",
                "latitude": "37.08",
                "longitude": "-88.6",
                "subadmin1_code": "US.KY",
                "subadmin2_code": "US.KY.145",
                "population": "24864",
                "time_zone": "America\/Chicago",
                "active": "1"
            },
            {
                "id": 42329,
                "country_code": "US",
                "name": "Red Chute",
                "latitude": "32.56",
                "longitude": "-93.61",
                "subadmin1_code": "US.LA",
                "subadmin2_code": "US.LA.015",
                "population": "6261",
                "time_zone": "America\/Chicago",
                "active": "1"
            },
            {
                "id": 42330,
                "country_code": "US",
                "name": "Jessup",
                "latitude": "39.15",
                "longitude": "-76.78",
                "subadmin1_code": "US.MD",
                "subadmin2_code": "US.MD.003",
                "population": "7137",
                "time_zone": "America\/New_York",
                "active": "1"
            },
            {
                "id": 42331,
                "country_code": "US",
                "name": "Birmingham",
                "latitude": "33.52",
                "longitude": "-86.8",
                "subadmin1_code": "US.AL",
                "subadmin2_code": "US.AL.073",
                "population": "212461",
                "time_zone": "America\/Chicago",
                "active": "1"
            },
            {
                "id": 42332,
                "country_code": "US",
                "name": "Delhi Hills",
                "latitude": "39.09",
                "longitude": "-84.61",
                "subadmin1_code": "US.OH",
                "subadmin2_code": "US.OH.061",
                "population": "5259",
                "time_zone": "America\/New_York",
                "active": "1"
            },
            {
                "id": 42333,
                "country_code": "US",
                "name": "Turpin Hills",
                "latitude": "39.11",
                "longitude": "-84.38",
                "subadmin1_code": "US.OH",
                "subadmin2_code": "US.OH.061",
                "population": "5099",
                "time_zone": "America\/New_York",
                "active": "1"
            },
            {
                "id": 42334,
                "country_code": "US",
                "name": "Lugoff",
                "latitude": "34.23",
                "longitude": "-80.69",
                "subadmin1_code": "US.SC",
                "subadmin2_code": "US.SC.055",
                "population": "7434",
                "time_zone": "America\/New_York",
                "active": "1"
            },
            {
                "id": 42335,
                "country_code": "US",
                "name": "Buda",
                "latitude": "30.09",
                "longitude": "-97.84",
                "subadmin1_code": "US.TX",
                "subadmin2_code": "US.TX.209",
                "population": "13705",
                "time_zone": "America\/Chicago",
                "active": "1"
            },
            {
                "id": 42336,
                "country_code": "US",
                "name": "Boaz",
                "latitude": "34.2",
                "longitude": "-86.17",
                "subadmin1_code": "US.AL",
                "subadmin2_code": "US.AL.095",
                "population": "9688",
                "time_zone": "America\/Chicago",
                "active": "1"
            }
        ],
        "links": {
            "first": "http:\/\/localhost\/api\/countries\/US\/cities?page=1",
            "last": "http:\/\/localhost\/api\/countries\/US\/cities?page=450",
            "prev": null,
            "next": "http:\/\/localhost\/api\/countries\/US\/cities?page=2"
        },
        "meta": {
            "current_page": 1,
            "from": 1,
            "last_page": 450,
            "links": [
                {
                    "url": null,
                    "label": "&laquo; Previous",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/cities?page=1",
                    "label": "1",
                    "active": true
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/cities?page=2",
                    "label": "2",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/cities?page=3",
                    "label": "3",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/cities?page=4",
                    "label": "4",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/cities?page=5",
                    "label": "5",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/cities?page=6",
                    "label": "6",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/cities?page=7",
                    "label": "7",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/cities?page=8",
                    "label": "8",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/cities?page=9",
                    "label": "9",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/cities?page=10",
                    "label": "10",
                    "active": false
                },
                {
                    "url": null,
                    "label": "...",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/cities?page=449",
                    "label": "449",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/cities?page=450",
                    "label": "450",
                    "active": false
                },
                {
                    "url": "http:\/\/localhost\/api\/countries\/US\/cities?page=2",
                    "label": "Next &raquo;",
                    "active": false
                }
            ],
            "path": "http:\/\/localhost\/api\/countries\/US\/cities",
            "per_page": "16",
            "to": 16,
            "total": 7197
        }
    }
}
```
<div id="execution-results-GETapi-countries--countryCode--cities" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-countries--countryCode--cities"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-countries--countryCode--cities"></code></pre>
</div>
<div id="execution-error-GETapi-countries--countryCode--cities" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-countries--countryCode--cities"></code></pre>
</div>
<form id="form-GETapi-countries--countryCode--cities" data-method="GET" data-path="api/countries/{countryCode}/cities" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-countries--countryCode--cities', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-countries--countryCode--cities" onclick="tryItOut('GETapi-countries--countryCode--cities');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-countries--countryCode--cities" onclick="cancelTryOut('GETapi-countries--countryCode--cities');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-countries--countryCode--cities" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/countries/{countryCode}/cities</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>countryCode</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="countryCode" data-endpoint="GETapi-countries--countryCode--cities" data-component="url"  hidden>
<br>
The country code of the country of the cities to retrieve.
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-countries--countryCode--cities" data-component="query"  hidden>
<br>
Comma-separated list of the city relationships for Eager Loading. Possible values: country,subAdmin1,subAdmin2
</p>
</form>


## Get admin. division (1)




> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/subAdmins1/praesentium?embed=nemo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/subAdmins1/praesentium"
);

let params = {
    "embed": "nemo",
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
    'https://jobclass.bedigit.local/api/subAdmins1/praesentium',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'nemo',
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
    "message": "Entry for Models\\SubAdmin1 not found",
    "result": null,
    "error_code": 1
}
```
<div id="execution-results-GETapi-subAdmins1--code-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-subAdmins1--code-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-subAdmins1--code-"></code></pre>
</div>
<div id="execution-error-GETapi-subAdmins1--code-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-subAdmins1--code-"></code></pre>
</div>
<form id="form-GETapi-subAdmins1--code-" data-method="GET" data-path="api/subAdmins1/{code}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-subAdmins1--code-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-subAdmins1--code-" onclick="tryItOut('GETapi-subAdmins1--code-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-subAdmins1--code-" onclick="cancelTryOut('GETapi-subAdmins1--code-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-subAdmins1--code-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/subAdmins1/{code}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="code" data-endpoint="GETapi-subAdmins1--code-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-subAdmins1--code-" data-component="query"  hidden>
<br>
Comma-separated list of the administrative division (1) relationships for Eager Loading. Possible values: country
</p>
</form>


## Get admin. division (2)




> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/subAdmins2/enim?embed=ab" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/subAdmins2/enim"
);

let params = {
    "embed": "ab",
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
    'https://jobclass.bedigit.local/api/subAdmins2/enim',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'ab',
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
    "message": "Entry for Models\\SubAdmin2 not found",
    "result": null,
    "error_code": 1
}
```
<div id="execution-results-GETapi-subAdmins2--code-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-subAdmins2--code-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-subAdmins2--code-"></code></pre>
</div>
<div id="execution-error-GETapi-subAdmins2--code-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-subAdmins2--code-"></code></pre>
</div>
<form id="form-GETapi-subAdmins2--code-" data-method="GET" data-path="api/subAdmins2/{code}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-subAdmins2--code-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-subAdmins2--code-" onclick="tryItOut('GETapi-subAdmins2--code-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-subAdmins2--code-" onclick="cancelTryOut('GETapi-subAdmins2--code-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-subAdmins2--code-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/subAdmins2/{code}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="code" data-endpoint="GETapi-subAdmins2--code-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-subAdmins2--code-" data-component="query"  hidden>
<br>
Comma-separated list of the administrative division (2) relationships for Eager Loading. Possible values: country,subAdmin1
</p>
</form>


## Get city




> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/cities/consectetur?embed=assumenda" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/cities/consectetur"
);

let params = {
    "embed": "assumenda",
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
    'https://jobclass.bedigit.local/api/cities/consectetur',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'assumenda',
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
<div id="execution-results-GETapi-cities--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-cities--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cities--id-"></code></pre>
</div>
<div id="execution-error-GETapi-cities--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cities--id-"></code></pre>
</div>
<form id="form-GETapi-cities--id-" data-method="GET" data-path="api/cities/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-cities--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-cities--id-" onclick="tryItOut('GETapi-cities--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-cities--id-" onclick="cancelTryOut('GETapi-cities--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-cities--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/cities/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-cities--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-cities--id-" data-component="query"  hidden>
<br>
Comma-separated list of the city relationships for Eager Loading. Possible values: country,subAdmin1,subAdmin2
</p>
</form>



