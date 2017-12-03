<?php
/**
 * Created by PhpStorm.
 * User: markopoikkimaki
 * Date: 2017-12-03
 * Time: 18:50
 */

class RestApi
{

    /**
     * RestApi constructor.
     */
    public function __construct()
    {
        $this->init();
    }


    private function init() {


        add_action( 'rest_api_init', function () {
            register_rest_route( 'api/v1', '/test/(?P<id>\d+)', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_test'),
            ) );
        } );


    }

    /**
     * example: http://testsite1.dev/wp-json/api/v1/test/123
     * @param WP_REST_Request $request
     * @return array
     */
    public function get_test(WP_REST_Request $request) {

        $id = $request->get_param('id');

        return [  'TEST' => date('Y-m-d H:i:s'),  'ID' => $id ];
    }




}