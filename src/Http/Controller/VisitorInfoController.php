<?php

namespace Mezbilisim\VisitorInfo\Http\Controller;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Mezbilisim\VisitorInfo\Exports\VisitorsExport;
use Mezbilisim\VisitorInfo\Models\Visitor;

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
                $visitors = Visitor::whereBetween('created_at', [Carbon::make($request->input('start-date'))->startOfDay(), Carbon::make($request->input('end-date'))->endOfDay()])
                    ->select('ip', 'country', 'city', 'url', 'referer', 'created_at')
                    ->get();

                if ($request->input('visitorType') == 'onlyCopied') {
                    #$visitors = $this->selectOnlyCopiedVisitors($visitors);
                }

                return Excel::download(new VisitorsExport($visitors), ('visitors-' . Str::slug(env('APP_URL')). '.' . $request->input('format')));
            }
        }
        return back();
    }

    private function checkAcceessKey($key) {
        if ($key == config('visitor.access-key')) {
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

                if ($input == 'visitorType' && !in_array($inputs['visitorType'], ['all'])) {
                    return false;
                }

                if ($input == 'format' && !in_array($inputs['format'], ['xlsx', 'csv'])) {
                    return false;
                }
            } else {
                return false;
            }
        }
        return true;
    }

    private function selectOnlyCopiedVisitors($visitors) {
        $unique = $visitors->unique('ip');
        $copied = $visitors->diff($unique);
        $grouped = $copied->groupBy('ip');
        return $grouped;
    }
}
