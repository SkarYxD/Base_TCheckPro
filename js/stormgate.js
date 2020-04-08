$(document).ready(function () {
            $("#iniciar").click(function () {
                $('#result').fadeIn(2000);
                $(this).attr("disabled", true);
                $("#parar").attr("disabled", false);
                $("#status").html('Teste Iniciado Com Sucesso <i class="fa fa-check" aria-hidden="true"></i>');
                executar = true;
                iniciar();
            });
            $("#parar").click(function () {
                $(this).attr("disabled", true);
                $("#iniciar").attr("disabled", false);
                document.getElementById('lista').disabled = false;
                $("#status").html('Teste parado <i class="fa fa-pause" aria-hidden="true"></i>');
                executar = false;
            });

        });
        var executar = true;
        function titulo(novo) {
            document.title = novo;
        }
        function contar_total(lista) {
            'use strict';
            var array = lista.value.split("\n");
            var total = array.length;

            if (array.length === undefined) {
                total = 0;
            }
            $("#tudo_conta").text(total);

        }

        function remover_linha(id) {
            var lines = $(id).val().split('\n');
            lines.splice(0, 1);
            $(id).val(lines.join("\n"));
        }
        function start() {
            if (!executar) {
                return false;
            }
            var array = lista.value.split("\n");
            if (array.length !== "1" && array[0] !== "") {
                startchk(array[0]);
                delete array[0];

            } else {
                notificar("Chequeo finalizado!");
                document.getElementById('iniciar').disabled = false;
                document.getElementById('lista').disabled = false;
                document.getElementById("lista").value = "";
                status('<i class="fa fa-check" aria-hidden="true"></i> Teste Finalizado com Sucesso! ');
                delete array;
                $("#modal_done").modal();


            }
            return;

        }
         function play(){
             audio = document.getElementById('audio');
             audio.load();
             audio.play();
    }
        function reseta() {
            $("#aprovada_conta").text("0");
            $("#reprovada_conta").text("0");
            $("#testado").text("0");
            $("#tudo_conta").text("0");
            status('Aguardando inicio', 'dark');
        }
        function unique(array) {
            return array.filter(function (el, index, arr) {
                return index == arr.indexOf(el);
            });
        }
        function remover_linhas_vazias() {
            var array = $("#lista").val().split('\n');
            array = unique(array);
            for (i = 0; i < array.length; i++) {
                array[i] = array[i].trim();
                array[i] = array[i].replace('   ', '');
                if (array[i].length === 0) {
                    array.splice(i, 1);
                }

            }

            $("#lista").val(array.join("\n"));
        }



        function status(text, type) {
            if (!type) {
                type = "primary";
            }
            $("#status").removeClass().addClass("label label-" + type).html(text);
        }

        function iniciar() {

            document.getElementById('lista').disabled = true;
            reseta();
            var lista = document.getElementById("lista").value;
            if (lista.length == "0") {
                $("#modal_mailpass").modal();
                document.getElementById('iniciar').disabled = false;
                document.getElementById('lista').disabled = false;
                $('#result').fadeOut(1000);
                status('<i class="fa fa-times" aria-hidden="true"></i> Lista Inválida!', 'warning');
                return;
            }
            remover_linhas_vazias();
            contar_total(document.getElementById("lista"));
            status('<i class="fa fa-check" aria-hidden="true"></i> Iniciando Testador', 'dark');

            start();

        };
        var antes;
        function convert_sec(ms) {
            var seconds, x;
            x = ms / 1000;
            seconds = x % 60;
            if (seconds > 1) {
                seconds = seconds.toString().substring(0, 4);
                return seconds + " s";
            }
            return ms + "ms";
        }
        function startchk(url) {
            $.ajax({
                            url: 'api_storm.php',
                            type: 'GET',
                            data: 'check=' + url,
                beforeSend: function () {
                    antes = Date.now();
                    status('<i class="fa fa-asterisk fa-spin" aria-hidden="true"></i> Testando ... ', 'info');
                },
                success: function (data) {

                    var countlive = (eval(document.getElementById("aprovada_conta").innerHTML) + 1);
                    var countlixo = (eval(document.getElementById("reprovada_conta").innerHTML) + 1);


                    var time_req = Date.now() - antes;
                     var array = lista.value.split("\n");

                    time_req = convert_sec(time_req);
                    if (data.includes("Dead")) {
                        remover_linha("#lista");
                        $("#reprovadas").append(data);
                        $("#reprovada_conta").text(countlixo);
                        $("#reprovada_conta_2").text(countlixo);
                    }
                    else if (data.includes("Live")) {
                        play();
                        remover_linha("#lista");
                        $("#aprovadas").append(data);
                        $("#aprovada_conta").text(countlive);
                        $("#aprovada_conta_1").text(countlive);
                    }



                    start();
                },
                error: function () {
                    start();
                }
            });
            function randomFrom(array) {
                return array[Math.floor(Math.random() * array.length)];
            }


        }
