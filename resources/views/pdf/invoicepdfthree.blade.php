@include('pdf/fpdf182/fpdf')
<?php

  
class PDF extends FPDF
{
   function Header()
   {
	
   }	
     function Footer()
       {
           // Position at 1.5 cm from bottom
           $this->SetY(-15);
           // Arial italic 8
           $this->SetFont('Arial','I',12);
           // Page number
           $this->Cell(80,10,date('d-M-Y, h:i:sA') ,0,0,'L');
           $this->Cell(125,10,date('d-M-Y, h:i:sA') ,0,0,'C'); 
		   $this->Cell(185,10,date('d-M-Y, h:i:sA'),0,0,'L'); 
       }
		
    }	
				
   
			
       $pdf= new PDF('L','mm','A4');
       $pdf->AliasNbPages();     
       $pdf->AddPage();

         // foreach($invoice as $row){

                    $pdf->SetFont('Times','I','20'); 						  
					$pdf->Cell(190,5,' ',0,1 , 'C' );  
                   
					$pdf->SetFont('Times','I','12');
					
					$pdf->Cell(20,8,'',0,0,'L' );
					$pdf->Cell(60,8,$school->school,0,0,'L');
					$pdf->Cell(17,7, '',0,0,'');
					$pdf->Cell(20,8,'',0,0,'L' );
					$pdf->Cell(60,8,$school->school,0,0,'L');
					$pdf->Cell(17,7, '',0,0,'');
					$pdf->Cell(20,8,'',0,0,'L' );
					$pdf->Cell(60,8,$school->school,0,1,'L');

					$pdf->Image('uploads/admin/'.$school->image,10,15,-250);   // Left side image
					$pdf->Image('uploads/admin/'.$school->image,105,15,-250); 
					$pdf->Image('uploads/admin/'.$school->image,205,15,-250); 
					
					   

				    $pdf->SetFont('Times','I','11');
					   $pdf->Cell(20,6, '','',0 , 'L' ); 
					   $pdf->Cell(60,6,$school->address,'' ,0 , 'L' );
					   $pdf->Cell(17,7, '|','',0 , 'C' );
					   $pdf->Cell(20,6, '','',0 , 'L' ); 
					   $pdf->Cell(60,6,$school->address,'' ,0 , 'L' );
					   $pdf->Cell(17,7, '|','',0 , 'C' );
					   $pdf->Cell(20,6, '','',0 , 'L' ); 
					   $pdf->Cell(60,6,$school->address,'' ,1, 'L' );


			    $pdf->SetFont('Times','I','12');
				    $pdf->Cell(20,8,'',0,0,'L' );
					$pdf->Cell(60,8,$school->bank_name,0,0,'R');
					$pdf->Cell(17,7, '',0,0,'');
					$pdf->Cell(20,8,'',0,0,'L' );
					$pdf->Cell(60,8,$school->bank_name,0,0,'R');
					$pdf->Cell(17,7,'',0,0,'');
					$pdf->Cell(20,8,'',0,0,'L' );
					$pdf->Cell(60,8,$school->bank_name,0,1,'R');	
					
					
			   $pdf->SetFont('Times','I','12');
				    $pdf->Cell(20,8,'',0,0,'L' );
					$pdf->Cell(60,8,'Account No : '.$school->bank_account,0,0,'R');
					$pdf->Cell(17,7, '',0,0,'');
					$pdf->Cell(20,8,'',0,0,'L' );
					$pdf->Cell(60,8,'Account No : '.$school->bank_account,0,0,'R');
					$pdf->Cell(17,7,'',0,0,'');
					$pdf->Cell(20,8,'',0,0,'L' );
					$pdf->Cell(60,8,'Account No : '.$school->bank_account,0,1,'R');	 
			      		
					$pdf->Cell(20,8, '','',0 , 'L' ); 
					$pdf->Cell(60,8,'Bank Copy','' ,0 , 'R' );
					$pdf->Cell(17,8, '|','',0 , 'C' );
					$pdf->Cell(20,8, '','',0 , 'L' ); 
					$pdf->Cell(60,8,'Manager Copy','' ,0 , 'R' );
					$pdf->Cell(17,8, '|','',0 , 'C' );
					$pdf->Cell(20,8, '','',0 , 'L' ); 
					$pdf->Cell(60,8,'Student Copy','' ,1, 'R' );
			   
			$pdf->SetFont('Times','I','14');   
			      $pdf->Cell(60,10,'Student Information ','B' ,0 , 'L' );
			      $pdf->Cell(20,10, '','',0 , '' );
			      $pdf->Cell(17,7, '',0,0,'');
				  $pdf->Cell(60,10,'Student Information ','B' ,0 , 'L' );
			      $pdf->Cell(20,10, '','',0 , '' );
			      $pdf->Cell(17,7, '',0,0,'');
				  $pdf->Cell(60,10,'Student Information ','B' ,0 , 'L' );
			      $pdf->Cell(20,10, '','',1 , '' );

			$pdf->SetFont('Times','I','12');
				  $pdf->Cell(15,7,'Name',0,0,'L' );
				  $pdf->Cell(65,7,': '.studentinfo($data->uid,'name'),0,0,'L');
				  $pdf->Cell(17,7, '',0,0,'');
				  $pdf->Cell(15,7,'Name',0,0,'L' );
				  $pdf->Cell(65,7,': '.studentinfo($data->uid,'name'),0,0,'L');
				  $pdf->Cell(17,7,'',0,0,'');
				  $pdf->Cell(15,7,'Name',0,0,'L' );
				  $pdf->Cell(65,7,': '.studentinfo($data->uid,'name'),0,1,'L');

			 $pdf->SetFont('Times','I','12');
				  $pdf->Cell(15,7,'Stu Id',0,0,'L' );
				  $pdf->Cell(30,7,': '.studentinfo($data->uid,'stu_id'),0,0,'L');
				  $pdf->Cell(15,7,'Roll',0,0,'L' );
				  $pdf->Cell(20,7,': '.studentinfo($data->uid,'roll'),0,0,'L');
				  $pdf->Cell(17,7, '',0,0,'');
				  $pdf->Cell(15,7,'Stu Id',0,0,'L' );
				  $pdf->Cell(30,7,': '.studentinfo($data->uid,'stu_id'),0,0,'L');
				  $pdf->Cell(15,7,'Roll',0,0,'L' );
				  $pdf->Cell(20,7,': '.studentinfo($data->uid,'roll'),0,0,'L');
				  $pdf->Cell(17,7,'',0,0,'');
				  $pdf->Cell(15,7,'Stu Id',0,0,'L' );
				  $pdf->Cell(30,7,': '.studentinfo($data->uid,'stu_id'),0,0,'L');
				  $pdf->Cell(15,7,'Roll',0,0,'L' );
				  $pdf->Cell(20,7,': '.studentinfo($data->uid,'roll'),0,1,'L');


			  $pdf->SetFont('Times','I','12');
				  $pdf->Cell(15,7,'Phone',0,0,'L' );
				  $pdf->Cell(30,7,': '.studentinfo($data->uid,'phone'),0,0,'L');
				  $pdf->Cell(15,7,'Class',0,0,'L' );
				  $pdf->Cell(20,7,': '.$data->class,0,0,'L');
				  $pdf->Cell(17,7, '',0,0,'');
				  $pdf->Cell(15,7,'Phone',0,0,'L' );
				  $pdf->Cell(30,7,': '.studentinfo($data->uid,'phone'),0,0,'L');
				  $pdf->Cell(15,7,'Class',0,0,'L' );
				  $pdf->Cell(20,7,': '.$data->class,0,0,'L');
				  $pdf->Cell(17,7,'',0,0,'');
				  $pdf->Cell(15,7,'Phone',0,0,'L' );
				  $pdf->Cell(30,7,': '.studentinfo($data->uid,'phone'),0,0,'L');
				  $pdf->Cell(15,7,'Class',0,0,'L' );
				  $pdf->Cell(20,7,': '.$data->class,0,1,'L');

			 $pdf->SetFont('Times','I','12');
				  $pdf->Cell(15,7,'Group',0,0,'L' );
				  $pdf->Cell(30,7,': '.$data->babu,0,0,'L');
				  $pdf->Cell(15,7,'Section',0,0,'L' );
				  $pdf->Cell(20,7,': '.$data->section,0,0,'L');
				  $pdf->Cell(17,7, '|',0,0,'C');
				  $pdf->Cell(15,7,'Group',0,0,'L' );
				  $pdf->Cell(30,7,': '.$data->babu,0,0,'L');
				  $pdf->Cell(15,7,'Section',0,0,'L' );
				  $pdf->Cell(20,7,': '.$data->section,0,0,'L');
				  $pdf->Cell(17,7,'|',0,0,'C');
				  $pdf->Cell(15,7,'Group',0,0,'L' );
				  $pdf->Cell(30,7,': '.$data->babu,0,0,'L');
				  $pdf->Cell(15,7,'Section',0,0,'L' );
				  $pdf->Cell(20,7,': '.$data->section,0,1,'L');

			$pdf->SetFont('Times','I','12');
				  $pdf->Cell(15,7,'Month',0,0,'L' );
				  $pdf->Cell(30,7,': '.date('F-Y',strtotime($data->invoice_date)),0,0,'L');
				  $pdf->Cell(15,7,'Shift',0,0,'L' );
				  $pdf->Cell(20,7,': '.shift($data->section,$data->eiin),0,0,'L');
				  $pdf->Cell(17,7, '',0,0,'');
				  $pdf->Cell(15,7,'Month',0,0,'L' );
				  $pdf->Cell(30,7,': '.date('F-Y',strtotime($data->invoice_date)),0,0,'L');
				  $pdf->Cell(15,7,'Shift',0,0,'L' );
				  $pdf->Cell(20,7,': '.shift($data->section,$data->eiin),0,0,'L');
				  $pdf->Cell(17,7,'',0,0,'');
				  $pdf->Cell(15,7,'Month',0,0,'L' );
				  $pdf->Cell(30,7,': '.date('F-Y',strtotime($data->invoice_date)),0,0,'L');
				  $pdf->Cell(15,7,'Shift',0,0,'L' );
				  $pdf->Cell(20,7,': '.shift($data->section,$data->eiin),0,1,'L');

		     $pdf->SetFont('Times','I','12');
				  $pdf->Cell(15,7,'Inv. Id',0,0,'L' );
				  $pdf->Cell(30,7,': '.$data->id,0,0,'L');
				  $pdf->Cell(15,7,'Type',0,0,'L' );
				  $pdf->Cell(20,7,': '.$data->payment_type,0,0,'L');
				  $pdf->Cell(17,7, '',0,0,'');
				  $pdf->Cell(15,7,'Inv. Id',0,0,'L' );
				  $pdf->Cell(30,7,': '.$data->id,0,0,'L');
				  $pdf->Cell(15,7,'Type',0,0,'L' );
				  $pdf->Cell(20,7,': '.$data->payment_type,0,0,'L');
				  $pdf->Cell(17,7,'',0,0,'');
				  $pdf->Cell(15,7,'Inv. Id',0,0,'L' );
				  $pdf->Cell(30,7,': '.$data->id,0,0,'L');
				  $pdf->Cell(15,7,'Type',0,0,'L' );
				  $pdf->Cell(20,7,': '.$data->payment_type,0,1,'L');	
				  
		   $pdf->SetFont('Times','I','12');
				  $pdf->Cell(30,7,'Payment time',0,0,'L' );
				  $pdf->Cell(50,7,': '.$data->payment_time,0,0,'L');
				  $pdf->Cell(17,7, '',0,0,'');
				  $pdf->Cell(30,7,'Payment time',0,0,'L' );
				  $pdf->Cell(50,7,': '.$data->payment_time,0,0,'L');
				  $pdf->Cell(17,7,'',0,0,'');
				  $pdf->Cell(30,7,'Payment time',0,0,'L' );
				  $pdf->Cell(50,7,': '.$data->payment_time,0,1,'L');	  
                
		     $pdf->Cell(275,7,' ','0',1 , 'R' ); 

		  $pdf->SetFont('Times','I','12');
		       $pdf->Cell(10,7,'#',1,0,'L' );
		       $pdf->Cell(50,7,'Description',1,0,'L');
			   $pdf->Cell(20,7,'Amount',1,0,'R' );
		       $pdf->Cell(17,7, '',0,0,'');
			   $pdf->Cell(10,7,'#',1,0,'L' );
		       $pdf->Cell(50,7,'Description',1,0,'L');
			   $pdf->Cell(20,7,'Amount',1,0,'R' );
		       $pdf->Cell(17,7,'',0,0,'');
			   $pdf->Cell(10,7,'#',1,0,'L' );
		       $pdf->Cell(50,7,'Description',1,0,'L');
			   $pdf->Cell(20,7,'Amount',1,1,'R' );

		   $pdf->SetFont('Times','I','12');
		       $pdf->Cell(10,5,'1',1,0,'L' );
		       $pdf->Cell(50,5,$data->des1,1,0,'L');
			   $pdf->Cell(20,5,$data->amount1 .' TK',1,0,'R' );
		       $pdf->Cell(17,5, '',0,0,'');
			   $pdf->Cell(10,5,'1',1,0,'L' );
		       $pdf->Cell(50,5,$data->des1,1,0,'L');
			   $pdf->Cell(20,5,$data->amount1 .' TK',1,0,'R' );
		       $pdf->Cell(17,5,'',0,0,'');
			   $pdf->Cell(10,5,'1',1,0,'L' );
		       $pdf->Cell(50,5,$data->des1,1,0,'L');
			   $pdf->Cell(20,5,$data->amount1 .' TK',1,1,'R' );	


		 $pdf->SetFont('Times','I','12');
		       $pdf->Cell(10,5,'2',1,0,'L' );
		       $pdf->Cell(50,5,$data->des2,1,0,'L');
			   $pdf->Cell(20,5,$data->amount2 .' TK',1,0,'R' );
		       $pdf->Cell(17,5, '',0,0,'');
			   $pdf->Cell(10,5,'2',1,0,'L' );
		       $pdf->Cell(50,5,$data->des2,1,0,'L');
			   $pdf->Cell(20,5,$data->amount2 .' TK',1,0,'R' );
		       $pdf->Cell(17,5,'',0,0,'');
			   $pdf->Cell(10,5,'2',1,0,'L' );
		       $pdf->Cell(50,5,$data->des2,1,0,'L');
			   $pdf->Cell(20,5,$data->amount2 .' TK',1,1,'R' );	
			   
			   
		 $pdf->SetFont('Times','I','12');
		       $pdf->Cell(10,5,'3',1,0,'L' );
		       $pdf->Cell(50,5,$data->des3,1,0,'L');
			   $pdf->Cell(20,5, $data->amount3 .' TK',1,0,'R' );
		       $pdf->Cell(17,5, '',0,0,'');
			   $pdf->Cell(10,5,'3',1,0,'L' );
		       $pdf->Cell(50,5,$data->des3,1,0,'L');
			   $pdf->Cell(20,5, $data->amount3 .' TK',1,0,'R' );
		       $pdf->Cell(17,5,'',0,0,'');
			   $pdf->Cell(10,5,'3',1,0,'L' );
		       $pdf->Cell(50,5,$data->des3,1,0,'L');
			   $pdf->Cell(20,5, $data->amount3 .' TK',1,1,'R' );
			   
			   
	   $pdf->SetFont('Times','I','12');
		       $pdf->Cell(10,5,'4',1,0,'L' );
		       $pdf->Cell(50,5, $data->des4,1,0,'L');
			   $pdf->Cell(20,5,$data->amount4 .' TK',1,0,'R' );
		       $pdf->Cell(17,5, '|',0,0,'C');
			   $pdf->Cell(10,5,'4',1,0,'L' );
		       $pdf->Cell(50,5, $data->des4,1,0,'L');
			   $pdf->Cell(20,5,$data->amount4 .' TK',1,0,'R' );
		       $pdf->Cell(17,5,'|',0,0,'C');
			   $pdf->Cell(10,5,'4',1,0,'L' );
		       $pdf->Cell(50,5, $data->des4,1,0,'L');
			   $pdf->Cell(20,5,$data->amount4 .' TK',1,1,'R' );
			   
		  $pdf->SetFont('Times','I','12');
		       $pdf->Cell(10,5,'5',1,0,'L' );
		       $pdf->Cell(50,5,$data->des5,1,0,'L');
			   $pdf->Cell(20,5,$data->amount5 .' TK',1,0,'R' );
		       $pdf->Cell(17,5, '',0,0,'');
			   $pdf->Cell(10,5,'5',1,0,'L' );
		       $pdf->Cell(50,5,$data->des5,1,0,'L');
			   $pdf->Cell(20,5,$data->amount5 .' TK',1,0,'R' );
		       $pdf->Cell(17,5,'',0,0,'');
			   $pdf->Cell(10,5,'5',1,0,'L' );
		       $pdf->Cell(50,5,$data->des5,1,0,'L');
			   $pdf->Cell(20,5,$data->amount5 .' TK',1,1,'R' );
			   
		  $pdf->SetFont('Times','I','12');
		       $pdf->Cell(10,5,'6',1,0,'L' );
		       $pdf->Cell(50,5,$data->des6,1,0,'L');
			   $pdf->Cell(20,5,$data->amount6 .' TK',1,0,'R' );
		       $pdf->Cell(17,5, '',0,0,'');
			   $pdf->Cell(10,5,'6',1,0,'L' );
		       $pdf->Cell(50,5,$data->des6,1,0,'L');
			   $pdf->Cell(20,5,$data->amount6 .' TK',1,0,'R' );
		       $pdf->Cell(17,5,'',0,0,'');
			   $pdf->Cell(10,5,'6',1,0,'L' );
		       $pdf->Cell(50,5,$data->des6,1,0,'L');
			   $pdf->Cell(20,5,$data->amount6 .' TK',1,1,'R' );	
			   
			   
		 $pdf->SetFont('Times','I','12');
		       $pdf->Cell(10,5,'7',1,0,'L' );
		       $pdf->Cell(50,5,'Previous Month Due',1,0,'L');
			   $pdf->Cell(20,5,$data->pre_monthdue.' TK',1,0,'R' );
		       $pdf->Cell(17,5, '',0,0,'');
			   $pdf->Cell(10,5,'7',1,0,'L' );
		       $pdf->Cell(50,5,'Previous Month Due',1,0,'L');
			   $pdf->Cell(20,5,$data->pre_monthdue.' TK',1,0,'R' );
		       $pdf->Cell(17,5,'',0,0,'');
			   $pdf->Cell(10,5,'7',1,0,'L' );
		       $pdf->Cell(50,5,'Previous Month Due',1,0,'L');
			   $pdf->Cell(20,5,$data->pre_monthdue.' TK',1,1,'R' );	
			   
			   
		 $pdf->SetFont('Times','I','12');
		       $pdf->Cell(10,5,'8',1,0,'L' );
		       $pdf->Cell(50,5,'Current Month Budget',1,0,'L');
			   $pdf->Cell(20,5,$data->totalamount.' TK',1,0,'R' );
		       $pdf->Cell(17,5, '',0,0,'');
			   $pdf->Cell(10,5,'8',1,0,'L' );
		       $pdf->Cell(50,5,'Current Month Budget',1,0,'L');
			   $pdf->Cell(20,5,$data->totalamount.' TK',1,0,'R' );
		       $pdf->Cell(17,5,'',0,0,'');
			   $pdf->Cell(10,5,'8',1,0,'L' );
		       $pdf->Cell(50,5,'Current Month Budget',1,0,'L');
			   $pdf->Cell(20,5,$data->totalamount.' TK',1,1,'R' );	
			   
			   
		  $pdf->SetFont('Times','I','12');
		       $pdf->Cell(10,5,'9',1,0,'L' );
		       $pdf->Cell(50,5,'Current Month Payment',1,0,'L');
			   $pdf->Cell(20,5,$data->cur_monthpayment.' TK',1,0,'R' );
		       $pdf->Cell(17,5, '',0,0,'');
			   $pdf->Cell(10,5,'9',1,0,'L' );
		       $pdf->Cell(50,5,'Current Month Payment',1,0,'L');
			   $pdf->Cell(20,5,$data->cur_monthpayment.' TK',1,0,'R' );
		       $pdf->Cell(17,5,'',0,0,'');
			   $pdf->Cell(10,5,'9',1,0,'L' );
		       $pdf->Cell(50,5,'Current Month Payment',1,0,'L');
			   $pdf->Cell(20,5,$data->cur_monthpayment.' TK',1,1,'R' );	
			   
			   $pdf->Cell(275,10,' ','0',1 , 'R' );    

		  $pdf->SetFont('Times','I','12');
			   $pdf->Cell(40,7,'Student Signature',0,0,'L' );
			   $pdf->Cell(40,7,'Manager Signature',0,0,'L');
			   $pdf->Cell(17,7, '',0,0,'');
			   $pdf->Cell(40,7,'Student Signature',0,0,'L' );
			   $pdf->Cell(40,7,'Manager Signature',0,0,'L');
			   $pdf->Cell(17,7,'',0,0,'');
			   $pdf->Cell(40,7,'Student Signature',0,0,'L' );
			   $pdf->Cell(40,7,'Manager Signature',0,1,'L');
					 
		  $pdf->Output('Invoice id-'.$data->uid.'.pdf','I');  
					 exit;
            	
					

?>