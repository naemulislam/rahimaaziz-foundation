<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentDailyReportRequest;
use App\Models\DailyReport;
use App\Models\Studentadmission;
use App\Repositories\TeacherRepository;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    public function index()
    {
        $get_stu = Studentadmission::where('student_id', auth('student')->user()->id)->first();
        $data['reports'] = DailyReport::where('admission_id', $get_stu->id)->latest()->get();
        return view('backend.student.dashboard.report.report-index', $data);
    }
    public function create()
    {
        return view('backend.student.dashboard.report.submit-report');
    }

    public function store(StudentDailyReportRequest $request)
    {
        $get_stu = Studentadmission::where('student_id', auth('student')->user()->id)->first();

        $juzGets = DailyReport::where('admission_id', $get_stu->id)->where('group_id', $get_stu->group_id)
            ->where('juz_number', $request->juz_number)
            ->where('report_type', $request->report_type)
            ->where('teacher_review', 1)->get();
        if ($juzGets->count() > 0) {

            $is_complete = $juzGets->sum('line_number');
            $juz_numbers = [
                1 => 141,
                2 => 111,
                3 => 125,
                4 => 132,
                5 => 124,
                6 => 111,
                7 => 148,
                8 => 142,
                9 => 159,
                10 => 128,
                11 => 150,
                12 => 170,
                13 => 155,
                14 => 226,
                15 => 185,
                16 => 6236,
                17 => 6236,
                18 => 6236,
                19 => 6236,
                20 => 6236,
                21 => 6236,
                22 => 6236,
                23 => 6236,
                24 => 6236,
                25 => 6236,
                26 => 6236,
                27 => 6236,
                28 => 6236,
                29 => 6236,
                30 => 6236,
            ];
            foreach ($juz_numbers as $key => $value) {
                if ($key == $request->juz_number) {
                    if ($is_complete == $value) {
                        return back()->with('success', 'Jug Already Completed!');
                    }
                }
            }
        }


        $data = new DailyReport();
        $data->admission_id =  $get_stu->id;
        $data->group_id = $get_stu->group_id;
        $data->report_name = $request->report_name;
        $data->report_date = $request->report_date;
        $data->report_type = $request->report_type;
        $data->juz_number = $request->juz_number;
        $data->page = $request->page_number;
        $data->line_number = $request->line_number;
        $data->description = $request->description;

        $image = $request->file('image');
        if ($image) {
            $imgName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/daily_report'), $imgName);
            $data->image = 'uploaded/daily_report/' . $imgName;
        }
        $data->save();

        return redirect()->route('student.report.index')->with('success', 'Daily report Submitted successfully!');
    }

    public function show(DailyReport $dailyReport)
    {
        $teacher = TeacherRepository::query()->where('group_id', $dailyReport->group_id)->first();
        return view('backend.student.dashboard.report.show', compact('dailyReport', 'teacher'));
    }

    public function edit(DailyReport $dailyReport)
    {
        return view('backend.student.dashboard.report.report-edit', compact('dailyReport'));
    }

    public function update(StudentDailyReportRequest $request, DailyReport $dailyReport)
    {
        $dailyReport->report_name = $request->report_name;
        $dailyReport->report_date = $request->report_date;
        $dailyReport->page = $request->page_number;
        $dailyReport->juz_number = $request->juz_number;
        $dailyReport->line_number = $request->line_number;
        $dailyReport->report_type = $request->report_type;
        $dailyReport->description = $request->description;
        $image = $request->file('image');
        if ($image) {
            $imgName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $dailyReport->image;
            if ($image_path) {
                @unlink(public_path($image_path));
            }
            $image->move(public_path('uploaded/daily_report'), $imgName);
            $dailyReport->image = 'uploaded/daily_report/' . $imgName;
        }
        $dailyReport->save();
        return redirect()->route('student.report.index')->with('success', 'Daily report updated successfully!');
    }

    public function reportDelete(DailyReport $dailyReport)
    {
        if ($dailyReport->image) {
            @unlink(public_path($dailyReport->image));
        }
        $dailyReport->delete();
        return redirect()->back()->with('success', 'Daily report deleted successfully!');
    }

    //Daily Reoprt Juz Index
    public function completeIndex()
    {
        $getStudent = Studentadmission::where('student_id', auth('student')->user()->id)->first();

        for ($i = 1; $i <= 30; $i++) {
            $juzGets = DailyReport::where('admission_id', $getStudent->id)->where('group_id', $getStudent->group_id)
                ->where('juz_number', $i)
                ->where('report_type', 1)
                ->where('teacher_review', 1)->get();
            $is_complete = $juzGets->sum('line_number') ?? 0;
            $complete_pages = $juzGets->sum('page') ?? 0;

            $juz_numbers = [
                1 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                2 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                3 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                4 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                5 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                6 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                7 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                8 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                9 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                10 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                11 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                12 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                13 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                14 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                15 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                16 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                17 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                18 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                19 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                20 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                21 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                22 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                23 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                24 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                25 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                26 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                27 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                28 => [
                    'total_lines' => 300,
                    'total_pages' => 20,
                ],
                29 => [
                    'total_lines' => 360,
                    'total_pages' => 20,
                ],
                30 => [
                    'total_lines' => 375,
                    'total_pages' => 20,
                ]
            ];
            $total_lines = $juz_numbers[$i]['total_lines'] ?? 0;
            $total_pages = $juz_numbers[$i]['total_pages'] ?? 0;
            if ($total_lines > 0) {
                $completed_percentage = ($is_complete / $total_lines) * 100;
                $remaining_percentage = 100 - $completed_percentage;
                //echo "Juz $i: Completed: " . round($completed_percentage, 2) . "%, Remaining: " . round($remaining_percentage, 2) . "%<br>";
                $data['juz'][$i] = [
                    'completed' => round($completed_percentage, 2),
                    'remaining' => round($remaining_percentage, 2),
                    'total_lines' => $total_lines,
                    'completed_lines' => $is_complete,
                    'incomplete_lines' => $total_lines - $is_complete,
                    'total_pages' => $total_pages,
                    'completed_pages' => $complete_pages,
                    'incomplete_pages' => $total_pages - $complete_pages,
                ];
            } else {
                echo "Invalid Juz Number!";
            }
        }
        //dd($data);
        return view('backend.student.dashboard.report.juz_index', $data);
    }
    public function completeIndexss()
    {
        $getStudent = Studentadmission::where('student_id', auth('student')->user()->id)->first();

        $reportTypes = [
            1 => 'Tilawat',
            2 => 'Chobok',
            3 => 'Amukhta',
        ];

        $juz_numbers = [
            1 => 300,
            2 => 300,
            3 => 300,
            4 => 300,
            5 => 300,
            6 => 300,
            7 => 300,
            8 => 300,
            9 => 300,
            10 => 300,
            11 => 300,
            12 => 300,
            13 => 300,
            14 => 300,
            15 => 300,
            16 => 300,
            17 => 300,
            18 => 300,
            19 => 300,
            20 => 300,
            21 => 300,
            22 => 300,
            23 => 300,
            24 => 300,
            25 => 300,
            26 => 300,
            27 => 300,
            28 => 300,
            29 => 360,
            30 => 375,
        ];

        foreach ($reportTypes as $type => $label) {
            for ($i = 1; $i <= 30; $i++) {
                $juzGets = DailyReport::where('admission_id', $getStudent->id)
                    ->where('group_id', $getStudent->group_id)
                    ->where('juz_number', $i)
                    ->where('report_type', $type)
                    ->where('teacher_review', 1)
                    ->get();

                $is_complete = $juzGets->sum('line_number') ?? 0;
                $total_lines = $juz_numbers[$i] ?? 0;

                if ($total_lines > 0) {
                    $completed_percentage = ($is_complete / $total_lines) * 100;
                    $data[$label]['juz'][$i] = [
                        'completed' => round($completed_percentage, 2),
                        'remaining' => round(100 - $completed_percentage, 2),
                        'total_lines' => $total_lines,
                        'completed_lines' => $is_complete,
                        'incomplete_lines' => $total_lines - $is_complete,
                    ];
                }
            }
        }

        return view('backend.student.dashboard.report.juz_index', $data);
    }
}
