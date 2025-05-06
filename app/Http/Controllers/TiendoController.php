<?php

namespace App\Http\Controllers;
use App\Models\tiendo;
use App\Models\program;
use App\Models\intern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TiendoController extends Controller
{
    private $tiendo;
    public function __construct(tiendo $tiendo){
        $this->tiendo = $tiendo;
    }

    public function index(Request $request) {
    $vitri = $request->get('vitri', '');

    // Lấy chương trình và thực tập sinh theo vị trí
    $programs = Program::where('vitri', $vitri)->get();
    $interns = Intern::where('vitri', $vitri)->get();

    // Lấy tiến độ: tạo mảng 2 chiều $tiendos[intern_id][program_id]
    $tiendos = [];
    $rawTiendo = Tiendo::whereIn('intern_id', $interns->pluck('id'))
                       ->whereIn('program_id', $programs->pluck('id'))
                       ->get();

    foreach ($rawTiendo as $item) {
        $tiendos[$item->intern_id][$item->program_id] = $item->tiendo;
    }

    return view('admin.tiendo.index', compact('vitri', 'programs', 'interns', 'tiendos'));
}

    public function show(Request $request)
{
    $vitri = $request->input('vitri'); // ví dụ 'dev', 'ba', 'tester'

    // Lọc chương trình và thực tập sinh theo vị trí
    $programs = Program::where('vitri', $vitri)->orderBy('id')->get();
    $interns = Intern::where('vitri', $vitri)->get();

    // Lấy dữ liệu tiến độ từ bảng trung gian
    $tiendoData = DB::table('tiendos')->get();

    // Biến đổi dữ liệu dạng: [intern_id][program_id] = tiendo
    $tiendos = [];
    foreach ($tiendoData as $item) {
        $tiendos[$item->intern_id][$item->program_id] = $item->tiendo;
    }

    return view('admin.tiendo.create', compact('programs', 'interns', 'tiendos', 'vitri'));
}

public function searchTiendo(Request $request) {
    $keyword = $request->input('keyword');
    $vitri = $request->input('vitri'); // lấy giá trị vị trí được chọn

    $query = DB::table('tiendos')
        ->join('interns', 'tiendos.intern_id', '=', 'interns.id')
        ->join('programs', 'tiendos.program_id', '=', 'programs.id')
        ->select(
            'tiendos.id',
            'interns.hoten',
            'interns.vitri',
            'programs.mon as tenchuongtrinh',
            'tiendos.tiendo'
        );

    // Apply keyword filter nếu có
    if ($keyword) {
        $query->where(function ($q) use ($keyword) {
            $q->where('interns.hoten', 'like', '%' . $keyword . '%')
              ->orWhere('programs.mon', 'like', '%' . $keyword . '%')
              ->orWhere('tiendos.tiendo', 'like', '%' . $keyword . '%')
              ->orWhere('interns.vitri', 'like', '%' . $keyword . '%');
        });
    }
    $tiendos = $query->orderBy('interns.hoten')->paginate(10); // phân trang 10 bản ghi/trang

    return view('admin.tiendo.search', compact('tiendos', 'keyword', 'vitri'));
}

public function editTiendo($id) {
    $tiendo = $this->tiendo->find($id);
    return view('admin.tiendo.edit', compact('tiendo'));
}
public function updateTiendo($id, Request $request){
    $this->tiendo->find($id)->update([
        'tiendo' => $request->tiendo
    ]);
    return redirect()->route('admin.tiendo.index');
}

public function store(Request $request)
{
    $tiendoData = $request->input('tiendos');

    // Kiểm tra dữ liệu có tồn tại và đúng định dạng
    if (!$tiendoData || !is_array($tiendoData)) {
        return redirect()->back()->with('error', 'Không có dữ liệu tiến độ hợp lệ được gửi.');
    }

    foreach ($tiendoData as $internId => $programs) {
        foreach ($programs as $programId => $tiendoValue) {

            // Chỉ lưu khi trạng thái hợp lệ
            if (in_array($tiendoValue, ['todo', 'doing', 'done'])) {
                Tiendo::updateOrCreate(
                    [
                        'intern_id' => $internId,
                        'program_id' => $programId,
                    ],
                    [
                        'tiendo' => $tiendoValue
                    ]
                );
            }
        }
    }

    return redirect()->back()->with('success', 'Cập nhật tiến độ thành công!');
}


}
