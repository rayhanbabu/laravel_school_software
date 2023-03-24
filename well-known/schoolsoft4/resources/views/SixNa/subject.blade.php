<a class="btn btn-success dropdown-toggle mt-3 " id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Select Subject of Six</a> 
            <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                    @foreach($subject as $row)
                        <?php
                            $class=substr($row->class,0,3);
                            $babu=substr($row->babu,0,2);
                        ?>
                     <li><a class="dropdown-item" href="{{ url($class.'/'.$babu.'/'.$row->subcode.'/'.$row->tecode)}}">{{$row->subject}}</a></li>
                     @endforeach 
                     <li><a class="dropdown-item" href="{{ url('Six/Na/result')}}">Result Processing</a></li>         
                </ul>
            </li>