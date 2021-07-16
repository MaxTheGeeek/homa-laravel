<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pdf;
use Illuminate\Http\Request;



class PdfController extends Controller
{


    public function index()
    {
        $pdfs = Pdf::all();
        return view('admin.pages.pdf.board', ['pdfs' => $pdfs]);
    }

    public function create()
    {
        return view('admin.pages.pdf.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf'
        ]);


        $file_name = time() . '.' . $request->file->extension();


        if ($request->file->move(public_path('upload'), $file_name)) {
            $pdf = new Pdf();
            $pdf->title = $request->title;
            $pdf->url = 'upload/'. $file_name;

            try {
                $pdf->save();
            }
            catch (\Exception $e) {

                return redirect()->back()->with('warning', $e->getCode());
            }
            return redirect()->back()->with('Success', 'uploaded successfully');
        }


        return redirect()->back()->with('warning', 'upload faild');

    }
//
//    public function destroy()
//    {
//
//        if(\File::exists(public_path('upload/',$file_name))){
//            \File::delete(public_path('upload/'));
//        }else{
//            dd('File does not exists.');
//        }
//    }
}
