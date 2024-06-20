<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Define which configuration should be used
    |--------------------------------------------------------------------------
    */

    'use' => 'production',

    /*
    |--------------------------------------------------------------------------
    | AMQP properties separated by key
    |--------------------------------------------------------------------------
    */

    'properties' => [

        'production' => [
            'host' => env('RMQ_NETWORK', 'rabbitmq'),
            'port' => env('RMQ_PORT', 5672),
            'username' => env('RMQ_USER', 'rmq-user'),
            'password' => env('RMQ_PASS', 'rmq-pass'),
            'vhost' => env('AMQP_VHOST', '/'),
            'exchange' => env('AMQP_EXCHANGE', 'amq.direct'),
            'exchange_type' => env('AMQP_EXCHANGE_TYPE', 'direct'),
            'exchange_passive' => env('AMQP_EXCHANGE_PASSIVE', false),
            'exchange_durable' => env('AMQP_EXCHANGE_DURABLE', true),
            'exchange_auto_delete' => env('AMQP_EXCHANGE_AUTODELETE', false),

            'connect_options' => [],
            'ssl_options' => [],

            'exchange_internal' => false,
            'exchange_nowait' => false,
            'exchange_properties' => [],

            'queue_force_declare' => false,
            'queue_passive' => false,
            'queue_durable' => true,
            'queue_exclusive' => false,
            'queue_auto_delete' => false,
            'queue_nowait' => false,
            'queue_properties' => ['x-ha-policy' => ['S', 'all']],

            'consumer_tag' => '',
            'consumer_no_local' => false,
            'consumer_no_ack' => false,
            'consumer_exclusive' => false,
            'consumer_nowait' => false,
            'timeout' => 0,
            'persistent' => false,

            'qos' => false,
            'qos_prefetch_size' => 0,
            'qos_prefetch_count' => 1,
            'qos_a_global' => false
        ],
    ],
];
