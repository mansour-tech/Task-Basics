<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()        //لعمل مصادقة لصفحة محدد لها وراجع درس إنشاء استمارة
    {
        $this->middleware('auth'); //نحن نريد مصادقة فقط من كنترول فقط تبع الانشاء مقاله
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = Auth::user()->tasks()->get();
        return view('task.index', ['tasks' => $result, 'image' => Auth::user()->image]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->Validator($request->all())->validate();  /*  validate للتحقق من المدخلات */
        /* Validator() دالة معرفة إسفل المستند اختصار العمل  */

        /* لحفظ البيانات الخاصة بجدول المهام عندما إنشانا العلاقة بين نماذج البيانات */
      if (Auth::user()->tasks()->create($request->all())) {
          return $this->sucessFunction();
      }
/*       تفسير لدالة آف 
      المستخدم الذي يتم مصادقة علية داخل قاعدة البيانات اسمح لك بإنشاء 
      (tasks = اسم الجدول الذي في قاعدة البيانات (نموذج البيانات  
      اسمح له لكل الحقول محددة في دالة فلديتور الذي بإسفل المستندوالذي تم الإشارة 
      عليها عبر هذا الكود
      $this->Validator($request->all())->validate(); 

      في الاخير إعمل لي لاعادة دالة اندكس لعرض محتواها */


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
        return view('task.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //دالة تقبل متغيرين الاول متغير بيانات الطلب الذي يتم تمريرة من بيانات تعديل مهمة
        //متغير الثاني الذي يمثل المهمة الذي سيتم تمريرها من نموذج البيانات ويتكفل اطار العمل بالبحث عن مهمة في قاعدة البيانات  باستخدام معرف المهمة ويتم في الاخير الاحق النتائج في مغير تاسك 
       /*  نمرر دالة فالديت حتى نتاكد بان حقول غير فارغة وتاكد من صحة المدخلات  */
       $this->editValidator($request->all())->validate();
       /*fill تقوم بتحديث بيانات الطلب باستخدام بيانات الطلب
         لتحديث سجل في قاعدة البيانات  */
        if($task->fill($request->all())->save()){
            return $this->show($task);/* عرض بيانات مهمة عبر دالة شو الذي نمرر لها متغير تاسك الذي يحمل معرف مقالة  */
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
        if($task->delete()){
            /* return $this->index(); */
            return back();
        } else {
            dd('Not Deleted');
        }
    }
    private function validator(array $request)
    {
        return Validator::make($request,[
            'task' => 'required',
            'slug' => 'required|alpha_dash|unique:tasks',
            'description' => 'required',
            'category' => 'required',
        ]);
    }
    private function editValidator(array $request){
        return Validator::make($request, [
            'task' => 'required',
            'slug' => 'required|alpha_dash|unique:tasks,user_id,'.Auth::id(),
            'description' => 'required',
            'category' => 'required'
        ]);
    }
    public function sucessFunction(){
        return view('task.sucess');
    }
}
