<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Orders;
use App\Models\CustomerInquiry;
use App\Models\User;
use App\Models\FAQ;

use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{


    // --------------------------- 1. Home Page ---------------------------------------
    public function index()
    {
        $breakfastCount = Menu::where('item_category', '=', 'Breakfast')->count();
        $lunchCount = Menu::where('item_category', '=', 'Lunch')->count();
        $dinnerCount = Menu::where('item_category', '=', 'Dinner')->count();
        $weddingCount = Menu::where('item_category', '=', 'Wedding')->count();
        $birthdayPartyCount = Menu::where('item_category', '=', 'Birthday Party')->count();
        $corporateCount = Menu::where('item_category', '=', 'Corporate Events')->count();
        $familyGetTogetherCount = Menu::where('item_category', '=', 'Family Get Together')->count();
        $holidayPartiesCount = Menu::where('item_category', '=', 'Holiday Parties')->count();
        return view('welcome', compact
        (
            'breakfastCount',
            'lunchCount',
            'dinnerCount',
            'weddingCount',
            'birthdayPartyCount',
            'corporateCount',
            'familyGetTogetherCount',
            'holidayPartiesCount'
        ));
    }


    // --------------------------- 2. Browse Menu ---------------------------------------
    public function viewMenu()
    {
        return view("menu");
    }




    // --------------------------- 3. Order Place ---------------------------------------
    public function viewOrderFood()
    // Show 'orderFood' view to the user only if user already logged in
    {
        if (Auth::check()) {
            return view('orderFood');
        } else {
            return view('LogIn');
        }
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'username' => 'required',
            // 'useremail' => 'required|email',
            'event' => 'required|in:Breakfast,Lunch,Dinner,Wedding,"Birthday Party","Corporate Events","Family Get Together","Holiday Parties"',
            'order_date' => 'required',
            'totalPeople' => 'required|in:500,"500-1000","1000-2000"',
            'message' => 'required'
        ]);

        $order = new Orders();
        $order->customer_name = $request['username'];
        $order->customer_email = Auth::user()->email;
        $order->event_category = $request['event'];
        $order->order_received_date = $request['order_date'];
        $order->total_guest = $request['totalPeople'];
        $order->message = $request['message'];
        $res = $order->save();

        if ($res) {
            return redirect()->route('orderHistory');
        }
    }


    // --------------------------- 4. Customer Support ---------------------------------------
    public function viewCustomerSupport()
    {
        return view("customerSupport");
    }

    public function storeCustomerInquiry(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'user_email' => 'required',
            'user_message' => 'required',
        ]);

        $customerInquiry = new CustomerInquiry();
        $customerInquiry->customer_name = $request['user_name'];
        $customerInquiry->customer_email = $request['user_email'];
        $customerInquiry->customer_message = $request['user_message'];
        $result = $customerInquiry->save();

        if ($result) {
            $message = "Form Submitted Successfully";
            $style = "text-success";
            return view('customerSupport')->with(compact('message', 'style'));
        } else {
            $message = "Failed to submit form";
            $style = "text-danger";
            return view('customerSupport')->with(compact('message', 'style'));
        }
    }


    // --------------------------- 5. FAQ ---------------------------------------
    public function displayFAQ()
    {
        $faq = FAQ::all();
        return view("FAQ")->with(compact('faq'));
    }



    // --------------------------- 6. Order History ---------------------------------------
    public function viewOrderHistory()
    {
        if (Auth::check()) {
            $email = Auth::user()->email;
            $orderData = Orders::where('customer_email', '=', $email)->get();
            return view("orderHistory")->with(compact('orderData'));
        } else {
            return view("LogIn");
        }
    }


    // --------------------------- Other: Signup ---------------------------------------
    public function SignUp()
    {
        return view('Signup');
    }


    // --------------------------- Other: create account ---------------------------------------
    public function createAccount(Request $request)
    {
        $request->validate([
            'userName' => 'required',
            'userEmail' => 'required',
            'userPassword' => 'required',
        ]);

        $user = new User();
        $user->name = $request['userName'];
        $user->email = $request['userEmail'];
        $user->password = $request['userPassword'];
        $result = $user->save();
        return redirect()->route('SignUp')->with('result');
    }


    // --------------------------- Other: Verify username and password ---------------------------------------
    public function verifyCredentials(Request $request)
    {
        $userCredentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $result = Auth::attempt($userCredentials);
        if ($result == true) {
            return redirect()->route('Home');
        } else {
            $errorMessage = "Invalid Username or Password";
            return view("LogIn")->with(compact('errorMessage'));
        }
        // if (Auth::attempt($userCredentials)) {
        //     return redirect()->route('Home');
        // }
    }

    // --------------------------- Other: Logout ---------------------------------------
    public function LogOut()
    {
        Auth::logout();
        return redirect()->route('Home');
    }


}
