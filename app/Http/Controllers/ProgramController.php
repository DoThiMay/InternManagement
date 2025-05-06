<?php

namespace App\Http\Controllers;
use App\Models\program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    private $program;
    public function __construct(program $program){
        $this->program = $program;
    }
    public function index(Request $request) {
        $vitri = $request->input('vitri');
        // Query theo vị trí nếu có, nếu không thì lấy tất cả
        $query = $this->program->query();
        if ($vitri) {
            $query->where('vitri', $vitri);
        }
        // Phân trang kết quả
        $programs = $query->orderBy('buoi', 'asc')->paginate(5);
    
        return view('admin.programs.index', compact('programs', 'vitri'));
    }
    public function create() {
        return view('admin.programs.create');
   }
   public function store(Request $request) {
       $this->program->create([
           'ngay' => $request->ngay,
           'buoi' => $request->buoi,
           'vitri' => $request->vitri,
           'mon' => $request->mon,
           'noidung' => $request->noidung,
           'mota' => $request->mota,
           'sogiohoc' => $request->sogiohoc
       ]);
       return redirect()->route('programs.index');
   }
   public function edit($id) {
    $programs = $this->program->find($id);
    return view('admin.programs.edit', compact('programs'));
}

public function update($id, Request $request){
    $this->program->find($id)->update([
        'ngay' => $request->ngay,
        'buoi' => $request->buoi,
        'vitri' => $request->vitri,
        'mon' => $request->mon,
        'noidung' => $request->noidung,
        'mota' => $request->mota
    ]);
    return redirect()->route('programs.index');
}

public function delete($id){
    $this->program->find($id)->delete();
    return redirect()->route('programs.index');
}
}
