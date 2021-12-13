<?php
Class Votacao{
    private $pdo;
    public $msgErro = "";

    public function conectar($id_usuario, $host, $num_candi){
        global $pdo;
        try {
            $pdo = new PDO("mysql:dbname=".$id_usuario.";host=".$host,$num_candi);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
    }

    public function inserir(valor) {
        var valor1 = document.getElementById("campo1").value;
        var valor2 = document.getElementById("campo2").value;

        if (valor1 == "") {
            document.getElementById("campo1").value = valor;
        } else if (valor2 == "") {
            document.getElementById("campo2").value = valor;
        }
    }

    public function corrige() {
        document.getElementById("campo1").value = "";
        document.getElementById("campo2").value = "";
    }

    public function votar($id_usuario, $num_candi){
        global $pdo;

    var valor1 = parseInt(document.getElementById("campo1").value);
    var valor2 = parseInt(document.getElementById("campo2").value);
    var candidado = (valor1 * 10) + valor2;
    if (sessionStorage.getItem(candidado) !== null) {
        votos = parseInt(sessionStorage.getItem(candidado)) + 1;
        sessionStorage.setItem(candidado, votos);
    } else {
        sessionStorage.setItem(candidado, 1);
    }
    alert("FIM - VOTOU"+candidado)
    document.getElementById("campo1").value = "";
    document.getElementById("campo2").value = "";

        $sql = $pdo->prepare("INSERT INTO votacao (id_usuario, num_candi) VALUES (:i, :n)");
        $sql->bindValue(":i",$id_usuario);
        $sql->bindValue(":n",$num_candi);
        $sql->execute();
        return true;
    }

    public function resultado() {
        document.getElementById("resultado_apuracao").innerHTML=""
        for(i=0;i<100;i++){
            if (sessionStorage.getItem(i) !== null) {
                document.getElementById("resultado_apuracao").innerHTML += "Cantidato "+i+" eleito com o total de "+sessionStorage.getItem(i)+" votos<br/>";
            }
        }
    }

?>
