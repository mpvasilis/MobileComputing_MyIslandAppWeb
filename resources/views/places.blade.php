@include('header')
       <div class="my-3 my-md-5">
          <div class="container">
            <div class="page-header">
              <h1 class="page-title">
              {{ $category_title }}
              </h1>
              <div class="page-subtitle">{{ count($places) }} μέρη</div>
              <div class="page-options d-flex">
             
             
              </div>
            </div>

            @if(session('success'))
    <h1>{{session('success')}}</h1>
@endif

    <div class="row row-cards">
    @foreach ($places as $place)

              <div class="col-sm-6 col-lg-4">
                <div class="card p-3">
                  <a href="{{ url('/place') }}/{{ $place -> id }}" class="mb-3">
                    <img src="uploads/{{ $place -> image }}" class="rounded">
                  </a>
                  <div class="d-flex align-items-center px-2">
                    <div>
                      <div>{{ $place -> name }}</div>
                      <small class="d-block text-muted">{{ $place -> description }}</small>
                    </div>

                    @if ($place -> category == 4)
                    <div class="ml-auto text-muted">
                      <a href="{{ url('/place') }}/{{ $place -> id }}" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i> 42</a>
                    </div>
                    @endif
              
                  </div>
                </div>
              </div>
              @endforeach

            </div>

     </div>     </div>     </div>





    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Προσθήκη μέρους</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
      {!! Form::open(array('action' => array('PlaceController@store'),'files'=> true, 'enctype'=>'multipart/form-data')) !!}
                            {!! Form::label('name', 'Όνομα μέρους') !!}
                            {!! Form::text('name', null, ['class' => 'form-control','required' => 'required']) !!}

                            {!! Form::label('category', 'Κατηγορία') !!}
                            {{ Form::select('category',array(1=> 'Αξιοθέατα',2=> 'Εστίαση', 3=> 'Διαμονή' , 4=> 'Παραλίες'), null, ['class' => 'form-control']) }}

                            {!! Form::label('image', 'Εικόνα') !!}
                            {!! Form::file('image', ['class' => 'form-control','required' => 'required']) !!}

                            {!! Form::label('address', 'Διέθυνση') !!}
                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                            
                            {!! Form::label('phone', 'Τηλέφωνο') !!}
                            {!! Form::text('phone', null, ['class' => 'form-control']) !!}

                            {!! Form::label('website', 'Ιστοσελίδα') !!}
                            {!! Form::text('website', null, ['class' => 'form-control']) !!}

                            {!! Form::label('description', 'Σύντομή Περιγραφή') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 2, 'required' => 'required']) !!}

                            {!! Form::label('description_long', 'Περιγραφή') !!}
                            {!! Form::textarea('description_long', null, ['class' => 'form-control', 'rows' => 5]) !!}

                            {!! Form::label('lat', 'Latitude') !!}
                            {!! Form::text('lat', null, ['class' => 'form-control','required' => 'required']) !!}

                            {!! Form::label('lng', 'Longtitude') !!}
                            {!! Form::text('lng', null, ['class' => 'form-control', 'required' => 'required']) !!}


                            <br>
                            {!! Form::submit('Προσθήκη', ['class' => 'btn btn-primary ']) !!}
{!! Form::close() !!}
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Κλείσιμο</button>
      </div>
    </div>
  </div>
</div>
@include('footer')
