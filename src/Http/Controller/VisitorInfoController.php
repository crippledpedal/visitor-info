<?php

namespace Mezbilisim\VisitorInfo\Http\Controller;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitorInfoController extends Controller
{
    private $inputs = ['access-key', 'start-date', 'end-date', 'visitorType', 'format'];

    public function index()
    {
        return view('visitor-info::visitors');
    }

    public function download(Request $request)
    {
        if ($this->checkAcceessKey($request->input('access-key'))) {
            if ($this->checkInputsValidate($request->all())) {
                $visitors = '';
                dd('in if');
            }
        }
        return back();
    }

    private function checkAcceessKey($key) {
        if ($key == 'deneme') {
            return true;
        }
        return false;
    }

    private function checkInputsValidate($inputs) {
        foreach ($this->inputs as $input) {
            if (isset($inputs[$input]) && !empty($inputs[$input])) {
                if ($input == 'start-date' && isset($inputs['end-date']) && !empty($inputs['end-date']) && Carbon::parse($inputs['start-date']) > Carbon::parse($inputs['end-date'])) {
                    return false;
                }

                if ($input == 'visitorType' && !in_array($inputs['visitorType'], ['all', 'onlyCopied'])) {
                    return false;
                }

                if ($input == 'format' && !in_array($inputs['format'], ['xlsx', 'csv', 'pdf'])) {
                    return false;
                }
            } else {
                return false;
            }
        }
        return true;
    }
}
