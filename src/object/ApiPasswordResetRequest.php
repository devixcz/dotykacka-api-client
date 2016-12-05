<?php
    namespace DotykackaPHPApiClient\Object;

    use DotykackaPHPApiClient\ObjectBase;

    class ApiPasswordResetRequest extends ObjectBase {
        /** @var string */
        public $email;

        /** @var string */
        public $newPassword;

        /** @var string */
        public $password;

    }
    