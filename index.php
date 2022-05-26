<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>Conversor de Temperatura</title>
</head>
<body>
    
<body>
  <div>
    <input type="number" id="cel" placeholder="Celsius">
    <button id="buttonO" class="button">°C</button>
    </div>
  <div>
    <input type="number" id="fah" placeholder="Fahrenheit">
    <button id="buttonT" class="button">°F</button>
  </div>
  <div>
    <input type="number" id="kel" placeholder="Kelvin">
    <button id="buttonH" class="button">K</button>
  </div>
  <div>
    <input type="number" id="ran" placeholder="Rankine">
    <button id="buttonF" class="button">°R</button>
</div>

		<h4 class="sent-notification"></h4>

		<form id="myForm">
			<h2>Enviar email</h2>
			<input id="name" type="text" placeholder="Seu nome">
			<br><br>
			<input id="email" type="text" placeholder="Seu Email">
			<br><br>
			<input id="subject" type="text" placeholder="Digite o assunto"> 
			<br><br>
			<textarea id="body" rows="4" placeholder="Digite a mensagem"></textarea>
			<br><br>
			<button id="buttonEnviar" type="button" onclick="sendEmail()" value="Send An Email">Enviar</button> 
		</form>
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Mensagem foi enviada!");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>
    <script>
  button1 = document.querySelector("#buttonO").onclick = function(){
    cel = document.querySelector("#cel")
    celv = parseInt(cel.value); 
    let valuef = ((celv*9/5)+32).toFixed(2);
    let valuek = (celv+273.15).toFixed(2);
    let valuer = (((celv+273.15)*9)/5).toFixed(2);
    document.getElementById('fah').placeholder=(valuef)
    document.getElementById('kel').placeholder=(valuek)
    document.getElementById('ran').placeholder=(valuer)
    document.getElementById('fah').value=""
    document.getElementById('kel').value=""
    document.getElementById('ran').value=""
  }
  button2 = document.querySelector("#buttonT").onclick = function(){
    fah = document.querySelector("#fah")
    fahv = parseInt(fah.value);
    let valuec = ((fahv-32)*5/9).toFixed(2);
    let valuek = (((fahv-32)*5/9)+273.15).toFixed(2);
    let valuer = (fahv+459).toFixed(2);
    document.getElementById('cel').placeholder=(valuec)
    document.getElementById('kel').placeholder=(valuek)
    document.getElementById('ran').placeholder=(valuer)
    document.getElementById('cel').value=""
    document.getElementById('kel').value=""
    document.getElementById('ran').value=""
  }
  button3 = document.querySelector("#buttonH").onclick = function(){
    kel = document.querySelector("#kel")
    kelv = parseInt(kel.value);
    let valuec = (kelv-273.15).toFixed(2);
    let valuef = ((kelv-273.15)*9/5+32).toFixed(2);
    let valuer = (kelv*1.8).toFixed(2);
    document.getElementById('cel').placeholder=(valuec)
    document.getElementById('fah').placeholder=(valuef)
    document.getElementById('ran').placeholder=(valuer)
    document.getElementById('cel').value=""
    document.getElementById('fah').value=""
    document.getElementById('ran').value=""
  }
  button4 = document.querySelector("#buttonF").onclick = function(){
    ran = document.querySelector("#ran")
    ranv = parseInt(ran.value);
    let valuec = ((ranv-491.67)*5/9).toFixed(2);
    let valuef = (ranv-459.67).toFixed(2);
    let valuek = (ranv*5/9).toFixed(2);
    document.getElementById('cel').placeholder=(valuec)
    document.getElementById('fah').placeholder=(valuef)
    document.getElementById('kel').placeholder=(valuek)
    document.getElementById('cel').value=""
    document.getElementById('fah').value=""
    document.getElementById('kel').value=""
  }
  </script>
</body>
</html>