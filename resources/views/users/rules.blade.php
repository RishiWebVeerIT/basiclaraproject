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
                            <span>Discipline is the bridge between goals and achievement.</span>
                            <h2>Gym Rules</h2>
                        </div>
                        <ul>
                                <li><p><b>Respect Others:</b> Be courteous to fellow members and staff.</p></li>
                                <li><p><b>Use a Towel:</b> Always use a towel on equipment.</p></li>
                                <li><p><b>Wipe Down Equipment:</b> Clean machines and weights after use.</p></li>
                                <li><p><b>Return Equipment:</b> Put all weights, dumbbells, and other equipment back in their proper place.</p></li>
                                <li><p><b>No Dropping Weights:</b> Lower weights gently to the ground.</p></li>
                                <li><p><b>Proper Attire Required:</b> Wear appropriate gym clothing and closed-toe shoes.</p></li>
                                <li><p><b>Limit Phone Use:</b> Keep phone calls short and avoid using phones on the gym floor.</p></li>
                                <li><p><b>Time Limits on Machines:</b> Observe time limits on cardio machines during peak hours.</p></li>
                                <li><p><b>Locker Use:</b> Store personal belongings in lockers; gym bags are not allowed on the floor.</p></li>
                                <li><p><b>No Food on the Floor:</b> Only water and sports drinks are allowed on the gym floor.</p></li>
                                <li><p><b>Respect Personal Space:</b> Maintain a respectful distance from others while working out.</p></li>
                                <li><p><b>No Unauthorized Training:</b> Only gym-approved trainers may conduct personal training sessions.</p></li>
                                <li><p><b>Keep Noise to a Minimum:</b> Avoid loud grunting, shouting, or playing loud music.</p></li>
                                <li><p><b>Children's Safety:</b> Children under 13 must be supervised and stay in designated areas.</p></li>
                                <li><p><b>Report Problems:</b> Immediately report any equipment malfunctions, spills, or injuries to staff.</p></li>
                                <li><p><b>No Smoking or Vaping:</b> Smoking and vaping are prohibited inside the gym.</p></li>
                                <li><p><b>Observe Signage:</b> Follow all posted signs and notices within the gym.</p></li>
                            </ul>  
                            <h5>These rules help create a safe, clean, and enjoyable environment for everyone using the gym.</h5>
                      
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

    li p , h5 {
    font-size: 17px !important;
    color: white !important;
}

::marker {
    color: white;
}

.blog-details-text li{ 
   margin-bottom: 26px;  
}
</style>
@endpush