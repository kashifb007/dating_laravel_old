<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => false,

    'roles_structure' => [
        'super-admin' => [
            'countries' => 'c,r,u,d',
            'currencies' => 'c,r,u,d',
            'coupons' => 'c,r,u,d',
            'profile_categories' => 'c,r,u,d',
            'profile_questions' => 'c,r,u,d',
            'profile_choices' => 'c,r,u,d',
            'users' => 'r,u,d',
            'profile_answers' => 'r,u,d',
            'likes' => 'r',
            'views' => 'r',
            'declines' => 'r',
            'blocks' => 'c,r,d',
            'owners' => 'c,r,u,d',
            'admins' => 'c,r,u,d',
            'customers' => 'r,u,d',
        ],
        'owner' => [
            'countries' => 'c,r,u,d',
            'currencies' => 'c,r,u,d',
            'coupons' => 'c,r,u,d',
            'profile_categories' => 'c,r,u,d',
            'profile_questions' => 'c,r,u,d',
            'profile_choices' => 'c,r,u,d',
            'profile_answers' => 'r,u,d',
            'users' => 'r,u,d',
            'likes' => 'r',
            'views' => 'r',
            'declines' => 'r',
            'blocks' => 'c,r,d',
            'owners' => 'r,u',
            'admins' => 'c,r,u,d',
            'customers' => 'r,u,d',
        ],
        'admin' => [
            'countries' => 'c,r,u',
            'currencies' => 'c,r,u',
            'coupons' => 'c,r,u,d',
            'profile_categories' => 'c,r,u',
            'profile_questions' => 'c,r,u',
            'profile_choices' => 'c,r,u',
            'profile_answers' => 'r,u,d',
            'users' => 'r,u',
            'likes' => 'r',
            'views' => 'r',
            'declines' => 'r',
            'blocks' => 'c,r,d',
            'owners' => 'r',
            'admins' => 'c,r,u',
            'customers' => 'r,u,d',
        ],
        'customer' => [
            'profile_categories' => 'r',
            'profile_questions' => 'r',
            'profile_choices' => 'r',
            'coupons' => 'r',
            'profile_answers' => 'c,r,u,d',
            'likes' => 'c,d',
            'views' => 'c',
            'declines' => 'c,d',
            'blocks' => 'c,d',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
