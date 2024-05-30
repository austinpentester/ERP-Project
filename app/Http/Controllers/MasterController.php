<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;  // Import the DB facade
use Illuminate\Support\Facades\Session;
use App\Models\MainModel;
use Illuminate\Http\Request;


class MasterController extends Controller
{
    private $obj;

    function __construct()
    {
        $this->obj=new MainModel;
    }

    function index()
    {
        if(session()->has('user_id'))
        {
            return view('master/Category');
        }
        else
        {
            return redirect('login');
        }
    }

    function indexTable()
    {
        if(session()->has('user_id'))
        {
            $categories = $this->obj->getDatas('category');
            return view('master.T_Category', compact('categories'));
        }
        else
        {
            return redirect('login');
        }
    }

    function insert(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'sub_category_name' => 'required|string|max:255',
        ]);

        // Prepare the data for insertion
        $data = [
            'Category' => $validatedData['company_name'],
            'sub_Category' => $validatedData['sub_category_name'],
            'user_id' => session('user_id'),  // Assuming user_id is stored in the session
            'status' => 0,  // Assuming you want to set the status as 0
        ];

        // Insert the data
        $result = $this->obj->insert('category', $data);

        // Redirect or return a response
        if ($result) {
            return redirect('/T_Category')->with('success', 'Data inserted successfully!');
        } else {
            return redirect('/T_Category')->with('error', 'Data insertion failed!');
        }
    }


    // delete code

    function delete($id)
    {
        if (Session::has('user_id')) {
            $result = DB::table('category')->where('id', $id)->delete();
            return redirect('/T_Category')->with('success', 'Data deleted successfully!');
        } else {
            return redirect('login');
        }
    }
    public function updateCategory(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'Category' => 'required|string|max:255',
            'SubCategory' => 'required|string|max:255',
        ]);

        // Prepare the data for updating
        $data = [
            'Category' => $validatedData['Category'],
            'sub_Category' => $validatedData['SubCategory'],
        ];

        // Update the data using the query builder
        $result = DB::table('category')->where('id', $id)->update($data);

        // Redirect or return a response
        if ($result) {
            return redirect('/T_Category')->with('success', 'Category updated successfully!');
        } else {
            return redirect('/T_Category')->with('error', 'Category update failed!');
        }
    }


    // _---------------------------unit code starts here-----------------------


    function indexTUnit()
    {
        if(session()->has('user_id'))
        {
            $units = $this->obj->getDatas('units');
            return view('master/T_unit', compact('units'));
        }
        else
        {
            return redirect('login');
        }
    }

    function indexUnit()
    {
        if(session()->has('user_id'))
        {
            return view('master/Unit');
        }
        else
        {
            return redirect('login');
        }
    }


    function insertUnit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'symbol' => 'required|string|max:255',
            'unit_name' => 'required|string|max:255',
        ]);

        // Prepare the data for insertion
        $data = [
            'symbol' => $validatedData['symbol'],
            'unit_name' => $validatedData['unit_name'],
            'user_id' => session('user_id'),  // Assuming user_id is stored in the session

        ];

        // Insert the data
        $result = $this->obj->insert('units', $data);

        // Redirect or return a response
        if ($result) {
            return redirect('/T_Units')->with('success', 'Data inserted successfully!');
        } else {
            return redirect('/T_Units')->with('error', 'Data insertion failed!');
        }
    }


    function deleteUnit($id)
    {
        if (Session::has('user_id')) {
            $result = DB::table('units')->where('id', $id)->delete();
            return redirect('/T_Units')->with('success', 'Data deleted successfully!');
        } else {
            return redirect('login');
        }
    }

// Controller method in MasterController.php
public function updateUnit(Request $request, $id)
{
    // Validate the form data
    $validatedData = $request->validate([
        'Unit' => 'required|string|max:255',
        'Symbol' => 'required|string|max:255',
    ]);

    // Prepare the data for updating
    $data = [
        'unit_name' => $validatedData['Unit'],
        'symbol' => $validatedData['Symbol'],
    ];

    // Update the data
    $result = DB::table('units')->where('id', $id)->update($data);

    // Redirect or return a response
    if ($result) {
        return redirect('/T_Units')->with('success', 'Unit updated successfully!');
    } else {
        return redirect('/T_Units')->with('error', 'Unit update failed!');
    }
}





    // ---------------------------Major Heads Table code starts here-----------------------


    function indexTMajor()
    {
        if(session()->has('user_id'))
        {
            $major_heads = $this->obj->getDatas('major_heads');
            return view('master/T_Major_Heads', compact('major_heads'));
        }
        else
        {
            return redirect('login');
        }
    }

    function indexMajor_heads()
    {
        if(session()->has('user_id'))
        {
            return view('master/Major_Heads');
        }
        else
        {
            return redirect('login');
        }
    }


    function insertMajor_Heads(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'Major_Heads' => 'required|string|max:255',
        ]);

        // Prepare the data for insertion
        $data = [
            'Major_Heads' => $validatedData['Major_Heads'],
            'user_id' => session('user_id'),  // Assuming user_id is stored in the session
        ];

        // Insert the data
        $result = $this->obj->insert('major_heads', $data);

        // Redirect or return a response
        if ($result) {
            return redirect('/TMajor_Heads')->with('success', 'Data inserted successfully!');
        } else {
            return redirect('/TMajor_Heads')->with('error', 'Data insertion failed!');
        }
    }



    function deleteMajor_Heads($id)
    {
        if (Session::has('user_id')) {
            $result = DB::table('major_heads')->where('id', $id)->delete();
            return redirect('/TMajor_Heads')->with('success', 'Data deleted successfully!');
        } else {
            return redirect('login');
        }
    }

    public function updateMajorHead(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'Major_Heads' => 'required|string|max:255',
        ]);

        // Update the major head
        $result = DB::table('major_heads')->where('id', $id)->update(['Major_Heads' => $validatedData['Major_Heads']]);

        // Redirect or return a response
        if ($result) {
            return redirect('/TMajor_Heads')->with('success', 'Unit updated successfully!');
        } else {
            return redirect('/TMajor_Heads')->with('error', 'Unit update failed!');
        }
    }






// -----------------------------color code starts here ------------------------

    public function indexTColor()
    {
        if (session()->has('user_id')) {
            $colors = $this->obj->getDatas('color');
            return view('master.T_Color', compact('colors'));
        } else {
            return redirect('login');
        }
    }


    public function indexColor()
    {
        if (session()->has('user_id')) {

            return view('master.color');
        } else {
            return redirect('login');
        }
    }
    public function insertColor(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'color' => 'required|string|max:255',
        ]);

        // Prepare the data for insertion
        $data = [
            'color' => $validatedData['color'],
            'user_id' => session('user_id'),  // Assuming user_id is stored in the session
        ];

        // Insert the data
        $result = $this->obj->insert('color', $data);

        // Redirect or return a response
        if ($result) {
            return redirect('/T_color')->with('success', 'Data inserted successfully!');
        } else {
            return redirect('/T_color')->with('error', 'Data insertion failed!');
        }
    }

    public function deleteColor($id)
    {
        if (session()->has('user_id')) {
            $result = DB::table('color')->where('id', $id)->delete();
            return redirect('/T_color')->with('success', 'Data deleted successfully!');
        } else {
            return redirect('login');
        }
    }

    public function updateColor(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'Color' => 'required|string|max:255',
        ]);

        // Prepare the data for updating
        $data = [
            'color' => $validatedData['Color'],
        ];

        // Update the data using the query builder
        $result = DB::table('color')->where('id', $id)->update($data);

        // Redirect or return a response
        if ($result) {
            return redirect('/T_color')->with('success', 'Color updated successfully!');
        } else {
            return redirect('/T_color')->with('error', 'Color update failed!');
        }
    }





// -----------------------------Posistion code starts here ------------------------

public function indexTPosition()
{
    if (session()->has('user_id')) {
        $position  = $this->obj->getDatas('Position');
        return view('master.T_Position', compact('position'));
    } else {
        return redirect('login');
    }
}


public function indexPosition()
{
    if (session()->has('user_id')) {

        return view('master.Position');
    } else {
        return redirect('login');
    }
}
public function insertPosition(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'Position' => 'required|string|max:255',
    ]);

    // Prepare the data for insertion
    $data = [
        'Position' => $validatedData['Position'],
        'user_id' => session('user_id'),  // Assuming user_id is stored in the session
    ];

    // Insert the data
    $result = $this->obj->insert('position', $data);

    // Redirect or return a response
    if ($result) {
        return redirect('/T_Position')->with('success', 'Data inserted successfully!');
    } else {
        return redirect('/T_Position')->with('error', 'Data insertion failed!');
    }
}

public function deletePosition($id)
{
    if (session()->has('user_id')) {
        $result = DB::table('position')->where('id', $id)->delete();
        return redirect('/T_Position')->with('success', 'Data deleted successfully!');
    } else {
        return redirect('login');
    }
}

public function updatePosition(Request $request, $id)
{
    // Validate the form data
    $validatedData = $request->validate([
        'Position' => 'required|string|max:255',
    ]);

    // Prepare the data for updating
    $data = [
        'Position' => $validatedData['Position'],
    ];

    // Update the data
    $result = DB::table('position')->where('id', $id)->update($data);

    // Redirect or return a response
    if ($result) {
        return redirect('/T_Position')->with('success', 'Data updated successfully!');
    } else {
        return redirect('/T_Position')->with('error', 'Data update failed!');
    }
}



// -----------------------------Volume code starts here ------------------------

public function indexTVolume()
{
    if (session()->has('user_id')) {
        $volumes = $this->obj->getDatas('volume');
        return view('master.T_Volume', compact('volumes'));
    } else {
        return redirect('login');
    }
}

public function deleteVolume($id)
{
    if (session()->has('user_id')) {
        $result = DB::table('volume')->where('id', $id)->delete();
        return redirect('/T_Volume')->with('success', 'Data deleted successfully!');
    } else {
        return redirect('login');
    }
}

public function indexVolume()
{
    if (session()->has('user_id')) {
        return view('master.Volume');
    } else {
        return redirect('login');
    }
}

public function insertVolume(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'Volume' => 'required|string|max:255',
    ]);

    // Prepare the data for insertion
    $data = [
        'Volume' => $validatedData['Volume'],
        'user_id' => session('user_id'),  // Assuming user_id is stored in the session
    ];

    // Insert the data
    $result = $this->obj->insert('volume', $data);

    // Redirect or return a response
    if ($result) {
        return redirect('/T_Volume')->with('success', 'Data inserted successfully!');
    } else {
        return redirect('/T_Volume')->with('error', 'Data insertion failed!');
    }
}


public function updateVolume(Request $request, $id)
{
    // Validate the form data
    $validatedData = $request->validate([
        'Volume' => 'required|string|max:255',
    ]);

    // Prepare the data for updating
    $data = [
        'Volume' => $validatedData['Volume'],
    ];

    // Update the data
    $result = DB::table('volume')->where('id', $id)->update($data);

    // Redirect or return a response
    if ($result) {
        return redirect('/T_Volume')->with('success', 'Data updated successfully!');
    } else {
        return redirect('/T_Volume')->with('error', 'Data update failed!');
    }
}





 // _---------------------------Taxes code starts here-----------------------


   // Method to fetch and display the taxes data
   public function indexTTaxes()
   {
       if (session()->has('user_id')) {
           $taxes = $this->obj->getDatas('taxes');
           return view('master.T_Taxes', compact('taxes'));
       } else {
           return redirect('login');
       }
   }

   // Method to display the form to insert new tax
   public function indexTaxes()
   {
       if (session()->has('user_id')) {
           return view('master.Taxes');
       } else {
           return redirect('login');
       }
   }

   // Method to handle the insertion of a new tax
   public function insertTaxes(Request $request)
   {
       // Validate the form data
       $validatedData = $request->validate([
           'Taxes' => 'required|string|max:255',
           'Percentage' => 'required|numeric',
       ]);

       // Prepare the data for insertion
       $data = [
           'Taxes' => $validatedData['Taxes'],
           'Percentage' => $validatedData['Percentage'],
           'user_id' => session('user_id'),  // Assuming user_id is stored in the session
       ];

       // Insert the data
       $result = $this->obj->insert('taxes', $data);

       // Redirect or return a response
       if ($result) {
           return redirect('/T_Taxes')->with('success', 'Data inserted successfully!');
       } else {
           return redirect('/T_Taxes')->with('error', 'Data insertion failed!');
       }
   }

   // Method to handle the deletion of a tax
   public function deleteTaxes($id)
   {
       if (session()->has('user_id')) {
           $result = DB::table('taxes')->where('id', $id)->delete();
           return redirect('/T_Taxes')->with('success', 'Data deleted successfully!');
       } else {
           return redirect('login');
       }
   }

   public function updateTaxes(Request $request, $id)
{
    // Validate the form data
    $validatedData = $request->validate([
        'Taxes' => 'required|string|max:255',
        'Percentage' => 'required|numeric',
    ]);

    // Prepare the data for updating
    $data = [
        'Taxes' => $validatedData['Taxes'],
        'Percentage' => $validatedData['Percentage'],
    ];

    // Update the data
    $result = DB::table('taxes')->where('id', $id)->update($data);

    // Redirect or return a response
    if ($result) {
        return redirect('/T_Taxes')->with('success', 'Data updated successfully!');
    } else {
        return redirect('/T_Taxes')->with('error', 'Data update failed!');
    }

}

  // _---------------------------Taxes code End here-----------------------



// -----------------------------Currencies code starts here ------------------------

public function indexTCurrencies()
{
    if (session()->has('user_id')) {
        $currencies = $this->obj->getDatas('currencies');
        return view('master.T_Currencies', compact('currencies'));
    } else {
        return redirect('login');
    }
}

public function indexCurrencies()
{
    if (session()->has('user_id')) {
        return view('master.Currencies');
    } else {
        return redirect('login');
    }
}

public function insertCurrencies(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'Currencies' => 'required|string|max:255',
        'Currencies_Symbol' => 'required|string|max:255',
    ]);

    // Prepare the data for insertion
    $data = [
        'Currencies' => $validatedData['Currencies'],
        'Currencies_Symbol' => $validatedData['Currencies_Symbol'],
        'user_id' => session('user_id'),  // Assuming user_id is stored in the session
    ];

    // Insert the data
    $result = $this->obj->insert('currencies', $data);

    // Redirect or return a response
    if ($result) {
        return redirect('/T_Currencies')->with('success', 'Data inserted successfully!');
    } else {
        return redirect('/T_Currencies')->with('error', 'Data insertion failed!');
    }
}

public function deleteCurrencies($id)
{
    if (session()->has('user_id')) {
        $result = DB::table('currencies')->where('id', $id)->delete();
        return redirect('/T_Currencies')->with('success', 'Data deleted successfully!');
    } else {
        return redirect('login');
    }
}

public function updateCurrencies(Request $request, $id)
{
    if (session()->has('user_id')) {
        // Validate the form data
        $validatedData = $request->validate([
            'Currencies' => 'required|string|max:255',
            'Currencies_Symbol' => 'required|string|max:255',
        ]);

        // Prepare the data for update
        $data = [
            'Currencies' => $validatedData['Currencies'],
            'Currencies_Symbol' => $validatedData['Currencies_Symbol'],
        ];

        // Update the data
        $result = DB::table('currencies')->where('id', $id)->update($data);

        // Redirect or return a response
        if ($result) {
            return redirect('/T_Currencies')->with('success', 'Data updated successfully!');
        } else {
            return redirect('/T_Currencies')->with('error', 'Data update failed!');
        }
    } else {
        return redirect('login');
    }

}

// -----------------------------Payment Modes code starts here ------------------------

public function indexTPaymentModes()
{
    if (session()->has('user_id')) {
        $paymentModes = $this->obj->getDatas('payment_modes');
        return view('master.T_Payment', compact('paymentModes'));
    } else {
        return redirect('login');
    }
}

public function indexPaymentModes()
{
    if (session()->has('user_id')) {
        return view('master.Payment');
    } else {
        return redirect('login');
    }
}

public function insertPaymentModes(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'payment_Modes' => 'required|string|max:255',
    ]);

    // Prepare the data for insertion
    $data = [
        'payment_Modes' => $validatedData['payment_Modes'],
        'user_id' => session('user_id'),  // Assuming user_id is stored in the session
    ];

    // Insert the data
    $result = $this->obj->insert('payment_modes', $data);

    // Redirect or return a response
    if ($result) {
        return redirect('/T_Payment')->with('success', 'Data inserted successfully!');
    } else {
        return redirect('/T_Payment')->with('error', 'Data insertion failed!');
    }
}

public function deletePaymentModes($id)
{
    if (session()->has('user_id')) {
        $result = DB::table('payment_modes')->where('id', $id)->delete();
        return redirect('/T_Payment')->with('success', 'Data deleted successfully!');
    } else {
        return redirect('login');
    }
}

public function editPaymentModes($id)
{
    if (session()->has('user_id')) {
        $paymentMode = DB::table('payment_modes')->where('id', $id)->first();
        return view('master.EditPaymentModes', compact('paymentMode'));
    } else {
        return redirect('login');
    }
}


public function updatePaymentModes(Request $request, $id)
{
    // Validate the form data
    $validatedData = $request->validate([
        'payment_Modes' => 'required|string|max:255',
    ]);

    // Prepare the data for update
    $data = [
        'payment_Modes' => $validatedData['payment_Modes'],
        'user_id' => session('user_id'),  // Assuming user_id is stored in the session
    ];

    // Update the data
    $result = DB::table('payment_modes')->where('id', $id)->update($data);

    // Redirect or return a response
    if ($result) {
        return redirect('/T_Payment')->with('success', 'Data updated successfully!');
    } else {
        return redirect('/T_Payment')->with('error', 'Data update failed!');
    }

}

}
