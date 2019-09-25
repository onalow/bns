<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use App\Mail\EmailVerification as Verification;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm( Request $request)
    {   
        $data = $this->getCallingCode($request);
        
        return view('auth.register', compact('data'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create($request)
    {  
        $data = $request->all();
        $country = $this->getCountryName($request);
        
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'token' => str_random(60),
            'country' => $country ? : isset($data['country'])? : null,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        // dd($request->all());

        $this->validator($request->all())->validate();
        $user = $this->create($request);
        if (!$user) {

            return redirect(route('register'))->with('failure', 'This user already exists. Use another email to create a new account');


        } else {

            $check = Mail::to($user->email)->send(new Verification($user));
            if (is_null($check)) {

                // return redirect(route('login'))->with('status', 'Registration successful, visit your email to verify your account');
                return view('after-sign-up', compact('user'));

            } else {

                return back()->withInput()->with('failure', 'Could not send email. Kindly check your network and try again.');

            }
           

        }
       
       
    }

    public function verify($token)
    {
        $user = User::where('token', $token)->first();

        if ($user)  {
            $user->verified =1;
        }
        else return redirect('/');
        if ($user->save()) {

            auth()->login($user);
            return redirect('/');
        } 
    }

    public function getCountryName($request)
    {   
        $country = '';
        $user_ip = '';
        
        if (getenv('APP_ENV') == 'local') {
            $country = 'Nigeria';
        } else {

            try {   
                if (!isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                        $user_ip = $request->ip();

                    } else {
                        $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    }

                    $client = new Client();
                    $res = $client->get('http://geoip.nekudo.com/api/' . $user_ip);

                    $content = json_decode($res->getBody()->getContents());
                    if (!is_null($content)) {

                        $country = $content->country->name;
                    }
                }
                catch( \Exception $e) {
                    report($e);
                }
            }

        return $country;
    }
    
    public function getCallingCode($request)
    {
         
        $data['callingCode'] ='';
        $data['flag'] = '';  
        $country = '';
        $user_ip = '';
        $client = new Client();
        
            $country = $this->getCountryName($request);
                if ($country) {

                    try {
                            $ress= $client->get('https://restcountries.eu/rest/v2/name/'.$country.'?fullText=true');
                            $content = json_decode($ress->getBody()->getContents());

                            if (! is_null($content)) {

                                $flag = $content[0]->flag;
                                $data['flag'] = $flag;
                                $code = $content[0]->callingCodes[0];
                                $data['callingCode'] = $code;
                            }
                    } catch (\Exception $e) {
                        report($e);
                    }
                    
                }
            
            return $data;

    }
}


