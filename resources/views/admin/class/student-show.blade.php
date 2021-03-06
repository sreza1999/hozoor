@extends('layouts.admin')
@section('content')
    <div class="card-header card-header-tabs  blue wow fadeInLeft">

        <div class="card-title text-right text-white">
            <span style="font-family: Sahel;font-size: 20px; font-weight: normal"> جدول دانش آموزان  <i
                    class="fas fa-user-plus"></i> </span>

            <div class="clearfix d-md-none"></div>

        </div>
    </div>
    <div class="card-body" dir="rtl">

        <div class="container-fluid table-responsive" dir="rtl">
            <form action="{{route('multiDelete')}}" method="post">
                @csrf
                <table class="table  text-center">

                    <input type="hidden" name="class_id" value="{{$class_id}}">
                    <thead>
                    <tr>
                        <th style="font-family: Sahel;font-weight: bolder">ردیف</th>
                        <th style="font-family: Sahel;font-weight: bolder">نام</th>
                        <th style="font-family: Sahel;font-weight: bolder">نام خانوادگی</th>
                        <th style="font-family: Sahel;font-weight: bolder">نام پدر</th>
                        <th style="font-family: Sahel;font-weight: bolder">شماره ملی</th>
                        <th style="font-family: Sahel;font-weight: bolder">تاریخ تولد</th>
                        <th style="font-family: Sahel;font-weight: bolder">تاریخ ورود</th>
                        <th style="font-family: Sahel;font-weight: bolder">مقطع</th>
                        <th style="font-family: Sahel;font-weight: bolder">ویرایش</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        @foreach($student->users as $user)
                            <tr>
                                <td><input type="checkbox" value="{{$student->id}}" name="studentsId[]"></td>
                                <td style="font-family:Sahel;;font-weight: normal">{{$num++}}</td>
                                <td style="font-family: Sahel;font-weight: normal">{{$user->first_name}}</td>
                                <td style="font-family: Sahel;font-weight: normal">{{$user->last_name}}</td>
                                <td style="font-family: Sahel;font-weight: normal">{{$student->dad_name}}</td>
                                <td style="font-family: Sahel;font-weight: normal">{{$user->code}}</td>
                                <td style="font-family: Sahel;font-weight: normal">{{$student->birth_day}}</td>
                                <td style="font-family: Sahel;font-weight: normal">{{$student->entry_date}}</td>
                                <td style="font-family: Sahel;font-weight: normal">{{$student->grade->name}}</td>
                                {{--                                <td>--}}
                                {{--                                    <form method="post" action="{{route('oneStudentAttendance',$student->id)}}">--}}
                                {{--                                        @csrf--}}
                                {{--                                        <input type="hidden" name="class_id" value="{{$class->id}}">--}}
                                {{--                                        <input class="btn btn-info" value="وضعیت--}}
                                {{--                                    حضور--}}
                                {{--                                    و غیاب" type="submit">--}}
                                {{--                                    </form>--}}

                                {{--                                </td>--}}
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
                <input type="submit" class="btn btn-danger" value="حذف از کلاس">

            </form>

        </div>
    </div>


@endsection
