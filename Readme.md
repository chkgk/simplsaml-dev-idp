# About
This is a set of config files to run a docker container that starts an SAML Identity Provider (IDP) for development. Do not run this in production. It is based on the docker image by kenchan0130.

# Terminology
This piece of software implements an  **Identity Provider (IDP)**. It is a service that authenticates users and provides identity information to other applications.

In the SAML context, your application that wants to authenticate users using die IDP is referred to as a **Service Provider (SP)**.

# Instructions

1. Clone the repository.
2. Make sure Docker is running.
3. Run `docker compose up`
4. Open your browser and go to `http://localhost:8080`

# User data
Edit authsources.php to create users and their data. Typically, this would access an LDAP server or a database. For development, we hardcode the users. You'll need Admin for the admin interface at http://localhost:8080. The other users are available for login. 

I've named the attributes in line with the common user attributes used in standard shibboleth IPD setups for education. No guarantee these are correct for your specific IDP.

You need to restart the container if you make changes to the user data.

# Configure the IDP
Edit docker-compose.yaml and update the environment variables to match your SP.
```yaml
  environment:
    - SIMPLESAMLPHP_SP_ENTITY_ID: http://host.docker.internal:8000/<yourapp>/metadata
    - SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE: http://localhost:8000/<yourapp>/acs/ 
    - SIMPLESAMLPHP_SP_SINGLE_LOGOUT_SERVICE: http://host.docker.internal:8000/<yourapp>/sls/
```
Note in my case, the IDP runs on port 8080 in a docker container, but I am running my app directly on localhost at port 8000. For the IDP inside docker the SP seems to originate from host.docker.internal:8000, which refers to the host network. I needed to set this hostname on the SP_ENTITY_ID and SP_SINGLE_LOGOUT_SERVICE. I am not quite sure why, but it is not needed on the SP_ASSERTION_CONSUMER_SERVICE. Here it actually has to be the localhost hostname.

# Configure the SP
You typically need to provide the SP (your application) with this information about the identity provider (IDP). It seems to be best practice to set the medata url also as the entity id. Provider ID is often set the same as the entity id.
```
IDP Metadata URL:
http://localhost:8080/simplesaml/saml2/idp/metadata.php

IDP Provider ID:
http://localhost:8080/simplesaml/saml2/idp/metadata.php

IDP Entity ID:
http://localhost:8080/simplesaml/saml2/idp/metadata.php
```

If your service provider does not use the data from the metadata URL, you probably need these:
```
Single Sign-On URL:
http://localhost:8080/simplesaml/saml2/idp/SSOService.php

Single Logout URL:
http://localhost:8080/simplesaml/saml2/idp/SingleLogoutService.php

X.509 Certificate:
-> get this from the metadata url yourself.
```

Make sure that your SP's entity ID matches what you st in the environment variables for the docker container that runs the IDP (SIMPLESAMLPHP_SP_ENTITY_ID).

# Remarks
- Sometimes I get a 403 after successful sign-up / first time redirect from IDP to SP. I have not yet figured out why this happens. I think it is a session cookie issue stemming from the fact that both services think they run on localhost, while one is in docker (their own network) and the other one is not.
- use SAML Tracer for Chrome or Firefox (see extension stores), to track what is sent and received. This is very helpful to debug SAML issues.
- 