<?php
return [
      'jqadm' => [
        'navbar' => [
            'swordbros'=> ['swordbros/techie', 'swpost', 'type/swpost'] 
         ],
        'resource' =>[
            'swordbros' => [
                'groups' => ['admin', 'editor', 'super'],
                'techie' =>[
                    'groups' => ['admin', 'editor', 'super'],
                    'key' => 'SF',
                ],
                'slider' =>[
                    'groups' => ['admin', 'editor', 'super'],
                    'key' => 'SS',
                ],
                'swpost' =>[
                    'groups' => ['admin', 'editor', 'super'],
                    'key' => 'SB',
                ],
                'type/swpost' =>[
                    'groups' => ['admin', 'editor', 'super'],
                    'key' => 'TSB',
                ],
            ],
        ],
    ],
	'jsonadm' => [
	],
];