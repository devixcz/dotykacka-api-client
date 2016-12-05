<?php

    namespace DotykackaPHPApiClient;

    class Factory {

        /**
         * @param $name
         *
         * @return ServiceBase
         */
        public function service( $name, $OAuth2Token = null ) {

            $className = self::camelize( $name );

            $apiClient = new ApiClient();
            if( $OAuth2Token ) {
                $apiClient->setOAuth2Token( $OAuth2Token );
            }
            $className = __NAMESPACE__ . '\\Service\\' . $className;
            $service   = new $className( $apiClient );

            return $service;
        }

        /**
         * Camelizes a string.
         *
         * @param string $id A string to camelize
         *
         * @return string The camelized string
         */
        public static function camelize( $id ) {
            return strtr(
                    ucwords(
                            strtr(
                                    $id,
                                    array(
                                            '_'  => ' ',
                                            '.'  => '_ ',
                                            '\\' => '_ '
                                    )
                            )
                    ),
                    array( ' ' => '' )
            );
        }

    }