<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\RedirectResponse;

class BaseController extends Controller
{
    protected function redirect($redirectTo, $response): RedirectResponse
    {
        if (!isset($response['status']) && !isset($response['message'])) {
            throw new Exception('Redirect must have status and message');
        }

        return redirect($redirectTo)->with($response['status'], $response['message']);
    }

    protected function redirectBack($response, $withInput = false): RedirectResponse
    {
        if (!isset($response['status']) && !isset($response['message'])) {
            throw new Exception('Redirect must have status and message');
        }

        if ($withInput) {
            return redirect()->back()->withInput()->with($response['status'], $response['message']);
        }
        return redirect()->back()->with($response['status'], $response['message']);
    }
}
