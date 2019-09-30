<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Http\Requests\RoomEditRequest;
use App\Http\Requests\RoomRequest;
use App\Manager;
use App\Room;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $data = $request->all();
        $manager = Manager::find(1);
        $manager->room()->create($data);
        return redirect('/class/show');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manager = Manager::find(1);
        $grades = $manager->grade()->get();
        $classes = $manager->room()->get();
        $teachers = $manager->teacher()->get();
        $students = $manager->student()->get();
        $num = 1;
        return view('class.index', compact('classes', 'grades', 'num', 'teachers', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomEditRequest $request, $id)
    {
        $data = $request->all();
        $class = Room::find($id);
        $class->update($data);
        return redirect('/class/show');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Room::find($id);
        $class->delete();
        return redirect('/class/show');
    }

    public function addStudent(Request $request)
    {
        $studentId = $request->student_id;
        $roomId = $request->room_id;
        $student = Student::find($studentId);
        $room = Room::find($roomId);
        $room->students()->save($student);
        return redirect('/class/show');

    }

    public function showClassStudent(Request $request)
    {
        $id = $request->room_id;
        $class = Room::find($id);
        $students = $class->students()->get();
        $num = 1;
        return view('student.index', compact('students', 'num'));
    }

    public function gradeClass(Request $request)
    {
        $id = $request->grade_id;
        $grade = Grade::find($id);
        $classes = $grade->room()->get();
        $students = $grade->student()->get();
        $teachers = Teacher::all()->where('manager_id', '=', 1);
        $num = 1;
        return view('class.grade-index', compact('classes', 'grade', 'num', 'students', 'teachers'));
    }

    public function teacherClass(Request $request)
    {
        $id = $request->teacher_id;
        $teacher = Teacher::find($id);
        $classes = $teacher->room()->get();
        $students = Student::all()->where('manager_id', '=', 1);
        $grades = Grade::all()->where('manager_id', '=', 1);
        $num = 1;
        return view('class.teacher-class', compact('classes', 'grades', 'num', 'students', 'teacher'));
    }
}
