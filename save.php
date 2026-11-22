<?php
require_once 'includes/db.php'; session_start(); require_once 'includes/functions.php';
$tipo=$_POST['tipo']??''; $id=(int)($_POST['id']??0);
$config=[
 'produto'=>['table'=>'produtos','fields'=>['nome','descricao','peso','valor'],'required'=>['nome']],
 'endereco'=>['table'=>'enderecos','fields'=>['identificacao','cep','logradouro','numero','complemento','bairro','cidade','estado'],'required'=>['identificacao','logradouro','cidade','estado']],
 'transportador'=>['table'=>'transportadores','fields'=>['nome','documento','telefone','email','veiculo','placa'],'required'=>['nome']]
];
if(!isset($config[$tipo])){flash('Tipo de cadastro inválido.','danger');redirect('index.php');}
$c=$config[$tipo]; foreach($c['required'] as $f){if(trim($_POST[$f]??'')===''){flash('Preencha os campos obrigatórios.','danger');redirect($tipo.'_form.php'.($id?'?id='.$id:''));}}
$fields=$c['fields']; $values=[]; foreach($fields as $f){$v=trim($_POST[$f]??'');$values[$f]=$v===''?null:$v;}
if($id){$set=implode(',',array_map(fn($f)=>"$f = :$f",$fields));$sql="UPDATE {$c['table']} SET $set WHERE id=:id";$values['id']=$id;}else{$cols=implode(',',$fields);$params=implode(',',array_map(fn($f)=>":$f",$fields));$sql="INSERT INTO {$c['table']} ($cols) VALUES ($params)";}
$s=$pdo->prepare($sql);$s->execute($values);flash('Cadastro salvo com sucesso.');redirect($tipo==='produto'?'produtos.php':($tipo==='endereco'?'enderecos.php':'transportadores.php'));
