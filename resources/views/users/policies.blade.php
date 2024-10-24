@extends('layouts.frontend')
@section('section')
@include('user_common.breadcrumb')

 <!-- Blog Details Section Begin -->

                        

 <section class="blog-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 p-0 m-auto">
                    <div class="blog-details-text">
                        <div>
                        <div class="section-title">
                            <span>Guidelines to Ensure a Safe and Effective Workout Environment.</span>
                            <h2>Gym Policies</h2>
                        </div>

                        <ol>
                                <li><p><b>Membership </b></p>
                                    <ul>
                                        <li><p><b>Eligibility - </b> Members must be at least 18 years old. Minors aged 13-17 require parental consent. </p></li>
                                        <li><p><b>Membership Cards - </b> Members must present their membership card upon entry.</p></li>
                                        <li><p><b>Renewals and Cancellations - </b>Memberships can be renewed or canceled at any time, subject to the terms of the membership agreement.</p></li>
                                    </ul> 
                                </li>
                                <li><p><b>General Conduct</b></p>
                                    <ul>
                                        <li>
                                            <p><b>Respect - </b>Members are expected to treat staff and other members with respect.</p>
                                        </li>
                                        <li>
                                            <p><b>Behaviour - </b>Any form of harassment, bullying, or aggressive behavior will not be tolerated.</p>
                                        </li>
                                        <li>
                                            <p><b>Dress Code - </b>Appropriate gym attire and footwear must be worn at all times.</p>
                                        </li>
                                    </ul>
                                </li>
                                <li><p><b>Facility Usage</b></p>
                                    <ul>
                                        <li>
                                            <p><b>Equipment</b>
                                            <ul>
                                            <li> Wipe down equipment after use.</li>
                                            <li> Return all equipment to its designated place after use</li>
                                            <li> Do not drop weights or misuse equipment</li>
                                            </ul>
                                        </p>
                                        </li>
                                        <li>
                                            <p><b>Towel Requirement - </b>Members are required to use a towel on all equipment during workouts</p>
                                        </li>
                                        <li>
                                            <p><b>Gym Bags - </b>Gym bags must be stored in lockers and not taken onto the gym floor</p>
                                        </li>
                                    </ul>
                                </li>
                                <li><p><b>Hygiene and Safety</b>
                                    <ul>
                                        <li>
                                            <p><b>Personal Hygiene - </b> Members must maintain personal hygiene, including the use of deodorant.</p>
                                        </li>
                                        <li>
                                            <p><b>Illness/Injury - </b>Members should not use the facility if they are unwell or have a contagious condition. Report any injuries or equipment malfunctions immediately</p>
                                        </li>
                                        <li>
                                            <p><b>Fire Exits - </b>Do not block or tamper with fire exits or safety equipment</p>
                                        </li>
                                    </ul>
                                </p>
                                </li>
                                <li><p><b>Lockers and Personal Belongings</b>
                                <ul>
                                    <li>
                                        <p><b>Locker Usage - </b> Lockers are for day use only. Items left overnight will be removed</p>
                                    </li>
                                    <li>
                                        <p><b>Valuables - </b>The gym is not responsible for lost or stolen items. Please keep valuables in a secure locker</p>
                                    </li>
                                </ul>
                                </p></li>

                                <li><p><b>Sauna Etiquette : </b>  Limit sauna use to 15-20 minutes and do not bring electronics inside.</p></li>

                                <li><p><b>Children (if applicable)</b> 
                                <ul>
                                    <li>
                                        <p><b>Supervision - </b>Children under 13 must be supervised by an adult at all times. </p>
                                    </li>
                                    <li>
                                        <p><b>Children’s Area - </b>Children must stay in designated areas and are not allowed on gym
                                        equipment.</p>
                                    </li>
                                </ul>
                                </p></li>

                                <li><p><b>Food and Drink</b>
                                <ul>
                                    <li>
                                        <p><b>Hydration - </b>Only water or sports drinks in sealed containers are allowed on the gym floor</p>
                                    </li>
                                    <li>
                                        <p><b>Food - </b>No food is allowed on the gym floor. Consumption of food is only permitted in designated areas.</p>
                                    </li>
                                </ul>
                                </p></li>
                                <li><p><b>Termination of Membership</b>
                                    <ul>
                                        <li>
                                            <p><b>Violation of Policies - </b>Membership may be terminated for violating gym policies or engaging in unsafe or inappropriate behavior.</p>
                                        </li>
                                        <li>
                                            <p><b>Refunds - </b>Refunds for terminated memberships are subject to the terms outlined in the membership agreement.</p>
                                        </li>
                                    </ul>
                                </p></li>
                                <li><p><b>Emergencies</b>
                                    <ul>
                                        <li>
                                            <p><b>First Aid - </b>In case of an emergency, contact a staff member immediately.</p>
                                        </li>
                                        <li>
                                            <p><b>Emergency Contact - </b>Members are encouraged to provide an emergency contact upon registration.</p>
                                        </li>
                                    </ul>
                                </p></li>
                                
                            </ol>  
                            <h5>These policies can be adapted to fit the specific needs and culture of your gym.</h5>
                      
                        </div>
            
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
@endsection
@push('style')
<style>
    .section-title{
        margin-bottom: unset !important;
        padding: 30px;
        background: #151515;
    }

    li p , h5{
    font-size: 17px !important;
color: white !important;
}

::marker {
    color: white;
}

ol>li{ 
   margin-bottom: 45px;  
}

li ul {
color: white !important;
}

li ul {
margin-left: 40px;
}

</style>
@endpush