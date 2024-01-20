<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialiteController extends Controller
{
   public function RedirectToGoogle() {
        
        return Socialite::driver('google')->redirect();

   }
   public function RedirectToFacebook() {
        
        return Socialite::driver('facebook')->redirect();

   }
//    public function handleGoogleCallback()
//    {
//        try {
//            $user = Socialite::driver('google')->user();
//            // Your authentication logic
//        } catch (\Exception $e) {
//            // Log the exception for debugging
//            \Log::error($e->getMessage());
//            // Handle the error as needed
//        }
//    }
   
   public function handleGoogleCallback()
   {
       try {
           $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id',$user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                // return redirect()->route('home');
                return response()->json($finduser);
            }else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email'=>$user->email,
                    'roles'=>'user',
                    'status'=>1,
                    'password'=>Hash::make('my-google'),
                    'social_id'=>$user->id,
                    'social_type'=> 'google',
                ]);
                Auth::login($newUser);
                // return redirect()->route('home');
                return response()->json($newUser);

            }
       } catch (Exception $e) {
        //    return redirect('/login')->withErrors('Google authentication failed.');
        dd($e->getmessage());
       }
   }

   public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id',$user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->route('home');
            }else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email'=>$user->email,
                    'roles'=>'user',
                    'status'=>1,
                    'password'=>Hash::make('my-google'),
                    'social_id'=>$user->id,
                    'social_type'=> 'facebook',
                ]);
                Auth::login($newUser);
                return redirect()->route('home');

            }
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('Facebook authentication failed.');
        }
    }
}
