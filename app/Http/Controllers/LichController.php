<?php

namespace App\Http\Controllers;
use App\Models\lich;
use Illuminate\Http\Request;
use DateTime;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;


class LichController extends Controller
{
    private $lich;
    public function __construct(lich $lich){
        $this->lich = $lich;
    }
    public function index() {
        $lichs = $this->lich->latest()->paginate(5);
        return view('lich.index', compact('lichs'));
    }

    public function adminShow() {
         // Lấy tất cả ngày duy nhất có trong bảng liches (theo thứ tự tăng dần)
         $dates = DB::table('liches')
         ->select('ngay')
         ->distinct()
         ->orderBy('ngay')
         ->pluck('ngay')
         ->map(function ($d) {
             return Carbon::parse($d);
         });

        // Lấy tất cả lịch kèm họ tên
        $lichs = DB::table('liches')
        ->join('interns', 'liches.intern_id', '=', 'interns.id')
        ->select('interns.hoten', 'liches.ngay', 'liches.trangthai')
        ->get();

        // Biến đổi thành mảng: $lichData[hoten][ngay] = trangthai
        $lichData = [];
        foreach ($lichs as $lich) {
        $lichData[$lich->hoten][$lich->ngay] = $lich->trangthai;
        }
        return view('admin.lich.show', compact('dates', 'lichData'));
    }
    public function adminSearch(Request $request) {
        $keyword = $request->input('keyword');
        $query = DB::table('liches')
        ->join('interns', 'liches.intern_id', '=', 'interns.id')
        ->select('interns.hoten', 'liches.ngay', 'liches.trangthai', 'liches.id');
        $query->where(function ($q) use ($keyword) {
            $q->where('interns.hoten', 'like', '%' . $keyword . '%')
              ->orWhere('liches.ngay', 'like', '%' . $keyword . '%')
              ->orWhere('liches.trangthai', 'like', '%' . $keyword . '%');
        });
        $lichs = $query->get();
        return view('admin.lich.search', compact('lichs', 'keyword'));
    }
    public function adminEdit($id) {
        $lich = $this->lich->find($id);
        return view('admin.lich.edit', compact('lich'));
    }
    public function adminUpdate($id, Request $request){
        $this->lich->find($id)->update([
            'trangthai' => $request->trangthai
        ]);
        return redirect()->route('admin.lich.show');
    }

// THỰC TẬP SINH
public function create() {
    $today = Carbon::today();
    $year = $today->year;
    $month = $today->month;
    $lastDayOfMonth = Carbon::create($year, $month, $today->daysInMonth);

    $danhSachNgay = [];
    $count = 1;
    while ($today <= $lastDayOfMonth && $count <= 7) {
        $dayOfWeek = $today->locale('vi')->isoFormat('dddd'); // Lấy thứ bằng tiếng Việt
        $dayOfWeek = mb_convert_case($dayOfWeek, MB_CASE_TITLE, "UTF-8");
        $danhSachNgay[] = [
            'date' => $today->format('Y-m-d'),
            'day_of_week' => $dayOfWeek,
            
        ];
        $today->addDay();
        $count++;
    }

    return view('lich.create', compact('danhSachNgay'));
}

public function store(Request $request)
{
    $internId = Auth::guard('intern')->user()->id;

    foreach ($request->trangthai as $ngay => $trangthai) {
            $this->lich->updateOrCreate(
                [
                    'ngay' => $ngay,
                    'intern_id' => $internId
                ],
                [
                    'trangthai' => $trangthai
                ]
            );
    }
    return redirect()->route('lich.index')->with('success', 'Đăng ký nhiều ngày thành công!');
}

public function edit($id) {
    $lich = $this->lich->find($id);
    return view('lich.edit', compact('lich'));
}

public function update($id, Request $request){
    $this->lich->find($id)->update([
        'trangthai' => $request->trangthai
    ]);
    return redirect()->route('lich.index');
}

}
