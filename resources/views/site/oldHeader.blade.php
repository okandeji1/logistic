<script>
    var origin;
    var destination;
    var originRegion;
    var destinationRegion;
    var amount;


    // Select buttons
    let fieldsCancelBTN = document.querySelector('#fieldsCancelBTN');
    let priceCancelBTN = document.querySelector('#priceCancelBTN');
    // Set time out
    fieldsCancelBTN.addEventListener('click', cancelClicked, false);
    priceCancelBTN.addEventListener('click', cancelClicked, false);
    // Reload page after cancel is clicked
    function cancelClicked() {
        document.getElementById('paymentForm').reset()
        return
        // setTimeout(() => {
        //     window.location.reload(true)
        // }, 2000)
    }

    // Display some form fields
    $('#next').on('click', (e) => {
        // Initials
        let pickupRegion = document.getElementById('pickupRegion').value;
        let pickupAddress = document.getElementById('pickupAddress').value;
        let deliveryRegion = document.getElementById('deliveryRegion').value;
        let deliveryAddress = document.getElementById('deliveryAddress').value;
        let orderCategory = document.getElementById('orderCategory').value;
        let customerName = document.getElementById('customerName').value;
        let customerPhone = document.getElementById('customerPhone').value;
        let customerEmail = document.getElementById('customerEmail').value;
        let deliveryContactName = document.getElementById('deliveryContactName').value;
        let deliveryContactPhone = document.getElementById('deliveryContactPhone').value;
        // Validations
        if (pickupRegion === '' || typeof pickupRegion === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        if (pickupAddress === '' || typeof pickupAddress === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        if (deliveryRegion === '' || typeof deliveryRegion === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        if (deliveryAddress === '' || typeof deliveryAddress === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        if (orderCategory === '' || typeof orderCategory === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        if (customerName === '' || typeof customerName === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        if (customerPhone === '' || typeof customerPhone === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        if (customerEmail === '' || typeof customerEmail === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        if (deliveryContactName === '' || typeof deliveryContactName === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        if (deliveryContactPhone === '' || typeof deliveryContactPhone === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        calculateDistances();

        $('.closeMe').addClass('d-none')
        $('.checkout').removeClass('d-none')

    })

    function calculateDistances() {
        originRegion = document.getElementById('pickupRegion').value;
        destinationRegion = document.getElementById('deliveryRegion').value;
        // Enter source and destination city
        origin = document.getElementById('pickupAddress').value + originRegion;
        destination = document.getElementById('deliveryAddress').value + destinationRegion;

        // make ajax request
        let request = $.ajax({
            url: "{{ url('/distance-matrix') }}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "origin": origin,
                "destination": destination
            },
        });
        request.done(function(data) {
            let response = data.rows[0].elements[0].distance.value;
            let payment = document.getElementById('payment')
            amount = 200 + Math.ceil(response / 1000) * (65);
            payment.value = amount;
            let price = document.querySelector('.price')
            let convert = amount.toLocaleString()
            price.innerHTML = '₦ ' + convert;
        });
        request.fail(function(err) {
            console.log(err)
        })
    }
    var paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener('submit', payWithPaystack, false);

    function payWithPaystack(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ url('/site-order') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "payment": document.getElementById('payment').value,
                "customerName": document.getElementById('customerName').value,
                "customerEmail": document.getElementById('customerEmail').value,
                "customerPhone": document.getElementById('customerPhone').value,
                "pickupRegion": document.getElementById('pickupRegion').value,
                "pickupAddress": document.getElementById('pickupAddress').value,
                "deliveryRegion": document.getElementById('deliveryRegion').value,
                "deliveryAddress": document.getElementById('deliveryAddress').value,
                "orderCategory": document.getElementById('orderCategory').value,
                "deliveryContactPhone": document.getElementById('deliveryContactPhone').value,
                "deliveryContactName": document.getElementById('deliveryContactName').value,
            },
            success: function(data) {
                console.log(JSON.stringify(data))
                window.location.reload('/');
                //alert(data)
            },
            error: function(error) {
                console.log(error)
            }
        });
    }

</script>
