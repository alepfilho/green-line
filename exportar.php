<?php
	require_once 'init.php';
	
	// abre a conexão
	$PDO = db_connect();
	
	// SQL para selecionar os registros
	$sql_msg = "SELECT leads_franqueado.*, date_format(data,'%d/%m/%Y %H:%m') as data2 FROM `leads_franqueado` order by id desc ";
	
	// seleciona os registros
	$resultado_msg = $PDO->prepare($sql_msg);
	$resultado_msg->execute();
	
	if(array_key_exists("exportar", $_GET) && $_GET['exportar']=='true'){
		//declaramos uma variavel para monstarmos a tabela 
		//  $dadosXls = "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />"; 
		//  $dadosXls .= " <table border='1' >";
		//  $dadosXls .= " <tr>";
		//  $dadosXls .= " <th>ID</th>"; 
		//  $dadosXls .= " <th>Nome</th>"; 
		//  $dadosXls .= " <th>Email</th>"; 
		//  $dadosXls .= " <th>Telefone</th>";  
		//  $dadosXls .= " <th>Data</th>"; 
		//  $dadosXls .= " </tr>"; 
		//  //varremos o array com o foreach para pegar os dados 
		//  foreach($resultado_msg as $res){ 
		// 	 $dadosXls .= " <tr>";
		// 	 $dadosXls .= " <td>".$res['id']."</td>";
		// 	 $dadosXls .= " <td>".$res['nome']."</td>";
		// 	 $dadosXls .= " <td>".$res['email']."</td>";
		// 	 $dadosXls .= " <td>".$res['telefone']."</td>";
		// 	 $dadosXls .= " <td>".$res['data']."</td>";
		// 	 $dadosXls .= " </tr>"; 
		//  }
		//  $dadosXls .= " </table>";
		 // Definimos o nome do arquivo que será exportado 
		 $arquivo = "Leads.csv";
		 // Configurações header para forçar o download 
		 
		 header('Content-Type: text/csv; charset=utf-8');
		 header('Content-Disposition: attachment;filename="'.$arquivo.'"');
		 header('Cache-Control: max-age=0');
		 // Se for o IE9, isso talvez seja necessário 
		 header('Cache-Control: max-age=1');

		 $saida = fopen('php://output', 'w');

		 fputcsv($saida, array('ID', 'Nome', 'Email', 'Telefone', 'Data'));
		 while($linha = $resultado_msg->fetch(PDO::FETCH_ASSOC)) fputcsv($saida, $linha);

		 // Envia o conteúdo do arquivo 
		 echo $saida; 
		 exit; 
	}
	
?>