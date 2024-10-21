<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title></title> 
    <link rel="stylesheet" type="text/css" href="css/test.css">
    <link rel="stylesheet" type="text/css" href="css/style-client.css">

    <!-- API Feedapay  -->
    <script type="text/javascript" src="https://cdn.fedapay.com/checkout.js?v=1.1.2"></script>

</head>
<body>
	<button id="pay-btn">Payer 1000 FCFA</button>
	<script type="text/javascript">
		FedaPay.init('#pay-btn', {
			public_key:'pk_sandbox_bvWmRqGXlwQUBCJvDrp3SPew',
			transaction:{
				amount:1000,
				description:'Acheter mon produit'
			},
			customer:{
				email:'divinbadidi081@gmail.com',
				lastname:'divin'
			},
		});
	</script>
</body>
</html>