<?php

    namespace DotykackaPHPApiClient;

    class ServiceBase {

        protected $apiClient;

        public function __construct( ApiClient $apiClient ) {

            $this->apiClient = $apiClient;

        }

    }
    