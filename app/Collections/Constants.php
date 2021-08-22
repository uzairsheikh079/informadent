<?php

namespace App\Collections;

class Constants {


    Const ROLES = [
        "SUPER-ADMIN" => 1,
        "ADMIN" => 2, 
        "USER" => 3,
        "PATIENT" => 4
    ];

    Const ROLES_ARRAY = [
        "SUPER-ADMIN" => array(self::ROLES["SUPER-ADMIN"]),
        "ADMIN" => array(self::ROLES["SUPER-ADMIN"], self::ROLES["ADMIN"]),
        "USER" => array(self::ROLES["SUPER-ADMIN"], self::ROLES["ADMIN"], self::ROLES["USER"]),
        "PATIENT" => array(self::ROLES["PATIENT"])
    ];
}
