<?php

namespace App\Http\Utils;

use Exception;

trait BanglaDate
{

    public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    public  function bn2en($number)
    {
        return str_replace(self::$bn, self::$en, $number);
    }

    public  function en2bn($number)
    {
        return str_replace(self::$en, self::$bn, $number);
    }

    public  function banglaNumber(String $date)
    {
        $bndate = "";

        $array = str_split(
            $date
        );
        foreach ($array as $char) {
            switch ($char) {
                case "0":
                    $bndate .= "০";
                    break;
                case "1":
                    $bndate .= "১";
                    break;
                case "2":
                    $bndate .= "২";
                    break;
                case "3":
                    $bndate .= "৩";
                    break;
                case "4":
                    $bndate .= "৪";
                    break;
                case "5":
                    $bndate .= "৫";
                    break;
                case "6":
                    $bndate .= "৬";
                    break;
                case "7":
                    $bndate .= "৭";
                    break;
                case "8":
                    $bndate .= "৮";
                    break;
                case "9":
                    $bndate .= "৯";
                    break;
                case "/":
                    $bndate .= "/";
                    break;
                    case " ":
                        $bndate .= " ";
                        break;
               case "-":
                            $bndate .= "-";
                            break;
            }
        }


        return $bndate;
    }

}
