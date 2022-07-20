const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
 mix.webpackConfig({
    resolve: {
        fallback: { fs: false }
    }
});
mix.copy('resources/metronic_assets/plugins/global/plugins.bundle.css',
    'public/assets/plugins/plugins.bundle.css');
mix.copy('resources/metronic_assets/css/style.bundle.css',
    'public/assets/css/style.bundle.css');
mix.copy('resources/assets/js/currency.js', 'public/js/currency.js');
mix.copy('resources/metronic_assets/plugins/global/plugins.bundle.js', 'public/assets/plugins/plugins.bundle.js');
mix.copy('resources/metronic_assets/js/scripts.bundle.js', 'public/assets/js/scripts.bundle.js');
mix.copyDirectory('resources/metronic_assets/js/custom', 'public/assets/js/custom');
mix.copyDirectory('resources/metronic_assets/media', 'public/assets/media');
mix.js('resources/js/app.js', 'public/js').vue();
mix.sass('resources/sass/app.scss', 'public/css');
mix.sass('resources/assets/sass/style.scss', 'public/assets/css/style.css');

/* css */
mix.sass('resources/assets/sass/custom.scss', 'public/assets/css/custom.css').
sass('resources/assets/sass/companies-listing.scss',
    'public/assets/css/companies-listing.css').
sass('resources/assets/sass/dashboard-widgets.scss',
    'public/assets/css/dashboard-widgets.css').
sass('resources/assets/sass/web-popular-categories.scss',
    'public/assets/css/web-popular-categories.css').
sass('resources/assets/sass/candidate-dashboard.scss',
    'public/assets/css/candidate-dashboard.css').
sass('resources/assets/sass/front-blogs.scss',
    'public/assets/css/front-blogs.css').
sass('resources/assets/sass/custom-theme.scss',
    'public/assets/css/custom-theme.css').
sass('resources/assets/sass/infy-loader.scss',
    'public/assets/css/infy-loader.css').
sass('resources/assets/sass/flex.scss',
    'public/assets/css/flex.css').
sass('resources/assets/sass/stretchy-navigation.scss',
    'public/assets/css/stretchy-navigation.css').
sass('resources/assets/sass/web_contact.scss',
    'public/assets/css/web_contact.css').
version();

mix.copyDirectory('resources/assets/img', 'public/assets/img');
mix.copyDirectory('node_modules/summernote/dist/font',
    'public/assets/css/font');
mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts',
    'public/assets/webfonts');

mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css',
    'public/assets/css/bootstrap.min.css');
mix.copy('node_modules/sweetalert/dist/sweetalert.css',
    'public/assets/css/sweetalert.css');
mix.copy('node_modules/izitoast/dist/css/iziToast.min.css',
    'public/assets/css/iziToast.min.css');
mix.copy('node_modules/datatables.net-dt/css/jquery.dataTables.min.css',
    'public/assets/css/jquery.dataTables.min.css');
mix.copy('node_modules/datatables.net-dt/images', 'public/assets/images');
mix.copy('node_modules/summernote/dist/summernote.min.css',
    'public/assets/css/summernote.min.css');
mix.copy('node_modules/@fortawesome/fontawesome-free/css/all.min.css',
    'public/assets/css/font-awesome.min.css');
mix.copy('node_modules/select2/dist/css/select2.min.css',
    'public/assets/css/select2.min.css');
mix.copy('node_modules/ion-rangeslider/css/ion.rangeSlider.min.css',
    'public/assets/css/ion.rangeSlider.min.css');
mix.copy('resources/assets/js/currency.js', 'public/js/currency.js');
mix.copy('node_modules/intl-tel-input/build/css/intlTelInput.css',
    'public/assets/css/inttel/css/intlTelInput.css');
mix.copy('node_modules/intl-tel-input/build/css/intlTelInput.css',
    'public/assets/css/inttel/css/intlTelInput.css');
mix.copyDirectory('node_modules/intl-tel-input/build/img',
    'public/assets/css/inttel/img');
mix.copy('node_modules/bootstrap-daterangepicker/daterangepicker.css',
    'public/assets/css/daterangepicker.css');
mix.copy('node_modules/timepicker/jquery.timepicker.min.css',
    'public/assets/css/jquery.timepicker.min.css');

mix.babel('node_modules/bootstrap/dist/js/bootstrap.min.js',
    'public/assets/js/bootstrap.min.js');
mix.babel('node_modules/jquery/dist/jquery.min.js',
    'public/assets/js/jquery.min.js');
mix.babel('node_modules/popper.js/dist/umd/popper.min.js',
    'public/assets/js/popper.min.js');
mix.babel('node_modules/sweetalert/dist/sweetalert.min.js',
    'public/assets/js/sweetalert.min.js');
mix.babel('node_modules/moment/min/moment.min.js',
    'public/assets/js/moment.min.js');
mix.babel('node_modules/chart.js/dist/Chart.min.js',
    'public/assets/js/chart.min.js');
mix.babel('node_modules/bootstrap-daterangepicker/daterangepicker.js',
    'public/assets/js/daterangepicker.js');
mix.babel('node_modules/izitoast/dist/js/iziToast.min.js',
    'public/assets/js/iziToast.min.js');
mix.babel('node_modules/datatables.net/js/jquery.dataTables.min.js',
    'public/assets/js/jquery.dataTables.min.js');
mix.babel('node_modules/summernote/dist/summernote.min.js',
    'public/assets/js/summernote.min.js');
mix.babel('node_modules/jquery.nicescroll/dist/jquery.nicescroll.js',
    'public/assets/js/jquery.nicescroll.js');
mix.babel('node_modules/select2/dist/js/select2.min.js',
    'public/assets/js/select2.min.js');
mix.babel('node_modules/ion-rangeslider/js/ion.rangeSlider.min.js',
    'public/assets/js/ion.rangeSlider.min.js');
mix.babel('node_modules/intl-tel-input/build/js/intlTelInput.js',
    'public/assets/js/inttel/js/intlTelInput.min.js');
mix.babel('node_modules/intl-tel-input/build/js/utils.js',
    'public/assets/js/inttel/js/utils.min.js');
mix.babel('node_modules/autonumeric/dist/autoNumeric.min.js',
    'public/assets/js/autonumeric/autoNumeric.min.js');
mix.babel('node_modules/handlebars/dist/handlebars.js',
    'public/assets/js/handlebars.js');
mix.babel('node_modules/timepicker/jquery.timepicker.min.js',
    'public/assets/js/jquery.timepicker.min.js');

mix.js('resources/assets/js/custom/custom.js',
    'public/assets/js/custom/custom.js').js('resources/assets/js/custom/custom-datatable.js',
    'public/assets/js/custom/custom-datatable.js').js('resources/assets/js/job_categories/job_categories.js',
    'public/assets/js/job_categories/job_categories.js').js('resources/assets/js/settings/settings.js',
    'public/assets/js/settings/settings.js').js('resources/assets/js/company_sizes/company_sizes.js',
    'public/assets/js/company_sizes/company_sizes.js').js('resources/assets/js/marital_status/marital_status.js',
    'public/assets/js/marital_status/marital_status.js').js('resources/assets/js/salary_periods/salary_periods.js',
    'public/assets/js/salary_periods/salary_periods.js').js('resources/assets/js/job_shifts/job_shifts.js',
    'public/assets/js/job_shifts/job_shifts.js').js('resources/assets/js/industries/industries.js',
    'public/assets/js/industries/industries.js').js('resources/assets/js/job_tags/job_tags.js',
    'public/assets/js/job_tags/job_tags.js').js('resources/assets/js/job_types/job_types.js',
    'public/assets/js/job_types/job_types.js').js('resources/assets/js/ownership_types/ownership_types.js',
    'public/assets/js/ownership_types/ownership_types.js').js('resources/assets/js/companies/companies.js',
    'public/assets/js/companies/companies.js').js('resources/assets/js/companies/create-edit.js',
    'public/assets/js/companies/create-edit.js').js('resources/assets/js/languages/languages.js',
    'public/assets/js/languages/languages.js').js('resources/assets/js/required_degree_levels/required_degree_levels.js',
    'public/assets/js/required_degree_levels/required_degree_levels.js').js('resources/assets/js/functional_areas/functional_areas.js',
    'public/assets/js/functional_areas/functional_areas.js').js('resources/assets/js/career_levels/career_levels.js',
    'public/assets/js/career_levels/career_levels.js').js('resources/assets/js/user_profile/user_profile.js',
    'public/assets/js/user_profile/user_profile.js').js('resources/assets/js/employer_profile/employer_profile.js',
    'public/assets/js/employer_profile/employer_profile.js').js('resources/assets/js/salary_currencies/salary_currencies.js',
    'public/assets/js/salary_currencies/salary_currencies.js').js('resources/assets/js/jobs/create-edit.js',
    'public/assets/js/jobs/create-edit.js').js('resources/assets/js/jobs/jobs.js',
    'public/assets/js/jobs/jobs.js').js('resources/assets/js/jobs/job_datatable_admin.js',
    'public/assets/js/jobs/job_datatable_admin.js').js('resources/assets/js/jobs/front/job_search.js',
    'public/assets/js/jobs/front/job_search.js').js('resources/assets/js/candidate/create-edit.js',
    'public/assets/js/candidate/create-edit.js').js('resources/assets/js/custom/input_price_format.js',
    'public/assets/js/custom/input_price_format.js').js('resources/assets/js/custom/state_country.js',
    'public/assets/js/custom/state_country.js').js('resources/assets/js/candidates/candidate-profile/candidate-resume.js',
    'public/assets/js/candidate-profile/candidate-resume.js').js('resources/assets/js/candidates/candidate-profile/candidate-education-experience.js',
    'public/assets/js/candidate-profile/candidate-education-experience.js').js('resources/assets/js/candidates/candidate-profile/cv-builder.js',
    'public/assets/js/candidate-profile/cv-builder.js').js('resources/assets/js/candidate/candidate-list.js',
    'public/assets/js/candidate/candidate-list.js').js('resources/assets/js/jobs/front/apply_job.js',
    'public/assets/js/jobs/front/apply_job.js').js('resources/assets/js/job_applications/job_applications.js',
    'public/assets/js/job_applications/job_applications.js').js('resources/assets/js/custom/currency.js',
    'public/assets/js/custom/currency.js').js('resources/assets/js/jobs/front/job_details.js',
    'public/assets/js/jobs/front/job_details.js').js('resources/assets/js/candidates/candidate-profile/candidate_career_informations.js',
    'public/assets/js/candidate-profile/candidate_career_informations.js').js('resources/assets/js/candidates/candidate-profile/candidate-general.js',
    'public/assets/js/candidate-profile/candidate-general.js').js('resources/assets/js/testimonial/testimonial.js',
    'public/assets/js/testimonial/testimonial.js').js('resources/assets/js/candidate/favourite_jobs.js',
    'public/assets/js/candidate/favourite_jobs.js').js('resources/assets/js/jobs/reported_jobs.js',
    'public/assets/js/jobs/reported_jobs.js').js('resources/assets/js/companies/front/company-details.js',
    'public/assets/js/companies/front/company-details.js').js('resources/assets/js/candidate/favourite_company.js',
    'public/assets/js/candidate/favourite_company.js').js('resources/assets/js/companies/front/reported_companies.js',
    'public/assets/js/companies/front/reported_companies.js').js('resources/assets/js/companies/front/companies.js',
    'public/assets/js/companies/front/companies.js').js('resources/assets/js/candidate_profile/candidate_profile.js',
    'public/assets/js/candidate_profile/candidate_profile.js').js('resources/assets/js/front_register/front_register.js',
    'public/assets/js/front_register/front_register.js').js('resources/assets/js/candidate/applied-jobs.js',
    'public/assets/js/candidate/applied-jobs.js').js('resources/assets/js/skills/skills.js',
    'public/assets/js/skills/skills.js').js('resources/assets/js/web/js/news_letter/news_letter.js',
    'public/assets/js/web/js/news_letter/news_letter.js').js('resources/assets/js/noticeboards/noticeboards.js',
    'public/assets/js/noticeboards/noticeboards.js').js('resources/assets/js/subscribers/subscribers.js',
    'public/assets/js/subscribers/subscribers.js').js('resources/assets/js/faqs/faqs.js',
    'public/assets/js/faqs/faqs.js').js('resources/assets/js/blog_categories/blog_categories.js',
    'public/assets/js/blog_categories/blog_categories.js').js('resources/assets/js/blogs/blogs.js',
    'public/assets/js/blogs/blogs.js').js('resources/assets/js/blogs/create-edit.js',
    'public/assets/js/blogs/create-edit.js').js('resources/assets/js/inquires/inquires.js',
    'public/assets/js/inquires/inquires.js').js('resources/assets/js/sidebar_menu_search/sidebar_menu_search.js',
    'public/assets/js/sidebar_menu_search/sidebar_menu_search.js').js('resources/assets/js/candidate/reported_candidates.js',
    'public/assets/js/candidate/reported_candidates.js').js('resources/assets/js/candidate/front/candidate-details.js',
    'public/assets/js/candidate/front/candidate-details.js').js('resources/assets/js/plans/plans.js',
    'public/assets/js/plans/plans.js').js('resources/assets/js/subscription/subscription.js',
    'public/assets/js/subscription/subscription.js').js('resources/assets/js/transactions/transactions.js',
    'public/assets/js/transactions/transactions.js').js('resources/assets/js/jobs/jobs_stripe_payment.js',
    'public/assets/js/jobs/jobs_stripe_payment.js').js('resources/assets/js/companies/companies_stripe_payment.js',
    'public/assets/js/companies/companies_stripe_payment.js').js('resources/assets/js/custom/phone-number-country-code.js',
    'public/assets/js/custom/phone-number-country-code.js').js('resources/assets/js/employer_transactions/transactions.js',
    'public/assets/js/employer_transactions/transactions.js').js('resources/assets/js/image_slider/image_slider.js',
    'public/assets/js/image_slider/image_slider.js').js('resources/assets/js/header_sliders/header_sliders.js',
    'public/assets/js/header_sliders/header_sliders.js').js('resources/assets/js/privacy_policy/privacy_policy.js',
    'public/assets/js/privacy_policy/privacy_policy.js').js('resources/assets/js/branding_sliders/branding_sliders.js',
    'public/assets/js/branding_sliders/branding_sliders.js').js('resources/assets/js/home/home.js',
    'public/assets/js/home/home.js').js('resources/assets/js/front_register/google-recaptcha.js',
    'public/assets/js/front_register/google-recaptcha.js').
js('resources/assets/js/employer/dashboard.js',
    'public/assets/js/employer/dashboard.js').
js('resources/assets/js/employer/follower.js',
    'public/assets/js/employer/follower.js').
js('resources/assets/js/countries/countries.js',
    'public/assets/js/countries/countries.js').js('resources/assets/js/states/states.js',
    'public/assets/js/states/states.js').js('resources/assets/js/cities/cities.js',
    'public/assets/js/cities/cities.js').js('resources/assets/js/jobs/job_notification.js',
    'public/assets/js/jobs/job_notification.js').js('resources/assets/js/language_translate/language_translate.js',
    'public/assets/js/language_translate/language_translate.js').js('resources/assets/js/candidate/resumes.js',
    'public/assets/js/candidate/resumes.js').js('resources/assets/js/web/front_settings/front_settings.js',
    'public/assets/js/web/front_settings/front_settings.js').js('resources/assets/js/dashboard/admin-dashboard.js',
    'public/assets/js/dashboard/admin-dashboard.js').js('resources/assets/js/email_templates/email_templates.js',
    'public/assets/js/email_templates/email_templates.js').js('resources/assets/js/email_templates/create-edit.js',
    'public/assets/js/email_templates/create-edit.js').js('resources/assets/js/web/js/blog/blog_comments.js',
    'public/assets/js/web/js/blog/blog_comments.js').js('resources/assets/js/selected_candidate/selected_candidate.js',
    'public/assets/js/selected_candidate/selected_candidate.js').js('resources/assets/js/job_stages/job_stages.js',
    'public/assets/js/job_stages/job_stages.js').js('resources/assets/js/job_applications/job_slots.js',
    'public/assets/js/job_applications/job_slots.js').js('resources/assets/js/job_expired/job_expired.js',
    'public/assets/js/job_expired/job_expired.js').js('resources/assets/js/job_published/job_published.js',
    'public/assets/js/job_published/job_published.js').js('resources/assets/js/post_comments/post_comments.js',
    'public/assets/js/post_comments/post_comments.js').js('resources/assets/js/front_cms/front_cms_setting.js',
    'public/assets/js/front_cms/front_cms_setting.js').js('resources/assets/js/job_published/create-edit.js',
    'public/assets/js/job_published/create-edit.js').js('resources/assets/js/subadmin/sub-admin.js',
    'public/assets/js/subadmin/sub-admin.js').js('resources/assets/js/admin_notice_boards/notice_boards.js',
    'public/assets/js/admin_notice_boards/notice_boards.js').version();
