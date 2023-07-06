@foreach($invoice as $row)
  <tr>
		    <td><?php echo $row['student_id']; ?></td>
		    <td><?php echo $row['roll']; ?></td>
	      <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['class']; ?></td>
        <td><?php echo $row['babu']; ?></td>
        <td><?php echo $row['section']; ?></td>
        <td><?php echo $row['invoice_amount']; ?></td>
        <td><?php echo $row['payment_amount']; ?></td>
        <td><?php echo $row['due_payment']; ?></td>
        <td> <button type="button" value="{{$row->uid}}" class="view_all btn btn-primary btn-sm">View All</button> </td>
        <td><button type="button" value="{{ $row->uid}}"  class="payNow btn btn-info btn-sm">Pay Now </button> </td></td>
    </tr>
  @endforeach

      <tr class="pagin_link ">
             <td colspan="11" align="center">
                 {!! $invoice->links() !!}
              </td>
      </tr>  
