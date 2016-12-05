<?php

    namespace DotykackaPHPApiClient\Service;

    use DotykackaPHPApiClient\Object\Tag;
    use DotykackaPHPApiClient\Response\Error;
    use DotykackaPHPApiClient\ServiceBase;

    class TagService extends ServiceBase {

        /**
         * @param int $cloudId
         * @param Tag $tag
         *
         * @return Tag|Error
         */
        public function createTag( $cloudId, Tag $tag ) {

            $response = $this->apiClient->sendRequest(
                    'POST',
                    'api/tag/' . $cloudId . '/create',
                    array(),
                    (string)$tag
            );

            if( isset( $response['error'] ) ) {
                return new Error( $response['error'] );
            }

            $responseObject = new Tag( $response );

            return $responseObject;

        }

        /**
         * @param int $cloudId
         * @param int $id
         *
         * @return Tag|Error
         */
        public function getTag( $cloudId, $id ) {

            $response = $this->apiClient->sendRequest(
                    'GET',
                    'api/tag/' . $cloudId . '/' . $id
            );

            if( isset( $response['error'] ) ) {
                return new Error( $response['error'] );
            }

            $responseObject = new Tag( $response );

            return $responseObject;

        }

        /**
         * @param int      $cloudId
         * @param int|null $limit
         * @param int|null $offset
         *
         * @return Tag[]|Error
         */
        public function getAllTagsForCloud( $cloudId, $limit = null, $offset = null ) {

            $params = array(
                    'limit'  => $limit,
                    'offset' => $offset
            );

            $response = $this->apiClient->sendRequest(
                    'GET',
                    'api/tag/' . $cloudId,
                    $params
            );

            if( isset( $response['error'] ) ) {
                return new Error( $response['error'] );
            }

            $list = array();

            foreach( $response as $item ) {

                $responseObject = new Tag( $item );
                $list[]         = $responseObject;

            }

            return $list;

        }

    }