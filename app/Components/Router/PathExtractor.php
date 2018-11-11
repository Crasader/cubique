<?php
namespace Components\Router;

use Components\Request\Request;

class PathExtractor
{
    public function extract($pattern, $uri)
    {
        $flag = true;

        $parameters = [];
        $pattern = preg_split('~\/~', $pattern, -1, PREG_SPLIT_NO_EMPTY);
 
        foreach ($pattern as &$segment) {
            if (preg_match('~^\{.+\}$~', $segment)) {
                $segment = preg_replace('~(?:^\{|\}$)~', '', $segment);
                $segment = preg_split('~[\s]*?:[\s]*?~', $segment);
                $parameters[$segment[0]] = isset($segment[1]) ? $segment[1] : '^';
                $segment = $segment[0];
            }
        }

        $uri = preg_replace('~\?.*$~', '', $uri);
        $uri = preg_split('~\/~', $uri, -1, PREG_SPLIT_NO_EMPTY);

        if (count($uri) !== count($pattern)) {
            return false;
        }

        foreach ($pattern as $key => &$segment) {
            if (!isset($parameters[$segment])) {
                if ($segment !== $uri[$key]) {
                    $flag = false;
                }
            } 
            else {
                if (preg_match('~' . $parameters[$segment] . '~', $uri[$key])) {
                    $parameters[$segment] = $uri[$key];
                } else {
                    $flag = false;
                }
            }
        }

        return $flag ? $parameters : false;
    }
}