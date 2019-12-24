<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="<?=base_url()?>assets/libs/jquery/jquery-1.11.3.min.js"></script>
	
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
</head>
<body>
	<div id="paypal-button-container"></div>
	<div class="msg"></div>
	<script>
		paypal.Button.render(
		{
			env: 'sandbox', // sandbox | production
			client:
			{
				sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
				production: '<insert production client id>'
			},
			payment: function(data, actions)
			{
				return actions.payment.create(
				{
					transactions:
					[
						{
							amount: { total: '72.00', currency: 'BRL' }
						}
					]
				});
			},
			// Wait for the payment to be authorized by the customer
			onAuthorize: function(data, actions)
			{
				// Get the payment details
				return actions.payment.get().then(function(data)
				{
					console.log(data);
					$('.msg').append('<div><strong>TRANSAÇÃO:</strong> '+data.id+'</div>');
					$('.msg').append('<div><strong>DATA:</strong> '+data.create_time+'</div>');
					return actions.payment.execute().then(function()
					{
						$('.msg').append('<div><strong>OBRIGADO, TRANSAÇÃO CONCLUÍDA COM SUCESSO!!!</strong></div>');
					});
				});
			}
		}, '#paypal-button-container');
	</script>
</body>
</html>
<!-- <!DOCTYPE html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
</head>
<body>
	<div id="paypal-button-container"></div>
	<script>
		paypal.Button.render({

			env: 'sandbox', // sandbox | production

			// PayPal Client IDs - replace with your own
			// Create a PayPal app: https://developer.paypal.com/developer/applications/create
			client: {
				sandbox:    'AYX_Ge4IWm86f417fZRdus1Hj4dEXA5Omaq9fVNy7CCU_2hy0aSIxkiuUM3SUGdkxSGhm7600Q22qg8q',
				production: 'AZ7xDwxFtVgpA6lrNL-U_d4qhk65nRq1H6CSd0fJDUtuO56iy5T1oclr_Wwjvhg2ekubwvmx05hBAH0v'
			},

			// Show the buyer a 'Pay Now' button in the checkout flow
			commit: true,

			// payment() is called when the button is clicked
			payment: function(data, actions) {

				// Make a call to the REST api to create the payment
				return actions.payment.create(
				{
					transactions: [
						{
							amount: { total: '65.00', currency: 'BRL' },
						}
					]
				});
			},

			// onAuthorize() is called when the buyer approves the payment
			onAuthorize: function(data, actions) {

				// Make a call to the REST api to execute the payment
				return actions.payment.execute().then(function() {
					window.alert('Payment Complete!');
				});
			}

		}, '#paypal-button-container');

	</script>
</body> -->