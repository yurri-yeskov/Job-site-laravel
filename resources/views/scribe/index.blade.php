<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>JobClass API Reference</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/style.css") }}" media="screen" />
        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/print.css") }}" media="print" />
        <script src="{{ asset("vendor/scribe/js/all.js") }}"></script>

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/highlight-darcula.css") }}" media="" />
        <script src="{{ asset("vendor/scribe/js/highlight.pack.js") }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>

</head>

<body class="" data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;php&quot;]">
<a href="#" id="nav-button">
      <span>
        NAV
            <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="-image" class=""/>
      </span>
</a>
<div class="tocify-wrapper">
        <img src="https://jobclass.bedigit.com/storage/app/default/logo-api.png" alt="logo" class="logo" style="padding-top: 10px;" width="230px"/>
                <div class="lang-selector">
                            <a href="#" data-language-name="bash">bash</a>
                            <a href="#" data-language-name="javascript">javascript</a>
                            <a href="#" data-language-name="php">php</a>
                    </div>
        <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>
    <ul class="search-results"></ul>

    <ul id="toc">
    </ul>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href='http://github.com/knuckleswtf/scribe'>Documentation powered by Scribe ✍</a></li>
                    </ul>
            <ul class="toc-footer" id="last-updated">
            <li>Last updated: June 25 2021</li>
        </ul>
</div>
<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1>Introduction</h1>
<p>JobClass API specification and documentation.</p>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<p><strong>Important:</strong> By default the API uses an access token set in the <strong><code>/.env</code></strong> file with the variable <code>APP_API_TOKEN</code>, whose its value
need to be added in the header of all the API requests with <code>X-AppApiToken</code> as key. On the other hand, the key <code>X-AppType</code> must not be added to the header... This key is only useful for the included web client and for API documentation.</p>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
<script>
    var baseUrl = "https://virtualworkers-git.com";
</script>
<script src="{{ asset("vendor/scribe/js/tryitout-2.7.9.js") }}"></script>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">https://jobclass.bedigit.local</code></pre><h1>Authenticating requests</h1>
<p>This API is authenticated by sending an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_TOKEN}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p><h1>Authentication</h1>
<h2>Log in</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://jobclass.bedigit.local/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
    -d '{"login":"user@demosite.com","captcha":"consectetur","password":"123456","captcha_key":"pariatur"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
};

let body = {
    "login": "user@demosite.com",
    "captcha": "consectetur",
    "password": "123456",
    "captcha_key": "pariatur"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://jobclass.bedigit.local/api/auth/login',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'json' =&gt; [
            'login' =&gt; 'user@demosite.com',
            'captcha' =&gt; 'consectetur',
            'password' =&gt; '123456',
            'captcha_key' =&gt; 'pariatur',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (422):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "An error occurred while validating the data.",
    "errors": {
        "captcha": [
            "validation.captcha_api"
        ]
    }
}</code></pre>
<div id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-auth-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"></code></pre>
</div>
<div id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login"></code></pre>
</div>
<form id="form-POSTapi-auth-login" data-method="POST" data-path="api/auth/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-auth-login" onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-auth-login" onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-auth-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/auth/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>login</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="login" data-endpoint="POSTapi-auth-login" data-component="body" required  hidden>
<br>
The user's login (Can be email address or phone number).
</p>
<p>
<b><code>captcha</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="captcha" data-endpoint="POSTapi-auth-login" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-auth-login" data-component="body" required  hidden>
<br>
The user's password.
</p>
<p>
<b><code>captcha_key</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="captcha_key" data-endpoint="POSTapi-auth-login" data-component="body"  hidden>
<br>
Key generated by the CAPTCHA endpoint calling (Required if the CAPTCHA verification is enabled from the Admin panel).
</p>

</form>
<h2>Log out</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/auth/logout/12" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/auth/logout/12"
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
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/auth/logout/12',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "You have been logged out. See you soon.",
    "result": null
}</code></pre>
<div id="execution-results-GETapi-auth-logout--userId-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-auth-logout--userId-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth-logout--userId-"></code></pre>
</div>
<div id="execution-error-GETapi-auth-logout--userId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth-logout--userId-"></code></pre>
</div>
<form id="form-GETapi-auth-logout--userId-" data-method="GET" data-path="api/auth/logout/{userId}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-auth-logout--userId-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-auth-logout--userId-" onclick="tryItOut('GETapi-auth-logout--userId-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-auth-logout--userId-" onclick="cancelTryOut('GETapi-auth-logout--userId-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-auth-logout--userId-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/auth/logout/{userId}</code></b>
</p>
<p>
<label id="auth-GETapi-auth-logout--userId-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-auth-logout--userId-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>userId</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="userId" data-endpoint="GETapi-auth-logout--userId-" data-component="url"  hidden>
<br>
The ID of the user to logout.
</p>
</form>
<h2>Forgot password</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://jobclass.bedigit.local/api/auth/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
    -d '{"login":"user@demosite.com","captcha_key":"optio"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/auth/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
};

let body = {
    "login": "user@demosite.com",
    "captcha_key": "optio"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://jobclass.bedigit.local/api/auth/password/email',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'json' =&gt; [
            'login' =&gt; 'user@demosite.com',
            'captcha_key' =&gt; 'optio',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (422):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "An error occurred while validating the data.",
    "errors": {
        "captcha": [
            "The security code field is required."
        ]
    }
}</code></pre>
<div id="execution-results-POSTapi-auth-password-email" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-auth-password-email"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-password-email"></code></pre>
</div>
<div id="execution-error-POSTapi-auth-password-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-password-email"></code></pre>
</div>
<form id="form-POSTapi-auth-password-email" data-method="POST" data-path="api/auth/password/email" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-password-email', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-auth-password-email" onclick="tryItOut('POSTapi-auth-password-email');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-auth-password-email" onclick="cancelTryOut('POSTapi-auth-password-email');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-auth-password-email" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/auth/password/email</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>login</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="login" data-endpoint="POSTapi-auth-password-email" data-component="body" required  hidden>
<br>
The user's login (Can be email address or phone number).
</p>
<p>
<b><code>captcha_key</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="captcha_key" data-endpoint="POSTapi-auth-password-email" data-component="body"  hidden>
<br>
Key generated by the CAPTCHA endpoint calling (Required if the CAPTCHA verification is enabled from the Admin panel).
</p>

</form>
<h2>Reset password token</h2>
<p>Reset password token verification</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://jobclass.bedigit.local/api/auth/password/token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/auth/password/token"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://jobclass.bedigit.local/api/auth/password/token',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (422):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "The given data was invalid.",
    "result": null,
    "errors": {
        "code": [
            "The code field is required."
        ]
    },
    "error_code": 1
}</code></pre>
<div id="execution-results-POSTapi-auth-password-token" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-auth-password-token"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-password-token"></code></pre>
</div>
<div id="execution-error-POSTapi-auth-password-token" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-password-token"></code></pre>
</div>
<form id="form-POSTapi-auth-password-token" data-method="POST" data-path="api/auth/password/token" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-password-token', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-auth-password-token" onclick="tryItOut('POSTapi-auth-password-token');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-auth-password-token" onclick="cancelTryOut('POSTapi-auth-password-token');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-auth-password-token" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/auth/password/token</code></b>
</p>
</form>
<h2>Reset password</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://jobclass.bedigit.local/api/auth/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
    -d '{"login":"john.doe@domain.tld","password":"js!X07$z61hLA","password_confirmation":"js!X07$z61hLA","captcha_key":"est"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/auth/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
};

let body = {
    "login": "john.doe@domain.tld",
    "password": "js!X07$z61hLA",
    "password_confirmation": "js!X07$z61hLA",
    "captcha_key": "est"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://jobclass.bedigit.local/api/auth/password/reset',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'json' =&gt; [
            'login' =&gt; 'john.doe@domain.tld',
            'password' =&gt; 'js!X07$z61hLA',
            'password_confirmation' =&gt; 'js!X07$z61hLA',
            'captcha_key' =&gt; 'est',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (422):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "An error occurred while validating the data.",
    "errors": {
        "captcha": [
            "The security code field is required."
        ]
    }
}</code></pre>
<div id="execution-results-POSTapi-auth-password-reset" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-auth-password-reset"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-password-reset"></code></pre>
</div>
<div id="execution-error-POSTapi-auth-password-reset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-password-reset"></code></pre>
</div>
<form id="form-POSTapi-auth-password-reset" data-method="POST" data-path="api/auth/password/reset" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-password-reset', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-auth-password-reset" onclick="tryItOut('POSTapi-auth-password-reset');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-auth-password-reset" onclick="cancelTryOut('POSTapi-auth-password-reset');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-auth-password-reset" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/auth/password/reset</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>login</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="login" data-endpoint="POSTapi-auth-password-reset" data-component="body" required  hidden>
<br>
The user's login (Can be email address or phone number).
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-auth-password-reset" data-component="body" required  hidden>
<br>
The user's password.
</p>
<p>
<b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password_confirmation" data-endpoint="POSTapi-auth-password-reset" data-component="body" required  hidden>
<br>
The confirmation of the user's password.
</p>
<p>
<b><code>captcha_key</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="captcha_key" data-endpoint="POSTapi-auth-password-reset" data-component="body"  hidden>
<br>
Key generated by the CAPTCHA endpoint calling (Required if the CAPTCHA verification is enabled from the Admin panel).
</p>

</form><h1>Captcha</h1>
<h2>Get CAPTCHA</h2>
<p>Calling this endpoint is mandatory if the captcha is enabled in the Admin panel.
Return a JSON data with an 'img' item that contains the captcha image to show and a 'key' item that contains the generated key to send for validation.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/captcha" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/captcha"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/captcha',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (429):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Too Many Requests,Please Slow Down",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-GETapi-captcha" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-captcha"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-captcha"></code></pre>
</div>
<div id="execution-error-GETapi-captcha" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-captcha"></code></pre>
</div>
<form id="form-GETapi-captcha" data-method="GET" data-path="api/captcha" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-captcha', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-captcha" onclick="tryItOut('GETapi-captcha');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-captcha" onclick="cancelTryOut('GETapi-captcha');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-captcha" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/captcha</code></b>
</p>
</form><h1>Categories</h1>
<h2>List categories</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/categories?parentId=0&amp;embed=facere" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/categories"
);

let params = {
    "parentId": "0",
    "embed": "facere",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/categories',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'parentId'=&gt; '0',
            'embed'=&gt; 'facere',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
                "name": "Security &amp; Safety",
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
                "name": "Independent &amp; Freelance",
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
                "name": "IT &amp; Telecoms",
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
                "name": "Marketing &amp; Communication",
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
                "name": "Babysitting &amp; Nanny Work",
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
                "name": "Medical &amp; Healthcare",
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
                "name": "Tourism &amp; Restaurants",
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
                "name": "Transportation &amp; Logistics",
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
}</code></pre>
<div id="execution-results-GETapi-categories" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-categories"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories"></code></pre>
</div>
<div id="execution-error-GETapi-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories"></code></pre>
</div>
<form id="form-GETapi-categories" data-method="GET" data-path="api/categories" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-categories', this);">
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
<h2>Get category</h2>
<p>Get category by it's unique slug or ID.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/categories/vitae?parentCatSlug=car" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/categories/vitae"
);

let params = {
    "parentCatSlug": "car",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/categories/vitae',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'parentCatSlug'=&gt; 'car',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": null,
    "result": []
}</code></pre>
<div id="execution-results-GETapi-categories--slugOrId-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-categories--slugOrId-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories--slugOrId-"></code></pre>
</div>
<div id="execution-error-GETapi-categories--slugOrId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories--slugOrId-"></code></pre>
</div>
<form id="form-GETapi-categories--slugOrId-" data-method="GET" data-path="api/categories/{slugOrId}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-categories--slugOrId-', this);">
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
</form><h1>Companies</h1>
<h2>List companies</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/companies?sort=ipsum" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/companies"
);

let params = {
    "sort": "ipsum",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/companies',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'sort'=&gt; 'ipsum',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
                    "label": "&amp;laquo; Previous",
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
                    "label": "Next &amp;raquo;",
                    "active": false
                }
            ],
            "path": "http:\/\/localhost\/api\/companies",
            "per_page": "16",
            "to": 16,
            "total": 663
        }
    }
}</code></pre>
<div id="execution-results-GETapi-companies" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-companies"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-companies"></code></pre>
</div>
<div id="execution-error-GETapi-companies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-companies"></code></pre>
</div>
<form id="form-GETapi-companies" data-method="GET" data-path="api/companies" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-companies', this);">
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
<h2>Get company</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/companies/voluptatem?embed=quibusdam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/companies/voluptatem"
);

let params = {
    "embed": "quibusdam",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/companies/voluptatem',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'embed'=&gt; 'quibusdam',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-GETapi-companies--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-companies--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-companies--id-"></code></pre>
</div>
<div id="execution-error-GETapi-companies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-companies--id-"></code></pre>
</div>
<form id="form-GETapi-companies--id-" data-method="GET" data-path="api/companies/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-companies--id-', this);">
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
<h2>Store company</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://jobclass.bedigit.local/api/companies" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
    -d ''
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://jobclass.bedigit.local/api/companies',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'json' =&gt; [
            'company' =&gt; [
                'name' =&gt; 'aut',
                'description' =&gt; 'commodi',
                [
                    'country_code' =&gt; 'US',
                    'name' =&gt; 'Foo Inc',
                    'logo' =&gt; null,
                    'description' =&gt; 'Nostrum quia est aut quas. Consequuntur ut quis odit voluptatem laborum quia.',
                    'city_id' =&gt; 20,
                    'address' =&gt; '5 rue de l\'Echelle',
                    'phone' =&gt; '+17656766467',
                    'fax' =&gt; '+80159266712',
                    'email' =&gt; 'contact@domain.tld',
                    'website' =&gt; 'https://domain.tld',
                    'facebook' =&gt; 'non',
                    'twitter' =&gt; 'accusantium',
                    'linkedin' =&gt; 'necessitatibus',
                    'pinterest' =&gt; 'est',
                ],
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Unauthenticated or Token Expired, Please Login",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-POSTapi-companies" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-companies"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-companies"></code></pre>
</div>
<div id="execution-error-POSTapi-companies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-companies"></code></pre>
</div>
<form id="form-POSTapi-companies" data-method="POST" data-path="api/companies" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-companies', this);">
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
<h2>Update company</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://jobclass.bedigit.local/api/companies/quibusdam" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
    -d ''
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'https://jobclass.bedigit.local/api/companies/quibusdam',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'json' =&gt; [
            'company' =&gt; [
                'name' =&gt; 'quibusdam',
                'description' =&gt; 'enim',
                [
                    'country_code' =&gt; 'US',
                    'name' =&gt; 'Foo Inc',
                    'logo' =&gt; null,
                    'description' =&gt; 'Nostrum quia est aut quas. Consequuntur ut quis odit voluptatem laborum quia.',
                    'city_id' =&gt; 18,
                    'address' =&gt; '5 rue de l\'Echelle',
                    'phone' =&gt; '+17656766467',
                    'fax' =&gt; '+80159266712',
                    'email' =&gt; 'contact@domain.tld',
                    'website' =&gt; 'https://domain.tld',
                    'facebook' =&gt; 'in',
                    'twitter' =&gt; 'suscipit',
                    'linkedin' =&gt; 'eum',
                    'pinterest' =&gt; 'praesentium',
                ],
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-PUTapi-companies--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-companies--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-companies--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-companies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-companies--id-"></code></pre>
</div>
<form id="form-PUTapi-companies--id-" data-method="PUT" data-path="api/companies/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-companies--id-', this);">
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
<h2>Delete company(ies)</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://jobclass.bedigit.local/api/companies/assumenda" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'https://jobclass.bedigit.local/api/companies/assumenda',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-DELETEapi-companies--ids-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-companies--ids-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-companies--ids-"></code></pre>
</div>
<div id="execution-error-DELETEapi-companies--ids-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-companies--ids-"></code></pre>
</div>
<form id="form-DELETEapi-companies--ids-" data-method="DELETE" data-path="api/companies/{ids}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-companies--ids-', this);">
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
</form><h1>Contact</h1>
<h2>Send Form</h2>
<p>Send a message to the site owner.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://jobclass.bedigit.local/api/contact" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
    -d '{"first_name":"John","last_name":"Doe","email":"john.doe@domain.tld","message":"Nesciunt porro possimus maiores voluptatibus accusamus velit qui aspernatur.","country_code":"US","country_name":"United Sates","captcha_key":"non"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/contact"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
};

let body = {
    "first_name": "John",
    "last_name": "Doe",
    "email": "john.doe@domain.tld",
    "message": "Nesciunt porro possimus maiores voluptatibus accusamus velit qui aspernatur.",
    "country_code": "US",
    "country_name": "United Sates",
    "captcha_key": "non"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://jobclass.bedigit.local/api/contact',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'json' =&gt; [
            'first_name' =&gt; 'John',
            'last_name' =&gt; 'Doe',
            'email' =&gt; 'john.doe@domain.tld',
            'message' =&gt; 'Nesciunt porro possimus maiores voluptatibus accusamus velit qui aspernatur.',
            'country_code' =&gt; 'US',
            'country_name' =&gt; 'United Sates',
            'captcha_key' =&gt; 'non',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (429):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Too Many Requests,Please Slow Down",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-POSTapi-contact" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-contact"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-contact"></code></pre>
</div>
<div id="execution-error-POSTapi-contact" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-contact"></code></pre>
</div>
<form id="form-POSTapi-contact" data-method="POST" data-path="api/contact" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-contact', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-contact" onclick="tryItOut('POSTapi-contact');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-contact" onclick="cancelTryOut('POSTapi-contact');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-contact" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/contact</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-contact" data-component="body" required  hidden>
<br>
The user's first name.
</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-contact" data-component="body" required  hidden>
<br>
The user's last name.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-contact" data-component="body" required  hidden>
<br>
The user's email address.
</p>
<p>
<b><code>message</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="message" data-endpoint="POSTapi-contact" data-component="body" required  hidden>
<br>
The message to send.
</p>
<p>
<b><code>country_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country_code" data-endpoint="POSTapi-contact" data-component="body" required  hidden>
<br>
The user's country code.
</p>
<p>
<b><code>country_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country_name" data-endpoint="POSTapi-contact" data-component="body" required  hidden>
<br>
The user's country name.
</p>
<p>
<b><code>captcha_key</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="captcha_key" data-endpoint="POSTapi-contact" data-component="body"  hidden>
<br>
Key generated by the CAPTCHA endpoint calling (Required if the CAPTCHA verification is enabled from the Admin panel).
</p>

</form>
<h2>Report post</h2>
<p>Report abuse or issues</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://jobclass.bedigit.local/api/posts/6/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
    -d '{"report_type_id":2,"email":"john.doe@domain.tld","message":"Et sunt voluptatibus ducimus id assumenda sint.","captcha_key":"et"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/posts/6/report"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
};

let body = {
    "report_type_id": 2,
    "email": "john.doe@domain.tld",
    "message": "Et sunt voluptatibus ducimus id assumenda sint.",
    "captcha_key": "et"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://jobclass.bedigit.local/api/posts/6/report',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'json' =&gt; [
            'report_type_id' =&gt; 2,
            'email' =&gt; 'john.doe@domain.tld',
            'message' =&gt; 'Et sunt voluptatibus ducimus id assumenda sint.',
            'captcha_key' =&gt; 'et',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (429):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Too Many Requests,Please Slow Down",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-POSTapi-posts--id--report" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-posts--id--report"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-posts--id--report"></code></pre>
</div>
<div id="execution-error-POSTapi-posts--id--report" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-posts--id--report"></code></pre>
</div>
<form id="form-POSTapi-posts--id--report" data-method="POST" data-path="api/posts/{id}/report" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-posts--id--report', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-posts--id--report" onclick="tryItOut('POSTapi-posts--id--report');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-posts--id--report" onclick="cancelTryOut('POSTapi-posts--id--report');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-posts--id--report" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/posts/{id}/report</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="POSTapi-posts--id--report" data-component="url" required  hidden>
<br>
The post ID.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>report_type_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="report_type_id" data-endpoint="POSTapi-posts--id--report" data-component="body" required  hidden>
<br>
The report type ID.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-posts--id--report" data-component="body" required  hidden>
<br>
The user's email address.
</p>
<p>
<b><code>message</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="message" data-endpoint="POSTapi-posts--id--report" data-component="body" required  hidden>
<br>
The message to send.
</p>
<p>
<b><code>captcha_key</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="captcha_key" data-endpoint="POSTapi-posts--id--report" data-component="body"  hidden>
<br>
Key generated by the CAPTCHA endpoint calling (Required if the CAPTCHA verification is enabled from the Admin panel).
</p>

</form>
<h2>Send Post by Email</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://jobclass.bedigit.local/api/posts/et/sendByEmail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
    -d '{"sender_email":"john.doe@domain.tld","recipient_email":"foo@domain.tld"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/posts/et/sendByEmail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
};

let body = {
    "sender_email": "john.doe@domain.tld",
    "recipient_email": "foo@domain.tld"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://jobclass.bedigit.local/api/posts/et/sendByEmail',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'json' =&gt; [
            'sender_email' =&gt; 'john.doe@domain.tld',
            'recipient_email' =&gt; 'foo@domain.tld',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (429):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Too Many Requests,Please Slow Down",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-POSTapi-posts--id--sendByEmail" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-posts--id--sendByEmail"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-posts--id--sendByEmail"></code></pre>
</div>
<div id="execution-error-POSTapi-posts--id--sendByEmail" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-posts--id--sendByEmail"></code></pre>
</div>
<form id="form-POSTapi-posts--id--sendByEmail" data-method="POST" data-path="api/posts/{id}/sendByEmail" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-posts--id--sendByEmail', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-posts--id--sendByEmail" onclick="tryItOut('POSTapi-posts--id--sendByEmail');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-posts--id--sendByEmail" onclick="cancelTryOut('POSTapi-posts--id--sendByEmail');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-posts--id--sendByEmail" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/posts/{id}/sendByEmail</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-posts--id--sendByEmail" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>sender_email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sender_email" data-endpoint="POSTapi-posts--id--sendByEmail" data-component="body" required  hidden>
<br>
The sender's email address.
</p>
<p>
<b><code>recipient_email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="recipient_email" data-endpoint="POSTapi-posts--id--sendByEmail" data-component="body" required  hidden>
<br>
The recipient's email address.
</p>

</form><h1>Countries</h1>
<h2>List countries</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/countries?embed=nemo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/countries"
);

let params = {
    "embed": "nemo",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/countries',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'embed'=&gt; 'nemo',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
                    "label": "&amp;laquo; Previous",
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
                    "label": "Next &amp;raquo;",
                    "active": false
                }
            ],
            "path": "http:\/\/localhost\/api\/countries",
            "per_page": "16",
            "to": 16,
            "total": 251
        }
    }
}</code></pre>
<div id="execution-results-GETapi-countries" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-countries"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-countries"></code></pre>
</div>
<div id="execution-error-GETapi-countries" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-countries"></code></pre>
</div>
<form id="form-GETapi-countries" data-method="GET" data-path="api/countries" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-countries', this);">
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
<h2>Get country</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/countries/DE?embed=quisquam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/countries/DE"
);

let params = {
    "embed": "quisquam",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/countries/DE',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'embed'=&gt; 'quisquam',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<div id="execution-results-GETapi-countries--code-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-countries--code-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-countries--code-"></code></pre>
</div>
<div id="execution-error-GETapi-countries--code-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-countries--code-"></code></pre>
</div>
<form id="form-GETapi-countries--code-" data-method="GET" data-path="api/countries/{code}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-countries--code-', this);">
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
<h2>List admin. divisions (1)</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/countries/US/subAdmins1?embed=ducimus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/countries/US/subAdmins1"
);

let params = {
    "embed": "ducimus",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/countries/US/subAdmins1',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'embed'=&gt; 'ducimus',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
                    "label": "&amp;laquo; Previous",
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
                    "label": "Next &amp;raquo;",
                    "active": false
                }
            ],
            "path": "http:\/\/localhost\/api\/countries\/US\/subAdmins1",
            "per_page": "16",
            "to": 16,
            "total": 51
        }
    }
}</code></pre>
<div id="execution-results-GETapi-countries--countryCode--subAdmins1" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-countries--countryCode--subAdmins1"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-countries--countryCode--subAdmins1"></code></pre>
</div>
<div id="execution-error-GETapi-countries--countryCode--subAdmins1" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-countries--countryCode--subAdmins1"></code></pre>
</div>
<form id="form-GETapi-countries--countryCode--subAdmins1" data-method="GET" data-path="api/countries/{countryCode}/subAdmins1" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-countries--countryCode--subAdmins1', this);">
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
<h2>List admin. divisions (2)</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/countries/US/subAdmins2?embed=perspiciatis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/countries/US/subAdmins2"
);

let params = {
    "embed": "perspiciatis",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/countries/US/subAdmins2',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'embed'=&gt; 'perspiciatis',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
                    "label": "&amp;laquo; Previous",
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
                    "label": "Next &amp;raquo;",
                    "active": false
                }
            ],
            "path": "http:\/\/localhost\/api\/countries\/US\/subAdmins2",
            "per_page": "16",
            "to": 16,
            "total": 3142
        }
    }
}</code></pre>
<div id="execution-results-GETapi-countries--countryCode--subAdmins2" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-countries--countryCode--subAdmins2"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-countries--countryCode--subAdmins2"></code></pre>
</div>
<div id="execution-error-GETapi-countries--countryCode--subAdmins2" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-countries--countryCode--subAdmins2"></code></pre>
</div>
<form id="form-GETapi-countries--countryCode--subAdmins2" data-method="GET" data-path="api/countries/{countryCode}/subAdmins2" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-countries--countryCode--subAdmins2', this);">
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
<h2>List cities</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/countries/US/cities?embed=autem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/countries/US/cities"
);

let params = {
    "embed": "autem",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/countries/US/cities',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'embed'=&gt; 'autem',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
                    "label": "&amp;laquo; Previous",
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
                    "label": "Next &amp;raquo;",
                    "active": false
                }
            ],
            "path": "http:\/\/localhost\/api\/countries\/US\/cities",
            "per_page": "16",
            "to": 16,
            "total": 7197
        }
    }
}</code></pre>
<div id="execution-results-GETapi-countries--countryCode--cities" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-countries--countryCode--cities"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-countries--countryCode--cities"></code></pre>
</div>
<div id="execution-error-GETapi-countries--countryCode--cities" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-countries--countryCode--cities"></code></pre>
</div>
<form id="form-GETapi-countries--countryCode--cities" data-method="GET" data-path="api/countries/{countryCode}/cities" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-countries--countryCode--cities', this);">
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
<h2>Get admin. division (1)</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/subAdmins1/praesentium?embed=nemo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/subAdmins1/praesentium"
);

let params = {
    "embed": "nemo",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/subAdmins1/praesentium',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'embed'=&gt; 'nemo',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Entry for Models\\SubAdmin1 not found",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-GETapi-subAdmins1--code-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-subAdmins1--code-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-subAdmins1--code-"></code></pre>
</div>
<div id="execution-error-GETapi-subAdmins1--code-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-subAdmins1--code-"></code></pre>
</div>
<form id="form-GETapi-subAdmins1--code-" data-method="GET" data-path="api/subAdmins1/{code}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-subAdmins1--code-', this);">
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
<h2>Get admin. division (2)</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/subAdmins2/enim?embed=ab" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/subAdmins2/enim"
);

let params = {
    "embed": "ab",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/subAdmins2/enim',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'embed'=&gt; 'ab',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Entry for Models\\SubAdmin2 not found",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-GETapi-subAdmins2--code-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-subAdmins2--code-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-subAdmins2--code-"></code></pre>
</div>
<div id="execution-error-GETapi-subAdmins2--code-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-subAdmins2--code-"></code></pre>
</div>
<form id="form-GETapi-subAdmins2--code-" data-method="GET" data-path="api/subAdmins2/{code}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-subAdmins2--code-', this);">
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
<h2>Get city</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/cities/consectetur?embed=assumenda" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/cities/consectetur"
);

let params = {
    "embed": "assumenda",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/cities/consectetur',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'embed'=&gt; 'assumenda',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-GETapi-cities--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-cities--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cities--id-"></code></pre>
</div>
<div id="execution-error-GETapi-cities--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cities--id-"></code></pre>
</div>
<form id="form-GETapi-cities--id-" data-method="GET" data-path="api/cities/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-cities--id-', this);">
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
</form><h1>Home</h1>
<h2>List sections</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/homeSections" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/homeSections"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/homeSections',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (429):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Too Many Requests,Please Slow Down",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-GETapi-homeSections" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-homeSections"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-homeSections"></code></pre>
</div>
<div id="execution-error-GETapi-homeSections" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-homeSections"></code></pre>
</div>
<form id="form-GETapi-homeSections" data-method="GET" data-path="api/homeSections" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-homeSections', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-homeSections" onclick="tryItOut('GETapi-homeSections');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-homeSections" onclick="cancelTryOut('GETapi-homeSections');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-homeSections" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/homeSections</code></b>
</p>
</form><h1>Packages</h1>
<h2>List packages</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/packages?embed=currency" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/packages"
);

let params = {
    "embed": "currency",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/packages',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'embed'=&gt; 'currency',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": null,
    "result": {
        "data": []
    }
}</code></pre>
<div id="execution-results-GETapi-packages" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-packages"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-packages"></code></pre>
</div>
<div id="execution-error-GETapi-packages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-packages"></code></pre>
</div>
<form id="form-GETapi-packages" data-method="GET" data-path="api/packages" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-packages', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-packages" onclick="tryItOut('GETapi-packages');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-packages" onclick="cancelTryOut('GETapi-packages');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-packages" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/packages</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-packages" data-component="query"  hidden>
<br>
Comma-separated list of the package relationships for Eager Loading.
</p>
</form>
<h2>Get package</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/packages/2?embed=currency" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/packages/2"
);

let params = {
    "embed": "currency",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/packages/2',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'embed'=&gt; 'currency',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Entry for Models\\Package not found",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-GETapi-packages--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-packages--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-packages--id-"></code></pre>
</div>
<div id="execution-error-GETapi-packages--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-packages--id-"></code></pre>
</div>
<form id="form-GETapi-packages--id-" data-method="GET" data-path="api/packages/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-packages--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-packages--id-" onclick="tryItOut('GETapi-packages--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-packages--id-" onclick="cancelTryOut('GETapi-packages--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-packages--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/packages/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id" data-endpoint="GETapi-packages--id-" data-component="url"  hidden>
<br>
The package's ID.
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-packages--id-" data-component="query"  hidden>
<br>
Comma-separated list of the package relationships for Eager Loading.
</p>
</form><h1>Pages</h1>
<h2>List pages</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/pages?excludedFromFooter=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/pages"
);

let params = {
    "excludedFromFooter": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/pages',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'excludedFromFooter'=&gt; '',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (429):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Too Many Requests,Please Slow Down",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-GETapi-pages" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-pages"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pages"></code></pre>
</div>
<div id="execution-error-GETapi-pages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pages"></code></pre>
</div>
<form id="form-GETapi-pages" data-method="GET" data-path="api/pages" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-pages', this);">
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
<h2>Get page</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/pages/error" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/pages/error',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (429):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Too Many Requests,Please Slow Down",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-GETapi-pages--slugOrId-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-pages--slugOrId-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pages--slugOrId-"></code></pre>
</div>
<div id="execution-error-GETapi-pages--slugOrId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pages--slugOrId-"></code></pre>
</div>
<form id="form-GETapi-pages--slugOrId-" data-method="GET" data-path="api/pages/{slugOrId}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-pages--slugOrId-', this);">
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
</form><h1>Payment Methods</h1>
<h2>List payment methods</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/paymentMethods?countryCode=US" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/paymentMethods"
);

let params = {
    "countryCode": "US",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/paymentMethods',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'countryCode'=&gt; 'US',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<div id="execution-results-GETapi-paymentMethods" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-paymentMethods"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-paymentMethods"></code></pre>
</div>
<div id="execution-error-GETapi-paymentMethods" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-paymentMethods"></code></pre>
</div>
<form id="form-GETapi-paymentMethods" data-method="GET" data-path="api/paymentMethods" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-paymentMethods', this);">
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
<h2>Get payment method</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/paymentMethods/7" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/paymentMethods/7',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Entry for Models\\PaymentMethod not found",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-GETapi-paymentMethods--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-paymentMethods--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-paymentMethods--id-"></code></pre>
</div>
<div id="execution-error-GETapi-paymentMethods--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-paymentMethods--id-"></code></pre>
</div>
<form id="form-GETapi-paymentMethods--id-" data-method="GET" data-path="api/paymentMethods/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-paymentMethods--id-', this);">
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
</form><h1>Payments</h1>
<h2>List payments</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/payments?embed=voluptate" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/payments"
);

let params = {
    "embed": "voluptate",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/payments',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'embed'=&gt; 'voluptate',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Unauthenticated or Token Expired, Please Login",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-GETapi-payments" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-payments"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-payments"></code></pre>
</div>
<div id="execution-error-GETapi-payments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-payments"></code></pre>
</div>
<form id="form-GETapi-payments" data-method="GET" data-path="api/payments" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-payments', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-payments" onclick="tryItOut('GETapi-payments');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-payments" onclick="cancelTryOut('GETapi-payments');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-payments" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/payments</code></b>
</p>
<p>
<label id="auth-GETapi-payments" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-payments" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-payments" data-component="query"  hidden>
<br>
Comma-separated list of the payment relationships for Eager Loading. Possible values: post,paymentMethod,package,currency
</p>
</form>
<h2>Get payment</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/payments/quaerat?embed=autem" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/payments/quaerat"
);

let params = {
    "embed": "autem",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/payments/quaerat',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'embed'=&gt; 'autem',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-GETapi-payments--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-payments--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-payments--id-"></code></pre>
</div>
<div id="execution-error-GETapi-payments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-payments--id-"></code></pre>
</div>
<form id="form-GETapi-payments--id-" data-method="GET" data-path="api/payments/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-payments--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-payments--id-" onclick="tryItOut('GETapi-payments--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-payments--id-" onclick="cancelTryOut('GETapi-payments--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-payments--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/payments/{id}</code></b>
</p>
<p>
<label id="auth-GETapi-payments--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-payments--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-payments--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-payments--id-" data-component="query"  hidden>
<br>
Comma-separated list of the payment relationships for Eager Loading. Possible values: post,paymentMethod,package,currency
</p>
</form>
<h2>Store payment</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>Note: This endpoint is only available for the multi steps post edition.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://jobclass.bedigit.local/api/payments?package=2" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
    -d '{"country_code":"US","post_id":2,"package_id":8,"payment_method_id":5}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/payments"
);

let params = {
    "package": "2",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
};

let body = {
    "country_code": "US",
    "post_id": 2,
    "package_id": 8,
    "payment_method_id": 5
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://jobclass.bedigit.local/api/payments',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'package'=&gt; '2',
        ],
        'json' =&gt; [
            'country_code' =&gt; 'US',
            'post_id' =&gt; 2,
            'package_id' =&gt; 8,
            'payment_method_id' =&gt; 5,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Post not found",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-POSTapi-payments" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-payments"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-payments"></code></pre>
</div>
<div id="execution-error-POSTapi-payments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-payments"></code></pre>
</div>
<form id="form-POSTapi-payments" data-method="POST" data-path="api/payments" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-payments', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-payments" onclick="tryItOut('POSTapi-payments');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-payments" onclick="cancelTryOut('POSTapi-payments');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-payments" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/payments</code></b>
</p>
<p>
<label id="auth-POSTapi-payments" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-payments" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>package</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="package" data-endpoint="POSTapi-payments" data-component="query"  hidden>
<br>
Selected package ID.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>country_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country_code" data-endpoint="POSTapi-payments" data-component="body" required  hidden>
<br>
The code of the user's country.
</p>
<p>
<b><code>post_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="post_id" data-endpoint="POSTapi-payments" data-component="body" required  hidden>
<br>
The post's ID.
</p>
<p>
<b><code>package_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="package_id" data-endpoint="POSTapi-payments" data-component="body" required  hidden>
<br>
The package's ID (Auto filled when the query parameter 'package' is set).
</p>
<p>
<b><code>payment_method_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="payment_method_id" data-endpoint="POSTapi-payments" data-component="body"  hidden>
<br>
The payment method's ID (required when the selected package's price is > 0).
</p>

</form><h1>Posts</h1>
<h2>List posts</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/posts?embed=saepe" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/posts"
);

let params = {
    "embed": "saepe",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/posts',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'embed'=&gt; 'saepe',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": null,
    "result": {
        "data": [
            {
                "id": 2823,
                "country_code": "US",
                "user_id": "1",
                "company_id": "683",
                "company_name": "MISSION IMPOSSIBLE",
                "logo": "files\/us\/683\/3c69eac8aacff148e52e025c675100e2.jpg",
                "company_description": "Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.",
                "category_id": "3",
                "post_type_id": "1",
                "title": "S'inscrire - {app_name}",
                "description": "&lt;p&gt;&lt;span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\"&gt;Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.&lt;\/span&gt;&lt;\/p&gt;",
                "tags": "2dnpfn",
                "salary_min": "700.00",
                "salary_max": "2000.00",
                "salary_type_id": "1",
                "negotiable": "1",
                "start_date": "2021\/06\/28",
                "application_url": "",
                "contact_name": "Administrator",
                "email": "admin@larapen.com",
                "phone": "061228281",
                "phone_hidden": null,
                "city_id": "48201",
                "lat": "37.64",
                "lon": "-121.00",
                "address": null,
                "ip_addr": "::1",
                "visits": "0",
                "tmp_token": "8f45d0a4f16f0992ed241daee458bb9a",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "0",
                "accept_marketing_offers": "0",
                "reviewed": "1",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-06-23T13:32:43.000000Z",
                "deletion_mail_sent_at": null,
                "partner": null,
                "created_at": "2021-06-23T13:32:43.000000Z",
                "updated_at": "2021-06-23T13:32:43.000000Z",
                "slug": "sinscrire-app_name",
                "created_at_formatted": "Jun 23rd, 2021 at 09:32",
                "user_photo_url": "http:\/\/jobclass.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 2822,
                "country_code": "US",
                "user_id": "1",
                "company_id": "682",
                "company_name": "LOLA LAND",
                "logo": "files\/us\/682\/a9df8b8e75140f5ec9aade4702333313.png",
                "company_description": "Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.",
                "category_id": "13",
                "post_type_id": "5",
                "title": "Toyota RAV 4 cool",
                "description": "&lt;p&gt;&lt;span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\"&gt;Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.&lt;\/span&gt;&lt;\/p&gt;",
                "tags": "",
                "salary_min": "32.00",
                "salary_max": "233.00",
                "salary_type_id": "3",
                "negotiable": "1",
                "start_date": "2021\/06\/29",
                "application_url": "",
                "contact_name": "Administrator",
                "email": "admin@larapen.com",
                "phone": "061228281",
                "phone_hidden": null,
                "city_id": "43601",
                "lat": "39.17",
                "lon": "-77.27",
                "address": null,
                "ip_addr": "::1",
                "visits": "0",
                "tmp_token": "90bc64f9ef9c2e0159c658b3248b406f",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "0",
                "accept_marketing_offers": "0",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-06-23T13:30:14.000000Z",
                "deletion_mail_sent_at": null,
                "partner": null,
                "created_at": "2021-06-23T13:29:19.000000Z",
                "updated_at": "2021-06-23T13:30:14.000000Z",
                "slug": "toyota-rav-4-cool",
                "created_at_formatted": "Jun 23rd, 2021 at 09:29",
                "user_photo_url": "http:\/\/jobclass.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 2821,
                "country_code": "US",
                "user_id": "1",
                "company_id": "681",
                "company_name": "Amissa Gan",
                "logo": "files\/us\/681\/af3502595a45b4d87c93d6e3cf06d9f8.jpg",
                "company_description": "Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.",
                "category_id": "10",
                "post_type_id": "3",
                "title": "Do you have something to sell",
                "description": "&lt;p&gt;&lt;span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\"&gt;Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.&lt;\/span&gt;&lt;\/p&gt;",
                "tags": "",
                "salary_min": "32.00",
                "salary_max": "2000.00",
                "salary_type_id": "1",
                "negotiable": "1",
                "start_date": "2021\/06\/30",
                "application_url": "",
                "contact_name": "Administrator",
                "email": "admin@larapen.com",
                "phone": "061228281",
                "phone_hidden": null,
                "city_id": "46662",
                "lat": "40.77",
                "lon": "-73.93",
                "address": null,
                "ip_addr": "::1",
                "visits": "0",
                "tmp_token": "9fc59fe73c01bedb0bd0454d10298887",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "0",
                "accept_marketing_offers": "0",
                "reviewed": "1",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-06-23T13:26:40.000000Z",
                "deletion_mail_sent_at": null,
                "partner": null,
                "created_at": "2021-06-23T13:26:40.000000Z",
                "updated_at": "2021-06-23T13:26:40.000000Z",
                "slug": "do-you-have-something-to-sell",
                "created_at_formatted": "Jun 23rd, 2021 at 09:26",
                "user_photo_url": "http:\/\/jobclass.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 2820,
                "country_code": "US",
                "user_id": null,
                "company_id": "0",
                "company_name": "Foo Inc.",
                "logo": "files\/us\/2820\/68a98a8b1793b20acfb62fb8b4a048c1.jpg",
                "company_description": "Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.",
                "category_id": "14",
                "post_type_id": "1",
                "title": "Toyota RAV 4 cool",
                "description": "&lt;p&gt;&lt;span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\"&gt;Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.&lt;\/span&gt;&lt;\/p&gt;",
                "tags": "",
                "salary_min": "32.00",
                "salary_max": "2000.00",
                "salary_type_id": "2",
                "negotiable": "1",
                "start_date": "2021\/05\/28",
                "application_url": "",
                "contact_name": "Edou",
                "email": "ddd@tata.com",
                "phone": "",
                "phone_hidden": null,
                "city_id": "49062",
                "lat": "47.32",
                "lon": "-122.31",
                "address": null,
                "ip_addr": "::1",
                "visits": "2",
                "tmp_token": "0913842a121a2d878fbe280be79e13ff",
                "email_token": "258817014b3fb557ba128656923009bb",
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-06-07T06:26:53.000000Z",
                "deletion_mail_sent_at": null,
                "partner": null,
                "created_at": "2021-05-23T14:00:44.000000Z",
                "updated_at": "2021-06-07T06:26:53.000000Z",
                "slug": "toyota-rav-4-cool",
                "created_at_formatted": "May 23rd, 2021 at 10:00",
                "user_photo_url": "http:\/\/jobclass.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 2818,
                "country_code": "US",
                "user_id": null,
                "company_id": "0",
                "company_name": "Foo Inc.",
                "logo": "files\/us\/2818\/daf6b92636cb5886e2fb47fe5337f6b8.png",
                "company_description": "Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.",
                "category_id": "10",
                "post_type_id": "2",
                "title": "Do you have something to sell",
                "description": "&lt;p&gt;&lt;span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\"&gt;Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.&lt;\/span&gt;&lt;\/p&gt;",
                "tags": "",
                "salary_min": "700.00",
                "salary_max": "2332.00",
                "salary_type_id": "1",
                "negotiable": "1",
                "start_date": "2021\/05\/26",
                "application_url": "",
                "contact_name": "User Toto",
                "email": "fofo@lola.com",
                "phone": "",
                "phone_hidden": null,
                "city_id": "44873",
                "lat": "29.42",
                "lon": "-98.49",
                "address": null,
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "5acd471271573926338b818033e487bc",
                "email_token": "0dbe92d88c82fbb6b4d0c436fc75a55a",
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "reviewed": "0",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-05-23T01:54:58.000000Z",
                "deletion_mail_sent_at": null,
                "partner": null,
                "created_at": "2021-05-23T01:50:56.000000Z",
                "updated_at": "2021-05-23T01:54:58.000000Z",
                "slug": "do-you-have-something-to-sell",
                "created_at_formatted": "May 22nd, 2021 at 21:50",
                "user_photo_url": "http:\/\/jobclass.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 2814,
                "country_code": "US",
                "user_id": null,
                "company_id": "0",
                "company_name": "Amivovo",
                "logo": "app\/default\/picture.jpg",
                "company_description": "Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.",
                "category_id": "5",
                "post_type_id": "1",
                "title": "Do you have something to sell",
                "description": "&lt;p&gt;&lt;span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\"&gt;Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.&lt;\/span&gt;&lt;\/p&gt;",
                "tags": "",
                "salary_min": "32.00",
                "salary_max": "233.00",
                "salary_type_id": "1",
                "negotiable": "1",
                "start_date": "2021\/05\/26",
                "application_url": "",
                "contact_name": "User Test",
                "email": "toto@test.com",
                "phone": "",
                "phone_hidden": null,
                "city_id": "42570",
                "lat": "26.56",
                "lon": "-81.95",
                "address": null,
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "4cb42ed1e63be144865732aefaf714fa",
                "email_token": "e32bda733ed5844374edb226290c91ab",
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "1",
                "reviewed": "0",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-05-21T16:57:00.000000Z",
                "deletion_mail_sent_at": null,
                "partner": null,
                "created_at": "2021-05-21T16:53:27.000000Z",
                "updated_at": "2021-05-21T16:57:00.000000Z",
                "slug": "do-you-have-something-to-sell",
                "created_at_formatted": "May 21st, 2021 at 12:53",
                "user_photo_url": "http:\/\/jobclass.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 2813,
                "country_code": "US",
                "user_id": "1",
                "company_id": "680",
                "company_name": "Foo Inc.",
                "logo": "files\/us\/680\/2eced1747c0a378f80e0460e2b293f2c.jpg",
                "company_description": "Use a brief title and description of the ad\r\nMake sure you post in the correct category\r\nAdd a logo to your ad\r\nPut a min and max salary\r\nCheck the ad before publish",
                "category_id": "14",
                "post_type_id": "1",
                "title": "Do you have something to sell",
                "description": "&lt;p&gt;&lt;span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\"&gt;Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.&lt;\/span&gt;&lt;\/p&gt;",
                "tags": "dede,lol",
                "salary_min": "32.00",
                "salary_max": "2000.00",
                "salary_type_id": "3",
                "negotiable": "1",
                "start_date": "2021\/05\/30",
                "application_url": "",
                "contact_name": "Administrator",
                "email": "admin@larapen.com",
                "phone": "061228281",
                "phone_hidden": null,
                "city_id": "43968",
                "lat": "35.05",
                "lon": "-78.88",
                "address": null,
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "ab82d49317fbf6e415ebf9f0cf36e6a1",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "0",
                "accept_marketing_offers": "0",
                "reviewed": "0",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-05-23T14:05:04.000000Z",
                "deletion_mail_sent_at": null,
                "partner": null,
                "created_at": "2021-05-21T10:00:53.000000Z",
                "updated_at": "2021-05-23T14:05:04.000000Z",
                "slug": "do-you-have-something-to-sell",
                "created_at_formatted": "May 21st, 2021 at 06:00",
                "user_photo_url": "http:\/\/jobclass.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 2786,
                "country_code": "US",
                "user_id": null,
                "company_id": "0",
                "company_name": "Foo Inc.",
                "logo": "app\/default\/picture.jpg",
                "company_description": "Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.",
                "category_id": "5",
                "post_type_id": "3",
                "title": "Post Free Ads",
                "description": "&lt;p&gt;&lt;span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\"&gt;Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.&lt;\/span&gt;&lt;\/p&gt;",
                "tags": "",
                "salary_min": null,
                "salary_max": null,
                "salary_type_id": "1",
                "negotiable": null,
                "start_date": "2021\/05\/25",
                "application_url": "",
                "contact_name": "Pop Olivia",
                "email": "amiza@toto.com",
                "phone": "",
                "phone_hidden": null,
                "city_id": "48164",
                "lat": "34.05",
                "lon": "-118.24",
                "address": null,
                "ip_addr": "::1",
                "visits": "0",
                "tmp_token": "354cfc172fc3e6148243e874efd92471",
                "email_token": "91f73d7a92b05ea24c65002e6c0b20d3",
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "reviewed": "0",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-05-08T15:34:56.000000Z",
                "deletion_mail_sent_at": null,
                "partner": null,
                "created_at": "2021-05-08T15:33:48.000000Z",
                "updated_at": "2021-05-08T15:34:56.000000Z",
                "slug": "post-free-ads",
                "created_at_formatted": "May 8th, 2021 at 11:33",
                "user_photo_url": "http:\/\/jobclass.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 301,
                "country_code": "US",
                "user_id": "1973",
                "company_id": "133",
                "company_name": "Brekke-Gusikowski",
                "logo": "app\/default\/picture.jpg",
                "company_description": "Officia corrupti voluptatem reprehenderit voluptatum nostrum atque ut. Natus dolor dolor quae beatae ipsum ad est. Et odit corrupti exercitationem et qui nihil. Repellendus odio autem nemo eos fugit amet dolorem. Iusto et aut magni.",
                "category_id": "1",
                "post_type_id": "3",
                "title": "Translator 3 years of experience",
                "description": "Dolorem omnis aut eaque voluptatibus aut eos. Recusandae est incidunt nihil cupiditate tempora et deleniti. Modi nobis odit velit et. Quibusdam autem quod est reprehenderit nesciunt ut enim et.\n\nEaque recusandae debitis aut maxime impedit modi dolorem. Reiciendis alias totam nulla unde dolore. Non cumque et aut. Sed modi aut deserunt vitae reiciendis.\n\nDignissimos corrupti maiores illo fuga laborum nemo. Velit rerum deleniti accusantium ratione dolores quibusdam aut. Est sed possimus doloribus facere nam modi. Autem ipsam ut delectus saepe.",
                "tags": "illum,ut,deleniti",
                "salary_min": "0.00",
                "salary_max": "7446.00",
                "salary_type_id": "2",
                "negotiable": "1",
                "start_date": "2021-03-26",
                "application_url": null,
                "contact_name": "Alysha Funk",
                "email": "gisselle.reichel@hotmail.com",
                "phone": "+12293474377",
                "phone_hidden": "0",
                "city_id": "47585",
                "lat": "43.43",
                "lon": "-96.70",
                "address": null,
                "ip_addr": "84.211.186.160",
                "visits": "43725",
                "tmp_token": null,
                "email_token": null,
                "phone_token": "demoFaker",
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "1",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-02-18T21:56:21.000000Z",
                "deletion_mail_sent_at": null,
                "partner": null,
                "created_at": "2021-03-15T15:30:46.000000Z",
                "updated_at": "2021-02-18T21:56:21.000000Z",
                "slug": "translator-3-years-of-experience",
                "created_at_formatted": "Mar 15th, 2021 at 11:30",
                "user_photo_url": "http:\/\/jobclass.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 27,
                "country_code": "US",
                "user_id": "3",
                "company_id": "57",
                "company_name": "Stark Group",
                "logo": "files\/us\/3\/fbcdc78f207fb671dfc8ee5421ade453.png",
                "company_description": "Aliquam qui consequatur accusantium voluptas nam enim. Aut sed ipsa cupiditate sequi sit ex. Esse neque dolorem repellat nisi quia eaque. Animi aut ullam ut nisi.",
                "category_id": "2",
                "post_type_id": "5",
                "title": "Restaurant Chain Executive",
                "description": "Quae dolores qui autem et ut soluta omnis. Explicabo reiciendis nesciunt dolor iste. Totam ut eum eos ipsum molestiae commodi est enim. Autem nobis quas animi recusandae. Magnam esse ea dolores minima ipsum aut ratione.\n\nCumque est a aut corporis. Est rerum eos quis perspiciatis doloribus enim velit. Rerum omnis sint autem est saepe similique consectetur.\n\nProvident a aliquid qui aut odio. Eligendi qui vel numquam id aut inventore sunt. Consequatur consequatur ad quis eos.\n\nSed rerum consequatur qui qui et tempora quia. Consequatur optio voluptate sed corrupti qui dolorem esse qui. Et laudantium unde velit rem officia molestiae. Aut omnis quo consectetur et.\n\nNostrum sunt facere doloribus rem sunt aspernatur. Totam dolor error minima sed magnam esse dolorem quia. Aspernatur distinctio id nihil esse. Voluptate omnis consequuntur magni rem consectetur.",
                "tags": "sit,ducimus,incidunt",
                "salary_min": "56.00",
                "salary_max": "2821.00",
                "salary_type_id": "2",
                "negotiable": "1",
                "start_date": "2021-03-23",
                "application_url": null,
                "contact_name": "Company Demo",
                "email": "company@demosite.com",
                "phone": "+1980877677",
                "phone_hidden": "0",
                "city_id": "44987",
                "lat": "36.69",
                "lon": "-77.54",
                "address": null,
                "ip_addr": "3.79.188.28",
                "visits": "49",
                "tmp_token": null,
                "email_token": null,
                "phone_token": "demoFaker",
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "1",
                "reviewed": "1",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-03-30T07:20:48.000000Z",
                "deletion_mail_sent_at": null,
                "partner": null,
                "created_at": "2021-03-15T15:00:40.000000Z",
                "updated_at": "2021-03-30T07:20:48.000000Z",
                "slug": "restaurant-chain-executive",
                "created_at_formatted": "Mar 15th, 2021 at 11:00",
                "user_photo_url": "http:\/\/jobclass.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 2171,
                "country_code": "US",
                "user_id": "731",
                "company_id": "322",
                "company_name": "Bahringer, Muller And Goldner",
                "logo": "app\/default\/picture.jpg",
                "company_description": "Odit nemo quos modi et dolores corrupti. Exercitationem eos autem aut beatae cumque cupiditate praesentium. Voluptas voluptatum eum voluptates sunt.",
                "category_id": "14",
                "post_type_id": "4",
                "title": "Wedding Coordinator 5 years of experience",
                "description": "Ut soluta minus consequatur aliquid dolore quo est. Porro minima eos autem minima ea. Vel sit velit beatae iste a quo. Ad suscipit quaerat quos necessitatibus laborum numquam fugiat.\n\nEt consequuntur consequatur libero reiciendis itaque nihil. Enim expedita quisquam harum vitae vel. Nemo amet vel porro fuga non. Odio cumque eum inventore sint.\n\nAccusamus est nesciunt sapiente id doloribus. Nesciunt qui voluptates voluptatum id rem odit architecto. Ut quia totam aut harum iusto maiores. Doloremque placeat mollitia fugit aut enim beatae ea aut.",
                "tags": "iste,accusamus,voluptas",
                "salary_min": "87.00",
                "salary_max": "74537.00",
                "salary_type_id": "2",
                "negotiable": "0",
                "start_date": "2021-03-30",
                "application_url": null,
                "contact_name": "Mose Walter",
                "email": "hadley41@gmail.com",
                "phone": "+12305375103",
                "phone_hidden": "0",
                "city_id": "47567",
                "lat": "41.55",
                "lon": "-71.47",
                "address": null,
                "ip_addr": "148.126.128.114",
                "visits": "2712",
                "tmp_token": null,
                "email_token": null,
                "phone_token": "demoFaker",
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "reviewed": "1",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-03-10T01:59:38.000000Z",
                "deletion_mail_sent_at": null,
                "partner": null,
                "created_at": "2021-03-15T12:58:55.000000Z",
                "updated_at": "2021-03-10T01:59:38.000000Z",
                "slug": "wedding-coordinator-5-years-of-experience",
                "created_at_formatted": "Mar 15th, 2021 at 08:58",
                "user_photo_url": "http:\/\/jobclass.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 8,
                "country_code": "US",
                "user_id": "2",
                "company_id": "10",
                "company_name": "Rau LLC",
                "logo": "files\/us\/2\/36848896b7b0f344d7803738fa5f1bbe.png",
                "company_description": "Ea nihil consequatur amet. Commodi quia odio adipisci ab delectus consequatur. Accusantium voluptatem voluptas officiis asperiores architecto.",
                "category_id": "11",
                "post_type_id": "6",
                "title": "Looking for Software Ninjaneer",
                "description": "Sed et magni harum sunt modi eveniet. Voluptate aut velit sunt. Corporis suscipit dicta temporibus perspiciatis aperiam. Voluptatem perferendis quia sint voluptatem aspernatur ea cupiditate.\n\nQuis reiciendis aut asperiores iusto. Dolorem officia tempore quo magni dolores. Aspernatur natus et ut quo esse.\n\nEst quod suscipit architecto vel consequuntur commodi et aliquam. Veniam fugit maxime aut sit consequatur quod veritatis. Quia et quas neque ducimus unde aut voluptate. Eaque odit dolor eum voluptatem ex.",
                "tags": "ut,consequuntur,beatae",
                "salary_min": "57.00",
                "salary_max": "219.00",
                "salary_type_id": "1",
                "negotiable": "0",
                "start_date": "2021-03-29",
                "application_url": null,
                "contact_name": "Admin Demo",
                "email": "admin@demosite.com",
                "phone": "+1876675678",
                "phone_hidden": "0",
                "city_id": "42954",
                "lat": "26.66",
                "lon": "-80.24",
                "address": null,
                "ip_addr": "165.56.44.189",
                "visits": "3186",
                "tmp_token": null,
                "email_token": null,
                "phone_token": "demoFaker",
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "1",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-03-12T21:55:31.000000Z",
                "deletion_mail_sent_at": null,
                "partner": null,
                "created_at": "2021-03-15T09:31:44.000000Z",
                "updated_at": "2021-03-12T21:55:31.000000Z",
                "slug": "looking-for-software-ninjaneer",
                "created_at_formatted": "Mar 15th, 2021 at 05:31",
                "user_photo_url": "http:\/\/jobclass.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 39,
                "country_code": "US",
                "user_id": "3",
                "company_id": "43",
                "company_name": "Berge Group",
                "logo": "files\/us\/3\/570a41c06edaf300ed727454d8feb2f4.png",
                "company_description": "Animi et inventore omnis minima quo. Sunt et ratione nesciunt.",
                "category_id": "6",
                "post_type_id": "4",
                "title": "Finance Manager to hire",
                "description": "Voluptatum occaecati accusamus error qui. Repudiandae et voluptatem debitis ipsum nam praesentium. Debitis rerum architecto dolorum.\n\nLabore quia odio nihil sapiente alias tempore placeat. Nihil voluptatibus esse doloribus numquam quia. Quisquam rerum quidem voluptatem quo et esse omnis. Similique et minima voluptates tempora sit qui.\n\nVoluptate a labore et quia. Blanditiis est qui nobis commodi voluptas soluta eveniet. Nisi ex autem deserunt eos. Consequatur omnis et aut rerum iste eveniet voluptatem.\n\nVel ducimus sed debitis iusto optio. Quos ut officia consequatur odio facilis quod rerum.\n\nMolestiae numquam hic eum consectetur voluptas quia soluta. Veritatis quidem similique ducimus commodi tempora. Ducimus ab quam qui corrupti ea voluptatem sequi.",
                "tags": "est,voluptatem,aut",
                "salary_min": "67.00",
                "salary_max": "339.00",
                "salary_type_id": "1",
                "negotiable": "1",
                "start_date": "2021-04-05",
                "application_url": null,
                "contact_name": "Company Demo",
                "email": "company@demosite.com",
                "phone": "+1980877677",
                "phone_hidden": "0",
                "city_id": "44548",
                "lat": "35.34",
                "lon": "-89.90",
                "address": null,
                "ip_addr": "91.25.71.17",
                "visits": "19",
                "tmp_token": null,
                "email_token": null,
                "phone_token": "demoFaker",
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "reviewed": "1",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-03-10T02:30:51.000000Z",
                "deletion_mail_sent_at": null,
                "partner": null,
                "created_at": "2021-03-15T09:28:40.000000Z",
                "updated_at": "2021-03-10T02:30:51.000000Z",
                "slug": "finance-manager-to-hire",
                "created_at_formatted": "Mar 15th, 2021 at 05:28",
                "user_photo_url": "http:\/\/jobclass.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 885,
                "country_code": "US",
                "user_id": "2126",
                "company_id": "93",
                "company_name": "Quitzon-Rice",
                "logo": "app\/default\/picture.jpg",
                "company_description": "Enim enim quasi nihil ea. Et aut eveniet sit. Consequatur fuga esse numquam itaque dolores voluptas voluptas molestiae.",
                "category_id": "14",
                "post_type_id": "7",
                "title": "Immediate: Plumber",
                "description": "Nam perspiciatis aspernatur perferendis sit et eaque ipsam. Et recusandae beatae est ea dicta soluta. Voluptas asperiores sequi distinctio facere. Optio distinctio voluptas sapiente.\n\nIure et omnis doloribus illum repellendus omnis vel. Praesentium est quia at dolor minus laborum quod. Saepe est voluptatibus rem.",
                "tags": "natus,fuga,optio",
                "salary_min": "89.00",
                "salary_max": "624.00",
                "salary_type_id": "2",
                "negotiable": "0",
                "start_date": "2021-03-17",
                "application_url": null,
                "contact_name": "Alberta Kozey",
                "email": "hertha37@hotmail.com",
                "phone": "+16392618592",
                "phone_hidden": "0",
                "city_id": "46442",
                "lat": "40.77",
                "lon": "-74.20",
                "address": null,
                "ip_addr": "91.176.56.157",
                "visits": "21833",
                "tmp_token": null,
                "email_token": null,
                "phone_token": "demoFaker",
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "reviewed": "1",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-02-18T15:38:10.000000Z",
                "deletion_mail_sent_at": null,
                "partner": null,
                "created_at": "2021-03-13T17:44:32.000000Z",
                "updated_at": "2021-02-18T15:38:10.000000Z",
                "slug": "immediate-plumber",
                "created_at_formatted": "Mar 13th, 2021 at 12:44",
                "user_photo_url": "http:\/\/jobclass.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 432,
                "country_code": "US",
                "user_id": "1382",
                "company_id": "387",
                "company_name": "O'Connell And Sons",
                "logo": "app\/default\/picture.jpg",
                "company_description": "Nemo fugiat quaerat ut amet unde dolorem. Iusto quibusdam natus quas pariatur. Eligendi fugiat temporibus doloribus asperiores esse. Iste sequi reiciendis et doloremque dolorem.",
                "category_id": "6",
                "post_type_id": "5",
                "title": "Junior Speech Pathologist",
                "description": "Sunt quia assumenda sit provident. Maiores est nihil aut quaerat nobis sequi officia alias. Voluptatem non eum voluptatem quia modi molestiae a. Nihil deserunt tempore vel atque nam sunt facilis. Et laudantium sunt vitae.\n\nIn quae repudiandae fuga voluptatem. Quis deleniti omnis voluptatem temporibus ut. Mollitia blanditiis ab aut blanditiis est perferendis aut deserunt. Minus hic consectetur molestiae.\n\nRerum tenetur expedita ut qui voluptates repudiandae. Cupiditate velit sed error. Dolor eius qui accusantium est hic.",
                "tags": "quo,cumque,numquam",
                "salary_min": "10.00",
                "salary_max": "441.00",
                "salary_type_id": "1",
                "negotiable": "0",
                "start_date": "2021-04-05",
                "application_url": null,
                "contact_name": "Abbigail Keebler",
                "email": "feest.haleigh@yahoo.com",
                "phone": "+13368511369",
                "phone_hidden": "0",
                "city_id": "46363",
                "lat": "43.70",
                "lon": "-72.29",
                "address": null,
                "ip_addr": "23.145.49.161",
                "visits": "69",
                "tmp_token": null,
                "email_token": null,
                "phone_token": "demoFaker",
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "1",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-02-16T15:49:50.000000Z",
                "deletion_mail_sent_at": null,
                "partner": null,
                "created_at": "2021-03-13T09:56:03.000000Z",
                "updated_at": "2021-02-16T15:49:50.000000Z",
                "slug": "junior-speech-pathologist",
                "created_at_formatted": "Mar 13th, 2021 at 04:56",
                "user_photo_url": "http:\/\/jobclass.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 1249,
                "country_code": "US",
                "user_id": "1289",
                "company_id": "512",
                "company_name": "Hane LLC",
                "logo": "app\/default\/picture.jpg",
                "company_description": "Voluptatem aut at velit aut ipsam sapiente. Voluptatem aut ut reiciendis quo. Et ut et fugiat ut deserunt molestiae et aperiam. In nisi in facere.",
                "category_id": "8",
                "post_type_id": "3",
                "title": "Hiring Operations Director",
                "description": "Ad qui et ex earum veniam minima eveniet. Assumenda voluptas repellat nulla nihil ducimus. Ut ut perferendis suscipit.\n\nFugiat distinctio quisquam sit quidem recusandae est. Nulla expedita qui quae. Illum aut est minus officia dolores necessitatibus. Veniam ut aut numquam quia sed optio.\n\nUnde aut voluptatum nesciunt. Illo est debitis beatae aut rerum. Corrupti quibusdam nihil distinctio soluta officia et ducimus.\n\nOmnis ut quia sequi nulla totam iusto voluptatem. Et nisi nam est nobis delectus est.",
                "tags": "inventore,eveniet,qui",
                "salary_min": "14.00",
                "salary_max": "76791.00",
                "salary_type_id": "1",
                "negotiable": "0",
                "start_date": "2021-03-23",
                "application_url": null,
                "contact_name": "Mauricio Orn",
                "email": "grady00@yahoo.com",
                "phone": "+18197893173",
                "phone_hidden": "0",
                "city_id": "47266",
                "lat": "40.14",
                "lon": "-84.24",
                "address": null,
                "ip_addr": "133.239.58.42",
                "visits": "357",
                "tmp_token": null,
                "email_token": null,
                "phone_token": "demoFaker",
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "1",
                "reviewed": "1",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-02-26T10:14:10.000000Z",
                "deletion_mail_sent_at": null,
                "partner": null,
                "created_at": "2021-03-13T06:03:11.000000Z",
                "updated_at": "2021-02-26T10:14:10.000000Z",
                "slug": "hiring-operations-director",
                "created_at_formatted": "Mar 13th, 2021 at 01:03",
                "user_photo_url": "http:\/\/jobclass.bedigit.local\/images\/user.jpg"
            }
        ]
    },
    "extra": {
        "count": null,
        "preSearch": []
    }
}</code></pre>
<div id="execution-results-GETapi-posts" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts"></code></pre>
</div>
<div id="execution-error-GETapi-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts"></code></pre>
</div>
<form id="form-GETapi-posts" data-method="GET" data-path="api/posts" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-posts" onclick="tryItOut('GETapi-posts');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-posts" onclick="cancelTryOut('GETapi-posts');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-posts" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/posts</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-posts" data-component="query"  hidden>
<br>
Comma-separated list of the post relationships for Eager Loading. Possible values: user,category,postType,city,latestPayment,savedByLoggedUser,pictures
</p>
</form>
<h2>Get post</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/posts/2?embed=exercitationem&amp;detailed=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/posts/2"
);

let params = {
    "embed": "exercitationem",
    "detailed": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/posts/2',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'embed'=&gt; 'exercitationem',
            'detailed'=&gt; '',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": null,
    "result": {
        "id": 2,
        "country_code": "US",
        "user_id": "2",
        "company_id": "16",
        "company_name": "Turner, O'Conner And Tillman",
        "logo": "files\/us\/2\/bbb05214f9ddab0d69fe44de9f7d300b.png",
        "company_description": "Eos molestiae placeat sequi eaque sed iusto. Reiciendis magnam maiores reiciendis nihil. Quod aut consequuntur facilis illum itaque a sunt. Fuga nesciunt et aut ut.",
        "category_id": "12",
        "post_type_id": "6",
        "title": "Conservation Volunteer Junior",
        "description": "Illo sunt illum sit ullam. Vitae quis nemo soluta cumque ut autem. Facilis consequatur sequi a voluptas.\n\nDucimus sint velit officia. Totam debitis non quo aut non. Voluptate laudantium et aut et unde. Dolorem nulla aut adipisci et autem.\n\nDoloremque saepe est et. Eos dolores quia adipisci ut excepturi. Temporibus voluptas amet nihil aperiam voluptatibus est voluptas. Unde rerum a praesentium non.",
        "tags": "perspiciatis,aut,ut",
        "salary_min": "65.00",
        "salary_max": "8627.00",
        "salary_type_id": "1",
        "negotiable": "1",
        "start_date": "2021-04-07",
        "application_url": null,
        "contact_name": "Admin Demo",
        "email": "admin@demosite.com",
        "phone": "+1876675678",
        "phone_hidden": "0",
        "city_id": "44398",
        "lat": "34.30",
        "lon": "-79.88",
        "address": null,
        "ip_addr": "111.216.155.90",
        "visits": 69,
        "tmp_token": null,
        "email_token": null,
        "phone_token": "demoFaker",
        "verified_email": "1",
        "verified_phone": "1",
        "accept_terms": "1",
        "accept_marketing_offers": "0",
        "reviewed": "1",
        "featured": "1",
        "archived": "0",
        "archived_at": "2021-06-25T16:49:15.000000Z",
        "deletion_mail_sent_at": null,
        "partner": null,
        "created_at": "2021-03-06T09:38:59.000000Z",
        "updated_at": "2021-06-25T16:49:15.000000Z",
        "slug": "conservation-volunteer-junior",
        "created_at_formatted": "Mar 6th, 2021 at 04:38",
        "user_photo_url": "http:\/\/jobclass.bedigit.local\/images\/user.jpg"
    }
}</code></pre>
<div id="execution-results-GETapi-posts--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts--id-"></code></pre>
</div>
<div id="execution-error-GETapi-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts--id-"></code></pre>
</div>
<form id="form-GETapi-posts--id-" data-method="GET" data-path="api/posts/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-posts--id-" onclick="tryItOut('GETapi-posts--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-posts--id-" onclick="cancelTryOut('GETapi-posts--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-posts--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/posts/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id" data-endpoint="GETapi-posts--id-" data-component="url"  hidden>
<br>
The post's ID.
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-posts--id-" data-component="query"  hidden>
<br>
Comma-separated list of the post relationships for Eager Loading. Possible values: user,category,postType,city,latestPayment,savedByLoggedUser,pictures
</p>
<p>
<b><code>detailed</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="GETapi-posts--id-" hidden><input type="radio" name="detailed" value="1" data-endpoint="GETapi-posts--id-" data-component="query" ><code>true</code></label>
<label data-endpoint="GETapi-posts--id-" hidden><input type="radio" name="detailed" value="0" data-endpoint="GETapi-posts--id-" data-component="query" ><code>false</code></label>
<br>
Allow to get the post's details with all its relationships (No need to set the 'embed' parameter).
</p>
</form>
<h2>Store post</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>For both types of post's creation (Single step or Multi steps).
Note: The field 'admin_code' is only available when the post's country's 'admin_type' column is set to 1 or 2 and the 'admin_field_active' column is set to 1.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://jobclass.bedigit.local/api/posts" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
    -d ''
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/posts"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://jobclass.bedigit.local/api/posts',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'json' =&gt; [
            'category_id' =&gt; 1,
            'post_type_id' =&gt; 1,
            'title' =&gt; 'John Doe',
            'description' =&gt; 'Beatae placeat atque tempore consequatur animi magni omnis.',
            'salary_type_id' =&gt; 'consectetur',
            'contact_name' =&gt; 'John Doe',
            'email' =&gt; 'john.doe@domain.tld',
            'phone' =&gt; '+17656766467',
            'city_id' =&gt; 11,
            'start_date' =&gt; [],
            'accept_terms' =&gt; false,
            'company' =&gt; [
                'name' =&gt; 'enim',
                'description' =&gt; 'rem',
                [
                    'name' =&gt; 'Foo Inc',
                    'logo' =&gt; null,
                    'description' =&gt; 'Nostrum quia est aut quas.',
                ],
            ],
            'country_code' =&gt; 'US',
            'company_id' =&gt; 11,
            'admin_code' =&gt; '0',
            'price' =&gt; 5000,
            'negotiable' =&gt; false,
            'phone_hidden' =&gt; false,
            'ip_addr' =&gt; 'magni',
            'accept_marketing_offers' =&gt; false,
            'is_permanent' =&gt; true,
            'tags' =&gt; 'car,automotive,tesla,cyber,truck',
            'package_id' =&gt; 2,
            'payment_method_id' =&gt; 5,
            'captcha_key' =&gt; 'rerum',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (422):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "An error occurred while validating the data.",
    "errors": {
        "category_id": [
            "The category field is required."
        ],
        "post_type_id": [
            "The post type field is required."
        ],
        "title": [
            "The title field is required."
        ],
        "description": [
            "The description field is required."
        ],
        "salary_type_id": [
            "The salary type id field is required."
        ],
        "contact_name": [
            "The name field is required."
        ],
        "email": [
            "The email address field is required."
        ],
        "phone": [
            "The phone field is required when email address is not present."
        ],
        "city_id": [
            "The city field is required."
        ],
        "accept_terms": [
            "The terms must be accepted."
        ],
        "company.name": [
            "The company name field is required."
        ],
        "company.description": [
            "The company description field is required."
        ]
    }
}</code></pre>
<div id="execution-results-POSTapi-posts" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-posts"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-posts"></code></pre>
</div>
<div id="execution-error-POSTapi-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-posts"></code></pre>
</div>
<form id="form-POSTapi-posts" data-method="POST" data-path="api/posts" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-posts', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-posts" onclick="tryItOut('POSTapi-posts');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-posts" onclick="cancelTryOut('POSTapi-posts');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-posts" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/posts</code></b>
</p>
<p>
<label id="auth-POSTapi-posts" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-posts" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>category_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="category_id" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The category's ID.
</p>
<p>
<b><code>post_type_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="post_type_id" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The post type's ID.
</p>
<p>
<b><code>title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="title" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The post's title.
</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="description" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The post's description.
</p>
<p>
<b><code>salary_type_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="salary_type_id" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>contact_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="contact_name" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The post's author name.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The post's author email address (required if mobile phone number doesn't exist).
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The post's author mobile number (required if email doesn't exist).
</p>
<p>
<b><code>city_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="city_id" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The city's ID.
</p>
<p>
<b><code>start_date</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="start_date" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>accept_terms</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="accept_terms" value="true" data-endpoint="POSTapi-posts" data-component="body" required ><code>true</code></label>
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="accept_terms" value="false" data-endpoint="POSTapi-posts" data-component="body" required ><code>false</code></label>
<br>
Accept the website terms and conditions.
</p>
<p>
<details>
<summary>
<b><code>company</code></b>&nbsp;&nbsp;<small>object</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>company[].name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company.0.name" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The company's name (required when 'company_id' is not set).
</p>
<p>
<b><code>company[].description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company.0.description" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The company's description (required when 'company_id' is not set).
</p>
<p>
<b><code>company[].logo</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="company.0.logo" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The company's logo (available when 'company_id' is not set).
</p>
</details>
</p>
<p>
<b><code>country_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country_code" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The code of the user's country.
</p>
<p>
<b><code>company_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="company_id" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The job company's ID.
</p>
<p>
<b><code>admin_code</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="admin_code" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The administrative division's code.
</p>
<p>
<b><code>price</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="price" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The price.
</p>
<p>
<b><code>negotiable</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="negotiable" value="true" data-endpoint="POSTapi-posts" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="negotiable" value="false" data-endpoint="POSTapi-posts" data-component="body" ><code>false</code></label>
<br>
Negotiable price or no.
</p>
<p>
<b><code>phone_hidden</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="phone_hidden" value="true" data-endpoint="POSTapi-posts" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="phone_hidden" value="false" data-endpoint="POSTapi-posts" data-component="body" ><code>false</code></label>
<br>
Mobile phone number will be hidden in public or no.
</p>
<p>
<b><code>ip_addr</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ip_addr" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The post's author IP address.
</p>
<p>
<b><code>accept_marketing_offers</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="accept_marketing_offers" value="true" data-endpoint="POSTapi-posts" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="accept_marketing_offers" value="false" data-endpoint="POSTapi-posts" data-component="body" ><code>false</code></label>
<br>
Accept to receive marketing offers or no.
</p>
<p>
<b><code>is_permanent</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="is_permanent" value="true" data-endpoint="POSTapi-posts" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="is_permanent" value="false" data-endpoint="POSTapi-posts" data-component="body" ><code>false</code></label>
<br>
Is it permanent post or no.
</p>
<p>
<b><code>tags</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="tags" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
Comma-separated tags list.
</p>
<p>
<b><code>package_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="package_id" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The package's ID.
</p>
<p>
<b><code>payment_method_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="payment_method_id" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The payment method's ID (required when the selected package's price is > 0).
</p>
<p>
<b><code>captcha_key</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="captcha_key" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
Key generated by the CAPTCHA endpoint calling (Required if the CAPTCHA verification is enabled from the Admin panel).
</p>

</form>
<h2>Update post</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>Note: The fields 'pictures', 'package_id' and 'payment_method_id' are only available with the single step post edition.
The field 'admin_code' is only available when the post's country's 'admin_type' column is set to 1 or 2 and the 'admin_field_active' column is set to 1.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://jobclass.bedigit.local/api/posts/et" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
    -d ''
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/posts/et"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'https://jobclass.bedigit.local/api/posts/et',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'json' =&gt; [
            'category_id' =&gt; 1,
            'post_type_id' =&gt; 1,
            'title' =&gt; 'John Doe',
            'description' =&gt; 'Beatae placeat atque tempore consequatur animi magni omnis.',
            'salary_type_id' =&gt; 'facilis',
            'contact_name' =&gt; 'John Doe',
            'email' =&gt; 'john.doe@domain.tld',
            'phone' =&gt; '+17656766467',
            'city_id' =&gt; 5,
            'start_date' =&gt; [],
            'accept_terms' =&gt; false,
            'company' =&gt; [
                'name' =&gt; 'sint',
                'description' =&gt; 'et',
                [
                    'name' =&gt; 'Foo Inc',
                    'logo' =&gt; null,
                    'description' =&gt; 'Nostrum quia est aut quas.',
                ],
            ],
            'country_code' =&gt; 'US',
            'company_id' =&gt; 5,
            'admin_code' =&gt; '0',
            'price' =&gt; 5000,
            'negotiable' =&gt; false,
            'phone_hidden' =&gt; false,
            'ip_addr' =&gt; 'veritatis',
            'accept_marketing_offers' =&gt; true,
            'is_permanent' =&gt; false,
            'tags' =&gt; 'car,automotive,tesla,cyber,truck',
            'package_id' =&gt; 2,
            'payment_method_id' =&gt; 5,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-PUTapi-posts--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-posts--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-posts--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-posts--id-"></code></pre>
</div>
<form id="form-PUTapi-posts--id-" data-method="PUT" data-path="api/posts/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-posts--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-posts--id-" onclick="tryItOut('PUTapi-posts--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-posts--id-" onclick="cancelTryOut('PUTapi-posts--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-posts--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/posts/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-posts--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-posts--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-posts--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>category_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="category_id" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The category's ID.
</p>
<p>
<b><code>post_type_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="post_type_id" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The post type's ID.
</p>
<p>
<b><code>title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="title" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The post's title.
</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="description" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The post's description.
</p>
<p>
<b><code>salary_type_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="salary_type_id" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>contact_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="contact_name" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The post's author name.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="email" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The post's author email address (required if mobile phone number doesn't exist).
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The post's author mobile number (required if email doesn't exist).
</p>
<p>
<b><code>city_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="city_id" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The city's ID.
</p>
<p>
<b><code>start_date</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="start_date" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>accept_terms</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="accept_terms" value="true" data-endpoint="PUTapi-posts--id-" data-component="body" required ><code>true</code></label>
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="accept_terms" value="false" data-endpoint="PUTapi-posts--id-" data-component="body" required ><code>false</code></label>
<br>
Accept the website terms and conditions.
</p>
<p>
<details>
<summary>
<b><code>company</code></b>&nbsp;&nbsp;<small>object</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>company[].name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company.0.name" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The company's name (required when 'company_id' is not set).
</p>
<p>
<b><code>company[].description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company.0.description" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The company's description (required when 'company_id' is not set).
</p>
<p>
<b><code>company[].logo</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="company.0.logo" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The company's logo (available when 'company_id' is not set).
</p>
</details>
</p>
<p>
<b><code>country_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country_code" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The code of the user's country.
</p>
<p>
<b><code>company_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="company_id" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The job company's ID.
</p>
<p>
<b><code>admin_code</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="admin_code" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The administrative division's code.
</p>
<p>
<b><code>price</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="price" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The price.
</p>
<p>
<b><code>negotiable</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="negotiable" value="true" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="negotiable" value="false" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>false</code></label>
<br>
Negotiable price or no.
</p>
<p>
<b><code>phone_hidden</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="phone_hidden" value="true" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="phone_hidden" value="false" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>false</code></label>
<br>
Mobile phone number will be hidden in public or no.
</p>
<p>
<b><code>ip_addr</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ip_addr" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The post's author IP address.
</p>
<p>
<b><code>accept_marketing_offers</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="accept_marketing_offers" value="true" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="accept_marketing_offers" value="false" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>false</code></label>
<br>
Accept to receive marketing offers or no.
</p>
<p>
<b><code>is_permanent</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="is_permanent" value="true" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="is_permanent" value="false" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>false</code></label>
<br>
Is it permanent post or no.
</p>
<p>
<b><code>tags</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="tags" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
Comma-separated tags list.
</p>
<p>
<b><code>package_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="package_id" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The package's ID.
</p>
<p>
<b><code>payment_method_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="payment_method_id" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The payment method's ID (required when the selected package's price is > 0).
</p>

</form>
<h2>Delete post(s)</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://jobclass.bedigit.local/api/posts/quia" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/posts/quia"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'https://jobclass.bedigit.local/api/posts/quia',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-DELETEapi-posts--ids-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-posts--ids-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-posts--ids-"></code></pre>
</div>
<div id="execution-error-DELETEapi-posts--ids-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-posts--ids-"></code></pre>
</div>
<form id="form-DELETEapi-posts--ids-" data-method="DELETE" data-path="api/posts/{ids}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-posts--ids-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-posts--ids-" onclick="tryItOut('DELETEapi-posts--ids-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-posts--ids-" onclick="cancelTryOut('DELETEapi-posts--ids-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-posts--ids-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/posts/{ids}</code></b>
</p>
<p>
<label id="auth-DELETEapi-posts--ids-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-posts--ids-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>ids</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ids" data-endpoint="DELETEapi-posts--ids-" data-component="url" required  hidden>
<br>
The ID or comma-separated IDs list of post(s).
</p>
</form>
<h2>Email: Re-send link</h2>
<p>Re-send email verification link to the user</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/posts/excepturi/verify/resend/email?entitySlug=users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/posts/excepturi/verify/resend/email"
);

let params = {
    "entitySlug": "users",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/posts/excepturi/verify/resend/email',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'entitySlug'=&gt; 'users',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-GETapi-posts--id--verify-resend-email" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts--id--verify-resend-email"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts--id--verify-resend-email"></code></pre>
</div>
<div id="execution-error-GETapi-posts--id--verify-resend-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts--id--verify-resend-email"></code></pre>
</div>
<form id="form-GETapi-posts--id--verify-resend-email" data-method="GET" data-path="api/posts/{id}/verify/resend/email" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts--id--verify-resend-email', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-posts--id--verify-resend-email" onclick="tryItOut('GETapi-posts--id--verify-resend-email');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-posts--id--verify-resend-email" onclick="cancelTryOut('GETapi-posts--id--verify-resend-email');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-posts--id--verify-resend-email" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/posts/{id}/verify/resend/email</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-posts--id--verify-resend-email" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>entitySlug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="entitySlug" data-endpoint="GETapi-posts--id--verify-resend-email" data-component="query"  hidden>
<br>
The slug of the entity to verify ('users' or 'posts').
</p>
</form>
<h2>SMS: Re-send code</h2>
<p>Re-send mobile phone verification token by SMS</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/posts/aperiam/verify/resend/sms?entitySlug=users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/posts/aperiam/verify/resend/sms"
);

let params = {
    "entitySlug": "users",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/posts/aperiam/verify/resend/sms',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'entitySlug'=&gt; 'users',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-GETapi-posts--id--verify-resend-sms" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts--id--verify-resend-sms"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts--id--verify-resend-sms"></code></pre>
</div>
<div id="execution-error-GETapi-posts--id--verify-resend-sms" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts--id--verify-resend-sms"></code></pre>
</div>
<form id="form-GETapi-posts--id--verify-resend-sms" data-method="GET" data-path="api/posts/{id}/verify/resend/sms" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts--id--verify-resend-sms', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-posts--id--verify-resend-sms" onclick="tryItOut('GETapi-posts--id--verify-resend-sms');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-posts--id--verify-resend-sms" onclick="cancelTryOut('GETapi-posts--id--verify-resend-sms');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-posts--id--verify-resend-sms" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/posts/{id}/verify/resend/sms</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-posts--id--verify-resend-sms" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>entitySlug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="entitySlug" data-endpoint="GETapi-posts--id--verify-resend-sms" data-component="query"  hidden>
<br>
The slug of the entity to verify ('users' or 'posts').
</p>
</form>
<h2>Verification</h2>
<p>Verify the user's email address or mobile phone number</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/posts/verify/esse/qui?entitySlug=users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/posts/verify/esse/qui"
);

let params = {
    "entitySlug": "users",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/posts/verify/esse/qui',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'entitySlug'=&gt; 'users',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-GETapi-posts-verify--field---token--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts-verify--field---token--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts-verify--field---token--"></code></pre>
</div>
<div id="execution-error-GETapi-posts-verify--field---token--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts-verify--field---token--"></code></pre>
</div>
<form id="form-GETapi-posts-verify--field---token--" data-method="GET" data-path="api/posts/verify/{field}/{token?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts-verify--field---token--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-posts-verify--field---token--" onclick="tryItOut('GETapi-posts-verify--field---token--');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-posts-verify--field---token--" onclick="cancelTryOut('GETapi-posts-verify--field---token--');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-posts-verify--field---token--" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/posts/verify/{field}/{token?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>field</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="field" data-endpoint="GETapi-posts-verify--field---token--" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>token</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="token" data-endpoint="GETapi-posts-verify--field---token--" data-component="url"  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>entitySlug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="entitySlug" data-endpoint="GETapi-posts-verify--field---token--" data-component="query"  hidden>
<br>
The slug of the entity to verify ('users' or 'posts').
</p>
</form><h1>Resumes</h1>
<h2>List resumes</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/resumes?sort=blanditiis" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/resumes"
);

let params = {
    "sort": "blanditiis",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/resumes',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'sort'=&gt; 'blanditiis',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Unauthenticated or Token Expired, Please Login",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-GETapi-resumes" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-resumes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-resumes"></code></pre>
</div>
<div id="execution-error-GETapi-resumes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-resumes"></code></pre>
</div>
<form id="form-GETapi-resumes" data-method="GET" data-path="api/resumes" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-resumes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-resumes" onclick="tryItOut('GETapi-resumes');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-resumes" onclick="cancelTryOut('GETapi-resumes');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-resumes" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/resumes</code></b>
</p>
<p>
<label id="auth-GETapi-resumes" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-resumes" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>sort</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="sort" data-endpoint="GETapi-resumes" data-component="query"  hidden>
<br>
The companies order (Order by DESC with the given column. Use "-" as prefix to order by ASC). Possible values: created_at, name or ...
</p>
</form>
<h2>Get resume</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/resumes/doloribus" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/resumes/doloribus"
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
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/resumes/doloribus',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-GETapi-resumes--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-resumes--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-resumes--id-"></code></pre>
</div>
<div id="execution-error-GETapi-resumes--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-resumes--id-"></code></pre>
</div>
<form id="form-GETapi-resumes--id-" data-method="GET" data-path="api/resumes/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-resumes--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-resumes--id-" onclick="tryItOut('GETapi-resumes--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-resumes--id-" onclick="cancelTryOut('GETapi-resumes--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-resumes--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/resumes/{id}</code></b>
</p>
<p>
<label id="auth-GETapi-resumes--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-resumes--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-resumes--id-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>Store resume</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://jobclass.bedigit.local/api/resumes" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/resumes"
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
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://jobclass.bedigit.local/api/resumes',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Unauthenticated or Token Expired, Please Login",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-POSTapi-resumes" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-resumes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-resumes"></code></pre>
</div>
<div id="execution-error-POSTapi-resumes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-resumes"></code></pre>
</div>
<form id="form-POSTapi-resumes" data-method="POST" data-path="api/resumes" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-resumes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-resumes" onclick="tryItOut('POSTapi-resumes');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-resumes" onclick="cancelTryOut('POSTapi-resumes');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-resumes" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/resumes</code></b>
</p>
<p>
<label id="auth-POSTapi-resumes" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-resumes" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<details>
<summary>
<b><code>resume</code></b>&nbsp;&nbsp;<small>object</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>resume[].country_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="resume.0.country_code" data-endpoint="POSTapi-resumes" data-component="body" required  hidden>
<br>
The code of the user's country.
</p>
<p>
<b><code>resume[].name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="resume.0.name" data-endpoint="POSTapi-resumes" data-component="body"  hidden>
<br>
The resume's name.
</p>
<p>
<b><code>resume[].filename</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
<input type="file" name="resume.0.filename" data-endpoint="POSTapi-resumes" data-component="body" required  hidden>
<br>
The resume's attached file.
</p>
</details>
</p>

</form>
<h2>Update resume</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://jobclass.bedigit.local/api/resumes/non" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/resumes/non"
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
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'https://jobclass.bedigit.local/api/resumes/non',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-PUTapi-resumes--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-resumes--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-resumes--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-resumes--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-resumes--id-"></code></pre>
</div>
<form id="form-PUTapi-resumes--id-" data-method="PUT" data-path="api/resumes/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-resumes--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-resumes--id-" onclick="tryItOut('PUTapi-resumes--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-resumes--id-" onclick="cancelTryOut('PUTapi-resumes--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-resumes--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/resumes/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-resumes--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-resumes--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-resumes--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<details>
<summary>
<b><code>resume</code></b>&nbsp;&nbsp;<small>object</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>resume[].name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="resume.0.name" data-endpoint="PUTapi-resumes--id-" data-component="body"  hidden>
<br>
The resume's name.
</p>
<p>
<b><code>resume[].filename</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
<input type="file" name="resume.0.filename" data-endpoint="PUTapi-resumes--id-" data-component="body" required  hidden>
<br>
The resume's attached file.
</p>
</details>
</p>

</form>
<h2>Delete resume(s)</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://jobclass.bedigit.local/api/resumes/assumenda" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/resumes/assumenda"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'https://jobclass.bedigit.local/api/resumes/assumenda',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-DELETEapi-resumes--ids-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-resumes--ids-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-resumes--ids-"></code></pre>
</div>
<div id="execution-error-DELETEapi-resumes--ids-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-resumes--ids-"></code></pre>
</div>
<form id="form-DELETEapi-resumes--ids-" data-method="DELETE" data-path="api/resumes/{ids}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-resumes--ids-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-resumes--ids-" onclick="tryItOut('DELETEapi-resumes--ids-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-resumes--ids-" onclick="cancelTryOut('DELETEapi-resumes--ids-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-resumes--ids-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/resumes/{ids}</code></b>
</p>
<p>
<label id="auth-DELETEapi-resumes--ids-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-resumes--ids-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>ids</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ids" data-endpoint="DELETEapi-resumes--ids-" data-component="url" required  hidden>
<br>
The ID or comma-separated IDs list of resume(s).
</p>
</form><h1>Saved Posts</h1>
<h2>List saved posts</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/savedPosts?country_code=US&amp;sort=facere" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/savedPosts"
);

let params = {
    "country_code": "US",
    "sort": "facere",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/savedPosts',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'country_code'=&gt; 'US',
            'sort'=&gt; 'facere',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Unauthenticated or Token Expired, Please Login",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-GETapi-savedPosts" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-savedPosts"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-savedPosts"></code></pre>
</div>
<div id="execution-error-GETapi-savedPosts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-savedPosts"></code></pre>
</div>
<form id="form-GETapi-savedPosts" data-method="GET" data-path="api/savedPosts" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-savedPosts', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-savedPosts" onclick="tryItOut('GETapi-savedPosts');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-savedPosts" onclick="cancelTryOut('GETapi-savedPosts');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-savedPosts" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/savedPosts</code></b>
</p>
<p>
<label id="auth-GETapi-savedPosts" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-savedPosts" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>country_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country_code" data-endpoint="GETapi-savedPosts" data-component="query" required  hidden>
<br>
The code of the user's country.
</p>
<p>
<b><code>sort</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sort" data-endpoint="GETapi-savedPosts" data-component="query" required  hidden>
<br>
The sorting parameter. Sort by ascending with the prefix (-) or by descending without this prefix.
</p>
</form>
<h2>Delete saved post(s)</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://jobclass.bedigit.local/api/savedPosts/quia" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/savedPosts/quia"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'https://jobclass.bedigit.local/api/savedPosts/quia',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-DELETEapi-savedPosts--ids-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-savedPosts--ids-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-savedPosts--ids-"></code></pre>
</div>
<div id="execution-error-DELETEapi-savedPosts--ids-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-savedPosts--ids-"></code></pre>
</div>
<form id="form-DELETEapi-savedPosts--ids-" data-method="DELETE" data-path="api/savedPosts/{ids}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-savedPosts--ids-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-savedPosts--ids-" onclick="tryItOut('DELETEapi-savedPosts--ids-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-savedPosts--ids-" onclick="cancelTryOut('DELETEapi-savedPosts--ids-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-savedPosts--ids-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/savedPosts/{ids}</code></b>
</p>
<p>
<label id="auth-DELETEapi-savedPosts--ids-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-savedPosts--ids-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>ids</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ids" data-endpoint="DELETEapi-savedPosts--ids-" data-component="url" required  hidden>
<br>
The ID or comma-separated IDs list of saved post(s).
</p>
</form><h1>Saved Searches</h1>
<h2>List saved searches</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/savedSearches" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/savedSearches"
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
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/savedSearches',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Unauthenticated or Token Expired, Please Login",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-GETapi-savedSearches" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-savedSearches"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-savedSearches"></code></pre>
</div>
<div id="execution-error-GETapi-savedSearches" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-savedSearches"></code></pre>
</div>
<form id="form-GETapi-savedSearches" data-method="GET" data-path="api/savedSearches" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-savedSearches', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-savedSearches" onclick="tryItOut('GETapi-savedSearches');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-savedSearches" onclick="cancelTryOut('GETapi-savedSearches');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-savedSearches" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/savedSearches</code></b>
</p>
<p>
<label id="auth-GETapi-savedSearches" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-savedSearches" data-component="header"></label>
</p>
</form>
<h2>Delete saved search(es)</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://jobclass.bedigit.local/api/savedSearches/maxime" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/savedSearches/maxime"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'https://jobclass.bedigit.local/api/savedSearches/maxime',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-DELETEapi-savedSearches--ids-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-savedSearches--ids-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-savedSearches--ids-"></code></pre>
</div>
<div id="execution-error-DELETEapi-savedSearches--ids-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-savedSearches--ids-"></code></pre>
</div>
<form id="form-DELETEapi-savedSearches--ids-" data-method="DELETE" data-path="api/savedSearches/{ids}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-savedSearches--ids-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-savedSearches--ids-" onclick="tryItOut('DELETEapi-savedSearches--ids-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-savedSearches--ids-" onclick="cancelTryOut('DELETEapi-savedSearches--ids-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-savedSearches--ids-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/savedSearches/{ids}</code></b>
</p>
<p>
<label id="auth-DELETEapi-savedSearches--ids-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-savedSearches--ids-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>ids</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ids" data-endpoint="DELETEapi-savedSearches--ids-" data-component="url" required  hidden>
<br>
The ID or comma-separated IDs list of saved search(es).
</p>
</form><h1>Settings</h1>
<h2>List settings</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/settings"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/settings',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (429):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Too Many Requests,Please Slow Down",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-GETapi-settings" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-settings"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-settings"></code></pre>
</div>
<div id="execution-error-GETapi-settings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-settings"></code></pre>
</div>
<form id="form-GETapi-settings" data-method="GET" data-path="api/settings" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-settings', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-settings" onclick="tryItOut('GETapi-settings');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-settings" onclick="cancelTryOut('GETapi-settings');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-settings" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/settings</code></b>
</p>
</form>
<h2>Get setting</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/settings/ut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/settings/ut"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/settings/ut',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (429):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Too Many Requests,Please Slow Down",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-GETapi-settings--key-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-settings--key-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-settings--key-"></code></pre>
</div>
<div id="execution-error-GETapi-settings--key-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-settings--key-"></code></pre>
</div>
<form id="form-GETapi-settings--key-" data-method="GET" data-path="api/settings/{key}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-settings--key-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-settings--key-" onclick="tryItOut('GETapi-settings--key-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-settings--key-" onclick="cancelTryOut('GETapi-settings--key-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-settings--key-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/settings/{key}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>key</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="key" data-endpoint="GETapi-settings--key-" data-component="url" required  hidden>
<br>

</p>
</form><h1>Social Auth</h1>
<h2>Get target URL</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/auth/recusandae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/auth/recusandae"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/auth/recusandae',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-GETapi-auth--provider-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-auth--provider-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth--provider-"></code></pre>
</div>
<div id="execution-error-GETapi-auth--provider-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth--provider-"></code></pre>
</div>
<form id="form-GETapi-auth--provider-" data-method="GET" data-path="api/auth/{provider}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-auth--provider-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-auth--provider-" onclick="tryItOut('GETapi-auth--provider-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-auth--provider-" onclick="cancelTryOut('GETapi-auth--provider-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-auth--provider-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/auth/{provider}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>provider</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="provider" data-endpoint="GETapi-auth--provider-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>Get user info</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/auth/labore/callback" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/auth/labore/callback"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/auth/labore/callback',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-GETapi-auth--provider--callback" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-auth--provider--callback"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth--provider--callback"></code></pre>
</div>
<div id="execution-error-GETapi-auth--provider--callback" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth--provider--callback"></code></pre>
</div>
<form id="form-GETapi-auth--provider--callback" data-method="GET" data-path="api/auth/{provider}/callback" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-auth--provider--callback', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-auth--provider--callback" onclick="tryItOut('GETapi-auth--provider--callback');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-auth--provider--callback" onclick="cancelTryOut('GETapi-auth--provider--callback');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-auth--provider--callback" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/auth/{provider}/callback</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>provider</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="provider" data-endpoint="GETapi-auth--provider--callback" data-component="url" required  hidden>
<br>

</p>
</form><h1>Threads</h1>
<h2>List threads</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>Get all logged user's threads
Filters:</p>
<ul>
<li>unread: Get the logged user's unread threads</li>
<li>started: Get the logged user's started threads</li>
<li>important: Get the logged user's make as important threads</li>
</ul>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/threads?filter=est" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/threads"
);

let params = {
    "filter": "est",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/threads',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'filter'=&gt; 'est',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Unauthenticated or Token Expired, Please Login",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-GETapi-threads" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-threads"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-threads"></code></pre>
</div>
<div id="execution-error-GETapi-threads" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-threads"></code></pre>
</div>
<form id="form-GETapi-threads" data-method="GET" data-path="api/threads" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-threads', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-threads" onclick="tryItOut('GETapi-threads');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-threads" onclick="cancelTryOut('GETapi-threads');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-threads" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/threads</code></b>
</p>
<p>
<label id="auth-GETapi-threads" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-threads" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>filter</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="filter" data-endpoint="GETapi-threads" data-component="query"  hidden>
<br>
Filter for the list. Possible value: unread, started or important
</p>
</form>
<h2>Get thread</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>Get a thread (owned by the logged user) details</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/threads/dignissimos" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/threads/dignissimos"
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
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/threads/dignissimos',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-GETapi-threads--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-threads--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-threads--id-"></code></pre>
</div>
<div id="execution-error-GETapi-threads--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-threads--id-"></code></pre>
</div>
<form id="form-GETapi-threads--id-" data-method="GET" data-path="api/threads/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-threads--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-threads--id-" onclick="tryItOut('GETapi-threads--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-threads--id-" onclick="cancelTryOut('GETapi-threads--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-threads--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/threads/{id}</code></b>
</p>
<p>
<label id="auth-GETapi-threads--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-threads--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-threads--id-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>Store thread</h2>
<p>Start a conversation. Creation of a new thread.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://jobclass.bedigit.local/api/threads" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -F "from_name=John Doe" \
    -F "from_email=john.doe@domain.tld" \
    -F "from_phone=doloremque" \
    -F "body=Modi temporibus voluptas expedita voluptatibus voluptas veniam." \
    -F "post_id=2" \
    -F "resume[filename]=consequatur" \
    -F "captcha_key=consequatur" \
    -F "filename=@/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/phpGbn7Yk" </code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/threads"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
};

const body = new FormData();
body.append('from_name', 'John Doe');
body.append('from_email', 'john.doe@domain.tld');
body.append('from_phone', 'doloremque');
body.append('body', 'Modi temporibus voluptas expedita voluptatibus voluptas veniam.');
body.append('post_id', '2');
body.append('resume[filename]', 'consequatur');
body.append('captcha_key', 'consequatur');
body.append('filename', document.querySelector('input[name="filename"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://jobclass.bedigit.local/api/threads',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'from_name',
                'contents' =&gt; 'John Doe'
            ],
            [
                'name' =&gt; 'from_email',
                'contents' =&gt; 'john.doe@domain.tld'
            ],
            [
                'name' =&gt; 'from_phone',
                'contents' =&gt; 'doloremque'
            ],
            [
                'name' =&gt; 'body',
                'contents' =&gt; 'Modi temporibus voluptas expedita voluptatibus voluptas veniam.'
            ],
            [
                'name' =&gt; 'post_id',
                'contents' =&gt; '2'
            ],
            [
                'name' =&gt; 'resume[filename]',
                'contents' =&gt; 'consequatur'
            ],
            [
                'name' =&gt; 'captcha_key',
                'contents' =&gt; 'consequatur'
            ],
            [
                'name' =&gt; 'filename',
                'contents' =&gt; fopen('/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/phpGbn7Yk', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Unauthenticated or Token Expired, Please Login",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-POSTapi-threads" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-threads"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-threads"></code></pre>
</div>
<div id="execution-error-POSTapi-threads" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-threads"></code></pre>
</div>
<form id="form-POSTapi-threads" data-method="POST" data-path="api/threads" data-authed="0" data-hasfiles="1" data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs","Authorization":"Bearer {YOUR_AUTH_TOKEN}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-threads', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-threads" onclick="tryItOut('POSTapi-threads');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-threads" onclick="cancelTryOut('POSTapi-threads');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-threads" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/threads</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>from_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="from_name" data-endpoint="POSTapi-threads" data-component="body" required  hidden>
<br>
The thread's creator name.
</p>
<p>
<b><code>from_email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="from_email" data-endpoint="POSTapi-threads" data-component="body"  hidden>
<br>
The thread's creator email address (required if mobile phone number doesn't exist).
</p>
<p>
<b><code>from_phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="from_phone" data-endpoint="POSTapi-threads" data-component="body"  hidden>
<br>
The thread's creator mobile phone number (required if email doesn't exist).
</p>
<p>
<b><code>body</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="body" data-endpoint="POSTapi-threads" data-component="body" required  hidden>
<br>
The name of the user.
</p>
<p>
<b><code>post_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="post_id" data-endpoint="POSTapi-threads" data-component="body" required  hidden>
<br>
The related post ID.
</p>
<p>
<details>
<summary>
<b><code>resume</code></b>&nbsp;&nbsp;<small>object</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>resume.filename</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="resume.filename" data-endpoint="POSTapi-threads" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<b><code>filename</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="filename" data-endpoint="POSTapi-threads" data-component="body"  hidden>
<br>
The thread attached file.
</p>
<p>
<b><code>captcha_key</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="captcha_key" data-endpoint="POSTapi-threads" data-component="body"  hidden>
<br>
Key generated by the CAPTCHA endpoint calling (Required if the CAPTCHA verification is enabled from the Admin panel).
</p>

</form>
<h2>Update thread</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://jobclass.bedigit.local/api/threads/fuga" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
    -F "body=Modi temporibus voluptas expedita voluptatibus voluptas veniam." \
    -F "filename=@/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/phpscXvEy" </code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/threads/fuga"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
};

const body = new FormData();
body.append('body', 'Modi temporibus voluptas expedita voluptatibus voluptas veniam.');
body.append('filename', document.querySelector('input[name="filename"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'https://jobclass.bedigit.local/api/threads/fuga',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'body',
                'contents' =&gt; 'Modi temporibus voluptas expedita voluptatibus voluptas veniam.'
            ],
            [
                'name' =&gt; 'filename',
                'contents' =&gt; fopen('/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/phpscXvEy', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-PUTapi-threads--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-threads--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-threads--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-threads--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-threads--id-"></code></pre>
</div>
<form id="form-PUTapi-threads--id-" data-method="PUT" data-path="api/threads/{id}" data-authed="1" data-hasfiles="1" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"multipart\/form-data","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-threads--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-threads--id-" onclick="tryItOut('PUTapi-threads--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-threads--id-" onclick="cancelTryOut('PUTapi-threads--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-threads--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/threads/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-threads--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-threads--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-threads--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>body</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="body" data-endpoint="PUTapi-threads--id-" data-component="body" required  hidden>
<br>
The name of the user.
</p>
<p>
<b><code>filename</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="filename" data-endpoint="PUTapi-threads--id-" data-component="body"  hidden>
<br>
The thread attached file.
</p>

</form>
<h2>Delete thread(s)</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://jobclass.bedigit.local/api/threads/earum" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/threads/earum"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'https://jobclass.bedigit.local/api/threads/earum',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-DELETEapi-threads--ids-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-threads--ids-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-threads--ids-"></code></pre>
</div>
<div id="execution-error-DELETEapi-threads--ids-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-threads--ids-"></code></pre>
</div>
<form id="form-DELETEapi-threads--ids-" data-method="DELETE" data-path="api/threads/{ids}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-threads--ids-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-threads--ids-" onclick="tryItOut('DELETEapi-threads--ids-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-threads--ids-" onclick="cancelTryOut('DELETEapi-threads--ids-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-threads--ids-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/threads/{ids}</code></b>
</p>
<p>
<label id="auth-DELETEapi-threads--ids-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-threads--ids-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>ids</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ids" data-endpoint="DELETEapi-threads--ids-" data-component="url" required  hidden>
<br>
The ID or comma-separated IDs list of thread(s).
</p>
</form>
<h2>Bulk updates</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://jobclass.bedigit.local/api/threads/bulkUpdate/vero?type=veniam" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/threads/bulkUpdate/vero"
);

let params = {
    "type": "veniam",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://jobclass.bedigit.local/api/threads/bulkUpdate/vero',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'type'=&gt; 'veniam',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-POSTapi-threads-bulkUpdate--ids--" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-threads-bulkUpdate--ids--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-threads-bulkUpdate--ids--"></code></pre>
</div>
<div id="execution-error-POSTapi-threads-bulkUpdate--ids--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-threads-bulkUpdate--ids--"></code></pre>
</div>
<form id="form-POSTapi-threads-bulkUpdate--ids--" data-method="POST" data-path="api/threads/bulkUpdate/{ids?}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-threads-bulkUpdate--ids--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-threads-bulkUpdate--ids--" onclick="tryItOut('POSTapi-threads-bulkUpdate--ids--');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-threads-bulkUpdate--ids--" onclick="cancelTryOut('POSTapi-threads-bulkUpdate--ids--');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-threads-bulkUpdate--ids--" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/threads/bulkUpdate/{ids?}</code></b>
</p>
<p>
<label id="auth-POSTapi-threads-bulkUpdate--ids--" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-threads-bulkUpdate--ids--" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>ids</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ids" data-endpoint="POSTapi-threads-bulkUpdate--ids--" data-component="url" required  hidden>
<br>
The ID or comma-separated IDs list of thread(s).
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="type" data-endpoint="POSTapi-threads-bulkUpdate--ids--" data-component="query" required  hidden>
<br>
The type of action to execute (markAsRead, markAsUnread, markAsImportant, markAsNotImportant or markAllAsRead).
</p>
</form><h1>Users</h1>
<h2>List users</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/users"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/users',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Unauthorized",
    "result": null,
    "error_code": 1
}</code></pre>
<div id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"></code></pre>
</div>
<div id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users"></code></pre>
</div>
<form id="form-GETapi-users" data-method="GET" data-path="api/users" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-users" onclick="tryItOut('GETapi-users');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-users" onclick="cancelTryOut('GETapi-users');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-users" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/users</code></b>
</p>
</form>
<h2>Get user</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/users/iure" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/users/iure"
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
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/users/iure',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-GETapi-users--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-users--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--id-"></code></pre>
</div>
<div id="execution-error-GETapi-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--id-"></code></pre>
</div>
<form id="form-GETapi-users--id-" data-method="GET" data-path="api/users/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-users--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-users--id-" onclick="tryItOut('GETapi-users--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-users--id-" onclick="cancelTryOut('GETapi-users--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-users--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/users/{id}</code></b>
</p>
<p>
<label id="auth-GETapi-users--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-users--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-users--id-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>Store user</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://jobclass.bedigit.local/api/users" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
    -F "country_code=US" \
    -F "language_code=en" \
    -F "user_type_id=1" \
    -F "gender_id=1" \
    -F "name=John Doe" \
    -F "phone=+17656766467" \
    -F "phone_hidden=" \
    -F "email=john.doe@domain.tld" \
    -F "username=john_doe" \
    -F "password=js!X07$z61hLA" \
    -F "password_confirmation=js!X07$z61hLA" \
    -F "disable_comments=1" \
    -F "ip_addr=quisquam" \
    -F "accept_terms=1" \
    -F "accept_marketing_offers=" \
    -F "time_zone=America/New_York" \
    -F "captcha_key=nihil" \
    -F "photo=@/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/php2o52QY" </code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/users"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
};

const body = new FormData();
body.append('country_code', 'US');
body.append('language_code', 'en');
body.append('user_type_id', '1');
body.append('gender_id', '1');
body.append('name', 'John Doe');
body.append('phone', '+17656766467');
body.append('phone_hidden', '');
body.append('email', 'john.doe@domain.tld');
body.append('username', 'john_doe');
body.append('password', 'js!X07$z61hLA');
body.append('password_confirmation', 'js!X07$z61hLA');
body.append('disable_comments', '1');
body.append('ip_addr', 'quisquam');
body.append('accept_terms', '1');
body.append('accept_marketing_offers', '');
body.append('time_zone', 'America/New_York');
body.append('captcha_key', 'nihil');
body.append('photo', document.querySelector('input[name="photo"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://jobclass.bedigit.local/api/users',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'country_code',
                'contents' =&gt; 'US'
            ],
            [
                'name' =&gt; 'language_code',
                'contents' =&gt; 'en'
            ],
            [
                'name' =&gt; 'user_type_id',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'gender_id',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'name',
                'contents' =&gt; 'John Doe'
            ],
            [
                'name' =&gt; 'phone',
                'contents' =&gt; '+17656766467'
            ],
            [
                'name' =&gt; 'phone_hidden',
                'contents' =&gt; ''
            ],
            [
                'name' =&gt; 'email',
                'contents' =&gt; 'john.doe@domain.tld'
            ],
            [
                'name' =&gt; 'username',
                'contents' =&gt; 'john_doe'
            ],
            [
                'name' =&gt; 'password',
                'contents' =&gt; 'js!X07$z61hLA'
            ],
            [
                'name' =&gt; 'password_confirmation',
                'contents' =&gt; 'js!X07$z61hLA'
            ],
            [
                'name' =&gt; 'disable_comments',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'ip_addr',
                'contents' =&gt; 'quisquam'
            ],
            [
                'name' =&gt; 'accept_terms',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'accept_marketing_offers',
                'contents' =&gt; ''
            ],
            [
                'name' =&gt; 'time_zone',
                'contents' =&gt; 'America/New_York'
            ],
            [
                'name' =&gt; 'captcha_key',
                'contents' =&gt; 'nihil'
            ],
            [
                'name' =&gt; 'photo',
                'contents' =&gt; fopen('/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/php2o52QY', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (422):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "An error occurred while validating the data.",
    "errors": {
        "username": [
            "The username field must be an alphanumeric string."
        ],
        "captcha": [
            "The security code field is required."
        ]
    }
}</code></pre>
<div id="execution-results-POSTapi-users" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-users"></code></pre>
</div>
<div id="execution-error-POSTapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-users"></code></pre>
</div>
<form id="form-POSTapi-users" data-method="POST" data-path="api/users" data-authed="0" data-hasfiles="1" data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-users', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-users" onclick="tryItOut('POSTapi-users');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-users" onclick="cancelTryOut('POSTapi-users');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-users" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/users</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>country_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country_code" data-endpoint="POSTapi-users" data-component="body" required  hidden>
<br>
The code of the user's country.
</p>
<p>
<b><code>language_code</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="language_code" data-endpoint="POSTapi-users" data-component="body"  hidden>
<br>
The code of the user's spoken language.
</p>
<p>
<b><code>user_type_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="user_type_id" data-endpoint="POSTapi-users" data-component="body"  hidden>
<br>
The ID of user type.
</p>
<p>
<b><code>gender_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="gender_id" data-endpoint="POSTapi-users" data-component="body"  hidden>
<br>
The ID of gender.
</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-users" data-component="body" required  hidden>
<br>
The name of the user.
</p>
<p>
<b><code>photo</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="photo" data-endpoint="POSTapi-users" data-component="body"  hidden>
<br>
The file of user photo.
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-users" data-component="body"  hidden>
<br>
The mobile phone number of the user (required if email doesn't exist).
</p>
<p>
<b><code>phone_hidden</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-users" hidden><input type="radio" name="phone_hidden" value="true" data-endpoint="POSTapi-users" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-users" hidden><input type="radio" name="phone_hidden" value="false" data-endpoint="POSTapi-users" data-component="body" ><code>false</code></label>
<br>
Field to hide or show the user phone number in public.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-users" data-component="body"  hidden>
<br>
The user's email address (required if mobile phone number doesn't exist).
</p>
<p>
<b><code>username</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="username" data-endpoint="POSTapi-users" data-component="body"  hidden>
<br>
The user's username.
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-users" data-component="body" required  hidden>
<br>
The user's password.
</p>
<p>
<b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password_confirmation" data-endpoint="POSTapi-users" data-component="body" required  hidden>
<br>
The confirmation of the user's password.
</p>
<p>
<b><code>disable_comments</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-users" hidden><input type="radio" name="disable_comments" value="true" data-endpoint="POSTapi-users" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-users" hidden><input type="radio" name="disable_comments" value="false" data-endpoint="POSTapi-users" data-component="body" ><code>false</code></label>
<br>
Field to disable or enable comments on the user's posts.
</p>
<p>
<b><code>ip_addr</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ip_addr" data-endpoint="POSTapi-users" data-component="body" required  hidden>
<br>
The user's IP address.
</p>
<p>
<b><code>accept_terms</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
<label data-endpoint="POSTapi-users" hidden><input type="radio" name="accept_terms" value="true" data-endpoint="POSTapi-users" data-component="body" required ><code>true</code></label>
<label data-endpoint="POSTapi-users" hidden><input type="radio" name="accept_terms" value="false" data-endpoint="POSTapi-users" data-component="body" required ><code>false</code></label>
<br>
Field to allow user to accept or not the website terms.
</p>
<p>
<b><code>accept_marketing_offers</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-users" hidden><input type="radio" name="accept_marketing_offers" value="true" data-endpoint="POSTapi-users" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-users" hidden><input type="radio" name="accept_marketing_offers" value="false" data-endpoint="POSTapi-users" data-component="body" ><code>false</code></label>
<br>
Field to allow user to accept or not marketing offers sending.
</p>
<p>
<b><code>time_zone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="time_zone" data-endpoint="POSTapi-users" data-component="body"  hidden>
<br>
The user's time zone.
</p>
<p>
<b><code>captcha_key</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="captcha_key" data-endpoint="POSTapi-users" data-component="body"  hidden>
<br>
Key generated by the CAPTCHA endpoint calling (Required if the CAPTCHA verification is enabled from the Admin panel).
</p>

</form>
<h2>Update user</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://jobclass.bedigit.local/api/users/qui" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs" \
    -F "country_code=US" \
    -F "language_code=en" \
    -F "user_type_id=1" \
    -F "gender_id=1" \
    -F "name=John Doe" \
    -F "phone=+17656766467" \
    -F "phone_hidden=" \
    -F "email=john.doe@domain.tld" \
    -F "username=john_doe" \
    -F "password=js!X07$z61hLA" \
    -F "password_confirmation=js!X07$z61hLA" \
    -F "disable_comments=1" \
    -F "ip_addr=asperiores" \
    -F "accept_terms=1" \
    -F "accept_marketing_offers=" \
    -F "time_zone=America/New_York" \
    -F "photo=@/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/phpN07MYo" </code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/users/qui"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=",
    "X-AppType": "docs",
};

const body = new FormData();
body.append('country_code', 'US');
body.append('language_code', 'en');
body.append('user_type_id', '1');
body.append('gender_id', '1');
body.append('name', 'John Doe');
body.append('phone', '+17656766467');
body.append('phone_hidden', '');
body.append('email', 'john.doe@domain.tld');
body.append('username', 'john_doe');
body.append('password', 'js!X07$z61hLA');
body.append('password_confirmation', 'js!X07$z61hLA');
body.append('disable_comments', '1');
body.append('ip_addr', 'asperiores');
body.append('accept_terms', '1');
body.append('accept_marketing_offers', '');
body.append('time_zone', 'America/New_York');
body.append('photo', document.querySelector('input[name="photo"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'https://jobclass.bedigit.local/api/users/qui',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'country_code',
                'contents' =&gt; 'US'
            ],
            [
                'name' =&gt; 'language_code',
                'contents' =&gt; 'en'
            ],
            [
                'name' =&gt; 'user_type_id',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'gender_id',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'name',
                'contents' =&gt; 'John Doe'
            ],
            [
                'name' =&gt; 'phone',
                'contents' =&gt; '+17656766467'
            ],
            [
                'name' =&gt; 'phone_hidden',
                'contents' =&gt; ''
            ],
            [
                'name' =&gt; 'email',
                'contents' =&gt; 'john.doe@domain.tld'
            ],
            [
                'name' =&gt; 'username',
                'contents' =&gt; 'john_doe'
            ],
            [
                'name' =&gt; 'password',
                'contents' =&gt; 'js!X07$z61hLA'
            ],
            [
                'name' =&gt; 'password_confirmation',
                'contents' =&gt; 'js!X07$z61hLA'
            ],
            [
                'name' =&gt; 'disable_comments',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'ip_addr',
                'contents' =&gt; 'asperiores'
            ],
            [
                'name' =&gt; 'accept_terms',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'accept_marketing_offers',
                'contents' =&gt; ''
            ],
            [
                'name' =&gt; 'time_zone',
                'contents' =&gt; 'America/New_York'
            ],
            [
                'name' =&gt; 'photo',
                'contents' =&gt; fopen('/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/phpN07MYo', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-PUTapi-users--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-users--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-users--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-users--id-"></code></pre>
</div>
<form id="form-PUTapi-users--id-" data-method="PUT" data-path="api/users/{id}" data-authed="1" data-hasfiles="1" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"multipart\/form-data","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-users--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-users--id-" onclick="tryItOut('PUTapi-users--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-users--id-" onclick="cancelTryOut('PUTapi-users--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-users--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/users/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-users--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-users--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-users--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>country_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country_code" data-endpoint="PUTapi-users--id-" data-component="body" required  hidden>
<br>
The code of the user's country.
</p>
<p>
<b><code>language_code</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="language_code" data-endpoint="PUTapi-users--id-" data-component="body"  hidden>
<br>
The code of the user's spoken language.
</p>
<p>
<b><code>user_type_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="user_type_id" data-endpoint="PUTapi-users--id-" data-component="body"  hidden>
<br>
The ID of user type.
</p>
<p>
<b><code>gender_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="gender_id" data-endpoint="PUTapi-users--id-" data-component="body"  hidden>
<br>
The ID of gender.
</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-users--id-" data-component="body" required  hidden>
<br>
The name of the user.
</p>
<p>
<b><code>photo</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="photo" data-endpoint="PUTapi-users--id-" data-component="body"  hidden>
<br>
The file of user photo.
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone" data-endpoint="PUTapi-users--id-" data-component="body"  hidden>
<br>
The mobile phone number of the user (required if email doesn't exist).
</p>
<p>
<b><code>phone_hidden</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-users--id-" hidden><input type="radio" name="phone_hidden" value="true" data-endpoint="PUTapi-users--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-users--id-" hidden><input type="radio" name="phone_hidden" value="false" data-endpoint="PUTapi-users--id-" data-component="body" ><code>false</code></label>
<br>
Field to hide or show the user phone number in public.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="PUTapi-users--id-" data-component="body" required  hidden>
<br>
The user's email address.
</p>
<p>
<b><code>username</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="username" data-endpoint="PUTapi-users--id-" data-component="body"  hidden>
<br>
The user's username.
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="PUTapi-users--id-" data-component="body" required  hidden>
<br>
The user's password.
</p>
<p>
<b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password_confirmation" data-endpoint="PUTapi-users--id-" data-component="body" required  hidden>
<br>
The confirmation of the user's password.
</p>
<p>
<b><code>disable_comments</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-users--id-" hidden><input type="radio" name="disable_comments" value="true" data-endpoint="PUTapi-users--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-users--id-" hidden><input type="radio" name="disable_comments" value="false" data-endpoint="PUTapi-users--id-" data-component="body" ><code>false</code></label>
<br>
Field to disable or enable comments on the user's posts.
</p>
<p>
<b><code>ip_addr</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ip_addr" data-endpoint="PUTapi-users--id-" data-component="body" required  hidden>
<br>
The user's IP address.
</p>
<p>
<b><code>accept_terms</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
<label data-endpoint="PUTapi-users--id-" hidden><input type="radio" name="accept_terms" value="true" data-endpoint="PUTapi-users--id-" data-component="body" required ><code>true</code></label>
<label data-endpoint="PUTapi-users--id-" hidden><input type="radio" name="accept_terms" value="false" data-endpoint="PUTapi-users--id-" data-component="body" required ><code>false</code></label>
<br>
Field to allow user to accept or not the website terms.
</p>
<p>
<b><code>accept_marketing_offers</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-users--id-" hidden><input type="radio" name="accept_marketing_offers" value="true" data-endpoint="PUTapi-users--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-users--id-" hidden><input type="radio" name="accept_marketing_offers" value="false" data-endpoint="PUTapi-users--id-" data-component="body" ><code>false</code></label>
<br>
Field to allow user to accept or not marketing offers sending.
</p>
<p>
<b><code>time_zone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="time_zone" data-endpoint="PUTapi-users--id-" data-component="body"  hidden>
<br>
The user's time zone.
</p>

</form>
<h2>Delete user</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://jobclass.bedigit.local/api/users/animi" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/users/animi"
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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'https://jobclass.bedigit.local/api/users/animi',
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-DELETEapi-users--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-users--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-users--id-"></code></pre>
</div>
<div id="execution-error-DELETEapi-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-users--id-"></code></pre>
</div>
<form id="form-DELETEapi-users--id-" data-method="DELETE" data-path="api/users/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-users--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-users--id-" onclick="tryItOut('DELETEapi-users--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-users--id-" onclick="cancelTryOut('DELETEapi-users--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-users--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/users/{id}</code></b>
</p>
<p>
<label id="auth-DELETEapi-users--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-users--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="DELETEapi-users--id-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>Email: Re-send link</h2>
<p>Re-send email verification link to the user</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/users/impedit/verify/resend/email?entitySlug=users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/users/impedit/verify/resend/email"
);

let params = {
    "entitySlug": "users",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/users/impedit/verify/resend/email',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'entitySlug'=&gt; 'users',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-GETapi-users--id--verify-resend-email" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-users--id--verify-resend-email"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--id--verify-resend-email"></code></pre>
</div>
<div id="execution-error-GETapi-users--id--verify-resend-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--id--verify-resend-email"></code></pre>
</div>
<form id="form-GETapi-users--id--verify-resend-email" data-method="GET" data-path="api/users/{id}/verify/resend/email" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-users--id--verify-resend-email', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-users--id--verify-resend-email" onclick="tryItOut('GETapi-users--id--verify-resend-email');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-users--id--verify-resend-email" onclick="cancelTryOut('GETapi-users--id--verify-resend-email');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-users--id--verify-resend-email" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/users/{id}/verify/resend/email</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-users--id--verify-resend-email" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>entitySlug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="entitySlug" data-endpoint="GETapi-users--id--verify-resend-email" data-component="query"  hidden>
<br>
The slug of the entity to verify ('users' or 'posts').
</p>
</form>
<h2>SMS: Re-send code</h2>
<p>Re-send mobile phone verification token by SMS</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/users/vero/verify/resend/sms?entitySlug=users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/users/vero/verify/resend/sms"
);

let params = {
    "entitySlug": "users",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/users/vero/verify/resend/sms',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'entitySlug'=&gt; 'users',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-GETapi-users--id--verify-resend-sms" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-users--id--verify-resend-sms"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--id--verify-resend-sms"></code></pre>
</div>
<div id="execution-error-GETapi-users--id--verify-resend-sms" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--id--verify-resend-sms"></code></pre>
</div>
<form id="form-GETapi-users--id--verify-resend-sms" data-method="GET" data-path="api/users/{id}/verify/resend/sms" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-users--id--verify-resend-sms', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-users--id--verify-resend-sms" onclick="tryItOut('GETapi-users--id--verify-resend-sms');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-users--id--verify-resend-sms" onclick="cancelTryOut('GETapi-users--id--verify-resend-sms');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-users--id--verify-resend-sms" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/users/{id}/verify/resend/sms</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-users--id--verify-resend-sms" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>entitySlug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="entitySlug" data-endpoint="GETapi-users--id--verify-resend-sms" data-component="query"  hidden>
<br>
The slug of the entity to verify ('users' or 'posts').
</p>
</form>
<h2>Verification</h2>
<p>Verify the user's email address or mobile phone number</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://jobclass.bedigit.local/api/users/verify/atque/commodi?entitySlug=users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://jobclass.bedigit.local/api/users/verify/atque/commodi"
);

let params = {
    "entitySlug": "users",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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
}).then(response =&gt; response.json());</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://jobclass.bedigit.local/api/users/verify/atque/commodi',
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Language' =&gt; 'en',
            'X-AppApiToken' =&gt; 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' =&gt; 'docs',
        ],
        'query' =&gt; [
            'entitySlug'=&gt; 'users',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Page Not Found."
}</code></pre>
<div id="execution-results-GETapi-users-verify--field---token--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-users-verify--field---token--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users-verify--field---token--"></code></pre>
</div>
<div id="execution-error-GETapi-users-verify--field---token--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users-verify--field---token--"></code></pre>
</div>
<form id="form-GETapi-users-verify--field---token--" data-method="GET" data-path="api/users/verify/{field}/{token?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"WGJRQWx0dHhpdlFoTTBUSU5kQjhaWGhwV3ZJNG41MTI=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-users-verify--field---token--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-users-verify--field---token--" onclick="tryItOut('GETapi-users-verify--field---token--');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-users-verify--field---token--" onclick="cancelTryOut('GETapi-users-verify--field---token--');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-users-verify--field---token--" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/users/verify/{field}/{token?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>field</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="field" data-endpoint="GETapi-users-verify--field---token--" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>token</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="token" data-endpoint="GETapi-users-verify--field---token--" data-component="url"  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>entitySlug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="entitySlug" data-endpoint="GETapi-users-verify--field---token--" data-component="query"  hidden>
<br>
The slug of the entity to verify ('users' or 'posts').
</p>
</form>
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                                    <a href="#" data-language-name="php">php</a>
                            </div>
            </div>
</div>
<script>
    $(function () {
        var languages = ["bash","javascript","php"];
        setupLanguages(languages);
    });
</script>
</body>
</html>