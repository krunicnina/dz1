<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forma</title>
    <link rel="stylesheet" type="text/css" href="css/formadizajn.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quietflow@1.0.2/lib/quietflow.min.js"></script>
   
</head>
<body class="container" id="Form">
   <form name="form"  action="#" method="POST"  class="login-form" >
<h1>Prijavi se</h1>
<div class="flex-input">
<label class="">Email</label>
<input type="text" size="30"  placeholder="Email"name="email"required >
</div>


<div class="flex-input">
<label for="">Password</label>
<input type="password" size="30" placeholder="Password"name="password"required >
</div>

<div>
<button id="submit"type="submit">Submit</button>
</div>
<div class="flex-container">
    <div style="text-align: right;">
        <input type="reset"id="reset">

</div>
</div>

   </form>

</body>
</html>