<?php

namespace Database\Seeders;

use App\Models\Policy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Policy::create([
            'type' => 'about',
            'title' => 'About Us',
            'content' => 'FashionEasy has been providing quality clothing to fashion-conscious people in Bangladesh since 2026. We aim to make clothing from both local and international brands easily accessible online for men, women, and children. Customer satisfaction is our top priority.'
        ]);

        Policy::create([
            'type' => 'refund',
            'title' => 'Refund Policy',
            'content' => 'You may request a refund or replacement for any defective or incorrect product within 3 days of receipt. The product must be returned unused and in its original packaging. The refund process may take 7–10 working days to complete. Refunds are not applicable for used products or items with removed tags.'
        ]);

        Policy::create([
            'type' => 'terms',
            'title' => 'Terms and Conditions',
            'content' => 'By using this website, you agree to our terms and conditions. All product prices are subject to change without prior notice. The company reserves the right to cancel an order after confirmation under special circumstances (such as out-of-stock items, incorrect price display, etc.).'
        ]);

        Policy::create([
            'type' => 'hoy_to_buy',
            'title' => 'How to buy',
            'content' => '1. Select your desired product and click the "Add to Cart" button. 2. Go to the cart page and click "Checkout". 3. Enter a delivery address or select a saved address. 4. Choose a payment method (Cash on Delivery or online payment). 5. Confirm your order — you will receive a confirmation email/SMS.',
        ]);

        Policy::create([
            'type' => 'contact',
            'title' => 'Contact Us',
            'content' => 'For any questions or assistance, please contact us — Email: support@fashioneasy.com.bd, Phone: 01700-000000 (10 AM – 8 PM), or message us on WhatsApp. We aim to respond within 24 hours.',        
        ]);

        Policy::create([
            'type' => 'complain',
            'title' => 'File a complaint',
            'content' => 'If you have any complaints regarding products or services, please email our support team and include your order number. Each complaint is treated seriously, and we aim to resolve it within 48 hours.',        
        ]);
    }
}
