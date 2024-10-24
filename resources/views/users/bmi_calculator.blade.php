@extends('layouts.frontend')
@section('section')

 @include('user_common.breadcrumb')

    <!-- BMI Calculator Section Begin -->
    <section class="bmi-calculator-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title chart-title">
                        <span>check your body</span>
                        <h2>BMI CALCULATOR CHART</h2>
                    </div>
                    <div class="chart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Bmi</th>
                                    <th>WEIGHT STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="point">Below 18.5</td>
                                    <td>Underweight</td>
                                </tr>
                                <tr>
                                    <td class="point">18.5 - 24.9</td>
                                    <td>Healthy</td>
                                </tr>
                                <tr>
                                    <td class="point">25.0 - 29.9</td>
                                    <td>Overweight</td>
                                </tr>
                                <tr>
                                    <td class="point">30.0 - and Above</td>
                                    <td>Obese</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title chart-calculate-title">
                        <span>check your body</span>
                        <h2>CALCULATE YOUR BMI</h2>
                    </div>
                    <div class="chart-calculate-form">
                        <p>Your health is your wealth; take a moment to calculate your BMI and invest in yourself today!</p>
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" id="height" placeholder="Height / cm">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="weight" placeholder="Weight / kg">
                                </div>
                                <!-- <div class="col-sm-6">
                                    <input type="text" id="age" placeholder="Age">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="sex" placeholder="Sex">
                                </div> -->
                                <div class="col-lg-12">
                                <div class="BMI-switch span">Calculate</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BMI Calculator Section End -->


@endsection

@push('style')
<style>
.chart-calculate-form form .span {
    text-align: center;
    font-size: 14px;
    color: #ffffff;
    text-transform: uppercase;
    font-weight: 700;
    width: 100%;
    border: none;
    padding: 15px 0;
    background: #2FA1EA;
}
</style>
@endpush

@push('script')
<script>
$(".span").click(function(){
    height = $('#height').val();
    weight = $('#weight').val();

    height_in_ft = height / 100;

    n_height = height_in_ft * height_in_ft;

    result = weight / n_height;



    bmi = parseFloat(result).toFixed(2);

    stats = 'Please fill the fields !';

if(bmi < 18.00)
{
    status = 'Underweight';
    

}else if(bmi >= 18.00 && bmi <= 25.00){
    
    status = 'Healthy';


}else if(bmi > 25.00 && bmi <= 30.00){

    status = 'Overweight';

}else if(bmi > 30.00){

status = 'Obese';

}

  Swal.fire({
  title: 'BMI is '+parseFloat(bmi).toFixed(2)+' ',
  text: 'Weight status : '+status,
  icon: 'info',
  button:true,
    button:'OK',
});

});
</script>
@endpush