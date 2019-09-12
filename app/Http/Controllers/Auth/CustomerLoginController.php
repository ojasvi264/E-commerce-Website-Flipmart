<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Configuration;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class CustomerLoginController  extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        $data = [];
        $data['configurations'] = Configuration::first();
        $data['categories'] = Category::where('status',1)->orderby('rank')->get();

        return view('frontend.customer.login',compact('data'));
    }
    public function loginCustomer(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        // Attempt to log the user in

        if (\Illuminate\Support\Facades\Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('customer.dashboard'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    function logout(Request $request){
        {
// dd(Auth::guard('customer')->user()->name);
            \Illuminate\Support\Facades\Auth::guard('customer')->logout();
            $activeGuards = 0;
            foreach (config('auth.guards') as $guard => $guardConfig) {
                if ($guardConfig['driver'] === 'session') {
                    $guardName = \Illuminate\Support\Facades\Auth::guard($guard)->getName();
                    if ($request->session()->has($guardName) && $request->session()->get($guardName) === \Illuminate\Support\Facades\Auth::guard($guard)->user()->getAuthIdentifier()) {
                        $activeGuards++;
                    }
                }
            }
            if ($activeGuards === 0) {
                $request->session()->flush();
                $request->session()->regenerate();
            }
            return redirect('/customer/login');
        }
    }

    protected function guard()
    {
        return \Illuminate\Support\Facades\Auth::guard('customer');
    }
}