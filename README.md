<h4>EasyExcelHelper</h4>
<p>Helper para gerar planilhas de excel com agilidade</p>

<h5>Utilização</h5>
<h5>Controller</h5>
<pre>
<code>
public $helpers = array('EasyExcel');

public function easy_excel(){

	$this->layout = 'ajax'; // Permanecer na página

	$this->Model->recursive = 0;
	$this->set('dados'); // Dados para serem enviados para a view
}
</code>
</pre>

<h5>View</h5>
<p>Os parâmetros são -> ( Model, Título das colunas, Dados da view, Nome dos campos do banco, Nome do Arquivo, Título para o arquivo )</p>
<p>easy_excel.ctp</p>
<pre>
<code>
echo $this->EasyExcel->generateExcel(
		'Model', 
		array('Nome', 'E-mail:', 'Passaporte:'), 
		$dados, 
		array('nome', 'email', 'rg_passaporte'), 
		'nome_do_aquivo',
		'Título para o arquivo'
	);
</code>
</pre>
