<?php

Route::get('/', 'StaffController@index');
Route::get('home', 'StaffController@index');

Route::resource('student', 'UserController');
Route::resource('rayon', 'RayonController');
Route::resource('rombel', 'RombelController');
Route::resource('attendance', 'AttendanceController');