<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->truncate();

        DB::table('configs')->insert([
            'config_key' => 'app_configs',
            'config_value' => 'yes'
        ]);
        DB::table('configs')->insert([
            'config_key' => 'currency',
            'config_value' => 'BDT'
        ]);
        DB::table('configs')->insert([
            'config_key' => 'timezone',
            'config_value' => 'Asia/Dhaka'
        ]);
        DB::table('configs')->insert([
            'config_key' => 'paypal_mode',
            'config_value' => 'sandbox'
        ]);
        DB::table('configs')->insert([
            'config_key' => 'paypal_client_key',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'paypal_secret',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'razorpay_client_key',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'razorpay_secret',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'validity',
            'config_value' => 'monthly'
        ]);
        DB::table('configs')->insert([
            'config_key' => 'stripe_publishable_key',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'stripe_secret',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'app_theme',
            'config_value' => 'green'
        ]);
        DB::table('configs')->insert([
            'config_key' => 'banner_image',
            'config_value' => '/images/web/background/haque-it-solution.svg'
        ]);
        DB::table('configs')->insert([
            'config_key' => 'payment_gateway',
            'config_value' => 1
        ]);
        DB::table('configs')->insert([
            'config_key' => 'tax_type',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'invoice_prefix',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'invoice_name',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'invoice_email',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'invoice_phone',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'invoice_address',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'invoice_city',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'invoice_state',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'invoice_zipcode',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'invoice_country',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'tax_name',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'tax_value',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'tax_number',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'email_heading',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'email_footer',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'invoice_footer',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'share_content',
            'config_value' => 'Hey there,
Scan this QR ##QRLINK##
Made with ##APPNAME## by Your Company Name'
        ]);
        DB::table('configs')->insert([
            'config_key' => 'bank_transfer',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'purchase_code',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'app_version',
            'config_value' => '3.1.0'
        ]);
        DB::table('configs')->insert([
            'config_key' => 'paystack_public_key',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'paystack_secret',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'check_type',
            'config_value' => 1
        ]);
        DB::table('configs')->insert([
            'config_key' => 'merchant_email',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'mollie_key',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'show_website',
            'config_value' => 'yes'
        ]);
        DB::table('configs')->insert([
            'config_key' => 'merchantId',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'saltKey',
            'config_value' => null
        ]);
        DB::table('configs')->insert([
            'config_key' => 'default_language',
            'config_value' => 'bn'
        ]);
    }
}
