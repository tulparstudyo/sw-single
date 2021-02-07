# techie

# Setup
## composer.json
```
"require": {
    ...
    "tulparstudyo/sw-techie": "^1.0"
}
```
```
"autoload": {
    "files": [
        ...
        "ext/sw-techie/helper/theme_helper.php"
    ]
}
```
```
"scripts": {
    "post-update-cmd": [
        ...
        "Swordbros\\Techie::composerUpdate",
        "@php artisan migrate --path=ext/sw-techie/lib/custom/setup/options"
    ]
}
```
## config/shop.php
```
'client' => [
    ...
    'common' => [
        'baseurl' =>  'packages/swordbros/shop/themes/techie/' ,
        'template' => [
            'baseurl' => 'packages/swordbros/shop/themes/techie',
        ],
    ]
],

``` 
