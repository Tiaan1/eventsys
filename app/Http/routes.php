<?php

Route::group(['middleware' => ['web']], function () {

    // Registraton and Login Route.
    Route::auth();


    // AdminController Routes
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
        Route::get('view', ['as' => 'dashboard', 'uses' => 'Admin\AdminController@index']);

    // AdminDayController Routes
        Route::get('days/show', ['as' => 'days', 'uses' => 'Admin\AdminDayController@index']);
        Route::get('day/create', ['as' => 'day.create', 'uses' => 'Admin\AdminDayController@create']);
        Route::post('days/store', ['as' => 'days.store', 'uses' => 'Admin\AdminDayController@store']);
        Route::get('days/edit/{id}', ['as' => 'days.edit', 'uses' => 'Admin\AdminDayController@edit']);
        Route::post('days/update/{id}', ['as' => 'days.update', 'uses' => 'Admin\AdminDayController@update']);
        Route::post('days/destroy/{id}', ['as' => 'days.destroy', 'uses' => 'Admin\AdminDayController@destroy']);

    // AdminScheduleController Routes
        Route::get('schedule/{slug}', ['as' => 'schedule', 'uses' => 'Admin\AdminScheduleController@index']);

    // AdminPdfController Routes
        Route::get('pdf', ['as' => 'pdf', 'uses' => 'Admin\AdminPdfController@index']);
        Route::post('pdf/store', ['as' => 'pdf.store', 'uses' => 'Admin\AdminPdfController@store']);
        Route::post('pdf/destroy/{id}', ['as' => 'pdf.destroy', 'uses' => 'Admin\AdminPdfController@destroy']);

    // AdminPlenaryPanelContrller Routes
        Route::get('plenary/edit/{id}', ['as' => 'plenary.edit', 'uses' => 'Admin\AdminPlenaryPanelController@edit']);
        Route::post('plenary/store/{slug}', ['as' => 'plenary.store', 'uses' => 'Admin\AdminPlenaryPanelController@store']);
        Route::patch('plenary/update/{id}', ['as' => 'plenary.update', 'uses' => 'Admin\AdminPlenaryPanelController@update']);
        Route::post('plenary/destroy/{id}', ['as' => 'plenary.destroy', 'uses' => 'Admin\AdminPlenaryPanelController@destroy']);

    // AdminStreamController Routes
        Route::post('stream.create', ['as' => 'stream.create', 'uses' => 'Admin\AdminStreamController@store']);
        Route::post('stream.destroy/{id}', ['as' => 'stream.destroy', 'uses' => 'Admin\AdminStreamController@destroy']);

    // AdminStreamPanelController Routes
        Route::post('streamPanel.create', ['as' => 'streamPanel.create', 'uses' => 'Admin\AdminStreamPanelController@store']);
        Route::get('streamPanel/edit/{id}', ['as' => 'streamPanel.edit', 'uses' => 'Admin\AdminStreamPanelController@edit']);
        Route::patch('streamPanel/update/{id}', ['as' => 'streamPanel.update', 'uses' => 'Admin\AdminStreamPanelController@update']);
        Route::post('streamPanel/destroy/{id}', ['as' => 'streamPanel.destroy', 'uses' => 'Admin\AdminStreamPanelController@destroy']);

    // AdminSpeakerController Routes
        Route::get('speakers', ['as' => 'speakers', 'uses' => 'Admin\AdminSpeakerController@index']);
        Route::get('speaker/create', ['as' => 'speaker.create', 'uses' => 'Admin\AdminSpeakerController@create']);
        Route::post('speakers/store', ['as' => 'speakers.store', 'uses' => 'Admin\AdminSpeakerController@store']);
        Route::post('speakers/delete', ['as' => 'speakers.destroy', 'uses' => 'Admin\AdminSpeakerController@destroy']);
        Route::get('speakers/edit/{username}', ['as' => 'speakers.edit', 'uses' => 'Admin\AdminSpeakerController@edit']);
        Route::post('speakers/edit/{username}', ['as' => 'speakers.update', 'uses' => 'Admin\AdminSpeakerController@update']);

    // AdminSonsorController Routes
        Route::get('sponsors/view', ['as' => 'sponsors.view', 'uses' => 'Admin\AdminSponsorController@index']);
        Route::get('sponsors/create', ['as' => 'sponsors.create', 'uses' => 'Admin\AdminSponsorController@create']);
        Route::post('sponsors/store', ['as' => 'sponsors.store', 'uses' => 'Admin\AdminSponsorController@store']);
        Route::get('sponsors/edit/{id}', ['as' => 'sponsors.edit', 'uses' => 'Admin\AdminSponsorController@edit']);
        Route::post('sponsors/update/{id}', ['as' => 'sponsors.update', 'uses' => 'Admin\AdminSponsorController@update']);
        Route::post('sponsors/delete/{id}', ['as' => 'sponsors.destroy', 'uses' => 'Admin\AdminSponsorController@destroy']);

    // AdminPartnerController Routes
        Route::get('partners/show', ['as' => 'partners.show', 'uses' => "Admin\AdminPartnerController@index"]);
        Route::post('partners/store', ['as' => 'partners.store', 'uses' => "Admin\AdminPartnerController@store"]);
        Route::get('partners/create', ['as' => 'partners.create', 'uses' => "Admin\AdminPartnerController@create"]);
        Route::get('partners/edit/{slug}', ['as' => 'partners.edit', 'uses' => "Admin\AdminPartnerController@edit"]);
        Route::post('partners/update/{slug}', ['as' => 'partners.update', 'uses' => "Admin\AdminPartnerController@update"]);
        Route::post('partners/destroy/{slug}', ['as' => 'partners.destroy', 'uses' => "Admin\AdminPartnerController@destroy"]);

    // AdminCategoryController Routes
        Route::get('categories/view', ['as' => 'categories.view', 'uses' => 'Admin\AdminCategoryController@index']);
        Route::post('categories/store', ['as' => 'categories.store', 'uses' => 'Admin\AdminCategoryController@store']);
        Route::get('categories/create', ['as' => 'categories.create', 'uses' => 'Admin\AdminCategoryController@create']);
        Route::get('categories/edit/{id}', ['as' => 'categories.edit', 'uses' => 'Admin\AdminCategoryController@edit']);
        Route::post('categories/update/{id}', ['as' => 'categories.update', 'uses' => 'Admin\AdminCategoryController@update']);
        Route::post('categories/destroy/{id}', ['as' => 'categories.destroy', 'uses' => 'Admin\AdminCategoryController@destroy']);

    // NewsletterController Routes
        Route::get('newsletter/subscribers', ['as' => 'newsletter.subscribers', 'uses' => 'Admin\AdminNewsletterController@index']);
        Route::post('newsletter/store', ['as' => 'newsletter.store', 'uses' => 'Admin\AdminNewsletterController@store']);
        Route::post('newsletter/delete/{id}', ['as' => 'newsletter.delete', 'uses' => 'Admin\AdminNewsletterController@destroy']);

    // PricePlanController Routes
        Route::get('plans/view', ['as' => 'plans.view', 'uses' => 'Admin\AdminPricePlanController@index']);
        Route::post('plans/store', ['as' => 'plan.store', 'uses' => 'Admin\AdminPricePlanController@store']);
        Route::get('plans/create', ['as' => 'plan.create', 'uses' => 'Admin\AdminPricePlanController@create']);
        Route::get('plans/edit/{id}', ['as' => 'plan.edit', 'uses' => 'Admin\AdminPricePlanController@edit']);
        Route::post('plans/update/{id}', ['as' => 'plan.update', 'uses' => 'Admin\AdminPricePlanController@update']);
        Route::post('plans/destroy/{id}', ['as' => 'plan.destroy', 'uses' => 'Admin\AdminPricePlanController@destroy']);

    // PricePlanOptionController Routes
        Route::get('PlanOption/create', ['as' => 'PlanOption.create', 'uses' => 'Admin\AdminPricePlanOptionController@create']);
        Route::post('PlanOption/store', ['as' => 'PlanOption.store', 'uses' => 'Admin\AdminPricePlanOptionController@store']);
        Route::get('PlanOption/edit/{id}', ['as' => 'PlanOption.edit', 'uses' => 'Admin\AdminPricePlanOptionController@edit']);
        Route::post('PlanOption/update/{id}', ['as' => 'PlanOption.update', 'uses' => 'Admin\AdminPricePlanOptionController@update']);
        Route::post('PlanOption/destroy/{id}', ['as' => 'PlanOption.destroy', 'uses' => 'Admin\AdminPricePlanOptionController@destroy']);

    // SettingsController Routes
        Route::get('settings', ['as' => 'settings', 'uses' => 'Admin\AdminSettingsController@index']);

    // AdminSliderController Routes
        Route::get('sliders', ['as' => 'sliders.show', 'uses' => 'Admin\AdminSliderController@index']);
        Route::post('slider/store', ['as' => 'sliders.store', 'uses' => 'Admin\AdminSliderController@store']);
        Route::get('slider/edit/{id}', ['as' => 'slider.edit', 'uses' => 'Admin\AdminSliderController@edit']);
        Route::get('slider/create', ['as' => 'sliders.create', 'uses' => 'Admin\AdminSliderController@create']);
        Route::post('slider/update/{id}', ['as' => 'sliders.update', 'uses' => 'Admin\AdminSliderController@update']);
        Route::post('slider/destroy/{id}', ['as' => 'sliders.destroy', 'uses' => 'Admin\AdminSliderController@destroy']);

    // AdminHomePageContentController Routes
        Route::get('pages/home/show', ['as' => 'pages.home.show', 'uses' => 'Admin\AdminHomePageContentController@index']);
        Route::get('pages/home/create', ['as' => 'pages.home.create', 'uses' => 'Admin\AdminHomePageContentController@create']);
        Route::post('pages/home/store', ['as' => 'pages.home.store', 'uses' => 'Admin\AdminHomePageContentController@store']);
        Route::get('pages/home/edit/{id}', ['as' => 'pages.home.edit', 'uses' => 'Admin\AdminHomePageContentController@edit']);
        Route::post('pages/home/update/{id}', ['as' => 'pages.home.update', 'uses' => 'Admin\AdminHomePageContentController@update']);
        Route::post('pages/home/destroy/{id}', ['as' => 'pages.home.destroy', 'uses' => 'Admin\AdminHomePageContentController@destroy']);

    // AdminAboutUsController Routes
        Route::get('pages/about/create', ['as' => 'pages.about.create', 'uses' => 'Admin\AdminAboutUsController@create']);
        Route::get('pages/about/edit', ['as' => 'pages.about.edit', 'uses' => 'Admin\AdminAboutUsController@edit']);
        Route::post('pages/about/store', ['as' => 'pages.about.store', 'uses' => 'Admin\AdminAboutUsController@store']);
        Route::post('pages/about/update/{id}', ['as' => 'pages.about.update', 'uses' => 'Admin\AdminAboutUsController@update']);
    });

    // SpeakerController Routes
        Route::get('speakers', ['as' => 'speakers', 'uses' => 'Frontend\SpeakerController@index']);
        Route::get('speaker/view/{slug}', ['as' => 'speakers.show', 'uses' => 'Frontend\SpeakerController@show']);

    // SponsorController Routes
        Route::get('sponsors', ['as' => 'sponsors', 'uses' => 'Frontend\SponsorController@index']);
        Route::get('sponsors/show/{slug}', ['as' => 'sponsors.show', 'uses' => 'Frontend\SponsorController@show']);

    // HomeController Routes
        Route::get('/', ['as' => 'home', 'uses' => 'Frontend\HomeController@index']);

    // AboutController Routes
        Route::get('about', ['as' => 'about', 'uses' => 'Frontend\AboutController@index']);

    // ScheduleController Routes
        Route::get('schedule', ['as' => 'schedule', 'uses' => 'Frontend\ScheduleController@index']);

    // PartnerController Routes
        Route::get('partners', ['as' => 'partners', 'uses' => 'Frontend\PartnerController@index']);
        Route::get('partners/show/{slug}', ['as' => 'partners.show', 'uses' => 'Frontend\PartnerController@show']);

    // BookingsController Routes
        Route::get('bookings', ['as' => 'bookings.show', 'uses'=>'Frontend\BookingController@index']);
});
