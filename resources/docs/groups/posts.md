# Posts


## List posts




> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/posts?embed=saepe" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/posts"
);

let params = {
    "embed": "saepe",
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
    'https://jobclass.bedigit.local/api/posts',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'saepe',
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
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.<\/span><\/p>",
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
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.<\/span><\/p>",
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
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.<\/span><\/p>",
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
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.<\/span><\/p>",
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
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.<\/span><\/p>",
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
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.<\/span><\/p>",
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
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.<\/span><\/p>",
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
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have a post to be filled within your company? Find the right candidate in a few clicks at JobClass.<\/span><\/p>",
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
}
```
<div id="execution-results-GETapi-posts" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts"></code></pre>
</div>
<div id="execution-error-GETapi-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts"></code></pre>
</div>
<form id="form-GETapi-posts" data-method="GET" data-path="api/posts" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts', this);">
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


## Get post




> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/posts/2?embed=exercitationem&detailed=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/posts/2"
);

let params = {
    "embed": "exercitationem",
    "detailed": "",
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
    'https://jobclass.bedigit.local/api/posts/2',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'exercitationem',
            'detailed'=> '',
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
}
```
<div id="execution-results-GETapi-posts--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts--id-"></code></pre>
</div>
<div id="execution-error-GETapi-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts--id-"></code></pre>
</div>
<form id="form-GETapi-posts--id-" data-method="GET" data-path="api/posts/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts--id-', this);">
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


## Store post

<small class="badge badge-darkred">requires authentication</small>

For both types of post's creation (Single step or Multi steps).
Note: The field 'admin_code' is only available when the post's country's 'admin_type' column is set to 1 or 2 and the 'admin_field_active' column is set to 1.

> Example request:

```bash
curl -X POST \
    "https://jobclass.bedigit.local/api/posts" \
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
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'https://jobclass.bedigit.local/api/posts',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'json' => [
            'category_id' => 1,
            'post_type_id' => 1,
            'title' => 'John Doe',
            'description' => 'Beatae placeat atque tempore consequatur animi magni omnis.',
            'salary_type_id' => 'consectetur',
            'contact_name' => 'John Doe',
            'email' => 'john.doe@domain.tld',
            'phone' => '+17656766467',
            'city_id' => 11,
            'start_date' => [],
            'accept_terms' => false,
            'company' => [
                'name' => 'enim',
                'description' => 'rem',
                [
                    'name' => 'Foo Inc',
                    'logo' => null,
                    'description' => 'Nostrum quia est aut quas.',
                ],
            ],
            'country_code' => 'US',
            'company_id' => 11,
            'admin_code' => '0',
            'price' => 5000,
            'negotiable' => false,
            'phone_hidden' => false,
            'ip_addr' => 'magni',
            'accept_marketing_offers' => false,
            'is_permanent' => true,
            'tags' => 'car,automotive,tesla,cyber,truck',
            'package_id' => 2,
            'payment_method_id' => 5,
            'captcha_key' => 'rerum',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (422):

```json
{
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
}
```
<div id="execution-results-POSTapi-posts" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-posts"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-posts"></code></pre>
</div>
<div id="execution-error-POSTapi-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-posts"></code></pre>
</div>
<form id="form-POSTapi-posts" data-method="POST" data-path="api/posts" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-posts', this);">
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


## Update post

<small class="badge badge-darkred">requires authentication</small>

Note: The fields 'pictures', 'package_id' and 'payment_method_id' are only available with the single step post edition.
The field 'admin_code' is only available when the post's country's 'admin_type' column is set to 1 or 2 and the 'admin_field_active' column is set to 1.

> Example request:

```bash
curl -X PUT \
    "https://jobclass.bedigit.local/api/posts/et" \
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
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'https://jobclass.bedigit.local/api/posts/et',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'json' => [
            'category_id' => 1,
            'post_type_id' => 1,
            'title' => 'John Doe',
            'description' => 'Beatae placeat atque tempore consequatur animi magni omnis.',
            'salary_type_id' => 'facilis',
            'contact_name' => 'John Doe',
            'email' => 'john.doe@domain.tld',
            'phone' => '+17656766467',
            'city_id' => 5,
            'start_date' => [],
            'accept_terms' => false,
            'company' => [
                'name' => 'sint',
                'description' => 'et',
                [
                    'name' => 'Foo Inc',
                    'logo' => null,
                    'description' => 'Nostrum quia est aut quas.',
                ],
            ],
            'country_code' => 'US',
            'company_id' => 5,
            'admin_code' => '0',
            'price' => 5000,
            'negotiable' => false,
            'phone_hidden' => false,
            'ip_addr' => 'veritatis',
            'accept_marketing_offers' => true,
            'is_permanent' => false,
            'tags' => 'car,automotive,tesla,cyber,truck',
            'package_id' => 2,
            'payment_method_id' => 5,
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
<div id="execution-results-PUTapi-posts--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-posts--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-posts--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-posts--id-"></code></pre>
</div>
<form id="form-PUTapi-posts--id-" data-method="PUT" data-path="api/posts/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-posts--id-', this);">
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


## Delete post(s)

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://jobclass.bedigit.local/api/posts/quia" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
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
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'https://jobclass.bedigit.local/api/posts/quia',
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
<div id="execution-results-DELETEapi-posts--ids-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-posts--ids-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-posts--ids-"></code></pre>
</div>
<div id="execution-error-DELETEapi-posts--ids-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-posts--ids-"></code></pre>
</div>
<form id="form-DELETEapi-posts--ids-" data-method="DELETE" data-path="api/posts/{ids}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-posts--ids-', this);">
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


## Email: Re-send link


Re-send email verification link to the user

> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/posts/excepturi/verify/resend/email?entitySlug=users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/posts/excepturi/verify/resend/email"
);

let params = {
    "entitySlug": "users",
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
    'https://jobclass.bedigit.local/api/posts/excepturi/verify/resend/email',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'entitySlug'=> 'users',
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
<div id="execution-results-GETapi-posts--id--verify-resend-email" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts--id--verify-resend-email"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts--id--verify-resend-email"></code></pre>
</div>
<div id="execution-error-GETapi-posts--id--verify-resend-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts--id--verify-resend-email"></code></pre>
</div>
<form id="form-GETapi-posts--id--verify-resend-email" data-method="GET" data-path="api/posts/{id}/verify/resend/email" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts--id--verify-resend-email', this);">
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


## SMS: Re-send code


Re-send mobile phone verification token by SMS

> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/posts/aperiam/verify/resend/sms?entitySlug=users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/posts/aperiam/verify/resend/sms"
);

let params = {
    "entitySlug": "users",
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
    'https://jobclass.bedigit.local/api/posts/aperiam/verify/resend/sms',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'entitySlug'=> 'users',
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
<div id="execution-results-GETapi-posts--id--verify-resend-sms" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts--id--verify-resend-sms"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts--id--verify-resend-sms"></code></pre>
</div>
<div id="execution-error-GETapi-posts--id--verify-resend-sms" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts--id--verify-resend-sms"></code></pre>
</div>
<form id="form-GETapi-posts--id--verify-resend-sms" data-method="GET" data-path="api/posts/{id}/verify/resend/sms" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts--id--verify-resend-sms', this);">
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


## Verification


Verify the user's email address or mobile phone number

> Example request:

```bash
curl -X GET \
    -G "https://jobclass.bedigit.local/api/posts/verify/esse/qui?entitySlug=users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://jobclass.bedigit.local/api/posts/verify/esse/qui"
);

let params = {
    "entitySlug": "users",
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
    'https://jobclass.bedigit.local/api/posts/verify/esse/qui',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'entitySlug'=> 'users',
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
<div id="execution-results-GETapi-posts-verify--field---token--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts-verify--field---token--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts-verify--field---token--"></code></pre>
</div>
<div id="execution-error-GETapi-posts-verify--field---token--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts-verify--field---token--"></code></pre>
</div>
<form id="form-GETapi-posts-verify--field---token--" data-method="GET" data-path="api/posts/verify/{field}/{token?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"a25ydDlKdDRwT2wzYjAxV1hvc0hSUmQxYklTTE1pRHU=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts-verify--field---token--', this);">
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
</form>



