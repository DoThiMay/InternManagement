<?php

namespace App\Http\Controllers;
use App\Models\intern;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
class InternController extends Controller
{

    private $intern;
    public function __construct(intern $intern){
        $this->intern = $intern;
    }
    public function index() {
        $interns = $this->intern->latest()->paginate(5);
        return view('admin.interns.index', compact('interns'));
    }
    public function create() {
         return view('admin.interns.create');
    }
    public function store(Request $request) {
        $this->intern->create([
            'hoten' => $request->hoten,
            'tgbatdau' => $request->tgbatdau,
            'tgketthuc' => $request->tgketthuc,
            'vitri' => $request->vitri,
            'truong' => $request->truong,
            'gpa' => $request->gpa,
            'ngaysinh' => $request->ngaysinh,
            'sdt' => $request->sdt,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('interns.index');
    }

    public function edit($id) {
        $intern = $this->intern->find($id);
        return view('admin.interns.edit', compact('intern'));
    }

    public function update($id, Request $request){
        $this->intern->find($id)->update([
            'hoten' => $request->hoten,
            'tgbatdau' => $request->tgbatdau,
            'tgketthuc' => $request->tgketthuc,
            'vitri' => $request->vitri,
            'truong' => $request->truong,
            'gpa' => $request->gpa,
            'ngaysinh' => $request->ngaysinh,
            'sdt' => $request->sdt,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('interns.index');
    }

    public function delete($id){
        $this->intern->find($id)->delete();
        return redirect()->route('interns.index');
    }
}