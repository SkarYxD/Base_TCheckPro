   function notifyMe(message, status, progress) {
          if (!("Notification" in window)) {
              alert("This browser does not support desktop notification");
          }else if (Notification.permission === "granted") {
              var options = {
                  body: message,
                  icon: "images/notif.ico",
                  dir: "auto"
              };
              var notification = new Notification("SOULGATE " + status, options);
          }else if (Notification.permission !== 'denied') {
              Notification.requestPermission(function(permission) {
                  if (!('permission' in Notification)) {
                      Notification.permission = permission;
                  }
                  if (permission === "granted") {
                      var options = {
                          body: progress,
                          icon: "images/notif.ico",
                          dir: "auto"
                      };
          var notification = new Notification("SOULGATE " + status, options);
                  }
              });
          }

      }

      //
      var audio = new Audio('sound/blop.mp3');
      var audio2 = new Audio('sound/bot.mp3');


      function limpiar() {
          var ccs = $('#ccs').val();
          if (ccs.length == 0) {
              document.getElementById("stats").innerHTML = 'Cargue una lista antes de limpiar!';
              notifyMe("El campo esta vacio.", "Error al limpiar.");
              audio2.play();
              return;
          } else {
              document.getElementById("ccs").value = '';
              document.getElementById("stats").innerHTML = 'Campo Limpio.';
              document.getElementById('iniciar_chk');
              document.getElementById('ccs');
              document.getElementById('limpiar');
              document.getElementById('pausar');
              audio.play();
              notifyMe("El campo ha sido limpiado con exito!", "Campo Limpio.");
          }
      }

      function rmLinha(id) {
          var lines = $(id).val().split('\n');
          lines.splice(0, 1);
          $(id).val(lines.join("\n"));
      }
      function start() {
          var ccs = document.getElementById("ccs").value;
          if (ccs.length == 0) {
              document.getElementById("stats").innerHTML = 'Cargue una lista!';
              notifyMe("Para chequear necesita colocar un bin/cc!", "Error al iniciar.");
              audio2.play();
              return;
          } else {
              document.getElementById("stats").innerHTML = 'Iniciado.';
              audio.play();
              notifyMe("Lista enviada para su chequeo!", "Iniciando chequeo.");

           document.getElementById('iniciar_chk');
           document.getElementById('ccs');
           document.getElementById('limpiar');
           document.getElementById('pausar');
          var textarea = document.getElementById("ccs").value;
          var textareacount = textarea.split('\n');
          var textareaMatch = count(textareacount, 'COUNT_RECURSIVE');
          var myString = textarea;
          var myArray = listToArray(myString, '\n');


          document.getElementById("bin_up").innerHTML = textareaMatch;
          for (var i = 0; i < textareaMatch; i++) {


              var cclst = myArray[i];
              var cemail = cclst.split("|");
              var csids = 'csid_' + i;
              var ccids = 'ccid_' + i;

              var output = document.getElementById("ccs").value;
              output = output.replace(cclst, "");
              output = output.replace("\n", "");
              document.getElementById("ccs").innerHTML = output;

          }
          executar = true;
          iniciar();
          }
}
         
var executar = true;

function pausar(){
  executar = false;
  document.getElementById("stats").innerHTML = 'Pausado.';
  notifyMe("Chequeo Pausado!", "Chequeo pausado.");
  document.getElementById('iniciar_chk');
           document.getElementById('ccs');
           document.getElementById('limpiar');
           document.getElementById('pausar');

}
function iniciar() {
    if (!executar) {
        return false;
    }
          var array = ccs.value.split("\n");
    
    if (array.length == "1" && array[0] == "") {
        setTimeout(function () {
            document.getElementById('iniciar_chk');
            document.getElementById('ccs');
            document.getElementById("ccs").value = "";
            document.getElementById('limpiar');
            document.getElementById('pausar');
              document.getElementById("stats").innerHTML = 'Finalizado.';
              notifyMe("Chequeo finalizado!", "Chequeo finalizado.");
            delete array;
        }, 1001);
        return;
    }
 
            check(array[0]);
            delete array[0];
            return;
         
          }
      function stop() {
              document.getElementById("stats").innerHTML = 'Campo vacio!';
              notifyMe("Debe cargar una lista de bins/ccs para chequear!", "Error al iniciar.");
              audio2.play();
          }



      function check(cc2) {
                    document.getElementById("fila").innerHTML = cc2;  
                    var xmlhttp;
                    xmlhttp=new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function()
                    {
                        if (xmlhttp.readyState==4 && xmlhttp.status==200)
                        {
                            var xdata = xmlhttp.responseText;   
                        if (xdata.match("Aprovada")) {
                          $("#aprovadas").append(xdata);
                         document.getElementById("bin_ch").innerHTML = (eval(document.getElementById("bin_ch").innerHTML) + 1);
                          document.getElementById("CLIVE").innerHTML = (eval(document.getElementById("CLIVE").innerHTML) + 1);
                          rmLinha('#ccs');
                          iniciar();

                      } else if (xdata.match("Reprovada")) {
                         $("#reprovadas").append(xdata);
                        document.getElementById("bin_ch").innerHTML = (eval(document.getElementById("bin_ch").innerHTML) + 1);
                          rmLinha('#ccs');
                          document.getElementById("CREPRO").innerHTML = (eval(document.getElementById("CREPRO").innerHTML) + 1);
                          iniciar();
                      }
 }
                      }
                    xmlhttp.open("GET","api.php?lista=" + cc2 ,true);
                    xmlhttp.send();
      }

      function SelectAll(id) {
          document.getElementById(id).focus();
          document.getElementById(id).select();
      }


      function listToArray(fullString, separator) {
          var fullArray = [];

          if (fullString !== undefined) {
              if (fullString.indexOf(separator) == -1) {
                  fullArray.push(fullString);
              } else {
                  fullArray = fullString.split(separator);
              }
          }

          return fullArray;
      }

      function count(mixed_var, mode) {
          var key, cnt = 0;
          if (mixed_var === null || typeof mixed_var === 'undefined') {
              return 0;
          } else if (mixed_var.constructor !== Array && mixed_var.constructor !== Object) {
              return 1;
          }
          if (mode === 'COUNT_RECURSIVE') {
              mode = 1;
          }
          if (mode != 1) {
              mode = 0;
          }
          for (key in mixed_var) {
              if (mixed_var.hasOwnProperty(key)) {
                  cnt++;
                  if (mode == 1 && mixed_var[key] && (mixed_var[key].constructor === Array || mixed_var[key].constructor ===
                          Object)) {
                      cnt += this.count(mixed_var[key], 1);
                  }
              }
          }
          return cnt;
      }

      function pushcsB(c, p) {
          document.getElementById(p).innerHTML = document.getElementById(p).innerHTML + c + "\n<br>";
      }