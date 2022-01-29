<?php

/**
 *
 * Задача 4.
 *
 * @param $url
 * @return string
 */
function modifyUrl($url) {
    $url = 'http://www.site.com/example/my_code.html?param_1=5&param_2=20&param_3=10&param_4=30';
    $url = parse_url($url);

    $sortedQueryArr = [];
    $max = null;
    $queryArr = explode('&', $url['query']);

    /**
     * Удалить параметр со значением “10”
     * Отсартировать параметры по значению в обратном порядке
     */
    if(!empty($queryArr)){
        foreach($queryArr as $key => $value) {
            $valueArr = explode('=', $value);
            if ($valueArr[1] != '10') {

                if(is_null($max)) {
                    $max = $valueArr[1];
                }

                if($valueArr[1] >= $max) {
                    $max = $valueArr[1];
                    array_unshift($sortedQueryArr, $value);
                } else {
                    $sortedQueryArr[] = $value;
                }
            }
        }
    }

    // добавить параметр “url” со значением из переданной ссылки без параметров
    $url['query'] = implode('&', $sortedQueryArr) . '&url=' . urlencode($url['path']);
    $url = $url['scheme'] . '://' . $url['host'] . '/?' .  $url['query'];

    return $url;
}
