<?php
return array(
	'enable' => env('SWAGGER_ENABLE', null),

//	'middleware' => 'api',
	'prefix' => 'api-docs',

	'paths' => [
		app_path('Modules/Api/'),
		base_path('routes')
	],
	'exclude' => null,

	'title' => 'Swagger UI'
);