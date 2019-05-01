@extends('layouts.app-inner')

@section('content')

<div class="dashboard-wrapper dashboard-wrapper-new-div ">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
             <div class="ecommerce-widget">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="admin-penal-right-side-contain-common-main-div">
                             <div class="card common-card-div business-logo-main">
                                <h2 class="pb-2">Business Logo</h2>
                                <div class="common_business text-center pd-10">
                                    <span class="heading pb-2">Business logo</span>
                                    <p>Logo will be shown on customer booking page and all notification emails.</p>
                                    <p><i class="fa fa-cloud-upload-alt"></i></p>
                                    <p>Best size 150px by 100px PNG or JPG only</p>
                                </div>
                                <div class="pt-4">
                                    <div class="business-button pt-2">
                                        <h2 class="pb-2 pt-5">Business Information</h2>
                                            <button class="btn">Update</button>
                                    </div>
                                    <div class="business-logo common_business">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="information-school">
                                                    <div class="pb-2">
                                                       <p>Name of your business
                                                        <span>(This will be display everywere including receipts )</span> </p>
                                                    </div>
                                                    <div class="form-group ">
                                                        <input type="text" class="form-control shadow form-information"  placeholder="Art Schhol">
                                                    </div>
                                                </div>
                                                <div class="information-school pt-3">
                                                    <div class="pb-2">
                                                        <p>Business Description</p>
                                                    </div>
                                                    <div class="form-group ">
                                                       <textarea class="form-control shadow form-information" placeholder="Description" rows="4" style="resize: none;"></textarea>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="information-school">
                                                    <div class="pb-2">
                                                       <p>Business Location</p>
                                                    </div>
                                                    <div class="form-group ">
                                                        <input type="text" class="form-control shadow form-information business-location"  placeholder="Ferozepur">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="information-school">
                                                            <div class="form-group pt-4">
                                                                 <select class=" form-control shadow select-information"  name="india">
                                                                    <option>India</option>
                                                                    <option>japan</option>
                                                                    <option>chaina</option>
                                                                    <option>pakistan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                         <div class="information-school">
                                                            <div class="form-group pt-4">
                                                                 <select class=" form-control shadow select-information" name="rogion">
                                                                    <option>No Rogion</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="information-school">
                                                            <div class="form-group pt-4">
                                                                 <select class="form-control  shadow select-information" name="city">
                                                                    <option>No City</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                         <div class="information-school">
                                                            <div class="form-group pt-4">
                                                                 <select class="shadow select-information form-control" name="pincord">
                                                                    <option>142052</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-4">
                                    <div class="business-button pt-2">
                                        <h2 class="pb-2 pt-5 ">Profession </h2>
                                    </div>
                                    <div class="business-information common_business">
                                        <div class="row">
                                            <div class="col-sm-6">
                                               <div class="information-school">
                                                    <div class="pb-2">
                                                       <p>Please select the profession that best sescribes your business.</p>
                                                    </div>
                                                    <div class="form-group ">
                                                        <select class="shadow select-information form-control " name="airchart">
                                                                <option>Air Chart Services</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="information-school">
                                                    <div class="pb-2">
                                                       <p>Business Phone</p>
                                                    </div>
                                                    <div class="form-group ">
                                                        <input type="text" class="form-control shadow form-information business-location"  placeholder="XXXXX-XXXXX">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-4">
                                    <div class="business-button pt-2">
                                        <h2 class="pb-2 pt-5">Timezone and Currency</h2>
                                    </div>
                                    <div class="timezone-and-currency common_business">
                                        <div class="row">
                                            <div class="col-sm-6">
                                               <div class="information-school">
                                                    <div class="form-group ">
                                                        <div class="pb-2">
                                                             <p>Timezone</p>
                                                        </div>
                                                        <select class="shadow select-information form-control " name="timezone">
                                                                <option>Tahiti (GMT - 10:00)</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mt-4 mb-2">
                                                    <div class="col-sm-6">
                                                        <div class="information-school">
                                                            <div class="pb-2">
                                                               <p>Currency</p>
                                                            </div>
                                                            <select class="shadow select-information form-control " name="timezone">
                                                                <option>MXN ($)</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                     <div class="col-sm-6">
                                                        <div class="information-school">
                                                            <div class="pb-2">
                                                               <p>Currency Format</p>
                                                            </div>
                                                            <select class="shadow select-information form-control " name="timezone">
                                                                <option>XX,XX,XX</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="information-school">
                                                            <div class="pb-2">
                                                               <p>Time Format</p>
                                                            </div>
                                                            <select class="shadow select-information form-control " name="timezone">
                                                                <option>12:00</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                     <div class="col-sm-6">
                                                        <div class="information-school">
                                                            <div class="pb-2">
                                                               <p>Date Format</p>
                                                            </div>
                                                            <select class="shadow select-information form-control " name="timezone">
                                                                <option>DD/MM/YY</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-4">
                                    <div class="business-button pt-2">
                                        <h2 class="pb-2 pt-5">Language Preference</h2>
                                    </div>
                                    <div class="language-preference common_business">
                                        <div class="row">
                                            <div class="col-sm-6">
                                               <div class="information-school">
                                                    <div class="pb-2">
                                                       <p>Language preference</p>
                                                    </div>
                                                    <div class="form-group ">
                                                        <select class="shadow select-information form-control " name="airchart">
                                                                <option>English</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <a href="#">
                                                     <div class="business-language mt-4">
                                                        <p>Click here to one language editor.</p>
                                                    </div>
                                                </a>
                                            </div>
                                           
                                            <div class="col-sm-6">
                                                <div class="information-school">
                                                    <div class="pb-2">
                                                       <p> Selected Language </p>
                                                    </div>
                                                    <div class="form-group ">
                                                        <select class="shadow select-information form-control " name="airchart">
                                                                <option>Select one Language</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-4">
                                    <div class="business-button pt-2">
                                        <h2 class="pb-2 pt-5">Personal Information</h2>
                                    </div>
                                    <div class="personal-information common_business">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                       <div class="information-school">
                                                            <div class="pb-2">
                                                               <p>Name</p>
                                                            </div>
                                                            <div class="form-group ">
                                                                <input type="text" class="form-control shadow form-information"  placeholder="Master">
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="col-sm-6">
                                                        
                                                       <div class="information-school">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control shadow form-information business-name"  placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>    
                                                </div>
                                                <div class="information-school pt-3">
                                                    <div class="pb-2">
                                                       <p>Email</p>
                                                    </div>
                                                    <div class="form-group ">
                                                        <input type="text" class="form-control shadow form-information"  placeholder="admin@gmail.com">
                                                    </div>
                                                </div>
                                                <a href="#">
                                                     <div class="business-language mt-4">
                                                        <p>Change Email</p>
                                                    </div>
                                                </a>
                                            </div>
                                           
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="information-school">
                                                            <div class="pb-2">
                                                               <p> Password </p>
                                                            </div>
                                                            <div class="form-group ">
                                                                <input type="text" class="form-control shadow form-information"  placeholder="Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                        <div class="business-language business-password ">
                                                            <p>Change Password</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-4">
                                     <div class="business-button pt-2">
                                        <h2 class="pb-2 pt-5 ">Contact Information</h2>
                                    </div>
                                    <div class="contact-information common_business">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="information-school">
                                                    <div class="pb-2">
                                                       <p>Home Phone</p>
                                                    </div>
                                                    <div class="form-group ">
                                                        <input type="text" class="form-control shadow form-information business-phone"  placeholder="+91">
                                                        <input type="text" class="form-control shadow form-information business-home"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="information-school">
                                                    <div class="pb-2">
                                                       <p>Mobile Phone</p>
                                                    </div>
                                                    <div class="form-group ">
                                                        <input type="text" class="form-control shadow form-information business-phone"  placeholder="+91">
                                                        <input type="text" class="form-control shadow form-information business-home"  placeholder="">
                                                    </div>
                                                </div>
                                                <a href="#">
                                                     <div class="business-language mt-4">
                                                        <p>Click Verify</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="information-school">
                                                    <div class="pb-2">
                                                       <p>Work Phone</p>
                                                    </div>
                                                    <div class="form-group ">
                                                        <input type="text" class="form-control shadow form-information business-phone"  placeholder="+91">
                                                        <input type="text" class="form-control shadow form-information business-home"  placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection