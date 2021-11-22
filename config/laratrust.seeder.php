<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles' => [
        'structure' => [
            'superadministrator' => [
                'app' => 'c,r,u,d',
                'log' => 'r,d',
                'settings' => 'c,r,u,d',
                'settings-modules' => 'c,r,u,d',
                'settings-skills' => 'c,r,u,d',
                'settings-tasks' => 'c,r,u,d',
                'settings-verifications' => 'c,r,u,d',
                'user' => 'c,r,u,d',
                'trainees' => 'c,r,u,d',
                'modules' => 'c,r,u,d',
                'dashboard' => 'r',
            ],
            'administrator' => [
                'log' => 'r,d',
                'settings' => 'c,r,u,d',
                'settings-modules' => 'c,r,u,d',
                'settings-skills' => 'c,r,u,d',
                'settings-tasks' => 'c,r,u,d',
                'settings-verifications' => 'c,r,u,d',
                'trainees' => 'c,r,u,d',
                'dashboard' => 'r',
            ],
            'staff' => [
                'trainees' => 'c,r,u',
                'settings-modules' => 'c,r,u,d',
                'settings-skills' => 'c,r,u,d',
                'settings-tasks' => 'c,r,u,d',
                'settings-verifications' => 'c,r,u,d',
                'dashboard' => 'r',
            ],
            'trainer' => [
                'trainees' => 'r,u',
                'dashboard' => 'r',
            ],
            'trainee' => [
                'modules' => 'c,r,u,d',
                'dashboard' => 'r',
            ],
        ],
    ],

    'permissions' => [
        'map' => [
            'c' => 'create',
            'r' => 'read',
            'u' => 'update',
            'd' => 'delete'
        ],
    ],
];
