<?php

namespace Laravel\Fortify\Http\Responses;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use Laravel\Fortify\Fortify;

class RegisterResponse implements RegisterResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     */
    public function toResponse(Request $request): Response
    {
        if ($request->has('errors')) {
            return back()->withErrors($request->input('errors'));
        }

        return $request->wantsJson()
                    ? new JsonResponse('', 201)
                    : redirect()->intended(Fortify::redirects('register'));
    }
}
