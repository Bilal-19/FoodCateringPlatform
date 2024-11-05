<?php

namespace App\Http\Controllers;

use App\Models\CustomerInquiry;
use App\Models\Inventory;
use App\Models\Menu;
use App\Models\Orders;
use App\Models\FAQ;
use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    // --------------------------- 1. Dashboard ---------------------------------

    public function index()
    {
        $menu = Menu::all()->count();
        $noOfCustomers = Orders::distinct('customer_email')->count();
        $orderStatusPrepared = Orders::where('order_status', '=', 'Preparing')->count();
        $orderStatusCooked = Orders::where('order_status', '=', 'Cooking')->count();
        $orderStatusPacked = Orders::where('order_status', '=', 'Packing')->count();

        $breakfastCount = Menu::where('item_category', '=', 'Breakfast')->count();
        $lunchCount = Menu::where('item_category', '=', 'Lunch')->count();
        $dinnerCount = Menu::where('item_category', '=', 'Dinner')->count();
        $weddingCount = Menu::where('item_category', '=', 'Wedding')->count();
        $birthdayPartyCount = Menu::where('item_category', '=', 'Birthday Party')->count();
        $corporateCount = Menu::where('item_category', '=', 'Corporate Events')->count();
        $familyGetTogetherCount = Menu::where('item_category', '=', 'Family Get Together')->count();
        $holidayPartiesCount = Menu::where('item_category', '=', 'Holiday Parties')->count();



        return view("Admin.Dashboard", compact(
            'menu',
            'noOfCustomers',
            'orderStatusPrepared',
            'orderStatusCooked',
            'orderStatusPacked',
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




    // --------------------------- 2. Manage Menu -------------------------------
    public function manageMenu(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $menu = Menu::where('item_label', '=', $search)->orWhere('item_category', '=', $search)->get();
            $data = compact('menu');
            return view('Admin.MenuManagement')->with($data);
        } else {
            $menu = Menu::all();
            $data = compact('menu');
            return view('Admin.MenuManagement')->with($data);
        }
    }

    public function deleteMenu($id)
    {
        Menu::find($id)->delete();
        return redirect()->route('MenuManagement');
    }

    public function editMenu($id)
    {
        $findRecord = Menu::find($id);
        return view('Admin.EditMenu')->with(compact('findRecord'));
    }

    public function updateMenuRecord($id, Request $request)
    {
        $request->validate([
            'itemImage' => 'required',
            'itemLabel' => 'required',
            'itemCategory' => 'required|in:Breakfast,Lunch,Dinner,Wedding,"Birthday Party","Corporate Events","Family Get Together","Holiday Parties"',
            'itemPrice' => 'required',
        ]);
        $menu = Menu::find($id);
        $menu->item_label = $request['itemLabel'];
        $menu->item_category = $request['itemCategory'];
        $menu->item_price = $request['itemPrice'];


        if ($request->hasFile('itemImage')) {
            $image = $request->file('itemImage');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $menu->item_image = $imageName;
        }

        $menu->save();
        return redirect()->route('MenuManagement');
    }

    public function displayMenuToUser()
    {
        $menu = Menu::all();
        $data = compact('menu');
        return view('menu')->with($data);
    }

    // --------------------------- 3. Add Menu ----------------------------------

    public function addMenu()
    {
        return view('Admin.AddMenu');
    }

    public function storeMenuToDatabase(Request $request)
    {
        $request->validate([
            'itemImage' => 'required',
            'itemLabel' => 'required',
            'itemCategory' => 'required',
            'itemPrice' => 'required',
        ]);
        $menu = new Menu();
        $menu->item_label = $request['itemLabel'];
        $menu->item_category = $request['itemCategory'];
        $menu->item_price = $request['itemPrice'];


        // Store image to database
        if ($request->hasFile('itemImage')) {
            $image = $request->file('itemImage');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $menu->item_image = $imageName;
        }

        $menu->save();
        return redirect()->route('MenuManagement');
    }

    public function viewMenuData(Request $request)
    {
        $search = $request['selectCategory'] ?? "";
        if ($search != 'All Menu Items') {
            $menu = Menu::where('item_category', $search)->get();
            $data = compact('menu', 'search');
            return view('menu')->with($data);
        } else if ($search == 'All Menu Items') {
            $menu = Menu::all();
            $data = compact('menu');
            return view('menu')->with($data);
        }
    }

    // --------------------------- 4. Order Management --------------------------
    public function manageOrders(Request $request)
    {
        $search = $request['search'] ?? '';
        if ($search) {
            $orders = Orders::
                where('customer_name', '=', $search)
                ->orWhere('order_status', '=', $search)
                ->orWhere('event_category', '=', $search)
                ->get();
            return view('Admin.OrderManagement', compact('orders'));
        } else {
            $orders = Orders::all();
            return view('Admin.OrderManagement', compact('orders'));
        }

    }

    public function updateOrder($id)
    {
        $findOrder = Orders::find($id);
        if ($findOrder->order_status == 'Preparing') {
            $findOrder->order_status = 'Cooking';
        } elseif ($findOrder->order_status == 'Cooking') {
            $findOrder->order_status = 'Out for Delivery';
        } else {
            $findOrder->order_status = 'Packing';
        }
        $findOrder->save();
        return redirect()->back();
        // return view('Admin.EditOrder')->with(compact('findOrder'));
    }

    public function deleteOrder($id)
    {
        $findOrder = Orders::find($id);
        $findOrder->delete();
        return redirect('/admin/orders');
    }

    // --------------------------- 5. Inventory Management ----------------------
    public function viewInventory(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $inventory = Inventory::
                where('item_name', '=', $search)
                ->orWhere('item_cost', 'LIKE', $search)
                ->orWhere('supplier_name', 'LIKE', $search)
                ->get();
            return view('Admin.InventoryManagement')->with(compact('inventory'));
        } else {
            $inventory = Inventory::all();
            return view('Admin.InventoryManagement')->with(compact('inventory'));
        }

    }

    public function addInventory()
    {
        return view('Admin.AddInventory');
    }

    public function createInventory(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'item_category' => 'required|in:Vegetables,Meats,Diary,Grains,Seafood,"Nuts and Seeds","Fats and Oils","Sweets and Sugars",Beverages',
            'item_variant' => 'required',
            'item_quantity' => 'required',
            'item_quantity_unit' => 'required',
            'purchase_date' => 'required',
            'item_cost' => 'required',
            'supplier_name' => 'required',
            'supplier_contactno' => 'required',
        ]);

        $inventory = new Inventory();
        $inventory->item_name = $request['item_name'];
        $inventory->item_category = $request['item_category'];
        $inventory->item_variant = $request['item_variant'];
        $inventory->item_quantity = $request['item_quantity'];
        $inventory->item_quantity_unit = $request['item_quantity_unit'];
        $inventory->item_purchase_date = $request['purchase_date'];
        $inventory->item_cost = $request['item_cost'];
        $inventory->supplier_name = $request['supplier_name'];
        $inventory->supplier_contactno = $request['supplier_contactno'];
        $result = $inventory->save();
        if ($result) {
            return redirect('/admin/add/inventory');
        }
    }

    public function deleteInventory($id)
    {
        $findInventory = Inventory::find($id);
        $action = $findInventory->delete();
        if ($action) {
            return redirect('/admin/view/inventory');
        }
    }

    public function updateInventory($id)
    {
        $findInventory = Inventory::find($id);
        return view('Admin.EditInventory')->with(compact('findInventory'));
    }

    public function updateSpecificInventory(Request $request, $id)
    {
        $request->validate([
            'item_name' => 'required',
            'item_category' => 'required|in:Vegetables,Meats,Diary,Grains,Seafood,"Nuts and Seeds","Fats and Oils","Sweets and Sugars",Beverages',
            'item_variant' => 'required',
            'item_quantity' => 'required',
            'item_quantity_unit' => 'required',
            'purchase_date' => 'required',
            'item_cost' => 'required',
            'supplier_name' => 'required',
            'supplier_contactno' => 'required',
        ]);

        $inventory = Inventory::find($id);
        $inventory->item_name = $request['item_name'];
        $inventory->item_category = $request['item_category'];
        $inventory->item_variant = $request['item_variant'];
        $inventory->item_quantity = $request['item_quantity'];
        $inventory->item_quantity_unit = $request['item_quantity_unit'];
        $inventory->item_purchase_date = $request['purchase_date'];
        $inventory->item_cost = $request['item_cost'];
        $inventory->supplier_name = $request['supplier_name'];
        $inventory->supplier_contactno = $request['supplier_contactno'];
        $result = $inventory->save();
        if ($result) {
            return redirect('/admin/view/inventory');
        }
    }


    // --------------------------- 6. Customer Inquiries ------------------------
    public function getCustomerInquiries(Request $request)
    {
        $searchValue = $request['search'] ?? "";

        if ($searchValue) {
            $customerQueries = CustomerInquiry::
                where('customer_name', '=', $searchValue)
                ->orWhere('customer_email', '=', $searchValue)->get();
            return view("Admin.CustomerInquiries")->with(compact('customerQueries'));
        }
        $customerQueries = CustomerInquiry::all();
        return view("Admin.CustomerInquiries")->with(compact('customerQueries'));
    }

    public function deleteCustomerInquiry($id)
    {
        $findInquiry = CustomerInquiry::find($id);
        if ($findInquiry) {
            $findInquiry->delete();
            return redirect('/customer/inquiry');
        }
    }


    // --------------------------- 7. Registered Users --------------------------
    public function viewRegisteredUsers()
    {
        $users = User::all();
        return view('Admin.RegisteredUser')->with(compact("users"));
    }

    public function resetUserPassword($id)
    {
        $user = User::find($id);
        $user->password = 12345678;
        $user->save();
        return redirect('/admin/registered/users');
    }

    public function deleteUserAccount($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/registered/users');
    }



    // --------------------------- 8. FAQ ---------------------------------------
    public function deleteFAQ($id)
    {
        $findFAQ = FAQ::find($id);
        if ($findFAQ) {
            $findFAQ->delete();
            return redirect('/admin/view/faq');
        }
    }

    public function editFAQ($id)
    {
        $findFAQ = FAQ::find($id);
        return view("Admin.EditFAQ")->with(compact('findFAQ'));
    }

    public function updateFAQ($id, Request $request)
    {
        $findFAQ = FAQ::find($id);
        $findFAQ->question = $request['question'];
        $findFAQ->answer = $request['answer'];
        $findFAQ->save();
        return redirect('/admin/view/faq');
    }
    public function viewFAQ()
    {
        $faq = FAQ::all();
        return view("Admin.FAQ")->with(compact('faq'));
    }

    public function viewFAQform()
    {
        return view('Admin.AddFAQ');
    }

    public function createFAQ(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);
        $faq = new FAQ();
        $faq->question = $request['question'];
        $faq->answer = $request['answer'];
        $res = $faq->save();
        if ($res) {
            $message = "FAQ Added Successfully";
            return view("Admin.AddFAQ")->with(compact('message'));
        } else {
            $message = "Failed to add FAQ";
            return view("Admin.AddFAQ")->with(compact('message'));
        }
    }
    // --------------------------- 9. Trash Record ---------------------------------------

    public function viewTrashRecord()
    {
        $menu = Menu::onlyTrashed()->get();
        $orders = Orders::onlyTrashed()->get();
        $data = compact('menu', 'orders');
        return view("Admin.ViewTrash")->with($data);
    }

    public function restoreMenu($id)
    {
        $restoreMenu = Menu::withTrashed()->find($id);
        $restoreMenu->restore();
        return redirect()->back();
    }

    public function deleteMenuItem($id)
    {
        $findMenuItem = Menu::withTrashed()->find($id);
        $findMenuItem->forceDelete();
        return redirect()->back();
    }

    public function forceDeleteOrder($id)
    {
        // Permanent deleted 'order' from trash
        $findOrder = Orders::withTrashed()->find($id);
        $findOrder->forceDelete();
        return redirect()->back();
    }

    public function restoreOrderFromTrash($id)
    {
        $restoreOrder = Orders::withTrashed()->find($id);
        $restoreOrder->restore();
        return redirect()->back();
    }


    // -----------------------------------------------------------------------
    // --------------------------- End ---------------------------------------
    // -----------------------------------------------------------------------

}
