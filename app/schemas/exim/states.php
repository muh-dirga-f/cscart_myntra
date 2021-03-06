<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/

return [
    'section' => 'states',
    'pattern_id' => 'states',
    'name' => __('states'),
    'key' => ['state_id'],
    'order' => 1,
    'table' => 'states',
    'permissions' => [
        'import' => 'manage_locations',
        'export' => 'view_locations',
    ],
    'references' => [
        'state_descriptions' => [
            'reference_fields' => ['state_id' => '#key', 'lang_code' => '#lang_code'],
            'join_type' => 'LEFT'
        ],
    ],
    'options' => [
        'lang_code' => [
            'title' => 'language',
            'type' => 'languages',
            'default_value' => [DEFAULT_LANGUAGE],
        ],
    ],
    'export_fields' => [
        'State' => [
            'db_field' => 'state',
            'table' => 'state_descriptions',
            'required' => true,
            'multilang' => true,
        ],
        'Language' => [
            'table' => 'state_descriptions',
            'db_field' => 'lang_code',
            'type' => 'languages',
            'required' => true,
            'multilang' => true
        ],
        'Code' => [
            'db_field' => 'code',
            'required' => true,
            'alt_key' => true,
        ],
        'Country code' => [
            'db_field' => 'country_code',
            'required' => true,
            'alt_key' => true,
        ],
    ],
];
