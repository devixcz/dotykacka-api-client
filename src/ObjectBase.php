<?php

    namespace DotykackaPHPApiClient;

    class ObjectBase {

        public function __construct( $data = null ) {

            if( $data ) {
                foreach( $data as $k => $v ) {
                    if( property_exists(
                            static::class,
                            $k
                    ) ) {
                        $this->{$k} = $v;
                    }
                }
            }

        }

        public function __toString() {

            $arr = array();
            foreach( $this as $k => $v ) {
                if( !( null === $v ) ) {
                    $arr[$k] = $v;
                }
            }

            return json_encode( $arr );
            
        }

    }
    