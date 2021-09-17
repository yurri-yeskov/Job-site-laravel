<?php 

return [
    'post' => '{slug}/{id}',
    'search' => 'latest-jobs',
    'searchPostsByUserId' => 'users/{id}/jobs',
    'searchPostsByUsername' => 'profile/{username}',
    'searchPostsByTag' => 'tag/{tag}',
    'searchPostsByCity' => 'jobs/{city}/{id}',
    'searchPostsBySubCat' => 'category/{catSlug}/{subCatSlug}',
    'searchPostsByCat' => 'category/{catSlug}',
    'searchPostsByCompanyId' => 'companies/{id}/jobs',
    'login' => 'login',
    'logout' => 'logout',
    'register' => 'register',
    'companies' => 'companies',
    'pageBySlug' => 'page/{slug}',
    'sitemap' => 'sitemap',
    'countries' => 'countries',
    'contact' => 'contact',
    'pricing' => 'pricing',
];
