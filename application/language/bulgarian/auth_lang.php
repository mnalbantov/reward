<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  English language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'This form post did not pass our security checks.';

// Login
$lang['login_heading']         = 'Вход';
$lang['login_subheading']      = 'Въведете email и парола за вход в системата.';
$lang['login_identity_label']  = 'Email:';
$lang['login_password_label']  = 'Парола:';
$lang['login_remember_label']  = 'Запомни ме:';
$lang['login_submit_btn']      = 'Вход';
$lang['login_forgot_password'] = 'Забравена парола?';

// Index
$lang['index_heading']           = 'Потребители';
$lang['index_subheading']        = 'Списък с потребители в сайта.';
$lang['index_fname_th']          = 'Име';
$lang['index_lname_th']          = 'Фамилия';
$lang['index_email_th']          = 'Email';
$lang['index_groups_th']         = 'Група';
$lang['index_status_th']         = 'Статус';
$lang['index_action_th']         = 'Опции';
$lang['index_active_link']       = 'Активен';
$lang['index_inactive_link']     = 'Неактивен';
$lang['index_create_user_link']  = 'Създай потребител';
$lang['index_create_group_link'] = 'Създай група';

// Deactivate User
$lang['deactivate_heading']                  = 'Деактивиране на потребител';
$lang['deactivate_subheading']               = 'Сигурни ли сте,че искате да деактивирате \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Да:';
$lang['deactivate_confirm_n_label']          = 'Не:';
$lang['deactivate_submit_btn']               = 'Изпрати';
$lang['deactivate_validation_confirm_label'] = 'confirmation';
$lang['deactivate_validation_user_id_label'] = 'user ID';

// Create User
$lang['create_user_heading']                           = 'Създаване потребител';
$lang['create_user_subheading']                        = 'Въведете информация за потребителя.';
$lang['create_user_fname_label']                       = 'Име:';
$lang['create_user_lname_label']                       = 'Фамилия:';
$lang['create_user_identity_label']                    = 'Никнейм:';
$lang['create_user_company_label']                     = 'Компания:';
$lang['create_user_email_label']                       = 'Email:';
$lang['create_user_phone_label']                       = 'Телефон:';
$lang['create_user_password_label']                    = 'Парола:';
$lang['create_user_password_confirm_label']            = 'Повтори парола:';
$lang['create_user_submit_btn']                        = 'Създай';
$lang['create_user_validation_fname_label']            = 'Име';
$lang['create_user_validation_lname_label']            = 'Фамилия';
$lang['create_user_validation_identity_label']         = 'Никнейм';
$lang['create_user_validation_email_label']            = 'Email Address';
$lang['create_user_validation_phone_label']            = 'Телефон';
$lang['create_user_validation_company_label']          = 'Компания';
$lang['create_user_validation_password_label']         = 'Парола';
$lang['create_user_validation_password_confirm_label'] = 'Повтори парола';

// Edit User
$lang['edit_user_heading']                           = 'Редакция на потребител';
$lang['edit_user_subheading']                        = 'Въведете информация за потребителя.';
$lang['edit_user_fname_label']                       = 'Име:';
$lang['edit_user_lname_label']                       = 'Фамилия:';
$lang['edit_user_company_label']                     = 'Компания:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_phone_label']                       = 'Телефон:';
$lang['edit_user_password_label']                    = 'Парола: (ако променяте паролата)';
$lang['edit_user_password_confirm_label']            = 'Повтори Парола: (ако променяте паролата)';
$lang['edit_user_groups_heading']                    = 'Групи';
$lang['edit_user_submit_btn']                        = 'Запази';
$lang['edit_user_validation_fname_label']            = 'Име';
$lang['edit_user_validation_lname_label']            = 'Фамилия';
$lang['edit_user_validation_email_label']            = 'Email Address';
$lang['edit_user_validation_phone_label']            = 'Телефон';
$lang['edit_user_validation_company_label']          = 'Компания';
$lang['edit_user_validation_groups_label']           = 'Групи';
$lang['edit_user_validation_password_label']         = 'Парола';
$lang['edit_user_validation_password_confirm_label'] = 'Парола Парола';

// Create Group
$lang['create_group_title']                  = 'Създаване на група';
$lang['create_group_heading']                = 'Създаване на група';
$lang['create_group_subheading']             = 'Въведете информация за групата.';
$lang['create_group_name_label']             = 'Име на група:';
$lang['create_group_desc_label']             = 'Описание:';
$lang['create_group_submit_btn']             = 'Създай';
$lang['create_group_validation_name_label']  = 'Име на групата';
$lang['create_group_validation_desc_label']  = 'Описание';

// Edit Group
$lang['edit_group_title']                  = 'Редакция на група';
$lang['edit_group_saved']                  = 'Редактиране на група';
$lang['edit_group_heading']                = 'Редактирай';
$lang['edit_group_subheading']             = 'Въведете информация за групата.';
$lang['edit_group_name_label']             = 'Име на група:';
$lang['edit_group_desc_label']             = 'Описание:';
$lang['edit_group_submit_btn']             = 'Запиши';
$lang['edit_group_validation_name_label']  = 'Име на група';
$lang['edit_group_validation_desc_label']  = 'Описание';

// Change Password
$lang['change_password_heading']                               = 'Change Password';
$lang['change_password_old_password_label']                    = 'Old Password:';
$lang['change_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['change_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['change_password_submit_btn']                            = 'Change';
$lang['change_password_validation_old_password_label']         = 'Old Password';
$lang['change_password_validation_new_password_label']         = 'New Password';
$lang['change_password_validation_new_password_confirm_label'] = 'Confirm New Password';

// Forgot Password
$lang['forgot_password_heading']                 = 'Забравена парола';
$lang['forgot_password_subheading']              = 'Въведете своя  %s и ще ви изпратим нов активационен код.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Изпрати';
$lang['forgot_password_validation_email_label']  = 'Email Address';
$lang['forgot_password_username_identity_label'] = 'Username';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'Няма намерен такъв email адрес.';

// Reset Password
$lang['reset_password_heading']                               = 'Change Password';
$lang['reset_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['reset_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['reset_password_submit_btn']                            = 'Change';
$lang['reset_password_validation_new_password_label']         = 'New Password';
$lang['reset_password_validation_new_password_confirm_label'] = 'Confirm New Password';

// Activation Email
$lang['email_activate_heading']    = 'Activate account for %s';
$lang['email_activate_subheading'] = 'Please click this link to %s.';
$lang['email_activate_link']       = 'Activate Your Account';

// Forgot Password Email
$lang['email_forgot_password_heading']    = 'Reset Password for %s';
$lang['email_forgot_password_subheading'] = 'Please click this link to %s.';
$lang['email_forgot_password_link']       = 'Reset Your Password';

// New Password Email
$lang['email_new_password_heading']    = 'New Password for %s';
$lang['email_new_password_subheading'] = 'Your password has been reset to: %s';

