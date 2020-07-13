<?php

Route::get('/genchile/{associateid}', 'genChile\GenChile@index');
Route::get('/genchile/export/{associateid}', 'genChile\GenChile@exportExcel');