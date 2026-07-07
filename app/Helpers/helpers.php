<?php

if (! function_exists('localized_route')) {

    function localized_route(string $locale): string
    {
        return route(
            request()->route()->getName(),
            array_merge(
                request()->route()->parameters(),
                ['locale' => $locale]
            )
        );
    }

}
