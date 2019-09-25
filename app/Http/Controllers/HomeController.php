<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Alert;
use App\Contact;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth')->except('contact');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


      return redirect('/');
    }

    public function change_password()
    {
     return view('admin.change_password');
   }

   public function users()
   {
     return view('admin.users');
   }

   public function profile(Request $request){
     
    $data = $this->getCallingCode($request);
    return view('profile', compact('data'));
  }

  // public function update_profile (Request $request){
  //   $data = $this->getCallingCode($request);
  //   return view('profile', compact('data'));
  // }

  public function getCountryName($request)
  {   
    $country = '';
    $user_ip = '';

    if (getenv('APP_ENV') == 'local') {
      $country = 'Nigeria';
    } else {

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
      
      try{
          $ress= $client->get('https://restcountries.eu/rest/v2/name/'.$country.'?fullText=true');
          $content = json_decode($ress->getBody()->getContents());
     

      if (! is_null($content)) {

        $flag = $content[0]->flag;
        $data['flag'] = $flag;
        $code = $content[0]->callingCodes[0];
        $data['callingCode'] = $code;
      }

    

    return $data;
  }catch(\Exception $e){
    report($e);
  }

  }
}

  public function updateProfile(Request $req)
  {
        
          $this->validate($req, [

            'first_name' => 'required',
            'last_name' => 'required',
            'phone'   => 'required',
            'photo' => 'nullable|mimetypes:image/jpeg,image/png,image/jpg',
            
        ]);
            // dd($req->all());
            $filename = '';
         if ($req->hasFile('photo')){
          
            $destination = public_path().'/profile/';

            $file = $req->file('photo');
            $filename = $this->imageName($req);

            try {
                  $file->move($destination,$filename );
                                                                                                
            }
            catch (\Exception $e){

                throw $e->getMessage();
            }
          }
          $user = auth()->user();
         $_user =  $user->update([

            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'phone'   => $req->phone,
            'picture_url' =>  $req->hasFile('photo') ? asset('profile/'.$filename) : $user->picture_url,

         ]);

         if ($_user) {

          Alert::success('Profile updated!')->autoclose(2000);
          return redirect()->back();
         }
         else {
           Alert::error('An error occurred')->autoclose(2000);
           return redirect()->back();
         }

  }

  public function imageName($req)
  {
      $file = $req->file('photo');

      return str_slug(strtolower(auth()->user()->name)).'_'.time().'.'.$file->clientExtension();
      
  }

  public function contact(Request $req)
  {
      $this->validate($req,[
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required'
      ]);

      $contact = Contact::create($req->except('_token'));

      if ($contact)
      {
        Alert::success('Thanks for reaching out, we\'d get back to you if need be')->autoclose(3000);
        return back();
      }
      else {
        Alert::error('Unknown error occurred')->autoclose(5000);
        return back();
      }
  }

  public function addAddress(Request $req)
  {
     $this->validate($req, [
       'wallet' => 'required',
     ]);
     $user = User::findOrFail(auth()->id());
     $user->wallet = $req->wallet;
     $user->save();
     return redirect()->back()->with('message', 'wallet added');
  }
  


}
