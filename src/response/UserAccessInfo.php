<?php

    namespace DotykackaPHPApiClient\Response;

    use DotykackaPHPApiClient\ObjectBase;

    class UserAccessInfo extends ObjectBase {

        public $email;
        public $lang;
        public $name;
        public $phone_number;
        public $allowed;
        public $apiToken;

    }