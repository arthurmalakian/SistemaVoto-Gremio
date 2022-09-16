<?php

namespace App\Services\Student;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentServiceImpl implements StudentService
{
    public function getAll()
    {
        try{
            $students = Student::with('media')->orderBy('name','asc')->get();
            return response(new StudentResource($students),200);
        }catch(\Exception $exception){
            return response([
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'traceback' => $exception->getTraceAsString()
            ],500);
        }
    }

    public function get($student_id)
    {
        try{
            $student = Student::with('media')->findOrFail($student_id);
            return response(new StudentResource($student),200);
        }catch(\Exception $exception){
            return response([
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'traceback' => $exception->getTraceAsString()
            ],500);
        }
    }

    public function save($studentData,$media = null)
    {
        try {
            DB::beginTransaction();
            $student = Student::create($studentData);
            if($media != null) {
                $student->addMediaFromRequest('image')->toMediaCollection('student_image');
            }
            DB::commit();
            return response(new StudentResource($student),201);
        }catch(\Exception $exception) {
            DB::rollBack();
            return response([
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'traceback' => $exception->getTraceAsString()
            ],500);
        }
    }
    public function update($student_id,$studentData,$media = null)
    {
        try {
            DB::beginTransaction();
            $student = Student::with('media')->findOrFail($student_id);
            $student->update($studentData);

            if($media != null) {
                if(isset($student->getMedia('student_image')[0]) && $media != null){
                    $student->media[0]->delete();
                    $student->addMediaFromRequest('image')->toMediaCollection('student_image');
                }else{
                    $student->addMediaFromRequest('image')->toMediaCollection('student_image');
                }
            }
            DB::commit();
            return response(new StudentResource($student),200);
        }catch(\Exception $exception) {
            DB::rollBack();
            return response([
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'traceback' => $exception->getTraceAsString()
            ],500);
        }
    }
    public function delete($student_id)
    {
        try{
            $student = Student::with('media')->findOrFail($student_id);
            $student->delete();
            return response(new StudentResource($student),200);
        }catch(\Exception $exception){
            return response([
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'traceback' => $exception->getTraceAsString()
            ],500);
        }
    }
}
