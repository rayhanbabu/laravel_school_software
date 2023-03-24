<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\SubjectAuth;
use App\Models\Student;
use App\Models\Exam;
use Illuminate\Support\Facades\File;
use DB;
use Session;

class TeacherController extends Controller
{

         function teacher()
          {
            $school=schoolsession();     
            $result['data']=Teacher::where('eiin',$school->eiin)->get();
            return view('school.teacher',$result); 
          }


          public function manage_teacher(Request $request ,$id='')
          {
              if($id>0){
                  $arr=Teacher::where(['id'=>$id])->get();
                  $result['name']=$arr['0']->name;
                  $result['phone']=$arr['0']->phone;
                  $result['email']=$arr['0']->email;
                  $result['desig']=$arr['0']->desig;
                  $result['atten_section']=$arr['0']->atten_section;
                  $result['atten_babu']=$arr['0']->atten_babu;
                  $result['atten_class']=$arr['0']->atten_class;
                  $result['teacher_fin_access']=$arr['0']->teacher_fin_access;
                  $result['teacher_password']=$arr['0']->teacher_password;
                  $result['teacher_userid']=$arr['0']->teacher_userid;
                  $result['id']=$arr['0']->id;
                  $result['class']=Exam::where('babu','class')->orderBy('serial','asc')->get();
                  $result['group']=Exam::where('babu','group')->orderBy('serial','asc')->get();
                  $result['sectionarr']=DB::table('exams')->where('babu','section')->get();
                  $result['lavel']=DB::table('exams')->where('babu','shortsubject')->orderBy('serial','desc')->get();
                  $result['teacherattr']=DB::table('subjectauths')->where('teacher_id',$arr['0']->id)->get();
                  $result['subject']=Subject::where('eiin',Session::get('school')->eiin)->orderBy('subid','asc')->get();
              
              }else{
                  $result['name']='';
                  $result['phone']='';
                  $result['email']='';
                  $result['desig']='';
                  $result['atten_section']='';
                  $result['atten_babu']='';
                  $result['atten_class']='';
                  $result['teacher_fin_access']='';
                  $result['teacher_password']='';
                  $result['teacher_userid']='';
                  $result['id']='';
                  $result['teacherattr'][0]['section']='';
                  $result['teacherattr'][0]['lavel']='';
                  $result['teacherattr'][0]['subcode']='';
                  $result['teacherattr'][0]['id']='';
                  $result['class']=Exam::where('babu','class')->orderBy('serial','asc')->get();
                  $result['group']=Exam::where('babu','group')->orderBy('serial','asc')->get();
                  $result['sectionarr']=DB::table('exams')->where('babu','section')->get();
                  $result['lavel']=DB::table('exams')->where('babu','shortsubject')->orderBy('serial','desc')->get();
                  $result['subject']=Subject::where('eiin',Session::get('school')->eiin)->orderBy('subid','asc')->get();


                   //  prx($result['teacherattr']);
                   //  die();
              }
            
              return view('school.teacher_manage',$result);
          }



          public function teacher_product_process(Request $request)
          {
      
                    // prx($_POST);
                     // die();
                     $school=schoolsession();

                   $request->validate([
                         'name'=>'required',
                         'email'=>'required|unique:teachers,email,'.$request->post('id'),
                         'phone'=>'required|unique:teachers,phone,'.$request->post('id'),
                   ]);

           
                  if($request->post('id')>0){
                         $model=Teacher::find($request->post('id'));
                         $msg="Teacher updated";

                         $model->atten_class=$request->post('atten_class');
                         $model->atten_babu=$request->post('atten_babu');
                         $model->atten_section=$request->post('atten_section');
                         $model->teacher_fin_access=$request->post('teacher_fin_access');
                        
                   }else{

                     $data_select=Teacher::where('eiin',$school->eiin)->get();
                     if($data_select->count('id')>0){
                           $max=substr($data_select->max('teacher_userid'),6,2);
                           $userid=$school->eiin*100+$max+1;
                     }else{
                        $userid=$school->eiin*100+1;
                     }

                      $model=new Teacher();
                      $msg="Teacher inserted";
                      $model->teacher_userid=$userid;
                   }
      
               $model->name=$request->post('name');
               $model->phone=$request->post('phone');
               $model->email=$request->post('email');
               $model->desig=$request->post('desig');
               $model->eiin=$school->eiin;
               $model->status=1;
               $model->teacher_password=$request->post('teacher_password');
               $model->save();

               $teacher_id=$model->id;
               
             /* Tecaaher Attribute  Start*/
                 $taid=$request->post('taid');
                 $section=$request->post('section');
                 $lavel=$request->post('lavel');
                 $tecode=$request->post('tecode');
                 $subcode=$request->post('subcode');
                    foreach($section as $key=>$val){

                     $teacherattr['teacher_id']=$teacher_id; 
                     $teacherattr['section']=$section[$key]; 
                     $teacherattr['subcode']=$subcode[$key]; 
                     $teacherattr['tecode']=$subcode[$key].$section[$key]; 
                     $teacherattr['eiin']=$school->eiin; 
                     $teacherattr['lavel']=$lavel[$key];  
                        
                     if($taid[$key]!=''){
                        DB::table('subjectauths')->where(['id'=>$taid[$key]])->update($teacherattr);
                     }else{
                        DB::table('subjectauths')->insert($teacherattr);
                     }

                     }

             /* Teacher Attribute End*/

               $request->session()->flash('message',$msg);
              return redirect('teacher');
          }



          public function delete(Request $request , $id)
          {
            
              $model=Teacher::find($id);
              $model->delete();
              DB::table('subjectauths')->where(['teacher_id'=>$id])->delete();
              $request->session()->flash('message','Teacher deleted');
              return redirect('teacher');
          }


          public function teacher_attr_delete(Request $request ,$taid, $id)
           {
               $model=SubjectAuth::find($taid);
               $model->delete();
               return back()->with('success','Teacher Subject access Delete Successful'); 
              // return redirect('school/manage_teacher/'.$id);
             }


        public function teacherstatus($type,$status,$id){
            if($status=='deactive'){
                   $status1=0;
              }else{
                    $status1=1;
                }
           if($type=='status'){ 
             DB::update(
              "update teachers set status ='$status1' where id = '$id'"
             );  
             return back()->with('success','Status change Successful'); 
            }
         }    
         
         
         public function teacherallstatus(Request $request){
            $status=$request->input('status');
           $eiin=Session::get('school')->eiin; 
     
              DB::update(
                  "update teachers set status ='$status' where eiin='$eiin' "
                 );  
                 return back()->with('success','Admin All Status change Successful'); 
         }  



         function loginview(){
            return view('school.teacherlogin');
            }

            public function teacherlogin(Request $request){
              $request->validate([
                   'teacher_userid'=>'required',
                   'teacher_password'=>'required',
             ]);
             
               $status=1;
               $sectionarr=DB::table('exams')->where('babu','section')->get();
               $teacher=DB::table('teachers')->where('teacher_userid','=',$request->teacher_userid)->first();
               if($teacher){
                 if($request->teacher_password==$teacher->teacher_password){
                    if($teacher->status==$status){
                     $request->session()->put('teacher',$teacher);
                     $request->session()->put('section','A');
                     $request->session()->put('sectionarr',$sectionarr);
                   return redirect('/dashboard');
                 }else{
                    return back()->with('fail','Account Deactive');
                 }
              }else{
                  return back()->with('fail','Incorrect Password');
              }
              }else{
                 return back()->with('fail','Incorrect Teacher ID');
              }
        
          }


          public function teacherlogout(){
            if(Session::has('teacher')){
                Session::pull('teacher');
               return redirect('/teacherlogin');
            }
           }
       


           function password(){
            
            $teacher=teachersession();
           return view('school.teacher_password',['teacher'=>$teacher]); 
            //return 'rayhan';
         }
         
         
         
         function passwordedit(Request $request)
         {
            $email=$request->input('email');
            $n_pass=$request->input('n_pass');
            $c_pass=$request->input('c_pass');
             $teacher=teachersession();
             if($email == $teacher->email){
                if($n_pass==$c_pass){
                   $password= Teacher::find($teacher->id);
                   //$password->password=Hash::make($npass);
                   $password->teacher_password=$n_pass;
                   $password->update();
                   return redirect('/teacher/teacher_password')->with('success','Passsword change  successfully');
                }else{
                return back()->with('fail','New Password and Confirm Password does not match');
             }
            }else{
             return back()->with('fail','Invalid E-mail');
         }
             
         }
         

}
