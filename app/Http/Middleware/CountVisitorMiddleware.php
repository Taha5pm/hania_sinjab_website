<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;

class CountVisitorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $visitors = Visitor::all()->where('ip_address', $ip);


        $today = false;
        $visi_id = null;
        foreach ($visitors as $visitor) {
            if ($visitor->created_at->format('d-m-y') == today()->format('d-m-y')) {
                $today = true;
                $visi_id = $visitor->id;
                break;
            }
        }
        if (!$today) {
            if (!auth()->check()) {
                Visitor::create([
                    'ip_address' => $ip,
                ]);
            } else {
                Visitor::create([
                    'ip_address' => $ip,
                    'subscriber_id' => auth()->user()->id,
                ]);
            }
        } else {
            if (
                auth()->check() &&
                Visitor::all()->where('id', '=', $visi_id)->value('subscriber_id') == null
            ) {
                Visitor::where('id', '=', $visi_id)->update(['subscriber_id' => auth()->user()->id]);
            }
        }

        // if (Visitor::where('created_at', '=', today())->where('ip_address', '=', $ip)->count() == 0) {
        //     Visitor::create([
        //         'ip_address' => $ip,
        //     ]);
        // }

        // if (
        //     auth()->check() && Visitor::all()->where('date', '=', today())
        //     ->where('ip_address', '=', $ip)->value('subscriber_id') == null
        // ) {
        //     Visitor::where('date', '=', today())->where('ip_address', '=', $ip)->update([
        //         'subscriber_id' => auth()->user()->id
        //     ]);
        // }

        return $next($request);
    }
}
