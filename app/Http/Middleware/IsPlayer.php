<?php

namespace App\Http\Middleware;

use App\Models\Player;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsPlayer
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
//        verifie l'utilisateur a un compte joueur
        $player = Player::where("user_id",auth()->user()->id)->exists();
        if($player){
            return $next($request);
        }else{
            return Response()->redirectTo("player/create");
        }
    }
}
