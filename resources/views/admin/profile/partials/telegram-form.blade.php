<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Connect you Telegram') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('If you want have get notice? please connect you Telegram') }}
        </p>
    </header>
    <div>
        <script async src="https://telegram.org/js/telegram-widget.js?22"
                data-telegram-login="{{env('TELEGRAM_BOT_NAME', '')}}"
                data-size="large"
                data-auth-url="{{route('callbacks.telegram')}}"
                data-request-access="write"
        ></script>
    </div>
</section>
