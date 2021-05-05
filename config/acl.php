<?php
return [

    'permissionsActive' => env('PERMISSIONS_ACTIVE'),

    'group-permissions' => [

        'listings' => [
            'view_listing',
            'add_listing',
            'edit_listing',
            'delete_listing',
            'manage_listing_setting',
            'assign_listing_to_staff',
            'assign_task_on_listing',
        ],

        'teams' => [
            'add_team',
            'view_team',
            'edit_team',
            'delete_team',
            'manage_own_team',
        ],


        'leads' => [

            'view_lead',
            'add_lead',
            'edit_lead',
            'delete_lead',
            'manage_lead_setting',
            'assign_lead_to_staff',
            'assign_task_on_lead',
            'convert_lead_to_opportunity',


        ],


        'opportunities' => [

            'view_opportunity',
            'edit_opportunity',
            'delete_opportunity',
            'manage_opportunity_setting',
            'assign_opportunity_to_staff',
            'assign_task_on_opportunity',
            'convert_opportunity_to_client',
            'add_question_on_opportunity',

        ],
        'clients' => [

            'view_client',
            'edit_client',
            'delete_client',
            'manage_client_setting',
            'assign_task_on_client',
            'add_question_on_client',

        ],

        'staff' => [
            'view_staff',
            'add_staff',
            'edit_staff',
            'delete_staff',

            'manage_team_staff',
            'set_team_manager',
            'manage_all_staff_privileges',
        ],


        'contacts' => [
            'manage_own_contacts',
            'manage_team_users_contacts',
            'manage_all_users_contacts'
        ],

        'profile' => [
            'manage_own_roles',
            'manage_agency_profile',
            'manage_agency_settings',
            'manage_own_profile',
        ],


        'deal' => [
            'can_delete_deals',
            'manage_own_deals',
            'manage_team_users_deals',
            'manage_all_users_deals',
        ],

        'notes' => [
            'can_delete_notes',
            'manage_own_notes',
            'manage_all_notes',
        ],

        'tasks' => [

            'can_delete_tasks',
            'manage_own_tasks',
            'manage_team_users_tasks',
            'manage_all_users_tasks',
        ],

        'settings' => [
            'manage_own_settings',
            'manage_all_user_settings',
        ],

        'reports' => [
            'can_generate_reports'
        ],


        'image_bank' =>
        [
            'make_as_public',
        ],

        'email_management' =>
        [
            'manage_own_email',
            'manage_team_email',
            'manage_all_user_email',
        ]



    ]

];