<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\SaveStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Services\Student\StudentServiceImpl as StudentService;
use Illuminate\Http\Request;

class StudentsController extends Controller
{

    private $studentService;

    public function __construct()
    {
        $this->studentService = new StudentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->studentService->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveStudentRequest $request)
    {
        $studentData = $request->only('name','cpf');
        return $this->studentService->save($studentData,$request->image);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->studentService->get($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, $id)
    {
        $studentData = $request->only('name','cpf');
        return $this->studentService->update($id,$studentData,$request->image);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->studentService->delete($id);
    }
}
