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

    'roles_structure' => [
        'Admin' => [
            'users' => 'c,r,u,d', 
            'roles' => 'c,r,u,d', 
            'ban' => 'c,r,u,d',    
        ],
        'Guardian' => [
            'reviews' => 'c,r,u,d', 
            'feedback' => 'c,r,u',    
            'results' => 'r',        
        ],
        'Student' => [
            'lessons' => 'r',        
            'homework' => 'r',        
            'results' => 'r',         
        ],
        'Tutor' => [
            'lessons' => 'c,r,u,d',
            'homework' => 'c,r,u,d', 
            'results' => 'c,r,u',     
        ],
    ],
    
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
