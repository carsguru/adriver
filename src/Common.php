<?php

namespace CarsGuru\Adriver;

class Common
{
    /**
     * Return referer from referer of adriver.
     *
     * @param string $referer
     *
     * @return null|string
     */
    public function extractReferer($referer)
    {
        $query = parse_url($referer, PHP_URL_QUERY);
        if (empty($query)) {
            return null;
        }
        parse_str($query, $params);
        if (!isset($params['html_params'])) {
            return null;
        }
        $params = urldecode($params['html_params']);
        parse_str($params, $params);
        if (!isset($params['ref'])) {
            return null;
        }
        return $params['ref'];
    }
}
