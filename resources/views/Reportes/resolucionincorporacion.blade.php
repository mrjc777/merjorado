<!DOCTYPE html>
<html>
    <title>Formulario de Seguimiento</title>
    <head>
        <style type="text/css">
            body{
                font-family: Arial, Helvetica, sans-serif;
            }
            table.tableizer-table {
                font-size: 12px;
                border: 1px solid #000000;
            }
            .tableizer-table td {
                padding: 4px;
                margin: 3px;
                border: 1px solid #000000;
            }
            .tableizer-table th {
                background-color: #104E8B;
                color: #FFF;
            }
            .tableBorder{
                border: 1px solid #000000;
                border-collapse: collapse;
            }
            .tableEspaciosTitulo{
                margin-bottom:2em;
                margin-top:-1em;
            }
            .tableEspacios{
                margin-bottom:2em;
                margin-top:-2em;
            }
            .nota{
                font-style:italic;
                font-size:10px;
            }

			.texto-ajustado{
				text-align: justify;
				font-size: 12px;
				font-family: Arial, Helvetica, sans-serif;
			}
        </style>
    </head>
<body>

		<table width="100%">
	        <tr>
	            <td align="center" width="50%"><img src="{{ asset('assets/img/logo_vice.jpg') }}" width="138px" height="128px"/></td>
	            <!--<td align="right" width="50%"><img src="{{ asset('plugins/login/img/logo.jpg') }}" width="200px" height="50px"/></td-->
	        </tr>
    	</table>

	<div class="tableEspaciosTitulo">
        	<center><p><h3>RESOLUCION ADMINISTRATIVA</center>
			<center><?= $data['resolucion_codigo'];?></center>
			<center>La Paz, <?= $data['resolucion_fecha'];?></h3></p></center>
   	</div>

	
    	<div class="tableEspaciosTitulo">
        	<center><h3>TEMA: INCORPORACION AL REGIMEN DE ADMISION TEMPORAL PARA</BR>
		PERFECCIONAMIENTO ACTIVO (RITEX) DE LA EMPRESA "<?= $data['razon_social'];?>"</h3></center>
   		</div>
    	<div class="tableEspacios">
    		<!--b>Componente 4:</b-->
    	</div>
<br></br>
	
<br></br>
	<div class="tableEspaciosTitulo">
        	<left><h3>VISTOS:</h3></left>
   		</div>
<br></br>
	<div class="tableEspacios">La solicitud de Incorporación al Régimen de Admisión Temporal para Perfeccionamiento</br>
	Activo – RITEX de la empresa “<?= $data['razon_social'];?>”,</br>
	representada legalmente por el Sr. <?= $data['representante_legal'];?> y todo lo que</br>
	convino ver y se tuvo presente.</div>

<br></br>

<br></br>
	<div class="tableEspaciosTitulo">
        	<left><h3>CONSIDERANDO:</h3></left>
   		</div>
<br></br>
	<div class="tableEspacios">Que, la Ley de Desarrollo y Tratamiento Impositivo de las Exportaciones No. 1489 de 16 de</br>
	abril de 1993, en su Artículo 19 define el Régimen de Internación Temporal para Exportación</br>
	(RITEX), como “el régimen aduanero que permite recibir dentro del territorio aduanero bajo</br>
	un mecanismo suspensivo de derechos de aduana, impuestos y todo otro cargo de importación,</br>
	mercancías destinadas a ser enviadas al exterior después de haber sido sometidas a un proceso</br>
	de ensamblaje, montaje, incorporación a conjuntos, máquinas equipos de transporte en general</br>
	o a aparatos de mayor complejidad tecnológica y funcional, mantenimiento, adecuación,</br>
	producción o fabricación de bienes…”.</div>

<br></br>
<br></br>

	<div class="tableEspacios">Que, la Ley General de Aduanas No. 1990 de 28 de julio de 1999 en su Artículo 127 señala</br>
	que por Admisión Temporal para Perfeccionamiento Activo, se entiende el régimen aduanero que</br>
	permite recibir ciertas mercancías, dentro del territorio aduanero nacional, con suspensión del</br>
	pago de los tributos aduaneros, destinadas a ser reexportadas en un período de tiempo</br>
	determinado, luego de haber sido sometidas a una transformación, elaboración o reparación.</div>
<br></br>
<br></br>

	<div class="tableEspacios">Que, el Artículo 174 del Reglamento a la Ley General de Aduanas, aprobado por Decreto</br>
	Supremo No. 25870 de 11 de agosto de 2000, dispone que la administración aduanera llevará</br>
	el registro de las operaciones realizadas bajo el régimen aduanero de admisión temporal y</br>
	efectuará el seguimiento correspondiente.</div>
<br></br>
<br></br>

	<div class="tableEspacios">Que, el Decreto Supremo No. 3543 de 25 de abril de 2018, modificado por el Decreto Supremo</br>
	No. 4266 de 15 de junio de 2020, tiene por objeto reglamentar el Régimen de Admisión</br>
	Temporal para Perfeccionamiento Activo – RITEX, en el marco de la Ley No. 1489 de 16 de</br>
	abril de 1993 y de la Ley General de Aduanas No. 1990 de 28 de julio de 1999, describiendo en</br>
	su Artículo 13 los niveles de control y fiscalización a ser ejercidas por el Ministerio de</br>
	Desarrollo Productivo y Economía Plural. Asimismo, en sus Artículos 8 y 9 regula la solicitud</br>
	y evaluación de Incorporación al RITEX.</div>
<br></br>
<br></br>

	<div class="tableEspacios">Que, mediante Resolución Ministerial MDPyEP No. 124/2020 de 30 de junio de 2020, se</br>
	aprueba la “Reglamentación Específica del Régimen de Admisión Temporal para</br>
	Perfeccionamiento Activo – RITEX”, el cual establece en el Artículo 12 el procedimiento</br>
	de solicitud de incorporación RITEX y en el Punto 1 del ANEXO I, el conjunto de requisitos</br>
	legales necesarios para el trámite.</div>
<br></br>
<br></br>

	<div class="tableEspacios">Que, mediante Resolución Ministerial MDPyEP No. 127/2020 de 30 de junio de 2020, se delega</br>
	al Viceministerio de Comercio Interno las atribuciones establecidas en el Parágrafo I del</br>
	Artículo 17 del Decreto Supremo N°3543 de 25 de abril de 2018, la administración de los</br>
	procedimientos del RITEX, así como la suscripción de las Resoluciones Administrativas de</br>
	autorización en sus diferentes trámites.</div>

<br></br>
	<div class="tableEspaciosTitulo">
        	<left><h3>CONSIDERANDO:</h3></left>
   		</div>
<br></br>
	<div class="tableEspacios">Que, a través del Formulario de Solicitud MAZ8WB4Z-19 de fecha 2 de octubre de 2020</br>
	recibida en el Viceministerio de Comercio Interno, la empresa “<?= $data['razon_social'];?>” representada por el Sr. <?= $data['representante_legal'];?></br>
	solicita su incorporación al Régimen de Admisión Temporal para Perfeccionamiento</br>
	Activo – RITEX y adjunta los respaldos correspondientes.</div>
<br></br>
<br></br>

	<div class="tableEspacios">Que, el Informe Técnico <?= $data['informe_codigo'];?> de fecha 9 de octubre</br>
	de 2020, emitido por la Dirección General de Desarrollo Comercial y Logística Interna del</br>
	Viceministerio de Comercio Interno, señala entre otros que una vez revisada la documentación</br>
	presentada por la empresa solicitante, de conformidad al Reglamento del RITEX, la empresa</br>
	“<?= $data['razon_social'];?>” cumple con los requisitos necesarios para realizar</br>
	su incorporación al RITEX solicitada a través del representante legal, por cuanto concluye y </br>
	recomienda se autorice mediante Resolución Administrativa la Incorporación de la empresa “<?= $data['razon_social'];?>” al Régimen de Admisión Temporal para Perfeccionamiento Activo – RITEX.</div>

<br></br>
	<div class="tableEspaciosTitulo">
        	<left><h3>POR TANTO:</h3></left>
   		</div>
<br></br>
	<div class="tableEspacios">El Viceministro de Comercio Interno, en ejercicio de las legítimas atribuciones y competencias</br>
	conferidas y la delegación de funciones efectuada mediante Resolución Ministerial MDPyEP</br>
	No. 127/2020 de 30 de junio de 2020 en el marco de lo dispuesto en el Decreto Supremo No.</br>
	3543 de 25 de abril de 2018 y su modificación,</div>

<br></br>
	<div class="tableEspaciosTitulo">
        	<left><h3>RESUELVE:</h3></left>
   		</div>
<br></br>
	<div class="tableEspacios">ARTÍCULO PRIMERO.- Incorporar al Régimen de Admisión Temporal para</br>
	Perfeccionamiento Activo – RITEX a la empresa:</div>


	<table border="1">
	<tr>
	 <th>Razon social:</th>
	 <td><?= $data['razon_social'];?></td>
	</tr>
	<tr>
	 <th>Tipo de Unidad Economica:</th>
	 <td>Sociedad de Responsabilidad Limitada</td>
	</tr>
	<tr>
	 <th>Numero de Identificacion Tributaria:</th>
	 <td>1020385028</td>
	</tr>
	<tr>
	 <th>Domicilio Fiscal:</th>
	 <td>Av. 6 de marzo Nro. 88 zona Villa Santiago El Alto - La Paz</td>
	</tr>
	<tr>
	 <th>Numero de RUEX:</th>
	 <td>10175</td>
	</tr>
	<tr>
	 <th>Nombres y Apellidos del representante legal</br>
	y su documento de identificacion:</th>
	 <td>Wolf Jaime Iberkleid Zimmermann, con</br>
	cédula de identidad No. 342832 LP</td>
	</tr>	
	</table>		

<br></br>
<br></br>
	<div class="tableEspacios">La incorporación al RITEX tiene carácter indefinido y entrará en vigencia a partir de la fecha</br>
	de emisión de la presente Resolución Administrativa, observando estrictamente lo dispuesto en</br>
	el Art. 9 párrafo IV del Decreto Supremo No. 3543 de 25 de abril de 2018, inherente a la</br>
	Reglamentación del Régimen de Admisión Temporal para Perfeccionamiento Activo – RITEX.</div>

<br></br>
<br></br>
	<div class="tableEspacios">ARTÍCULO SEGUNDO.- En ejercicio de su incorporación al Régimen, la empresa queda</br>
	facultada para proceder a la internación temporal de las materias primas e insumos que se</br>
	detallan estrictamente en el Anexo 1 “Materia Prima e Insumos”, asimismo en la elaboración de</br>
	sus declaraciones de admisión temporal deberá consignar bajo su responsabilidad, la sub-partida</br>
	arancelaria y la unidad de medida y de codificación que se detallan en el Anexo citado, mismo</br>
	que forma parte indivisible de la presente Resolución Administrativa.</div>
<br></br>
<br></br>
	<div class="tableEspacios">ARTÍCULO TERCERO.- Las materias primas e insumos que interne la Empresa, autorizados</br>
	en el Artículo Segundo de la presente Resolución Administrativa, deberán permanecer en las</br>
	siguientes instalaciones y depósitos declarados por la Empresa en el formulario de</br>
	incorporación:</div>

<br></br>
<br></br>

<div class="tableEspaciosTitulo">
        	<center><h3>INSTALACIONES Y DEPOSITOS</h3></center>
   		</div>


	<table border="1">
	<tr>
	 <th>No</th>
	 <th>TIPO</th>
	<th>DIRECCOPM</th>	
	</tr>
	<tr>
	 <td>1.</td>
	 <td>Instalacion/Deposito</td>
	<td>Av. 6 de marzo Nº 88 zona Villa Santiago</td>
	</tr>
	
	<tr>
	 <td>2.</td>
	 <td>Deposito</td>
	<td>Av. Tiahunacu Nº 93 zona Santiago I</td>	
	</tr>

	</table>

<br></br>
<br></br>
	<p class="texto-ajustado">La empresa desarrollará su proceso productivo en cumplimiento al esquema presentado y el
	coeficiente de consumo declarado en el formulario de incorporación.</p>

<br>
	<p class="texto-ajustado"><b>ARTÍCULO CUARTO.-</b> La cancelación de las admisiones temporales se efectuará mediante
	la exportación RITEX de los productos que se detallan en el Anexo 2 “Matriz Materia Prima e
	Insumos – Productos”, asimismo en la elaboración de sus declaraciones de exportación deberá
	consignar  la sub-partida arancelaria, la unidad de medida y de codificación del producto que se
	detallan en el Anexo citado, mismo que forma parte integrante de la presente Resolución
	Administrativa.</p>
<br>
	<p class="texto-ajustado">ARTÍCULO QUINTO.- La Empresa deberá sujetarse a las responsabilidades establecidas en
	el Art. 17 parágrafo III del Decreto Supremo No. 3543 de 25 de abril de 2018.</p>
<br>
	<div class="tableEspacios">Asimismo, la referida Empresa se encuentra obligada a cumplir con todo lo dispuesto en las</br>
	normas relacionadas a dicha disposición legal, considerando especialmente que las mercancías</br>
	a ser admitidas temporalmente deberán ser sometidas, en las instalaciones autorizadas, a los</br>
	procesos productivos declarados y con los coeficientes de consumo en función a lo declarado</br>
	en el Formulario de Incorporación para la obtención de los productos finales a ser exportados</br>
	dentro del plazo máximo de 360 días calendario.</div>

<br></br>
	<div class="tableEspacios">El Representante Legal de la Empresa, compromete a la misma al cumplimiento de sus</br>
	obligaciones tributarias, aduaneras y otras emergentes de la aplicación del Régimen de</br>
	Admisión Temporal para Perfeccionamiento Activo RITEX.</div>

<br></br>
	<div class="tableEspacios">Regístrese, comuníquese, cúmplase y archívese.</div>


<div class="tableEspaciosTitulo">
        	<center><h3>ANEXO 1</h3></center>
   		</div>
<div class="tableEspaciosTitulo">
        	<center><h3>Materia Prima e Insumos</h3></center>
   		</div>

<br></br>


		<style type="text/css">
	table.tableizer-table {
		font-size: 12px;
		border: 1px solid #CCC; 
		font-family: Arial, Helvetica, sans-serif;
	} 
	.tableizer-table td {
		padding: 4px;
		margin: 3px;
		border: 1px solid #CCC;
	}
	.tableizer-table th {
		background-color: #104E8B; 
		color: #FFF;
		font-weight: bold;
	}
</style>
			<center><table class="tableizer-table tableBorder">
				<thead>
					<tr class="tableizer-firstrow">
						<th>No.</th>
						<th>CODIGO</th>						
						<th>Partida</br>
							Arancelaria</th>
						<th>Descripcion</th>
						<th>Unidad de</br>
							Medida</th>											
					</tr>
				</thead>
				<tbody>
				<?php
					$contadorInsumo = 1; 
					foreach(json_decode($resp)->insumos as $item){
				?>
				<tr>
					<td><?= $contadorInsumo++; ?></td>
					<td><?php echo $item->codigo_insumo; ?></td>
					<td><?php echo $item->partida_arancelaria; ?></td>
					<td><?php echo $item->descripcion; ?></td>
					<td><?php echo $item->unidad_de_medida; ?></td>
				</tr>
				<?php } ?>
				</tbody>
			</table></center>
			

<div class="tableEspaciosTitulo">
        	<center><h3>ANEXO 1</h3></center>
   		</div>
<div class="tableEspaciosTitulo">
        	<center><h3>Materia Prima e Insumos</h3></center>
   		</div>

<br></br>


		<style type="text/css">
	table.tableizer-table {
		font-size: 12px;
		border: 1px solid #CCC; 
		font-family: Arial, Helvetica, sans-serif;
	} 
	.tableizer-table td {
		padding: 4px;
		margin: 3px;
		border: 1px solid #CCC;
	}
	.tableizer-table th {
		background-color: #104E8B; 
		color: #FFF;
		font-weight: bold;
	}
</style>
			<center><table class="tableizer-table tableBorder">
				<thead>
					<tr class="tableizer-firstrow">
						<th>CODIGO</th>						
						<th>Partida</br>
							Arancelaria</th>
						<th>Descripcion</th>
						<th>UM</th>
						<th>Coeficiente de</br>
							de Consumo</th>
						<th>%</br>
							SOBRANTE</th>
						<th>%</br>
							DESPERDICIO</th>						
					</tr>
				</thead>

				<tbody>
			 		
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						
					</tr>
					
					
				</tbody>
			</table></center>


		<br>
    <div class="nota">PG: Programado, AV: Avance</div><br>
    <br></br>
    
    </body>
</html>