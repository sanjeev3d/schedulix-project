@extends('layouts.app-inner')

@section('content')

             <div class="dashboard-wrapper dashboard-wrapper-new-div ">
                <div class="dashboard-ecommerce">
                    <div class="container-fluid dashboard-content ">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                         <div class="ecommerce-widget">

                            <div class="row">

                                <!-- recent orders  -->
                                <!-- ============================================================== -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="admin-penal-right-side-contain-common-main-div">
                                        <div class="card common-card-div">
                                            <div class="dashboard-contain-div">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="user-rasio-info-div">
                                                            <div class="img-div">
                                                                <img src="assets/images/dashboard-img1.png" class="img-fluid">
                                                            </div>
                                                            <div class="text-divs">
                                                                <p class="numbers">24</p>
                                                                <p class="texts">Appointments</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="user-rasio-info-div">
                                                            <div class="img-div">
                                                                <img src="assets/images/dashboard-img2.png" class="img-fluid">
                                                            </div>
                                                            <div class="text-divs">
                                                                <p class="numbers">$345</p>
                                                                <p class="texts">Estimate Sales</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="user-rasio-info-div">
                                                            <div class="img-div">
                                                                <img src="assets/images/dashboard-img3.png" class="img-fluid">
                                                            </div>
                                                            <div class="text-divs">
                                                                <p class="numbers">20</p>
                                                                <p class="texts">New Customers</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>        


                                        </div> <!-- End common-card-div -->
                                    </div> <!-- End admin-penal-right-side-contain-common-main-div -->
                                </div> <!-- End col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 -->
                                <!-- ============================================================== -->
                                <!-- end recent orders  -->

                            </div> <!-- End row -->

                        </div> <!-- End ecommerce-widget -->
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->
                        <div class="ecommerce-widget">

                            <div class="row">
                                <!-- ============================================================== -->

                                <!-- ============================================================== -->

                                <!-- recent orders  -->
                                <!-- ============================================================== -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    
                                    <div class="modal main-modal-div" id="myModal">
                                        <div class="modal-dialog custom-dialog-div">
                                            <div class="modal-content custom-modal-contain-div">
                                          
                                                 <!-- step verifivation section -->

                                                <div class="step-varification-section-main-div">
                                                    <ul>
                                                        <li class="round1 active">
                                                            <span class="border-line-div"></span>
                                                        </li>
                                                        <li class="round2">
                                                            <span class="border-line-div"></span>
                                                        </li>
                                                        <li class="round3">
                                                            <span class="border-line-div"></span>
                                                        </li>
                                                        <li class="round4">
                                                            <span class="border-line-div"></span>
                                                        </li>
                                                        <li class="round5">
                                                            <span class="border-line-div"></span>
                                                        </li>
                                                        <li class="round6">
                                                            <span class="border-line-div"></span>
                                                        </li>
                                                    </ul>
                                                </div>


                                                <!-- signup screen section  -->

                                                <div class="signup-screen-section-main-div">
                                                    <div class="signup-section-sub-div" style="max-width: 1200px;">
                                                        <div class="signup-screen-contain-div" >
                                                            <div id="reg_step_all">

                                                                <div id="screen-one" class="common-secreen-div selected">
                                                                    <form id="step1" name="step1" class="reg_step" action="{{ action('HomeController@step_one') }}" method="post">
                                                                         @csrf
                                                                        <div class="signup-header-div">
                                                                            <h3 class="common-header-text">What best describes your business?</h3>
                                                                        </div>
                                                                        <div class="multiple-radio-btn-main-div">
                                                                            @foreach($business_category as $category)
                                                                                <label class="radio-container active">{{$category->name}} <br>
                                                                                    <span class="small-text-div">{{$category->commnet}}</span>
                                                                                  <input type="radio" name="business_type" value="{{$category->id}}">
                                                                                  <span class="checkmark"></span>
                                                                                </label>
                                                                               
                                                                            @endforeach
                                                                            
                                                                        </div>
                                                                        <span id="business_type_error" style="display: none;color: #f00;    width: 100%;float: left;text-align: center;">Please select business type.</span>   
                                                                    </form>
                                                                </div> <!-- screen-one -->
                                                            </div>

                                                            




                                                            <div class="signup-footer-div">
                                                                <div class="footer-btn-div">
                                                                    <div class="backbtn-div">
                                                                        <button type="button" style="display: none;" class="btn" id="back-btn"><i class="fas fa-chevron-left"></i> Back</button>
                                                                    </div>
                                                                    <div class="next-btn-div">
                                                                        <button type="button" class="btn" id="next-btn">Next <i class="fas fa-long-arrow-alt-right"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> <!-- signup-screen-contain-div -->
                                                    </div> <!-- signup-section-sub-div -->
                                                </div> <!-- signup-screen-section-main-div -->
                                          
                                            </div> <!-- End modal-content -->
                                        </div> <!-- End modal-dialog -->
                                    </div> <!-- End Modal -->
                                </div>
                                <!-- ============================================================== -->
                                <!-- end recent orders  -->


                                <!-- ============================================================== -->
                                <!-- ============================================================== -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>




@endsection
@push('scripts')
@if(@$regStep)

        <script type="text/javascript">
            $(document).ready(function(){
                var cntstep = "{{$regStep->step}}";
                $.ajax({
                    url: "{{action('HomeController@findstep') }}",
                    type: "post",
                    data: {"id":"{{$regStep->step}}"},
                    success: function(data){
                        
                        if(data.success){

                            $("#myModal").modal('show');
                            if(cntstep == 3){
                                $(".round2").addClass("active");    
                            }
                            if(cntstep == 4){
                                $(".round2").addClass("active");    
                                $(".round3").addClass("active");    
                            }
                            if(cntstep == 5){
                                $(".round2").addClass("active");    
                                $(".round3").addClass("active");    
                                $(".round4").addClass("active");    
                            }
                            $(".round"+cntstep).addClass("active");
                            if (cntstep > 1) {
                              //$("#back-btn").show();
                            }
                            if(cntstep == 6){
                              $("#next-btn").html("Save");
                            }
                            $("#reg_step_all").hide();
                            $("#reg_step_all").html(data.html);$("#reg_step_all").slideDown(1000);
                            //$(".common-secreen-div").slideDown(1000);
                        }
                        if(data.codee == 100){
                            return false;
                        }
                    }
                    
                });
            });

        </script>

@else
    <script type="text/javascript">
        $(document).ready(function(){
            $("#myModal").modal('show');
            
        });
    </script>
@endif
<script type="text/javascript" src="{{ asset('js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    // Hit ajx and call the last saved step 
   
      var cnt = 1;
      if (cnt == 1) {
        $("#back-btn").hide();
      }
      $(document).on("click","#next-btn,.servicecat",function () {
        
        if($(".reg_step").valid()){

            var postdata = $(".reg_step").serialize();
            var url = $(".reg_step").attr("action");
            if($(".reg_step").attr("id")=='step1'){
                if ($('input[name="business_type"]:checked').length == 0) {
                    $("#business_type_error").show();
                     return false; 
                } 
                else {
                    $("#business_type_error").hide();
                     postData(postdata,url);
                     return false;
                }
            }
            if($(".reg_step").attr("id")=='step5'){
                
                if ($('#step5 input[type=checkbox]:checked').length == 0) {
                    
                    $("#step_5_error").show();
                     return false; 
                } 
                else {
                    
                    $("#step5 input[type=checkbox]").each(function(){
                        $("#step_5_error").hide();
                        var $this = $(this);
                        if($this.is(":checked")){
                            $("#"+$this.attr("id")+"-from").rules("add", {
                               required:true,
                            });
                            $("#"+$this.attr("id")+"-to").rules("add", {
                               required:true,
                            });
                        }else{
                            $("#"+$this.attr("id")+"-to").css("border","unset");
                        }
                    });
                    if($(".reg_step").valid()){
                     postData(postdata,url);
                     return false;
                    }
                    return false;
                }
            }
            postData(postdata,url);

        }else{
            return false;
        }
        
      });
      $("#back-btn").click(function () {
        if (cnt > 1) {
          $(".round"+cnt).removeClass("active");
          cnt = cnt - 1;
          if (cnt == 1) {
            //$("#back-btn").hide();
          }
          if(cnt < 6){
            $("#next-btn").html("Save");
          }

          var $next,
          $selected = $(".selected");
          $next = $selected.next('.common-secreen-div').length ? $selected.prev('.common-secreen-div') : $first;
          $selected.removeClass("selected").hide();
          $next.addClass('selected').slideDown(1000);
          
        }
      });
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
    function postData(postdata,url){
        $.ajax({
            url: url,
            type: "post",
            data: postdata,
            success: function(data){
                
                
                if(data.success){
                    cnt = cnt + 1; 
                    $(".round"+cnt).addClass("active");
                    if (cnt > 1) {
                      //$("#back-btn").show();
                    }
                    if(cnt == 6){
                      $("#next-btn").hide();
                    }
                    $("#reg_step_all").hide();
                    $("#reg_step_all").html(data.html);$("#reg_step_all").slideDown(1000);;
                    //$(".common-secreen-div").slideDown(1000);
                }
                else if(data.codee == 100){
                    console.log("inside 100");
                    location.reload();
                }
            }
        });

        
    }

</script>

<script>
    $(document).ready(function(){
        $(document).on("click",".services-contain-div",function(){
            $("#screen-one").hide();
            $("#screen-two-search-box").show();
            $("#next-btn").click(function(){
                $("#screen-two-search-box").hide();
            });
        });
        $(document).on("click",".close-btn-main-div",function(){
            $("#screen-two-search-box").hide();
            $("#screen-one").show();
        });
        $(document).on("click",".search-input-field",function(){
            $("#screen-one").hide();
            $("#screen-two-search-box").show();
            $("#next-btn").click(function(){
                $("#screen-two-search-box").hide();
            });
        });
    });
</script>

<script>
  $(document).ready(function(){
      $(".multiple-radio-btn-main-div .radio-container").click(function(){
        $('.multiple-radio-btn-main-div .radio-container').removeClass('active');
        $(this).addClass('active');
      });
    });
</script>


<script>
    $(document).on("change",".common-checkbox-div",function(){

        if($(this).prop("checked") == true){
                $(this).next(".checkmark").css("border","unset");
            }
            else if($(this).prop("checked") == false){
                $(this).next(".checkmark").css("border","2px solid #ed145b");
            }
        
    });
    $('.common-checkbox-div:checked').each(function(index, elem) {
        $(this).next(".checkmark").css("border","unset");
      });
</script>



<script>
    $(document).ready(function(e){
       $(document).on("click",".add-service-btn-div",function(e){
        var cur_block = $(".countInputs").length+3;
        
        var htm = ' <div class="service-menu-new-add-div countInputs">\
        <div class="row">\
            <div class="col-md-7 padding-remove-div">\
                <input type="text" name="service['+cur_block+'][name]" id="service_name'+cur_block+'" class="form-control" >\
            </div>\
            <div class="col-md-2 padding-remove-div">\
                <input type="text" name="service['+cur_block+'][duration]" id="service_duration'+cur_block+'" class="form-control" >\
            </div>\
            <div class="col-md-2 padding-remove-div">\
                <input type="text" name="service['+cur_block+'][price]" id="service_price'+cur_block+'" class="form-control" >\
            </div>\
            <div class="col padding-remove-div">\
                <div class="close-btns">\
                    <i class="fas fa-times"></i>\
                </div>\
            </div>\
        </div>\
    </div>';

         $(".rows:last").append(htm);

        $("#service_name"+cur_block).rules("add", {
           required:true,
        });
        $("#service_duration"+cur_block).rules("add", {
           required:true,
        });
        $("#service_price"+cur_block).rules("add", {
           required:true,
        });

         return false;
       });
       $(document).on('click','.close-btns', function(){
          $(this).closest('.row').remove();
       })
    });
</script>

<!-- Append div Add service btn End --> 



<!-- Append div Add Staff btn -->


<script>
    $(document).ready(function(e){
       $(document).on('click',".add-staff-btn-div",function(e){
            var cur_blocks = $(".countInputs").length+4;
            var staffRow = '<div class="add-staff-rows countstaff">\
                            <div class="row">\
                                <div class="col padding-remove-div"> \
                                    <div class="light-dots-div">\
                                    </div>\
                                </div>\
                                <div class="col-md-3 padding-remove-div">\
                                    <input type="text" class="form-control" placeholder="" name="staff['+cur_blocks+'][name]" id="staff_name'+cur_blocks+'" >\
                                </div>\
                                <div class="col-md-3 padding-remove-div">\
                                    <input type="text" class="form-control" placeholder="" name="staff['+cur_blocks+'][email]" id="staff_email'+cur_blocks+'">\
                                </div>\
                                <div class="col-md-2 padding-remove-div">\
                                    <input type="text" class="form-control" placeholder="" name="staff['+cur_blocks+'][phone]" id="staff_phone'+cur_blocks+'">\
                                </div>\
                                <div class="col-md-2 padding-remove-div">\
                                    <div class="form-group add-staff-select-box">\
                                        <i class="fas fa-caret-down"></i>\
                                      <select class="form-control" name="staff['+cur_blocks+'][role]" id="staff_role'+cur_blocks+'">\
                                        <option value="">Select Role</option>\
                                        <option value="2">Staff</option>\
                                        <option value="1">Manager</option>\
                                      </select>\
                                    </div>\
                                </div>\
                                <div class="col padding-remove-div">\
                                    <div class="close-btns">\
                                        <i class="fas fa-times"></i>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>';
         $(".add-staff-rows:last").append(staffRow);

            $("#staff_name"+cur_blocks).rules("add", {
               required:true,
            });
            $("#staff_email"+cur_blocks).rules("add", {
               required:true,
               email:true,
            });
            
            $("#staff_role"+cur_blocks).rules("add", {
               required:true,
            });
            return false;
       });
       $(document).on('click','.close-btns', function(){
          $(this).closest('.row').remove();
       })
    });
</script>
@endpush