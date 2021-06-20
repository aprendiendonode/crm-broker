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
            'share_listing',
            'listing_requests',
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
            'manage_call_status'


        ],

        'bulk_uploads' => [

            'view_bulk_upload',
            'add_bulk_upload'

        ],

        'search_center' => [

            'view_search_center',
            'add_search_center'

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


        'tasks' => [

            'view_tasks',
            'add_tasks',
            'edit_tasks',
            'delete_tasks',
            'update_task_status',
//            'manage_own_tasks',
//            'manage_team_users_tasks',
//            'manage_all_users_tasks',
        ],

        'notes' => [

            'view_notes',
            'add_notes',
            'edit_notes',
            'delete_notes',

        ],

        'emails' => [

            'view_emails',
            'add_emails',
        ],

        'logs' => [

            'view_logs',

        ],

        'settings' => [
            'manage_own_settings',
            'manage_all_user_settings',
            'can_view_setting',
            'manage_templates',
            'manage_mailing_list',
            'manage_email_notifications',
            'manage_floor_plans',
            'manage_image_banks',
            'manage_contacts_settings',
            'manage_listing_settings',
            'manage_task_types'
        ],

        'reports' => [
            'can_generate_reports'
        ],


        'image_bank' =>
        [
            'make_as_public',
        ],



    ]

];