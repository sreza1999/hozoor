@extends('layouts.admin')
@section('content')
    <!-- Extended material form grid -->
    <div class="card-header card-header-tabs  blue wow fadeInLeft">

        <div class="card-title text-right text-white">
            <span style="font-family: Sahel;font-size: 20px; font-weight: normal"> <i
                    class="fas fa-user-plus"></i> ویرایش  دانش آموز   </span>

            <div class="clearfix d-md-none"></div>

        </div>
    </div>

    <div class="card-body" dir="rtl">
        <form method="post" action="{{route('student.update',$student->id)}}">
            <!-- Grid row -->
            @csrf
            @method('PATCH')
            <div class="form-row">
                <div class="col-md-6 ">
                    <!-- Material input -->

                    <div class=" form-group">
                        <label class=" col-12 text-right"
                               style="font-family: Sahel;font-weight: bold;color: black">نام</label>
                        @foreach($users as $user)

                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                   name="first_name" value="{{$user->first_name}}">
                            @error('first_name')
                            <div class="alert alert-danger text-right"
                                 style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                            @enderror
                        @endforeach
                    </div>
                </div>
                <!-- Grid column -->
                <div class="col-md-6 " dir="rtl">
                    <!-- Material input -->
                    <div class="form-group">
                        <label for="input-char-counter" class=" col-12 text-right"
                               style="font-family: Sahel;font-weight: bold;color: black"> نام
                            خانوادگی </label>
                        @foreach($users as $user)
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                   id="input-char-counter" name="last_name" value="{{$user->last_name}}">
                            @error('last_name')
                            <div class="alert alert-danger text-right"
                                 style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                            @enderror
                        @endforeach


                    </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
            </div>
            <!-- Grid row -->
            <div class="form-row">
                <!-- Grid column -->
                <div class="col-md-6">
                    <!-- Material input -->
                    <div class=" form-group">
                        <label for="inputAddressMD" class=" col-12 text-right"
                               style="font-family: Sahel;font-weight: bold;color: black">شماره ملی</label>
                        @foreach($users as $user)
                            <input type="text" class="form-control @error('code') is-invalid @enderror"
                                   id="inputAddressMD" name="code" value="{{$user->code}}">
                            @error('code')
                            <div class="alert alert-danger text-right"
                                 style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                            @enderror
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Material input -->
                    <div class=" form-group">
                        <label for="inputAddressMD" class=" col-12 text-right"
                               style="font-family: Sahel;font-weight: bold;color: black">مقطع</label>
                        <select class="browser-default custom-select" name="grade_id">
                            <option value="{{$student->grade_id}}" selected>{{$student_grade->name}}</option>
                            @foreach($grades as $grade)
                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                            @endforeach
                        </select>
                        @error('grade_id')
                        <div class="alert alert-danger text-right"
                             style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->

                <div class="col-md-6">
                    <!-- Material input -->
                    <div class="form-group">
                        <label for="inputCityMD" class=" col-12 text-right @error('dad_name') is-invalid @enderror"
                               style="font-family: Sahel;font-weight: bold;color: black">نام پدر</label>

                        <input type="text" class="form-control" id="inputCityMD" name="dad_name"
                               value="{{$student->dad_name}}">
                        @error('dad_name')
                        <div class="alert alert-danger text-right"
                             style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Material input -->
                    <div class=" form-group">
                        <label for="inputAddress2MD" class=" col-12 text-right"
                               style="font-family: Sahel;font-weight: bold;color: black"> تاریخ ورود</label>

                        <input type="text"
                               class="form-control @error('entry_date') is-invalid @enderror formatter-example"
                               id="inputAddress2MD" name="entry_date"
                               value="{{$student->entry_date}}"
                        >
                        @error('entry_date')
                        <div class="alert alert-danger text-right"
                             style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Material input -->
                    <div class=" form-group">
                        <label for="inputAddress2MD" class=" col-12 text-right"
                               style="font-family: Sahel;font-weight: bold;color: black"> تاریخ تولد</label>

                        <input type="text"
                               class="form-control @error('birth_day') is-invalid @enderror  formatter-example"
                               id="inputAddress2MD" name="birth_day"
                               value="{{$student->birth_day}}"
                        >
                        @error('birth_day')
                        <div class="alert alert-danger text-right"
                             style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <!-- Grid column -->
            </div>
            {{--            <!-- Grid row -->--}}
            {{--                        <input type="submit" class="btn btn-outline-warning"--}}
            {{--                               style="font-family: Sahel;font-weight: bolder;"--}}
            {{--                               value="انصراف">--}}
            <input type="submit" class=" btn btn-6 btn-6f"
                   style="font-family: Sahel;font-weight: bolder; color: white"
                   value="ویرایش">
        </form>

    </div>
    <!-- Extended material form grid -->
@endsection
