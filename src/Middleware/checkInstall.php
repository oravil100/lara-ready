<?php

namespace Oravil\LaraReady\Middleware;

use Closure;

class checkInstall
{
	 /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * @param Redirector $redirect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
		 if($this->alreadyInstalled()) {
			return $next($request);
		 }
		  return redirect('install');
	}
	
	/**
     * If application is already installed.
     *
     * @return bool
     */
    public function alreadyInstalled()
    {
        return file_exists(storage_path('installed'));
    }
}