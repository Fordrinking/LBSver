<?php

namespace app\http\controllers;

use blink\core\Object;
use blink\http\Request;
use app\dao\Database;

class ApiController extends Object
{
    public function upload(Request $request)
    {
        $openid = $request->params->get('openid');
        $longtitude = $request->params->get('longitude');
        $latitude = $request->params->get('latitude');

        if ($openid && strlen($openid) == 32) {
            $db = Database::get();

            $db->insert("tbTest", array(
                "sOpenId" => $openid,
                "sLongtitude" => $longtitude,
                "sLatitude" => $latitude
            ));

            return [
                "code" => 0,
                "msg" => "ok"
            ];
        } else {
            return [
                "code" => -1,
                "msg" => "openid is wrong"
            ];
        }



    }
}
