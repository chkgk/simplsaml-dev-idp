<?php

$config = array(
    'admin' => array(
        'core:AdminPassword',
    ),

    'example-userpass' => array(
        'exampleauth:UserPass',
        'user1:password' => array(
            'email' => 'user1@example.com',
            'uid' => 'user1',
            'email_verified' => 'true',
            'first_name' => 'John',
            'last_name' => 'Doe'
        ),
        'user2:password' => array(
            'email' => 'user2@example.com',
            'uid' => 'user2',
            'email_verified' => 'true',
            'first_name' => 'Jane',
            'last_name' => 'Smith'
        ),
        'user3:password' => array(
            'email' => 'user3@example.com',
            'uid' => 'user2',
            'email_verified' => 'true',
            'first_name' => 'Jack',
            'last_name' => 'Johnson'
        ),
    ),

);
?>