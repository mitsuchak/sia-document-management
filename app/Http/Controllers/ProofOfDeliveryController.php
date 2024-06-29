<?php

namespace App\Http\Controllers;

use App\Models\ProofOfDelivery;
use App\Models\ProofOfDeliveryData;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use PHPExcel_IOFactory;

class ProofOfDeliveryController extends Controller
{
    public function index(Request $request){
        $selected_delivery = $selected_review = "";

        if($request->delivery_status != ""){
            $selected_delivery = $request->delivery_status;
        }

        if($request->review_status != ""){
            $selected_review = $request->review_status;
        }
        $deliveries = ProofOfDelivery::with('deliveryData');
        
        if(auth()->user()->role_id == config('constants.OPERATIONAL_MANAGER_ROLE')){
            $deliveries = $deliveries->where('branch_name',auth()->user()->branch_name);
        }

        if($selected_delivery != ""){
            $deliveries = $deliveries->whereHas('deliveryData', function($query) use ($selected_delivery) {
                $query->where('delivery_status', $selected_delivery);
            });
        }

        if($selected_review != ""){
            $deliveries = $deliveries->whereHas('deliveryData', function($query) use ($selected_review) {
                $query->where('review_status', $selected_review);
            });
        }
        
        $deliveries = $deliveries->get();

        $delivery_status_array = config('constants.DELIVERY_STATUS');
        $review_status_array = config('constants.REVIEW_STATUS');

        return view('delivery.index',compact('deliveries', 'selected_delivery', 'selected_review', 'delivery_status_array', 'review_status_array'));
    }

    public function create(){
        $branches = config('constants.BRANCHES');
        
        return view('delivery.create', compact('branches'));
    }

    public function store(Request $request){
        try{
            $input = $request->all();
    
            $pod = ProofOfDelivery::create($input);
    
            $data['pod_id'] = $pod->id;
            ProofOfDeliveryData::create($data);
    
            return redirect()->route('delivery.index')->with('success','Added Successfully!');
        } catch(Exception $ex){
            return redirect()->route('delivery.index')->with('error',$ex->getMessage());
        }
    }

    public function edit($id){
        $data = ProofOfDelivery::find($id);
        $branches = config('constants.BRANCHES');
        return view('delivery.create', compact('data','branches'));
    }

    public function update(Request $request, $id){
        try{
            $data = ProofOfDelivery::find($id);
            $data->branch_name = $request->branch_name;
            $data->invoice_no = $request->invoice_no;
            $data->customer_name = $request->customer_name;
            $data->invoice_amount = $request->invoice_amount;
            $data->quantity = $request->quantity;
            $data->save();
    
            return redirect()->route('delivery.index')->with('success','Updated Successfully!');
        } catch(Exception $ex){
            return redirect()->route('delivery.index')->with('error',$ex->getMessage());
        }
    }

    public function delete($id){
        ProofOfDeliveryData::where('pod_id', $id)->delete();
        ProofOfDelivery::find($id)->delete();

        return redirect()->route('delivery.index');
    }

    public function reviewChange(Request $request, $id){
        try{
            $data = ProofOfDeliveryData::where('pod_id', $id)->first();
    
            $data = ProofOfDeliveryData::find($data->id);
    
            $data->review_status = $request->review_status;
            $data->save();
    
            return redirect()->route('delivery.index')->with('success','Review Status Changed!');
        } catch(Exception $ex){
            return redirect()->route('delivery.index')->with('error',$ex->getMessage());
        }
    }

    public function deliveryChange(Request $request, $id){
        try{
            $data = ProofOfDeliveryData::where('pod_id', $id)->first();
    
            $data = ProofOfDeliveryData::find($data->id);
    
            $data->delivery_status = $request->delivery_status;
            $data->save();
    
            return redirect()->route('delivery.index')->with('success','Delivery Status Changed!');
        } catch(Exception $ex){
            return redirect()->route('delivery.index')->with('error',$ex->getMessage());
        }
    }

    public function fileUpload(Request $request, $id){
        try{
            $data = ProofOfDeliveryData::where('pod_id', $id)->first();
    
            $data = ProofOfDeliveryData::find($data->id);
    
            if($request->hasFile('file_upload')){
                $file = $request->file('file_upload');
                $fileName = $file->getClientOriginalName();
                $fileName = str_replace(' ','_',$fileName);
                $filePath = $file->storeAs('public/files', $fileName);
                
                $data->file_name = $fileName;
                $data->file_upload = $filePath;
                $data->upload_date = Carbon::now('Asia/Kolkata');
                $data->save();
            }
            
            return redirect()->route('delivery.index')->with('success','File uploaded successfully!');
        } catch(Exception $ex){
            return redirect()->route('delivery.index')->with('error',$ex->getMessage());
        }
    }

    public function export(){
        return view('delivery.export');
    }

    public function exportStore(Request $request){
        try {
            ini_set('max_execution_time', 600);
            $request->validate([
                // 'file' => 'required|mimes:csv,xlsx,xls,text/csv',
            ]);
            
            $this->importChunked($request->file('file'));
            // if($request->file('file')->getClientOriginalExtension() == 'csv'){
            // } else if(in_array($request->file('file')->getClientOriginalExtension(), ['xlsx','xlx'])){
            //     $this->importXlsxChunked($request->file('file'));
            // }

            return redirect()->route('delivery.index')->with('success','Data Exported Successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('delivery.index')->with('error',$th->getMessage());
        }
        return redirect()->route('delivery.index');
    }

    private function importChunked($file)
    {
        set_time_limit(-1);
        ini_set('memory_limit','-1');
        try {
            $csvFile = fopen($file, "r");
        
            // Check if the file was opened successfully
            if (!$csvFile) {
                throw new Exception("Unable to open CSV file");
            }
        
            $counter = 0;
        
            while (($data = fgetcsv($csvFile, null, ",")) !== FALSE) {
                // Skip header row
                if ($counter == 0) {
                    $counter++;
                    continue;
                }
        
                // Check if data array has expected number of elements
                if (count($data) < 6) {
                    // Log or handle error appropriately
                    continue;
                }
        
                // Extract data from CSV row
                $branch_name = $data[1];
                $invoice_no = $data[2];
                $customer_name = empty($data[3]) ? null : $data[3];
                $invoice_amount = empty($data[4]) ? null : $data[4];
                $quantity = empty($data[5]) ? null : $data[5];
        
                // Create record array
                $record = [
                    'branch_name' => $branch_name,
                    'invoice_no' => $invoice_no,
                    'customer_name' => $customer_name,
                    'invoice_amount' => $invoice_amount,
                    'quantity' => $quantity,
                    'created_at' => now(), // Assuming now() returns current timestamp
                    'updated_at' => now(),
                ];
        
                // Insert record into database
                $pod = ProofOfDelivery::create($record);
        
                // Check if record was inserted successfully
                if (!$pod) {
                    // Log or handle error appropriately
                    continue;
                }
        
                // Create related data record
                $pod_data = new ProofOfDeliveryData();
                $pod_data->pod_id = $pod->id;
                $pod_data->save();
            }
        
            fclose($csvFile);
        
        } catch (Exception $e) {
            // Log or handle exception
            return false;
        }
        
        return true;
    }

    public function importXlsxChunked($file){
        set_time_limit(-1);
        ini_set('memory_limit','-1');
        try {
            // Load the Excel file
            dd(PHPExcel_IOFactory::load($file));
            $objPHPExcel = PHPExcel_IOFactory::load($file);
            // Get the first worksheet
            $worksheet = $objPHPExcel->getActiveSheet();
        
            // Get the highest row number containing data
            $highestRow = $worksheet->getHighestRow();
        
            // Iterate through rows
            for ($row = 2; $row <= $highestRow; $row++) { // Start from 2 to skip header row
                // Get cell values
                $branch_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                $invoice_no = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                $customer_name = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                $invoice_amount = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                $quantity = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
        
                // Process data as needed...
                // Example: insert into database, etc.
                // Make sure to adjust this part based on your data structure and database operations
                
                // Example:
                $record = [
                    'branch_name' => $branch_name,
                    'invoice_no' => $invoice_no,
                    'customer_name' => $customer_name,
                    'invoice_amount' => $invoice_amount,
                    'quantity' => $quantity,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
        
                // Insert record into database
                $pod = ProofOfDelivery::create($record);
        
                // Check if record was inserted successfully
                if (!$pod) {
                    // Log or handle error appropriately
                    continue;
                }
        
                // Create related data record
                $pod_data = new ProofOfDeliveryData();
                $pod_data->pod_id = $pod->id;
                $pod_data->save();
            }
        } catch (Exception $e) {
            // Log or handle exception
            return false;
        }
    }
}
