 <?php
  
  use Illuminate\Support\Facades\DB;
  use App\Models\Invoice;
  use App\Models\School;
  use App\Models\Student;
  use App\Models\Subject;


      function prx($arr){
           echo "<pre>";
           print_r($arr);
           die();
      }
      
       function schoolsession(){
            if(Session::has('school')){
              $school=School::where('eiin',Session::get('school')->eiin)->first();
               return $school;
           }
       }
       
         function studentsession(){
             if(Session::has('student')){
                   $student=Student::where('id','=',Session::get('student')->id)->first();
                   return $student;
              }
          }
          
          function teachersession(){
               if(Session::has('teacher')){
                 $teacher=Session::get('teacher');
                 return $teacher;
             }
          }
          
           function adminsession(){
               if(Session::has('admin')){
                  $admin=School::where('eiin','=',Session::get('admin')->eiin)->first();
                 return $admin;
             }
          }
          
          
          
         function fullsubname($shortname){
        $exam=DB::table('exams')->where('babu','shortsubject')->where('text1',$shortname)->first();
        return $exam->text2;
    }

       

      function studentinfo($uid,$find){
           $student=DB::table('students')->where('id',$uid)->first();
           if($student){
               return $student->$find;
           }else{
               return '';
           }  
       }
       
       
         function subjectinfo($subid,$find,$eiin){
            $sub=DB::table('subjects')->where('subid',$subid)->where('eiin',$eiin)->first();
            return $sub->$find;
        }
       
        
      function schoolinfo($eiin,$find){
            $school=DB::table('schools')->where('eiin',$eiin)->first();
            return $school->$find;
       }

       function examName($serial){
          $exam=DB::table('exams')->where('babu','exam')->where('serial',$serial)->first();
          return $exam->text2;
       }

       function examNameDes($serial){
           $exam=DB::table('exams')->where('babu','exam')->where('serial',$serial)->first();
           return $exam->text3;
       }


      function groupName($serial,$text){
           $exam=DB::table('exams')->where('babu','group')->where('serial',$serial)->first();
           return $exam->text;
      }

      function shift($section,$eiin){
           $shift=DB::table('shifts')->where('eiin',$eiin)->where('section',$section)->first();
           return $shift->shift;
       }

  
      function atten($uid,$month,$year){
         $atten=DB::table('attens')->where('uid',$uid)->where('month',$month)->where('year',$year)->orderBy('day','asc')->get();
         return $atten;
      }


        function student($class,$babu,$section){
             $student=DB::table('students')->where('babu',$babu)->where('class',$class)->where('section',$section)
             ->where('eiin',Session::get('school')->eiin)->get();   
             return $student;
         }
         
     function subjectshow($subcode,$class,$babu,$eiin){
        $data=DB::table('subjects')->where('subcode',$subcode)->where('class',$class)->where('babu',$babu)->where('eiin',$eiin)->first();
         
         if(empty($data)){
            return '';  
         }else{
            return 
                [
                 'cstatus'=>$data->cstatus,
                 'mstatus'=>$data->mstatus,
                 'pstatus'=>$data->pstatus, 
                ];  
            }
          
        }
   
    

      function teacher_access($tecode,$subjectauth){   
        foreach($subjectauth as $row) {
          if($tecode==$row->tecode){
                 return 
                    [
                      'tecode'=>$row->tecode,
                      'lavel'=>$row->lavel 
                    ];    
             }
          }
       }


       function fin_access($fincode,$finauth){   
        foreach($finauth as $row) {
          if($fincode==$row->facode){
                 return 
                    [
                      'facode'=>$row->facode,  
                    ];    
             }
          }
       }


       function  paymentinfo(){ 
        $paymentinfo=DB::table('paymentinfos')
        ->where('eiin',Session::get('school')->eiin)->where('section',Session::get('section'))->get();
        return $paymentinfo;
       }


     

 function  gpa($subc,$cfail,$subm,$mfail,$subp,$pfail,$total,$markinfo,$tmark){         
   if($subc<$cfail){
       return 0;
     }else{
        if($subm<$mfail){
            return 0;
        }else{
           if($subp<$pfail){
            return 0;
            }else{
              foreach($markinfo as $y){
               if($total>=($y->start*$tmark)/100 && $total<($y->end*$tmark)/100){
                return $y->gpa;
                }
             }
           }
        }
     }
   }


   
   function  grade($subc,$cfail,$subm,$mfail,$subp,$pfail,$total,$markinfo,$tmark){         
     if($subc<$cfail){
        return 'F';
       }else{
        if($subm<$mfail){
            return 'F';
         }else{
           if($subp<$pfail){
            return 'F';
             }else{
              foreach($markinfo as $y){
                if($total>=($y->start*$tmark)/100 && $total<($y->end*$tmark)/100){
                    return $y->grade;
                }
              }
            }
         }
      }
    }








function  gpa12($subc,$cfail,$subm,$mfail,$total,$markinfo,$tmark){ 

   if($subc<$cfail){
          return 0;
   }else{
     if($subm<$mfail){
         return 0;
     }else{
           foreach($markinfo as $y){
            if($total>=($y->start*$tmark)/100 && $total<($y->end*$tmark)/100){
             return $y->gpa;
             }
        }
     }
  }
}



 function  grade12($subc,$cfail,$subm,$mfail,$total,$markinfo,$tmark){ 

   if($subc<$cfail){
         return 'F';
   }else{
     if($subm<$mfail){
        return 'F';
     }else{
          foreach($markinfo as $y){
           if($total>=($y->start*$tmark)/100 && $total<($y->end*$tmark)/100){
            return $y->grade;
            }
        }
      }
    }
  }



  function  gpa14($subc,$cfail,$total,$markinfo,$tmark){ 
    if($subc<$cfail){
           return 0;
    }else{
       foreach($markinfo as $y){
          if($total>=($y->start*$tmark)/100 && $total<($y->end*$tmark)/100){
                 return $y->gpa;
           } 
        }
      }
   }


   function  grade14($subc,$cfail,$total,$markinfo,$tmark){ 
    if($subc<$cfail){
           return 0;
     }else{
       foreach($markinfo as $y){
          if($total>=($y->start*$tmark)/100 && $total<($y->end*$tmark)/100){
                 return $y->grade;
            } 
          }
       }
    }
    
    
      function gradefinal($gpa,$markinfo){
        foreach($markinfo as $y){
           if($gpa>=$y->gpa && $gpa<$y->gparange){
             return $y->grade;
         }
       }
     }



     function sms_send($phonearr,$text) {
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "C6P8TG4mnTDDGLHosLeZ";
        $senderid = 8809617613072;
        $number = '88'.$phonearr;
        $message = $text;
     
        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $number,
            "message" => $message,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    
    function get_balance() {
      $url = "http://bulksmsbd.net/api/getBalanceApi";
      $api_key ="C6P8TG4mnTDDGLHosLeZ";
      $data = [
          "api_key" => $api_key
      ];
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $response = curl_exec($ch);
      curl_close($ch);
      return $response;
    }
                  



      function funsubname($class,$babu,$subcode1,$eiin){
        $subject=Subject::where('babu',$babu)->where('class',$class)->where('subid',$subcode1)->where('eiin',$eiin)->get();
        foreach($subject as $key => $item){
            return  '**'.$item['subject'].', ';
      };
    }
    
    
    function funsuncode($class,$babu,$subcode,$eiin){
        if($subcode!=0){
            $data=explode(',',$subcode);	
             $subname='';
              foreach($data as $row){
                  $subname.=funsubname($class,$babu,$row,$eiin);                
              }
               return $subname;
             
           }else{
              return '';
          }
        }



   
   
    function matchsubcode($subcode,$subids){
              for($x=0;$x<count($subids)-1;$x++){
                 if($subcode==$subids[$x]){
                      return 'Yes';
                   }
               }                                  
         }



    function convertNumber($number)
    {
        $integer=$number;
    
        $output = "";
    
        if($integer[0]== "-")
        {
            $output = "negative ";
            $integer    = ltrim($integer, "-");
        }
        else if ($integer[0] == "+")
        {
            $output = "positive ";
            $integer    = ltrim($integer, "+");
        }
    
        if ($integer[0] == "0")
        {
            $output .= "zero";
        }
        else
        {
            $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
            $group   = rtrim(chunk_split($integer, 3, " "), " ");
            $groups  = explode(" ", $group);
    
            $groups2 = array();
            foreach ($groups as $g)
            {
                $groups2[] = convertThreeDigit($g[0], $g[1], $g[2]);
            }
    
            for ($z = 0; $z < count($groups2); $z++)
            {
                if ($groups2[$z] != "")
                {
                    $output .= $groups2[$z] . convertGroup(11 - $z) . (
                            $z < 11
                            && !array_search('', array_slice($groups2, $z + 1, -1))
                            && $groups2[11] != ''
                            && $groups[11][0] == '0'
                                ? " and "
                                : ", "
                        );
                }
            }
    
            $output = rtrim($output, ", ");
        }
    
       
    
        return $output;
    }
    
    function convertGroup($index)
    {
        switch ($index)
        {
            case 11:
                return " decillion";
            case 10:
                return " nonillion";
            case 9:
                return " octillion";
            case 8:
                return " septillion";
            case 7:
                return " sextillion";
            case 6:
                return " quintrillion";
            case 5:
                return " quadrillion";
            case 4:
                return " trillion";
            case 3:
                return " billion";
            case 2:
                return " million";
            case 1:
                return " thousand";
            case 0:
                return "";
        }
    }
    
    function convertThreeDigit($digit1, $digit2, $digit3)
    {
        $buffer = "";
    
        if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0")
        {
            return "";
        }
    
        if ($digit1 != "0")
        {
            $buffer .= convertDigit($digit1) . " hundred";
            if ($digit2 != "0" || $digit3 != "0")
            {
                $buffer .= " and ";
            }
        }
    
        if ($digit2 != "0")
        {
            $buffer .= convertTwoDigit($digit2, $digit3);
        }
        else if ($digit3 != "0")
        {
            $buffer .= convertDigit($digit3);
        }
    
        return $buffer;
    }
    
    function convertTwoDigit($digit1, $digit2)
    {
        if ($digit2 == "0")
        {
            switch ($digit1)
            {
                case "1":
                    return "ten";
                case "2":
                    return "twenty";
                case "3":
                    return "thirty";
                case "4":
                    return "forty";
                case "5":
                    return "fifty";
                case "6":
                    return "sixty";
                case "7":
                    return "seventy";
                case "8":
                    return "eighty";
                case "9":
                    return "ninety";
            }
        } else if ($digit1 == "1")
        {
            switch ($digit2)
            {
                case "1":
                    return "eleven";
                case "2":
                    return "twelve";
                case "3":
                    return "thirteen";
                case "4":
                    return "fourteen";
                case "5":
                    return "fifteen";
                case "6":
                    return "sixteen";
                case "7":
                    return "seventeen";
                case "8":
                    return "eighteen";
                case "9":
                    return "nineteen";
            }
        } else
        {
            $temp = convertDigit($digit2);
            switch ($digit1)
            {
                case "2":
                    return "twenty-$temp";
                case "3":
                    return "thirty-$temp";
                case "4":
                    return "forty-$temp";
                case "5":
                    return "fifty-$temp";
                case "6":
                    return "sixty-$temp";
                case "7":
                    return "seventy-$temp";
                case "8":
                    return "eighty-$temp";
                case "9":
                    return "ninety-$temp";
            }
        }
    }
    
    function convertDigit($digit)
    {
        switch ($digit)
        {
            case "0":
                return "zero";
            case "1":
                return "one";
            case "2":
                return "two";
            case "3":
                return "three";
            case "4":
                return "four";
            case "5":
                return "five";
            case "6":
                return "six";
            case "7":
                return "seven";
            case "8":
                return "eight";
            case "9":
                return "nine";
        }
    }
    
    https://rapidapi.mimsms.com/smsapi?apikey=b4a4c64054d026c8239a8484710afadf&sender=8809617612066&msisdn=01750360044&smstext=(Message Content)

?>
