<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LocaleRequest;

class LocaleController extends Controller
{

    private $locales;

    public function __construct()
    {
        $this->locales = array('en', 'pt-BR');
    }

    public function setlocale(LocaleRequest $request)
    {
        $locale = $request->input('locale');

        // if (!in_array($locale, $this->locales)) {
        //     return redirect()->back();
        // }

        if (auth()->check()) {
            $user = User::find(auth()->id());
            $user->locale = $locale;
            $user->save();
        }

        app()->setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
