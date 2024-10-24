<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('frontend_assets/img/Cactus_logo.png')}}" rel="icon">
    <link href="{{ asset('frontend_assets/img/Cactus_logo.png')}}" rel="apple-touch-icon">
    <title>Receipt</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation-flex.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <style>
     body {
	 font-family: 'Montserrat', sans-serif;
	 font-weight: 400;
	 color: #322d28;
}
header.top-bar h1 {
	 font-family: 'Montserrat', sans-serif;
}
 main {
	 margin-top: 4rem;
	 min-height: calc(100vh - 107px);
}
 main .inner-container {
	 max-width: 800px;
}
 table.invoice {
	 background: #fff;
}
 table.invoice .num {
	 font-weight: 200;
	 text-transform: uppercase;
	 letter-spacing: 1.5px;
	 font-size: 0.8em;
}
 table.invoice tr, table.invoice td {
	 background: #fff;
	 text-align: left;
	 font-weight: 400;
	 color: #322d28;
}
 table.invoice tr.header td img {
	 max-width: 220px !important;
}
 table.invoice tr.header td h2 {
	 text-align: right;
	 font-family: 'Montserrat', sans-serif;
	 font-weight: 200;
	 font-size: 2rem;
	 color: #1779ba;
}
 table.invoice tr.intro td:nth-child(2) {
	 text-align: right;
}
 table.invoice tr.details > td {
	 padding-top: 4rem;
	 padding-bottom: 0;
}
 table.invoice tr.details td.id, table.invoice tr.details th.id, table.invoice tr.details td.qty, table.invoice tr.details th.qty {
	 text-align: center;
}
 table.invoice tr.details td:last-child, table.invoice tr.details th:last-child {
	 text-align: right;
}
 table.invoice tr.details table thead, table.invoice tr.details table tbody {
	 position: relative;
}
 table.invoice tr.details table thead:after, table.invoice tr.details table tbody:after {
	 content: '';
	 height: 1px;
	 position: absolute;
	 width: 100%;
	 left: 0;
	 margin-top: -1px;
	 background: #c8c3be;
}
 table.invoice tr.totals td {
	 padding-top: 0;
}
 table.invoice tr.totals table tr td {
	 padding-top: 0;
	 padding-bottom: 0;
}
 table.invoice tr.totals table tr td:nth-child(1) {
	 font-weight: 500;
}
 table.invoice tr.totals table tr td:nth-child(2) {
	 text-align: right;
	 font-weight: 200;
}
 table.invoice tr.totals table tr:nth-last-child(2) td {
	 padding-bottom: 0.5em;
}
 table.invoice tr.totals table tr:nth-last-child(2) td:last-child {
	 position: relative;
}
 table.invoice tr.totals table tr:nth-last-child(2) td:last-child:after {
	 content: '';
	 height: 4px;
	 width: 110%;
	 border-top: 1px solid #1779ba;
	 border-bottom: 1px solid #1779ba;
	 position: relative;
	 right: 0;
	 bottom: -0.575rem;
	 display: block;
}
 table.invoice tr.totals table tr.total td {
	 font-size: 1.2em;
	 padding-top: 0.5em;
	 font-weight: 700;
}
 table.invoice tr.totals table tr.total td:last-child {
	 font-weight: 700;
}
 .additional-info h5 {
	 font-size: 0.8em;
	 font-weight: 700;
	 text-transform: uppercase;
	 letter-spacing: 2px;
	 color: #1779ba;
}
@media print{

 header.top-bar h1 {
	 font-family: 'Montserrat', sans-serif;
}
 main {
	 margin-top: 0;
	 min-height: calc(100vh - 107px);
}

 table.invoice {
	 background: #fff;
}
 table.invoice .num {
	 font-weight: 200;
	 text-transform: uppercase;
	 letter-spacing: 1.5px;
	 font-size: 0.8em;
}
 table.invoice tr, table.invoice td {
	 background: #fff;
	 text-align: left;
	 font-weight: 400;
	 color: #322d28;
}

 table.invoice tr.header td h2 {
	 text-align: right;
	 font-family: 'Montserrat', sans-serif;
	 font-weight: 200;
	 font-size: 2rem;
	 color: #1779ba;
}
 table.invoice tr.intro td:nth-child(2) {
	 text-align: right;
}
 table.invoice tr.details > td {
	 padding-top: 4rem;
	 padding-bottom: 0;
}
 table.invoice tr.details td.id, table.invoice tr.details th.id, table.invoice tr.details td.qty, table.invoice tr.details th.qty {
	 text-align: center;
}
 table.invoice tr.details td:last-child, table.invoice tr.details th:last-child {
	 text-align: right;
}
 table.invoice tr.details table thead, table.invoice tr.details table tbody {
	 position: relative;
}
 table.invoice tr.details table thead:after, table.invoice tr.details table tbody:after {
	 content: '';
	 height: 1px;
	 position: absolute;
	 width: 100%;
	 left: 0;
	 margin-top: -1px;
	 background: #c8c3be;
}
 table.invoice tr.totals td {
	 padding-top: 0;
}
 table.invoice tr.totals table tr td {
	 padding-top: 0;
	 padding-bottom: 0;
}
 table.invoice tr.totals table tr td:nth-child(1) {
	 font-weight: 500;
}
 table.invoice tr.totals table tr td:nth-child(2) {
	 text-align: right;
	 font-weight: 200;
}
 table.invoice tr.totals table tr:nth-last-child(2) td {
	 padding-bottom: 0.5em;
}
 table.invoice tr.totals table tr:nth-last-child(2) td:last-child {
	 position: relative;
}
 table.invoice tr.totals table tr:nth-last-child(2) td:last-child:after {
	 content: '';
	 height: 4px;
	 width: 110%;
	 border-top: 1px solid #1779ba;
	 border-bottom: 1px solid #1779ba;
	 position: relative;
	 right: 0;
	 bottom: -0.575rem;
	 display: block;
}
 table.invoice tr.totals table tr.total td {
	 font-size: 1.2em;
	 padding-top: 0.5em;
	 font-weight: 700;
}
 table.invoice tr.totals table tr.total td:last-child {
	 font-weight: 700;
}
 .additional-info h5 {
	 font-size: 0.8em;
	 font-weight: 700;
	 text-transform: uppercase;
	 letter-spacing: 2px;
	 color: #1779ba;
}

.buttn{
    display: none !important;
}

}
    </style>
</head>
<body>
    
<div class="row expanded" id="printableArea">
  <main class="columns">
    <div class="inner-container">
    <header class="row align-center buttn">
        <a class="button hollow secondary"><i class="ion ion-chevron-left"></i> Go Back</a>
        &nbsp;&nbsp;<a class="button" onclick="printDiv('printableArea')"><i class="ion ion-ios-printer-outline"></i> Print Invoice</a>
      </header>
    <section class="row">
      <div class="callout large invoice-container">
        <table class="invoice">
          <tr class="header">
            <td class="align-left">
              <img src="{{ asset('frontend_assets/img/Cactus_logo.png')}}" alt="Company Name" />
            </td>
            <td class="align-right">
              <h2>Invoice</h2>
            </td>
          </tr>
          <tr class="intro">
            <td class="">
              Hello, {{$member->name}}<br>
              Thank you for join with us.
            </td>
            <td class="text-right">
              <span class="num">Receipt No. #{{$bill->id}}</span><br>
              {{date('F-d, Y')}}
            </td>
          </tr>
          <tr class="details">
            <td colspan="2">
              <table>
                <thead>
                  <tr>
                    <th class="desc">Plan</th>
                    <th class="id"></th>
                    <th class="qty"></th>
                    <th class="amt">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="item">
                    <td class="desc">{{$bill->package}}</td>
                    <td class="id num"></td>
                    <td class="qty"></td>
                    <td class="amt">{{number_format($bill->total_amount,2)}}</td>
                  </tr>
                </tbody>
              </table>
            </td> 
          </tr>
          <tr class="totals">
            <td></td>
            <td>
              <table>
                <tr class="subtotal">
                  <td class="num">Subtotal</td>
                  <td class="num">₹ {{number_format($bill->total_amount,2)}}</td>
                </tr>
                <tr class="fees">
                  <td class="num">Discount</td>
                  <td class="num">₹ {{number_format($bill->discount,2)}}</td>
                </tr>
                <tr class="total">
                  <td>Total</td>
                  <td>₹ {{number_format($bill->payable_amount,2)}}</td>
                </tr>
                <tr class="total">
                  <td>Paid</td>
                  <td>₹ {{number_format($bill->paid_amount,2)}}</td>
                </tr>
                @if($bill->balance_amount != 0)
                <tr class="fees">
                  <td class="num">Outstanding</td>
                  <td class="num">₹ {{number_format($bill->balance_amount,2)}}</td>
                </tr>
                @endif
                
              </table>
            </td>
          </tr>
        </table>
        
        <section class="additional-info">
        <div class="row">
          <div class="columns">
            <h5>Billing Information</h5>
            <p>Cactus Fitness<br>
            Plot no. 5, Chhaya Colony,<br>
            Parvati Nagar,<br>
            Akoli Road Amravati</p>
          </div>
          <div class="columns">
            <h5>Payment Information</h5>
            <p>{{$bill->pay_mode}}
              </p>
              <br><br>
              <div  style="text-align:center"> <b> {{App\Models\User::findOrFail($bill->created_by)->name}} <br> Receiver </b> </div>
          </div>
        </div>
        </section>
      </div>
    </section>
    </div>
  </main>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.js"></script>
<script>
    function printDiv(divId) {
     var printContents = document.getElementById(divId).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</body>
</html>