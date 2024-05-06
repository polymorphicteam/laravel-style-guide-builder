<?php

function styleGuideControllerRoute($route)
{
    $route = "Cswiley\StyleGuide\StyleGuideController$route";
    return $route;
}

Route::group(['prefix' => config('styleguide.prefix')], function () {
    Route::get('/', styleGuideControllerRoute('@index'));
    Route::get('/{section}', styleGuideControllerRoute('@show'));
});
