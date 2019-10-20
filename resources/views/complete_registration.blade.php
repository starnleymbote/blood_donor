@extends('layouts.main')

@section('data')

<div class="container">

        <div class="row justify-content-center">
    
            <div class="col-md-11">

                <div class="card">

                    <div class="card-header" style="text-align: center"> <b> Complete Registration Here </b></div>
                    
            
                </div>
    
            </div> 
            <br><br><br>
            {{$donor_details}}
                
            
            <div class="col-lg-10 book-appointment p-sm-5 py-5 px-4">
                    <h2>Personal Details</h2>
                    <div class="book-agileinfo-form">
                        <form action="#" method="post">
                            <div class="row main-agile-sectns">

                                <div class="col-md-6 agileits-btm-spc form-text1">
                                    <label for="Name :">Name :</label>
                                    <input type="text" name="Name" placeholder="Full Name" value="{{$donor_details ->name}}">
                                </div>

                                <div class="col-md-6 agileits-btm-spc form-text2">
                                    <label for="Email">Email :</label>
                                <input type="text" name="Email" placeholder="Email" value="{{$donor_details ->email}}">
                                </div>
                            </div>
                        </div>
                        
                            
                            <div class="clear"></div>
                            <h2 class="sub-head-w3ls">More Personal Details</h2>
                            <div class="row main-agile-sectns">

                                    <div class="col-md-6">
                                            <div class="agileits-btm-spc">
                                                <select id="cab" onchange="change_country(this.value)" class="frm-field required sect">
                                                    <option></option>
                                                    <option value="">Nairobi</option>
                                                    <option value="">Thika</option>
                                                    <option value="">Machakos</option>
                                                    <option value="">Mombasa</option>
                                                    <option value="">Migori</option>
                                                    <option value="">Kisumu</option>
                                                    <option value="">Eldoret</option>
                                                </select>
                                            </div>
                                        </div>

                                <div class="col-md-6 agileits-btm-spc form-text1">
                                    <input  style="color:aliceblue" id="datepicker" name="Text" type="text" placeholder="Due till Date" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}"
                                        required="">
                                </div>
                                <div class="col-md-6 agileits-btm-spc form-text2">
                                    <input type="text" id="timepicker" name="Time" class="timepicker form-control" placeholder="Time" value="">
                                </div>
                            </div>
                            <div class="row main-agile-sectns">
                                
                                <div class="col-md-6">
                                    <div class="agileits-btm-spc">
                                        <select id="cab" onchange="change_country(this.value)" class="frm-field required sect">
                                            <option value="">Blood Type</option>
                                            <option value="">Nairobi</option>
                                            <option value="">Thika</option>
                                            <option value="">Machakos</option>
                                            <option value="">Mombasa</option>
                                            <option value="">Migori</option>
                                            <option value="">Kisumu</option>
                                            <option value="">Eldoret</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 agileits-btm-spc form-text1">
                                    <input type="text" name="Hospital" placeholder="Hospital" required="">
                                </div>
                            </div>
    
                            <div class="main-agile-sectns">
                                <div class="agileits-btm-spc">
                                    <input type="text" name="Hospital" placeholder="Details" required="">
    
                                </div>
                                
                            </div>
                            <input type="submit" value="Make Request">
                            <input type="reset" value="Reset">
                        </form>
                    </div>
                </div>
    
            
        </div>
        
</div>
    
@endsection