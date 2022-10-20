<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\receipt;
use App\Models\video;
use Carbon\Carbon;




class IsSubscribedMiddleware
{
    /**use Illuminate\Support\Str;

     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Str::endsWith($request->url(), 'play')) {
            $course_id = video::all()->where('id', '=', $request->id)->value('course_id');
            $exp_date = receipt::all()->where('course_id', '=', $course_id)
                ->where('user_id', '=', Auth::user()->id)->value('expire_date');
        } else {
            $exp_date = receipt::all()->where('course_id', '=', $request->id)
                ->where('user_id', '=', Auth::user()->id)->value('expire_date');
        }
        if ($exp_date != null) {
            $date_now = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString('Y-m-d'));
            $carbon_exp_date = Carbon::createFromFormat('Y-m-d', $exp_date);
            //dd($carbon_exp_date->gte($date_now));
            if ($carbon_exp_date->gte($date_now)) {
                return $next($request);
            } else {
                abort(403, 'Please Subscribe first');
            }
        }
        abort(403, 'Please Subscribe first');
    }
}
