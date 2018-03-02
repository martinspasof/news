<?php

use Illuminate\Database\Seeder;

class LanguageLinesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('language_lines')->delete();
        
        \DB::table('language_lines')->insert(array (
            0 => 
            array (
                'id' => 1,
                'lang_group' => 'backend',
                'lang_key' => 'Error!',
                'text' => '{"en":"Error!","bg":"Грешка!"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => 3,
                'lang_group' => 'backend',
                'lang_key' => 'Showing Translations',
                'text' => '{"en":"Showing Translations","bg":"Показване на преводи"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => 4,
                'lang_group' => 'backend',
                'lang_key' => 'Showing All Translations',
                'text' => '{"en":"Showing All Translations","bg":"Показване на всички преводи"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            3 => 
            array (
                'id' => 5,
                'lang_group' => 'backend',
                'lang_key' => 'Filter By Group',
                'text' => '{"en":"Filter By Group","bg":"Филтрирай по група"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            4 => 
            array (
                'id' => 6,
                'lang_group' => 'backend',
                'lang_key' => 'Search By Text or Key',
                'text' => '{"en":"Search By Text or Key","bg":"Търсене по текст или ключ"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            5 => 
            array (
                'id' => 7,
                'lang_group' => 'backend',
                'lang_key' => 'Showing',
                'text' => '{"en":"Showing","bg":"Показване"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            6 => 
            array (
                'id' => 8,
                'lang_group' => 'backend',
                'lang_key' => 'From',
                'text' => '{"en":"From","bg":"от"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            7 => 
            array (
                'id' => 9,
                'lang_group' => 'backend',
                'lang_key' => 'Results',
                'text' => '{"en":"Results","bg":"Резултати"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            8 => 
            array (
                'id' => 10,
                'lang_group' => 'backend',
                'lang_key' => 'Translations',
                'text' => '{"en":"Translations","bg":"Преводи"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            9 => 
            array (
                'id' => 11,
                'lang_group' => 'backend',
                'lang_key' => 'Key',
                'text' => '{"en":"Key","bg":"Ключ"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            10 => 
            array (
                'id' => 12,
                'lang_group' => 'backend',
                'lang_key' => 'Group',
                'text' => '{"en":"Group","bg":"Група"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            11 => 
            array (
                'id' => 13,
                'lang_group' => 'backend',
                'lang_key' => 'Updated',
                'text' => '{"en":"Updated","bg":"Обновено"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            12 => 
            array (
                'id' => 14,
                'lang_group' => 'backend',
                'lang_key' => 'Update',
                'text' => '{"en":"Update","bg":"Обнови"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            13 => 
            array (
                'id' => 15,
                'lang_group' => 'backend',
                'lang_key' => 'Page',
                'text' => '{"en":"Page","bg":"Страница"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            14 => 
            array (
                'id' => 16,
                'lang_group' => 'backend',
                'lang_key' => 'toggleNav',
                'text' => '{"en":"toggleNav","bg":"Навигация"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            15 => 
            array (
                'id' => 17,
                'lang_group' => 'backend',
                'lang_key' => 'app',
                'text' => '{"en":"app","bg":"Приложение"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            16 => 
            array (
                'id' => 18,
                'lang_group' => 'backend',
                'lang_key' => 'Pages',
                'text' => '{"en":"Pages","bg":"Страници"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            17 => 
            array (
                'id' => 19,
                'lang_group' => 'backend',
                'lang_key' => 'Pages Administration',
                'text' => '{"en":"Pages Administration","bg":"Списък със страници"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            18 => 
            array (
                'id' => 20,
                'lang_group' => 'backend',
                'lang_key' => 'Add New Page',
                'text' => '{"en":"Add New Page","bg":"Добави нова страница"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            19 => 
            array (
                'id' => 21,
                'lang_group' => 'backend',
                'lang_key' => 'Users',
                'text' => '{"en":"Users","bg":"Потребители"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            20 => 
            array (
                'id' => 22,
                'lang_group' => 'backend',
                'lang_key' => 'adminUserList',
                'text' => '{"en":"adminUserList","bg":"Списък с потребители"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            21 => 
            array (
                'id' => 23,
                'lang_group' => 'backend',
                'lang_key' => 'adminNewUser',
                'text' => '{"en":"adminNewUser","bg":"Добави нов потребител"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            22 => 
            array (
                'id' => 24,
                'lang_group' => 'backend',
                'lang_key' => 'Lang',
                'text' => '{"en":"Lang","bg":"Език"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            23 => 
            array (
                'id' => 25,
                'lang_group' => 'backend',
                'lang_key' => 'Translations Administration',
                'text' => '{"en":"Translations Administration","bg":"Преводи"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            24 => 
            array (
                'id' => 26,
                'lang_group' => 'backend',
                'lang_key' => 'Languages Administration',
                'text' => '{"en":"Languages Administration","bg":"Езици"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            25 => 
            array (
                'id' => 27,
                'lang_group' => 'backend',
                'lang_key' => 'Other',
                'text' => '{"en":"Other","bg":"Други"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            26 => 
            array (
                'id' => 28,
                'lang_group' => 'backend',
                'lang_key' => 'adminThemesList',
                'text' => '{"en":"adminThemesList","bg":"Теми"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            27 => 
            array (
                'id' => 29,
                'lang_group' => 'backend',
                'lang_key' => 'adminLogs',
                'text' => '{"en":"adminLogs","bg":"Логове"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            28 => 
            array (
                'id' => 30,
                'lang_group' => 'backend',
                'lang_key' => 'adminPHP',
                'text' => '{"en":"adminPHP","bg":"PHP Info"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            29 => 
            array (
                'id' => 31,
                'lang_group' => 'backend',
                'lang_key' => 'profile',
                'text' => '{"en":"profile","bg":"Профил"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            30 => 
            array (
                'id' => 32,
                'lang_group' => 'backend',
                'lang_key' => 'logout',
                'text' => '{"en":"logout","bg":"Излез"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            31 => 
            array (
                'id' => 33,
                'lang_group' => 'frontend',
                'lang_key' => 'en',
                'text' => '{"en":"en","bg":"En"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            32 => 
            array (
                'id' => 34,
                'lang_group' => 'frontend',
                'lang_key' => 'bg',
                'text' => '{"en":"bg","bg":"Bg"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            33 => 
            array (
                'id' => 35,
                'lang_group' => 'backend',
                'lang_key' => 'Welcome',
                'text' => '{"en":"Welcome","bg":"Добре дошли"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            34 => 
            array (
                'id' => 36,
                'lang_group' => 'backend',
                'lang_key' => 'Admin Access',
                'text' => '{"en":"Admin Access","bg":"Админ достъп"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            35 => 
            array (
                'id' => 37,
                'lang_group' => 'backend',
                'lang_key' => 'You have',
                'text' => '{"en":"You have","bg":"Имате"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            36 => 
            array (
                'id' => 38,
                'lang_group' => 'backend',
                'lang_key' => 'You have access to',
                'text' => '{"en":"You have access to","bg":"Имате достъп до"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            37 => 
            array (
                'id' => 39,
                'lang_group' => 'backend',
                'lang_key' => 'Add new',
                'text' => '{"en":"Add new","bg":"Добави нов"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            38 => 
            array (
                'id' => 40,
                'lang_group' => 'backend',
                'lang_key' => 'Search',
                'text' => '{"en":"Search","bg":"Търси"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            39 => 
            array (
                'id' => 41,
                'lang_group' => 'backend',
                'lang_key' => 'Title',
                'text' => '{"en":"Title","bg":"Заглавие"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            40 => 
            array (
                'id' => 42,
                'lang_group' => 'backend',
                'lang_key' => 'Status',
                'text' => '{"en":"Status","bg":"Статус"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            41 => 
            array (
                'id' => 43,
                'lang_group' => 'backend',
                'lang_key' => 'Actions',
                'text' => '{"en":"Actions","bg":"Действия"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            42 => 
            array (
                'id' => 44,
                'lang_group' => 'backend',
                'lang_key' => 'Active',
                'text' => '{"en":"Active","bg":"Активен"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            43 => 
            array (
                'id' => 45,
                'lang_group' => 'backend',
                'lang_key' => 'Edit',
                'text' => '{"en":"Edit","bg":"Редактирай"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            44 => 
            array (
                'id' => 46,
                'lang_group' => 'backend',
                'lang_key' => 'Delete',
                'text' => '{"en":"Delete","bg":"Изтрий"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            45 => 
            array (
                'id' => 47,
                'lang_group' => 'backend',
                'lang_key' => 'No results found',
                'text' => '{"en":"No results found","bg":"Няма намерени резултати"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            46 => 
            array (
                'id' => 48,
                'lang_group' => 'backend',
                'lang_key' => 'Are you sure you want to delete this item and all the other related fields?',
                'text' => '{"en":"Are you sure you want to delete this item and all the other related fields?","bg":"Сигурни ли сте, че желате да изтриете този елемент и всички свързани към него"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            47 => 
            array (
                'id' => 49,
                'lang_group' => 'backend',
                'lang_key' => 'No',
                'text' => '{"en":"No","bg":"Не"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            48 => 
            array (
                'id' => 50,
                'lang_group' => 'backend',
                'lang_key' => 'Yes',
                'text' => '{"en":"Yes","bg":"Да"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            49 => 
            array (
                'id' => 52,
                'lang_group' => 'backend',
                'lang_key' => 'Login',
                'text' => '{"en":"Login","bg":"Вход"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            50 => 
            array (
                'id' => 53,
                'lang_group' => 'backend',
                'lang_key' => 'E-Mail Address',
                'text' => '{"en":"E-Mail Address","bg":"Имейл адрес"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            51 => 
            array (
                'id' => 54,
                'lang_group' => 'backend',
                'lang_key' => 'Password',
                'text' => '{"en":"Password","bg":"Парола"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            52 => 
            array (
                'id' => 55,
                'lang_group' => 'backend',
                'lang_key' => 'Remember Me',
                'text' => '{"en":"Remember Me","bg":"Запомни ме"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            53 => 
            array (
                'id' => 56,
                'lang_group' => 'backend',
                'lang_key' => 'Add new item',
                'text' => '{"en":"Add new item","bg":"Добави нов елемент"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            54 => 
            array (
                'id' => 57,
                'lang_group' => 'backend',
                'lang_key' => 'Save',
                'text' => '{"en":"Save","bg":"Запази"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            55 => 
            array (
                'id' => 58,
                'lang_group' => 'backend',
                'lang_key' => 'Back',
                'text' => '{"en":"Back","bg":"Назад"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            56 => 
            array (
                'id' => 59,
                'lang_group' => 'backend',
                'lang_key' => 'Slug',
                'text' => '{"en":"Slug","bg":"Слуг"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            57 => 
            array (
                'id' => 60,
                'lang_group' => 'backend',
                'lang_key' => 'Description',
                'text' => '{"en":"Description","bg":"Описание"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            58 => 
            array (
                'id' => 61,
                'lang_group' => 'backend',
                'lang_key' => 'Cancel',
                'text' => '{"en":"Cancel","bg":"Откажи"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            59 => 
            array (
                'id' => 62,
                'lang_group' => 'backend',
                'lang_key' => 'This field is required.',
                'text' => '{"en":"This field is required.","bg":"Това поле е задължително"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            60 => 
            array (
                'id' => 63,
                'lang_group' => 'validation',
                'lang_key' => 'attributes',
                'text' => '{"en":"attributes","bg":"Атрибути"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            61 => 
            array (
                'id' => 64,
                'lang_group' => 'backend',
                'lang_key' => 'Success!',
                'text' => '{"en":"Success!","bg":"Процедурата е изпълнена успешно"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            62 => 
            array (
                'id' => 65,
                'lang_group' => 'backend',
                'lang_key' => 'Editing page with id',
                'text' => '{"en":"Editing page with id","bg":"Редактиране на страница с id"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            63 => 
            array (
                'id' => 66,
                'lang_group' => 'backend',
                'lang_key' => 'Gallery',
                'text' => '{"en":"Gallery","bg":"Галерия"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            64 => 
            array (
                'id' => 67,
                'lang_group' => 'backend',
                'lang_key' => 'Pictures are uploaded successfully',
                'text' => '{"en":"Pictures are uploaded successfully","bg":"Снимките са качени успешно"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            65 => 
            array (
                'id' => 68,
                'lang_group' => 'backend',
                'lang_key' => 'Error! Please try again',
                'text' => '{"en":"Error! Please try again","bg":"Грешка! Моля опитайте отново"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            66 => 
            array (
                'id' => 69,
                'lang_group' => 'backend',
                'lang_key' => 'Upload',
                'text' => '{"en":"Upload","bg":"Качи"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            67 => 
            array (
                'id' => 70,
                'lang_group' => 'backend',
                'lang_key' => 'Uploading...',
                'text' => '{"en":"Uploading...","bg":"Качване..."}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            68 => 
            array (
                'id' => 71,
                'lang_group' => 'backend',
                'lang_key' => 'Add New Image',
                'text' => '{"en":"Add New Image","bg":"Добави нова снимка"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            69 => 
            array (
                'id' => 72,
                'lang_group' => 'backend',
                'lang_key' => 'Main Image',
                'text' => '{"en":"Main Image","bg":"Основна снимка"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            70 => 
            array (
                'id' => 73,
                'lang_group' => 'backend',
                'lang_key' => 'Промени/добави свързан линк',
                'text' => '{"en":"Промени\\/добави свързан линк","bg":"Промени\\/добави свързан линк"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            71 => 
            array (
                'id' => 74,
                'lang_group' => 'backend',
                'lang_key' => 'delete image',
                'text' => '{"en":"delete image","bg":"изтрий снимка"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            72 => 
            array (
                'id' => 75,
                'lang_group' => 'backend',
                'lang_key' => 'добави линк',
                'text' => '{"en":"добави линк","bg":"добави линк"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            73 => 
            array (
                'id' => 76,
                'lang_group' => 'backend',
                'lang_key' => 'Моля въведете линк.',
                'text' => '{"en":"Моля въведете линк.","bg":"Моля въведете линк"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            74 => 
            array (
                'id' => 77,
                'lang_group' => 'backend',
                'lang_key' => 'Languages',
                'text' => '{"en":"Languages","bg":"Езици"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            75 => 
            array (
                'id' => 78,
                'lang_group' => 'backend',
                'lang_key' => 'Showing All Languages',
                'text' => '{"en":"Showing All Languages","bg":"Показване на всички езици"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            76 => 
            array (
                'id' => 79,
                'lang_group' => 'backend',
                'lang_key' => 'Abbreviation',
                'text' => '{"en":"Abbreviation","bg":"Абревиатура"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            77 => 
            array (
                'id' => 80,
                'lang_group' => 'backend',
                'lang_key' => 'Language',
                'text' => '{"en":"Language","bg":"Език"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            78 => 
            array (
                'id' => 81,
                'lang_group' => 'backend',
                'lang_key' => 'Actions and Status',
                'text' => '{"en":"Actions and Status","bg":"Действия и статус"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            79 => 
            array (
                'id' => 82,
                'lang_group' => 'backend',
                'lang_key' => 'Disabled',
                'text' => '{"en":"Disabled","bg":"Изключен"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            80 => 
            array (
                'id' => 83,
                'lang_group' => 'backend',
                'lang_key' => 'Default',
                'text' => '{"en":"Default","bg":"Основен"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            81 => 
            array (
                'id' => 84,
                'lang_group' => 'backend',
                'lang_key' => 'Add New Language:',
                'text' => '{"en":"Add New Language:","bg":"Добави нов език"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            82 => 
            array (
                'id' => 85,
                'lang_group' => 'backend',
                'lang_key' => 'All Languages',
                'text' => '{"en":"All Languages","bg":"Всички езици"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            83 => 
            array (
                'id' => 86,
                'lang_group' => 'backend',
                'lang_key' => 'Add',
                'text' => '{"en":"Add","bg":"Добави"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            84 => 
            array (
                'id' => 87,
                'lang_group' => 'backend',
                'lang_key' => 'Removed!',
                'text' => '{"bg":"Removed!","en":"Изтрито!"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            85 => 
            array (
                'id' => 88,
                'lang_group' => 'backend',
                'lang_key' => 'Updated!',
                'text' => '{"bg":"Updated!","en":"Обновено!"}',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}