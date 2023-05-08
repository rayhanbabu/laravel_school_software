@extends('school/schoolheader')
@section('admitindex','active')
@section('content')

<div class="row mt-3 mb-0 mx-2">
               <div class="col-6"> <h4 class="mt-0">Exam Routine , Section : {{Session::get('section')}} </h4></div>
                     <div class="col-3">
                         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            
                         </div>
                     </div>
                     <div class="col-3">
                         <div class="d-grid gap-2 d-md-flex "> 
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i
                class="bi-plus-circle me-2"></i>Add</button>  

              </div>
        </div> 
 </div> 


 <div class="table-responsive">
           <div class="card-body" id="show_all_employees">
                    
                    <h1 class="text-center text-secondary my-5">Loading...</h1>
                
              </div>
     </div>


 {{-- add new Student modal start --}}
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  method="POST" id="add_employee_form" enctype="multipart/form-data">

        <div class="modal-body p-4 bg-light">
          <div class="row">


             <div class="col-lg-4 my-2">
               <label for="lname">Class <span style="color:red;"> * </span></label>
                <select class="form-select" name="class" id="class" aria-label="Default select example"  required >
                             <option  value="">Select One </option>
                             @foreach($classrow as $row)
                                  <option value="{{$row->text1}}">{{$row->text2}}</option>
                                 @endforeach
               </select>
            </div>

            <div class="col-lg-4 my-2">
              <label for="lname">Group <span style="color:red;"> * </span></label>
                  <select class="form-select" name="babu" id="babu" aria-label="Default select example" required  >
                         <option   value="">Select One </option>
                              @foreach($grouprow as $row)
                                  <option value="{{$row->text1}}">{{$row->text2}}</option>
                                 @endforeach         
                  </select>
            </div>

            <div class="col-lg-4 my-2">
              <label for="name"></label>
              <input type="hidden" name="time" id="time" value="434" class="form-control" placeholder=""  required>
            </div>

            <div class="col-lg-1 my-2">
              <label for="roll">Serial</label>
               <p>1</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <label for="roll">Date(yyyy-mm-dd)</label>
              <input type="text"  id="date1" name="date1" autocomplete="off"  class="form-control datepicker" readonly>
            </div>

            <div class="col-lg-4 my-2">
              <label for="roll">Exam Time[10.00AM-1.00PM]</label>
              <input type="text"  id="time1" name="time1"   class="form-control " >
            </div>

            <div class="col-lg-4 my-2">
              <label for="name">Name od Subject</label>
              <select class="form-select" name="sub1" id="sub1" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>


             <div class="col-lg-1 my-2">
               <p>2</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="date2" name="date2" autocomplete="off"  class="form-control datepicker" readonly>
             </div>

             <div class="col-lg-4 my-2">
              <input type="text"  id="time2" name="time2"   class="form-control " >
            </div>

            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub2" id="sub2" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>


            <div class="col-lg-1 my-2">
               <p>3</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="date3" name="date3" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                 <input type="text"  id="time3" name="time3"   class="form-control " >
            </div>  
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub3" id="sub3" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>



            <div class="col-lg-1 my-2">
             <p>4</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="date4" name="date4" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
                 <div class="col-lg-4 my-2">
                    <input type="text"  id="time4" name="time4"   class="form-control " >
                </div> 
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub4" id="sub4" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>


            <div class="col-lg-1 my-2">
               <p>5</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="date5" name="date5" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
               <div class="col-lg-4 my-2">
                 <input type="text"  id="time5" name="time5"   class="form-control " >
              </div> 
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub5" id="sub5" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>



            <div class="col-lg-1 my-2">
               <p>6</p>
             </div>
             <div class="col-lg-3 my-2">
               <input type="text"  id="date6" name="date6" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                 <input type="text"  id="time6" name="time6"   class="form-control " >
            </div> 
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub6" id="sub6" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>


            <div class="col-lg-1 my-2">
               <p>7</p>
             </div>
             <div class="col-lg-3 my-2">
                <input type="text"  id="date7" name="date7" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
               <div class="col-lg-4 my-2">
                   <input type="text"  id="time7" name="time7"   class="form-control " >
              </div> 
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub7" id="sub7" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>



            <div class="col-lg-1 my-2">
               <p>8</p>
             </div>
             <div class="col-lg-3 my-2">
                <input type="text"  id="date8" name="date8" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
                <div class="col-lg-4 my-2">
                   <input type="text"  id="time8" name="time8"   class="form-control " >
              </div> 
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub8" id="sub8" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>



            <div class="col-lg-1 my-2">
               <p>9</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="date9" name="date9" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
                <div class="col-lg-4 my-2">
                    <input type="text"  id="time9" name="time9"   class="form-control " >
               </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub9" id="sub9" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>



            <div class="col-lg-1 my-2">
               <p>10</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="date10" name="date10" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                   <input type="text"  id="time10" name="time10"   class="form-control " >
              </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub10" id="sub10" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>


            <div class="col-lg-1 my-2">
               <p>11</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="date11" name="date11" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                   <input type="text"  id="time11" name="time11"   class="form-control " >
              </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub11" id="sub11" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>


            <div class="col-lg-1 my-2">
               <p>12</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="date12" name="date12" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                   <input type="text"  id="time12" name="time12"   class="form-control " >
              </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub12" id="sub12" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>


            <div class="col-lg-1 my-2">
               <p>13</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="date13" name="date13" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                   <input type="text"  id="time13" name="time13"   class="form-control " >
              </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub13" id="sub13" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>



            <div class="col-lg-1 my-2">
               <p>14</p>
             </div>
             <div class="col-lg-3 my-2">
                 <input type="text"  id="date14" name="date14" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
              <div class="col-lg-4 my-2">
                    <input type="text"  id="time14" name="time14"   class="form-control " >
              </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub14" id="sub14" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>


            <div class="col-lg-1 my-2">
               <p>15</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="date15" name="date15" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
                 <div class="col-lg-4 my-2">
                    <input type="text"  id="time15" name="time15"   class="form-control " >
                </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub15" id="sub15" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>


            <div class="col-lg-1 my-2">
                <p>16</p>
             </div>
             <div class="col-lg-3 my-2">
                   <input type="text"  id="date16" name="date16" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
               <div class="col-lg-4 my-2">
                    <input type="text"  id="time16" name="time16"   class="form-control " >
              </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub16" id="sub16" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>

            <div class="col-lg-1 my-2">
                <p>17</p>
             </div>
             <div class="col-lg-3 my-2">
                   <input type="text"  id="date17" name="date17" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
               <div class="col-lg-4 my-2">
                    <input type="text"  id="time17" name="time17"   class="form-control " >
              </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub17" id="sub17" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>


            <div class="col-lg-1 my-2">
                <p>18</p>
             </div>
             <div class="col-lg-3 my-2">
                   <input type="text"  id="date18" name="date18" autocomplete="off"  class="form-control datepicker" readonly>
             </div>

               <div class="col-lg-4 my-2">
                    <input type="text"  id="time18" name="time18"   class="form-control " >
              </div>

            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub18" id="sub18" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>





           
            



             
               <!--  <input type="text"  id="datepicker" name="birth_date" autocomplete="off"  class="form-control"><br> -->
            </div>
  
         
          <div class="loader">
            <img src="{{ asset('images/abc.gif') }}" alt="" style="width: 50px;height:50px;">
          </div>

        <div class="mt-4">
          <button type="submit" id="add_employee_btn" class="btn btn-primary">Submit </button>
       </div>  

      </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
        </div>
      </form>
    </div>
  </div>
</div>

{{-- add new employee modal end --}}


{{-- edit employee modal start --}}
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  method="POST" id="edit_employee_form" enctype="multipart/form-data">
        <input type="hidden" name="edit_id" id="edit_id">
         <div class="modal-body p-4 bg-light">
          <div class="row">



						
          <div class="col-lg-4 my-2">
               <label for="lname">Class <span style="color:red;"> * </span></label>
                <select class="form-select" name="class" id="edit_class" aria-label="Default select example"  required >
                             <option  value="">Select One </option>
                             @foreach($classrow as $row)
                                  <option value="{{$row->text1}}">{{$row->text2}}</option>
                                 @endforeach
               </select>
            </div>

            <div class="col-lg-4 my-2">
              <label for="lname">Group <span style="color:red;"> * </span></label>
                  <select class="form-select" name="babu" id="edit_babu" aria-label="Default select example" required  >
                         <option   value="">Select One </option>
                            @foreach($grouprow as $row)
                                  <option value="{{$row->text1}}">{{$row->text2}}</option>
                              @endforeach          
                  </select>
            </div>

            <div class="col-lg-4 my-2">
              <label for="name"></label>
              <input type="hidden" name="time" id="edit_time" class="form-control" placeholder=""  required>
            </div>

            <div class="col-lg-1 my-2">
              <label for="roll">Serial</label>
               <p>1</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <label for="roll">Date(yyyy-mm-dd)</label>
              <input type="text"  id="edit_date1" name="date1" autocomplete="off"  class="form-control datepicker" readonly>
            </div>

            <div class="col-lg-4 my-2">
              <label for="roll">Exam Start[10.00AM-1.00PM]</label>
              <input type="text"  id="edit_time1" name="time1"   class="form-control " >
            </div>


            <div class="col-lg-4 my-2">
              <label for="name">Name od Subject</label>
              <select class="form-select" name="sub1" id="edit_sub1" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>


             <div class="col-lg-1 my-2">
               <p>2</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="edit_date2" name="date2" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                  <input type="text"  id="edit_time2" name="time2"   class="form-control " >
             </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub2" id="edit_sub2" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>


            <div class="col-lg-1 my-2">
               <p>3</p>
             </div>
             <div class="col-lg-3 my-2">
                <input type="text"  id="edit_date3" name="date3" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                  <input type="text"  id="edit_time3" name="time3"   class="form-control " >
             </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub3" id="edit_sub3" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>



            <div class="col-lg-1 my-2">
               <p>4</p>
             </div>
             <div class="col-lg-3 my-2">
           <input type="text"  id="edit_date4" name="date4" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                  <input type="text"  id="edit_time4" name="time4"  class="form-control " >
             </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub4" id="edit_sub4" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>


            <div class="col-lg-1 my-2">
               <p>5</p>
             </div>
             <div class="col-lg-3 my-2">
           <input type="text"  id="edit_date5" name="date5" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                  <input type="text"  id="edit_time5" name="time5"  class="form-control " >
             </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub5" id="edit_sub5" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>



            <div class="col-lg-1 my-2">
               <p>6</p>
             </div>
             <div class="col-lg-3 my-2">
                 <input type="text"  id="edit_date6" name="date6" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                  <input type="text"  id="edit_time6" name="time6"   class="form-control " >
             </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub6" id="edit_sub6" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>


            <div class="col-lg-1 my-2">
               <p>7</p>
             </div>
             <div class="col-lg-3 my-2">
            <input type="text"  id="edit_date7" name="date7" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                  <input type="text"  id="edit_time7" name="time7"   class="form-control " >
             </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub7" id="edit_sub7" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>



            <div class="col-lg-1 my-2">
               <p>8</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="edit_date8" name="date8" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                  <input type="text"  id="edit_time8" name="time8"   class="form-control " >
             </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub8" id="edit_sub8" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>



            <div class="col-lg-1 my-2">
               <p>9</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="edit_date9" name="date9" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                  <input type="text"  id="edit_time9" name="time9"   class="form-control " >
             </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub9" id="edit_sub9" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>



            <div class="col-lg-1 my-2">
               <p>10</p>
             </div>
             <div class="col-lg-3 my-2">
                <input type="text"  id="edit_date10" name="date10" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                  <input type="text"  id="edit_time10" name="time10"  class="form-control " >
             </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub10" id="edit_sub10" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>


            <div class="col-lg-1 my-2">
               <p>11</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="edit_date11" name="date11" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                  <input type="text"  id="edit_time11" name="time11"  class="form-control " >
             </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub11" id="edit_sub11" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>


            <div class="col-lg-1 my-2">
               <p>12</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="edit_date12" name="date12" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                  <input type="text"  id="edit_time12" name="time12"   class="form-control " >
             </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub12" id="edit_sub12" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>


            <div class="col-lg-1 my-2">
               <p>13</p>
             </div>
             <div class="col-lg-3 my-2">
                    <input type="text"  id="edit_date13" name="date13" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                  <input type="text"  id="edit_time13" name="time13"  class="form-control " >
             </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub13" id="edit_sub13" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>



            <div class="col-lg-1 my-2">
              <p>14</p>
             </div>
              <div class="col-lg-3 my-2">
                 <input type="text"  id="edit_date14" name="date14" autocomplete="off"  class="form-control datepicker" readonly>
              </div>
             <div class="col-lg-4 my-2">
                  <input type="text"  id="edit_time14" name="time14" class="form-control " >
             </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub14" id="edit_sub14" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>


            <div class="col-lg-1 my-2">
               <p>15</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="edit_date15" name="date15" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                  <input type="text"  id="edit_time15" name="time15"   class="form-control " >
             </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub15" id="edit_sub15" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>


            <div class="col-lg-1 my-2">
               <p>16</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="edit_date16" name="date16" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                  <input type="text"  id="edit_time16" name="time16"  class="form-control " >
             </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub16" id="edit_sub16" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>  


            <div class="col-lg-1 my-2">
               <p>17</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="edit_date17" name="date17" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                  <input type="text"  id="edit_time17" name="time17"   class="form-control " >
             </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub17" id="edit_sub17" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>  


            <div class="col-lg-1 my-2">
               <p>18</p>
             </div>
             <div class="col-lg-3 my-2">
             <input type="text"  id="edit_date18" name="date18" autocomplete="off"  class="form-control datepicker" readonly>
             </div>
             <div class="col-lg-4 my-2">
                  <input type="text"  id="edit_time18" name="time18"  class="form-control " >
             </div>
            <div class="col-lg-4 my-2">
               <select class="form-select" name="sub18" id="edit_sub18" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
                </select>
            </div>  



         


          <div class="loader">
            <img src="{{ asset('images/abc.gif') }}" alt="" style="width: 50px;height:50px;">
          </div>

        <div class="mt-4">
            <button type="submit" id="edit_employee_btn" class="btn btn-success">Update </button>
       </div>  

      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit employee modal end --}}



<script>
  $( function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat:"yy-mm-dd",
	     yearRange: "2020:2055",
    });
  });
  </script>
  



<script>  
  $(document).ready(function(){ 

    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
 
       // add new employee ajax request
      
         let formData=new FormData($('#add_form')[0]);
  
       $("#add_employee_form").submit(function(e) {
        e.preventDefault();
      
        const fd = new FormData(this);

        $.ajax({
          type:'POST',
          url:'/admit/store',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          beforeSend : function()
               {
               $('.loader').show();
               },
          success: function(response){
            if(response.status == 100){
               Swal.fire("Added",response.message, "success");
               $("#add_employee_btn").text('Submit');
               $("#add_employee_form")[0].reset();
               $("#addEmployeeModal").modal('hide');
               fetchAll();
              }else if(response.status == 200){
               Swal.fire("Warning",response.message,"warning");
              }else if(response.status == 300){
               Swal.fire("Warning",response.message,"warning");
              }else if(response.status == 400){
               Swal.fire("Warning",response.message,"warning");
              }
            $('.loader').hide();
          }
        });

      });


      fetchAll();
      function fetchAll() {
        $.ajax({
          type:'GET',
          url:'/admit/fetchall',
          success: function(response) {
            $("#show_all_employees").html(response);
            $("table").DataTable({
              order: [2, 'asc'],
              lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "All"]]
            });
          }
        });
      }



        // edit employee ajax request
        $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          type:'GET',
          url:'/admit/edit',
          data: {
            id: id,
          },
          success: function(response){
            $("#edit_class").val(response.data.class);
            $("#edit_babu").val(response.data.babu);
            $("#edit_time").val(response.data.time);

            $("#edit_date1").val(response.data.date1);
            $("#edit_date2").val(response.data.date2);
            $("#edit_date3").val(response.data.date3);
            $("#edit_date4").val(response.data.date4);
            $("#edit_date5").val(response.data.date5);
            $("#edit_date6").val(response.data.date6);
            $("#edit_date7").val(response.data.date7);
            $("#edit_date8").val(response.data.date8);
            $("#edit_date9").val(response.data.date9);
            $("#edit_date10").val(response.data.date10);
            $("#edit_date11").val(response.data.date11);
            $("#edit_date12").val(response.data.date12);
            $("#edit_date13").val(response.data.date13);
            $("#edit_date14").val(response.data.date14);
            $("#edit_date15").val(response.data.date15);
            $("#edit_date16").val(response.data.date16);
            $("#edit_date17").val(response.data.date17);
            $("#edit_date18").val(response.data.date18);

            $("#edit_time1").val(response.data.time1);
            $("#edit_time2").val(response.data.time2);
            $("#edit_time3").val(response.data.time3);
            $("#edit_time4").val(response.data.time4);
            $("#edit_time5").val(response.data.time5);
            $("#edit_time6").val(response.data.time6);
            $("#edit_time7").val(response.data.time7);
            $("#edit_time8").val(response.data.time8);
            $("#edit_time9").val(response.data.time9);
            $("#edit_time10").val(response.data.time10);
            $("#edit_time11").val(response.data.time11);
            $("#edit_time12").val(response.data.time12);
            $("#edit_time13").val(response.data.time13);
            $("#edit_time14").val(response.data.time14);
            $("#edit_time15").val(response.data.time15);
            $("#edit_time16").val(response.data.time16);
            $("#edit_time17").val(response.data.time17);
            $("#edit_time18").val(response.data.time18);

           
            $("#edit_sub1").val(response.data.sub1);
            $("#edit_sub2").val(response.data.sub2);
            $("#edit_sub3").val(response.data.sub3);
            $("#edit_sub4").val(response.data.sub4);
            $("#edit_sub5").val(response.data.sub5);
            $("#edit_sub6").val(response.data.sub6);
            $("#edit_sub7").val(response.data.sub7);
            $("#edit_sub8").val(response.data.sub8);
            $("#edit_sub9").val(response.data.sub9);
            $("#edit_sub10").val(response.data.sub10);
            $("#edit_sub11").val(response.data.sub11);
            $("#edit_sub12").val(response.data.sub12);
            $("#edit_sub13").val(response.data.sub13);
            $("#edit_sub14").val(response.data.sub14);
            $("#edit_sub15").val(response.data.sub15);
            $("#edit_sub16").val(response.data.sub16);
            $("#edit_sub17").val(response.data.sub17);
            $("#edit_sub18").val(response.data.sub18);

            $("#edit_id").val(response.data.id);
          }
        });
      });


     


       // update employee ajax request
       $("#edit_employee_form").submit(function(e) {
          e.preventDefault();
      
          const fd = new FormData(this);

         $.ajax({
          type:'POST',
          url:'/admit/update',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          beforeSend : function()
               {
               $('.loader').show();
               },
          success: function(response){
            if (response.status == 100){
               Swal.fire("Updated",response.message, "success");
               $("#edit_employee_btn").text('Update');
               $("#edit_employee_form")[0].reset();
               $("#editEmployeeModal").modal('hide');
               fetchAll();
             }else if(response.status == 200){
              Swal.fire("Warning",response.message, "warning");
             }else if(response.status == 300){
              Swal.fire("Warning",response.message, "warning");
             }else if(response.status == 404){
              Swal.fire("Warning",response.message, "warning");
             }
          
            $('.loader').hide();
          }
         
        });
    
      });



        // delete employee ajax request
        $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url:'/admit/delete',
              method: 'delete',
              data: {
                id: id,
              },
              success: function(response) {
                //console.log(response);
                Swal.fire("Deleted", "Data Deleted Successfully!", "success");
                fetchAll();
              }
            });
          }
        })
      });



     
  



});

</script>




@endsection     