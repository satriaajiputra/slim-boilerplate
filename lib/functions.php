<?php

if (!function_exists('route')) {
    function route(string $routeName, array $data = [], array $params = [])
    {
        global $app;

        return $app->getContainer()->get('routeParser')->urlFor($routeName, $data, $params);
    }
}

if (!function_exists('setting')) {
    function setting(string $settingName, bool $resultAsCollection = false)
    {
        global $app;

        try {
            $setting = $app->getContainer()->get('settings')[$settingName];
            if(!$resultAsCollection) $setting = $setting->setting_value;
            return $setting;
        } catch (\Exception $error) {
            die($error->getMessage());
        }
    }
}