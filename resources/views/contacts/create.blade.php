@extends('layouts.master')
@section('content')
<div class="card ">
    <div class="card-body">
        <form method="post" action="{{ url('contacts/store') }}" id="myForm" enctype="multipart/form-data">
            @csrf
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="salutation">Salutation</label>
                    <input type="text" name="salutation"  class="form-control" placeholder="Enter Salutation">
                  </div>

                <div class="form-group col-md-6">
                  <label for="fname">First Name</label>
                  <input type="text" name="first_name"  class="form-control" placeholder="Enter Your First Name">
                </div>

                <div class="form-group col-md-6">
                    <label for="name">Last Name</label>
                    <input type="text" name="last_name"  class="form-control" placeholder="Enter Your Last Name">
                </div>

                <div class="form-group col-md-6">
                    <label for="name">Date of Birth</label>
                    <input type="date" name="date_of_birth"  class="form-control" placeholder="Enter Your Date of Birth">
                </div>

                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input type="text" name="email"  class="form-control" placeholder="Enter Your Email">
                </div>


                <div class="form-group col-md-6">
                  <label for="photo">Photo</label>
                  <input type="file" name="photo" class="form-control form-control-file" id="photo">
                </div>

                <div class="form-group col-md-6 number_records">
                    <label for="phone">Number</label>
                    <input type="text" name="number[]"  class="form-control" placeholder="Enter Your Mobile Number">
                    <a class="extra-fields-number" href="#">Add More Number</a>
                    <div class="number_records_dynamic"></div>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputState">Type</label>
                    <select id="inputState" class="form-control" name="type">
                        <option selected>Work</option>
                        <option>Office</option>
                        <option>Home</option>
                        <option>Fax</option>
                    </select>
                </div>


               <div class="form-group col-md-12">
                  <input type="submit" value="Submit" class="btn btn-primary">
              </div>
            </div>

        </form>
    </div>
  </div>
<script type="text/javascript">
    $('.extra-fields-number').click(function() {
        $('.number_records').clone().appendTo('.number_records_dynamic');
        $('.number_records_dynamic .number_records').addClass('single remove');
        $('.single .extra-fields-number').remove();
        $('.single').append('<a href="#" class="remove-field btn-remove-number">Remove Number</a>');
        $('.number_records_dynamic > .single').attr("class", "remove");

        $('.number_records_dynamic input').each(function() {
            var count = 0;
            var fieldname = $(this).attr("name");
            $(this).attr('name', fieldname + count);
            count++;
        });

    });

    $(document).on('click', '.remove-field', function(e) {
        $(this).parent('.remove').remove();
        e.preventDefault();
    });

</script>

@endsection




