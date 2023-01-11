<?php


if(!isset($_GET["busca"])) {

    header("location: $BASE_URL");

} else {
    $busca = $_GET["busca"];

    // SE CAMPO BUSCA ESTIVER VAZIO, VOLTA PARA PAGINA ANTERIOR
    if($busca === "") {

        header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));

    } else {

        // BUSCANDO MODELOS ATRAVES DA FABRICANTE NO BANCO DE DADOS
        $buscaQuery = "%" . $busca . "%";

        $stmt = $conn->prepare("SELECT * FROM fabricantes WHERE nome LIKE :nome");
        $stmt->bindParam(":nome", $buscaQuery);
        $stmt->execute();

        $fabricante = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($modelosNovo as $modelo) {
            foreach($fabricante as $fab) {
                if($fab["ID"] === $modelo["fabricante_id"]) {
                    $resultado[] = $modelo;
                }
            }
        }

        // BUSCANDO MODELO NO BANCO DE DADOS
        $buscaQuery = "%" . $busca . "%";

        $stmt = $conn->prepare("SELECT * FROM modelos WHERE nome LIKE :nome");
        $stmt->bindParam(":nome", $buscaQuery);
        $stmt->execute();

        if(!isset($resultado)) {
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        $carros = $resultado;



        // ----------------------- FILTRO PRECOS  -----------------------
        // PEGANDO TODOS OS PRECOS DOS MODELOS
        if($carros > 0) {
            foreach($carros as $result) {
                $precos[] = $result["preco"];
            }
        }

        // FUNCAO PARA FORMATAR INPUTS
        function precoCheck($min, $max) {
            $valor = [
                "nome" => $max, 
                "string" => "$ " . formatNumber($min) . " a $ " . formatNumber($max), 
                "valor" => $min
            ];

            return $valor;
        }

        // CRIANDO OS INPUT DE PRECO COM BASE NOS PRECO RESGATADOS
        if(isset($precos)) {
            foreach($precos as $preco) {
                if($preco < 100000) {
                    $valor[] = [
                        "nome" => "100000", 
                        "string" => "Até $ 100.000", 
                        "valor" => 0
                    ];
                }

                // PULANDO PRECO A CADA 100k, ENTRE 100k A 1M
                for($i = 100000; $i <= 1000000; $i = $i + 100000) {
                    if($preco >= $i && $preco < $i + 100000 && $preco < 1000000) $valor[] = precoCheck($i, $i + 100000);
                }

                if($preco >= 1000000) {
                    $valor[] = [
                        "nome" => "1000000", 
                        "string" => "Acima de $ 1.000.000", 
                        "valor" => 1000000
                    ];
                }

            }
        } 
        // FIM DO FILTRO PRECO


        // ----------------------- FILTRO ANO  -----------------------
        // PEGANDO TODOS OS ANOS DOS MODELOS
        if($carros > 0) {
            foreach($carros as $result) {
                $anos[] = $result["ano"];
            }
        }

        // FUNCAO PARA FORMATAR INPUTS
        function anoCheck($min, $max) {
            $decada = [
                "nome" => $max, 
                "string" => $min . " a " . $max, 
                "decada" => $min
            ];

            return $decada;
        }

        // CRIANDO OS INPUT DE DECADAS COM BASE NOS ANOS RESGATADOS
        if(isset($anos)) {
            foreach($anos as $ano) {

                // PULANDO ANO A CADA DECADA
                for($i = 1870; $i <= 2100; $i = $i + 10) {
                    if($ano >= $i && $ano < $i + 10) $decada[] = anoCheck($i, $i + 10);
                }
            }
        } 
        // FIM DO FILTRO ANO


        // ----------------------- FILTRO VELOCIDADE  -----------------------
        // PEGANDO TODAS AS VELOCIDADES DOS MODELOS
        if($carros > 0) {
            foreach($carros as $result) {
                $velocidades[] = $result["velocidade"];
            }
        }

        // FUNCAO PARA FORMATAR INPUTS
        function velocidadeCheck($min, $max) {
            $velo = [
                "nome" => $max, 
                "string" => formatNumber($min) . " km/h a " . formatNumber($max) . " km/h", 
                "velo" => $min
            ];

            return $velo;
        }

        // CRIANDO OS INPUT DE VELOCIDADE COM BASE NAS VELOCIDADES RESGATADOS
        if(isset($velocidades)) {
            foreach($velocidades as $velocidade) {
                if($velocidade < 50) {
                    $velo[] = [
                        "nome" => "50", 
                        "string" => "Até 50 km/h", 
                        "velo" => 0
                    ];
                }

                // PULANDO VELOCIDADE A CADA 50km/h, ENTRE 50km/h  A 1000km/h
                for($i = 50; $i <= 1000; $i = $i + 50) {
                    if($velocidade >= $i && $velocidade < $i + 50 && $velocidade < 1000) $velo[] = velocidadeCheck($i, $i + 50);
                }

                if($velocidade >= 1000) {
                    $velo[] = [
                        "nome" => "1000", 
                        "string" => "Acima de 1.000 km/h", 
                        "velo" => 1000
                    ];
                }

            }
        } 
        // FIM DO FILTRO VELOCIDADE

        // ----------------------- FILTRO CLASSE  -----------------------
        // PEGANDO TODAS AS CLASSES DOS MODELOS
        if($carros > 0) {

            $contValor = 1;

            foreach($carros as $result) {

                $allClasses[] = [
                    "nome" => $result["classe"],
                    "valor" => "classe" . $contValor
                ];

                $contValor++;
            }
        }

        if(isset($allClasses)) {
            $allClasses = array_unique($allClasses, SORT_REGULAR);
            sort($allClasses);


            for($i = 0; $i < count($allClasses); $i++) {

                $contador = $i - 1;

                if($i === 0) {
                    
                    $classes[] = [
                        "nome" => $allClasses[$i]["nome"],
                        "valor" => $allClasses[$i]["valor"]
                    ];

                } else {
                    if($allClasses[$i]["nome"] !== $allClasses[$contador]["nome"]) {
                        $classes[] = [
                            "nome" => $allClasses[$i]["nome"],
                            "valor" => $allClasses[$i]["valor"]
                        ];
                    }
                }
            
            }

            
            // print_r($classes);

        }



    }
}


























































// BUSCANDO OS CARROS COM O PRECO ESCOLHIDO
if(isset($valor)) {
    foreach($valor as $val) {
        if(isset($_GET[$val["nome"]])) {
            $precoCheck =  $val["valor"];
        
            unset($carros);

            foreach($resultado as $result) {

                if($result["preco"] < 1000000) {
                    if($result["preco"] >= $precoCheck && $result["preco"] < $precoCheck + 100000) {
                        $carros[] = $result;
                    } 
                } else {
                    if($precoCheck >= 1000000) {
                        $carros[] = $result;
                    } 
                }
            }

        }
    }
}



// BUSCANDO OS CARROS COM A DECADA ESCOLHIDA
if(isset($decada)) {
    foreach($decada as $deca) {
        if(isset($_GET[$deca["nome"]])) {
            $decadaCheck =  $deca["decada"];
        
            unset($carros);

            foreach($resultado as $result) {
                if($result["ano"] >= $decadaCheck && $result["ano"] < $decadaCheck + 10) {
                    $carros[] = $result;
                } 
            }

        }
    }
}



// BUSCANDO OS CARROS COM A VELOCIDADE ESCOLHIDA
if(isset($velo)) {
    foreach($velo as $vel) {
        if(isset($_GET[$vel["nome"]])) {
            $velocidadeCheck =  $vel["velo"];

            unset($carros);

            foreach($resultado as $result) {

                if($result["velocidade"] < 1000) {
                    if($result["velocidade"] >= $velocidadeCheck && $result["velocidade"] < $velocidadeCheck + 50) {
                        $carros[] = $result;
                    } 
                } else {
                    if($velocidadeCheck >= 1000) {
                        $carros[] = $result;
                    } 
                }
            }

        }
    }
}



// BUSCANDO OS CARROS COM A DECADA ESCOLHIDA
if(isset($classes)) {
    foreach($classes as $classe) {
        if(isset($_GET[$classe["valor"]])) {
            $classeCheck =  $classe["nome"];
        
            unset($carros);

            foreach($resultado as $result) {
                if($result["classe"] === $classeCheck) {
                    $carros[] = $result;
                } 
            }

        }
    }
}





