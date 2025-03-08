<!DOCTYPE html>
<html>

<head>
    <title>Midtrans Payment</title>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

</head>

<body>
    <button id="pay-button">Pay Now</button>

    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            window.snap.pay("{{ $snapToken }}", {
                onSuccess: function(result) {
                    console.log("Payment Success:", result);
                    alert("Payment successful!");
                },
                onPending: function(result) {
                    console.log("Payment Pending:", result);
                    alert("Waiting for payment...");
                },
                onError: function(result) {
                    console.log("Payment Failed:", result);
                    alert("Payment failed!");
                },
                onClose: function() {
                    alert("Payment popup closed without finishing the payment.");
                }
            });
        };
    </script>
</body>

</html>
