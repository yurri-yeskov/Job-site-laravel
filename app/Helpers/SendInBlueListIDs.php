<?php

/**
 * JobClass - Job Board Web Application
 * Copyright (c) BedigitCom. All Rights Reserved
 *
 * Website: https://bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from CodeCanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Helpers;

class SendInBlueListIDs
{

    /**
     * @param $entry
     * @param bool $encoded
     * @return string
     */
    public static function getListId($user_type)
    {

        $array = [
            '1' => 17,      // worker list ID
            '2' => 3        // employer list ID
        ];
        return $array[$user_type];
    }
}
