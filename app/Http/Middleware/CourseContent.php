<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseContent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data=DB::table('course_registrations')->where('user_id','=',Auth::user()->id)->get('course_id');
        foreach($data as $d){
            // dd($request->route('id'));
            if($d->course_id !=$request->route('id')){
                // return redirect()->back();
             return abort(403);
            }
            else{
                return $next($request);
            }

        }
    }
}
