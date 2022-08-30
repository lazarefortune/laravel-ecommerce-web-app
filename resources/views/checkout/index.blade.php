@extends('layouts.boutique')

@section('extra-script')
<script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')



<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-xs-12 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Payment Details
                    </h3>
                </div>
                <div class="panel-body">
                    <form id="payment-form">
                    <div  id="card-element" class="my-4">

                    </div>
                    <!-- <div class="form-group">
                        <label for="cardNumber">
                            Numéro de carte</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label for="expityMonth">
                                    EXPIRY DATE</label>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                </div>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="cvCode">
                                    CV CODE</label>
                                <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                            </div>
                        </div>
                    </div> -->

                    <!-- We'll put the error messages in this element -->
                    <div id="card-errors" role="alert" class="text-danger"></div>
                    <!-- 6789 2976 5245 5672
                    12/20
                    1222 -->
                      <button type="submit" class="btn btn-success btn-lg btn-block my-5" name="button">Pay</button>
                    </form>
                </div>
            </div>
            <!-- <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span>4200</span> Final Payment</a>
                </li>
            </ul>
            <br/> -->
            <!-- <a href="http://www.jquery2dotnet.com" class="btn btn-success btn-lg btn-block" role="button">Pay</a> -->
        </div>
    </div>
</div>


@endsection

@section('extra-js')
<script >
  var stripe = Stripe('pk_test_51H2S30HzZo5HBa1ViNfXtYnVFR7Eng07bHV5xqwJEpC8uyX1OmgU4TXqv1CfhdnVFpHcSh7gUx17WQomjJgKmwvq00TCzQFW66');
  var elements = stripe.elements();
  var style = {
      base: {
        color: "#32325d",
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder": {
          color: "#aab7c4"
        }
      },
      invalid: {
        color: "#fa755a",
        iconColor: "#fa755a"
      }
    };

    var card = elements.create("card", { style: style });
    card.mount("#card-element");

    card.on('change', ({error}) => {
    const displayError = document.getElementById('card-errors');
    if (error) {
      // displayError.classList.add('alert', 'alert-warning');
      displayError.textContent = error.message;
    } else {
      // displayError.classList.remove('alert', 'alert-warning');
      displayError.textContent = '';
    }
  });

  //soumission du form
  var form = document.getElementById('payment-form');

  form.addEventListener('submit', function(ev) {
    ev.preventDefault();

    submitButton.disabled = true;

    stripe.confirmCardPayment("{{ $clientSecret }}", {
      payment_method: {
        card: card,
        // billing_details: {
        //   name: 'Jenny Rosen'
        // }
      }
    }).then(function(result) {
      if (result.error) {
        // Show error to your customer (e.g., insufficient funds)
        submitButton.disabled = false;
        console.log(result.error.message);
      } else {
        // The payment has been processed!
        if (result.paymentIntent.status === 'succeeded') {
          // Show a success message to your customer
          // There's a risk of the customer closing the window before callback
          // execution. Set up a webhook or plugin to listen for the
          // payment_intent.succeeded event that handles any business critical
          // post-payment actions.
          console.log($result.payementIntent);
        }
      }
    });
});
</script>
@endsection
