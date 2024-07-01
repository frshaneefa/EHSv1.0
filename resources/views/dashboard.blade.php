<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('ABOUT') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Styled greeting message with custom CSS animation -->
                    <div style="font-family: 'Arial', sans-serif; font-size: 1.1rem; line-height: 1.6; text-align: center;">
                        <div class="fade-in-from-below">
                            <p class="line1" style="opacity: 0; margin-bottom: 20px;">Welcome to <strong>Enetech Helpdesk Support Version 1.0 (EHSv1.0)</strong></p>
                            <p class="line2" style="opacity: 0; margin-bottom: 20px;">We're delighted to welcome you to our ticketing system. Whether you're here to report an issue, request assistance, or simply seek information, we're here to ensure your experience is smooth and productive.</p>
                            <p class="line3" style="opacity: 0; margin-bottom: 20px;">Should you have any questions or require assistance, please don't hesitate to contact our support team. We're dedicated to providing you with prompt and efficient assistance.</p>
                            <p class="line4" style="opacity: 0;">Thank you for choosing Enetech Helpdesk Support. Let's streamline your support experience together!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    @keyframes fade-in-from-below {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in-from-below .line1 {
        animation: fade-in-from-below 1s ease-out forwards 0.2s;
    }

    .fade-in-from-below .line2 {
        animation: fade-in-from-below 1s ease-out forwards 0.4s;
    }

    .fade-in-from-below .line3 {
        animation: fade-in-from-below 1s ease-out forwards 0.6s;
    }

    .fade-in-from-below .line4 {
        animation: fade-in-from-below 1s ease-out forwards 0.8s;
    }
</style>
