@extends('layouts.app-inner')

@section('content')

<style type="text/css">
    .error {
        color:red;
    }
</style>

<!-- ============================================================== -->
<div class="dashboard-wrapper dashboard-wrapper-new-div ">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="ecommerce-widget">

        <div class="row">

          <!-- recent orders  -->
          <!-- ============================================================== -->
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="admin-penal-right-side-contain-common-main-div">
              <div class="card common-card-div">
                <div class="cstomer-page-contain-main-div">
                  <h4 class="main-common-heading">Customers</h4>
                  @if(Session::has('success'))
                  <div class="alert alert-success alert-dismissible">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     {{ Session::get('success') }}
                   </div>
                   @endif
                  <div class="search-customer-main-div">
                    <div class="left-side-contain-div">
                      <div class="row">
                        <!-- <div class="col-md-4">
                          <div class="form-group">
                            <label>Search Customer</label>
                            <input type="text" class="form-control common-height-class" id="searchCust">
                          </div>
                        </div> -->
                        <div class="col-md-4">
                          <div class="form-group custom-select-box-div">
                            <img src="assets/images/down-arrow-big.png" class="img-fluid">
                            <label>Arrange By</label>
                            <select class="form-control arrangeBy common-height-class" name="arrange">
                                <option value="newest" selected="selected">Newest</option>
                                <option value="alphabet">Alphabetical</option>
                                <option value="oldest">Oldest</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group custom-select-box-div">
                            <img src="assets/images/down-arrow-big.png" class="img-fluid">
                            <label>Filter</label>
                            <select class="form-control filter common-height-class" name="filter">
                                <option value="active" selected="selected">Active</option>
                                <option value="inactive">InActive</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="right-side-contain-div">
                      <p class="linkss-div" id="modal-open"><a href="javascript:void(0)" class="add-customer"><img src="assets/images/link-circle-img.png"> Add Customer</a></p>
                      <p class="linkss-div"><a href="#" data-toggle="modal" data-target="#export-customer-modal"><img src="assets/images/link-sq-img.png"> Export Customer</a></p>
                    </div>
                  </div> 

                  <div class="accordion-main-div">
                    <div id="accordion">
                      <div id="accordion-inner"></div>
                       {{--  @foreach($users as $user)
                      <div class="card costom-card-new-div" id="customer_block_{{$user->id}}">
                        <div class="card-header" id="heading-{{$user->id}}">
                          <h5 class="mb-0">
                            <a role="button" data-toggle="collapse" href="#collapse-{{$user->id}}" aria-expanded="true" aria-controls="collapse-{{$user->id}}">
                              <div class="Header-contain-div">
                                <div class="user-details-div">
                                  <img src="assets/images/user-img-big.png" class="img-fluid">
                                  <span class="user-name-div">{{$user->name}}&nbsp;{{$user->last_name}}</span>
                                </div>
                                <div class="edit-close-div">
                                  <a href="javascript:void(0)" class="img-fluid edit-customer" id="{{$user->id}}"><img class="img-fluid " src="assets/images/edit-imgs.png" ></a>
                                  <a href="javascript:delete_account('{{$user->id}}','deletecategory','proceed')" class="remove-customer" id="{{$user->id}}"><img src="assets/images/close-imgs.png" class="img-fluid"></a>
                                </div>
                              </div>
                            </a>
                          </h5>
                        </div>
                        <div id="collapse-{{$user->id}}" class="collapse " data-parent="#accordion" aria-labelledby="heading-{{$user->id}}">
                          <div class="card-body card-body-new-div">
                            <div class="accordion-contain-div">
                              <p class="para-div">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                              <p class="para-div">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach --}}
                      <div class="table-responsive">
                            <table id="customersLists" class="table table-striped table-bordered w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th class="noPrint">Action</th>
                                </tr>
                            </thead>
                        </table>
                       </div>

                    </div> <!-- End accordion -->
                  </div> <!-- End accordion-main-div -->


                  <!-- Star Modal Popup Code -->

                  <div class="common-modal-main-div">
                   <!-- The Modal One -->
                   <div class="modal export-customer-modal-div" id="export-customer-modal">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- Modal body -->
                        <div class="modal-body">
                          <h4 class="modal-main-heading">Export Customer</h4>
                          <form method="get" action="{{route('customers.exports')}}">
                            <div class="common-check-box-div">
                              <label class="containersss">
                                @if(isset($allinactiveUserCount))
                                All ({{$allactiveUserCount+$allinactiveUserCount}})
                                @endif
                                <input type="checkbox" name="allusers" id="usersAll">
                                <span class="checkmark"></span>
                              </label>
                              <label class="containersss">
                               @if(isset($allactiveUserCount))
                               Active ({{$allactiveUserCount}})
                               @endif
                               <input type="checkbox" name="active" class="restusers">
                               <span class="checkmark"></span>
                             </label>
                             <label class="containersss">
                              @if(isset($allinactiveUserCount))
                              Inactive ({{$allinactiveUserCount}})
                              @endif
                              <input type="checkbox" name="inactive" class="restusers">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                          <a href="#"> <button class="btn common-modal-btn">Export</button></a>
                        </form>
                      </div>

                    </div>
                  </div>
                </div> <!-- End export-customer-modal-div -->

                <!-- The Modal Two -->
                <div class="modal New-customer-modal-div" id="New-customer-modal">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal body -->
                      <div class="modal-body">
                        <h4 class="modal-main-heading">New Customer</h4>
                        <form id="add_customer"  method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" id="customer_id" name="customer_id" value="">
                          <div class="new-customer-form-div">
                            <div class="row">
                              <div class="col-md-6 common-height-div">
                                <div class="form-group">
                                  <label>First Name</label>
                                  <input type="text" class="form-control common-height-class" placeholder="Master" name="first_name" id="first_name" >
                                   <div class="error first_name"></div>
                                </div>
                              </div>
                              <div class="col-md-6 common-height-div">
                                <div class="form-group">
                                  <label>Last Name</label>
                                  <input type="text" class="form-control common-height-class" placeholder="Creationz" name="last_name" id="last_name" value="">
                                  <div class="error last_name"></div>
                                </div>
                              </div>
                              <div class="col-md-12 common-height-div">
                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="text" class="form-control common-height-class" placeholder="admin@gmail.com" name="email" id="email" value="">
                                   <div class="error email"></div>
                                </div>
                              </div>
                              <!-- <div class="col-md-12 common-height-div">
                                <div class="form-group">
                                  <label>password</label>
                                  <input type="password" class="form-control common-height-class" placeholder="Password" name="password" id="password" value="">
                                </div>
                              </div> -->
                              <div class="col-md-12 common-height-div">
                                <div class="form-group">
                                  <label>Home Phone</label>
                                  <div class="phone-field-common-div">
                                    <div class="country-number-code-div">
                                      <input type="text" class="form-control common-height-class" placeholder="+91" >
                                    </div>
                                    <div class="country-number-div">
                                      <input type="text" class="form-control common-height-class" name="home_phone" value="" id="home_phone">
                                       <div class="error home_phone"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12 common-height-div">
                                <div class="form-group">
                                  <label>Mobile Phone</label>
                                  <div class="phone-field-common-div">
                                    <div class="country-number-code-div">
                                      <input type="text" class="form-control common-height-class" placeholder="+91" >
                                    </div>
                                    <div class="country-number-div">
                                      <input type="text" class="form-control common-height-class" name="mobile_phone" value="" id="mobile_phone">
                                      <div class="error mobile_phone"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12 common-height-div">
                                <div class="form-group">
                                  <label>Work</label>
                                  <div class="phone-field-common-div">
                                    <div class="country-number-code-div">
                                      <input type="text" class="form-control common-height-class" placeholder="+91">
                                    </div>
                                    <div class="country-number-div">
                                      <input type="text" class="form-control common-height-class" name="work_phone" value="" id="work_phone">
                                      <div class="error work_phone"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12 common-height-div">
                                <div class="form-group">
                                  <label>Address</label>
                                  <input type="text" class="form-control common-height-class" name="address" value="" id="address">
                                   <div class="error address"></div>
                                </div>
                              </div>
                              <div class="col-md-6 common-height-div">
                                <div class="form-group custom-select-box-div">
                                  <img src="assets/images/down-arrow-big.png" class="img-fluid">
                                  <label>Country</label>
                                  <select class="form-control common-height-class" name="country">
                                    <option value="">No Country</option>
                                    <option value="India">India</option>
                                    <option value="Canada">Canada</option>
                                    <option value="London">London</option>
                                    <option value="US">US</option>
                                  </select>
                                  <div class="error country"></div>
                                </div>
                              </div>
                              <div class="col-md-6 common-height-div">
                                <div class="form-group custom-select-box-div">
                                  <img src="assets/images/down-arrow-big.png" class="img-fluid">
                                  <label>Region</label>
                                  <select class="form-control common-height-class" name="region">
                                    <option value="">No Region</option>
                                    <option value="Chennai">Chennai</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Punjab">Punjab</option>
                                  </select>
                                   <div class="error region"></div>
                                </div>
                              </div>
                              <div class="col-md-6 common-height-div">
                                <div class="form-group custom-select-box-div">
                                  <img src="assets/images/down-arrow-big.png" class="img-fluid">
                                  <label>City</label>
                                  <select class="form-control common-height-class" name="city">
                                    <option value="">No City</option>
                                    <option value="Lucknow">Lucknow</option>
                                    <option value="Noida">Noida</option>
                                    <option value="Kanpur">Kanpur</option>
                                  </select>
                                   <div class="error city"></div>
                                </div>
                              </div>
                              <div class="col-md-6 common-height-div">
                                <div class="form-group custom-select-box-div">
                                  <img src="assets/images/down-arrow-big.png" class="img-fluid">
                                  <label>Zip Code</label>
                                  <select class="form-control common-height-class" name="zip_code">
                                    <option value="">No Zip Code</option>
                                   <option value="12333">123335</option>
                                   <option value="254354">254354</option>
                                   <option value="333433">333433</option>
                                   <option value="444444">444444</option>
                                 </select>
                                  <div class="error zip_code"></div>
                               </div>
                             </div>

                              <!-- <div class="col-md-6 common-height-div">
                                 <div class="form-group">
                                      <input type="file" class="form-control common-height-class img-circle" name="image" value="" id="image">
                                 </div>
                              </div>
                              <div class="col-md-6 common-height-div">
                                 <div class="form-group">
                                     <label>Image</label>
                                     <img  src="{{ asset('assets/images/user_images/user-img.png')}}" id="output-image" alt="" title="Your Profile" class="img-circle" width="100px" height="100px" required>
                                 </div>
                              </div> -->
                             <div class="col-md-12 common-height-div">
                              <div class="common-check-box-div">
                                <label class="containersss">Send customer an email
                                  <input type="checkbox" checked="checked">
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <button class="btn common-modal-btn" type="submit" id="addCutomer">Add</button>
                            </div>
                          </div>
                        </div>

                      </div>

                    </div>
                  </div>
                </div> <!-- End export-customer-modal-div -->


              </div> <!-- End common-modal-main-div -->

              <!-- End Modal Popup Code -->


            </div> <!-- End cstomer-page-contain-main-div -->        

          </div> <!-- End common-card-div -->
        </div> <!-- End admin-penal-right-side-contain-common-main-div -->
      </div> <!-- End col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 -->
      <!-- ============================================================== -->
      <!-- end recent orders  -->

    </div> <!-- End row -->

  </div> <!-- End ecommerce-widget -->
</div> <!-- End container-fluid dashboard-content -->
</div> <!-- End dashboard-ecommerce -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<!-- ============================================================== -->

<!-- ============================================================== -->
            <!-- <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>

                    </div>
                </div>
              </div> -->
              <!-- ============================================================== -->
              <!-- end footer -->
              <!-- ============================================================== -->
            </div> <!-- End dashboard-wrapper -->
            <!-- ============================================================== -->

        </div> <!-- End dashboard-wrapper -->
        <!-- ============================================================== -->
@endsection
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type = "text/javascript">
   
$(document).ready(function(){

    $("#add_customer").validate({
    errorClass:'error-red',
    rules: {
        first_name : { required: true},
        last_name: { required: true },
        email: {
          required: true,
          email: true
        },
        address: { required: true },
        country: { required: true },
        city: { required: true },
        region: { required: true },
        zip_code: { required: true },
        mobile_phone: {
          required: true,
          number: true
        },
        work_phone: {
          required: true,
          number: true

        },
        // image:{
        //         required: true,
        //         //accept: "jpeg,png,jpg",
        //         //extension: "jpeg,png,jpg",
        //     },
        
      },
    messages: {
        first_name :{
            required: 'Please enter first name.'
        },
        last_name :{
            required: 'Please enter last name.'
        },
        email :{
            required: 'Please enter email.',
            email: 'Please enter correct email.'
        },
        address :{
            required: 'Please enter address.'
        },
        country :{
            required: 'Please enter country.'
        },
        city :{
            required: 'Please enter city.'
        },
        region :{
            required: 'Please enter region.'
        },
        city :{
            required: 'Please enter city.'
        },
        mobile_phone :{
            required: 'Please enter mobile number.',
            number: 'Please enter numbers only.'
        },
        home_phone :{
            number: 'Please enter numbers only.'
        },
        work_phone :{
            required: 'Please enter phone number.',
            number: 'Please enter numbers only.'

        },
        // image :{
        //     required: 'Please enter image.',
        //     accept: "Only image type jpg/png/jpeg is allowed",
        //    // extension: "Only image type jpg/png/jpeg is allowed",

        // }
        
    },

    submitHandler: function(form) {

        var customer_id =  $('#customer_id').val();

        if(customer_id)
        {
          var url = "{{url('/updateCustomer/')}}"+"/"+customer_id;
        }
        else
        {
          var url = "{{url('/addCustomer')}}";
        }
          var formData = new FormData($('#add_customer')[0]);
            $.ajax({

                type: 'POST',
                url: url,
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function (res) { 
                    if(res.status==false) {
                        $('.error').text("");
                        jQuery.each(res.error, function(index, val) {
                            if ($('div').find('.'+index )) {
                                $('.'+index).text(val[0]);
                            }
                        });
                    }else {
                        window.open(base_url + '/customers', "_self");
                    }
                }
            });
            
            //return false;
        }

    });

    $(document).on('click','.add-customer',function(){
        $('#New-customer-modal').modal('show');
        $( ".form-control" ).next("label").remove();
        $( ".form-control" ).removeClass('error-red');
        $( "input" ).val('');
        $('select').val('');
    })

    /******************Edit****************************************************/
    $(document).on('click','.edit-customer',function(){
        var customer_id = $(this).attr('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: "{{url('/editCustomer/')}}"+"/"+customer_id,
            data: { id:customer_id},
            success: function (response) {
                $('#New-customer-modal').modal('show');
                $( ".form-control" ).next("label").remove();
                $( ".form-control" ).removeClass('error-red');
                $('#customer_id').val(response.id);
                $('#address').val(response.email);
                $('#first_name').val(response.name);
                $('#last_name').val(response.last_name);
                $('#email').val(response.email);
                $('#address').val(response.address);
                $('#home_phone').val(response.home_phone);
                $('#mobile_phone').val(response.mobile_phone);
                $('select[name^="country"] option[value="'+response.country+'"]').attr("selected","selected");
                $('select[name^="region"] option[value="'+response.region+'"]').attr("selected","selected");
                $('select[name^="city"] option[value="'+response.city+'"]').attr("selected","selected");
                $('select[name^="zip_code"] option[value="'+response.zip_code+'"]').attr("selected","selected");
                $('#work_phone').val(response.work_phone);
                $('#addCutomer').text('Update');
            }
        });
        return false;

    });
});



    $(document).on('keyup','#searchCust',function(){
        //customerRecords();
    });

    function customerRecords(){
        var searchterm = $('#searchCust').val();
        var arrangeBy = $('.arrangeBy').val();
        var filter = $('.filter').val();
        $.ajax({
            type: "post",
            url: "{{url('/searchrecord/')}}",
            data: { term:searchterm,sort:arrangeBy,filter:filter},
            success: function (response) {
                console.log(response.html);
                $('#accordion').html('');
                $('#accordion').html(response.html);
                //$( ".form-control" ).next("label").remove();
            }
        });
    }

    /*image script url reader*/
    function readURLImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#output-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

// /*******************Edit****************************************************/
    $(document).ready(function() { 
        var oTable = $('#customersLists').DataTable({
            "bLengthChange": false,
            processing: true,
            serverSide: true,
            //bDestroy: true,
            "bSortable" : false,
            //columnDefs: [ { orderable: false, targets: [0] } ],
            ajax: {
                url: '{{ route('customer.list') }}',
                data: function (d) {
                    d.arrange = $('select[name=arrange]').val();
                    d.filter = $('select[name=filter]').val();
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'image', name: 'image', orderable: false},
                {data: 'fullname', name: 'fullname', orderable: false},
                {data: 'action', name: 'action',className:'noPrint', orderable: false},
            ]
        });

        $('.arrangeBy').on('change', function(e) { 
            oTable.draw();
            e.preventDefault();
            //customerRecords();
        });

        $('.filter').on('change',function(e){
            oTable.draw();
            e.preventDefault();
            //customerRecords();
        })
    });

    /*Exports All Users*/
      $(document).on('change','#usersAll',function(){
        if (this.checked){
          $(".restusers").each(function() {
            this.checked=true;
          });
        } else {
          $(".restusers").each(function() {
            this.checked=false;
          });
        }
      });    
</script>