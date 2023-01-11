-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Jan-2023 às 18:30
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `portcars`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `ID` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`ID`, `nome`) VALUES
(1, 'boss'),
(2, 'editor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricantes`
--

CREATE TABLE `fabricantes` (
  `ID` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `logo` varchar(45) NOT NULL,
  `slogan` varchar(100) NOT NULL,
  `atividade` varchar(100) DEFAULT NULL,
  `ano` int(4) DEFAULT NULL,
  `siteOficial` varchar(100) DEFAULT NULL,
  `historia` text DEFAULT NULL,
  `data_publicada` datetime DEFAULT NULL,
  `situacao` tinyint(1) DEFAULT NULL,
  `funcionario_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `fabricantes`
--

INSERT INTO `fabricantes` (`ID`, `nome`, `logo`, `slogan`, `atividade`, `ano`, `siteOficial`, `historia`, `data_publicada`, `situacao`, `funcionario_id`) VALUES
(1, 'lamborghini', '2022.11.14-14.54.39.png', 'siga seus carros', 'Automotiva', 1963, 'www.lamborghini.com', '<p>Ferruccio Lamborghini antes de fazer os carros, ele fazia tratores com motores de tanques da 2ª Guerra Mundial. Conta a história, que uma vez, com problema na embreagem de sua Ferrari, Ferruccio foi até a fábrica e falou diretamente com o engenheiro chefe, que nesta ocasião era nada mais nada menos que Enzo Ferrari, O Comendador, que ao ver o problema de Ferrucio teria dito: “podes saber conduzir os teus tratores, mas não sabes conduzir uma Ferrari“. Foi a partir deste momento que Lamborghini decidiu fabricar carros. Instalou-se em Sant\'Agata Bolognese e contratou uma série de engenheiros de renome para construir os seus carros, como foi o caso de Bizzarrini, Dallara e Stanzani.</p> <p>Em 1964 foi produzido o primeiro carro Lamborghini, o modelo 350 GT, que combinava um chassi desenhado por Dallara com um motor V12 concebido por Bizzarrini. O carro fez bastante sucesso e foi produzido até 1968, depois de ter sido renovado em 1966.[4] Ainda em 1966, foi lançado o mítico Lamborghini Miura, desenhado por Luigi Bertone e dotado também de um potente motor V12. Este modelo também foi um tremendo sucesso de vendas, sendo produzido até 1973. Ferrucio era grande apreciador de touradas, por isso muitos dos seus carros tem nomes de touros famosos.</p> <p>Entretanto, em 1968 tinha sido apresentado o Lamborghini Islero, destinado a substituir o 400 GT, que havia surgido como desenvolvimento do 350GT. Também em 1968 apareceu o Lamborghini Espada, o primeiro carro da marca com capacidade para quatro pessoas. Dois anos depois, em 1970, o Islero foi substituído pelo Lamborghini Jarama.</p> <p>Em 1972 o Lamborghini Urraco permitiu à marca italiana entrar no segmento dos pequenos supercarros. Ainda nesse ano a Lamborghini vendeu 51% das suas ações a um empresário suíço, com os restantes 49% a serem entregues a outro suíço em 1974. Pelo meio, em 1973 o Miura foi substituído por um outro modelo que também fez história no mundo dos carros de características desportivas, o Countach. Este carro tinha um design extremamente angular e aerodinâmico e estava dotado de um potente motor V12 traseiro de 4000 cc. O carro foi produzido com estas características até 1988, ano em que o motor passou a ter uma cilindrada de 5000 cc.</p> <p>No entanto, a empresa estava há muito tempo em dificuldades financeiras e em 1981 tinha sido vendida aos irmãos Mimram, que revitalizaram a marca. Nesse sentido, no ano de 1981 surgiu o Lamborghini Jalpa, que teve por base o Urraco, e em 1982 o Lamborghini LM002, uma novidade na marca, já que se tratava de um veículo off-road. Este jipe estava dotado de um motor Countach.</p> <p>Em 1987, a marca norte-americana Chrysler comprou a Lamborghini e, além do substituto do Countach, começou a preparar um motor para equipar carros de Fórmula 1. A estreia nesta competição automobilística ocorreu em 1989, mas nunca teve sucesso. Desde 1998 a Lamborghini pertence ao grupo Volkswagen.[5] Já o substituto do Countach, o Diablo, foi apresentado em 1990 e obteve grande sucesso, mantendo-se em produção para além do ano 2000. O mais novo Lamborghini é o Huracán que chegou em 2014 para substituir o Gallardo. O Lamborghini Huracán traz uma nova tecnologia que é o chassi híbrido, feito de carbono e alumínio, o que deixa o carro 10% mais leve que seu antecessor e com uma carroceria 50% mais rígida. O Lamborghini Urus foi apresentado no Auto China em 23 de abril de 2012 e lançado em 2018. O seu nome vem do nome dos antepassados selvagens do gado doméstico também conhecidos como auroques.</p>', '2022-12-01 12:05:45', 1, 1),
(2, 'Mercedes-Benz', '2022.12.02-14.41.41.png', ' O melhor ou nada', 'Automobilística', 1871, 'www.mercedes-benz.com', '<p><span>A origem e seus fundadores</span></p>\r\n\r\n<p>As origens da Daimler-Benz datam do fim do século XIX quando Gottlieb Daimler (1834–1900) juntamente com Wilhelm Maybach (1846–1929) e Karl Benz (1844–1929) inventavam independentemente o primeiro automóvel internamente movido por um motor de combustão no sul da Alemanha. Contudo e curiosamente não se conheciam. Karl Benz tinha a sua loja em Mannheim e inventou o primeiro automóvel realmente movido através de uma motor de combustão interna em 1885 e possuía três rodas.</p>\r\n\r\n<p>Em 1885, Gottlieb Daimler e o seu colega desenhador Wilhelm Maybach que trabalhavam em Cannstatt, Stuttgart, foram premiados a 29 de Agosto de 1885 por terem construído o primeiro protótipo de um motor movido a gás. A 8 de Março de 1886, Daimler comprou uma carroça fabricada por Wilhelm Wimpff & Sohn e, juntamente com Maybach, juntou então o motor a esta mesma carroça criando um automóvel de quatro rodas movido por um motor como muitos anteriormente feitos por eles. A única diferença era que este motor era movido a gás. Segundo o site oficial da Mercedes-Benz, Daimler inventou a carroça \"sem cavalo\". Daimler e Maybach fundaram juntamente a Daimler-Motoren-Gesellschaft (DMG) em 1890 e venderam o seu primeiro automóvel em 1892.</p>\r\n\r\n\r\n<p>O negócio continuara a crescer, mas Karl Benz continuava a melhorar o seu Motorwagen (o seu primeiro motor) e vendeu o seu primeiro automóvel em 1888. Construiu o seu primeiro carro a quatro rodas em 1891. A Benz & Cia. criada por Karl Benz, não só se tornou a primeira linha de montagem como também se tornou a maior do mundo no início do século XX.</p>\r\n\r\n<p><span>Origem do nome</span></p>\r\n\r\n<p>Em 1899, a Daimler-Motoren-Gesellschaft (DMG) construiu um novo automóvel. O nome do automóvel viria a ser o nome da filha de Emil Jellinek: Mercédès Jellinek. Jellinek prometeu comprar 36 automóveis da DMG se Daimler nomeasse o próximo motor como \"Mercedes 35hp\" e se Daimler o tornasse o agente oficial para vendas dos automóveis na França, Áustria-Hungria, Bélgica e Estados Unidos. Sendo assim, Jellinek comprou os 36 carros e gastou 500 000 marcos.</p>\r\n\r\n<p>Em 1901, o nome \"Mercedes\" foi registrado pela DMG em todo o mundo como uma marca protegida.[4] A adoção do nome para os carros da empresa ajudou a evitar problemas legais porque depois da morte de Daimler em 1900, a DMG decidiu vender o nome registrado \"Daimler\" e ficando com o nome \"Mercedes\" salva-guardado. Os primeiros veículos da marca Mercedes-Benz foram produzidos em 1926, após a fusão das empresas fundadas por Karl Benz (Benz & Cie.) e Gottlieb Daimler (Daimler-Motoren-Gesellschaft) como Daimler-Benz em 28 de junho do mesmo ano.</p>\r\n\r\n<p><span>Cooperação entre os rivais</span></p>\r\n\r\n\r\n<p>Naquela altura as maiores rivais do sector automóvel eram a DMG e a Benz & Cia. Em 1924, devido à necessidade de dar um impulso à economia da Alemanha após a I Guerra Mundial, estas duas empresas acordaram numa cooperação mútua e em 1926 a empresa Daimler-Benz AG (AG significa sociedade anónima, como SA em Portugal). A Daimler-Benz AG produzira motores, automóveis e caminhões. O acordo entre as partes exigia a união das duas empresas até ao ano de 2000. Além dos automóveis e dos caminhões, a Daimler-Benz AG fabricava também barcos e aviões (militares e civis). Na década de 1940, durante a 2ª Guerra Mundial, a montadora Daimler-Benz dedicava quase toda sua produção a fins bélicos, chegando a empregar mais de 30 mil civis e prisioneiros de guerra como mão-de-obra escrava.</p>\r\n\r\n<p>Karl Benz decidiu acrescentar o seu nome \"Benz\" à marca Mercedes. Acrescentou uma auréola à volta da estrela e nasceu assim o famoso nome Mercedes-Benz juntamente com o seu símbolo e que dura até aos dias de hoje. Durante a Segunda Guerra Mundial, a DMG foi uma importante contribuidora de meios de transporte como carros de combate, automóveis militares e motores para aviões.</p>\r\n\r\n\r\n<p>Depois da derrota da Alemanha Nazi, a empresa continuou a ser uma importante empresa para as exportações alemãs de automóveis para estimular a economia que voltara a fracassar. Contudo, os resultados não foram os melhores devido aos altos preços que a DMG praticava. Isso obrigou à criação de modelos mais baratos e a criação de Classes de modelos (A e B) que perduram até hoje.</p>\r\n', '2022-12-02 10:41:41', 1, 1),
(3, 'ferrari', 'ferrari.png', 'Nós somos a competição', 'Automobilística', 1929, 'www.ferrari.com', '<p>Ferrari é uma fabricante italiana de carros esportivos de luxo com sede em Maranello. Fundada por Enzo Ferrari em 1939 na divisão de corridas da Alfa Romeo com o nome Auto Avio Costruzioni, a empresa construiu seu primeiro carro em 1940. No entanto, o início da empresa como fabricante de automóveis é geralmente reconhecido em 1947, quando o primeiro carro com o nome Ferrari foi concluído.</p>\r\n\r\n<p>Em 2014, a Ferrari foi classificada como a marca mais poderosa do mundo pela consultoria Brand Finance. Em junho de 2018, o 250 GTO de 1964 tornou-se o carro mais caro da história (em 2022 foi ultrapassado pela Mercedes-Benz 300 SLR Uhlenhaut Coupé, sendo vendida por 143 milhões de dólares), estabelecendo um recorde de venda de 70 milhões de dólares</p>\r\n\r\n<p>O Grupo Fiat adquiriu 50% da Ferrari em 1969 e expandiu sua participação para 90% em 1988. Em outubro de 2014, a Fiat Chrysler Automobiles (FCA) anunciou suas intenções de separar a Ferrari S.p.A. da FCA; no momento do anúncio, a FCA detinha 90% da Ferrari. A separação começou em outubro de 2015 com uma reestruturação que estabeleceu a Ferrari NV (uma empresa constituída nos Países Baixos) como a nova holding do Grupo Ferrari e a subseqüente venda pela FCA de 10% das ações em uma oferta pública inicial e listagem simultânea de ações ordinárias na Bolsa de Nova York. Através das etapas restantes da separação, o interesse da FCA nos negócios da Ferrari foi distribuído aos acionistas da FCA, com 10% continuando a ser propriedade de Piero Ferrari. O spin-off foi concluído em 3 de janeiro de 2016.</p>\r\n\r\n<p>Ao longo da sua história, a empresa tem se destacado por sua participação contínua em corridas, especialmente na Fórmula 1 (F1), onde é a equipe de corrida mais antiga e mais bem sucedida, detendo o maior número de vitórias (15). Os carros de estrada da Ferrari são geralmente vistos como um símbolo de velocidade, luxo e riqueza.</p>\r\n\r\n<p><span>História</span></p>\r\n\r\n<p>O famoso símbolo é um cavalo negro que tinha quatro patas apoiadas no chão e agora tem duas, empinado num fundo amarelo, sempre com as letras S F de Scuderia Ferrari. O cavalo era originalmente o símbolo do Conde Francesco Baracca, um lendário \"asso\" (ás) da força aérea italiana durante a Primeira Guerra Mundial, que o pintou na lateral de seus aviões. Baracca morreu muito jovem em 19 de Junho de 1918, abatido após 34 duelos vitoriosos e muitas vitórias em grupo, tornando-se assim um herói nacional. Baracca queria o cavalo empinado nos seus aviões porque a sua esquadra, os \"Battaglione Aviatori\", fora inscrita num regimento da Cavalaria (as forças aéreas estavam nos seus primeiros anos e não tinham administração separada), e também porque ele mesmo tinha a reputação de melhor cavaliere (cavaleiro) de sua equipe.</p>\r\n\r\n<p>Em 15 de junho de 1923, Enzo Ferrari ganhou uma corrida no circuito de Silvio em Ravena onde conheceu a Condessa Palina, mãe de Baracca. A Condessa pediu que ele usasse o desenho de um cavalo nos seus carros, sugerindo que isso lhe daria boa sorte, mas a primeira corrida na qual a Alfa Romeo permitiu o uso do cavalo nos carros da Scuderia foi onze anos depois, nas 24 Horas de Spa em 1932. A Ferrari ganhou. Ferrari deixou o cavalo negro como havia sido feito no avião de Baracca; contudo, ele adicionou um fundo amarelo porque era a cor símbolo de sua terra natal, Modena.</p>\r\n\r\n<p>Uma das imagens de marca da Ferrari é a sua cor \"rosso corsa\" (vermelho de corrida). A utilização dessa cor teve início nos anos 1920, altura em que a entidade que viria a ser chamada de FIA, impunha que as marcas italianas teriam de apresentar cor vermelha, as francesas azul, as alemãs prateada, as holandesas laranja, as belgas amarela, as inglesas verde e as norte-americanas branca.</p>\r\n\r\n<p>O cavalo empinado não foi sempre identificado como marca apenas da Ferrari: Fabio Taglioni usou-o nas suas motocicletas Ducati. O pai de Tagliani foi, de fato, um companheiro de Baracca e lutou com ele no 81º Esquadrão Aéreo, mas ao passo que a fama da Ferrari cresceu, Ducati abandonou o cavalo; esse pode ter sido o resultado de um acordo privativo entre as duas marcas.</p>\r\n\r\n<p>Em 1940, a Alfa Romeo é absorvida pelo governo de Mussolini e utilizada como porta-estandarte do seu governo. Por esta altura a Scuderia Ferrari, impedida de ingressar em competições automotivas, passa a construir acessórios para aviões e peças para máquinas. Com o final da Segunda Guerra Mundial e queda do regime de Mussolini, é fundada a marca Ferrari, com o lançamento do seu primeiro modelo de estrada em 1947. O modelo lançado nesse ano foi a Ferrari 125 Sport com um motor V12 de 1500 cc.</p>\r\n\r\n<p>Em 1951, a Ferrari consegue a sua primeira vitória na Fórmula 1 e, em 1955, Juan Manuel Fangio ganha o campeonato mundial ao volante de uma Ferrari. Esse foi também um ano triste para Enzo Ferrari com a morte do seu filho Dino. Em 1961, os tempos começaram a ficar difíceis para a Ferrari, depois de conflitos internos que levaram à saída de vários membros da direção. A Ferrari, mesmo assim, conseguiu alcançar um grande número de vitórias em competição e elevar o seu nome. Na década de 1960, a Ford tentou comprar a Ferrari, tendo em vista as competições automotivas. Mas essa tentativa falhou e a Ford criou o Ford GT40 que conseguiu acabar com o domínio da Ferrari nas 24h de Le Mans, que vigorou desde 1942 até 1960. Como resultado dos problemas financeiros que a Ferrari estava atravessando, a Fiat adquiriu parte da Ferrari em 1942 aumentando-a para 15% em 1960.</p>\r\n\r\n<p>Para comemorar os 40 anos de existência da Ferrari, é lançado em 1987 a Ferrari F40, sendo esse o carro de estrada mais rápido do mundo até a altura. Em 1988, com a morte de Enzo Ferrari aos 91 anos, a Fiat aumenta o seu controle para 90%. Em 1997, a Ferrari adquire 15% da Maserati, passando a ter total controle da marca em 1999. A Ferrari utilizou a Maserati como a sua divisão de luxo até 2005, altura em que o controle regressaria à Fiat. A Ferrari continuou a alcançar grandes feitos na competição automotiva, conseguindo vencer a Fórmula 1, na categoria de construtores, de 1999 até 2002 com os pilotos Michael Schumacher e Rubens Barrichello. Em 2002 a Ferrari, em memória do seu fundador, lança a Ferrari Enzo, um super esportivo baseado na tecnologia utilizada na Fórmula 1.</p>\r\n', '2022-12-05 09:43:25', 1, 1),
(4, 'porsche', 'porsche.png', 'Não há substituto', 'Automobilística', 1931, 'www.porsche.com', '<p>A marca alemã Porsche foi fundada em 1931 por Ferdinand Porsche e o seu filho Ferry Porsche. Ferdinand Porsche já era conhecido antes de fundar a Porsche, ele havia trabalhado para outras marcas. Havia também lançado em 1900 o primeiro automóvel híbrido.</p>\r\n\r\n<p>Em 1934 Ferdinand Porsche, depois de lhe ser solicitado a criação de um automóvel acessível a todos os alemães, criou o Volkswagen Fusca.[2] O Fusca serviu de base mecânica ao Type 64 criado em 1939 e ao Porsche 356 produzido em 1948, sendo este o primeiro Porsche a ser produzido. O Porsche 356 recorria em grande parte às peças utilizadas no Volkswagen Fusca, tais como motorização traseira com refrigeração a ar. Mais tarde o 356 viria a ser totalmente construído a partir de peças Porsche.</p>\r\n\r\n<p>A utilização de um motor com refrigeração a ar e localização traseira foi desde o início, a principal característica da Porsche. Em 1951 Ferdinand Porsche morre devido a complicações de um enfarte, nesse mesmo ano a Porsche vence a classe nas 24h de Le Mans com o Porsche 356 SL, conseguindo assim notoriedade internacional.</p>\r\n\r\n<p>Em 1953 a Porsche lança o 550 Spyder, modelo responsável por um grande número de vitórias na competição automóvel. Este modelo tinha como principal característica, possuir quatro árvores de cames ao invés de uma central.</p>\r\n\r\n<p>Em 1964 é lançado o ícone da Porsche, o Porsche 911. Este modelo foi lançado inicialmente com o nome de 901, mas devido aos direitos comerciais adquiridos pela Peugeot, teve que alterar o nome. O Porsche 911 possuía um motor de 6 cilindros com localização traseira. Este modelo causou problemas internos na Porsche, pois as linhas da autoria de Ferry Porsche não agradavam a todos.</p>\r\n\r\n<p>Em 1966 entra em produção o Porsche 911 Targa, aquele que foi considerado o cabriolet seguro, devido ao seu tecto rebatível em vidro. Em 1969 é lançado o VW-Porsche 914, um desportivo de motorização média feito em coligação com a Volkswagen. Em 1972 devido à falta de apoio dos restantes membros da direcção, Ferry Porsche e a sua irmã Louise Piëch decidem passar a Porsche para empresa pública. Para isso entregaram a direcção da empresa a pessoas fora do círculo familiar, mantendo-se os membros da família a supervisionar. Em 1974 é lançado o potente Porsche 911 Turbo e até aos inícios dos anos 80 são lançados os modelos 924, 928 e 944. Os novos modelos foram os primeiros automóveis da Porsche a possuir motor com localização frontal.</p>\r\n\r\n<p>Em 1988 é lançado o Porsche 911 Carrera 4, com tracção integral. Em 1991 a Porsche passa a introduzir de série na produção, airbag frontal para o condutor e passageiro. Em 1992 quando se pensava que a Porsche estava pronta a ser comprada por um grande grupo, chega à presidência da Porsche o Dr. Wendelin Wiedeking. A Porsche passa então a aumentar as suas receitas financeiras. Em 1995 a Porsche lança o EBD II, um sistema de controlo de emissões de dióxido de carbono. Este modelo foi incorporado no Porsche 911 Turbo, passando a ser o automóvel de produção com o nível mais baixo de emissões de CO2. Nesse mesmo ano é lançado o 911 GT2, até então o Porsche mais potente construído para estrada, sendo este modelo criado com edição limitada.</p>\r\n\r\n<p>Em 1996 é lançado o Porsche Boxster, com um projeto totalmente novo: um roadster de motor central, e dois lugares. Em 1997 é lançada a nova geração do 911 Carrera, não muito diferente das outras gerações. Este modelo passa a incorporar o primeiro motor produzido pela Porsche com refrigeração a água, até então a Porsche utilizava a refrigeração a ar, que fora os Porsche só era utilizada pela Kombi, uma herança do motor baseado no Fusca, que era utilizado desde os primeiros Porsche construídos. Em 1998 Ferry Porsche morre com a idade de 88 anos. Em 1999 são lançados o Porsche 911 GT3 e o Boxster S. Nesse mesmo ano a Porsche apresenta os discos de travão cerâmicos. Eles são introduzidos de série na nova geração do Porsche 911 GT2 construído em 2001.</p>\r\n\r\n<p>O Grupo Volkswagen tornou-se o principal acionista da Porsche e a Porsche o maior acionista do Grupo Volkswagen. Isso causou uma grande revolução na Porsche que passou a compartilhar muitas peças com modelos Volkswagen para reduzir custos, Porsche Cayenne e VW Touareg compartilham câmbio, plataforma, algumas opções de motorização e até mesmo o design de ambas são muito semelhante. Uma curiosidade, o local da ignição dos carros da Porsche localiza-se no lado esquerdo do volante. Essa tradição vem do mundo do automobilismo, notadamente as 24 horas de Le Mans, uma vez que antigamente antes, e ao sinal de partida, os pilotos tinham de correr do lado oposto da referida reta, atravessar a pista, entrar nos seus bólidos, que os aguardavam com o motor desligado, acionar a ignição e partir rumo à maratona de 24 horas. Por esse motivo a Porsche adotou a chave de ignição do lado esquerdo do volante, para que os pilotos pudessem dar partida no carro com uma mão e passar a marcha com a outra, estando assim pronto para arrancar. Isso garantia segundos preciosos e era fundamental para conquistar boas posições na corrida. Devido seu DNA esportivo, a Porsche passou a adotar a ignição na esquerda também nos carros de produção em série e hoje todos eles vêm com essa configuração.</p>\r\n', '2022-12-05 09:49:57', 1, 1),
(5, 'chevrolet', 'chevrolet.png', ' Encontrar novas estradas', 'Automobilística', 1911, 'www.chevrolet.com', '<p>Em 3 de novembro de 1911, o piloto de corridas de carro e engenheiro de automóveis, Louis Chevrolet co-fundou a Chevrolet Motor Car Company, com William C. Durant (fundador da General Motors, deposto por 5 anos) e os parceiros de investimento, William Little (fabricante do automóvel Little), Edwin R. Campbell (genro de Durant) e, em 1912, R.S. McLaughlin, do Canadá.</p>\r\n\r\n<p>Durant foi afastado da gestão da General Motors (companhia que fundara em 1908), em 1910, por 5 anos. Ele assumiu o Works Flint Wagon, incorporando a Mason e empresas Little. Como chefe da Buick Motor Company, antes de fundar a GM, Durant tinha contratado Louis Chevrolet, para conduzir Buicks, em corridas promocionais. Durant planejava usar a reputação da Chevrolet como um piloto com a criação, para sua empresa, de um automóvel novo.</p>\r\n\r\n<p>Trabalho de projeto foi em primeiro lugar, a Série C, o Six, foi elaborado por Etienne Planche, seguindo as instruções de Louis. O protótipo C ficou pronto, no primeiro mês, antes de a Chevrolet ser realmente incorporada.</p>\r\n\r\n<p>Chevrolet usou pela primeira vez o \"emblema laço de borboleta\". Logo em 1913, pesquisas mais recentes do historiador Ken Kaufmann, apresenta um caso que o logotipo é baseado num logotipo para \"Coalettes\". Outros afirmam que o projeto era uma cruz estilizada suíça, em homenagem à terra natal dos pais de Chevrolet.</p>\r\n\r\n<p>Louis Chevrolet tinha diferenças com Durant, sobre o projeto e, em 1915, vendeu a Durant a sua participação na empresa. Em 1916, a Chevrolet foi rentável o suficiente para permitir a Durant \"recomprar\" uma participação maioritária na General Motors. Depois de o negócio ser concluído, em 1917, Durant tornou-se presidente da General Motors, Chevrolet, e foi incorporada pela GM como uma divisão separada. Em 1917, as fábricas da Chevrolet foram localizados em Nova York e Michigan, principalmente. Em 1918, ano do modelo, a Chevrolet introduziu o modelo D, um modelo de motor V8, de quatro passageiros e os modelos roadster, de cinco passageiros, modelos \"touring\". Ele também iniciou a produção de uma válvula de sobrecarga na linha Six. A maioria dos carros da época tinham apenas motores de baixa compressão, cabeçote baixo. Estes carros tinham motor 2.9 \"³ (2.883 cm³), 55 cv (41 kW), motores com carburadores Zenith e câmbio de três marchas.</p>\r\n\r\n<p>A Chevrolet continuou, em 1920, 1930 e 1940, a competir com a Ford, e depois com a Chrysler Corporation, em 1928, quando incorporou a Plymoutyh. Ford, Chevrolet e Chrysler eram conhecidos como \"as três grandes\". Em 1933, a Chevrolet anunciou que, nos Estados Unidos, vendia o mais barato carro de seis cilindros à venda.</p>\r\n\r\n<p>Chevrolet teve uma grande influência no mercado automóvel americano, durante os anos de 1950 e 1960. Em 1953, ele produziu o Corvette, um carro de dois lugares desportivo, com um corpo de fibra de vidro. Em 1957, a Chevrolet apresentou o seu motor de combustível injetado, em primeiro lugar, a opção \"Ramjet Rochester\", no Corvette e em carros de passageiros, que custava US$ 484. Em 1960, introduziu o Corvair, com um montado na parte traseira do motor refrigerado a ar. Em 1963, um em cada dez carros vendidos nos Estados Unidos era um Chevrolet.</p>\r\n\r\n<p>O design básico motor V8 tem permanecido em produção contínua, desde a sua estreia, em 1955, há mais tempo do que qualquer motor produzido em massa no mundo, embora, as versões atuais partilhem poucas se algumas partes e peças intercambiáveis, com o original. As variantes do pequeno bloco básico, OHV V8, sobre a plataforma de design, em produção hoje, foram já muito modificadas, com avanços como o bloco de alumínio e cabeças, gestão eletrónica do motor e injeção de combustível sequencial. Dependendo do tipo de veículo, o V8 são construídos em diversas capacidade (ex: 4,3 a 9,4 litros) com potências (de 111.394 a 994 CV), conforme a instalação na fábrica. O projeto do motor também tem sido utilizado, ao longo dos anos, em produtos GM, construído e vendido sob as marcas Pontiac, Oldsmobile, Buick, Hummer, Opel (Alemanha), e Holden (Austrália).</p>\r\n', '2022-12-05 09:54:40', 1, 1),
(6, 'mitsubishi', 'mitsubishi.png', 'Mitsubishi. Conduza suas ambições', 'Automobilística', 1970, 'www.mitsubishicars.com', '<p>Mitsubishi Motors (三菱自動車工業株式会社, Mitsubishi Jidōsha Kōgyō Kabushiki Kaisha em japonês) é uma empresa japonesa que fabrica carros e caminhões com sede em Minato, Tóquio. Em 2011, a Mitsubishi se tornou a sexta maior montadora japonesa e a décima sexta maior responsável por produção de veículos do mundo. Ela surgiu da divisão da Mitsubishi Heavy Industries, em 1917 e é controlada pelo grupo principal Mitsubishi. Foi a primeira marca a produzir um veículo em série no Japão, o Mitsubishi Model A. Desde 2016, faz parte do grupo Aliança, juntamente com as marcas Renault e Nissan.</p>', '2022-12-05 10:02:28', 1, 1),
(7, 'acura', 'acura.png', 'Desempenho fabricado com precisão', 'Automobilística', 1986, 'www.acura.com', '<p>A ACURA (pronuncia-se É-kiu-ra) é uma empresa Nipo-Americana de origem japonesa, criada como divisão de luxo da Honda em março de 1986, para atuação primária nos mercados americano, canadense, mexicano e em Hong Kong. A iniciativa partiu em resposta à criação da Lexus pela Toyota em 1983 como divisão de luxo e da Infiniti, pela Nissan em 1985.</p>\r\n\r\n<p>Seu foco de atuação é no mercado de luxo, com preços inferiores à marcas tradicionais como Mercedes-Benz e BMW, mesma receita utilizada pelas concorrentes nipônicas. Apesar de ter sido a última das três empresas japonesas a ser fundada, em sua época, a Acura foi a primeira a entrar no mercado, já em 1986, com o modelo Legend, enquanto a Lexus chegou com o LS 400 em 1989 e a Infiniti apresentou o Q45 apenas em 1990.</p>\r\n\r\n<p>Após consolidar-se no mercado americano, a Acura partiu para novos territórios, estabelecendo-se na China em 2006 e no Japão em 2008, ainda que - igualmente à Infiniti e Lexus - sua participação seja pequena naquele país, onde o foco é para as marcas principais, Honda, Nissan e Toyota.</p>\r\n\r\n<p>Após a notabilização do Legend, a Acura investiu em esportivos, lançando o modelo NSX em 1991, famoso por seu desempenho, extraído do motor V6(com 276cv), considerado páreo para modelos de alta performance como Lamborghini, Ferrari, Porsche, entre outros.</p>\r\n\r\n<p>No Brasil, a Acura pretendia estabelecer-se oficialmente em 2015, apesar de ter tido alguns de seus automóveis importados de modo independente nos anos 90, após a abertura das importações, efetuada pelo Presidente Collor. Seu principal modelo, o Legend, foi vendido oficialmente no Brasil entre 1992 e 1997 sob a marca Honda. A iniciativa seguia com a chegada oficial da Lexus ao país, em 2012; que também teve modelos importados de forma independente desde os anos 90.</p>', '2022-12-05 10:07:38', 1, 1),
(8, 'BMW', 'BMW.png', 'Puro Prazer de Dirigir', 'Automobilística', 1916, 'www.bmw.com', '<p>As raízes da BMW estão ligadas a Karl Rapp e Gustav Otto. Em 1917, a empresa Rapp Motorenwerke Byertoren Werke GmbH, Aktiengesellschaft AG. Em 1916, a empresa Flugmaschinenfabrik Gustav Otto foi incorporada à Bayerische Flugzeug-Werke AG (BFW) a pedido do governo. A BMW AG posteriormente transferiu suas operações de construção de motores – incluindo a empresa e os nomes da marca – para a BMW, em 1922. A data de fundação da BMW, 7 de março de 1916, entrou para a história como a data de nascimento da Bayerische Motoren Werke AG.</p>\r\n\r\n<p>Inicialmente a Bayerische Motoren Werke AG foi fundada com o intuito de produzir motores para aviões, mas após a Primeira Guerra Mundial, devido ao Tratado de Versailles, foi proibida de construí-los. Por esse motivo chegou a produzir motocicletas, e mais tarde dedicou-se à fabricação de automóveis. Até há pouco tempo a própria BMW dizia que o seu símbolo representa uma hélice de avião a girar juntamente com o símbolo da Baviera, mas em descobertas recentes, a BMW alterou a sua versão sendo o azul/branco proveniente de uma antiga bandeira da Baviera. O símbolo BMW foi estampado na carroceria de um carro pela primeira vez em 1928.</p>\r\n\r\n<p>A BMW historicamente, sempre esteve envolvida nos desportos motorizados, inicialmente nas motocicletas e posteriormente nos automóveis. Durante a 2.ª Guerra Mundial, a BMW usou cerca de 30 mil trabalhadores forçados em sua fábrica, utilizados na produção de veículos terrestres e motores para os aviões da Luftwaffe.</p>', '2022-12-05 10:17:05', 1, 1),
(9, 'cadillac', 'cadillac.png', 'Vida, Liberdade e Perseguição', 'Automobilística', 1902, 'www.cadillac.com', '<p>Cadillac, formalmente Cadillac Motor Car Division, é uma marca automotiva estadunidense, divisão da General Motors, fundada em 1902 por Henry M. Leland. Atuante em mais de 50 países e territórios, a Cadillac especializa-se em veículos de luxo, sendo uma referência entre as fabricantes deste segmento. O maior mercado da empresa é o norte-americano, seguido pelos chineses. O grande investimento em marketing e publicidade, durante as décadas de 1950 e 1960, fundamentaram o nome \'Cadillac\' como sinônimo frequente de carros luxuosos. Sua maior rival no mercado estadunidense é a marca Lincoln, divisão de luxo da Ford.</p>\r\n\r\n<p>Fundada em 1902 como Cadillac Automobile Company, formada a partir dos remanescentes da Henry Ford Company, foi comprada pela General Motors e trinta anos depois já havia se tornado símbolo do alto padrão de luxo.</p>\r\n\r\n<p>Cadillac tornou-se pioneira em diversas tecnologias automotivas como os carros totalmente fechados, e a partida automática em substituição as antigas e desconfortáveis manivelas. Durante a Primeira Guerra Mundial, os motores aeronáuticos tiveram um grande desenvolvimento técnico, dedicando a eles 100% de sua capacidade produtiva.</p>\r\n\r\n<p>No ano de 1924 a empresa oferecia uma grande quantidade de cores e pinturas cromadas, enquanto as outras montadoras somente ofereciam a cor preta. Nesta década a montadora inova mais uma vez ao se tornar a primeira empresa do setor a utilizar um designer, Harley Earl, no lugar de um engenheiro para projetar a carroceria de seus carros em 1927. No ano seguinte, a GM também incorporou duas grandes empresas que produziam carrocerias exclusivas para CADILLAC, a Fisher e a Fleetwood, o que contribuiu bastante para o aprimoramento da linha de automóveis da marca. Na verdade os métodos de precisão criados por Leland, associados ao pioneirismo no uso de tecnologias de ponta criou uma imagem de qualidade e confiabilidade em torno da marca. Um outro fator que muito contribuiu para aumentar o prestígio da marca foi o fato dela ter se tornado a preferida pela emergente classe artística de Hollywood dos anos 20 em diante. A imagem de artistas dessa época como Clara Bow, Willian Boyd, Joan Crowford, Dolores Del Rio e Marlene Dietrich, chegando em automóveis CADILLAC nas “Avant Premiére” de seus filmes acabaram emprestando a marca muito do “Glamour” da Hollywood desses anos. Outras classes que também adotaram os modelos da marca foram os chefes de estado, membros da nobreza, magnatas, artistas de outras áreas e intelectuais renomados.</p>', '2022-12-05 10:27:32', 1, 1),
(10, 'Rolls-Royce', 'Rolls-Royce.png', 'Busque a perfeição em tudo o que fizer', 'Automobilística', 1906, 'www.rolls-roycemotorcars.com', '<p>Em 1884, Frederick Henry Royce fundou uma autoelétrica. Em 1904 fez seu primeiro carro, um “Royce”, na sua fábrica em Manchester. Em 1904 conheceu o vendedor Charles Stewart Rolls, que o procurou para discutirem o desejo mútuo de criar um tipo especial de carro.</p>\r\n\r\n<p>Dois anos depois o Silver Ghost entrou em linha de produção em Derby, efetivamente confirmando seu status como fabricante dos melhores carros do mundo. Durante as duas décadas seguintes mais de 7 000 desses carros de seis cilindros foram fabricados e adquiridos por motoristas ricos. Entre os proprietários estavam industriais, a realeza e uma nova geração de milionários – estrelas de cinema.</p>\r\n\r\n<p>Tudo sobre estes carros revela classe. Desde a magnífica mascote \"Espírito de Êxtase\", ao suntuoso interior estofado. Do silencioso som do motor, ao abafado som emitido ao fechar a porta do carro.</p>\r\n\r\n<p>O mais novo modelo da Rolls-Royce é o Rolls-Royce Dawn ano 2015; o novo modelo conversível da marca, um V12 biturbo de 6.6l e 570 cv que o faz ir de 0 a 100 km/h em apenas 4.6 segundos.</p>\r\n\r\n<p>Desde 1998, a divisão de automóveis da Rolls-Royce pertence ao Grupo BMW.</p>', '2022-12-05 10:37:43', 1, 1),
(11, 'Dodge', 'Dodge.png', 'Doméstico, não domesticado', 'Automobilística', 1914, 'www.dodge.com', '<p>A Dodge tem uma longa história, no início de 1900, os irmãos John Francis Dodge e Horace Elgin Dodge decidiram construir um automóvel diferente. Começaram com a produção de peças e, em 1914, desenvolveram sua indústria automobilística. Nos anos 1920 os irmãos faleceram, e em 1928 a Dodge Brothers passou a integrar a Chrysler Corporation.</p>\r\n\r\n<p>O carneiro montanhês foi adicionado em 1932 aos automóveis Dodge como ornamento do capô, simbolizando estilo agressivo, força e robustez.</p>\r\n\r\n<p>Em 1934, a Chrysler precisava aumentar as vendas do DeSoto, sua marca existente entre Plymouth e Dodge. Com isto, melhorou o acabamento do modelo e lançou na marca a nova carroceria Airflow, que era a mais cara da Chrysler. Com isto, a Dodge deixaria de ser a marca de luxo abaixo dos modelos Chrysler. Na década de 50, a Chrysler decide que a Dodge enfrente de vez sua grande rival, a Pontiac. Com isto, nasceriam novos modelos, como o Dodge Royal, focado no melhor custo e na esportividade. Fato que ficaria notório na era dos Muscle Cars, com o Charger e o Pontiac GTO Judge sendo os maiores expoentes - e eternos rivais - do gênero.</p>', '2023-01-02 11:05:19', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricante_fundador`
--

CREATE TABLE `fabricante_fundador` (
  `ID` int(11) UNSIGNED NOT NULL,
  `fabricante_id` int(11) UNSIGNED DEFAULT NULL,
  `fundador_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `fabricante_fundador`
--

INSERT INTO `fabricante_fundador` (`ID`, `fabricante_id`, `fundador_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 3),
(4, 3, 4),
(5, 4, 5),
(9, 7, 9),
(10, 8, 10),
(11, 8, 11),
(15, 10, 15),
(16, 10, 16),
(27, 9, 13),
(28, 9, 14),
(30, 6, 8),
(31, 11, 18),
(32, 11, 17),
(34, 5, 6),
(35, 5, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricante_produto`
--

CREATE TABLE `fabricante_produto` (
  `ID` int(11) UNSIGNED NOT NULL,
  `fabricante_id` int(11) UNSIGNED DEFAULT NULL,
  `produto_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `fabricante_produto`
--

INSERT INTO `fabricante_produto` (`ID`, `fabricante_id`, `produto_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 1),
(6, 3, 1),
(7, 4, 1),
(10, 7, 1),
(11, 8, 5),
(13, 8, 1),
(15, 10, 1),
(52, 9, 1),
(54, 6, 1),
(55, 11, 1),
(57, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricante_proprietario`
--

CREATE TABLE `fabricante_proprietario` (
  `ID` int(11) UNSIGNED NOT NULL,
  `fabricante_id` int(11) UNSIGNED DEFAULT NULL,
  `proprietario_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `fabricante_proprietario`
--

INSERT INTO `fabricante_proprietario` (`ID`, `fabricante_id`, `proprietario_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 3, 4),
(5, 4, 1),
(7, 7, 6),
(8, 8, 7),
(9, 8, 8),
(10, 8, 9),
(13, 10, 11),
(19, 9, 10),
(21, 6, 5),
(22, 11, 12),
(24, 5, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricante_sede`
--

CREATE TABLE `fabricante_sede` (
  `ID` int(11) UNSIGNED NOT NULL,
  `fabricante_id` int(11) UNSIGNED DEFAULT NULL,
  `sede_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `fabricante_sede`
--

INSERT INTO `fabricante_sede` (`ID`, `fabricante_id`, `sede_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5),
(6, 3, 6),
(7, 3, 7),
(8, 3, 2),
(9, 4, 5),
(10, 4, 3),
(17, 7, 14),
(18, 7, 10),
(19, 7, 13),
(20, 7, 12),
(21, 8, 15),
(22, 8, 16),
(23, 8, 5),
(26, 10, 18),
(27, 10, 19),
(28, 10, 20),
(43, 9, 10),
(44, 9, 17),
(48, 6, 13),
(49, 6, 11),
(50, 6, 12),
(51, 11, 21),
(52, 11, 10),
(53, 11, 9),
(55, 5, 8),
(56, 5, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE `fotos` (
  `ID` int(11) UNSIGNED NOT NULL,
  `foto` varchar(45) NOT NULL,
  `modelo_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `fotos`
--

INSERT INTO `fotos` (`ID`, `foto`, `modelo_id`) VALUES
(173, '350GTV2023-01-05122857_0.jpg', 1),
(174, '350GTV2023-01-05122857_1.jpg', 1),
(175, '350GTV2023-01-05122857_2.jpg', 1),
(176, '350GTV2023-01-05122857_3.jpg', 1),
(177, '350GTV2023-01-05122857_4.jpg', 1),
(178, '350GTV2023-01-05122857_5.jpg', 1),
(179, '350GTV2023-01-05122857_6.jpg', 1),
(180, '350GTV2023-01-05122857_7.jpg', 1),
(181, '350GTV2023-01-05122857_8.jpg', 1),
(182, '350GTV2023-01-05122857_9.jpg', 1),
(183, '350GTV2023-01-05122857_10.jpg', 1),
(184, '350GTV2023-01-05122857_11.jpg', 1),
(185, '350GTV2023-01-05122857_12.jpg', 1),
(186, 'DiabloVT2023-01-05123208_0.jpg', 2),
(187, 'DiabloVT2023-01-05123208_1.jpg', 2),
(188, 'DiabloVT2023-01-05123208_2.jpg', 2),
(189, 'DiabloVT2023-01-05123208_3.jpg', 2),
(190, 'DiabloVT2023-01-05123208_4.jpg', 2),
(191, 'DiabloVT2023-01-05123208_5.jpg', 2),
(192, 'DiabloVT2023-01-05123208_6.jpg', 2),
(193, 'DiabloVT2023-01-05123208_7.jpg', 2),
(194, 'SLRMcLaren2023-01-05133237_0.jpg', 3),
(195, 'SLRMcLaren2023-01-05133237_1.jpg', 3),
(196, 'SLRMcLaren2023-01-05133237_2.jpg', 3),
(197, 'SLRMcLaren2023-01-05133237_3.jpg', 3),
(198, 'SLRMcLaren2023-01-05133237_4.jpg', 3),
(199, 'SLRMcLaren2023-01-05133237_5.jpg', 3),
(200, 'SLRMcLaren2023-01-05133237_6.jpg', 3),
(201, 'SLRMcLaren2023-01-05133237_7.jpg', 3),
(202, 'SLRMcLaren2023-01-05133237_8.jpg', 3),
(203, 'SLRMcLaren2023-01-05133237_9.jpg', 3),
(204, 'SLRMcLaren2023-01-05133237_10.jpg', 3),
(205, 'SLRMcLaren2023-01-05133237_11.jpg', 3),
(206, 'SLRMcLaren2023-01-05133237_12.jpg', 3),
(207, 'SLRMcLaren2023-01-05133237_13.jpg', 3),
(208, 'SLRMcLaren2023-01-05133237_14.jpg', 3),
(209, 'SLRMcLaren2023-01-05133237_15.jpg', 3),
(210, 'SLRMcLaren2023-01-05133237_16.jpg', 3),
(211, 'SLRMcLaren2023-01-05133237_17.jpg', 3),
(212, 'SLRMcLaren2023-01-05133237_18.jpg', 3),
(213, 'SLRMcLaren2023-01-05133237_19.jpg', 3),
(214, 'Murcielago2023-01-05133939_0.jpg', 4),
(215, 'Murcielago2023-01-05133939_1.jpg', 4),
(216, 'Murcielago2023-01-05133939_2.jpg', 4),
(217, 'Murcielago2023-01-05133939_3.jpg', 4),
(218, 'Murcielago2023-01-05133939_4.jpg', 4),
(219, 'Murcielago2023-01-05133939_5.jpg', 4),
(220, 'Murcielago2023-01-05133939_6.jpg', 4),
(221, 'Murcielago2023-01-05133939_7.jpg', 4),
(222, 'Murcielago2023-01-05133939_8.jpg', 4),
(223, 'Murcielago2023-01-05133939_9.jpg', 4),
(224, 'Murcielago2023-01-05133939_10.jpg', 4),
(225, 'Murcielago2023-01-05133939_11.jpg', 4),
(226, 'Murcielago2023-01-05133939_12.jpg', 4),
(227, 'Murcielago2023-01-05133939_13.jpg', 4),
(228, 'Murcielago2023-01-05133939_14.jpg', 4),
(229, 'Murcielago2023-01-05133939_15.jpg', 4),
(230, 'Murcielago2023-01-05133939_16.jpg', 4),
(231, 'Murcielago2023-01-05133939_17.jpg', 4),
(232, 'Murcielago2023-01-05133939_18.jpg', 4),
(233, 'AventadorSVJRoadster2023-01-05134723_0.jpg', 5),
(234, 'AventadorSVJRoadster2023-01-05134723_1.jpg', 5),
(235, 'AventadorSVJRoadster2023-01-05134723_2.jpg', 5),
(236, 'AventadorSVJRoadster2023-01-05134723_3.jpg', 5),
(237, 'AventadorSVJRoadster2023-01-05134723_4.jpg', 5),
(238, 'AventadorSVJRoadster2023-01-05134723_5.jpg', 5),
(239, 'AventadorSVJRoadster2023-01-05134723_6.jpg', 5),
(240, 'AventadorSVJRoadster2023-01-05134723_7.jpg', 5),
(241, 'AventadorSVJRoadster2023-01-05134723_8.jpg', 5),
(242, 'AventadorSVJRoadster2023-01-05134723_9.jpg', 5),
(243, 'AventadorSVJRoadster2023-01-05134723_10.jpg', 5),
(244, 'AventadorSVJRoadster2023-01-05134723_11.jpg', 5),
(245, 'AventadorSVJRoadster2023-01-05134723_12.jpg', 5),
(246, 'AventadorSVJRoadster2023-01-05134723_13.jpg', 5),
(247, 'AventadorSVJRoadster2023-01-05134723_14.jpg', 5),
(248, 'AventadorSVJRoadster2023-01-05134723_15.jpg', 5),
(249, 'AventadorSVJRoadster2023-01-05134723_16.jpg', 5),
(250, 'AventadorSVJRoadster2023-01-05134723_17.jpg', 5),
(251, 'AventadorSVJRoadster2023-01-05134723_18.jpg', 5),
(252, 'AventadorSVJRoadster2023-01-05134723_19.jpg', 5),
(253, 'Veneno2023-01-05135214_0.jpg', 6),
(254, 'Veneno2023-01-05135214_1.jpg', 6),
(255, 'Veneno2023-01-05135214_2.jpg', 6),
(256, 'Veneno2023-01-05135214_3.jpg', 6),
(257, 'Veneno2023-01-05135214_4.jpg', 6),
(258, 'Veneno2023-01-05135214_5.jpg', 6),
(259, 'Veneno2023-01-05135214_6.jpg', 6),
(260, 'Veneno2023-01-05135214_7.jpg', 6),
(261, 'Veneno2023-01-05135214_8.jpg', 6),
(262, 'Veneno2023-01-05135214_9.jpg', 6),
(263, 'Espada2023-01-05135706_0.jpg', 7),
(264, 'Espada2023-01-05135706_1.jpg', 7),
(265, 'Espada2023-01-05135706_2.jpg', 7),
(266, 'Espada2023-01-05135706_3.jpg', 7),
(267, 'Espada2023-01-05135706_4.jpg', 7),
(268, 'Espada2023-01-05135706_5.jpg', 7),
(269, 'Espada2023-01-05135706_6.jpg', 7),
(270, 'Espada2023-01-05135706_7.jpg', 7),
(271, 'Espada2023-01-05135706_8.jpg', 7),
(272, 'Espada2023-01-05135706_9.jpg', 7),
(273, 'Espada2023-01-05135706_10.jpg', 7),
(274, 'Espada2023-01-05135706_11.jpg', 7),
(275, 'Espada2023-01-05135706_12.jpg', 7),
(276, 'Espada2023-01-05135706_13.jpg', 7),
(277, 'Espada2023-01-05135706_14.jpg', 7),
(278, 'Espada2023-01-05135706_15.jpg', 7),
(279, 'Espada2023-01-05135706_16.jpg', 7),
(280, 'Espada2023-01-05135706_17.jpg', 7),
(281, 'Espada2023-01-05135706_18.jpg', 7),
(282, 'Espada2023-01-05135706_19.jpg', 7),
(286, 'MiuraSVR2023-01-09120542_0.jpg', 8),
(287, 'MiuraSVR2023-01-09120542_1.jpg', 8),
(288, 'MiuraSVR2023-01-09120542_2.jpg', 8),
(289, 'MiuraSVR2023-01-09120542_3.jpg', 8),
(290, 'MiuraSVR2023-01-09120542_4.jpg', 8),
(291, 'MiuraSVR2023-01-09120542_5.jpg', 8),
(292, 'MiuraSVR2023-01-09120542_6.jpg', 8),
(293, 'MiuraSVR2023-01-09120542_7.jpg', 8),
(294, 'MiuraSVR2023-01-09120542_8.jpg', 8),
(295, 'MiuraSVR2023-01-09120542_9.jpg', 8),
(296, 'MiuraSVR2023-01-09120542_10.jpg', 8),
(297, 'MiuraSVR2023-01-09120542_11.jpg', 8),
(298, 'MiuraSVR2023-01-09120542_12.jpg', 8),
(299, 'MiuraSVR2023-01-09120542_13.jpg', 8),
(300, 'AventadorSRoadster2023-01-09120917_0.jpg', 9),
(301, 'AventadorSRoadster2023-01-09120917_1.jpg', 9),
(302, 'AventadorSRoadster2023-01-09120917_2.jpg', 9),
(303, 'AventadorSRoadster2023-01-09120917_3.jpg', 9),
(304, 'AventadorSRoadster2023-01-09120917_4.jpg', 9),
(305, 'AventadorSRoadster2023-01-09120917_5.jpg', 9),
(306, 'AventadorSRoadster2023-01-09120917_6.jpg', 9),
(307, 'AventadorSRoadster2023-01-09120917_7.jpg', 9),
(308, 'AventadorSRoadster2023-01-09120917_8.jpg', 9),
(309, 'AventadorSRoadster2023-01-09120917_9.jpg', 9),
(310, 'AventadorSRoadster2023-01-09120917_10.jpg', 9),
(311, 'AventadorSRoadster2023-01-09120917_11.jpg', 9),
(312, 'AventadorSRoadster2023-01-09120917_12.jpg', 9),
(313, 'AventadorSRoadster2023-01-09120917_13.jpg', 9),
(314, 'AventadorSRoadster2023-01-09120917_14.jpg', 9),
(315, 'AventadorSRoadster2023-01-09120917_15.jpg', 9),
(316, 'AventadorSRoadster2023-01-09120917_16.jpg', 9),
(317, 'AventadorSRoadster2023-01-09120917_17.jpg', 9),
(318, 'EQE2023-01-09121222_0.jpg', 10),
(319, 'EQE2023-01-09121222_1.jpg', 10),
(320, 'EQE2023-01-09121222_2.jpg', 10),
(321, 'EQE2023-01-09121222_3.jpg', 10),
(322, 'EQE2023-01-09121222_4.jpg', 10),
(323, 'EQE2023-01-09121222_5.jpg', 10),
(324, 'EQE2023-01-09121222_6.jpg', 10),
(325, 'EQE2023-01-09121222_7.jpg', 10),
(326, 'EQE2023-01-09121222_8.jpg', 10),
(327, 'EQE2023-01-09121222_9.jpg', 10),
(328, 'EQE2023-01-09121222_10.jpg', 10),
(329, 'EQE2023-01-09121222_11.jpg', 10),
(330, 'EQE2023-01-09121222_12.jpg', 10),
(331, 'EQE2023-01-09121222_13.jpg', 10),
(332, 'EQE2023-01-09121222_14.jpg', 10),
(333, 'EQE2023-01-09121222_15.jpg', 10),
(334, 'EQE2023-01-09121222_16.jpg', 10),
(335, 'EQE2023-01-09121222_17.jpg', 10),
(336, 'EQE2023-01-09121222_18.jpg', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `ID` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `situacao` tinyint(1) DEFAULT NULL,
  `cargo_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`ID`, `nome`, `sobrenome`, `email`, `senha`, `situacao`, `cargo_id`) VALUES
(1, 'alma', 'negra', 'almanegra@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1),
(2, 'quase', 'nada', 'quasenada@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 2),
(3, 'Poucas', 'Trancas', 'poucastrancas@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fundadores`
--

CREATE TABLE `fundadores` (
  `ID` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `fundadores`
--

INSERT INTO `fundadores` (`ID`, `nome`) VALUES
(1, 'Ferruccio Lamborghini'),
(2, 'Karl Benz'),
(3, 'Gottlieb Daimler'),
(4, 'Enzo Ferrari'),
(5, 'Ferdinand Porsche'),
(6, 'Louis Chevrolet'),
(7, 'William C. Durant'),
(8, 'Mitsubishi Heavy Industries'),
(9, 'Soichiro Honda'),
(10, 'Karl Rapp'),
(11, 'Gustav Otto'),
(12, 'Günther Quandt'),
(13, 'Henry Leland'),
(14, 'William Murphy'),
(15, 'Henry Royce'),
(16, 'Charles Rolls'),
(17, 'John'),
(18, 'Horace Dodge');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelos`
--

CREATE TABLE `modelos` (
  `ID` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `ano` int(4) DEFAULT NULL,
  `classe` varchar(45) DEFAULT NULL,
  `velocidade` int(4) DEFAULT NULL,
  `preco` int(10) DEFAULT NULL,
  `peso` int(10) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `data_publicada` datetime DEFAULT NULL,
  `situacao` tinyint(1) DEFAULT NULL,
  `fabricante_id` int(11) UNSIGNED DEFAULT NULL,
  `funcionario_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `modelos`
--

INSERT INTO `modelos` (`ID`, `nome`, `ano`, `classe`, `velocidade`, `preco`, `peso`, `descricao`, `data_publicada`, `situacao`, `fabricante_id`, `funcionario_id`) VALUES
(1, '350 GTV', 1963, 'Esportivo', 257, 593403, 1230, '<p>O Lamborghini 350 GTV foi o protótipo e precursor do posterior 350 GT (o primeiro modelo de produção da Lamborghini).</p>\r\n<p>Apresentava um polêmico design de carroceria semi-fastback de Franco Scaglione, que foi modificado para produção em série pela Carrozzeria Touring, e o próprio motor V-12 de 3,5 litros da Lamborghini. O carro foi apresentado ao público no Salão do Automóvel de Turim de 1963.</p>', '2022-12-02 09:50:55', 1, 1, 1),
(2, 'Diablo VT', 1993, 'Esportivo', 325, 250000, 1625, '<p>Em 2022, a Lamborghini celebra o V12, o lendário motor de 12 cilindros que alimenta seus modelos mais icônicos há quase 60 anos. O Diablo é um modelo: o primeiro superesportivo Lamborghini oferecido em uma versão com tração nas quatro rodas. Quando estreou, o Diablo estava tão à frente de seu tempo que foi identificado como um hipercarro de produção em série. Apresentado oficialmente a 21 de Janeiro de 1990 durante o Lamborghini Day no Sporting de Monte Carlo, o motor de 12 cilindros debitava inicialmente uma cilindrada de 5,7 litros e posteriormente 6,0 litros, produzindo uma potência máxima de cerca de 600 CV nas versões de estrada e 655 CV nas versões de estrada. o modelo GT1 Stradale para a pista, do qual apenas duas unidades foram feitas.</p>\r\n\r\n\r\n<p>O motor de combustão V12 \"puro\" em sua forma final sairá de produção antes do final de 2022, quando o último Aventador Ultimae for fabricado. A partir de 2023, o herdeiro do Aventador será equipado com uma nova versão híbrida plug-in do motor V12.</p>\r\n\r\n\r\n<p><span>Um sucesso comercial que durou 11 anos</span></p>\r\n\r\n\r\n<p>O Diablo ocupa um lugar especial na história da Automobili Lamborghini e no coração dos entusiastas, e não apenas por causa de seu incrível desempenho e experiência de direção. Este foi o modelo que impulsionou a montadora para a era moderna. O Projeto 132 - como era chamado dentro da empresa - surgiu em 1985 para substituir o Countach, por isso tinha que transmitir todo o poder da montadora de Sant\'Agata: parecer esportivo e musculoso, mas sempre atraente; entregar a estética pela qual a Lamborghini sempre foi conhecida; e ser preparado para o futuro, para permanecer o carro de produção mais rápido do mundo nos próximos anos. A forma como conduziu a estrada durante os testes iniciais foi surpreendente, um sucesso alcançado através do intenso trabalho de desenvolvimento que envolveu o ex-Campeão do Mundo de Ralis Sandro Munari. Ao longo de sua vida comercial, que durou até 2001, o Diablo também demonstrou sua capacidade de se transformar e se adaptar às demandas do mercado e às expectativas de seus clientes. Com 2.903 unidades produzidas durante os 11 anos em que esteve em produção, o Diablo foi um grande sucesso.</p>\r\n\r\n\r\n<p><span>Desenvolvimento do motor V12</span></p>\r\n\r\n\r\n<p>A pedra angular técnica do Diablo continua sendo o motor V12 de 60 °, derivado diretamente do motor de 3,5 litros de 1963, aumentado para 5,7 litros ao longo dos anos. Este último, na verdade, era o tamanho do motor quando o Diablo fez sua estreia. Nesta configuração, a posição longitudinal traseira com conversor catalítico gerou uma potência máxima de 492 HP a 6800 rpm e um valor de torque de 580 Nm a 5200 rpm. Ele também ostentava uma injeção eletrônica de combustível Lamborghini-Weber Marelli LIE. Em 1999, primeiro com o Diablo GT e depois com o Diablo 6.0 SE, o tamanho do motor foi aumentado para 6,0 litros e, graças à calibração aprimorada da injeção de combustível, atingiu 525 cv e 605 Nm de torque.</p>\r\n\r\n\r\n<p><span>Diablo segunda série: mais rápido e mais poderoso</span></p>\r\n\r\n\r\n<p>O ponto de virada para a Lamborghini veio em 1998, quando a Audi comprou a empresa. A montadora finalmente teve recursos suficientes para desenvolver um plano industrial mais refinado e ganhou acesso a componentes e tecnologias jamais sonhadas. Os novos proprietários também viram o Diablo como um produto que vale a pena manter e desenvolver. Isso levou ao nascimento da segunda série do Diablo, projetada no novíssimo Centro Stile interno. Ainda mais rápido e potente do que nunca graças ao maior motor V12 de 6 litros, também ostentava acabamentos mais luxuosos e maior confiabilidade durante a condução diária, resultado de um rigoroso controle de qualidade durante o projeto, teste e produção.</p>\r\n\r\n\r\n<p>1993: O ano do Diablo VT, o primeiro Lamborghini com tração nas quatro rodas</p>\r\n\r\n\r\n<p>Originalmente, a mecânica do Diablo, embora refinada, ainda era tradicional, consistindo em motor traseiro longitudinal com quatro árvores de cames acionadas por corrente, injeção eletrônica de combustível, tração traseira e transmissão mecânica. A direção hidráulica chegou apenas em 1993 e a eletrônica estava ali apenas para controlar o motor. O Diablo VT, o primeiro superesportivo com tração nas quatro rodas da Lamborghini, foi apresentado em 1993, tornando-se referência em termos de aderência e segurança de direção em qualquer condição.</p>\r\n\r\n\r\n<p>\"VT\" significa \"Viscous Traction\", porque a transferência de torque do eixo traseiro para o trem de pouso dianteiro é feita por meio de um acoplamento viscoso. Com este sistema, o VT é normalmente um veículo de tração traseira com até 20% de transferência para as rodas dianteiras somente se as rodas traseiras escorregarem por meio de um acoplamento viscoso e um eixo propulsor conectado ao diferencial dianteiro. O VT também introduziu outra inovação para a Lamborghini: suspensão controlada eletronicamente, com cinco programas de operação predefinidos para escolher.</p>\r\n\r\n\r\n<p><span>1995: O Diablo Roadster faz sua estreia, o primeiro Lamborghini conversível de 12 cilindros</span></p>\r\n\r\n\r\n<p>Com o V12 Diablo também produzido em versão open top, o Diablo deu início a mais uma nova tradição. Na verdade, algumas tentativas tímidas foram feitas em anos anteriores, mas essas permaneceram versões pontuais. Em dezembro de 1995, o Diablo Roadster fez sua estreia, ostentando uma capota Targa de fibra de carbono alojada sobre a tampa do motor quando abaixada.</p>\r\n\r\n\r\n<p><span>corrida</span></p>\r\n\r\n\r\n<p>A Lamborghini voltou a correr com o Diablo, graças ao Super Sport Trophy - mais tarde Super Trofeo - campeonato de automobilismo, onde estreou em uma corrida paralela durante as 24 Horas de Le Mans em 1996. Trinta e quatro 550 HP Diablo SV- Rs foram feitos para pilotos cavalheiros competindo em corridas de uma hora.</p>\r\n\r\n\r\n<p><span>Diablo em filmes</span></p>\r\n\r\n\r\n<p>O Diablo foi destaque em vários filmes. Uma das cenas mais memoráveis foi do filme americano \"Dumb & Dumber\", estrelado por Jim Carrey, Jeff Daniels e o Diablo vermelho em que eles chegam ao hotel.</p>\r\n\r\n<p>Também apareceu no filme de 2001 \"Exit Wounds\", dirigido por Andrzej Bartkowiak, com \"DMX\" Earl Simmons e Anthony Anderson. Aqui, um Diablo VT Roadster 1999 rouba a cena na cena do showroom de carros, comprado em dinheiro depois de um emocionante motor \"acelerar\".</p>\r\n\r\n\r\n<p>Por fim, no videogame \"Need for Speed III: Hot Pursuit\", o carro apresentado é um Diablo SV.</p>', '2022-12-02 10:26:38', 1, 1, 1),
(3, 'SLR McLaren', 2004, 'Grand tourer', 334, 500000, 1768, '<p>O Mercedes-Benz SLR McLaren é uma prova impressionante da competência e experiência da Mercedes-Benz e de nossa parceira na Fórmula 1, a McLaren, no desenvolvimento e produção de carros esportivos de alto desempenho. O carro de dois lugares, com suas impressionantes portas giratórias e elementos de estilo emprestados dos Silver Arrows da Fórmula 1, segue o legado dos famosos carros de corrida SLR da década de 1950. Equipado com tecnologia de carros de corrida de ponta e novos desenvolvimentos inovadores da Mercedes, projetados para garantir um alto padrão de segurança e adequação para o uso diário, o novo Mercedes-Benz SLR McLaren cria uma imagem distinta para si mesmo como um 21º século Gran Turismo - uma síntese emocionante de tradição e inovação.</p>\r\n\r\n<p>O recém-desenvolvido motor V8 superalimentado oferece uma potência de 460 kW/626 hp e acelera o esportivo de 0 a 100 km/h em 3,8 segundos. A velocidade máxima é de aproximadamente 334 km/h. A carroceria do Mercedes-Benz SLR McLaren, assim como a dos carros de corrida Mercedes-McLaren de Fórmula 1, é feita de compósitos de fibra de carbono - materiais leves que demonstram absorção de energia exemplar, garantindo assim o mais alto padrão de proteção aos ocupantes. O SLR é o primeiro carro produzido em série do mundo a ter uma estrutura frontal totalmente fabricada em fibra de carbono. Airbags adaptativos, recém-desenvolvidos kneebags e sidebags, tensores de cinto, discos de freio de cerâmica de alto desempenho e um freio a ar automaticamente adaptável na tampa do porta-malas completam a gama de equipamentos de segurança a bordo do Mercedes-Benz SLR McLaren,</p>\r\n\r\n<p>Tecnologia muito à frente de seu tempo e abundância de potência - essas eram as marcas registradas dos lendários carros de corrida SLR nos quais Fangio, Moss, Kling e outros pilotos da Mercedes alcançaram vitórias espetaculares em todas as principais corridas de rua em 1955. O Mercedes -Benz SLR McLaren demonstra as mesmas características, suas inovações técnicas revolucionárias o distinguem como o Mercedes-Benz entre os carros esportivos de alto desempenho.</p>\r\n\r\n<p><span>Dois membros longitudinais feitos de compósito de fibra de carbono absorvem energia em uma colisão frontal</span></p>\r\n\r\n<p>O Gran Turismo do século 21 é feito quase inteiramente de compósito de fibra de carbono. Este material leve, mas extremamente rígido, originou-se nas indústrias aeronáutica e espacial e também provou seus benefícios nos carros de corrida de Fórmula 1 atuais. A vantagem de peso do material de alta tecnologia sobre o aço é de cerca de 50 por cento, e as fibras de carbono, no impacto, são caracterizadas por uma absorção de energia quatro a cinco vezes maior do que o aço ou o alumínio. A Mercedes-Benz explora essas qualidades incorporando dois membros longitudinais de 620 milímetros feitos de fibra de carbono na estrutura dianteira do Mercedes-Benz SLR McLaren. Eles absorvem toda a energia do impacto em uma colisão frontal definida, deixando a célula do passageiro praticamente intacta.</p>\r\n\r\n<p>A Mercedes-Benz também introduziu uma nova tecnologia de materiais na fabricação dos discos de freio. Eles são feitos de cerâmica reforçada com fibra e são caracterizados por alta resistência ao desbotamento e uma vida útil muito longa. Em colaboração com o sistema de frenagem eletro-hidráulico, Sensotronic Brake Control (SMC™), eles também permitem valores de desaceleração excepcionais, destacando de forma impressionante a herança automobilística do Mercedes-Benz SLR McLaren.</p>', '2022-12-02 11:03:48', 1, 2, 1),
(4, 'Murcielago ', 2002, 'Esportivo', 342, 273000, 1650, '<p>No final da tarde de 5 de outubro de 1879, após uma disputa acirrada na arena de Córdoba, um touro chamado Murciélago da coudelaria de Joaquin del Val di Navarra teve sua vida poupada pelo famoso matador Rafael Molina \"Lagartijo\".</p>\r\n\r\n<p>Esta foi uma ocorrência muito rara nas touradas e uma honra concedida apenas aos touros que demonstraram coragem e espírito excepcionais na arena. E Murciélago era mesmo um touro.</p>\r\n\r\n\r\n<p>Ele foi posteriormente doado ao criador Antonio Miura, e passou a ser o pai de uma formidável linhagem de touros de briga que se estende até os dias atuais.</p>\r\n\r\n\r\n<p>O touro sempre foi um símbolo de poder, agressividade e coragem: características que são compartilhadas por todos os carros da marca Lamborghini.</p>\r\n\r\n<p>Nas representações de touradas, touro e matador juntos formam uma unidade emblemática, uma combinação antitética de força bruta e elegância. E é esta simbiose de violência e beleza que torna o espetáculo das touradas tão fascinante.</p>\r\n\r\n\r\n<p>No contexto da arena, o espírito indomável do touro torna-se uma combinação letal de agilidade e força muscular, que deve ser superada pela graça e habilidade do matador.</p>\r\n\r\n\r\n<p>Fiel à tradição em que o touro sempre foi o símbolo da prestigiosa empresa automobilística fundada por Ferruccio Lamborghini - nada menos que nascido sob o signo de Touro - a direção da Automobili Lamborghini decidiu batizar o último carro da nobre linha com o nome de um touro bravo. E assim, após uma sucessão de nomes ligados ao mundo da corrida, como Miura , Islero , Urraco , Bravo, Jalpa e Espada(este último sendo espanhol para espada, a arma do matador e, portanto, um símbolo para o próprio matador), agora temos Murciélago - que coincidentemente também significa \"morcego\" em espanhol. Um nome incomum, talvez, mas que expressa efetivamente o dinamismo, a elegância e o poder do mais recente puro-sangue a emergir do estábulo da Lamborghini.</p>\r\n\r\n\r\n<p><span>O conceito</span></p>\r\n\r\n<p>O Lamborghini Murciélago é um coupé de 2 lugares e 2 portas (com as agora conhecidas portas asa de gaivota) baseado no layout tradicional da Lamborghini: motor V12 montado no meio, transmissão Lamborghini típica com a caixa de câmbio montada na frente do motor e na traseira diferencial integrado à unidade do motor, tração permanente nas quatro rodas com acoplador viscoso central.</p>\r\n\r\n\r\n<p>Este layout, empregado com sucesso pela Lamborghini por mais de 30 anos, oferece uma ótima distribuição de peso (58% traseiro e 42% dianteiro) com vantagens visíveis para tração, frenagem e manuseio.</p>\r\n\r\n\r\n<p>O design da suspensão (triângulos duplos independentes) representa a melhor solução possível para um GT de alto desempenho e, novamente, está de acordo com a tradição da Lamborghini.</p>\r\n\r\n<p>Os painéis externos da carroceria são feitos de fibra de carbono, com exceção do teto de aço e dos painéis das portas.</p>\r\n\r\n\r\n<p>A traseira do carro possui duas entradas \"ativas\" para o ar de resfriamento do motor. Com o exclusivo VACS (\"Variable Air-flow Cooling System\"), a abertura dessas entradas de ar pode ser variada para se adequar às condições de direção. Além disso, para garantir o equilíbrio aerodinâmico correto em todas as velocidades, o ângulo do spoiler traseiro também pode ser alterado. De acordo com a velocidade do carro, o spoiler traseiro pode assumir três posições diferentes: fechado de 0 a 130 km/h, parcialmente aberto (50°) entre 130 e 220 km/h e totalmente aberto (70°) acima de 220 km/h . Dependendo da abertura das entradas de ar e da posição do spoiler traseiro, o coeficiente Cx do carro varia de um mínimo de 0,33 a um máximo de 0,36.</p>\r\n', '2022-12-02 11:18:24', 1, 1, 1),
(5, 'Aventador SVJ Roadster', 2020, 'Esportivo', 350, 573966, 1525, '<p>O Lamborghini Aventador SVJ Roadster fez sua estreia mundial no Salão Automóvel de Genebra de 2019, apresentado pela Automobili Lamborghini ao lado do novo Huracán EVO Spyder. A versão open-top do coupé, o Aventador SVJ Roadster mantém o desempenho excepcional, dirigibilidade e superioridade aerodinâmica do SVJ, com seu design roadster exclusivo garantindo uma alegria ao ar livre exclusiva para motorista e passageiro.</p>\r\n\r\n<p>\"O Aventador SVJ Roadster herda toda a potência, desempenho e tecnologias aerodinâmicas inovadoras do coupé, mas com sua própria presença e proeza icônicas\", disse o presidente e CEO da Automobili Lamborghini, Stefano Domenicali. \"É tão empolgante de dirigir quanto o Aventador SVJ, mas com uma exclusividade adicional: a opção do ar livre. Com o mesmo teto de desempenho extraordinário ligado ou desligado, o Aventador SVJ Roadster incorpora o dinamismo do coupé com o espírito único de um Lamborghini roadster.\"</p>\r\n\r\n<p>O SVJ Roadster ostenta o \'Super Veloce\' para supervelocidade e os sufixos \'Jota\', significando o desempenho do carro e as proezas da pista: seu companheiro de estábulo coupé levou o tempo de volta recorde do carro de produção de Nürburgring-Nordschleife e o roadster não é menos futurista, o carro do motorista . O desempenho de referência vem do carro com motor V12 de produção em série mais potente produzido até hoje pela Lamborghini, produzindo 770 cv (566 kW) a um máximo de 8.500 rpm. O SVJ Roadster oferece 720 Nm de torque a 6.750 rpm, com uma relação peso/potência de 2,05 kg/cv. O SVJ acelera de 0 a 100 km/h em 2,9 segundos e de 0 a 200 km/h em 8,8 segundos. Uma velocidade máxima de mais de 350 km/h é complementada por uma distância de frenagem de 100 km/h a 0 em 31 metros.</p>\r\n\r\n<p>O teto do roadster, construído em fibra de carbono RTM de alta pressão, é removível por meio de alavancas de liberação rápida na cabine e armazenado com segurança sob o capô dianteiro. Pesando menos de 6 kg cada peça, o roadster acrescenta apenas 50 kg aos 1.525 kg do SVJ coupé.</p>\r\n\r\n<p>Serão produzidas apenas 800 unidades do Aventador SVJ Roadster. O carro mostrado em Genebra na nova cor fosca bronzo zenas (bronze) apresenta uma pintura especial Ad Personam em bianco phanes (branco). A pintura enfatiza as linhas nítidas dos para-choques dianteiro e traseiro e enriquece ainda mais o capô do motor especificamente redesenhado.</p>', '2022-12-02 11:41:23', 1, 1, 1),
(6, 'Veneno', 2013, 'Esportivo', 355, 4000000, 1450, '<p>No ano do seu 50º aniversário, a Automobili Lamborghini apresenta um modelo extremamente exclusivo no Salão Automóvel de Genebra de 2013. Apenas três unidades exclusivas do Lamborghini Veneno serão construídas e vendidas. Seu design é consistentemente focado na aerodinâmica ideal e na estabilidade nas curvas, dando ao Veneno a verdadeira experiência dinâmica de um protótipo de corrida, mas totalmente homologado para a estrada. Com uma potência máxima de 552 kW / 750 cv, o Lamborghini Veneno acelera de 0 a 100 km/h em apenas 2,8 segundos e a velocidade máxima para este carro de corrida legal é de 355 km/h. Tem um preço de três milhões de euros mais impostos - e todas as três unidades já foram vendidas aos clientes.</p>\r\n\r\n<p>O Lamborghini Veneno apresenta uma unidade de potência de doze cilindros com um deslocamento de 6,5 litros, uma transmissão ISR de 7 velocidades extremamente rápida com 5 modos de condução e tração permanente nas quatro rodas, bem como um chassi de corrida com suspensão pushrod e mola horizontal /unidades amortecedoras. Acima de tudo, no entanto, o Veneno se beneficia da experiência muito especial que a Automobili Lamborghini possui no desenvolvimento e execução de materiais de fibra de carbono - o chassi completo é produzido como um monocoque CFRP, assim como a pele externa deste carro esportivo extremo. O interior também apresenta materiais inovadores e patenteados pela Lamborghini, como Forged Composite e CarbonSkin.</p>\r\n\r\n<p>Totalmente de acordo com a tradição da marca, o nome do Veneno se origina de um lendário touro bravo. Veneno é o nome de um dos touros de briga mais fortes e agressivos de todos os tempos. Ele também é famoso por ser um dos touros mais rápidos da história das touradas. Seu nome tornou-se popular em 1914, quando feriu mortalmente o famoso toureiro José Sánchez Rodríguez durante a tourada na arena de Sanlúcar de Barrameda, Andaluzia, Espanha.</p>\r\n\r\n<p><span>O design</span></p>\r\n\r\n<p>O Lamborghini Veneno traz a eficiência aerodinâmica de um protótipo de corrida para a estrada. Cada detalhe de sua forma segue uma função clara - dinâmica excepcional, downforce ideal com arrasto mínimo e resfriamento perfeito do motor de alto desempenho. No entanto, o Veneno é inconfundivelmente um Lamborghini; adere firmemente à filosofia de design consistente de todos os carros superesportivos de Sant\'Agata Bolognese. Isso inclui as proporções extremas, bem como a poderosa frente em forma de flecha e a interação entre linhas nítidas e superfícies precisas.</p>\r\n\r\n<p>Toda a frente do Lamborghini Veneno foi projetada para um fluxo de ar e força aerodinâmica perfeitos. A frente funciona como uma grande asa aerodinâmica. Grandes canais conduzem o ar para as saídas no capô dianteiro e na frente do para-brisa, bem como para as rodas dianteiras. A característica da Lamborghini é a forma em Y dos faróis angulares que atingem bem os para-lamas, bem como as portas em forma de tesoura.</p>\r\n\r\n<p>A divisão dos para-lamas da carroceria é uma referência ao mundo dos protótipos esportivos e otimiza ao mesmo tempo o fluxo aerodinâmico. A linha lateral do Veneno é, portanto, dominada por enormes soleiras e poderosas cavas das rodas dianteiras e traseiras. Aqui, também, a aerodinâmica sofisticada garante um fluxo de ar perfeito para as grandes aberturas para resfriamento do motor e entrada de ar.</p>\r\n\r\n<p>Assim como a frente, a traseira do Lamborghini Veneno também foi otimizada para a aerodinâmica da parte inferior da carroceria e estabilidade nas curvas de alta velocidade. A suave parte inferior da carroceria faz a transição para um difusor substancial emoldurando os quatro tubos de escape consideráveis ​​divididos por um divisor para aumentar o nível de pico de downforce. Grandes aberturas servem para ventilar o compartimento do motor e gerenciar o fluxo de ar para a asa traseira, sendo a única área vedada na parte traseira reservada para a placa. As luzes traseiras, incluindo luzes de freio, luzes indicadoras e faróis de neblina, também seguem o tema Y. A tampa do motor ostenta seis aberturas em forma de cunha, com foco também na dissipação ideal do calor do motor. A tampa do motor se estende até uma grande aleta central de \"tubarão\", que melhora a eficiência durante a frenagem e a estabilidade traseira,</p>\r\n\r\n<p>O design da asa traseira ajustável é o produto da experiência no automobilismo e extensa simulação aerodinâmica para garantir o melhor desempenho da interação da asa traseira com o fluxo de ar do difusor traseiro.</p>\r\n\r\n<p>As exclusivas rodas de liga leve medem 20 polegadas na frente e 21 polegadas na traseira e são equipadas com fixações centrais. Seu design também é determinado pela funcionalidade aerodinâmica - um anel de fibra de carbono ao redor do aro da roda funciona como uma turbina para fornecer ar de resfriamento adicional aos discos de freio de carbono-cerâmica.</p>\r\n\r\n<p>O Lamborghini Veneno é pintado em uma nova cor cinza metálica, com partes individuais brilhando no preto da estrutura de fibra de carbono visível. O único carro a exibir as três cores da bandeira italiana como destaque é o carro mostrado em Genebra, a unidade que permanecerá propriedade da Lamborghini. Os três carros vendidos aos clientes apresentam, cada um, uma única cor da bandeira nacional italiana, juntos uma triologia em detalhes em verde, branco e vermelho, representando cada um uma peça única.</p>\r\n\r\n<p><span>A tecnologia</span></p>\r\n\r\n<p>O Veneno é mais uma prova da competência única da Automobili Lamborghini em design leve baseado em CFRP. Um monocoque feito de polímero reforçado com fibra de carbono forma a base do Veneno. É bastante semelhante ao monocoque Aventador - assim como os subquadros de alumínio dianteiro e traseiro - embora sua forma tenha sido adaptada ao novo design. Todas as peças externas são feitas de CFRP. O Lamborghini Veneno atende a todos os requisitos de segurança e registro em todo o mundo e, naturalmente, também incorpora um conjunto completo de sistemas de segurança, desde airbags até o sistema de manuseio ESP adaptado.</p>\r\n\r\n<p>A fibra de carbono também domina o interior do Lamborghini Veneno. O monocoque de fibra de carbono fica visível dentro do carro na área do túnel central e nas soleiras. Os dois assentos leves são feitos de composto forjado patenteado da Lamborghini. O tecido de fibra de carbono CarbonSkin® é usado para revestir todo o cockpit, parte dos assentos e o forro do teto. Este material exclusivo é embebido em um tipo muito especial de resina que estabiliza a estrutura da fibra, enquanto permite que o material permaneça flexível. Como um tecido de alta tecnologia, este tapete de fibra de carbono de aparência extremamente fina se adapta perfeitamente a qualquer forma e reduz o peso.</p>\r\n\r\n<p>A personalidade da corrida foi transferida também para o painel de instrumentos. Foi completamente redesenhado e agora, graças a um grafismo agressivo e à introdução de algumas funcionalidades adicionais como o G-meter, fornece todas as informações necessárias ao condutor para o controlo do carro.</p>\r\n\r\n<p>O design leve e sistemático de fibra de carbono do Lamborghini Veneno não é apenas visível, mas também evidente nas balanças: com um peso seco de apenas 1.450 quilos (3.190 libras), o Veneno é até 125 quilos (275 libras) mais leve do que o já extremamente magro Aventador. A relação potência/peso altamente benéfica de 1,93 kg/hp (4,25 lbs/hp) garante um desempenho nada menos que alucinante. Mesmo a impressionante figura de aceleração de 2,8 segundos não pode descrevê-la adequadamente. Apesar de uma configuração aerodinâmica configurada para downforce extremo, o Veneno possui resistência ao vento excepcionalmente baixa, o que lhe permite atingir uma velocidade máxima de 355 km/h (221 mph).</p>\r\n\r\n<p>O doze cilindros com um deslocamento de 6,5 litros é uma combinação emocionante de frenesi absoluto de alta rotação e força de tração fenomenal. A sua potência foi aumentada para 552 kW / 750 cv, facilitada por vias de admissão alargadas, termodinâmica otimizada, um rpm nominal ligeiramente superior e um sistema de escape com contrapressão ainda mais baixa. A caixa de câmbio manual ISR, a tração permanente nas quatro rodas e a suspensão pushrod foram especificamente ajustadas para atender às demandas do Lamborghini Veneno.</p>\r\n\r\n<p>O Lamborghini Veneno celebra sua primeira aparição pública no Salão Automóvel de Genebra de 2013. O veículo em exposição é o número 0, o veículo de teste da Lamborghini. O seu futuro ainda não está determinado, mas permitirá à Lamborghini continuar a sua atividade de testes e inovação, tanto na estrada como nas pistas de corrida. A trilogia composta por três veículos únicos será produzida ao longo do ano de 2013 e entregue aos seus futuros proprietários.</p>', '2022-12-02 11:53:44', 1, 1, 1),
(7, 'Espada', 1968, 'Grand tourer', 241, 161000, 1480, '<p>O lendário motor de 12 cilindros impulsionou os carros mais icônicos da Lamborghini por quase 60 anos. Eles incluem o Espada 400 GT, que foi o primeiro veículo de quatro lugares da Lamborghini e foi o modelo mais vendido por anos. Encapsulando uma abordagem excepcional à inovação técnica, graças ao motor Lamborghini V12 de 4 litros montado na frente, ele sempre foi um grand tourer extremamente rápido, apesar do aumento de tamanho.</p>\r\n\r\n<p>O motor de combustão V12 \"puro\" em sua forma final sairá de produção antes do final de 2022, quando o último Aventador Ultimae for fabricado. A partir do próximo ano, o herdeiro do Aventador será equipado com uma nova versão híbrida plug-in do motor V12.</p>\r\n\r\n<p>Ferruccio Lamborghini pretendia produzir o grand tourer mais rápido, luxuoso e confortável</p>\r\n\r\n<p>Desde o início de sua aventura na fabricação de automóveis, o fundador da empresa, Ferruccio Lamborghini, afirmou seu objetivo com muita clareza. Ele queria fazer o melhor grand tourer: um carro esportivo que não fosse apenas rápido, mas também confortável e com acabamento luxuoso. Apresentado no Salão Automóvel de Genebra em março de 1968, o Espada 400 GT incorporou perfeitamente essa ideia por mais de uma década. O Lamborghini Espada acomodava confortavelmente quatro adultos e tinha mais espaço para bagagem e passageiros do que o 400 GT 2+2 (seu antecessor) e o Islero 400 GT 2+2. Além disso, o Espada apresentava acabamentos verdadeiramente diferenciados, com generosas quantidades de couro e outros materiais refinados, além da opção de instalação de ar-condicionado. A direção assistida foi introduzida como opção em 1969 e foi incluída como padrão a partir de 1972.</p>\r\n\r\n<p><span>Levando o motor V12 para 4 litros</span></p>\r\n\r\n<p>A pedra angular técnica do Espada era o motor V12 de 60° que foi produzido pela primeira vez em 1963 com uma cilindrada de 3,5 litros, que já havia aumentado para 4 litros (3929 cc) em 1964. É um exemplo notável de tecnologias de desenvolvimento de motores, e era capaz de fornecer 325 cv a 7200 rpm quando foi instalado pela primeira vez no Espada. Isso aumentou para 350 cv a 7500 rpm no Espada Série II, que foi apresentado em 1970.</p>\r\n\r\n<p>Alimentado por seis carburadores de tração lateral Weber 40 DCOE, o V12 tinha uma taxa de compressão de 9,5:1 (que aumentou para 10,7:1 da Série II em diante) e duas árvores de cames à cabeça acionadas por corrente por banco. Pesava apenas 232 kg graças ao uso substancial de alumínio para fabricar não apenas a cabeça do cilindro, mas também o cárter e os pistões. Foi montado na frente em uma posição um pouco mais à frente em comparação com os motores Lamborghini 350/400 GT anteriores, a fim de tornar o interior mais espaçoso. Graças à grande abertura abaixo do capô de alumínio, era facilmente acessível.</p>\r\n\r\n<p>O chassi foi baseado no 400 GT, mas foi alongado para que a distância entre eixos chegasse a 2650 mm e também foi alargado, com a bitola aumentando para 149 cm. Tinha suspensão independente nas quatro rodas, com triângulos duplos e molas helicoidais. Em novembro de 1968, um Espada \"Lancomat\" com suspensão hidropneumática foi exibido no Salão Automóvel de Turim. O sistema foi disponibilizado sob demanda, mas acabou sendo escolhido por pouquíssimos proprietários.</p>\r\n\r\n<p>O Lamborghini Espada era um grand tourer extremamente rápido, capaz de atingir uma velocidade máxima entre 245 e 260 km/h e acompanhar o esportivo Miura na maioria das condições.</p>\r\n\r\n<p><span>O sucesso comercial do Espada</span></p>\r\n\r\n<p>Quando foi revelado pela primeira vez, o Espada era o carro de quatro lugares mais rápido do mundo. Apresentando formas quadradas como parte de um design altamente inovador da Carrozzeria Bertone, provou ser um sucesso comercial duradouro. A sua versatilidade e os seus interiores espaçosos - apesar de uma altura de apenas 119 cm - tornavam-no adequado para uma utilização muito mais frequente, expandindo assim significativamente a base de clientes. Um total de 1.226 carros foram produzidos nas três séries: 176 do Espada 400 GT Série 1 entre 1968 e 1969, 578 do Espada 400 GTE Série II entre 1970 e 1972 e 472 do Espada 400 GTS Série III entre 1972 e 1978.</p>\r\n\r\n<p><span>O Espada VIP com mini-bar e televisão Brionvega</span></p>\r\n\r\n<p>O Espada VIP foi apresentado em 1971. Foi baseado no Espada 400 GTE Série II e apenas 12 dos veículos foram fabricados. Os primeiros modelos desta série especial de carros tinham uma tonalidade laranja especial e estofamento em couro laranja e preto. Veículos posteriores foram feitos em outras combinações de cores. No interior, o Espada VIP tinha um mini-bar e um frigorífico nos painéis laterais traseiros e uma televisão Brionvega Algol 11 no topo do túnel de transmissão para manter os passageiros dos bancos traseiros entretidos. O VIP é um dos modelos mais procurados entre os colecionadores de Espada atualmente.</p>\r\n\r\n<p><span>Espada de Paul McCartney fez sucesso</span></p>\r\n\r\n<p>Um dos proprietários de Lamborghini Espada mais famosos é Sir Paul McCartney. O ex-Beatle era um entusiasta da Lamborghini e comprou um Espada Série III 1972 com volante à direita, transmissão manual, pintura vermelha e interior em couro vermelho. Sua esposa Linda costumava dirigir o carro, mas uma vez ele caiu em um lago próximo depois que ela o deixou em ponto morto e se esqueceu de puxar o freio de mão. Ele foi retirado da água após três dias e depois vendido a novos proprietários, que o usaram por vários anos. Posteriormente, acabou fazendo parte da \"decoração\" de um pub inglês. Foi vendido a um entusiasta desconhecido em 2005 e acredita-se que agora esteja na Áustria.</p>\r\n\r\n<p><span>De proprietários VIP para a tela prateada</span></p>\r\n\r\n<p>Muitas celebridades expressaram seu carinho pela Espada ao longo dos anos. Por exemplo, desde 1986, o famoso apresentador de televisão americano Jay Leno - que sempre foi um entusiasta de carros - possui um dos primeiros modelos Espada Série 2, fabricado em 1969. O fundador da revista EVO, Harry Metcalfe, também possui um Espada para muitos anos. É um Série II de 1970 com volante à direita e com ele participou na iniciativa Espada and Islero 50th Anniversary organizada pela Automobili Lamborghini Polo Storico em 2018.</p>\r\n\r\n<p>Houve inúmeros filmes apresentando um Espada, incluindo cerca de 50 títulos significativos. O mais famoso entre os fãs da modelo é o filme italiano \"Flatfoot\", de 1973, estrelado por Carlo Pedersoli, mais conhecido como Bud Spencer. Filmado em grande parte em Nápoles e arredores, mostra o protagonista perseguindo uma Espada subindo uma série de curvas fechadas em uma longa sequência de perseguição que termina do lado de fora da Igreja de Sant\'Antonio a Posillipo.</p>', '2022-12-02 12:10:57', 1, 1, 1),
(8, 'Miura SVR', 1976, 'Esportivo', 277, 161000, 1293, '<p>Lamborghini Polo Storico concluiu a restauração de um dos Miuras mais famosos já construídos: o Lamborghini Miura SVR. Por ocasião da entrega, o carro também foi exposto no Circuito de Nakayama, no Japão.</p>\r\n\r\n<p>Como está bem documentado, apenas 763 Lamborghini Miuras foram produzidos, entre 1966 e 1972, na fábrica da empresa em Sant\'Agata Bolognese, Itália. O número de Miuras construídos fora de Sant\'Agata, no entanto, é muito maior, pois vários fabricantes de modelos de automóveis criaram uma versão em escala daquele que é um dos veículos mais icônicos da história do automóvel.</p>\r\n\r\n<p>Entre eles estava a Kyosho do Japão, que produziu modelos em escala 1:18 do Lamborghini Miura SV e do Miura SVR. O Kyosho SVR, em particular, alcançou status lendário entre os colecionadores, pois retrata um dos Lamborghinis mais surpreendentes já construídos, o Miura SVR: uma evolução do carro de corrida do lendário Jota desenvolvido pelo piloto de testes da Lamborghini Bob Wallace, que foi até apresentado no mangá japonês \"Circuit Wolf\".</p>\r\n\r\n<p>Depois que o Jota de Wallace foi perdido em um acidente, a demanda incessante dos clientes nos anos seguintes levou a Automobili Lamborghini a construir alguns modelos Miura SVJ e - notavelmente - um único Lamborghini Miura SVR. Este último acabou sendo vendido no Japão, onde serviu de \"modelo\" tanto para o veículo usado na história em quadrinhos quanto para a versão de brinquedo Kyosho. O carro é o chassi número 3781 do Lamborghini Miura SVR, que foi devolvido ao seu antigo esplendor pelos especialistas do Polo Storico e exibido durante um evento organizado em sua homenagem no Circuito de Nakayama, no Japão.</p>\r\n\r\n<p>O Lamborghini Miura com chassi nº 3781, motor nº 2511 e carroceria nº 383 nasceu como uma versão S pintada na marca Verde Miura com interior preto. Foi originalmente entregue na concessionária Lamborauto em Turim, Itália, em 30 de novembro de 1968, após sua exibição no 50º Salão Automóvel de Turim.</p>\r\n\r\n<p>Depois de oito trocas de mãos na Itália, o veículo foi comprado em 1974 pelo alemão Heinz Straber, que o levou de volta a Sant\'Agata para transformá-lo em SVR - obra que exigiu 18 meses de trabalho. Em 1976, o carro foi vendido para Hiromitsu Ito e seguiu para o Japão, onde causou sensação, incluindo a inspiração para a série de quadrinhos Circuit Wolf.</p>\r\n\r\n<p>A lenda do veículo ficou ainda mais consolidada quando ele foi escolhido pela Kyosho como base para seu renomado modelo em escala, cujas linhas e cores fizeram deste SVR uma parte indelével da tradição dos carros de brinquedo.</p>\r\n\r\n<p>Paolo Gabrielli, chefe de pós-venda da Lamborghini e diretor do Polo Storico, disse: \"A restauração completa levou 19 meses e exigiu uma abordagem diferente da maneira como normalmente trabalhamos. A folha de produção original não ajudou muito, pois contamos principalmente nas especificações das modificações de 1974. O desafio para a equipe Polo Storico foi ainda maior quando o carro chegou a Sant\'Agata em pedaços, embora as peças estivessem todas lá, e com modificações consideráveis. As únicas variações nas especificações originais foram a adição de cintos de segurança de 4 pontos, bancos com maior apoio e roll bar removível. Estes foram expressamente solicitados pelo cliente e visam melhorar a segurança durante as exibições do carro nas pistas.\"</p>\r\n', '2022-12-02 14:52:02', 1, 1, 1),
(9, 'Aventador S Roadster', 2018, 'Esportivo', 350, 429284, 1708, '<p>O Lamborghini Aventador S Roadster foi apresentado pela Automobili Lamborghini no IAA 2017 em Frankfurt, combinando as tecnologias e a dinâmica de direção do Aventador S com uma experiência emocionante de direção ao ar livre.</p>\r\n\r\n<p>\"O novo Aventador S Roadster estabelece novos padrões em tecnologia e desempenho tanto na estrada quanto na pista, com a versão roadster adicionando uma nova dimensão ao prazer de dirigir\", disse o presidente e CEO, Stefano Domenicali. \"O Aventador S Roadster oferece a emoção de dirigir ao ar livre sem comprometer a dinâmica de direção ou o conforto dos ocupantes, e adiciona uma dimensão adicional de luxo através das opções de personalização disponíveis.\"</p>\r\n\r\n<p>O Lamborghini Aventador S Roadster é o único roadster superesportivo V12 com motor central traseiro. Juntamente com os números de desempenho líderes da classe, o status exclusivo do roadster é aprimorado por várias opções de cores e acabamentos, incluindo novos materiais e uso extensivo de fibra de carbono, bem como potencial virtualmente ilimitado por meio do programa de personalização Ad Personam da Lamborghini.</p>\r\n\r\n<p>Ar e espaço - o design aerodinâmico do roadster</p>\r\n\r\n<p>O roadster mantém o design inconfundível do Aventador S, juntamente com características únicas que refletem sua persona roadster: uma combinação do DNA de design distinto da Lamborghini e o resultado de extensos testes aerodinâmicos.</p>\r\n\r\n<p>A traseira do carro ostenta linhas distintamente diferentes do coupé, dando ao roadster seu próprio caráter aerodinâmico. Uma ponte do motor vai da janela traseira até a traseira em uma mistura de cor da carroceria e lâminas do capô do motor em fibra de carbono pintadas de preto fosco: uma opção transparente também está disponível para exibir o motor V12 interno.</p>\r\n\r\n<p>Painéis de teto rígidos, removíveis e elegantes, pesando menos de seis kg, são moldados de forma convexa para garantir o máximo de espaço na cabine para os ocupantes. Acabamento em fibra de carbono preta fosca, especificações opcionais incluindo preto de alto brilho, fibra de carbono visível brilhante e outras possibilidades do Ad Personam. Um sistema de fixação fácil permite que os painéis do teto sejam rapidamente removidos e guardados no porta-malas dianteiro.</p>\r\n\r\n<p>A janela traseira é operada eletricamente com o apertar de um botão para os motoristas que desejam ouvir a batida do motor V12: enquanto fechada durante a condução sem teto, a janela minimiza o ruído da cabine e o fluxo de ar.</p>\r\n', '2022-12-02 15:07:50', 1, 1, 1),
(10, 'EQE', 2023, 'Sedan', 210, 74900, 2385, '<p>A berlina executiva EQE é o segundo modelo baseado na arquitetura elétrica de classe premium (EVA2), a seguir à berlina EQS de luxo.</p>\r\n\r\n<p>Vanguarda empresarial com luxo progressivo</p>\r\n\r\n<p>O EQE apresenta um \'design de propósito\' esportivo com todos os elementos característicos do Mercedes-EQ, linhas de arco único e design avançado da cabine. Pureza sensual é refletida em superfícies generosamente modeladas, juntas reduzidas e transições perfeitas (design sem costura). As saliências e a frente são mantidas curtas, a traseira fornece o destaque dinâmico com um spoiler traseiro acentuado. Alinhadas com a borda externa da carroceria, as rodas de 19 a 21 polegadas, juntamente com uma pronunciada seção de ombros musculosos, dão ao EQE um caráter atlético.</p>\r\n\r\n<p><span>Muito espaço para os passageiros</span></p>\r\n\r\n<p>O EQE é mais compacto que o EQS e tem uma distância entre eixos 90 milímetros mais curta, de 3120 milímetros. Em termos de dimensões externas, é comparável ao CLS. Como este último, não tem porta traseira, mas uma janela traseira fixa e tampa do porta-malas. As dimensões internas excedem claramente as do Classe E (série de modelos 213), por exemplo, o espaço para os ombros na frente (mais 27 mm) ou o comprimento interno (mais 80 mm). A posição do assento é mais alta/confiante (+ 65 mm). A capacidade do porta-malas é de 430 litros. O design interior e os equipamentos são claramente baseados no EQS, com MBUX Hyperscreen, portas automáticas de conforto (dianteiras) e eixo traseiro direcional, por exemplo, disponíveis como extras opcionais. Em termos de conforto de ruído e vibração (NVH), o EQE está entre os melhores da categoria.</p>\r\n\r\n<p><span>Sempre atualizado</span></p>\r\n\r\n<p>Como o EQS, o EQE oferece a possibilidade de ativar funções completamente novas do veículo por meio de atualizações over-the-air (OTA) em muitas áreas. Disponível desde o lançamento: a experiência sonora adicional \"Roaring Pulse\", dois modos de condução especiais para jovens motoristas e pessoal de serviço, minijogos, o modo Highlight e DIGITAL LIGHT com função de projeção e individualização DIGITAL LIGHT. No modo Destaque, o veículo se apresenta e seus equipamentos são destacados - isso é ativado pelo assistente de voz \"Hey Mercedes\". Além da animação de luz \"Digital Rain\", a individualização DIGITAL LIGHT inclui outras animações de retorno/saída como \"Brand World\". Isso significa que após a compra e a configuração original do novo carro, alguns dos EQE\'</p>\r\n\r\n<p><span>Navegação com inteligência elétrica</span></p>\r\n\r\n<p>A Navegação com Inteligência Elétrica planeja a rota mais rápida e conveniente, incluindo paradas para carregamento, com base em vários fatores e reage dinamicamente a engarrafamentos ou a uma mudança no estilo de direção, por exemplo. Isso inclui uma visualização no sistema de infoentretenimento MBUX (Mercedes-Benz User Experience) sobre se a capacidade disponível da bateria é suficiente para retornar ao ponto de partida sem carregar. As estações de carregamento ao longo da rota que foram adicionadas manualmente têm preferência no cálculo da rota. As estações de carregamento propostas podem ser excluídas. Os custos de carregamento estimados por parada de carregamento são calculados.</p>\r\n\r\n<p><span>Ar puro no interior</span></p>\r\n\r\n<p>Com ENERGIZING AIR CONTROL Plus, a Mercedes-Benz pensa holisticamente sobre a qualidade do ar no EQE. O sistema é baseado em filtragem, sensores, um conceito de exibição e ar condicionado. O filtro HEPA (High Efficiency Particulate Air) tem um nível de filtragem muito alto para reter partículas finas, micropartículas, pólen e outras substâncias que entram com o ar externo. O revestimento de carvão ativado reduz o dióxido de enxofre, óxidos de nitrogênio e odores no interior. O filtro de ar interno deste recurso opcional recebeu a certificação \"OFI CERT\" ZG 250-1 em 2021 do Instituto Austríaco de Pesquisa e Teste (OFI) em relação a vírus e bactérias. Usando o controle de climatização pré-entrada, também é possível limpar o ar interno antes de entrar no veículo. Os valores de partículas finas fora e dentro do veículo também são exibidos na linha de climatização. Se a qualidade do ar externo for baixa, o sistema também pode recomendar o fechamento dos vidros laterais ou do teto solar, bem como a mudança automática para o modo de recirculação.</p>\r\n', '2022-12-02 15:27:52', 1, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `ID` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`ID`, `nome`) VALUES
(1, 'Automóveis'),
(2, 'Caminhões'),
(3, 'Motores'),
(4, 'Onibus'),
(5, 'Motocicletas'),
(6, 'Bicicletas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `proprietarios`
--

CREATE TABLE `proprietarios` (
  `ID` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `proprietarios`
--

INSERT INTO `proprietarios` (`ID`, `nome`) VALUES
(1, 'Volkswagen AG'),
(2, 'Mercedes-Benz Group'),
(3, 'Exor'),
(4, 'Piero Ferrari'),
(5, 'Nissan Motor'),
(6, 'Honda'),
(7, 'Freefloat'),
(8, 'Stefan Quandt'),
(9, 'Susanne Klatten'),
(10, 'General Motors'),
(11, 'Grupo BMW'),
(12, 'Stellantis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sede`
--

CREATE TABLE `sede` (
  `ID` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `sede`
--

INSERT INTO `sede` (`ID`, `nome`) VALUES
(1, 'Sant\'Agata Bolognese'),
(2, 'Itália'),
(3, 'Stuttgart'),
(4, 'Bade-Vurtemberga'),
(5, 'Alemanha'),
(6, 'Maranello'),
(7, 'Emilia-Romagna'),
(8, 'Detroit'),
(9, 'Michigan'),
(10, 'Estados Unidos'),
(11, 'Minato'),
(12, 'Tokyo'),
(13, 'Japão'),
(14, 'Torrance'),
(15, 'Munique'),
(16, 'Baviera'),
(17, 'Warren'),
(18, 'Goodwood'),
(19, 'Inglaterra'),
(20, 'Reino Unido'),
(21, 'Auburn Hills');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `fabricantes`
--
ALTER TABLE `fabricantes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Índices para tabela `fabricante_fundador`
--
ALTER TABLE `fabricante_fundador`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fabricante_id` (`fabricante_id`),
  ADD KEY `fundador_id` (`fundador_id`);

--
-- Índices para tabela `fabricante_produto`
--
ALTER TABLE `fabricante_produto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fabricante_id` (`fabricante_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices para tabela `fabricante_proprietario`
--
ALTER TABLE `fabricante_proprietario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fabricante_id` (`fabricante_id`),
  ADD KEY `proprietario_id` (`proprietario_id`);

--
-- Índices para tabela `fabricante_sede`
--
ALTER TABLE `fabricante_sede`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fabricante_id` (`fabricante_id`),
  ADD KEY `sede_id` (`sede_id`);

--
-- Índices para tabela `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `modelo_id` (`modelo_id`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `cargo_id` (`cargo_id`);

--
-- Índices para tabela `fundadores`
--
ALTER TABLE `fundadores`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fabricante_id` (`fabricante_id`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `proprietarios`
--
ALTER TABLE `proprietarios`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `fabricantes`
--
ALTER TABLE `fabricantes`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `fabricante_fundador`
--
ALTER TABLE `fabricante_fundador`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `fabricante_produto`
--
ALTER TABLE `fabricante_produto`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de tabela `fabricante_proprietario`
--
ALTER TABLE `fabricante_proprietario`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `fabricante_sede`
--
ALTER TABLE `fabricante_sede`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `fotos`
--
ALTER TABLE `fotos`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `fundadores`
--
ALTER TABLE `fundadores`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `modelos`
--
ALTER TABLE `modelos`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `proprietarios`
--
ALTER TABLE `proprietarios`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `sede`
--
ALTER TABLE `sede`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `fabricantes`
--
ALTER TABLE `fabricantes`
  ADD CONSTRAINT `fabricantes_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`ID`);

--
-- Limitadores para a tabela `fabricante_fundador`
--
ALTER TABLE `fabricante_fundador`
  ADD CONSTRAINT `fabricante_fundador_ibfk_1` FOREIGN KEY (`fabricante_id`) REFERENCES `fabricantes` (`ID`),
  ADD CONSTRAINT `fabricante_fundador_ibfk_2` FOREIGN KEY (`fundador_id`) REFERENCES `fundadores` (`ID`);

--
-- Limitadores para a tabela `fabricante_produto`
--
ALTER TABLE `fabricante_produto`
  ADD CONSTRAINT `fabricante_produto_ibfk_1` FOREIGN KEY (`fabricante_id`) REFERENCES `fabricantes` (`ID`),
  ADD CONSTRAINT `fabricante_produto_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`ID`);

--
-- Limitadores para a tabela `fabricante_proprietario`
--
ALTER TABLE `fabricante_proprietario`
  ADD CONSTRAINT `fabricante_proprietario_ibfk_1` FOREIGN KEY (`fabricante_id`) REFERENCES `fabricantes` (`ID`),
  ADD CONSTRAINT `fabricante_proprietario_ibfk_2` FOREIGN KEY (`proprietario_id`) REFERENCES `proprietarios` (`ID`);

--
-- Limitadores para a tabela `fabricante_sede`
--
ALTER TABLE `fabricante_sede`
  ADD CONSTRAINT `fabricante_sede_ibfk_1` FOREIGN KEY (`fabricante_id`) REFERENCES `fabricantes` (`ID`),
  ADD CONSTRAINT `fabricante_sede_ibfk_2` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`ID`);

--
-- Limitadores para a tabela `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`modelo_id`) REFERENCES `modelos` (`ID`);

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`ID`);

--
-- Limitadores para a tabela `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `modelos_ibfk_1` FOREIGN KEY (`fabricante_id`) REFERENCES `fabricantes` (`ID`),
  ADD CONSTRAINT `modelos_ibfk_2` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
