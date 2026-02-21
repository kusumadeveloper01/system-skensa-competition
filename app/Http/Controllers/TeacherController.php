<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\CompetitionRegistration;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function dashboard()
    {
        $teacher = Auth::guard('teacher')->user();
        
        // Statistik siswa
        $totalStudents = Student::where('teacher_id', $teacher->id)->count();
        
        // Statistik kompetisi
        $activeCompetitions = Competition::where('status', 'active')
            ->where('registration_end_date', '>=', now())
            ->count();
        
        $upcomingCompetitions = Competition::where('status', 'active')
            ->where('start_date', '>', now())
            ->count();
        
        // Siswa yang terdaftar kompetisi bulan ini
        $studentsRegisteredThisMonth = CompetitionRegistration::whereHas('student', function($query) use ($teacher) {
            $query->where('teacher_id', $teacher->id);
        })
        ->whereMonth('date', now()->month)
        ->whereYear('date', now()->year)
        ->distinct('student_id')
        ->count('student_id');
        
        // Total pendaftaran kompetisi dari siswa guru ini
        $totalRegistrations = CompetitionRegistration::whereHas('student', function($query) use ($teacher) {
            $query->where('teacher_id', $teacher->id);
        })->count();
        
        // Kompetisi yang paling banyak diikuti siswa
        $popularCompetitions = Competition::withCount(['registrations' => function($query) use ($teacher) {
            $query->whereHas('student', function($q) use ($teacher) {
                $q->where('teacher_id', $teacher->id);
            });
        }])
        ->orderBy('registrations_count', 'desc')
        ->take(5)
        ->get();
        
        // Pendaftaran terbaru dari siswa
        $recentRegistrations = CompetitionRegistration::with(['student', 'competition'])
            ->whereHas('student', function($query) use ($teacher) {
                $query->where('teacher_id', $teacher->id);
            })
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
        
        // Kompetisi yang sedang berlangsung
        $ongoingCompetitions = Competition::where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->where('status', 'active')
            ->get();
        
        return view('teacher.dashboard', compact(
            'totalStudents',
            'activeCompetitions',
            'upcomingCompetitions',
            'studentsRegisteredThisMonth',
            'totalRegistrations',
            'popularCompetitions',
            'recentRegistrations',
            'ongoingCompetitions'
        ));
    }
    
    public function students()
    {
        $teacher = Auth::guard('teacher')->user();
        $students = Student::where('teacher_id', $teacher->id)
            ->withCount('competition_registration')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('teacher.students.index', compact('students'));
    }
    
    public function studentDetail($id)
    {
        $teacher = Auth::guard('teacher')->user();
        $student = Student::where('teacher_id', $teacher->id)
            ->where('id', $id)
            ->with(['competition_registration.competition'])
            ->firstOrFail();
        
        return view('teacher.students.detail', compact('student'));
    }
    
    public function competitions()
    {
        $competitions = Competition::with('competition_type')
            ->where('status', 'active')
            ->orderBy('start_date', 'desc')
            ->get();
        
        return view('teacher.competitions.index', compact('competitions'));
    }
    
    public function competitionDetail($id)
    {
        $teacher = Auth::guard('teacher')->user();
        $competition = Competition::with(['competition_type', 'topic_categories'])
            ->findOrFail($id);
        
        // Siswa guru ini yang mengikuti kompetisi ini
        $registeredStudents = CompetitionRegistration::with('student')
            ->where('competition_id', $id)
            ->whereHas('student', function($query) use ($teacher) {
                $query->where('teacher_id', $teacher->id);
            })
            ->get();
        
        return view('teacher.competitions.detail', compact('competition', 'registeredStudents'));
    }
}
