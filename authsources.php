<?php

$config = array(
    'admin' => array(
        'core:AdminPassword',
    ),
    // Define userdata here
    'example-userpass' => array(
        'exampleauth:UserPass',
        'user1:password' => array( // faculty example
            // typical attributes
            'eduPersonPrincipalName' => 'c1234567', // username, could be c-number
            'eduPersonTargetedID' => 'urn:uuid:7e4f8a1e-3c21-4a1e-9156-9f1f3f9b2c1d', // persistent ID per SP, random in this case
            'eduPersonScopedAffiliation' => 'faculty@example.com', // made this up
            'eduPersonEntitlement' => [
                'uri:mace:example.com:entitlement:example-service-1',
                'uri:mace:example.com:entitlement:example-service-2'
            ], 
            'mail' => 'user1@example.com',
            'givenName' => 'John', 
            'sn' => 'Doe'  , // sn = surname
            'displayName' => 'John Doe',
            // optional attributes
            'uid' => 'user1', // this might coincide with c-numbers. Not sure.
            'cn' => 'John Doe',  // common name, similar to displayName
            'employeeNumber' => '123456',
            'studentID' => '',
        ),
        'user2:password' => array( // staff example
            'eduPersonPrincipalName' => 'c2345678',
            'eduPersonTargetedID' => 'urn:uuid:2d9c1bcf-9487-4f98-b760-ff1a56ae7b49',
            'eduPersonScopedAffiliation' => 'staff@example.com',
            'eduPersonEntitlement' => [
                'uri:mace:example.com:entitlement:example-service-1',
                'uri:mace:example.com:entitlement:example-service-3'
            ],
            'mail' => 'user2@example.com',
            'givenName' => 'Alice',
            'sn' => 'Smith',
            'displayName' => 'Alice Smith',
            'uid' => 'user2',
            'cn' => 'Alice Smith',
            'employeeNumber' => '234567',
            'studentID' => '',
        ),
        
        'user3:password' => array(  // student example
            'eduPersonPrincipalName' => 'c3456789',
            'eduPersonTargetedID' => 'urn:uuid:4b1e980c-5ae2-44b6-a5cd-33005b844c82',
            'eduPersonScopedAffiliation' => 'student@example.com',
            'eduPersonEntitlement' => [
                'uri:mace:example.com:entitlement:example-service-2'
            ],
            'mail' => 'user3@example.com',
            'givenName' => 'Bob',
            'sn' => 'Johnson',
            'displayName' => 'Bob Johnson',
            'uid' => 'user3',
            'cn' => 'Bob Johnson',
            'employeeNumber' => '',
            'studentID' => 's3456789',
        ),
    ),
);
?>