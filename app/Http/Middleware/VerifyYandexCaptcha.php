<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class VerifyYandexCaptcha
{
    public function handle(Request $request, Closure $next)
    {
        $secretKey = config('services.yandex_captcha.secret');

        if (empty($secretKey) || app()->environment('local')) {
            return $next($request);
        }
        if (!$request->has('smart-token')) {
            return back()->withErrors(['captcha' => 'Капча не пройдена.'])->withInput();
        }

        $captchaResponse = $request->input('smart-token');

        try {
            $client = new Client();
            $response = $client->post('https://captcha-api.yandex.ru/validate', [
                'form_params' => [
                    'secret' => $secretKey,
                    'token' => $captchaResponse,
                    'ip' => $request->ip(),
                ],
            ]);

            $result = json_decode($response->getBody(), true);

            if ($result['status'] !== 'ok') {
                return back()->withErrors(['captcha' => 'Проверка капчи не пройдена.'])->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors(['captcha' => 'Ошибка при проверке капчи.'])->withInput();
        }

        return $next($request);
    }
}
